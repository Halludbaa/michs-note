<div>
    <div class="text-lg" x-data="{ isAdd: false }">
        <span class="text-xl font-bold cursor-pointer" x-show="!isAdd" @click="isAdd = true">+</span>
        <span x-show="isAdd">
            <input type="text" wire:model='task' @keyup.enter="$wire.add(); isAdd = true; $wire.$refresh"
                class="outline-0" @blur="isAdd = false" placeholder="New Task">
        </span>
    </div>
</div>
