<x-app>
    <div class="flex flex-col gap-8">
        @foreach($farms as $farm)
            <div class="flex flex-col gap-4">
                <ul class="flex flex-col gap-2">
                    <li>Name: {{ $farm->name }}</li>
                    <li>Address: {{ $farm->address }}</li>
                    <li>Size (ha): {{ $farm->size_in_ha }}</li>
                    <li>Farmer: {{ $farm->farmer->full_name }}</li>
                    <li>Soil Type: {{ $farm->soilType->name }}</li>
                    <li>Irrigation Method: {{ $farm->irrigationMethod->name }}</li>
                    <li>Crops: {{ $farm->crops->pluck('name')->implode(', ') }}</li>
                </ul>
                <div>
                    <form method="POST" action="{{ route('farms.destroy', $farm) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <a href="{{ route('farms.edit', $farm) }}">Edit</a>
                </div>
            </div>
        @endforeach
    </div>

    {{ $farms->links() }}
</x-app>

{{-- 'name',
'address',
'size_in_ha',
'farmer_id',
'soil_type_id',
'irrigation_method_id', --}}
