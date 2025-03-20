<div class="flex gap-2.5 flex-row items-center group relative">
    <span class="cursor-pointer text-sm font-bold group-hover:opacity-100 duration-300 opacity-0 absolute z-10 -left-5"
        @click="$wire.delete(`{{ $this->id }}`); $wire.$refresh">X
    </span>
    <label class="flex items-center cursor-pointer relative">
        <input type="checkbox" {{ !$this->status ? '' : 'checked' }} wire:model='status' wire:change='save'
            class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800 dark:checked:bg-slate-200"
            id="check-custom-icon" />
        <span
            class="absolute dark:text-zinc-800 text-zinc-200 opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path>
            </svg>
        </span>
    </label>
    <section x-data="{ isEditing: false }">
        <p class="text-lg" x-show="!isEditing" @dblclick="isEditing = true">{{ $this->task ?? '' }}</p>
        <input x-show="isEditing" class="text-lg outline-0" type="text" wire:model='task' @blur="isEditing = false"
            @keyup.enter="isEditing = false; $wire.save()">
    </section>

</div>
