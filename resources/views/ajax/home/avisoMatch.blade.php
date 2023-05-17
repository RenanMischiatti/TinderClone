<div class="w-100">
    <div class="row d-flex justify-content-center">
        <div class="col-12 p-5 pb-2">
            <img src="{{$userCurtido->foto->first()->FotCaminho}}" class="w-100 img-fluid" alt="">
        </div>
        <div class="match-text">
            <h2>Você deu match com {{$userCurtido->info->PrimeirosNomes}}!</h2>
            <p>Parabéns! Agora vocês podem conversar.</p>
        </div>
    </div>
</div>