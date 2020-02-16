@extends('app')
@section('title', 'Listar clientes')

@section('content')
    
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show">
    <strong>Successo!</strong> {{session('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
@elseif(session('error'))
<div class="alert alert-danger alert-dismissible fade show">
    <strong>Erro!</strong> {{session('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">Cidade</th>
                <th scope="col">Operações</th>
            </tr>
        </thead>
            <tbody>
                @forelse ($clients as $client)
                    <tr>
                        <td>{{$client->name}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->phone}}</td>
                        <td>{{$client->city}}</td>
                        <td>
                            <a href="{{route('clients.edit', $client->id)}}" class="inline-block vertical-middle btn btn-primary"><i class="fas fa-edit"></i></a>
                            <form class='inline-block vertical-middle' action="{{route('clients.destroy', $client->id)}}" method="post">
                                @csrf
                                <input type="hidden" name='_method' value='DELETE'>
                            
                                <button type="button" data-toggle="modal" data-target="#modal" class="btnModal btn btn-danger">
                                    <i class="fas fa-trash"></i></button>
                                  
                            </form>   
                            
                        </td>
                        
                    </tr>
                @empty
                    <tr>
                        <td>Não há dados para apresentar</td>
                    </tr>
                @endforelse
            </tbody>
    </table>
    <div class="center justiy-content-center flex-container" >
        {{$clients->links()}}
    </div>
    @include("helpers.modal")
  <script>


      var data = [];
      var btn = document.getElementsByClassName("btnModal");
      
      Object.values(btn).forEach(el => {
          el.addEventListener("click", () => {
          
            if(modal("Atenção", "Tem a certeza que pretende eliminar?")){
            
                document.querySelector(".accepted").onclick = function(){
                    el.parentNode.submit(); /* Submete o form associado ao botão */ 
                };
                
            }

        
          });
      });
  </script>
  
@endsection
{{-- @section('scripts')
    <script src="{{ asset('js/main.js') }}" defer></script>
@endsection --}}