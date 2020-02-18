@extends('app')
@section('title', 'Listar Excursões')

@section('content')
    <div>
        @isset($selected) 
            <input id='toSelected' type="hidden" value='{{$selected}}'>
        @endisset
        
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

        <div class="right row col-md-4"> 
            <select name="sort" id="sort" class="form-control">
                <option value=''>Ordenar por: </option>
                <option value='title-asc'>Nome - asc </option>
                <option value='title-desc'>Nome - desc </option>
                <option value='place-asc'>Localidade - asc </option>
                <option value='place-desc'>Localidade - desc </option>
                <option value='price-asc'>Preço - asc </option>
                <option value='price-desc'>Preço - desc </option>
                <option value='departure_date-asc'>data - asc</option>
                <option value='departure_date-desc'>data - desc</option>
            </select>
        </div>
        <table class="table table-striped center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Localidade</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Data</th>
                    <th scope="col">Operações</th>
                </tr>
            </thead>
                <tbody>
                    @forelse ($tours as $tour)
                    
                        <tr>
                            <td class="center">{{$tour->title}}</td>
                            <td class="center">{{$tour->place}}</td>
                            <td class="center">{{$tour->price}}</td>
                            <td class="center">{{$tour->departure_date}}</td>
                            <td class="center">
                                <a href="{{route('tour.edit', $tour->id)}}" class="inline-block vertical-middle btn btn-primary"><i class="fas fa-edit"></i></a>
                                <form class='inline-block vertical-middle' action="{{route('tour.destroy', $tour->id)}}" method="post">
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
            {{$tours->links()}} 
        </div>
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

      window.onload = function () {

        $oi = $("#toSelected").val();
        if($oi != ""){
            alert("select option[value='"+$oi+"']");
            $("select option[value='"+$oi+"']").attr("selected", true);
            
        }

        
        // alert($("option").val($oi));
       // if($oi != "") $("option").val($oi).attr("selected", true);
        
        

        var select = $("#sort");
        var toOrder = [];
        var params = "";
        var url = "";
        
        select.on("change", function(e){
            
            toOrder = ($(this)[0].value).split("-");
            if(toOrder.length){
             params = "?sort_by=" + toOrder[0] + "&order_by=" + toOrder[1]; 
            }
            
            url = window.location.href.split("?")[0]; 
            window.location.href = url + params;


        });

       

      }

     
      
    
  </script>
  
@endsection
