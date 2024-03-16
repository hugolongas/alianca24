<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    public function activity(){
        return $this->belongsTo(Activity::class);
    }

    public function mediadefinition(){
        return $this->belongsTo(MediaDefinition::class,'mediadefinition_id');
    }
}
