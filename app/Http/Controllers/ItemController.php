<?php 

namespace App\Http\Controllers;

use App\SaleItem;
use App\Item;
use Request;
use Auth;

class ItemController extends Controller {

    public function __construct() {
        
        $this->middleware('auth'); 
    }

    public function generateType(){
        $type_item = collect([['value' => 'S', 'display' =>'Serviço'], 
                              ['value' => 'P', 'display' => 'Produto']]);

        return $type_item;
    }

    public function new(){
        $i = new Item;
        $type = $this->generateType();

        return view('alteritem', compact('i', 'type'));
    }

    public function add(){
       Item::create(Request::all());
       return redirect() -> action('ItemController@list')
                          ->withInput(Request::only('description'));
                          
    }

    public function list(){
        $type = $this->generateType();
        
        $items = Item::all();
        
        return view('listitem', compact('items', "type"));
    }

    public function delete($id) {
        
        $listItem = SaleItem::where("item_id", $id)->get();

        if($listItem->count() > 0) { 
            return "Esse produto está sendo atrelado em uma venda!"; 
        } 

        $item = Item::find($id);
        $item -> delete(); 
        return redirect() -> action('ItemController@list');
    }

    public function edit($id){
        $i = Item::find($id);

        if(empty($i)) { 
            return "Esse fornecedor não existe"; 
        } 

        $type = $this->generateType();
        
        return view('alteritem', compact('i', 'type')); 
    }

    public function update($id) {
        $params = Request::all();
        $item = Item::find($id);
        $item->update($params);
    
        return redirect() -> action('ItemController@list');
    }

    public function detail($id){
        $i = Item::find($id);

        if(empty($i)) { 
            return "Esse item não existe"; 
        } 

        $type = $this->generateType();
        
        return view('detailitem', compact('i', 'type')); 
    }
}