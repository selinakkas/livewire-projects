<div>
   <div class="flex flex-col items-center py-16 ">
    <span class="tracking-widest font-mono underline decoration-blue-400 underline-offset-4 decoration-4 font-semibold text-gray-700">lets calculate !</span>
        <div class="flex p-16 mx-auto justify-center items-center gap-4 border-4 rounded-lg border-blue-300 mt-10">
            <input type="number" class=" bg-gray-200 px-4 py-2 rounded-md flex items-center" wire:model="number1" placeholder="Number 1">
            <select class="w-24 bg-gray-200 px-4 py-2 rounded-md flex items-center" wire:model="action">
                <option>+</option>
                <option>-</option>
                <option>*</option>
                <option>/</option>
                <option>%</option>
            </select>
            <input type="number" class=" bg-gray-200 px-4 py-2 rounded-md flex items-center" wire:model="number2" placeholder="Number 2">
            <button wire:click="calculate" class="py-2 px-4 bg-blue-500 hover:bg-blue-600 disabled:cursor-not-allowed disabled:bg-opacity-90 rounded text-white">
                 {{ $disabled ? 'disabled' : '' }} =
            </button>
            <p class="text-3xl">{{$result}}</p>
        </div>
        <span> </span>
       
   </div>
</div>
