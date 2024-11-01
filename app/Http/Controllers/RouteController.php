<?php

namespace App\Http\Controllers;

use App\Models\RouteConfig;
use Faker\Core\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RouteController extends Controller
{
    public function getRouteConfig(Request $request)
    {
        $clientIp = $request->ip();
        $clientMac = $request->mac;
        $clientConfig = RouteConfig::query()
            ->where('server_ip', $clientIp)
            ->where('mac_address', $clientMac)
            ->get();

        if ($clientConfig->isEmpty()) {
            $latestConfig = RouteConfig::query()->latest()->first();

            RouteConfig::query()
                ->create([
                        'server_ip' => $clientIp,
                        'mac_address' => $clientMac,
                        'service_name' => Str::uuid(),
                        'service_port' => $latestConfig->service_port ?? 1025 + 1
                    ]);

            RouteConfig::query()
                ->create([
                    'server_ip' => $clientIp,
                    'mac_address' => $clientMac,
                    'service_name' => Str::uuid(),
                    'service_port' => $latestConfig->service_port ?? 1025 + 2
                ]);

            $clientConfig = RouteConfig::query()
                ->where('server_ip', $clientIp)
                ->where('mac_address', $clientMac)
                ->get();
        }

        return $clientConfig;
    }
}
