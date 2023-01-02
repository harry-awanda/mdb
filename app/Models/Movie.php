<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['cover','imdb','rating','runtime','status','title','year'];

    public function celebs(){
    	return $this->belongsToMany('\App\Models\Celebs');
    }
    public function genre(){
    	return $this->belongsToMany('\App\Models\Genre');
    }
    public function tags(){
    	return $this->belongsToMany('\App\Models\Tag');
    }
    
}