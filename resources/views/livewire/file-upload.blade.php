<?php

use function \Livewire\Volt\{state, usesFileUploads};

usesFileUploads();

state(['arquivo']);

$save = function() {
    /** @var \Livewire\Features\SupportFileUploads\TemporaryUploadedFile $arquivo */
    $arquivo = $this->arquivo;
    $arquivo->storePublicly('fotos', 'jeremias.png', ['disk' => 'cloud']);
};


?>


<div>
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <input type="file" name="file" wire:model="arquivo">
        <button type="submit">salvar</button>
    </form>

    <img src="/storage/mmj6UdIDzMcVC7TIAiPA2FXh9elyrbgM1U0GPyBI.png" />



</div>
