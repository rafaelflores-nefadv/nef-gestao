<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $fillable = [
        'hierarchical_role_id',
        'system_permission_id',
    ];
}
