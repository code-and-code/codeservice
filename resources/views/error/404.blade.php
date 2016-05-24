<style>
    .center {text-align: center; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto;}
</style>

@extends('layout.app')

    @section('content')
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="hero-unit center">
                    <h1>Pagina não encontrada <small><font face="Tahoma" color="red">Error 404</font></small></h1>
                    <br />
                    <p>A página solicitada não pôde ser encontrado , entre em contato com o webmaster ou tente novamente. Use o seu navegador botão  <b>Voltar</b> do navegador até a página que você estava.</p>
                    <p> Ou se preferir apenas pressionar este botão</p>
                    <a href="/categories" class="btn btn-large btn-info"><i class="icon-home icon-white"></i>Home</a>
                </div>
                <br />
            </div>
        </div>
    </div>
@endsection
