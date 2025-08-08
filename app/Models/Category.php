<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name',
        'description', // new column
    ];

    // Ensure the first letter of name is capitalized when retrieved
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
