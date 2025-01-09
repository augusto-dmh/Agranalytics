<x-app>
    <form method="POST" action="{{ route('farmers.store') }}">
        @csrf

        <div>
            <label for="farmer.full_name">Full Name</label>
            <input type="text" id="farmer.full_name" name="farmer[full_name]" />
        </div>
        <div>
            <label for="farmer.phone_number">Phone Number</label>
            <input type="text" id="farmer.phone_number" name="farmer[phone_number]" />
        </div>
        <div>
            <label for="farmer.email">Email</label>
            <input type="text" id="farmer.email" name="farmer[email]" />
        </div>
        <div>
            <label for="farmer.password">Password</label>
            <input type="text" id="farmer.password" name="farmer[password]" />
        </div>
                <div>
            <label for="farmer.password_confirmation">Password Confirmation</label>
            <input type="text" id="farmer.password_confirmation" name="farmer[password_confirmation]" />
        </div>

        <button type="submit">Create</button>
    </form>
</x-app>
