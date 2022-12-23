<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Papel;
use App\Permissao;
use Gate;

class PapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Gate::allows('papel-view')){
          $registros = Papel::all();
          $caminhos = [
          ['url'=>'/admin','titulo'=>'Admin'],
          ['url'=>'','titulo'=>'Papéis']
          ];
          return view('admin.papel.index',compact('registros','caminhos'));
      }
      return redirect()->back();
    }

    public function permissao($id)
    {
      if(Gate::allows('papel-edit')){
          $papel = Papel::find($id);
          $permissao = Permissao::all();
                  $caminhos = [
              ['url'=>'/admin', 'titulo'=>'Admin'],
              ['url'=>route('papeis.index'), 'titulo'=>'Papéis'],
              ['url'=>'', 'titulo'=>'Permissões'],
          ];
          return view('admin.papel.permissao',compact('permissao','papel','caminhos'));
      }
      return redirect()->back();
    }

    public function permissaoStore(Request $request,$id)
    {
      if(Gate::allows('papel-edit')){
          $papel = Papel::find($id);
          $data = $request->all();

          $permissao = Permissao::find($data['permissao_id']);
          $papel->adicionaPermissao($permissao);

          return redirect()->back();
      }
      return redirect()->back();
    }

    public function permissaoDestroy($id, $permissao_id)
    {
      if(Gate::allows('papel-edit')){
          $papel = Papel::find($id);
          $permissao = Permissao::find($permissao_id);
          $papel->removePermissao($permissao);

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
      if(Gate::allows('papel-create')){
          $caminhos = [
          ['url'=>'/admin','titulo'=>'Admin'],
          ['url'=>route('papeis.index'),'titulo'=>'Papéis'],
          ['url'=>'','titulo'=>'Adicionar']
          ];

          return view('admin.papel.adicionar',compact('caminhos'));
      }
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
      if(Gate::allows('papel-create')){
          if($request['nome'] && $request['nome'] != "Admin"){
            Papel::create($request->all());

            return redirect()->route('papeis.index');
          }

        return redirect()->back();
      }
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
      if(Gate::allows('papel-edit')){
          if(Papel::find($id)->nome == "Admin"){
              return redirect()->route('papeis.index');
          }

          $registro = Papel::find($id);

          $caminhos = [
          ['url'=>'/admin','titulo'=>'Admin'],
          ['url'=>route('papeis.index'),'titulo'=>'Papéis'],
          ['url'=>'','titulo'=>'Editar']
          ];

          return view('admin.papel.editar',compact('registro','caminhos'));
      }
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
      if(Gate::allows('papel-edit')){
        if(Papel::find($id)->nome == "Admin"){
            return redirect()->route('papeis.index');
        }
        if($request['nome'] && $request['nome'] != "Admin"){
          Papel::find($id)->update($request->all());
        }

        return redirect()->route('papeis.index');
      }
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
      if(Gate::allows('papel-delete')){
          if(Papel::find($id)->nome == "Admin"){
              return redirect()->route('papeis.index');
          }
          Papel::find($id)->delete();
          return redirect()->route('papeis.index');
      }
      return redirect()->back();
    }
}
