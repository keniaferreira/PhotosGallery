<div class="modal-fade" id="apagarAlbum">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title" id="exampleModalLabel">Confirme a exclusão do Álbum:</h4>
      <button type="button" class="btn-modal-close" data-dismiss="modal" aria-label="Close">
        <span>x</span>
      </button>
    </div>
    <div class="modal-body">

      <div class="form-horizontal" >
        <fieldset>
          <!-- Text input-->
          <div class="form-group">
            <input type="text" class="form-control  alb_titulo" readonly>
          </div>          
        </fieldset>

        <input type="number"  name="alb_id" class="alb_id" value="" hidden>

        <center>
          <button type="submit" class="btn btn-fill confirmarExclusaoAlbum">Confirmar</button>
        </center>
      </div>

    </div>    
  </div>
</div>