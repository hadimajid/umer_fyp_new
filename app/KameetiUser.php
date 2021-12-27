<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class KameetiUser extends Pivot
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function kameeti(){
        return $this->belongsTo(Kameeti::class);
    }
    public function notifications(){
        return $this->morphToMany(Notification::class,"notifiable");
    }
}
