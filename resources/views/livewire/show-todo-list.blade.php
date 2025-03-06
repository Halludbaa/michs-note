<div class="text-lg">
    @forelse ($todos as $todo)
        <livewire:todo-list :id="$todo->id" :task="$todo->task" :status="$todo->status" :key="$todo->id" />
    @empty
        <span>No Task In Here</span>
    @endforelse

    <livewire:make-todo />
    {{-- {{ $todos }} --}}
</div>
