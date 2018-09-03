@extends('welcome') 

@section('conteudo')

<div class="row">
    <h1>Listagem de Vendas</h1>
    <button type="button" onClick='addSale()' class="btn btn-primary ml-md-auto d-md-flex btadd">Adicionar</button>
</div>

@if(old('name'))
<div class="alert alert-success">
    <strong>Sucesso!</strong> O venda {{ old('name') }} foi realizada com sucesso.
</div>
@endif 

@if($sales->count() == 0)
<div class="alert alert-danger" role="alert">
    Atenção! Não existem vendas realizadas!
</div>
@else
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Data da Venda</th>
                <th scope="col">Número</th>
                <th scope="col">Vendedor</th>
                <th scope="col">Valor</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
          @foreach ($sales as $s)
            <tr>
                <td><?= date_format(new DateTime($s->dtsale), "d/m/Y") ?></td>
                <th> <?= $s->id ?> </th>
                <td> <?= $s->seller->name . " ". $s->seller->lastname ?></td>
                <td> <?= $s->value ?> </td>
                <td> <a class="editsele" href="{{action('SaleController@detail', $s->id)}}"><i class="fas fa-search-plus"></i></a></td>
                <td> <a class="editsele" href="{{action('SaleController@edit', $s->id)}}"><i class="fas fas fa-edit"></i></a></td>
                <td> <a class="delsele" href="{{action('SaleController@delete', $s->id)}}"><i class="fas fas fa-trash"></i></a></td>
                <td> </td>   
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    @endif
</div>
 @stop
