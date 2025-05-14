<x-dashboard.basecomponent>
    <x-dashboard.cardcomponent>
        <x-dashboard.cardheader title="Students">
           
            <div class="row mt-3 align-items-center pb-2 border-bottom">
                <div class="col">
                    <a class="btn btn-sm btn-outline-success" href="{{route('student_create_view')}}">Create
                        <span><i class="fa-solid fa-plus"></i></span></a>
                </div>
                <div class="col">
                    <x-dashboard.cardsearchbar search_route="student" placeholder="Jane Doe"></x-dashboard.cardsearchbar>
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
                                                                            <img src="{{ asset('storage/uploads/student/photos/' . $p1->photo) }}" alt="Profile"
                                                                                class="rounded-circle me-3" style="width: 80px; height: 80px; object-fit: cover;">
                                                                            <div class="flex-grow-1">
                                                                                <h6 class="mb-1">{{ $p1->fname }} {{ $p1->mname }} {{ $p1->lname }}</h6>
                                                                                <p class="mb-0 text-muted">Admission No: {{ $p1->admission_no }}</p>
                                                                                <p class="mb-0 text-muted">{{ ucfirst($p1->category) }}</p>
                                                                            </div>
                                                                            <div class="ms-2">
                                                                                <a href="{{ route('student_edit_view', ['id' => $p1->id]) }}" class="text-primary me-2">
                                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                                </a>
                                                                                <a student_id="{{ $p1->id}}" data-bs-toggle="modal" data-bs-target="#confirm_delete_modal" id="delete_btn" href="{{ route('student_delete', ['id' => $p1->id]) }}" class="text-danger">
                                                                                    <i class="fa-solid fa-trash"></i>
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
                                                                                <img src="{{ asset('storage/uploads/student/photos/' . $p2->photo) }}" alt="Profile"
                                                                                    class="rounded-circle me-3" style="width: 80px; height: 80px; object-fit: cover;">
                                                                                <div class="flex-grow-1">
                                                                                    <h6 class="mb-1">{{ $p2->fname }} {{ $p2->mname }} {{ $p2->lname }}</h6>
                                                                                    <p class="mb-0 text-muted">Admission No. {{ $p1->admission_no }}</p>
                                                                                    <p class="mb-0 text-muted">{{ ucfirst($p1->category) }}</p>
                                                                                </div>
                                                                                <div class="ms-2">
                                                                                    <a href="{{ route('student_edit_view', ['id' => $p2->id]) }}" class="text-primary me-2">
                                                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                                                    </a>
                                                                                    <a student_id="{{ $p2->id}}" data-bs-toggle="modal" data-bs-target="#confirm_delete_modal" id="delete_btn" href="{{ route('student_delete', ['id' => $p2->id]) }}" class="text-danger">
                                                                                        <i class="fa-solid fa-trash"></i>
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

            let delete_btn = document.getElementById('delete_btn');
            delete_btn.addEventListener('click', function () {
                let student_id = delete_btn.getAttribute('student_id');
                const url = "{{ route('student_delete') }}" + "?id=" + student_id;
                document.getElementById('confirm_delete').setAttribute('href', url);
            });
        });
    </script>
</x-dashboard.basecomponent>