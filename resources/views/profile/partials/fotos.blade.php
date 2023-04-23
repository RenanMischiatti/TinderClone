<section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Fotos de Perfil
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Update your account's profile information and email address."
            </p>
        </header>

        <div id="fotos">
            {!! $divUser !!}
        </div>
        
        <div class="modal fade" id="modalFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-dark">
                    <form action="{{route('profile.adicionar.foto')}}" method="POST" id="adicionarFoto">
                        <div class="modal-header border-0">
                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="file" id="inputFoto" style="opacity:0; pointer-events: none;" accept="image/*">
                            <div id="area-foto">
                                
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button class="btn btn-outline-success" type="submit"> + </button>
                        </div>
                    </form>
                
                </div>
            </div>
        </div>
</section>
    
    
    