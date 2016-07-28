@extends('master')

@section('container')

    <div class="row">
        {!! Form::open(['route' => 'pesquisar', 'method'=>'post']) !!}
        <div class="col-lg-4">
            <div class="form-group">
                <label for="nome">CNPJ</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="cnpj" placeholder="CNPJ" value="{{ $dados->cnpj }}">
                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <button style="margin-top: 25px;" type="submit" class="btn btn-primary"><i class="fa fa-fw fa-search "></i></button>
            </div>
        </div>
        {!! Form::close() !!}

        <div class="col-lg-2">
            <div class="form-group">
                <a href="/consultar" style="margin-top: 25px;" type="submit" class="btn btn-primary" >Consultas Anteriores</a>
            </div>
        </div>
    </div>

    <div  style="padding-top: 10px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nome">CNPJ</label>
                        <input type="text" class="form-control" name="cnpj" placeholder="CNPJ" value="{{ $dados->cnpj }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nome">Inscrição Estadual</label>
                        <input type="text" class="form-control" name="cnpj" placeholder="Inscrição Estadual" value="{{ $dados->ie }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="nome">Razão Social</label>
                        <input type="text" class="form-control" name="cnpj" placeholder="Razão Social" value="{{ $dados->rsocial }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="nome">Logradouro</label>
                        <input type="text" class="form-control" name="cnpj" placeholder="Logradouro" value="{{ $dados->logradouro }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nome">Numero</label>
                        <input type="text" class="form-control" name="cnpj" placeholder="Numero" value="{{ $dados->numero}}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nome">Complemento</label>
                        <input type="text" class="form-control" name="cnpj" placeholder="Complemento" value="{{ $dados->complemento }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="nome">Bairro</label>
                        <input type="text" class="form-control" name="cnpj" placeholder="Bairro" value="{{ $dados->bairro }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nome">Municipio</label>
                        <input type="text" class="form-control" name="cnpj" placeholder="Municipio" value="{{ $dados->municipio }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nome">UF</label>
                        <input type="text" class="form-control" name="cnpj" placeholder="UF" value="{{ $dados->uf }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nome">CEP</label>
                        <input type="text" class="form-control" name="cnpj" placeholder="CEP" value="{{ $dados->cep }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nome">Telefone</label>
                        <input type="text" class="form-control" name="cnpj" placeholder="Telefone" value="{{ $dados->telefone }}">
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

