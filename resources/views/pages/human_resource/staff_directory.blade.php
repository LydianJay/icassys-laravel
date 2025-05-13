<x-dashboard.basecomponent>
    
   <x-dashboard.cardcomponent>
        <x-dashboard.cardheader title="Staff">

            <div class="row">
                <div class="col">
                    <a class="btn btn-sm btn-outline-success" href="{{ route('staff_create_view') }}">Create <span><i class="fa-solid fa-plus"></i></span></a>
                </div>
                <div class="col">
                    <x-dashboard.cardsearchbar search_route="staff" placeholder="Juan Dela Cruz"> </x-dashboard.cardsearchbar>
                </div>
            </div>
        </x-dashboard.cardheader>

        <div class="card-body">
            @for  ($i = 0; $i < count($users); $i += 2)
                                        @php
                $p1 = $users[$i];
                $p2 = $users[$i + 1];
                                        @endphp

                                        <div class="row">
                                            <div class="col">
                                                <div class="card card-body shadow-lg">
                                                    <img class="border rounded-1" src="{{ asset('storage/uploads/staff/' . $p1->photo) }}" alt="Profile" style="width: calc(10vh); height: calc(10vh);">

                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card card-body shadow-lg">
                                                    @if(isset($p2))
                                                        <div class="d-flex flex-row justify-content-start align-items-center">
                                                            <img class="border rounded-1 mx-3" src="{{ asset('storage/uploads/staff/' . $p2->photo) }}" alt="Profile" style="width: calc(10vh); height: calc(10vh);">
                                                            <p class="fs-5 ms-2">{{ $p2->fname . ' ' . $p2->mname . ' ' . $p2->lname }}</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
            @endfor
            


        </div>        


   </x-dashboard.cardcomponent>




</x-dashboard.basecomponent>