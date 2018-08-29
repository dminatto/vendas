@extends('welcome') 

@section('conteudo')

@php
function telephone($number){
    $number="(".substr($number,0,2).") ".substr($number,2,-4)." - ".substr($number,-4);
    // primeiro substr pega apenas o DDD e coloca dentro do (), segundo subtr pega os números do 3º até faltar 4, insere o hifem, e o ultimo pega apenas o 4 ultimos digitos
    return $number;
}
@endphp

<div class="row">
    <h1>Listagem de Vendedores</h1>
    <button type="button" onClick='addSeller()' class="btn btn-primary ml-md-auto d-md-flex btadd">Adicionar</button>
</div>

@if(old('name'))
<div class="alert alert-success">
    <strong>Sucesso!</strong> O vendedor {{ old('name') }} foi adicionado.
</div>
@endif 

@if(empty($sellers))
<div class="alert alert-danger" role="alert">
    Atenção! Não existem vendedores cadastrados!
</div>
@else
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nome</th>
                <th scope="col">Sobrenome</th>
                <th scope="col">Telefone</th>
                <th scope="col">Data Contratação</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
          @foreach ($sellers as $s)
            <tr>
                <th scope="row"><?= $s->id ?></th>
                <td><?= $s->name ?></td>
                <td><?= $s->lastname ?></td>
                <td id="phone"><?= telephone($s->phone) ?></td>
                <td id="dtemployed" ><?= date_format(new DateTime($s->dtemployed), "d/m/Y") ?></td>
                <td> <a class="editseller" href="{{action('SellerController@detail', $s->id)}}"><i class="fas fa-search-plus"></i></a></td>
                <td> <a class="editseller" href="{{action('SellerController@edit', $s->id)}}"><i class="fas fas fa-edit"></i></a></td>
                <td> <a class="delseller" href="{{action('SellerController@delete', $s->id)}}"><i class="fas fas fa-trash"></i></a></td>
                <td> </td>   
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    @endif
</div>
 @stop
