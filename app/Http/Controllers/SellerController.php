<?php 

namespace App\Http\Controllers;

use App\Seller;
use Request;


class SellerController extends Controller {
    public function new(){ 
        return view('altersaller') -> with('s', new Seller);
    }

    public function add(){
       Seller::create(Request::all());
       return redirect() -> action('SellerController@list')
                          ->withInput(Request::only('name'));
                          
    }

    public function list(){
        $seller = Seller::all();
        return view('listseller')->withSellers($seller);
    }

    public function delete($id) {
        $seller = Seller::find($id);
        $seller -> delete(); 
        return redirect() -> action('SellerController@list');
    }

    public function edit($id){
        $seller = Seller::find($id);

        if(empty($seller)) { 
            return "Esse fornecedor não existe"; 
        } 
        
        return view('altersaller') -> with('s', $seller); 
    }

    public function update($id) {
        $params = Request::all();
        $seller = Seller::find($id);
        $seller->update($params);
    
        return redirect() -> action('SellerController@list');
    }

    public function detail($id){
        $seller = Seller::find($id);

        if(empty($seller)) { 
            return "Esse fornecedor não existe"; 
        } 
        
        return view('detailseller') -> with('s', $seller); 
    }
}