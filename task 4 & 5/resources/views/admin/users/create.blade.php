<x-admin-layout title="Users">
    <x-slot name="content">
        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card mb-4">
                <h5 class="card-header">Create User</h5>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        {{-- Name --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="John Doe" name="name" value="{{ old('name') }}">
                            <label for="name">Name</label>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" placeholder="JohnDoe@example.com" name="email"
                                value="{{ old('email') }}">
                            <label for="email">Email</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" placeholder="......." name="password">
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Confirm Password --}}
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password_confirmation" placeholder="......"
                                name="password_confirmation">
                            <label for="password_confirmation">Confirm Password</label>
                        </div>
                        <select name="role" id="largeSelect" class="form-select form-select-lg mb-3">
                            <option value="">Select role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary me-2">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>
