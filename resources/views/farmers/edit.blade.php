<x-app>
    <form method="POST" action="{{ route('farmers.update', $farmer) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $farmer->full_name) }}"/>
            @error('full_name')
                <p class="text-red-500 alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="phone_number">Phone Number</label>
            <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $farmer->phone_number) }}"/>
            @error('phone_number')
                <p class="text-red-500 alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $farmer->email) }}" />
            @error('email')
                <p class="text-red-500 alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="{{ old('password') }}"/>
            @error('password')
                <p class="text-red-500 alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" id="password_confirmation" name="password_confirmation" />
            @error('password_confirmation')
                <p class="text-red-500 alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Update</button>
    </form>
</x-app>
