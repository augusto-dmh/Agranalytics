<x-app>
    <div class="flex flex-col gap-8">
        @foreach($farmers as $farmer)
            <div class="flex flex-col gap-4">
                <ul class="flex flex-col gap-2">
                    <li>Full Name: {{ $farmer->full_name }}</li>
                    <li>Email: {{ $farmer->email }}</li>
                    <li>Phone Number: {{ $farmer->phone_number }}</li>
                </ul>
                <div>
                    <form method="POST" action="{{ route('farmers.destroy', $farmer) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <a href="{{ route('farmers.edit', $farmer) }}">Edit</a>
                </div>
            </div>
        @endforeach
    </div>

    {{ $farmers->links() }}
</x-app>
