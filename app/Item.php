<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $guarded = ['id'];
    protected $fillable = array('id', 'description', 'type', 'ncm', 'unit', 'price', 'quantity');

    public $timestamps = false;
}
