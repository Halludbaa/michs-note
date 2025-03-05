<div class="flex gap-5 flex-row items-center">
    <input type="checkbox" wire:model='status' {{ !$this->status ? '' : 'checked' }} class="w-4 h-4 " wire:change='edit'>
    <section x-data="{ isEditing: false }">
        <p class="text-lg" x-show="!isEditing" @dblclick="isEditing = true">{{ $this->task }}</p>
        <input x-show="isEditing" class="text-lg" type="text" wire:model='task' @blur="isEditing = false"
            @keyup.enter="isEditing = false">
    </section>
</div>
