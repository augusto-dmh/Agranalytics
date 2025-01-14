<x-app>
    <div class="flex flex-col gap-8">
        @foreach($soilTypes as $soilType)
            <div class="flex flex-col gap-4">
                <ul class="flex flex-col gap-2">
                    <li>Name: {{ $soilType->name }}</li>
                    <li>Description: {{ $soilType->description }}</li>
                    <li>pH Min: {{ $soilType->ph_min }}</li>
                    <li>pH Max: {{ $soilType->ph_max }}</li>
                    <li>Organic Matter Percentage: {{ $soilType->organic_matter_percentage }}</li>
                </ul>
                <div>
                    <form method="POST" action="{{ route('soil_types.destroy', $soilType) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <a href="{{ route('soil_types.edit', $soilType) }}">Edit</a>
                </div>
            </div>
        @endforeach
    </div>

    {{ $soilTypes->links() }}
</x-app>