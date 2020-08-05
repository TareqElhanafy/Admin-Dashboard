<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable=[
        'title','type','link','description'
    ];


    public function clients(){
        return $this->belongsToMany(Client::class);
    }
}
