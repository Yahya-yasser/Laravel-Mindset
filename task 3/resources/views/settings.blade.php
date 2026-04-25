<x-admin-layout title="Settings">
    <x-slot name="content">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">Settings</h4>

            <div class="card p-3">
                <p>Here you can add settings for your app.</p>
                <form>
                    <div class="mb-3">
                        <label class="form-label">App Name</label>
                        <input type="text" class="form-control" value="Mindset">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Theme</label>
                        <select class="form-select">
                            <option selected>Default</option>
                            <option>Dark</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Settings</button>
                </form>
            </div>
        </div>
    </x-slot>
</x-admin-layout>