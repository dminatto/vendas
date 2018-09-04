@extends('welcome') 

@section('conteudo')

<div class="row">
    @if(isset($i->id))
        <h1>Edição de Item</h1>
    @else
        <h1>Cadastro de Item</h1>
    @endif
    <hr>
</div>
    @if(isset($i->id))
        <form id="myForm" class="needs-validation" action="/estoque/update/<?= $i->id ?>" method="post" novalidate>
    @else
        <form id="myForm" class="needs-validation" action="/estoque/adiciona" method="post" novalidate> 
    @endif
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <div class="form-row">
        <div class="col-md-3 mb-3">
            <label for="type">Tipo</label>
            <select class="form-control" name="type" value= <?= $i->type ?> required>
              <option></option>
              @foreach ($type as $key => $item)
                @if($item['value'] == $i->type)
                    <option selected value="<?= $item['value'] ?>"><?= $item['display'] ?></option>
                @else
                    <option value="<?= $item['value'] ?>"><?= $item['display'] ?></option>
                @endif
              @endforeach
            </select>
            <div class="invalid-feedback">
                Informe o tipo do item.
            </div>
        </div>
        <div class="col-md-9 mb-3">
            <label for="description">Descrição</label>
            <input type="text" class="form-control" name="description" value="<?= $i->description ?>" required>
            <div class="invalid-feedback">
                Informe a descrição do item.
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="ncm">NCM</label>
            <input type="text" class="form-control" id="ncm" name="ncm" value="<?= $i->ncm ?>" required>
            <div class="invalid-feedback">
                Informe um NCM para o item.
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <label for="unit">Unidade</label>
            <input type="text" class="form-control" name="unit" value="<?= $i->unit?>" required>
            <div class="invalid-feedback">
                Informe uma unidade para o item.
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <label for="price">Preço</label>
            <input type="number" class="form-control" id="price" step="any" name="price" value="<?= $i->price?>" required>
            <div class="invalid-feedback">
                Informe uma preço para o item.
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <label for="quantity">Quantidade</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $i->quantity?>" required>
            <div class="invalid-feedback">
                Informe uma unidade para o item.
            </div>
        </div>
    </div>
        
    <div class="btn-group float-right mt-2">
        <button type="button" onClick='listItem()' class="btn btn-primary">Cancelar</button>
        <button class="btn btn-success ml-md-auto d-md-flex" type="submit">Salvar</button>
    </div>
</form>

@stop
