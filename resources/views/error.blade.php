@extends('welcome') 

@section('conteudo')
<section class="error_section">
      <p class="error_section_subtitle">Opps! <?= $cause ?></p>
      <h1 class="error_title">
        <p>404</p>
        404
      </h1>
      <a href="{{action('Auth\LoginController@index')}}" class="btn btn_error">Voltar para a pagina inicial</a>
    </section>
@end