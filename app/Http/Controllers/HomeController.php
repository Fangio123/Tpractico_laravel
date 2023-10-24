<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatoDeposito;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=Auth::user();

        $dashboard_usuarios = DatoDeposito::all();

        return view ('home',compact('dashboard_usuarios'),compact('user'));
    }

    public function guardar_producto(request $request){

        $user = new DatoDeposito();
        $user -> Producto = $request->input('producto');
        $user -> Cantidad = $request->input('cantidad');
        $user -> Precio = $request->input('precio');
        $user->save();

        return redirect()->route('home');



    }

    public function borrar_producto($id){
        $user = DatoDeposito::findOrfail($id);
        $user->delete();

        return redirect()->route('home')->with('success',' Se eliminó el producto seleccionado');

    }



    public function modificar_producto($id){
        $user = DatoDeposito::findOrfail($id);

        return view('form_modificar',compact('user'));

    }


    public function actualizar_producto(request $request , $id){

        $user = DatoDeposito::findOrfail($id);
        $user -> Producto = $request->input('producto');
        $user -> Cantidad = $request->input('cantidad');
        $user -> Precio = $request->input('precio');
        $user->save();

        return redirect()->route('home');
    }

        public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

        public function gestion_usurios (){


            $usuarios=User::all();

            return view ('vistausuarios',compact('usuarios'));

    }
    public function guardar_usuario(request $request){

        $user = new User();
        $user -> name = $request->input('name');
        $user -> email = $request->input('email');
        $user -> password = $request->input('password');
        $user->save();

        return redirect()->route('home');



    }

}
