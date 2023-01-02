<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celebs extends Model
{
    protected $fillable = ['name'];

    public function movie(){
    	return $this->belongsToMany('\App\Models\Movie');
    }
    public function tvshow(){
    	return $this->belongsToMany('\App\Models\TVshow');
    }
}
