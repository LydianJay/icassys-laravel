<x-dashboard.basecomponent>
    <x-dashboard.cardcomponent>
        <x-dashboard.cardheader title="Fee Type">

            <div class="row mt-3 align-items-center pb-2 border-bottom">
                <div class="col">
                    <a class="btn btn-sm btn-outline-success" href="{{route('student_create_view')}}">Create
                        <span><i class="fa-solid fa-plus"></i></span></a>
                </div>
                <div class="col">
                    <x-dashboard.cardsearchbar search_route="student"
                        placeholder="Jane Doe"></x-dashboard.cardsearchbar>
                </div>
            </div>
        </x-dashboard.cardheader>
    </x-dashboard.cardcomponent>
</x-dashboard.basecomponent>