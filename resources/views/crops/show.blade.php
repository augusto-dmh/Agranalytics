<x-app>
    @foreach($crop->only($crop->getFillable()) as $key => $value)
        <li>{{ $key }}: {{ $value }}</li>
    @endforeach
</x-app>
