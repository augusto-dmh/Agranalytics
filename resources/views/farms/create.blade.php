<x-app>
    <form method="POST" action="{{ route('farms.store') }}">
        @csrf

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" @error('name') class="border-2 border-red-500" @enderror/>
            @error('name')
                <p class="text-red-500 alert alert-danger text-[0.9375rem]">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="{{ old('address') }}" @error('address') class="border-2 border-red-500" @enderror/>
            @error('address')
                <p class="text-red-500 alert alert-danger text-[0.9375rem]">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="size_in_ha">Size (ha)</label>
            <input type="number" step="any" id="size_in_ha" name="size_in_ha" value="{{ old('size_in_ha') }}" @error('size_in_ha') class="border-2 border-red-500" @enderror />
            @error('size_in_ha')
                <p class="text-red-500 alert alert-danger text-[0.9375rem]">{{ $message }}</p>
            @enderror
        </div>
        <x-select
            name='farmer_id'
            :options="$farmers"
            optionsLabel='full_name'
            optionsValue='id'
            label='Farmer'
        />
        <x-select
            name='soil_type_id'
            :options="$soilTypes"
            optionsLabel='name'
            optionsValue='id'
            label='Soil Type'
        />
        <x-select
            name='irrigation_method_id'
            :options="$irrigationMethods"
            optionsLabel='name'
            optionsValue='id'
            label='Irrigation Method'
        />
        <x-select
            name='crop_id'
            :options="$crops"
            optionsLabel='name'
            optionsValue='id'
            :multiple='true'
            label='Crops'
        />
        @stack('selectScript')
        @stack('selectStyle')

        <button type="submit">Create</button>
    </form>
</x-app>
