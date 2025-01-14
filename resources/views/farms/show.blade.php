<x-app>
    @foreach($farm->only(getAllNonFKAttributes($farm)) as $key => $value)
        <li>{{ $key }}: {{ $value }}</li>
    @endforeach

    <li>Farmer: {{ $farm->farmer->full_name ?? 'N/A' }}</li>
    <li>Soil Type: {{ $farm->soilType->name ?? 'N/A' }}</li>
    <li>Irrigation Method: {{ $farm->irrigationMethod->name ?? 'N/A' }}</li>
    <li>Crops: {{ $farm->crops->pluck('name')->implode(', ') }}</li>
</x-app>
