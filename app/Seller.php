<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
      
    protected $table = 'sellers';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $fillable = array('id', 'name', 'lastname', 'cpf', 'dtborn', 'gender', 'phone', 'dtemployed',
                                'cep', 'adress', 'adressnumber', 'district', 'city', 'state');

    public $timestamps = false;

    public function sale()
    {
        return $this->hasOne('App\Sale', 'seller_id', 'id');
    }

}
