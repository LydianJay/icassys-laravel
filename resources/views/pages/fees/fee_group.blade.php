<x-dashboard.basecomponent>
    <x-dashboard.cardcomponent>
        <x-dashboard.cardheader title="Fee Group">

            <div class="row mt-3 align-items-center pb-2 border-bottom">
                <div class="col">
                    
                </div>
                <div class="col">
                    <x-dashboard.cardsearchbar search_route="fee_group"
                        placeholder="College"></x-dashboard.cardsearchbar>
                </div>
            </div>

        </x-dashboard.cardheader>
        <div class="card-body">
            <div class="mt-3">

                @foreach ($fee_group as $f)
                    <div class="card h-100 shadow-sm my-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">[{{$f->class_code}}] {{$f->class_name}} - {{ucfirst($f->category)}}</h5>
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('fee_group', ['id' => $f->class_master_id]) }}">
                                <i class="fa-solid fa-plus"></i>
                            </a>              
                        </div>
                        @php
                            $totalAmount = 0;
                        @endphp
                        <div class="card-body">
                            <ul class="list-group my-3" >
                                @if($f->feeGroups->isEmpty())
                                    <li class="list-group-item list-group-item-light text-dark p-0">
                                        <p class="fs-7 fw-bold mb-0 text-center border-1 px-2 py-2 ">No Fees</p>
                                    </li>
                                @endif
                                @foreach ($f->feeGroups as $g)
                                    <li class="list-group-item list-group-item-light text-dark p-0">
                                        <div class="d-flex align-items-center justify-content-between px-0">
                                            @if ($g->feeType)
                                                @php
                                                    $totalAmount += $g->feeType->ammount;
                                                @endphp
                                                <div class="d-flex align-items-center">
                                                    <p class="fs-7 fw-bold mb-0 border-end text-center border-1 px-2 py-2 border-dark">{{$g->feeType->fees_code}}</p>
                                                    <p class="fs-6 mb-0 px-3">{{$g->feeType->fee_type_name}} - <strong>{{$g->feeType->ammount}}</strong></p>
                                                </div>
                                                <a class="btn btn-sm btn-outline-danger me-2" href="{{route('remove_fee', ['id' => $g->fee_group_id])}}">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach


                                <li class="list-group-item list-group-item-secondary text-dark d-flex justify-content-between">
                                    <strong>Total</strong>
                                    <strong>₱{{$totalAmount}}</strong>                   
                                </li>
                            </ul>

                        </div>
                    </div>
                @endforeach
                

            </div>
        </div>
    </x-dashboard.cardcomponent>

    @if (isset($fee_types))
        <div class="modal fade" id="add_fee_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Add Fee</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('add_fee')}}" method="POST">
                        @csrf
                        <input type="number" name="class_master_id" value="{{$class_master_id}}" hidden>
                        <div class="modal-body">
                            <label class="form-label">Fee Type</label>
                            <div class="input-group">
                                <select name="fee_type" class="form-control">
                                    @foreach ($fee_types as $types)
                                        <option value="{{$types->fee_type_id}}">{{$types->fee_type_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
    

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if (isset($fee_types))
                const add_modal = new bootstrap.Modal(document.getElementById('add_fee_modal'));
                add_modal.show();
            @endif
           
        });
    </script>

</x-dashboard.basecomponent>