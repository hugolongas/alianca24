<?php

namespace App\Services;

use App\Models\Parner;

class ParnerService extends Service
{
    public function __construct()
    {
    }

    public function GetParners()
    {
        $parners = Parner::all();
        return $parners;
    }
    public function GetParner($id){
        $parner = Parner::find($id);
        return$parner;
    }

    public function All(){
        $parners = Parner::all();
        return $this->OkResult($parners);
    }

    public function GetById($id){
        $parner = Parner::find($id);
        return $this->OkResult($parner);
    }

    public function Create($name)
    {
        $parner = new Parner();
        $parner->name = $name;
        $parner->price = "60€";

        $parner->save();

        return $this->OkResult($parner);
    }

    public function Update($id, $name, $price, $info)
    {
        $parner = Parner::find($id);
        $parner->name = $name;
        $parner->price = $price;
        $parner->info = $info;
        
        $parner->save();

        return $this->OkResult($parner);
    }

    public function Delete($id)
    {
        $parner = Parner::find($id);
        $parner->delete();
        return $this->OkResult(true);
    }
}
