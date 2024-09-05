<?php

use function \Livewire\Volt\{state, usesFileUploads, computed};
use \Illuminate\Support\Facades\Storage;

usesFileUploads();

state(['arquivo']);

$save = function() {
    /** @var \Livewire\Features\SupportFileUploads\TemporaryUploadedFile $arquivo */
    $arquivo = $this->arquivo;
    dd($arquivo->store('fotos', ['disk' => 'cloud']));
};

$awsFile = computed(fn() => Storage::temporaryUrl('fotos/YgPcc1iaNwHOoTOzu3nyZwE5oARxK6wqvri8g3gn.png', now()->addMinute()));



?>


<div>
    {{ $this->awsFile }}
    <form wire:submit.prevent="save" enctype="multipart/form-data" class="space-y-4">
        <input type="file" name="file" wire:model="arquivo" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Salvar</button>
    </form>

    @if($this->awsFile)
       <img src="{{ $this->awsFile }}"/>
    @endif
</div>
