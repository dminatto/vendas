<?php 

namespace App\Http\Controllers;

use App\Sale;
use App\SaleItem;
use App\Item;
use App\Seller;
use Request;
use Helper;


class SaleController extends Controller {

    public function __construct() { 
        $this->middleware('auth'); 
    }

    public function calc_item_comission($age, $qtd, $iditem){

        $item = Item::find($iditem);
        $vltotal = Helper::calc_price($qtd,  $item->price);
        $vlcommission = Helper::calc_commission($age, $item->type ,  $vltotal);
        return $vlcommission;
    }
 
    public function new(){ 

        $sale = new Sale();
        $product = Item::all();
        $seller = Seller::all();

        return view('addSale', compact('sale', 'product', 'seller'));
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
            return redirect() -> action('Auth\LoginController@error', array('id' => 2));
        } 
        
        return view('addSale', compact('sale', 'product', 'seller'));
    }

    public function detail($id){
        $sale = Sale::find($id);

        if(empty($sale)) { 
            return redirect() -> action('Auth\LoginController@error', array('id' => 2));
        } 
        
        return view('detailSale') -> with('sale', $sale); 
    }

    public function generateItensSale($age){

        $request = Request::all();
        
        if(isset($request['item_id']) && isset($request['quantity'])){
        
            $item = $request['item_id'];
            $quantity = $request['quantity'];
        
            $itens = array();
            
            for ($value = 0; $value < count($item); $value++) {
    
                $itens[$value]  = new SaleItem();
                $itens[$value] ->item_id = $item[$value];
                $itens[$value] ->quantity = $quantity[$value];
                $vlcommission = $this->calc_item_comission($age, $quantity[$value], $item[$value]);
                $itens[$value] ->commission = $vlcommission;
            }

            return $itens;
        }
    }
    
    public function getSellerAge($id){
        $seller = Seller::find($id);

        return Helper::calc_age($seller->dtemployed);
    }

    public function add(){
        
        $sale = new Sale(Request::all());
        $sale->save();
      
        $ageseller = $this->getSellerAge($sale->seller_id);
        $itens = $this->generateItensSale($ageseller);

        $sale->saleitem()->saveMany($itens);
 
        return redirect() -> action('SaleController@list');
 
     }

    public function update($id) {
        
        $sale = Sale::find($id);
        $sale->dtsale =  Request::input('dtsale');
        $sale->seller_id =  Request::input('seller_id');
        $sale->update();        

        $ageseller = $this->getSellerAge($sale->seller_id);
        $itens = $this->generateItensSale($ageseller);
        
        $sale->saleitem()->delete();
        $sale->saleitem()->saveMany($itens);
      
        return redirect() -> action('SaleController@list');
    }

    public function newSale(){

        $product = Item::all();
        $seller = Seller::all();
        
        $sale = new Sale();

        $sale->id =  Request::input('id');
        $sale->dtsale =  Request::input('dtsale');
        $sale->seller_id =  Request::input('seller_id');

        $ageseller = $this->getSellerAge($sale->seller_id);
        $saleItens = $this->generateItensSale($ageseller);

        return view('alterSale', compact('sale', 'product', 'seller', 'saleItens'));
    }

   
}