<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'author', 'desc', 'cat_id', 'img', 'updated_at'];

    public function cat() {
        return $this->belongsTo('App\Models\Cat');
    }
}
