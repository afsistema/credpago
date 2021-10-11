@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Cadastro de URL') }}
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
                          <label for="endereco" class="form-label">Endereço do Site</label>
                          <input type="url" class="form-control" name="endereco" id="endereco" required
                            value="{{ $url->endereco ?? '' }}"
                          >
                        </div>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
