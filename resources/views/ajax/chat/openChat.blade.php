<main class="w-100 h-100 d-flex flex-column" id="conversa">
    <header class="d-flex">
        <div class="d-flex justify-center p-3 foto">
            <img src="{{$match->UserMatched->foto->first()->FotCaminho}}" class="rounded-circle" alt=""> 
        </div>
        <div class="col-11 d-flex justify-content-center flex-column conteudo">
            <b class="nome text-gray-800 dark:text-gray-200 ">{{$match->UserMatched->info->nome}}</b>
            <b class="text-success status">online</b>
        </div>
    </header>
    <section id="chat" class="h-100" style="border: 1px solid red">

    </section>
    <section id="sendMensageArea">

    </section>

</main>  