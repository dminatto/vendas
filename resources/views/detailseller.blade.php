@extends('welcome') 

@section('conteudo')

@php
function telephone($number){
    $number="(".substr($number,0,2).") ".substr($number,2,-4)." - ".substr($number,-4);
    // primeiro substr pega apenas o DDD e coloca dentro do (), segundo subtr pega os números do 3º até faltar 4, insere o hifem, e o ultimo pega apenas o 4 ultimos digitos
    return $number;
}

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
            <h3>Dados do Vendedor</h3>
            <div class="btn-group float-right mt-2">
                <button type="button" onClick='listSeller()' class="btn btn-primary">Voltar</button>
                <button type="button" onClick='editSeller(<?= $s->id ?>)' class="btn btn-secondary">Editar</button>
            </div>
    </div>
    </div>
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                <img src="https://www.svgimages.com/svg-image/s5/man-passportsize-silhouette-icon-256x256.png" alt="stack photo" class="img">
            </div>
            <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                <div class="container" style="border-bottom:1px solid black">
                <h2><?= $s->name ." ".$s->lastname ?></h2>
            </div>
                <hr>
                <ul class="container details">
                <li><p>CPF: <?= mask($s->cpf,'###.###.###-##') ?></p></li>
                <li><p>Data de Nascimento: <?= date_format(new DateTime($s->dtborn), "d/m/Y") ?></p></li>
                <li><p>Gênero: <?= $s->gender ?></p></li>
                <li><p>Telefone: <?= telephone($s->phone) ?></p></li>
                <li><p>Data de Contratação: <?= date_format(new DateTime($s->dtemployed), "d/m/Y") ?></p></li>
                </ul>
                <hr>
                <ul class="container details">
                <li><p>CEP: <?= mask($s->cep,'#####-###') ?></p></li>
                <li><p>Endereço: <?= $s->adress . ", " . $s->adressnumber ?></p></li>
                <li><p>Bairro: <?= $s->district ?></p></li>
                <li><p>Cidade: <?= $s->city ?></p></li>
                <li><p>Estado: <?= $s->state ?></p></li>
                </ul>
            </div>
  </div>
 @stop
