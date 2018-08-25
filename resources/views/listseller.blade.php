@extends('welcome')

@section('conteudo')

<div class="row">
<button type="button" class="btn btn-primary ml-md-auto d-md-flex btadd">Adicionar</button>
</div>

@if(empty($produtos))
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
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td> <a class="editseller" href="#"><i class="fas fas fa-edit"></i></a></td>
                    <td> <a class="delseller" href="#"><i class="fas fas fa-trash"></i></a></td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>@fat</td>
                    <td> <a class="delseller" href="#"><i class="fas fas fa-edit"></i></a></td>
                    <td> <a class="delseller" href="#"><i class="fas fas fa-trash"></i></a></td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>@twitter</td>
                    <td> <a class="delseller" href="#"><i class="fas fas fa-edit"></i></a></td>
                    <td> <a class="delseller" href="#"><i class="fas fas fa-trash"></i></a></td>
                  </tr>
                </tbody>
              </table>
</div>
@endif
@stop