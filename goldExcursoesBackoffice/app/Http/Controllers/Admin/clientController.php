<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Client::orderBy('id', 'desc')->Paginate(15);
        
        return view('clients.list', ["clients" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $data = $request->all();
        
        if(!empty($data)){
            
            if(!client::where("email", $data["email"])->count()){
                $data["dateOfBirth"] = date("Y-m-d", strtotime($data["dateOfBirth"]));
                Client::create($data);
                return redirect()->route("clients.index")->with("success", "Cliente adicionado! ");
                
            }else{
                
                // return view("clients.add", ["mensagem" => "Já existe"]);
                return redirect()->route("clients.create")->with("error", "Já existe um cliente com este email");
            }
            
           
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if($id !== null){
            $client = Client::where("id", $id)->first();
        
            return view('clients.edit', ['client' => $client]);
        }else{
            return redirect()->route('clients.list')->with("error", "Não é possível editar este cliente, por favor contactar o administrador");
        }
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
        $data = $request->all();
        
        $client = Client::find($id)->update($data);
        if($client){
            return redirect()->route("clients.edit", $id)->with("success", "Cliente editado com sucesso! ");
                
        }else{
            
            return redirect()->route("clients.edit", $id)->with("error", "Ocorreu um erro ao editar esse cliente");
        }
        
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!isset($id))  return redirect()->route('clients.index');
        if(Client::find($id)->delete()){
            return redirect()->route("clients.index")->with("success", "Cliente apagar com sucesso! ");
                
        }else{
            
            return redirect()->route("clients.index")->with("error", "Ocorreu um erro ao apagar esse cliente");
        
        }
    }
}
