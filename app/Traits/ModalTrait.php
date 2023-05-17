<?php

namespace App\Traits;

trait ModalTrait
{
    public function openModal($view, Array $configModal = [])
    {
        $defaultConfig = [
            'header' => true,
            'closeButton' => true,
            'estatico' => false,
            'classesDialog' => '',
            'titulo' => 'Titulo Padrão Modal',
            'classesTitulo' => '',
            'footer' => true,
            'closeButton' => true,
            'submitButton' => true,
        ];
        $configModal = array_merge($defaultConfig, $configModal);

        return view('components.modalModular', compact('view', 'configModal'));
    }
}
