@extends('layouts.app')

@section('content')
     <script src="static/js/jquery.js"></script>
    <div>
        <div id="lista_usuarios" class="w3-margin">
         
    <form method="POST" action={{ route('cadastro.index')}}>
     {{ csrf_field() }}
         <input class="w3-input w3-border w3-margin-top" type="text" name ="search" placeholder="search" value="{{$search}}">
            <button class="w3-button w3-theme w3-margin-top" type="submit">Buscar</button>
             <a data-toggle="modal" href="#new-contract" class="btn btn-info text-left btn-right-header btn-sm"> <button class="w3-button w3-theme w3-margin-top w3-right">Cadastrar novo usuário</button></a>
    </form>  
            <table>
            <thead>
                <tr>
                <th>#</td>
                <th>Nome</td>
                <th>Login</td>
                <th>Ativo</td>
                <th>Opções</td>  
                </tr>
            </thead>
            <tbody>

            @forelse($users as $user)
                <tr>
                <td>
                    <a href="{!! route('cadastro.show', $user->id) !!}" class="btn-sm btn-link">{!!$user->id!!}</a>
                </td>
                <td>
                    <a href="{!! route('cadastro.show', $user->id) !!}" class="btn-sm btn-link">{!!$user->nome_completo!!}</a>
                </td>
                <td>
                    <a href="{!! route('cadastro.show', $user->id) !!}" class="btn-sm btn-link">{!!$user->login!!}</a>
                </td>
                <td>
                    <a href="{!! route('cadastro.show', $user->id) !!}" class="btn-sm btn-link">{!!$user->ativo!!}</a>
                </td>
                <td>
                     <a href="{!! route('cadastro.destroy', $user->id) !!}" 
                        data-method="delete">
                     <button type="submit" class="w3-button w3-theme w3-margin-top">
                        <i class="fas fa-user-times"></i></button>
                    </a>
                    <a href="{!! route('cadastro.show', $user->id) !!}">
                        <button class="w3-button w3-theme w3-margin-top">
                            <i class="fas fa-edit"></i>
                        </button>
                    </a>
                </td>
                 @empty
                    <tr>
                        <td colspan="5">
                            <div class="text-center">
                                Nenhum usuário até o momento.
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
            </table>
        </div>
    </div>
@endsection