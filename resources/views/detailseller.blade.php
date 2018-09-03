@extends('welcome') 

@section('conteudo')

 
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
                <li><p>CPF: <?= Helper::mask($s->cpf,'###.###.###-##') ?></p></li>
                <li><p>Data de Nascimento: <?= date_format(new DateTime($s->dtborn), "d/m/Y") ?></p></li>
                <li><p>Gênero: <?= $s->gender ?></p></li>
                <li><p>Telefone: <?= Helper::telephone($s->phone) ?></p></li>
                <li><p>Data de Contratação: <?= date_format(new DateTime($s->dtemployed), "d/m/Y") ?></p></li>
                </ul>
                <hr>
                <ul class="container details">
                <li><p>CEP: <?= Helper::mask($s->cep,'#####-###') ?></p></li>
                <li><p>Endereço: <?= $s->adress . ", " . $s->adressnumber ?></p></li>
                <li><p>Bairro: <?= $s->district ?></p></li>
                <li><p>Cidade: <?= $s->city ?></p></li>
                <li><p>Estado: <?= $s->state ?></p></li>
                </ul>
            </div>
  </div>
 @stop
