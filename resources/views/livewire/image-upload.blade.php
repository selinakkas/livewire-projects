<div class="p-6">
    <form wire:submit.prevent="save" class="flex flex-col w-[480px] mx-auto py-16">
        @if ($image)
            Preview:
            <div class="flex flex-wrap justify-center gap-6">
                @foreach ($image as $im )
                    <img src="{{ $im->temporaryUrl() }}" class="w-[110x] h-[90px] object-cover">
                @endforeach
            </div>
        @endif

        <input type="file" wire:model="image" class="mb-4" multiple>

        @error('image') <span class="error">{{ $message }}</span>@enderror

        <button type="submit" class="py-2 px-4 bg-blue-500 hover:bg-blue-600 rounded text-white">Save Photo</button>
    </form>

    <div class="flex flex-wrap gap-7">
        @foreach ($images as $image)
            <img src="{{ $image }}" class="w-[120px] object-cover">
        @endforeach
    </div>
</div>
