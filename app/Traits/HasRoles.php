<?php
namespace App\Traits;

use App\Models\Role;

trait HasRoles
{
    public function roles()
    {
        return $this->morphMany(Role::class, 'model');
    }

    public function assignRole($roleName)
    {
        $role = new Role(['name' => $roleName]);

        $this->roles()->save($role);
    }

    public function hasRole($roleName)
    {
        return $this->roles()->where('name', $roleName)->exists();
    }
}