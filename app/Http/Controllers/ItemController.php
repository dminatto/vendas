<?php 

namespace App\Http\Controllers;

use App\Item;
use Request;


class ItemController extends Controller {
    
    public function new(){ 
        return view('alteritem') -> with('i', new Item);
    }

    public function add(){
       Item::create(Request::all());
       return redirect() -> action('ItemController@list')
                          ->withInput(Request::only('description'));
                          
    }

    public function list(){
        $item = Item::all();
        return view('listitem') -> with('items', $item);
    }

    public function delete($id) {
        $item = Item::find($id);
        $item -> delete(); 
        return redirect() -> action('ItemController@list');
    }

    public function edit($id){
        $item = Item::find($id);

        if(empty($item)) { 
            return "Esse fornecedor não existe"; 
        } 
        
        return view('alteritem') -> with('i', $item); 
    }

    public function update($id) {
        $params = Request::all();
        $item = Item::find($id);
        $item->update($params);
    
        return redirect() -> action('ItemController@list');
    }

    public function detail($id){
        $item = Item::find($id);

        if(empty($item)) { 
            return "Esse item não existe"; 
        } 
        
        return view('detailitem') -> with('i', $item); 
    }
}