
<x-admin-layout title="Profile">
    <x-slot name="content">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">Profile</h4>

            <div class="card">
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Joined:</strong> {{ $user->created_at->format('Y-m-d') }}</p>
                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>