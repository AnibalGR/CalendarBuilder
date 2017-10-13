<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Calendar_Page;

class Calendar extends Model
{
    //
    protected $fillable = ['user_id', 'name', 'year', 'month', 'theme', 'themeC', 'video', 'content'];
    
}
