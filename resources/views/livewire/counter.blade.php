<div class="mt-8 flex flex-col items-center py-16 p-16 mx-auto justify-center gap-4 rounded-lg" >
    <span class="tracking-widest font-mono underline decoration-blue-400 underline-offset-4 decoration-4 font-semibold text-gray-700 ">lets count</span>
    <div class="p-16 flex justify-center gap-6 items-center ">
        <button wire:click="decrement1" class="py-2 px-4 bg-blue-500 hover:bg-blue-600 rounded text-white">-</button>
        <span>{{$count1}}</span>
        <button wire:click="increment1" class="py-2 px-4 bg-blue-500 hover:bg-blue-600 rounded text-white">+</button>
    </div>

    <span class="tracking-widest font-mono underline decoration-blue-400 underline-offset-4 decoration-4 font-semibold text-gray-700 ">increasing positive numbers counting</span>
    <div class="p-16 flex justify-center gap-6 items-center ">
        <button wire:click="decrement2" {{ $count2 <= 0 ? 'disabled' : '' }} class="py-2 px-4 {{ $count2 <= 0 ? 'bg-gray-400 cursor-not-allowed' : 'bg-blue-500 hover:bg-blue-600'}} rounded text-white">-</button>
        <span>{{$count2}}</span>
        <button wire:click="increment2" class="py-2 px-4 bg-blue-500 hover:bg-blue-600 rounded text-white">+</button>
    </div>

    <span class="tracking-widest font-mono underline decoration-blue-400 underline-offset-4 decoration-4 font-semibold text-gray-700 ">decreasing negative numbers counting</span>
    <div class="p-16 flex justify-center gap-6 items-center ">
        <button wire:click="decrement3" class="py-2 px-4 bg-blue-500 hover:bg-blue-600 rounded text-white">-</button>
        <span>{{$count3}}</span>
        <button wire:click="increment3" {{ $count3 >= 0 ? 'disabled' : '' }} class="py-2 px-4 {{ $count3 >= 0 ? 'bg-gray-400 cursor-not-allowed' : 'bg-blue-500 hover:bg-blue-600'}} rounded text-white">+</button>
    </div>
</div>
