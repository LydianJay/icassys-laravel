<x-dashboard.basecomponent>
    <x-dashboard.cardcomponent>
        <x-dashboard.cardheader title="Staff">
            <div class="row align-items-center mb-1 pb-2 border-bottom">
                <div class="col">
                    <a class="btn btn-sm btn-outline-success" href="{{ route('staff_create_view') }}">
                        Create <span><i class="fa-solid fa-plus"></i></span>
                    </a>
                </div>
                <div class="col">
                    <x-dashboard.cardsearchbar search_route="staff" placeholder="Juan Dela Cruz" />
                </div>
            </div>
        </x-dashboard.cardheader>

        <div class="card-body">
            <div class="container mt-3">
                <div class="row">
                    @for($i = 0; $i < count($users); $i += 2)
                        @php
                            $p1 = $users[$i];
                            $p2 = $users[$i + 1] ?? null;
                        @endphp

                        {{-- First Card --}}
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ asset('storage/uploads/staff/' . $p1->photo) }}" alt="Profile"
                                        class="rounded-circle me-3" style="width: 80px; height: 80px; object-fit: cover;">
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">{{ $p1->fname }} {{ $p1->mname }} {{ $p1->lname }}</h6>
                                        <p class="mb-0 text-muted">{{ $p1->dept_name }}</p>
                                        <p class="mb-0 text-muted">{{ $p1->role_name }}</p>
                                    </div>
                                    <div class="ms-2">
                                        <a href="{{ route('staff_edit_view', ['id' => $p1->id]) }}"
                                            class="text-primary me-2">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a class="text-danger me-2" data-bs-toggle="modal" data-bs-target="#confirm_delete_modal" id="delete_btn_{{$p1->id}}" staff_id="{{$p1->id}}">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                        <a class="text-info" href="{{ route('userpermission', ['id' => $p1->id]) }}">
                                            <i class="fa-solid fa-key"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Second Card (if exists) --}}
                        @if($p2)
                            <div class="col-md-6 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body d-flex align-items-center">
                                        <img src="{{ asset('storage/uploads/staff/' . $p2->photo) }}" alt="Profile"
                                            class="rounded-circle me-3" style="width: 80px; height: 80px; object-fit: cover;">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">{{ $p2->fname }} {{ $p2->mname }} {{ $p2->lname }}</h6>
                                            <p class="mb-0 text-muted">{{ $p2->dept_name }}</p>
                                            <p class="mb-0 text-muted">{{ $p2->role_name }}</p>
                                        </div>
                                        <div class="ms-2">
                                            <a href="{{ route('staff_edit_view', ['id' => $p2->id]) }}"
                                                class="text-primary me-2">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a class="text-danger me-2" data-bs-toggle="modal" data-bs-target="#confirm_delete_modal" id="delete_btn_{{$p2->id}}" staff_id="{{$p2->id}}">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                            <a class="text-info" href="{{ route('userpermission', ['id' => $p2->id]) }}">
                                                <i class="fa-solid fa-key"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endfor
                </div>
            </div>
        </div>
    </x-dashboard.cardcomponent>

    <x-dashboard.deletemodal>

    </x-dashboard.deletemodal>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            console.log('Loaded');
            @foreach ($users as $u)

                let delete_btn_{{$u->id}} = document.getElementById('delete_btn_{{$u->id}}');
                delete_btn_{{$u->id}}.addEventListener('click', function () {
                    console.log('Click');
                    let staff_id = delete_btn_{{$u->id}}.getAttribute('staff_id');

                    console.log(staff_id);
                    const url = "{{ route('staff_delete') }}" + "?id=" + staff_id;
                    document.getElementById('confirm_delete').setAttribute('href', url);
                });

            @endforeach()
        });
    </script>
</x-dashboard.basecomponent>