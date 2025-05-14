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
                $p2 = isset($users[$i + 1]) ? $users[$i + 1] : null;
                                                                                                                                                                @endphp

                <div class="row">
                    <div class="col">
                        <div class="card card-body shadow-lg">
                            <div class="row">
                                <div class="col">

                                    <img class="border rounded-1 mx-3" src="{{ asset('storage/uploads/staff/' . $p1->photo) }}" alt="Profile"
                                        style="width: calc(15vh); height: calc(15vh);">
                                    <a href="{{ route('staff_edit_view', ['id' => $p1->id])  }}"><i class="fa-solid fa-pen-to-square mt-2 mx-3"></i></a>
                                    <a href="" class=""><i class="fa-solid fa-trash"></i></a>
                                </div>
                                <div class="col d-flex flex-column justify-content-start">

                                    <p class="fs-6 ms-2">{{ $p1->fname . ' ' . $p1->mname . ' ' . $p1->lname }}</p>
                                    <p class="fs-5 ms-2 mb-0">{{ $p1->dept_name }}</p>
                                    <p class="fs-5 ms-2">IT Admin</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-body shadow-lg">
                            <div class="row">
                                <div class="col">
                                    <img class="border rounded-1 mx-3" src="{{ asset('storage/uploads/staff/' . $p1->photo) }}"
                                        alt="Profile" style="width: calc(15vh); height: calc(15vh);">
                                </div>
                                <div class="col d-flex flex-column justify-content-start">
                                    <p class="fs-6 ms-2">{{ $p1->fname . ' ' . $p1->mname . ' ' . $p1->lname }}</p>
                                    <p class="fs-5 ms-2 mb-0">{{ $p1->dept_name }}</p>
                                    <p class="fs-5 ms-2">IT Admin</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-body shadow-lg">

                            @if(isset($p2))
                                <div class="row">
                                    <div class="col">
                                        <img class="border rounded-1 mx-3" src="{{ asset('storage/uploads/staff/' . $p2->photo) }}" alt="Profile" style="width: calc(10vh); height: calc(10vh);">
                                    </div>
                                    <div class="col d-flex flex-column">
                                        <p class="fs-5 ms-2">{{ $p2->fname . ' ' . $p2->mname . ' ' . $p2->lname }}</p>
                                        <p class="fs-5 ms-2">{{ $p2->dept_name }}</p>
                                    </div>
                                </div>    

                            @endif
                        </div>
                    </div>
                </div>

            @endfor
            


        </div>        


   </x-dashboard.cardcomponent>

   


</x-dashboard.basecomponent>