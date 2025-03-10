<x-app>
    <div class="flex flex-col gap-8">
        @foreach($crops as $crop)
            <div class="flex flex-col gap-4">
                <ul class="flex flex-col gap-2">
                    <li>Name: {{ $crop->name }}</li>
                    <li>Scientific Name: {{ $crop->scientific_name }}</li>
                    <li>Optimal pH Min: {{ $crop->optimal_ph_min }}</li>
                    <li>Optimal pH Max: {{ $crop->optimal_ph_max }}</li>
                    <li>Water Requirement Per Season (mm): {{ $crop->water_requirement_per_season_in_mm }}</li>
                    <li>Growth Duration (days): {{ $crop->growth_duration_in_days }}</li>
                </ul>
                <div>
                    <form method="POST" action="{{ route('crops.destroy', $crop) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <a href="{{ route('crops.edit', $crop) }}">Edit</a>
                </div>
            </div>
        @endforeach
    </div>

    {{ $crops->links() }}
</x-app>
