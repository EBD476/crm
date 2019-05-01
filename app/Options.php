<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
   protected $table = 'device_options';
   protected $fillable = ['user_id', 'user_options'];
}
