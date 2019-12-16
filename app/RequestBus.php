<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RequestBus extends Model
{
    use Notifiable;
    public function user(){
      return $this->belongsTo('App\User');
    }
}
