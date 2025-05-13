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
        


   </x-dashboard.cardcomponent>




</x-dashboard.basecomponent>