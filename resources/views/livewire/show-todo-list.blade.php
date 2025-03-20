<div class="text-lg">
    <span x-data="{ isEdit: false }" class="mb-2 block">
        <h1 class="text-4xl font-black" x-show="!isEdit" @dblclick="isEdit = true">{{ $this->title }}</h1>
        <input type="text" class="text-4xl block w-full font-black outline-0 h-fit box-border" @blur="isEdit = false" wire:model='title' @keyup.enter="isEdit = false; $wire.saved()" x-show="isEdit">
    </span>
    <div class="flex flex-col border-2 p-8 rounded-xl">
        @forelse ($todos as $todo)
            <livewire:todo-list :id="$todo->id" :task="$todo->task" :status="$todo->status" :key="$todo->id" />
        @empty
            <span>No Task In Here</span>
        @endforelse
        <livewire:make-todo />
        {{-- {{ $todos }} --}}
    </div>
</div>
