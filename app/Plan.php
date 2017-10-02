<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    // Attributes for the specific model
    protected $fillable = ['name', 'slug', 'braintree_plan', 'cost', 'description'];
    
    // Override the KeyName to use the slug instead the ID
    public function getRouteKeyName() {
        return 'slug';
    }

}
