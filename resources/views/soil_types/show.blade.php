<x-app>
    <ul>
        @foreach($soilType->only(getAllNonFKAttributes($soilType)) as $key => $value)
            <li>{{ $key }}: {{ $value }}</li>
        @endforeach
    </ul>
</x-app>
