<div class=" text-sm w-8/12 grid-cols-1 gap-1.5 grid grid-rows-3">
    @forelse ($todo_list as $todo)
        <a href="{{ route('todo.show', $todo->id) }}"
            class="flex flex-row items-center p-3  rounded-lg border-2 border-zinc-700">
            <section class="flex flex-col">
                <span class="text-xl font-bold">{{ $todo->title }}</span>
                <span class="text-sm">{{ $todo->description }}</span>
            </section>
            <span wire:click='remove(`{{ $todo->id }}`)' class="text-md font-bold ml-auto cursor-pointer" ">X</span>
        </a>
@empty
        <h3>No Todo Collection</h3>
 @endforelse
                <livewire:make-todo-list key="make-todo">
</div>
