<?php 

namespace App\Http\Controllers;

use App\Sale;
use App\SaleItem;
use App\Item;
use App\Seller;
use Request;


class SaleController extends Controller {

    public function __construct() { 
        $this->middleware('auth'); 
    }
 
    public function new(){ 

        $sale = new Sale();
        $product = Item::all();
        $seller = Seller::all();

        return view('alterSale', compact('sale', 'product', 'seller'));
    }

    public function add(){

       $sale = new Sale();
       $sale->dtsale =  Request::input('dtsale');
       $sale->value =  Request::input('value');
       $sale->seller_id =  Request::input('seller_id');
       $sale->save();
     
       $item = $_POST['item_id'];
       $quantity = $_POST['quantity'];
       $commission = $_POST['commission'];

       $itens = array();
       for ($value = 0; $value < count($item); $value++) {
            $itens[$value]  = new SaleItem();
            $itens[$value] ->item_id = $item[$value];
            $itens[$value] ->quantity = $quantity[$value];
            $itens[$value] ->commission = $commission[$value];
        }
  
       $sale->saleitem()->saveMany($itens);

       return redirect() -> action('SaleController@list');

    }

    public function list(){
        $sale = Sale::all();
        return view('listSale')->withSales($sale);
    }

    public function delete($id) {
        $sale = Sale::find($id);
        $sale->saleitem()->delete();
        $sale -> delete(); 
        return redirect() -> action('SaleController@list');
    }

    public function edit($id){
        $sale = Sale::find($id);
        $product = Item::all();
        $seller = Seller::all();
    
        if(empty($sale)) { 
            return "Esse fornecedor não existe"; 
        } 
        
        return view('alterSale', compact('sale', 'product', 'seller'));
    }

    public function update($id) {
        $params = Request::all();
        $sale = Sale::find($id);

        $sale->dtsale =  Request::input('dtsale');
        $sale->value =  Request::input('value');
        $sale->seller_id =  Request::input('seller_id');
        $sale->update();

       $item = $params['item_id'];
       $quantity = $params['quantity'];
       $commission = $params['commission'];

       $itens = array();
       for ($value = 0; $value < count($item); $value++) {
            $itens[$value]  = new SaleItem();
            $itens[$value] ->item_id = $item[$value];
            $itens[$value] ->quantity = $quantity[$value];
            $itens[$value] ->commission = $commission[$value];
        }

        $sale->saleitem()->delete();
        $sale->saleitem()->saveMany($itens);
      
        return redirect() -> action('SaleController@list');
    }

    public function detail($id){
        $sale = Sale::find($id);

        if(empty($sale)) { 
            return "Esse fornecedor não existe"; 
        } 
        
        return view('detailSale') -> with('sale', $sale); 
    }

   
}