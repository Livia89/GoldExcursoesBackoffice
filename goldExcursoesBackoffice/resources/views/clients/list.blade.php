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
                            <a href="{{route('clients.edit', $client->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="{{route('clients.destroy', $client->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            
                        </td>
                        
                    </tr>
                @empty
                    <tr>
                        <td>Não há dados para apresentar</td>
                    </tr>
                @endforelse
            </tbody>
    </table>
    <div class="center">
        {{$clients->links()}}
    </div>
@endsection