@extends('welcome') 

@section('conteudo')

@php
function mask($val, $mask)
{
 $maskared = '';
 $k = 0;
 for($i = 0; $i<=strlen($mask)-1; $i++)
 {
   if($mask[$i] == '#')
   {
      if(isset($val[$k]))
       $maskared .= $val[$k++];
   }
   else
 {
     if(isset($mask[$i]))
     $maskared .= $mask[$i];
     }
 }
 return $maskared;
}
@endphp   
<div class="jumbotron">
<div class="row">
    <div class="col-md-12">
            <h3>Dados do Produto</h3>
            <div class="btn-group float-right mt-2">
                <button type="button" onClick='listItem()' class="btn btn-primary">Voltar</button>
                <button type="button" onClick='editItem(<?= $i->id ?>)' class="btn btn-secondary">Editar</button>
            </div>
    </div>
    </div>
        <div class="row">
            <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                <div class="container" style="border-bottom:1px solid black">
                <h2><?= $i->description ?></h2>
            </div>
                <hr>
                <ul class="container details">
                <li><p>Tipo: <?= $i->type ?></p></li>
                <li><p>NCM: <?= $i->ncm ?></p></li>
                <li><p>Unidade: <?= $i->unit ?></p></li>
                <li><p>Preço: <?= mask($i->price, '#.###,##') ?></p></li>
                <li><p>Quantidade: <?= $i->quantity ?></p></li>
                </ul>
            </div>
  </div>
 @stop
