<x-app>
    <form method="POST" action="{{ route('farms.update', $farm) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $farm->name) }}" @error('name') class="border-2 border-red-500" @enderror/>
            @error('name')
                <p class="text-red-500 alert alert-danger text-[0.9375rem]">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="{{ old('address', $farm->address) }}" @error('address') class="border-2 border-red-500" @enderror/>
            @error('address')
                <p class="text-red-500 alert alert-danger text-[0.9375rem]">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="size_in_ha">Size (ha)</label>
            <input type="number" step="any" id="size_in_ha" name="size_in_ha" value="{{ old('size_in_ha', $farm->size_in_ha) }}" @error('size_in_ha') class="border-2 border-red-500" @enderror />
            @error('size_in_ha')
                <p class="text-red-500 alert alert-danger text-[0.9375rem]">{{ $message }}</p>
            @enderror
        </div>
        <x-select
            name="farmer_id"
            label="Farmer"
            :options="$farmers"
            :selected="$farm->farmer"
            optionsLabel="full_name"
            optionsValue="id"
        />
        <x-select
            name="soil_type_id"
            label="Soil Type"
            :options="$soilTypes"
            :selected="$farm->soilType"
            optionsLabel="name"
            optionsValue="id"
        />
        <x-select
            name="irrigation_method_id"
            label="Irrigation Method"
            :options="$irrigationMethods"
            :selected="$farm->irrigationMethod"
            optionsLabel="name"
            optionsValue="id"
        />
        <x-select
            name="crop_id"
            label="Crops"
            :options="$crops"
            :selected="$farm->crops"
            optionsLabel="name"
            optionsValue="id"
            :multiple="true"
        />
        @stack('selectScript')
        @stack('selectStyle')

        <button type="submit">Update</button>
    </form>
</x-app>
