<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{

    protected $fillable = [
        'name',
        'c_id',
            
    ];

    public function categories(){
        return $this->belongsTo(Category::class, 'c_id');
    }
}

