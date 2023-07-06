<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    @include('partials.head')
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/css/pages/page-auth.css') }}" />
</head>

<body>
    @include('sweetalert::alert')

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="/" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="{{ asset('images/logo.png') }}" alt="" width="200">
                                </span>
                                {{-- <span class="app-brand-text demo text-body fw-bolder">Xiehokki</span> --}}
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Lupa Password ?</h4>
                        <p class="mb-4">Masukkan emailmu untuk reset password</p>
                        <form id="formAuthentication" class="mb-3" action="/forgot" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" autofocus />
                                @error('email')
                                    <div class="text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-danger d-grid w-100">Send Reset Link</button>
                        </form>
                        <div class="text-center">
                            <a href="/" class="d-flex align-items-center justify-content-center">
                                <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                                Back to login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.script')
</body>

</html>
