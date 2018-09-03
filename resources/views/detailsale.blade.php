@extends('welcome') 

@section('conteudo')
<div class="col-md-12">
    <h3>Dados da Venda</h3>
    <div class="btn-group float-right mt-2">
        <button type="button" onClick='listSale()' class="btn btn-primary">Voltar</button>
        <button type="button" onClick='editSale(<?= $sale->id ?>)' class="btn btn-secondary">Editar</button>
        <hr>
</div>
</div>
<div class= "">
    <ul class="container details">
        <li><p>Data da Venda: <?=  date_format(new DateTime($sale->dtsale), "d/m/Y") ?></p></li>
        <li><p>Vendedor: <?= $sale->seller->name . " ". $sale->seller->lastname ?></p></li>
        <li><p>Valor da Compra: <?= $sale->value ?></p></li>
    </ul>

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
                                </tr>
    						</thead>
    						<tbody>
            
                            @foreach($sale->saleitem as $item)
    							<tr>
                                    <td class="text-center"><?= $item->item->description?></td>
    								<td class="text-center"><?=$item->quantity?></td>
									<td class="text-right"><?= $item->item->price ?></td>
									<td class="text-right"><?=$item->commission?></td>
                                    <td class="text-right"><?=$item->value ?></td>
    							</tr>
                            @endforeach
    							<tr>
    								<td class="thick-line"></td>
									<td class="thick-line"></td>
									<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right">R$ <?= $sale->value?></td>                          
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
        
    
@stop
