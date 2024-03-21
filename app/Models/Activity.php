<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

    public function slug()
	{
        return config('app.url').'/'.$this->category->lower_name.'/'.$this->url;
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

    public function attachments(){
       return $this->hasMany(Attachment::class)->with('mediadefinition');
    }
}
