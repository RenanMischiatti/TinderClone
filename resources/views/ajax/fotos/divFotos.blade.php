<div class="d-flex">
    @foreach ($user->foto->sortBy('id') as $fotos)
        <div class="col-4 col-md-2 d-flex p-2">
            <div class="w-100 h-100 position-relative">
                <div class="position-absolute w-100 h-100 d-flex">
                    <div class="col-12 d-flex justify-center align-items-center acao">
                        <span class="p-2 bg-danger border border-dark rounded-circle cursor-pointer" id="excluirFoto" data-foto="{{$fotos->id}}" data-rota="{{route('profile.excluir.foto')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="white" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                            </svg>
                        </span>
                    </div>
                </div>
                <img src="{{$fotos->FotCaminho}}" class="img-fluid cursor-pointer fotoPerfil">
            </div>
        </div>
    @endforeach
    @if(count($user->foto) != 6)
        <div class="col-4 col-md-2 d-flex justify-content-center align-items-center cursor-pointer position-relative adicionarFoto" onclick='$("#inputFoto").click()'>
            <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="white" class="img-fluid w-25" class="bi bi-image" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
        </div>
    @endif
</div>