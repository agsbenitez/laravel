<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function post(){

        return $this->hasMany('App\Post')
            ->orderByDesc('id')
            ->get();
    }
}
