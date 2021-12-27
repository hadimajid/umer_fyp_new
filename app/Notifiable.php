<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Notifiable extends Pivot
{

    protected $table="notifiables";

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function kameeti(){
        if($this->notifiable_type=="App\KameetiUser"){
            return $this->belongsTo(KameetiUser::class,'notifiable_id');
        }
    }
    public function loan(){
        if($this->notifiable_type=="App\Loan"){
            return $this->belongsTo(Loan::class,'notifiable_id');
        }
    }

}
