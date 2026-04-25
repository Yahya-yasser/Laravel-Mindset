<x-admin-layout title="All Users">
    <x-slot name="content">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">All Users</h4>

            <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Create New User</a>

            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                 
                    </table>
                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>