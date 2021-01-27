
@extends('layouts.app')

 @section('content')
    <script src="static/js/jquery.js"></script>

    <div class="panel-body">
        <form method="POST" action={{ route('login')}}>
            {{ csrf_field() }}
            <div id="login">
            {{-- <div></div> --}}
                <img id="logo-cliente" class="w3-margin-top" src="static/imagens/logo_cliente.jpg"/>
                <div class="form-group {{ $errors->has('login') ? 'has-error' : '' }}">
                    <input class="w3-input w3-border w3-margin-top" 
                            type="text"
                            name="login" 
                            value="{{ old('login') }}"
                            placeholder="Usuário">
                            {!! $errors->first('login', '<span class="help-block">:message</span>')!!}
                </div>
                
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input class="w3-input w3-border w3-margin-top" 
                            type="password" 
                            name="password" 
                            placeholder="password">
                            {!! $errors->first('password', '<span class="help-block">:message</span>')!!}
                </div>
                    
                <button class="w3-button w3-theme w3-margin-top w3-block">
                    Logar
                </button>
                
                    <a href="http://www.santri.com.br">
                        <img id="logo-santri" class="w3-right w3-margin-top" src="static/imagens/logo_santri.svg"/>
                    </a>
            </div>
        </form>
    </div>
   
@endsection