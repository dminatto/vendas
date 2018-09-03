@extends('welcome') 

@section('conteudo')

<div class="row">
    @if(isset($sale->id))
        <h1>Edição de Venda</h1>
    @else
        <h1>Venda</h1>
    @endif
    <hr>
</div>
    @if(isset($sale->id))
        <form id="myForm" class="needs-validation" action="/venda/update/<?= $sale->id ?>" method="post" novalidate>
    @else
        <form id="myForm" class="needs-validation" action="/venda/adiciona" method="post" novalidate> 
    @endif
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    
    <div class="form-row">
        <div class="col-md-2 mb-3">
            <label for="dtsale">Data da Venda</label>
            <input type="date" class="form-control" id="dtsale" name="dtsale" value="<?= $sale->dtsale ?>" required>
            <div class="invalid-feedback">
                Informe a data da venda.
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <label for="seller_id">Vendedor</label>
            <select class="form-control" name="seller_id" required>
                <option></option>
                @foreach($seller as $s)
                    @if($sale->seller_id == $s->id)
                        <option selected value="<?= $s->id?>"><?= $s->name . " ". $s->lastname ?></option>    
                    @else
                        <option value="<?= $s->id?>"><?= $s->name . " ". $s->lastname ?></option>
                    @endif
                @endforeach
            </select>
            <div class="invalid-feedback">
                Informe um vendedor.
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <label for="value">Valor</label>
            <input type="text" class="form-control" id="value" name="value" value="<?= $sale->value?>">
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
                                    <td class="text-right"><strong><button type="button" class="btn btn-secundary btn_add"><i class="fas fa-plus"></i></button></strong></td>
                                </tr>
    						</thead>
    						<tbody>
            
                            @foreach($sale->saleitem as $item)
    							<tr>
                                    <td>
                                        <select class="form-control" id="item_id" name="item_id[]" required>
                                            @foreach($product as $p)
                                                @if($item->item_id == $p->id)
                                                    <option selected value="<?= $p->id?>"><?= $p->description?></option>    
                                                @else
                                                    <option value="<?= $p->id?>"><?= $p->description?></option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Informe um item.
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <input type="number" class="form-control text-right" id="quantity" name="quantity[]" value="<?=$item->quantity?>" required>
                                        <div class="invalid-feedback">
                                            Informe uma quantidade.
                                        </div>
                                    </td>
                                    <td><div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">R$</span>
                                            </div>
                                            <input type="number" class="form-control text-right" value="<?= $item->item->price?>" disabled >
                                        </div>
                                    </td>
                                    <td><div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">R$</span>
                                            </div>
                                            <input type="text" class="form-control text-right" id="commission" name="commission[]" value="<?=$item->commission ?>">
                                        </div>	
                                    </td>
                                    <td><div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">R$</span>
                                            </div>
                                            <input type="text" class="form-control text-right" value="<?= Helper::calc_price($item->quantity, $item->item->price) ?>" disabled>
                                        </div>	
                                    </td>
                                    <td><button type="button" class="btn btn-secundary" id="btn_del" onclick="remove(this)"><i class="fas fas fa-trash"></i></button></td>
    							</tr>
                            @endforeach
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
        
    <div class="btn-group float-right mt-2">
        <button type="button" onClick='listSale()' class="btn btn-primary">Cancelar</button>
        <button class="btn btn-success ml-md-auto d-md-flex" type="submit">Salvar</button>
    </div>
</form>
<script>
    $(document).ready(function () { 
        
        $('.btn_add').on('click', function(){
            var newRow = $("<tr>");
            var cols = "";

            cols += '<td>'
            cols += '<select class="form-control" id="item_id" name="item_id[]" required>';
            cols += '<option selected></option>'
            cols += '@foreach($product as $p)';
            cols += '<option value="<?= $p->id?>"><?= $p->description?></option>'
            cols += '@endforeach'
            cols += '</select>'
            cols += '<div class="invalid-feedback">';
            cols += 'Informe um item.';
            cols += '</div>';
            cols += '</td>';

            cols += '<td>';
            cols += '<input type="number" class="form-control text-right" id="quantity" name="quantity[]" required>';
            cols += '<div class="invalid-feedback">';
            cols += 'Informe uma quantidade.';
            cols += '</div>';
            cols += '</td>';

            cols += '<td>';
            cols += '<div class="input-group">';
            cols += '<div class="input-group-prepend">';
            cols += '<span class="input-group-text">R$</span>';
            cols += '</div>';
            cols += '<input type="number" class="form-control text-right" id="price" >';
            cols += '</td>';

            cols += '<td>';
            cols += '<div class="input-group">';
            cols += '<div class="input-group-prepend">';
            cols += '<span class="input-group-text">R$</span>';
            cols += '</div>';
            cols += '<input type="text" class="form-control text-right" id="commission" name="commission[]" disabled>';
            cols += '</td>';

            cols += '<td>';
            cols += '<div class="input-group">';
            cols += '<div class="input-group-prepend">';
            cols += '<span class="input-group-text">R$</span>';
            cols += '</div>';
            cols += '<input type="text" class="form-control text-right" id="ammount" disabled>';
            cols += '</div>';
            cols += '</td>';
            
            cols += '<td><button type="button" class="btn btn-secundary" id="btn_del" onclick="remove(this)"><i class="fas fas fa-trash"></i></button></td>';
            newRow.append(cols);
            $(".table-condensed").append(newRow);
        });
        
     });
</script>
@stop
