<div class=" container mx-auto flex flex-col py-16 px-8 mt-44 bg-gray-100 rounded-lg shadow-md  ">
    <span class="mb-4 -mt-4 tracking-widest font-mono underline decoration-blue-400 underline-offset-4 decoration-4 font-semibold text-gray-700 text-center">task list</span>
    <div class="flex gap-4 justify-between border border-blue-300  rounded-lg">
        <input type="text" wire:model="todoText" wire:keydown.enter="addTodo" placeholder="  type and hit enter" class="flex-1">
        <button class="py-2 px-8 bg-blue-500 hover:bg-blue-600 rounded text-white"
        wire:click="addTodo">
            Add
        </button>
    </div>

    <div class="py-6">
        @if (count($todos) == 0)
            <p class="text-gray-500 text-center">there is no todos</p>
        @endif
        @foreach($todos as $index => $todo)
            <div class="flex gap-4 justify-between items-center py-1">
                <input type="checkbox" {{$todo->completed ? ' checked' : ''}} wire:change="toggleTodo({{$todo->id}})">
                <label class="flex-1 {{$todo->completed ? 'line-through text-blue-500' : ''}}">{{$todo->todo}}</label>
                <button wire:click="deleteTodo({{$todo->id}})">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </button>
            </div>
        @endforeach
    </div>
</div>
