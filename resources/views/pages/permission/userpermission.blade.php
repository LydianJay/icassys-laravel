<x-dashboard.basecomponent>
    <x-dashboard.cardheader title="User Permissions" />

    <x-dashboard.cardcomponent>
        <div class="card-body">
            <div class="mb-4">
                <h5 class="fw-bold mb-1">User:</h5>
                <p class="mb-0">
                    {{ $user->fname }} {{ $user->lname }} <br>
                    <small class="text-muted">{{ $user->email }}</small>
                </p>
            </div>

            <table class="table table-bordered text-center align-middle">
                <thead class="table-secondary">
                    <tr>
                        <th>Module</th>
                        <th>Submodule</th>
                        <th>Permission</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($user->permissions->isEmpty())
                        <tr>
                            <td colspan="3">
                                <span class="text-muted">No permissions assigned</span>
                            </td>
                        </tr>
                    @else
                        @foreach ($user->permissions as $perm)
                            <tr>
                                <td>{{ $perm->subModule->module->module_name }}</td>
                                <td>{{ $perm->subModule->subm_name }}</td>
                                <td class="text-start">
                                    @php
                                        $allowed = $perm->allowed;
                                        $permMap = [
                                            1 => 'View',
                                            2 => 'Create',
                                            4 => 'Edit',
                                            8 => 'Delete',
                                        ];
                                    @endphp
            
                                    <div class="d-flex justify-content-center flex-wrap gap-2">
                                        @foreach ($permMap as $bit => $label)
                                            @if ($allowed & $bit)
                                                <div class="badge bg-primary d-flex align-items-center p-2 gap-2">
                                                    {{ $label }}
                                                    <a type="submit" class="btn btn-sm btn-danger btn-icon" title="Remove {{ $label }}">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            

            <!-- Add new permission dropdown -->
            <div class="mt-4">
                <h5>Add Permission</h5>
                <div class="dropdown mt-2">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-plus me-1"></i> Add Permission
                    </button>
                    <ul class="dropdown-menu p-2 shadow" style="max-height: 300px; overflow-y: auto;">
                        @foreach ($all as $module)
                            <li>
                                <h6 class="dropdown-header">{{ $module->module_name }}</h6>
                            </li>
                            @foreach ($module->subModules as $sub)
                                <li class="ms-3 text-muted fw-semibold">{{ $sub->subm_name }}</li>
                                @foreach (['View' => 1, 'Create' => 2, 'Edit' => 4, 'Delete' => 8] as $permName => $bit)
                                    <li>
                                        <a class="dropdown-item small" href="">
                                            <i class="fa-solid fa-circle-plus me-1 text-success"></i> {{ $permName }}
                                        </a>
                                    </li>
                                @endforeach
                            @endforeach
                            <li><hr class="dropdown-divider"></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </x-dashboard.cardcomponent>
</x-dashboard.basecomponent>
