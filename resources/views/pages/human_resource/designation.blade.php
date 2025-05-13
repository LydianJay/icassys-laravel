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
                            <td># Personel</td>
                            <td >Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($designations as $d)
                            <tr class="text-center">
                                <td>{{ $d->role_name }}</td>
                                <td>1</td>
                                <td>
                                    <div class="d-flex flex-row justify-content-evenly align-items-center">
                                        <button class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
        </div>
    
    
    </div>


    
   
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

</x-dashboard.basecomponent>