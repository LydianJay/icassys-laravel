<x-site.basecomponent>

    <div class="row">

        <div class="col-4 px-4 mt-5 py-5">
            
            <div class="px-5 mt-5">
                <img src="http://localhost/icassys/uploads/school_content/admin_logo/1.png" style="width: auto; height: 30px;">
            </div>
            <div class="px-5 mt-5">
                <form action="{{ route('login.post') }}" method="POST" class="needs-validation">
                    @csrf
                    <p class="fs-5 text-secondary-dark blue">Login</p>
                    @if(session('invalid'))
                        <div class="alert alert-danger" role="alert">
                            Invalid username or password
                        </div>
                    @endif
                    
                    <div class="mb-3">
                        
                        @if ($errors->has('email') || $errors->has('password'))
                            <label class="form-label text-danger">Invalid username or password</label>
                        @endif
                        <input type="text" class="form-control my-3" name="email" placeholder="Username" required value="{{ old('email') }}">
                        <input type="password" class="form-control my-3" name="password" placeholder="Password" required value="{{ old('password') }}">
                    </div>
                
                    <div class="input-group my-2 justify-content-evenly">
                        <input type="text" class="form-control" name="captcha" placeholder="Enter Captcha" required>
                       
                        <div class="captcha">
                            <span id="captcha-img">{!! captcha_img('flat') !!}</span>
                            <button class="btn btn-sm btn-outline-secondary ms-1" id="captcha"><i class="fa-solid fa-rotate"></i></button>
                        </div>
                    </div>
                    @error('captcha')
                        <p class="text-danger">{{ 'Invalid Capcha' }}</p>
                    @enderror


                    <button type="submit" class="btn-sm btn btn-primary">Submit</button>
                </form>
                
            </div>
        </div>

        <div class="col vh-100" style="background-image: url('{{ asset('assets/school_content/login_image/1663065284-93117584263205cc49769c!1662964519-2099955753631ed327d0ffa!login_bg5.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const captchaButton = document.getElementById('captcha');
            const captcha_img = document.getElementById('captcha-img');
            captchaButton.addEventListener('click', function() {
                fetch("{{ route('refresh-captcha') }}")
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        captcha_img.innerHTML = data.captcha;
                    });
            });
        });
    </script>

</x-site.basecomponent>