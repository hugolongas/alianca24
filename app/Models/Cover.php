<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    private $_cssStyle = 'col-sm-12';
    public function SetCss($css)
    {
        if ($css != 12)
            $this->_cssStyle = $this->_cssStyle . " col-md-" . $css;
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
