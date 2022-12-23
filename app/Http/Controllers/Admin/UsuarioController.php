<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Papel;
use Gate;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::allows('usuarios-view')){
            $usuarios = User::orderBy('name')->get();
            $caminhos = [
                ['url'=>'/admin', 'titulo'=>'Admin'],
                ['url'=>'', 'titulo'=>'Usuários'],
            ];
            return view('admin.usuarios.index',compact('usuarios','caminhos'));
        }
        return redirect()->back();
    }

    public function papel($id)
    {
        if(Gate::allows('usuario-edit')){
            $usuario = User::find($id);
            $papel = Papel::all();
                    $caminhos = [
                ['url'=>'/admin', 'titulo'=>'Admin'],
                ['url'=>route('usuarios.index'), 'titulo'=>'Usuários'],
                ['url'=>'', 'titulo'=>'Papel'],
            ];
            return view('admin.usuarios.papel',compact('usuario','papel','caminhos'));
        }
        return redirect()->back();
    }

    public function papelStore(Request $request,$id)
    {
        if(Gate::allows('usuario-edit')){
            $usuario = User::find($id);
            $data = $request->all();

            $papel = Papel::find($data['papel_id']);
            $usuario->adicionaPapel($papel);

            return redirect()->back();
        }
        return redirect()->back();
    }

    public function papelDestroy($id, $papel_id)
    {
        if(Gate::allows('papel-edit')){
            $usuario = User::find($id);
            $papel = Papel::find($papel_id);
            $usuario->removePapel($papel);

            return redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->back();
    }
}
