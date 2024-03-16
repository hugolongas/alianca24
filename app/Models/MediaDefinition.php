<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaDefinition extends Model
{
    public function attachments()
	{
		return $this->hasMany(Attachment::class);
	}
}

