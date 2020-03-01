@extends('app')
@section('title', 'Editar Excursão')

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

<form class='col s12' action="{{route('tour.update', $tour->id)}}" method="POST">
  @csrf
  <input type="hidden" name="_method" value='PUT'>
    @include('tours.form')
</form>
@endsection