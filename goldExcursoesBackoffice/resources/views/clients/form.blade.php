
      <div class="row">
        <div class="input-field col col-md-4">
          <input id="name" name='name' value="{{isset($client->name) ? $client->name : old('name')}}" type="text" class="validate">
          <label for="name">Nome</label>
        </div>
          

            <div class="input-field col col-md-4">
              <input id="email" type="email" name='email' value="{{isset($client->email) ? $client->email : old('email')}}" class="validate">
              <label for="email">Email</label>
            </div>
  
          <div class="input-field col col-md-4">
            <input id="phone" type="text" name='phone' value="{{isset($client->phone) ? $client->phone : old('phone')}}" >
            <label for="phone">Telefone</label>
  
          </div>
      </div>

      <div class="row">
        <div class="input-field col col-md-6">
        <input id="address" type="text" name='address' value="{{isset($client->address) ? $client->address : old('address')}}" class="validate">
          <label for="address">Morada</label>
        </div>
      
        <div class="input-field col col-md-3"> 
          <input id="city" type="text" name='city' value="{{isset($client->city) ? $client->city : old('city')}}" class="validate">
          <label for="city">Localidade</label>
        </div>
      
      
      <div class="input-field col col-md-3"> 
        <input id="dateOfBirth" type="date" name='dateOfBirth' value="{{isset($client->dateOfBirth) ? $client->dateOfBirth : old('dateOfBirth')}}" class="validate">
        <label  for="dateOfBirth">Data de Nascimento</label>
      </div>
      
      <div class="input-field col col-md-12">
        <textarea name='notes' id='textarea' class="materialize-textarea" >{{isset($client->notes) ? $client->notes : old('notes')}}</textarea>
        <label for="textarea">Observações</label>
         
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
    
