<div>
    <div class="flex flex-col gap-6 w-[480px] mx-auto py-16 border bg-gray-50 mt-16 rounded-md shadow-sm">
        <select wire:model="selectedContinent" class="flex-1 py-2 mr-4 ml-4 rounded" wire:change="changeContinent">
            <option value="-1">Please select continent</option>
            @foreach ($continents as $continent )
                <option value="{{$continent->id}}">{{$continent->name}}</option>
            @endforeach
        </select>

    <div class="flex relative">
        <p wire:loading class="absolute left-0 top-0 right-0 bottom-0 z-10 bg-white bg-opacity-90 py-2 px-3">
            Loading...
        </p>

        <select wire:model="selectedCountry" class="flex-1 py-2 mr-4 ml-4 rounded">
            <option value="-1">Please select country</option>
            @foreach ($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach
        </select>

    </div>
    </div>
    
</div>
