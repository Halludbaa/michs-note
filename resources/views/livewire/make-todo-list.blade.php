<div class="p-3 text-4xl flex flex-col justify-center items-center rounded-lg border-2 border-zinc-700"
    x-data="{ isAdd: false }">
    <span x-show="!isAdd" @click="isAdd = true">+</span>
    <span x-show="isAdd">
        <input type="text" wire:model='title' @keyup.enter="$wire.add(); isAdd = false;"
            class="box-border text-xl text-center outline-0" @blur="isAdd = false" placeholder="Todo Title">
    </span>
</div>
