<?php
namespace App\Traits;

use App\Models\Role;

trait HasRoles
{
    public function roles()
    {
        return $this->morphToMany(Role::class, 'model', 'model_has_roles');
    }

    public function assignRole($roleName)
    {
        $role = Role::where('name', $roleName)->firstOrFail();

        $this->roles()->attach($role->id);
    }

    public function hasRole($roleName)
    {
        return $this->roles()->where('name', $roleName)->exists();
    }
}