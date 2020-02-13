@extends('app')
@section('title', 'Editar cliente')
@section('content')
<div class="">
 
  

  @if ((session('error') !== null) or (session('success') !== null))
  
  <div class="alert {{ session('error') ? 'alert-danger' : 'alert-success' }} alert-dismissible fade show">
       
    @if(session('error'))
      <strong>Erro!</strong> {{session('error')}}
    @else  
      <strong>Sucesso!</strong> {{session('success') }}
    @endif
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
  @endif


  <form action='{{route("clients.update", $client->id)}}' class="col s12" method="POST">
    @csrf
    <input type="hidden" name='_method' value="PUT">
      @include('clients.form')

  </div>
</form>
@endsection
