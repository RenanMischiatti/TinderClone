<div class="modal fade" id="modalModular" tabindex="-1" @if($configModal['estatico']) data-bs-backdrop="static" @endif aria-hidden="true">
    <div class="modal-dialog {{$configModal['classesDialog']}}">
      <div class="modal-content">
          
        @if ($configModal['header'])
            <div class="modal-header">
                <h1 class="modal-title fs-5">{{$configModal['titulo']}}</h1>
                @if ($configModal['closeButton'])
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                        </svg>
                    </button>
                @endif
            </div>
        @endif
        <div class="modal-body">
          {!! $view !!}
        </div>
        
        @if ($configModal['footer'])
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        @endif
      </div>
    </div>
</div>