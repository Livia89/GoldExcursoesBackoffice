      <div class="row">
        <div class="input-field col col-md-4">
          <input id="title" name='title' value="{{(isset($tour->title) and $tour->title != "") ? $tour->title : old('title')}}" type="text" class="validate">
          <label for="title">Nome</label>
        </div>
            <div class="input-field col col-md-4">
                <input id="place" type="text" name='place' value="{{(isset($tour->place) and $tour->place != "") ? $tour->place : old('place')}}" class="validate">
                <label for="place">Localidade</label>
            </div>
    
            <div class="input-field col col-md-4">
                <input id="price" type="text" class='mask-money' name='price' value="{{(isset($tour->price) and $tour->price != "") ? $tour->price : old('price')}}" >
                <label for="price">Preço</label>
    
            </div>
      </div>

    <div class="row">
        <div class="input-field col col-md-4">
            <input id="hotel" type="text" name='hotel' value="{{(isset($tour->hotel) and $tour->hotel != "") ? $tour->hotel : old('hotel')}}" class="validate">
            <label for="hotel">Hotel</label>
        </div>
        <div class="input-field col col-md-3"> 
        <input id="departure_date" type="text" data-time="" data-date="" data-h='' class='datepicker timepicker' name='departure_date' value="{{(isset($tour->departure_date) and $tour->departure_date != "") ? $tour->departure_date->format('d-m-Y h:i')  : old('departure_date')}}" class="validate">
          <label for="departure_date"></label>
        </div>
        
        <div class="input-field col col-md-3"> 
          <input id="return_date" placeholder='' type="text" data-time="" data-h='' data-date="" class='datepicker timepicker end' name='return_date' value="{{(isset($tour->return_date) and $tour->return_date != "")  ? $tour->return_date->format('d-m-Y h:i') : old('return_date')}}" class="validate">
          <label for="return_date"></label>
        </div>
      
   
      <div class="input-field col col-md-2"> 
        <input id="capacity" type="number" name='capacity' value="{{(isset($tour->capacity) and $tour->capacity != "") ? $tour->capacity : old('capacity')}}" class="validate">
        <label  for="capacity">Lotação</label>
      </div>
      
      <div class="input-field col col-md-12">
        <textarea name='description' id='textarea' class="materialize-textarea" >{{(isset($tour->description) and $tour->description != "") ? $tour->description : old('notes')}}</textarea>
        <label for="textarea"></label>
         
      </div>
    </div>
    
     
      <button class="btn right waves-effect waves-light" type="submit">Enviar
        <i class="material-icons right">send</i>
      </button>

  
      <script>


        window.onload = function(){
       
            let input = document.getElementsByTagName("input");
            fixLabel(input);

            let textarea = document.getElementsByTagName("textarea");
            fixLabel(textarea);
            
            
        };
        

        function fixLabel(input){
          for (const el of input) {
              var label = el.parentNode.getElementsByTagName("label");
              for (const l of label) {
                if(el.type!="hidden" && el.value !== ""){
                  l.className='active';
                }
              }
              
            }
        }
      </script>
      @section('styles')
        <link href="{{ asset('js/datetimepicker/jquery.datetimepicker.css? ' . date('YmdHis')) }}" rel="stylesheet">
      @endsection
      @section('scripts')
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" type="text/javascript"></script>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="{{asset('js/datetimepicker/jquery.datetimepicker.full.min.js')}}" referrerpolicy="origin"></script>
       
       <script>

            tinymce.init({
                selector: '#textarea',
                height: '300',
                plugins: [
                "advlist autolink link image media filemanager code responsivefilemanager"
              ],
              toolbar1: "undo redo  | bold italic underline | forecolor backcolor | responsivefilemanager | link unlink | image media | code",
              image_advtab: true,
              external_filemanager_path: "/js/filemanager/",
              filemanager_title: "Responsive Filemanager",
              external_plugins: {
                "responsivefilemanager": "/js/tinymce/plugins/responsivefilemanager/plugin.min.js",
                "filemanager": "/js/filemanager/plugin.min.js"
              },
              
              });

            $(".mask-money").maskMoney({
              thousands:'.'
            });

            $.datetimepicker.setLocale("pt");

            $('.timepicker').datetimepicker({
              format: "d-m-Y H:i",
              minDate: new Date()
               
          });


    /*        $('.timepicker').timepicker({
              autoClose: true,
              onCloseStart: function(e){
                var el = $(e.parentNode).find(".timepicker");
                var array = el.val().split(" ");
                
                el.attr({"data-time" : " ", "data-time" : array[0]}); /*Essa parte não está legal, quando edita vem a data junto  */ 
            /*    el.attr("data-h", array[1]); /*Essa parte não está legal, quando edita vem a data junto  */ 
                
            /*    fillInput(el);

              }
            });
            
            /* A data não esta bem, quando mudo ela altera no date do input mas no val não */
            /* Esta tudo um coco */
        /*    function fillInput(el){
                var date = el.data("date");
               // date = date[2] + "-" + date[1] + "-" + date[0]; 
                var time = el.data("time");
                el.val(date + " " +  time);
                
            }
          
            /* Opções */
          /*  var mesAno = [ 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro' ];
            var diaSemana = [ 'Domingo', 'Segunda-Feira', 'Terca-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sabado' ];
            var mesesCurtos = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
            var diasDaSemanaCurtos = ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'];

           $('.datepicker').datepicker({
              autoClose: true,
              i18n:{ 
              months: mesAno,
              monthsShort: mesesCurtos,
              weekdaysShort: diasDaSemanaCurtos,
              weekdays: diaSemana,
            },
              format: "dd-mm-yyyy",
              /* onSelect:  function(){ 
                $(this).trigger("click");
              }, */
            /*  onClose: function(){
                  var data;
                  /* Quando vai fechar o datepicker preenche o data-date com a data escolhida */
     /*             console.log(this.date);
                  
                  var fullDate = new Date(this.date);
                 
                  
                  data =  fullDate.getDay() < 10 ? "0" + fullDate.getDay() : fullDate.getDay() + "-";
                  data += fullDate.getMonth() < 10 ? '0' + fullDate.getMonth() : fullDate.getMonth() + "-";
                  data += fullDate.getFullYear();
                   
                    
                
                  
              }
            
           });
           /*Estou a tentar arrumar o modal mas quase sem sucesso */
         /*  $(".modal-overlay").on("click", function(e){
             e.preventDefault();
              alert("clicou");
           });
*/
          
            </script>
      @endsection
      
    
