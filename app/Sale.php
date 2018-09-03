<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $fillable = array('id', 'dtsale', 'value', 'seller_id');
    public $timestamps = false;

    public function saleitem()
    {
        return $this->hasMany('App\SaleItem', 'sale_id', 'id');
    }

    public function seller()
    {
        return $this->belongsTo('App\Seller', 'seller_id', 'id');
        
    } 
}
