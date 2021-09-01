@extends('main') 

@section('content')
@include('flash')

<div class="card">
    <div class="card-header"><b>Filtrar estatísticas sobre o sistema</b></div>
    <div class="card-body">

    <form method="get" action="/estatisticas">
    @csrf
        <div class="row">
            <div class=" col-2 input-group">
            <input type="text" maxlength="4" class="form-control" name="busca_ano" value="{{Request()->busca_ano}}" placeholder="Busca por ano (ex: 2020)"
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">  

            <span class="input-group-btn">
                <button type="submit" class="btn btn-success"> Buscar </button>
            </span>
            </div>
        </div>
    </form>
    </div>
</div>

<br>

<div class="card">
    <div class="card-header">    
        @if($busca_ano)
        <b>Totais gerais da base de dados - Ano de {{$busca_ano}}</b>
        @else
        <b>Totais gerais da base de dados</b>
        @endif
    </div>

    <div class="row">
            <div class="col-sm form-group">
                <table class="table table-striped">
                    <tr>
                        <th>Estágios cadastrados:</th>
                        <td>{{ $total_estagios }}</td>
                    </tr>
                    @if($busca_ano == null)
                    <tr>
                        <th>Estágios em andamento:</th>
                        <td>{{ $total_concluidos }}</td>
                    </tr>
                    <tr>
                        <th>Estágios renovados:</th>
                        <td>{{ $total_renovados }}</td>
                    </tr>
                    <tr>
                        <th>Estágios rescindidos:</th>
                        <td>{{ $total_rescindidos }} </td>
                    </tr>
                    @endif
                    <tr>
                        <th>Empresas cadastradas:</th>
                        <td>{{ $total_empresas }}</td>
                    </tr>
                </table>
            </div>
            <!--
            <div class="col-sm form-group">
                <table class="table table-striped">
                    <tr>
                        <th>Estágiarios do curso de Ciências Humanas:</th>
                        <td></td> 
                    </tr>
                    <tr>
                        <th>Estágiarios do curso de Filosofia:</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Estágiarios do curso de Geografia:</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Estágiarios do curso de História:</th>
                        <td> </td>
                    </tr>
                    <tr>
                        <th>Estágiarios do curso de Letras:</th>
                        <td></td>
                    </tr>
                </table>
            </div>
            -->
        
        </div>

    </div>

    <br> Informações geradas ás {{ date("H:i"); }} do dia {{ date("d/m/Y")}} 
</div>

@endsection('content')