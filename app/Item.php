<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $fillable = array('id', 'description', 'type', 'ncm', 'unit', 'price', 'quantity');

    public $timestamps = false;

    public function saleitems(){
        return $this->hasOne('App\SaleItem', 'item_id', 'id');
    }

    public function get_price($id){
        $item = Item::findOrFail($id)->first();

        if(empty($item)) { 
            return 0; 
        } 
        return $item->price;

    }
}