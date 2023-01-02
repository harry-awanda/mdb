<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tvshow extends Model
{
    protected $fillable = ['cover','imdb','episode','rating','runtime','season','status','title','type','batchurl','suburl','year'];
    
    public function celebs(){
    	return $this->belongsToMany('\App\Models\Celebs');
    }
    public function genre(){
    	return $this->belongsToMany('\App\Models\Genre');
    }
    public function service(){
    	return $this->belongsToMany('\App\Models\Service');
    }    
}