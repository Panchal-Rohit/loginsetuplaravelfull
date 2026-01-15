<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class Role extends Model
{
    protected $fillable = ['name'];

    // 👥 Role → Users
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // 🔑 Role → Permissions (THIS WAS MISSING / WRONG)
    public function permissions()
    {
        return $this->belongsToMany(
            Permission::class,
            'role_permission',
            'role_id',
            'permission_id'
        );
    }
}
