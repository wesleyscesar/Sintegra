@extends('master')

@section('container')

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>CNPJ</th>
                        <th>Ver</th>
                        <th>Excluir</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dados as $dado)
                        <tr>
                            <td width="40%">{{ $dado->created_at->format('d-m-Y') }}</td>
                            <td width="20%">{{ $dado->cnpj }}</td>
                            <td width="1%" align="center"><a class="btn btn-primary btn-sm" href="/alunos/edit/{{ $dado->id }}" role="button"><i class="fa fa-fw fa-search"></i></a></td>
                            <td width="1%" align="center"><a class="btn btn-danger btn-sm" href="/consultar/remover/{{ $dado->id }}" role="button"><i class="fa fa-fw fa-trash-o"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection