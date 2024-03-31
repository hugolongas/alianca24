<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    private $_cssStyle = '12';
    public function SetCss($css)
    {
        $this->_cssStyle = $css;
    }
    public function cssStyle()
    {
        return $this->_cssStyle;
    }

    public function attachments()
    {
        return $this->BelongsToMany(Attachment::class)->with('mediadefinition');
    }
}
