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
        $category->lower_name = $this->_SeoUrl($name);

        $category->save();

        return $this->OkResult($category);
    }

    public function Update(Category $category)
    {
        
        $category->lower_name = $this->_SeoUrl($category->name);
        $category->save();

        return $this->OkResult($category);
    }

    public function Update1($id, $name)
    {
        $category = Category::find($id);
        $category->name = $name;
        $category->lower_name = $this->_SeoUrl($name);
        $category->save();

        return $this->OkResult($category);
    }

    public function Delete($id)
    {
        $category = Category::find($id);
        $category->delete();
    }

    /*Private Functions*/
    private function _SeoUrl($string)
    {
        //Lower case everything
        $finalString = strtolower($string);
        //Make alphanumeric (removes all other characters)
        $finalString = preg_replace("/[^a-z0-9_\s-]/", "", $finalString);
        //Clean up multiple dashes or whitespaces
        $finalString = preg_replace("/[\s-]+/", " ", $finalString);
        //Convert whitespaces and underscore to dash
        $finalString = preg_replace("/[\s_]/", "-", $finalString);
        return $finalString;
    }
    /*End Private Functions*/
}
