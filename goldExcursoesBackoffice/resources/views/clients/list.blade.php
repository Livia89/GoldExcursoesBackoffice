@extends('app')
@section('title', 'Listar clientes')

@section('content')
    
@if (session('sucess'))
<div class="alert alert-success alert-dismissible fade show">
    <strong>Successo!</strong> {{session('sucess')}}
     
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
                                <?php $oi = resource_path('views/helpers/modal.blade.php')?>
                                <button type="button" onclick="" id='del' data-toggle="modal" data-target="#exampleModal" class="btn btn-danger">
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
@endsection
@section('scripts')
    <script src="{{ asset('js/main.js') }}" defer></script>
@endsection