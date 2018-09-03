<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $table = 'sale_items';
    protected $guarded = ['id'];
    protected $fillable = array('id', 'sale_id', 'item_id', 'quantity', 'commission');
    public $timestamps = false;

    public function sale()
    {
        return $this->belongsTo('App\Peoples', 'sale_id', 'id');
    }

    public function item()
    {
        return $this->belongsTo('App\Item', 'item_id', 'id');
    }

}
