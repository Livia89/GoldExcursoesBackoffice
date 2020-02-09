@extends('app')
@section('title', 'Adicionar cliente')
@section('content')
<div class="">
  
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
      <strong>Erro!</strong> {{session('error')}}
      <button type="button" class="close" data-dismiss="alert">&times;</button>
  </div>
  @endif
  <form action='{{route("clients.store")}}' class="col s12" method="POST">
    {!! csrf_field() !!}
      @include('clients.form')

  </div>
</form>
@endsection
