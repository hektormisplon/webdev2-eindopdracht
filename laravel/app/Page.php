<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'path',
        'title',
        'subtitle',
        'body'
    ];
}
