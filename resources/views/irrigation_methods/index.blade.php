<x-app>
    <div class="flex flex-col gap-8">
        @foreach($irrigationMethods as $irrigationMethod)
            <div class="flex flex-col gap-4">
                <ul class="flex flex-col gap-2">
                    <li>Name: {{ $irrigationMethod->name }}</li>
                    <li>Description: {{ $irrigationMethod->description }}</li>
                    <li>Efficiency: {{ $irrigationMethod->efficiency }}</li>
                </ul>
                <div>
                    <form method="POST" action="{{ route('irrigation_methods.destroy', $irrigationMethod) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <a href="{{ route('irrigation_methods.edit', $irrigationMethod) }}">Edit</a>
                </div>
            </div>
        @endforeach
    </div>

    {{ $irrigationMethods->links() }}
</x-app>