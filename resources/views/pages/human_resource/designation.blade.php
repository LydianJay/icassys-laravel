<x-dashboard.basecomponent>
    <div class="container-fluid px-1 py-2">
        
    
        <div class="card shadow-lg">
    
            <div class="card-header">
                

                @if (session('status'))
                    <div class="alert {{session('status')['alert']}} alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        {{ session('status')['msg'] }}
                    </div>
                @endif

                
                
                <h5>Designation</h5>
                <div class="row mt-3 align-items-center">
                    <div class="col">
                        <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#create_modal">Create <span><i class="fa-solid fa-plus"></i></span></button>
                    </div>
                    <div class="col">
                        <form action="{{ route('designation', ['search']) }}" method="get">

                            <div class="input-group my-1">
                                <input type="text" class="form-control" name="search" placeholder="Teacher..." value="{{ request()->input('search') }}">
                                <span class="input-group-text">
                                    <button class="btn-sm btn p-0 border-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </span>
                            </div>
                        </form>

                    </div>
                </div>
                    
            </div>
    
            <div class="card-body">
                <table class="table-responsive table table-striped">
                    <thead>
                        <tr class="text-center">
                            <td>Designation</td>
                            <td >Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($designations as $d)
                            <tr class="text-center">
                                <td>{{ $d->role_name }}</td>
                                <td>
                                    <div class="d-flex flex-row justify-content-evenly align-items-center">

                                        <button class="btn btn-sm btn-outline-secondary" onclick="window.location = '{{route('designation', ['id' => $d->role_id])}}'; ">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>

                                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirm_delete_modal" >
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
        </div>
    
    
    </div>


    
    {{-- Create Modal --}}
    <div class="modal fade" id="create_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Create</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('designation_create') }}" method="POST">
                    @csrf

                    <div class="modal-body">
                        <div class="input-group">
                            <input type="text" class="form-control" name="role_name" placeholder="Teacher II">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- Confirm Delete Modal --}}
    <div class="modal fade" id="confirm_delete_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h1 class="modal-title fs-5">Delete Role?</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger" onclick="window.location = '{{route('designation_delete', ['id' => $d->role_id])}}'; ">Delete</button>
                </div>
            </div>
        </div>
    </div>


    {{-- Edit Modal --}}
    @if(isset($edit))
        <div class="modal fade" id="edit_modal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Edit</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('designation_edit') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="input-group">
                                <input type="number" name="id" hidden value="{{$edit->role_id}}">
                                <input type="text" class="form-control" name="role_name" value="{{$edit->role_name}}" placeholder="Teacher II">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            
            @if(isset($edit))
                let edit_modal = new bootstrap.Modal(document.getElementById('edit_modal'));
                edit_modal.show();
            @endif
        });
    </script>

</x-dashboard.basecomponent>