<x-site.basecomponent>

    <div class="container-fluid px-5 bg-dark-blue">
        <div class="d-flex flex-row px-5 overflow-hidden align-items-center">
            <div class=" text-white px-2 py-2 bg-danger">
                <h5 class="fs-6 text-nowrap my-0">Latest News</h5>
            </div>
            <div class="container-fluid overflow-hidden">
                <div class="text-nowrap text-white marquee-text">
                    <p class="fs-6 m-0"> Zamboanga Peninsula Regional Athletic Association Meet (ZPRAA)</p>
                </div>
            </div>
    
        </div>
    </div>
    
    <div class="container-fluid px-5 bg-danger">
        <div class="d-flex flex-row px-5 align-items-center justify-content-between py-1">
            <a href="mailto:info@icastetuan.edu.ph" class="text-white text-decoration-none"> <i
                    class="fa-solid fa-envelope text-white mx-1"></i>info@icastetuan.edu.ph</a>
            <div class="px-2 text-nowrap d-flex flex-row align-items-center">
                <p class="fs-6 text-white mb-0 me-1">Follow Us</p>
                <a href="https://www.facebook.com/icastetuan.edu.ph/" target="_blank"><i
                        class="fa-brands fa-facebook"></i></a>
            </div>
        </div>
    </div>
    
    
    <div class="container-fluid px-5 sticky-top bg-white">
        <div class="d-flex flex-row px-5 align-items-center justify-content-between py-1">
            <img src="{{ asset('assets/school_content/logo/1672900975-128524590063b6716fc26ed!front_logo-608ff44a5f8f07.35255544.png') }}"
                alt="icon logo">
            <div class="d-flex flex-row align-items-center ">
                <i class="fa-solid fa-phone mx-1"></i>
                <p class="fs-6 text-secondary d-flex flex-column mx-1 lh-0">Call Us <span>062-975-6408</span> </p>
                <a class="btn btn-danger rounded-5 py-2 px-4" href="{{ route('login') }}">Login</a>
            </div>
        </div>
    </div>
    
    <div class="container-fluid p-0">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/gallery/media/1710638814-27674772265f646de5e8d8!banner4 copy.jpg') }}"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/gallery/media/1710637040-44905767965f63ff08ffb6!banner3 copy.jpg') }}"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/gallery/media/1710635442-80173943065f639b22a853!banner2 copy.jpg') }}"
                        class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="fa fa-angle-left bg-danger rounded-circle px-3 py-2" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="fa fa-angle-right bg-danger rounded-circle px-3 py-2"></span>
            </button>
        </div>
    </div>

</x-site.basecomponent>