@extends('welcome') 

@section('conteudo')

<div class="row">
    <h1>Listagem do Estoque</h1>
    <button type="button" onClick='addItem()' class="btn btn-primary ml-md-auto d-md-flex btadd">Adicionar</button>
</div>

@if(old('name'))
<div class="alert alert-success">
    <strong>Sucesso!</strong> O item {{ old('description') }} foi adicionado.
</div>
@endif 

@if(empty($items))
<div class="alert alert-danger" role="alert">
    Atenção! Não existem itens cadastrados!
</div>
@else
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Tipo</th>
                <th scope="col">Descrição</th>
                <th scope="col">Quantidade</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
          @foreach ($items as $i)
            <tr>
                <th scope="row"><?= $i->id ?></th>
                <td><?= $i->type ?></td>
                <td><?= $i->description ?></td>
                <td><?= $i->quantity ?></td>
                <td> <a class="detailitem" href="{{action('ItemController@detail', $i->id)}}"><i class="fas fa-search-plus"></i></a></td>
                <td> <a class="edititem" href="{{action('ItemController@edit', $i->id)}}"><i class="fas fas fa-edit"></i></a></td>
                <td> <a class="delitem" href="{{action('ItemController@delete', $i->id)}}"><i class="fas fas fa-trash"></i></a></td>
                <td> </td>   
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    @endif
</div>
 @stop
