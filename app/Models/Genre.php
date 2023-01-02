<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = "genre";
    protected $fillable = ['name'];

    public function movie(){
    	return $this->belongsToMany('\App\Models\Movie');
    }

    public function tvshow(){
    	return $this->belongsToMany('\App\Models\TVshow');
    }
}
