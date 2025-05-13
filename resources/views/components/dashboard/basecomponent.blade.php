<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>icastetuan</title>
    <link href="{{asset('assets/school_content/admin_small_logo/1.png')}}" rel="shortcut icon" type="image/x-icon">


    <link href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid px-0">
        <nav class="navbar sticky-top bg-skin-blue shadow-lg justify-content-start align-items-center">
            <div class="navbar-brand">
                <img src="{{ asset('assets/school_content/admin_logo/1.png') }}" alt="logo" style="width: 72%;">
                <a class="btn btn-outline-secondary fa-solid fa-bars bg-skin-blue text-white d-md-none d-inline-block" id="sidebarCollapse" aria-controls="offcanvasExample"></a>
                
            </div>
            <div class="navbar-brand">
                <h5 class="fs-4 m-0 text-white">{{ config('app.app_title') }}</h5>
            </div>
        </nav>
        <div class="row m-0 ">
            <div class="col-lg-2 col-md-3 col-6 px-0 collapse collapse-horizontal show" id="sidebar">
                <div class="collapse show collapse-horizontal bg-skin-blue vh-100" id="myCollapse">
                    <ul class="list-group p-2">


                        @foreach (config('menu') as $key => $menu)

                            <li class="fs-8 text-nowrap list-group-item d-flex justify-content-between align-items-center my-1" id="menu{{$key}}"
                                data-bs-toggle="collapse" data-bs-target="#submenu{{$key}}">
                                <span > <i class="{{ $menu['icon'] }}"></i></span>
                                {{ $menu['menu'] }}
                                <span> <i class="fa fa-angle-left" id="icon-item-{{$key}}"></i></span>
                            </li>

                            @if(!empty($menu['submenu'])) 
                                <ul class="list-group collapse my-2 px-2" id="submenu{{$key}}">
                                    @foreach ($menu['submenu'] as $key => $item)
                                        <li class="list-group-item border my-1 text-white bg-skin-blue"><a href="{{ route($item['route']) }}" class="text-decoration-none text-white fs-6">{{ $key }}</a></li>
                                    @endforeach
                                </ul>
                            @endif

                        @endforeach

                        
                    </ul>
                </div>
            </div>

            <div class="col">
                {{ $slot }}
            </div>
        </div>

    </div>
    

    


    {{-- <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists,
                etc.
            </div>
            <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Dropdown button
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
    </div> --}}
    
    <script>
       document.addEventListener('DOMContentLoaded', function () {
            let sidebarCollapse = document.getElementById('sidebarCollapse');
            let sidebar = document.getElementById('sidebar');

            sidebarCollapse.addEventListener('click', function () {

               if (sidebar.classList.contains('d-none')) {
                   sidebar.classList.remove('d-none');
               } else {
                   sidebar.classList.add('d-none');
               }
               console.log('click');
               const bsCollapse = new bootstrap.Collapse('#sidebar', {
                   toggle: true
               });
           });

           @foreach (config('menu') as $key => $menu)

               let menu_item_{{$key}} = document.getElementById("submenu{{$key}}");

               menu_item_{{$key}}.addEventListener('hide.bs.collapse', () => {
                   let icon = document.getElementById('icon-item-{{$key}}');
                   let menu = document.getElementById('menu{{$key}}');
                   menu.classList.remove('active');
                   icon.classList.remove('fa-angle-down');
                   icon.classList.add('fa-angle-left');
               });


               menu_item_{{$key}}.addEventListener('show.bs.collapse', () => {
                   let icon = document.getElementById('icon-item-{{$key}}');
                   let menu = document.getElementById('menu{{$key}}');
                   menu.classList.add('active');
                   icon.classList.remove('fa-angle-left');
                   icon.classList.add('fa-angle-down');
               });

           @endforeach


        });
    </script>
</body>
</html>