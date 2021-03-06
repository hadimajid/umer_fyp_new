<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $guarded=['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function notifications(){
        return $this->morphToMany(Notification::class,"notifiable");
    }
}
