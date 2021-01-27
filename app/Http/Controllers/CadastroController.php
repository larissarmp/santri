<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;

class CadastroController extends Controller
{

    public function __contruct()
    {
        $this->middleware('auth');
    }

     /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        $search = $request->get('search');
        $query = User::query();
        $users = $query->paginate(100);
        $users->appends('q', $request->input('q'));

       
        return view('cadastro', compact('users','search'));
    }

    public function show($id) {
        try {
            $user = User::findOrFail($id);
            return view('single', compact('user'));
        } catch (ModelNotFoundException $e) {

            return redirect()
                ->route("cadastro")
                ->withErrors("Usuário não encontrado.");
        }
    }

    public function busca(Request $request)
    {

        $user = User::busca($request->nome_completo);

        return view('cadastro');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'login' => 'unique:users',
            'ativo' => 'required',
        ]);

        /** @var string $nome */
        /** @var string $login */
        /** @var string $ativo */
        extract($request->all());

        $user = new User();
        $user->nome = $nome;
        $user->login = $login;
        $user->password = Str::random(10);
        $user->ativo = User::ENABLED;

        \DB::transaction(function () use ($user) {
            $user->save();

        });
        

        return redirect()->route("cadastro", $user->id)
            ->withFlashSuccess("Usuário Criado com Sucesso");
    }
    public function update(Request $request, $id)
    {
       
            
             /** @var string $nome_completo */
            /** @var string $login */
            /** @var string $ativo */
            extract($request->all());
          
            $user = User::findOrFail($id);
            $user->nome_completo = $nome_completo;
            $user->login = $login;
            $user->password = Str::random(10);
            $user->ativo = User::ENABLED;
            
            \DB::transaction(function () use ($user) {

                $user->save();
            });

            return redirect()->back()
                ->withFlashSuccess("criado com Sucesso");

    }

    public function destroy($id)
    {
            /** @var User $user */
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route("cadastro")
                ->withFlashSuccess("deletado com sucesso.");
      
    }
}
