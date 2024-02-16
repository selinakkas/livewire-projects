<form wire:submit.prevent="submit" class="w-80 mx-auto py-16 mt-32">
    <span class="mt-8 tracking-widest font-mono underline decoration-blue-400 underline-offset-4 decoration-4 font-semibold text-gray-700">Register Form</span>

    @if (session()->has('message'))
        <div class="bg-emerald-500 rounded-sm text-white font-semibold py-3 px-4 mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="flex gap-4 mb-8 mt-8">
        <label>
            <input type="radio" value="customer" name="role" wire:model.live="role">
            Customer
        </label>
        <label>
            <input type="radio" value="vendor" name="role" wire:model.live="role">
            Vendor
        </label>
    </div>

    <div class="mb-4">
        <input type="text" wire:model.debounce.500ms="first_name" class="w-full border rounded-md
        @error('first_name') border-red-500 @enderror"
               placeholder="First Name">
        @error('first_name') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <input type="text" wire:model.debounce.500ms="last_name" class="w-full border rounded-md
        @error('first_name') border-red-500 @enderror"
               placeholder="Last Name">
        @error('last_name') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <input type="email" wire:model.debounce.500ms="email" class="w-full border rounded-md
        @error('email') border-red-500 @enderror"
               placeholder="Email">
        @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <input type="password" wire:model.debounce.500ms="password" class="w-full border rounded-md
        @error('password') border-red-500 @enderror"
               placeholder="Password">
        @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    @if ($role === 'vendor')
        <div class="mb-4">
            <input type="text" wire:model.debounce.500ms="company_name"
                   class="w-full border rounded-md
            @error('company_name') border-red-500 @enderror" 
                   placeholder="Company Name">
            @error('company_name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    @endif

    @if ($role === 'vendor')
        <div class="mb-4">
            <input type="text" wire:model.debounce.500ms="vat_number"
                   class="w-full border rounded-md
            @error('vat_number') border-red-500 @enderror" placeholder="VAT Number">
            @error('vat_number') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    @endif

    <button type="submit" class="py-2 px-4 bg-blue-500 hover:bg-blue-600 rounded text-white">Register</button>
</form>