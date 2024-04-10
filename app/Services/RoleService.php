<?php

namespace App\Services;

use App\Models\Role;

class RoleService extends Service
{
    public function __construct()
    {
    }

    public function All(){
        $roles = Role::all();
        return $this->OkResult($roles);
    }

    public function GetById($id){
        $role = Role::find($id);
        return $this->OkResult($role);
    }

    public function Create($name)
    {
        $role = new Role();
        $role->name = $name;
        $role->lower_name = $this->SeoUrl($name);

        $role->save();

        return $this->OkResult($role);
    }

    public function Update($id, $name)
    {
        $role = Role::find($id);
        $role->name = $name;
        $role->lower_name = $this->SeoUrl($name);
        $role->save();

        return $this->OkResult($role);
    }

    public function Delete($id)
    {
        $role = Role::find($id);
        $role->delete();
        return $this->OkResult(true);
    }

    /*Private Functions*/
   
    /*End Private Functions*/
}
