<x-app>
    <ul>
        @foreach($irrigationMethod->only(['name', 'description', 'efficiency']) as $key => $value)
            <li>{{ $key }}: {{ $value }}</li>
        @endforeach
    </ul>
</x-app>
