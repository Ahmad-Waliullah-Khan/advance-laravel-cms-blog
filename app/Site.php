<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'site';

    public $primaryKey ='id';
    
    public $timestamps = true;


}
