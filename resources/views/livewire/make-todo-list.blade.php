<div class="p-3 text-4xl flex justify-center items-center rounded-lg border-2 border-zinc-700" x-data="{ isAdd: false }">
    <span x-show="!isAdd" @click="isAdd = true">+</span>
    <span x-show="isAdd">
        <input type="text" wire:model='title' @keyup.enter="$wire.add(); isAdd = false; $wire.$refresh()"
            class="box-border h-full w-full text-xl" @blur="isAdd = false" placeholder="Todo Title">
    </span>
</div>
