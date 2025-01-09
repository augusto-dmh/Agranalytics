<x-app>
    @foreach($farmer->only($farmer->getFillable()) as $key => $value)
        <li>{{ $key }}: {{ $value }}</li>
    @endforeach
</x-app>
