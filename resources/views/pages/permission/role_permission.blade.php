<x-dashboard.basecomponent>
    <x-dashboard.cardheader title="Role Permissions" />

    <x-dashboard.cardcomponent>
        <div class="card-body">
            <div class="mt-3">
                <table class="table table-responsive table-bordered align-middle text-center mb-0">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col" class="w-25">Role</th>
                            <th scope="col">Default Permissions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $r)
                            <tr>
                                <td class="fw-semibold">{{ $r->role_name }}</td>
                                <td class="text-start">
                                    @if ($r->defaultPermissions->isEmpty())
                                        <span class="badge bg-secondary">No Default Permission</span>
                                    @else
                                        <div class="border rounded p-2 bg-white">
                                            @php
                                                $groupedPermissions = $r->defaultPermissions->groupBy('subModule.subm_id');
                                            @endphp

                                            @foreach ($groupedPermissions as $submId => $permissions)
                                                @php
                                                    $subModule = $permissions->first()->subModule;
                                                @endphp

                                                <div class="mb-2">
                                                    <div class="fw-bold text-dark">{{ $subModule->module->module_name }}</div>

                                                    <div class="ms-3 fw-semibold">
                                                        {{ $subModule->subm_name }}
                                                    </div>

                                                    @foreach ($permissions as $perm)
                                                        <div class="ms-4 px-2 py-1 text-dark rounded small d-flex align-items-center justify-content-between bg-light mt-1">
                                                            <div>
                                                                — <span class="text-info">{{ ucfirst($role_keys[$perm->allowed]) }}</span>
                                                            </div>
                                                            <a href="{{ route('role_permission_remove', ['id' => $perm->def_perm_id]) }}"
                                                                class="btn btn-sm btn-outline-danger ms-2"
                                                                onclick="return confirm('Are you sure you want to remove this permission?');">
                                                                <i class="fa-solid fa-xmark"></i>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    <!-- Permission Dropdown -->
                                    <div class="dropdown mt-3">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            <i class="fa-solid fa-plus me-1"></i> Add Permission
                                        </button>
                                        <ul class="dropdown-menu p-2 shadow" style="max-height: 300px; overflow-y: auto;">
                                            @foreach ($all as $a)
                                                <li>
                                                    <h6 class="dropdown-header">{{ $a->module_name }}</h6>
                                                </li>
                                                @foreach ($a->subModules as $sub)
                                                    <li class="ms-3 text-muted fw-semibold">{{ $sub->subm_name }}</li>
                                                    @foreach (['view' => 1, 'create' => 2, 'delete' => 8, 'edit' => 4] as $perm => $val)
                                                        <li>
                                                            <a class="dropdown-item small" href="{{ route('role_permission_add', [
                                                                'role_id' => $r->role_id,
                                                                'sub_id' => $sub->subm_id,
                                                                'perm' => $val,
                                                            ]) }}">
                                                                <i class="fa-solid fa-circle-plus me-1 text-primary"></i> {{ ucfirst($perm) }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                @endforeach
                                                <li><hr class="dropdown-divider"></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-dashboard.cardcomponent>
</x-dashboard.basecomponent>
