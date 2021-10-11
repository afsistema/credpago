@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Visualização de URL Cadastrada com Sucesso') }}
                    <a href="{{ url('/url') }}" class="btn btn-info" style="float: right">
                        Voltar
                    </a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="">
                        {{ csrf_field() }}
                        <div class="mb-3">
                          <label class="form-label">URL:</label>
                          
                          {{ $url->endereco ?? '' }}
                         
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Conteúdo da URL:</label>
                            
                           {{ $url->lastLog()->conteudo }}
                           
                        </div>
                        <a href="{{ url('/url') }}" class="btn btn-info">
                            Voltar
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
