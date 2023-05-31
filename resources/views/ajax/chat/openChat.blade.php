<main class="w-100 h-100" id="conversa">
    <header class="">
        <div class="col-1 d-flex justify-center py-2">
            <img src="{{$match->UserMatched->foto->first()->FotCaminho}}" class="rounded-circle" alt="">
        </div>
        <div class="col-11 d-flex justify-content-center flex-column">
            <b class="nome text-gray-800 dark:text-gray-200 ">{{$match->UserMatched->info->nome}}</b>
            <b class="text-success status">online</b>
        </div>
    </header>


</main>  