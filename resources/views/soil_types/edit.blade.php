<x-app>
    <form method="POST" action="{{ route('soil_types.update', $soilType) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $soilType->name) }}" @error('name') class="border-2 border-red-500" @enderror/>
            @error('name')
                <p class="text-red-500 alert alert-danger text-[0.9375rem]">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" value="{{ old('description', $soilType->description) }}" @error('description') class="border-2 border-red-500" @enderror/>
            @error('description')
                <p class="text-red-500 alert alert-danger text-[0.9375rem]">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="ph_min">pH Min</label>
            <input type="number" step="0.1" id="ph_min" name="ph_min" value="{{ old('ph_min', $soilType->ph_min) }}" @error('ph_min') class="border-2 border-red-500" @enderror />
            @error('ph_min')
                <p class="text-red-500 alert alert-danger text-[0.9375rem]">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="ph_max">pH Max</label>
            <input type="number" step="0.1" id="ph_max" name="ph_max" value="{{ old('ph_max', $soilType->ph_max) }}" @error('ph_max') class="border-2 border-red-500" @enderror />
            @error('ph_max')
                <p class="text-red-500 alert alert-danger text-[0.9375rem]">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="organic_matter_percentage">Organic Matter Percentage</label>
            <input type="number" step="0.01" id="organic_matter_percentage" name="organic_matter_percentage" value="{{ old('organic_matter_percentage', $soilType->organic_matter_percentage) }}" @error('organic_matter_percentage') class="border-2 border-red-500" @enderror />
            @error('organic_matter_percentage')
                <p class="text-red-500 alert alert-danger text-[0.9375rem]">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Update</button>
    </form>
</x-app>