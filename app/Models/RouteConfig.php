<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteConfig extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'route_configs';
}
