
      <div class="row">
        <div class="input-field col col-md-4">
          <input id="title" name='title' value="{{isset($tour->title) ?: old('title')}}" type="text" class="validate">
          <label for="title">Titulo</label>
        </div>
          

            <div class="input-field col col-md-4">
                <input id="place" type="text" name='place' value="{{isset($tour->place) ?: old('place')}}" class="validate">
                <label for="place">Localidade</label>
            </div>
    
            <div class="input-field col col-md-4">
                <input id="price" type="text" name='price' value="{{isset($tour->price) ?: old('price')}}" >
                <label for="price">Preço</label>
    
            </div>
      </div>
            
    <div class="row">
        <div class="input-field col col-md-4">
            <input id="hotel" type="text" name='hotel' value="{{isset($tour->hotel) ?: old('hotel')}}" class="validate">
            <label for="hotel">Hotel</label>
        </div>
     
        <div class="input-field col col-md-3">
        <input id="departure_date" type="datetime-local" name='departure_date' value="{{isset($tour->departure_date) ?: old('departure_date')}}" class="validate">
          <label for="departure_date"></label>
        </div>
      
        <div class="input-field col col-md-3"> 
          <input id="return_date" placeholder='' type="datetime-local" name='return_date' value="{{isset($tour->return_date) ?: old('return_date')}}" class="validate">
          <label for="return_date"></label>
        </div>
      
      
      <div class="input-field col col-md-2"> 
        <input id="capacity" type="number" name='capacity' value="{{isset($tour->capacity) ?: old('capacity')}}" class="validate">
        <label  for="capacity">Lotação</label>
      </div>
      
      <div class="input-field col col-md-12">
        <textarea name='description' id='textarea' class="materialize-textarea" >{{isset($tour->notes) ?: old('notes')}}</textarea>
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
      @section('scripts')
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: '#textarea',
                height: '300'
            });
            </script>
      @endsection
      
    
