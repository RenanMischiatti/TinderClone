<section class="w-100 h-100 d-flex flex-column" id="conversa">
    <header>
        <div class="d-flex justify-center p-3 foto">
            <img src="{{$match->UserMatched->foto->first()->FotCaminho}}" class="rounded-circle" alt=""> 
        </div>
        <div class="col-11 d-flex justify-content-center flex-column conteudo">
            <b class="nome text-gray-800 dark:text-gray-200 ">{{$match->UserMatched->info->nome}}</b>
            <b class="text-success status">online</b>
        </div>
    </header>

    <section id="chat" class="h-100">

    </section>
    
    <section id="sendMensageArea">

        <div class="areaInput">
            <textarea type="text" placeholder="Digite uma mensagem..." rows="1"></textarea>
            <button class="send-button" disabled>&#10148;</button>
        </div>

    </section>

</section>  