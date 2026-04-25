<x-admin-layout title="settings">
    <x-slot name="content">
        <div class="container-xxl flex-grow-1 container-p-y">
            @if (session('status'))
                <div class="card my-2">
                    <div class="card-body">
                        <div class="alert alert-success" role="alert">{{ session('status') }}</div>
                    </div>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h5>Create new role</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="form-floating">
                            <input type="text" class="form-control @error('name') invalid @enderror"
                                id="floatingInput" placeholder="Admin, mangment" aria-describedby="floatingInputHelp"
                                name="name">
                            <label for="floatingInput">Role Name</label>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="list-group my-3 d-flex gap-2">
                            <button type="button" id="btnSelectAll" onclick="selectAllCheckboxes()" class="btn btn-sm btn-outline-primary">
                                Select All
                            </button>
                            <button type="button" id="btnUnselectAll" onclick="unselectAllCheckboxes()" class="btn btn-sm btn-outline-secondary">
                                Unselect All
                            </button>
                        </div>

                        
                        <div class="list-group my-3">
                            @foreach ($permissions as $group => $permissions)
                                <div id="accordionIcon" class="accordion mt-3 accordion-without-arrow">
                                    <div class="accordion-item card">
                                        <h2 class="accordion-header text-body d-flex justify-content-between"
                                            id="accordionIconOne">
                                            <button type="button" class="accordion-button collapsed"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#accordionIcon-{{ $group }}"
                                                aria-controls="accordionIcon-{{ $group }}" aria-expanded="false">
                                                {{ $group }}
                                            </button>
                                        </h2>

                                        <div id="accordionIcon-{{ $group }}" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionIcon" style="">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    @foreach ($permissions as $permission)
                                                        <div class="col-4 my-2">
                                                            <label class="list-group-item">
                                                                <input class="form-check-input me-1" type="checkbox"
                                                                    value="{{ $permission->name }}"
                                                                    name="permissions[]" />
                                                                {{ $permission->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>

            </div>
    </x-slot>
</x-admin-layout>