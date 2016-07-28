@extends('master')

@section('container')
<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Logar</div>
            <div class="panel-body">
                <fieldset>
                    {!! Form::open(['route' => 'auth.login', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}
                    <div class="form-group">
                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="remember" type="checkbox" value="Remember Me">Esqueci minha Senha
                        </label>
                    </div>

                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                {!! Form::submit('Entrar', ['class'=>'btn btn-default']) !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </fieldset>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->
@endsection
