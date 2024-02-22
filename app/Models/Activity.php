<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

    public function slug()
	{
        return config('app.url').'/'.$this->category().'/'.$this->url;
	}

	public function category()
	{
		$this->belongsTo(Category::class);
	}

    public function attachments(){
        $this->hasMany(Attachment::class);
    }
}
