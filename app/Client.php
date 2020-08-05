<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Client extends Model
{
    protected $fillable=[
        'title',
        'description',
        'status',
        'phone',
        'contract_start_date',
        'contract_end_date'
    ];
    public function services(){
        return $this->belongsToMany(Service::class);
    }
}
