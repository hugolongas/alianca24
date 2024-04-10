<?php

namespace App\Services;

use App\Models\Category;

class CategoryService extends Service
{
    public function __construct()
    {
    }

    public function All(){
        $categories = Category::all();
        return $this->OkResult($categories);
    }

    public function GetById($id){
        $category = Category::find($id);
        return $this->OkResult($category);
    }

    public function Create($name)
    {
        $category = new Category();
        $category->name = $name;
        $category->lower_name = $this->SeoUrl($name);

        $category->save();

        return $this->OkResult($category);
    }

    public function Update($id, $name)
    {
        $category = Category::find($id);
        $category->name = $name;
        $category->lower_name = $this->SeoUrl($name);
        $category->save();

        return $this->OkResult($category);
    }

    public function Delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return $this->OkResult(true);
    }
}
