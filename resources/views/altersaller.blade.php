@extends('welcome') 

@section('conteudo')

<div class="row">
    @if(isset($s->id))
        <h1>Edição de Vendedores</h1>
    @else
        <h1>Cadastro de Vendedores</h1>
    @endif
    <hr>
</div>
    @if(isset($s->id))
        <form id="myForm" class="needs-validation" action="/vendedores/update/<?= $s->id ?>" method="post" novalidate>
    @else
        <form id="myForm" class="needs-validation" action="/vendedores/adiciona" method="post" novalidate> 
    @endif
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" value="<?= $s->name ?>" required>
            <div class="invalid-feedback">
                Informe o nome do vendedor.
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="lastname">Sobrenome</label>
            <input type="text" class="form-control" name="lastname" value="<?= $s->lastname ?>" required>
            <div class="invalid-feedback">
                Informe o sobrenome do vendedor.
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="<?= $s->cpf ?>" required>
            <div class="invalid-feedback">
                Informe um CPF para o vendedor.
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <label for="dtborn">Data de Nascimento</label>
            <input type="date" class="form-control" name="dtborn" value="<?= $s->dtborn?>" required>
            <div class="invalid-feedback">
                Informe a data de nascimento do vendedor.
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <label for="gender">Gênero </label>
            <select class="form-control" name="gender" id="gender" required>
            <option></option>
                @foreach ($gender as $key => $item)
                    @if($item['value'] == $s->gender)
                        <option selected value="<?= $item['value'] ?>"><?= $item['display'] ?></option>
                    @else
                        <option value="<?= $item['value'] ?>"><?= $item['display'] ?></option>
                    @endif
                @endforeach
            </select>
            <div class="invalid-feedback">
                Informe o gênero do vendedor.
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <label for="phone">Telefone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?= $s->phone?>" required>
            <div class="invalid-feedback">
                Informe o telefone do vendedor.
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <label for="dtemployed">Data de Contratação</label>
            <input type="date" class="form-control" name="dtemployed" value="<?= $s->dtemployed?>" required>
            <div class="invalid-feedback">
                Informe a data de contratação do vendedor.
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 mb-3">
            <label for="cep">CEP</label>
            <div class="input-group">
                <input type="text" class="form-control" id="cep" name="cep" value="<?= $s->cep?>" required>
                <span class="input-group-btn">
                    <button class="btn btn-secondary my-2 my-sm-0"><i class="fas fa-search"></i></button>
                </span>
                <div class="invalid-feedback">
                    Informe um CEP para o vendedor.
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="adress">Endereço</label>
            <input type="text" class="form-control" name="adress" value="<?= $s->adress?>" required>
            <div class="invalid-feedback">
                Informe o endereço para o vendedor.
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <label for="adressnumber">Numero</label>
            <input type="text" class="form-control" id="adressnumber" name="adressnumber" value="<?= $s->adressnumber?>" required>
            <div class="invalid-feedback">
                Informe o numero do endereço do vendedor.
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="district">Bairro</label>
            <input type="text" class="form-control" name="district" value="<?= $s->district?>" required>
            <div class="invalid-feedback">
                Informe um Bairro para o vendedor.
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="city">Cidade</label>
            <input type="text" class="form-control" name="city" value="<?= $s->city?>" required>
            <div class="invalid-feedback">
                Informe uma cidade para o vendedor.
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="state">Estado</label>
            <select class="form-control" name="state" id="state" required>
                <option></option>
                @foreach ($state as $key => $item)
                    @if($item['value'] == $s->state)
                        <option selected value="<?= $item['value'] ?>"><?= $item['display'] ?></option>
                    @else
                        <option value="<?= $item['value'] ?>"><?= $item['display'] ?></option>
                    @endif
                @endforeach
            </select>
            <div class="invalid-feedback">
                Informe um estado para o vendedor.
            </div>
        </div>
    </div>
    <div class="btn-group float-right mt-2">
        <button type="button" onClick='listSeller()' class="btn btn-primary">Cancelar</button>
        <button class="btn btn-success ml-md-auto d-md-flex" type="submit">Salvar</button>
    </div>
</form>

<script>
    $("#myForm").submit(function() {
        $("#cpf").unmask();
        $("#phone").unmask();
        $("#cep").unmask();
        $("#adressnumber").unmask();
    });
    
    $(document).ready(function () { 
        $("#cpf").mask('000.000.000-00', {reverse: true});
        $('#phone').mask('(00) 0000-0000');
        $('#cep').mask('00000-000');
        $('#adressnumber').mask('000000');
    });
</script>
@stop
