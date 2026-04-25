{{-- <x-admin-layout title="Settings">
    <x-slot:content>
        @can('update', $user)
<div class="card mt-4">
    <div class="card-header">
        <h5>Change User Role</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('settings.updateRole', $user->id) }}" method="POST">
            @csrf
            <div class="form-floating">
                <select name="role" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}" 
                            {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }}
                        </option>
                    @endforeach
                </select>
                <label for="role">Select Role</label>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Update Role</button>
        </form>
    </div>
</div>
@endcan

    </x-slot>

</x-admin-layout> --}}
