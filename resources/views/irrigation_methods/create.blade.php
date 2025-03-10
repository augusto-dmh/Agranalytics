<x-app>
    <form method="POST" action="{{ route('irrigation_methods.store') }}">
        @csrf

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" @error('name') class="border-2 border-red-500" @enderror/>
            @error('name')
                <p class="text-red-500 alert alert-danger text-[0.9375rem]">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" value="{{ old('description') }}" @error('description') class="border-2 border-red-500" @enderror/>
            @error('description')
                <p class="text-red-500 alert alert-danger text-[0.9375rem]">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="efficiency">Efficiency</label>
            <input type="number" step="0.01" id="efficiency" name="efficiency" value="{{ old('efficiency') }}" @error('efficiency') class="border-2 border-red-500" @enderror />
            @error('efficiency')
                <p class="text-red-500 alert alert-danger text-[0.9375rem]">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Create</button>
    </form>
</x-app>