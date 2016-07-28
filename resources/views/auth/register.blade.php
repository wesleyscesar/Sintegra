@extends('master')

@section('container')
    <form method="POST" action="/auth/register">
        {!! csrf_field() !!}


        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    Nome: <br>
                    <input type="text" size="100%" name="name" placeholder="Nome: ">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    E-mail: <br>
                    <input type="email" name="email" size="100%" placeholder="E-mail: ">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    Senha: <br>
                    <input type="password" size="100%" name="password" placeholder="Senha: ">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    Confirmar Senha: <br>
                    <input type="password" size="100%" name="password_confirmation" placeholder="Confirmar Senha: ">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <button type="submit">Cadastrar</button>
                </div>
            </div>
        </div>

    </form>
@endsection