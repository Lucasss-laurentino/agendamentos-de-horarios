<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Horario;

use App\Models\Usuario;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;

use App\Mail\Redefinir;

class UserController extends Controller
{

    // ------------- FORMULARIOS ---------------------------------------------------
    public function index() {
        return view('welcome');
    }

    public function login() {
        return view('login');
    }

    public function cadastrar() {
        return view('cadastrar');
    }
    // ------------------------------------------------------------------------------

    // ------------------- Cadastrando usuário --------------------------------------
    public function store(Request $request) {

        if (\DB::table('users')->where('email', $request->email)->count() == 1) {

            echo 'false';
        
        } else {
        
            $usuario = new Usuario;
            $usuario->name = $request->name;
            $usuario->email = $request->email;
            $usuario->password = Hash::make($request->password);
            $usuario->save();

            echo 'true';
        
        }
    }
    // --------------------------------------------------------------------------------

    // ------------------ Autenticando usuario -----------------------------------------
    public function auth(Request $request) {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            
            $usuario= Usuario::where('email', $request->email)->first()->toArray();
            $request->session()->put('usuario', $usuario);

            echo 'true';

        } else {

            echo 'false';

        }

    }
    // -----------------------------------------------------------------------------------

    // ----------Exibir tabela com horários disponíveis ou horario marcado---------------
    public function home(Request $request) {

        $user = Usuario::where('id', session()->get('usuario')['id'])->first()->toArray();

        $request->session()->put('usuario', $user); 
        
        if(empty(session()->get('usuario'))):

            return redirect('/');

        elseif (!empty(session()->get('usuario')) && session()->get('usuario')['admin'] == 1):

            return view('horarios_usuarios');

        elseif (!empty(session()->get('usuario')) && session()->get('usuario')['marcado'] == 0):

            $horarios = \DB::table('horarios')->where('reservado', '0')->simplePaginate(3);

            return view('home', [
                'horarios' => $horarios
            ]);
            
        elseif (!empty(session()->get('usuario')) && session()->get('usuario')['marcado'] == 1):

            $hora_marcada = Horario::where('hora', session()->get('usuario')['horario_marcada'])->first()->toArray();
            $request->session()->put('horario', $hora_marcada); 
            $hora = session()->get('horario');
            
            return view('meu_horario', [
                'hora' => $hora
            ]);
        

        endif;
    
    }
    // -------------------------------------------------------------------------------------

    //----------- Atualizar horario e usuario como marcado e reservado no banco ------------
    public function update(Request $request, $id) {
        
        if (!empty(session()->get('usuario'))) {

            $horarios = Horario::where('id', $id)->first()->toArray();

            if (!empty($horarios) || $horarios['reservado'] == 0 || session()->get('usuario')['marcado'] == 0){

                Horario::where('id', $horarios['id'])->update(['reservado' => 1]);                
                Usuario::where('id', session()->get('usuario')['id'])->update(['marcado' => 1]);
                Usuario::where('id', session()->get('usuario')['id'])->update(['horario_marcada' => $horarios['hora']]);            

                $usuario = Usuario::where('email', session()->get('usuario')['email'])->first()->toArray();
                $request->session()->put('usuario', $usuario);

                $hora = Horario::where('id', $id)->first()->toArray();
                $request->session()->put('horario', $hora);
                
                return redirect('/home');

            } else if (empty($horarios) || $horarios['reservado'] == 1 || session()->get('usuario')['marcado'] == 1 ) {

                return redirect('/home');

            }

        }  else {

            return redirect('/');
        }


    }
    // -------------------------------------------------------------------------------------------
    
    // ---------------------------------------------- Sair -----------------------------------------
    public function logout() {

        session()->flush('usuario');
        session()->flush('horario');
        
        return redirect('/');

    }
    // ---------------------------------------------------------------------------------------------

    // ---------------------------------- Desmarcar horario -----------------------------------------
    public function desmarcar(Request $request, $id) {
        
        if (!empty(session()->get('usuario'))):

            Horario::where('id', $id)->update(['reservado' => 0]);
            Usuario::where('id', session()->get('usuario')['id'])->update(['marcado' => 0]);
            Usuario::where('id', session()->get('usuario')['id'])->update(['horario_marcada' => '']);
    
            $usuario = Usuario::where('email', session()->get('usuario')['email'])->first()->toArray();
            $request->session()->put('usuario', $usuario);

            $hora = Horario::where('id', $id)->first()->toArray();
            $request->session()->put('horario', $hora);

            return redirect('/home');
            
        else:

            return redirect('/');
        
        endif;

    }
    
    // ---------------- exibir view pra recuperação de senha --------------------------
    public function recuperar() {
        return view('recuperar'); 
    }
    //--------------------------------------------------------------------------------------

    // ------------------------- enviar email pra redefinir senha ----------------------------
    public function enviar(Request $request) {

        if (\DB::table('users')->where('email', $request->email)->count() == 1) {
            
            $email_usuario = $request->email;
            $url = 'http://127.0.0.1:8000/form_redefinir';
            Mail::to($email_usuario)->send(new Redefinir($email_usuario, $url));

            $request->session()->put('redefinir', 'true');

            $email_solicitado = Usuario::where('email', $request->email)->first()->toArray();
            $request->session()->put('email_solicitado', $email_solicitado);

            echo 'true';
            
        } else {
            echo 'false';
        }
        
    }

    public function form_redefinir() {
        return view('redefinir_senha_formulario');
    }
    // -----------------------------------------------------------------------------------------------

    // --------------------------------------------- atualizar senha ---------------------------------
    public function redefinir(Request $request) {

        if(\DB::table('users')->where('email', $request->email)->count() == 1) {

            if ($request->email === session()->get('email_solicitado')['email']) {

                Usuario::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

                echo 'true';
    
            } else {
                echo 'false';
            }

        } else {
        
            echo 'false';
        
        }

    }

    public function dados_horas() {
        
        $horarios = \DB::table('horarios')->simplePaginate(3);

        return view('todos_horarios', [
            'horarios' => $horarios
        ]);
    }

    public function excluir(Request $request, $id) {

        if (session()->get('usuario') && session()->get('usuario')['admin'] == 1) {
    
            $hora = Horario::where('id', $id)->first()->toArray();
        
            if (!empty($hora) && session()->get('usuario')['admin'] == 1){
                
                if ($hora['reservado'] == 1) {

                    Usuario::where('horario_marcada', $hora['hora'])->update(['marcado' => 0]);
                    Usuario::where('horario_marcada', $hora['hora'])->update(['horario_marcada' => '']);

                    Horario::where('id', $hora['id'])->delete();
                
                    return redirect('/todos_horarios');

                } else {

                    Horario::where('id', $hora['id'])->delete();
                
                    return redirect('/todos_horarios');
                
                }            
            }

        } else {

            return redirect('/');
        
        }
    }

    public function adicionar() {
        
        if (session()->get('usuario') && session()->get('usuario')['admin'] == 1) {

            return view('adicionar');
    
        } else {

            return redirect('/');

        }

    }

    public function cadastrar_hora(Request $request) {

        if (session()->get('usuario') && session()->get('usuario')['admin'] == 1) {

            if (\DB::table('horarios')->where('hora', $request->hora)->count() == 1) {

                echo 'false';
            
            } else {
            
                $horario = new Horario;
                $horario->hora = $request->hora;
                $horario->save();
    
                echo 'true';
            }

        } else {

            return redirect('/');

        }
    
    }

    public function todos_usuarios() {
        
        $usuarios = \DB::table('users')->simplePaginate(3);

        return view('todos_usuarios', [

            'usuarios' => $usuarios
        
        ]);
    }

    public function excluir_usuario(Request $request, $id) {

        if (session()->get('usuario') && session()->get('usuario')['admin'] == 1) {
    
            $usuario = Usuario::where('id', $id)->first()->toArray();
        
            if (!empty($usuario) && session()->get('usuario')['admin'] == 1){
                
                if ($usuario['marcado'] == 1) {

                    Horario::where('hora', $usuario['horario_marcada'])->update(['reservado' => 0]);

                    Usuario::where('id', $usuario['id'])->delete();
                
                    return redirect('/todos_usuarios');

                } else {

                    Usuario::where('id', $usuario['id'])->delete();
                
                    return redirect('/todos_usuarios');
            
                }
            }
        } else {

            return redirect('/');
        
        }
    }

    // ----------------------------- DESMARCAR HORARIO QUE ADM QUISER -------------------------

    public function desmarcar_adm($id) {

        $horario = Horario::where('id', $id)->first()->toArray();
        $usuario = Usuario::where('horario_marcada', $horario['hora'])->first()->toArray();
        
        Horario::where('id', $horario['id'])->update(['reservado' => 0]);
        Usuario::where('id', $usuario['id'])->update(['marcado' => 0]);
        Usuario::where('id', $usuario['id'])->update(['horario_marcada' => '']);

        return redirect('/todos_horarios');
    }
}
