<x-app>
    <form method="POST" action="{{ route('crops.store') }}">
        @csrf

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" @error('name') class="border-2 border-red-500" @enderror/>
            @error('name')
                <p class="text-red-500 alert alert-danger text-[0.9375rem]">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="scientific_name">Scientific Name</label>
            <input type="text" id="scientific_name" name="scientific_name" value="{{ old('scientific_name') }}" @error('scientific_name') class="border-2 border-red-500" @enderror />
            @error('scientific_name')
                <p class="text-red-500 alert alert-danger text-[0.9375rem]">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="optimal_ph_min">Optimal pH Min</label>
            <input type="number" step="any" id="optimal_ph_min" name="optimal_ph_min" value="{{ old('optimal_ph_min') }}" @error('optimal_ph_min') class="border-2 border-red-500" @enderror />
            @error('optimal_ph_min')
                <p class="text-red-500 alert alert-danger text-[0.9375rem]">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="optimal_ph_max">Optimal pH Max</label>
            <input type="number" step="any" id="optimal_ph_max" name="optimal_ph_max" value="{{ old('optimal_ph_max') }}" @error('optimal_ph_max') class="border-2 border-red-500" @enderror />
            @error('optimal_ph_max')
                <p class="text-red-500 alert alert-danger text-[0.9375rem]">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="water_requirement_per_season_in_mm">Water Requirement Per Season (mm)</label>
            <input type="number" step="any" id="water_requirement_per_season_in_mm" name="water_requirement_per_season_in_mm" value="{{ old('water_requirement_per_season_in_mm') }}" @error('water_requirement_per_season_in_mm') class="border-2 border-red-500" @enderror />
            @error('water_requirement_per_season_in_mm')
                <p class="text-red-500 alert alert-danger text-[0.9375rem]">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="growth_duration_in_days">Growth Duration (days)</label>
            <input type="number" step="any" id="growth_duration_in_days" name="growth_duration_in_days" value="{{ old('growth_duration_in_days') }}" @error('growth_duration_in_days') class="border-2 border-red-500" @enderror />
            @error('growth_duration_in_days')
                <p class="text-red-500 alert alert-danger text-[0.9375rem]">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Create</button>
    </form>
</x-app>
