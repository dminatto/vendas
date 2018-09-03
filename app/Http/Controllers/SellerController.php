<?php 

namespace App\Http\Controllers;

use App\Seller;
use Request;
use App\Sale;

class SellerController extends Controller {

    public function __construct() { 
        $this->middleware('auth'); 
    }

    public function generateStates(){
        $states = collect( [['value' => 'AC', 'display' =>'Acre'], 
                            ['value' => 'AL', 'display' =>'Alagoas'], 
                            ['value' => 'AP', 'display' =>'Amapá'], 
                            ['value' => 'AM', 'display' =>'Amazonas'], 
                            ['value' => 'BA', 'display' =>'Bahia'], 
                            ['value' => 'CE', 'display' =>'Ceará'], 
                            ['value' => 'DF', 'display' =>'Distrito Federal'], 
                            ['value' => 'ES', 'display' =>'Espírito Santo'], 
                            ['value' => 'GO', 'display' =>'Goiás'], 
                            ['value' => 'MA', 'display' =>'Maranhão'], 
                            ['value' => 'MT', 'display' =>'Mato Grosso'], 
                            ['value' => 'MS', 'display' =>'Mato Grosso do Sul'], 
                            ['value' => 'MG', 'display' =>'Minas Gerais'], 
                            ['value' => 'PA', 'display' =>'Pará'], 
                            ['value' => 'PB', 'display' =>'Paraíba'], 
                            ['value' => 'PR', 'display' =>'Paraná'], 
                            ['value' => 'PE', 'display' =>'Pernambuco'], 
                            ['value' => 'PI', 'display' =>'Piauí'], 
                            ['value' => 'RJ', 'display' =>'Rio de Janeiro'], 
                            ['value' => 'RN', 'display' =>'Rio Grande do Norte'], 
                            ['value' => 'RS', 'display' =>'Rio Grande do Sul'], 
                            ['value' => 'RO', 'display' =>'Rondônia'], 
                            ['value' => 'RR', 'display' =>'Roraima'], 
                            ['value' => 'SC', 'display' =>'Santa Catarina'], 
                            ['value' => 'SP', 'display' =>'São Paulo'], 
                            ['value' => 'SE', 'display' =>'Sergipe'], 
                            ['value' => 'TO', 'display' =>'Tocantins']]);

        return $states;
    }

    public function generateGender(){
        $gender = collect( [['value' => 'M', 'display' =>'Masculino'], 
                            ['value' => 'F', 'display' =>'Feminino'], 
                            ['value' => 'O', 'display' =>'Outros']]);

        return $gender;

    }
    
    public function new(){ 

        $s = new Seller();
        $state = $this->generateStates();
        $gender = $this->generateGender();

        return view('altersaller', compact('s', 'state', 'gender'));
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

        $sale = Sale::where("seller_id", $id)->get();

        if($sale->count() > 0) { 
            return redirect() -> action('Auth\LoginController@error', array('id' => 1));
        } 

        $seller = Seller::find($id);
        $seller -> delete(); 
        return redirect() -> action('SellerController@list');
    }

    public function edit($id){

        $s = Seller::find($id);

        if(empty($s)) {
            return redirect() -> action('Auth\LoginController@error', array('id' => 0));
        } 
        $state = $this->generateStates();
        $gender = $this->generateGender();

        return view('altersaller', compact('s', 'state', 'gender'));
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
            return redirect() -> action('Auth\LoginController@error', array('id' => 0));
        } 
        
        return view('detailseller') -> with('s', $seller); 
    }
}