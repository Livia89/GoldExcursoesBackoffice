  <div class="modal fade modalBootstrap" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{title}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id='modal-body' >
            {description}
        </div>
        <div class="modal-footer">
          <button type="button" class="margin-side-10 btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="accepted btn btn-primary">OK</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    /* title, descricao */ 
    function modal(...args) {
      
      if(args !== undefined){

        let t = args[0];
        let d = args[1];
        
        /* Pegar os elementos a serem susbtituidos */
        let title = document.getElementById("exampleModalLabel");
        let description = document.getElementById("modal-body");
        
        title.innerHTML = t;
        description.innerHTML = d;
        return true;
      }
      return false;

      

    }
  </script>