<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar_Page extends Model
{
    //
    protected $table = 'calendar_pages';
    
    protected $fillable = ['calendar_id', 'month', 'year', 'theme', 'content', 'video'];
    
    public function calendar()
    {
        return $this->belongsTo('Calendar');
    }
}
