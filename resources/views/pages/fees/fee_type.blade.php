<x-dashboard.basecomponent>
    <x-dashboard.cardcomponent>
        <x-dashboard.cardheader title="Fee Type">

            <div class="row mt-3 align-items-center pb-2 border-bottom">
                <div class="col">
                    <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#create_modal">Create <span><i
                                class="fa-solid fa-plus"></i></span></button>
                </div>
                <div class="col">
                    <x-dashboard.cardsearchbar search_route="fee_type"
                        placeholder="Tuition.."></x-dashboard.cardsearchbar>
                </div>
            </div>

        </x-dashboard.cardheader>
        <div class="card-body">
            <table class="table-responsive table table-striped">
                <thead>
                    <tr class="text-center">
                        <td>Fee Type</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fee_type as $d)
                        <tr class="text-center">
                            <td>{{ $d->fee_type_name }}</td>
                            <td>
                                <div class="d-flex flex-row justify-content-evenly align-items-center">

                                    <button class="btn btn-sm btn-outline-secondary"
                                        onclick="window.location = '{{route('fee_type', ['id' => $d->fee_type_id])}}'; ">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#confirm_delete_modal" id="delete_btn_{{$d->fee_type_id}}" btn_id="{{$d->fee_type_id}}">
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

    <x-dashboard.createmodal create_route="fee_type_create">
        
        <div class="input-group my-3">
            <input type="text" class="form-control" name="fee_type_name" placeholder="Name">
            @error('fee_type_name')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="input-group my-3">
            <input type="text" class="form-control" name="fees_code" placeholder="Code">
            @error('fees_code')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="input-group my-3">
            <input type="number" step="0.01" class="form-control" name="ammount" placeholder="Ammount">
            @error('ammount')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
    </x-dashboard.createmodal>

    @if(isset($edit))
        <x-dashboard.editmodal edit_route="fee_type_edit">
            <input type="number" name="id" hidden value="{{$edit->fee_type_id}}">

            <div class="input-group my-3">
                <input type="text"  class="form-control" name="fee_type_name" value="{{$edit->fee_type_name}}" placeholder="Fee Type Name">
            </div>
            <div class="input-group my-3">
                <input type="text" class="form-control" name="fees_code" value="{{$edit->fees_code}}" placeholder="Fee Type code">
            </div>
            <div class="input-group my-3">
                <input type="number" step="0.01" class="form-control" name="ammount" value="{{$edit->ammount}}" placeholder="ammount">
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

            let fees = @json($fee_type);




            // let delete_btn = document.getElementById('delete_btn');
            // delete_btn.addEventListener('click', function () {
            //     let dept_id = delete_btn.getAttribute('dept_id');
            //     const url = "{{ route('department_delete') }}" + "?id=" + dept_id;
            //     document.getElementById('confirm_delete').setAttribute('href', url);
            // });




            let delete_buttons = fees.map(ids => ids.fee_type_id);
            delete_buttons.forEach(element => {
                let delete_btn = document.getElementById('delete_btn_' + element);
                delete_btn.addEventListener('click', function(){
                    let btn_id = delete_btn.getAttribute('btn_id');
                    const url = "{{ route('fee_type_delete') }}" + "?id=" + btn_id;
                    document.getElementById('confirm_delete').setAttribute('href', url);
                });
            });
        });
    </script>

</x-dashboard.basecomponent>