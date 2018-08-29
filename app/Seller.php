<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
      
    protected $table = 'sellers';
    protected $guarded = ['id'];
    protected $fillable = array('id', 'name', 'lastname', 'cpf', 'dtborn', 'sex', 'phone', 'dtemployed',
                                'cep', 'adress', 'adressnumber', 'district', 'city', 'state');

    public $timestamps = false;

}
