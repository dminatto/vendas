@extends('welcome') 

@section('conteudo')

<div class="row">
    @if($sale->id > 0)
        <h1>Edição de Venda</h1>
    @else
        <h1>Venda</h1>
    @endif
    <hr>
</div>

    @if($sale->id > 0)
        <form id="myForm" class="needs-validation" action="/venda/update/<?= $sale->id ?>" method="post" novalidate>
    @else
        <form id="myForm" class="needs-validation" action="/venda/adiciona" method="post" novalidate> 
    @endif
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <div class="form-row">
        <div class="col-md-2 mb-3">
            <label for="dtsale">Data da Venda</label>
            <input type="date" class="form-control" id="dtsale" name="dtsale" value="<?= $sale->dtsale ?>" readonly>
        </div>
        <div class="col-md-10 mb-3">
            <label for="seller_id">Vendedor</label>
            <select class="form-control" name="seller_id" readonly>
                <option></option>
                @foreach($seller as $s)
                    @if($sale->seller_id == $s->id)
                        <option selected value="<?= $s->id?>"><?= $s->name . " ". $s->lastname ?></option>    
                    @else
                        <option value="<?= $s->id?>"><?= $s->name . " ". $s->lastname ?></option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>

     <div class="row">
    	<div class="col-md-12">
    		<div class="card">
    			<div class="title">
                    <h3 class="card-title"><strong>Itens de Venda</strong></h3>
    			</div>
    			<div class="card-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td class="text-center"><strong>Item</strong></td>
        							<td class="text-center"><strong>Quantidade</strong></td>
                                    <td class="text-right"><strong>Valor Unitário</strong></td>
                                    <td class="text-right"><strong>Comissão</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                    <td class="text-right"></td>
                                </tr>
    						</thead>
    						<tbody>
                            @if (isset($saleItens))
                                @foreach($saleItens as $item)
                                    <tr>
                                        <td>
                                            <select class="form-control" id="item_id" name="item_id[]" readonly>
                                                @foreach($product as $p)
                                                    @if($item->item_id == $p->id)
                                                        <option selected value="<?= $p->id?>"><?= $p->description?></option>    
                                                    @else
                                                        <option value="<?= $p->id?>"><?= $p->description?></option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        
                                        <td>
                                            <input type="number" class="form-control text-right" id="quantity" name="quantity[]" value="<?=$item->quantity?>" readonly>
                                        </td>
                                        <td><div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input type="number" step="any" class="form-control text-right" value="<?= $item->item->price?>" readonly >
                                            </div>
                                        </td>
                                        <td><div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input type="text" step="any" class="form-control text-right" id="commission" name="commission[]" value="<?=$item->commission ?>" readonly >
                                            </div>	
                                        </td>
                                        <td><div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input type="text" step="any" class="form-control text-right" value="<?= Helper::calc_price($item->quantity, $item->item->price) ?>" readonly >
                                            </div>	
                                        </td>
                                        <td><button type="button" class="btn btn-secundary" id="btn_del" onclick="remove(this)"><i class="fas fas fa-trash"></i></button></td>
                                    </tr>
                                @endforeach
                            @endif
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
        
    <div class="btn-group float-right mt-2">
        <button class="btn btn-success ml-md-auto d-md-flex" type="submit">Salvar</button>
    </div>
</form>
@stop
