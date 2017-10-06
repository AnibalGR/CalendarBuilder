<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Calendar_Page;

class Calendar extends Model
{
    //
    protected $fillable = ['user_id', 'name'];
    
    public function user()
    {
        return $this->belongsTo('User');
    }
    
    public function getPageCount()
    {   
        return Calendar_Page::where('calendar_id', $this->id)->count();
    }
}
