@if ($message = Session::get('success'))

  <div class="modal fade" id="myModal"> 
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">
           Parabéns!
          </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="alert alert-success smsModal">
          <strong>{{ $message }}</strong>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>

  @else @if ($message = Session::get('error'))

    <div class="modal fade" id="myModal"> 
      <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">
              Ops, algo deu errado!
            </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="alert alert-danger">
            <strong>{{ $message }}</strong>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>

    @else @if ($message = Session::get('aviso'))

      <div class="modal fade" id="myModal"> 
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">
                Atenção!
              </h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="alert alert-warning smsModal">
              <strong>{{ $message }}</strong>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
            </div>
          </div>
        </div>
      </div>

    @endif

  @endif

@endif
