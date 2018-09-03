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
            <select class="form-control" name="gender" value=<?= $s->gender ?> required>
              <option></option>
              <option value="M">Masculino</option>
              <option value="F">Feminino</option>
              <option value="O">Outro</option>
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
            <select class="form-control" name="state" id="state"  value="<?= $s->state?>" required>
            
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

        var comboCity = document.getElementById("state");
        
        var opt0 = document.createElement("option");
        opt0.value = "";
        opt0.text = "";
        comboCity.add(opt0, comboCity.options[0]);

        var opt1 = document.createElement("option");
        opt1.value = "AC";
        opt1.text = "Acre";
        comboCity.add(opt1, comboCity.options[1]);

        var opt2 = document.createElement("option");
        opt2.value = "AL";
        opt2.text = "Alagoas";
        comboCity.add(opt2, comboCity.options[2]);

        var opt3 = document.createElement("option");
        opt3.value = "AP";
        opt3.text = "Amapá";
        comboCity.add(opt3, comboCity.options[3]);

        var opt4 = document.createElement("option");
        opt4.value = "AM";
        opt4.text = "Amazonas";
        comboCity.add(opt4, comboCity.options[4]);

        var opt5 = document.createElement("option");
        opt5.value = "BA";
        opt5.text = "Bahia";
        comboCity.add(opt5, comboCity.options[5]);

        var opt6 = document.createElement("option");
        opt6.value = "CE";
        opt6.text = "Ceará";
        comboCity.add(opt6, comboCity.options[6]);

        var opt7 = document.createElement("option");
        opt7.value = "DF";
        opt7.text = "Distrito Federal";
        comboCity.add(opt7, comboCity.options[7]);

        var opt8 = document.createElement("option");
        opt8.value = "ES";
        opt8.text = "Espírito Santo";
        comboCity.add(opt8, comboCity.options[8]);

        var opt9 = document.createElement("option");
        opt9.value = "GO";
        opt9.text = "Goiás";
        comboCity.add(opt9, comboCity.options[9]);

        var opt10 = document.createElement("option");
        opt10.value = "MA";
        opt10.text = "Maranhão";
        comboCity.add(opt10, comboCity.options[10]);

        var opt11 = document.createElement("option");
        opt11.value = "MT";
        opt11.text = "Mato Grosso";
        comboCity.add(opt11, comboCity.options[11]);

        var opt12 = document.createElement("option");
        opt12.value = "MS";
        opt12.text = "Mato Grosso do Sul";
        comboCity.add(opt12, comboCity.options[12]);

        var opt13 = document.createElement("option");
        opt13.value = "MG";
        opt13.text = "Minas Gerais";
        comboCity.add(opt13, comboCity.options[13]);

        var opt14 = document.createElement("option");
        opt14.value = "PA";
        opt14.text = "Pará";
        comboCity.add(opt14, comboCity.options[14]);

        var opt15 = document.createElement("option");
        opt15.value = "PB";
        opt15.text = "Paraíba";
        comboCity.add(opt15, comboCity.options[15]);

        var opt16 = document.createElement("option");
        opt16.value = "PR";
        opt16.text = "Paraná";
        comboCity.add(opt16, comboCity.options[16]);

        var opt17 = document.createElement("option");
        opt17.value = "PE";
        opt17.text = "Pernambuco";
        comboCity.add(opt17, comboCity.options[17]);

        var opt18 = document.createElement("option");
        opt18.value = "PI";
        opt18.text = "Piauí";
        comboCity.add(opt18, comboCity.options[18]);

        var opt19 = document.createElement("option");
        opt19.value = "RJ";
        opt19.text = "Rio de Janeiro";
        comboCity.add(opt19, comboCity.options[19]);

        var opt20 = document.createElement("option");
        opt20.value = "RN";
        opt20.text = "Rio Grande do Norte";
        comboCity.add(opt20, comboCity.options[20]);

        var opt21 = document.createElement("option");
        opt21.value = "RS";
        opt21.text = "Rio Grande do Sul";
        comboCity.add(opt21, comboCity.options[21]);

        var opt22 = document.createElement("option");
        opt22.value = "RO";
        opt22.text = "Rondônia";
        comboCity.add(opt22, comboCity.options[22]);

        var opt23 = document.createElement("option");
        opt23.value = "RR";
        opt23.text = "Roraima";
        comboCity.add(opt23, comboCity.options[23]);

        var opt24 = document.createElement("option");
        opt24.value = "SC";
        opt24.text = "Santa Catarina";
        comboCity.add(opt24, comboCity.options[24]);

        var opt25 = document.createElement("option");
        opt25.value = "SP";
        opt25.text = "São Paulo";
        comboCity.add(opt25, comboCity.options[25]);

        var opt26 = document.createElement("option");
        opt26.value = "SE";
        opt26.text = "Sergipe";
        comboCity.add(opt26, comboCity.options[26]);

        var opt26 = document.createElement("option");
        opt26.value = "TO";
        opt26.text = "Tocantins";
        comboCity.add(opt26, comboCity.options[26]);

        

});

</script>
@stop
