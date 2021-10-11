@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('URLs Cadastradas') }}
                    <a href="{{ url('/url/create/0') }}" class="btn btn-info" style="float: right">
                        + Novo
                    </a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>URL</th>
                                <th style="width: 5%">STATUS</th>
                                <th style="width: 5%">AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($urls as $url)
                            <tr>
                                <td>
                                    {{ $url->endereco }}
                                </td>
                                <td>
                                    {!! $url->lastLog()->badge ?? '' !!}
                                </td>
                                <td nowrap style="text-align: right">
                                  
                                    @if(isset($url->lastLog()->badge))
                                        @if($url->lastLog()->status == '200')                                       
                                            <a href="{{ url('/url') }}/show/{{ $url->id }}" class="btn btn-success">
                                                Detalhes
                                            </a>
                                        @endif                                   
                                    @endif
                                    <a href="{{ url('/url') }}/create/{{ $url->id }}" class="btn btn-secondary">
                                        Editar
                                    </a>                                                                  
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-center">
                    {{ $urls->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
