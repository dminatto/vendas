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

        return view('alterSale', compact('sale', 'product', 'seller'));
    }

    public function add(){

       $sale = new Sale();
       $sale->dtsale =  Request::input('dtsale');
       $sale->value =  Request::input('value');
       $sale->seller_id =  Request::input('seller_id');
       $sale->save();
     
       $seller = Seller::find($sale->seller_id);
       $ageseller = Helper::calc_age($seller->dtemployed);
       
       $item = $_POST['item_id'];
       $quantity = $_POST['quantity'];
       

       $itens = array();
       for ($value = 0; $value < count($item); $value++) {
            $itens[$value]  = new SaleItem();
            $itens[$value] ->item_id = $item[$value];
            $itens[$value] ->quantity = $quantity[$value];
            $itens[$value] ->commission = $this->calc_item_comission($ageseller, $quantity[$value], $item[$value]);
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
            return redirect() -> action('Auth\LoginController@error', array('id' => 2));
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

       $seller = Seller::find($sale->seller_id);
       $ageseller = Helper::calc_age($seller->dtemployed);

       $itens = array();
       for ($value = 0; $value < count($item); $value++) {

            $itens[$value]  = new SaleItem();
            $itens[$value] ->item_id = $item[$value];
            $itens[$value] ->quantity = $quantity[$value];
            $itens[$value] ->commission = $this->calc_item_comission($ageseller, $quantity[$value], $item[$value]);
        }

        $sale->saleitem()->delete();
        $sale->saleitem()->saveMany($itens);
      
        return redirect() -> action('SaleController@list');
    }

    public function detail($id){
        $sale = Sale::find($id);

        if(empty($sale)) { 
            return redirect() -> action('Auth\LoginController@error', array('id' => 2));
        } 
        
        return view('detailSale') -> with('sale', $sale); 
    }

    public static function get_price($id){

        $item = Item::find($id);
        
        return json_encode(['vlitem', $item->value]);

    }

   
}