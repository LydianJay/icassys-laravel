<x-dashboard.basecomponent>

    <x-dashboard.cardcomponent>
        <x-dashboard.cardheader title="Department">
            <div class="row mt-3 align-items-center">
                <div class="col">
                    <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#create_modal">Create
                        <span><i class="fa-solid fa-plus"></i></span></button>
                </div>
                <div class="col">
                    <form action="{{ route('department') }}" method="get">
            
                        <div class="input-group my-1">
                            <input type="text" class="form-control" name="search" placeholder="IT..."
                                value="{{ request()->input('search') }}">
                            <span class="input-group-text">
                                <button class="btn-sm btn p-0 border-0" type="submit"><i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                            </span>
                        </div>
                    </form>
            
                </div>
            </div>

        </x-dashboard.cardheader>

        <div class="card-body">
            <table class="table-responsive table table-striped">
                <thead>
                    <tr class="text-center">
                        <td>Department</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $d)
                        <tr class="text-center">
                            <td>{{ $d->dept_name }}</td>
                            <td>
                                <div class="d-flex flex-row justify-content-evenly align-items-center">

                                    <button class="btn btn-sm btn-outline-secondary"
                                        onclick="window.location = '{{route('department', ['id' => $d->dept_id])}}'; ">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirm_delete_modal"
                                        id="delete_btn" dept_id="{{$d->dept_id}}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </x-dashboard.cardcomponent>

    <x-dashboard.createmodal create_route="department_create">
        <div class="input-group">
            <input type="text" class="form-control" name="dept_name" placeholder="IT...">
        </div>
    </x-dashboard.createmodal>
    @if(isset($edit))
        <x-dashboard.editmodal edit_route="department_edit">
            <div class="input-group">
                <input type="number" name="id" hidden value="{{$edit->dept_id}}">
                <input type="text" class="form-control" name="dept_name" value="{{$edit->dept_name}}" placeholder="IT...">
            </div>
        </x-dashboard.editmodal>
    @endif

    <x-dashboard.deletemodal></x-dashboard.deletemodal>


    <script>
        document.addEventListener('DOMContentLoaded', function () {

            @if(isset($edit))
                let edit_modal = new bootstrap.Modal(document.getElementById('edit_modal'));
                edit_modal.show();
            @endif

            let delete_btn = document.getElementById('delete_btn');
            delete_btn.addEventListener('click', function () {
                let dept_id = delete_btn.getAttribute('dept_id');
                const url = "{{ route('department_delete') }}" + "?id=" + dept_id;
                document.getElementById('confirm_delete').setAttribute('href', url);
            });
        });
    </script>
</x-dashboard.basecomponent>