@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('logout') }}">
     {{csrf_field()}}
     <button class="w3-button w3-theme w3-margin-top w3-margin-bottom w3-right"> logout</button>
    </form>
        

        <script src="static/js/jquery.js"></script>
         <form role="form" method="post" action="{!! route('cadastro.update', $user->id) !!}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
            <div id="lista_usuarios" class="w3-margin">

            <h4>Editar de usuário {!!$user->id!!}</h4>
            <div>
                <label>Nome</label>
                <input type="text" name="nome_completo" value="{!! $user->nome_completo!!}" class="w3-input w3-block w3-border">
            </div>

            <div>
                <label>Login</label>
                <input type="text" name="login" value="{!! $user->login!!}" class="w3-input w3-block w3-border">
            </div>

            <div>
                <label>Ativo</label>
                <input type="text" name="ativo" value="{!! $user->ativo!!}" class="w3-input w3-block w3-border">
            </div>

            <ul>
            <button  type="submit" class="w3-button w3-theme w3-margin-top w3-margin-bottom">Gravar</button>
            <button class="w3-button w3-margin-top w3-margin-bottom w3-right">Cancelar</button>

            </div>
        </div>
  </form>
@endsection