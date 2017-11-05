<?php

namespace App;


use Illuminate\Database\Eloquent\Relations\Pivot;

class PostsTags extends Pivot
{
    protected $table = 'posts_tags';
    public $timestamps = false;
}
