<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password | Vuexy</title>
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/css/pages/page-auth.css">
    @include('backend.layouts.partials.style')
</head>

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-6">
                <!-- Reset Password -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center mb-6">
                            <a href="{{ url('/') }}" class="app-brand-link">
                                <span class="app-brand-logo demo">
                                    <span class="text-primary">
                                        <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                                fill="currentColor"></path>
                                            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                                                fill="#161616"></path>
                                            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                                                fill="#161616"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </span>
                                <span class="app-brand-text demo text-heading fw-bold">Vuexy</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-1">Reset Password 🔒</h4>
                        <p class="mb-6"><span class="fw-medium">Your new password must be different from previously
                                used passwords</span></p>
                        <form action="{{ route('password.update') }}" method="POST"
                            class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="mb-6 form-password-toggle form-control-validation fv-plugins-icon-container">
                                <label class="form-label" for="password">Email <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge has-validation">
                                    <input type="email" id="email" class="form-control" name="email"
                                        placeholder="Enter your email" required>
                                    <span class="input-group-text cursor-pointer"><i
                                            class="icon-base ti tabler-eye-off"></i></span>
                                </div>
                            </div>
                            <div class="mb-6 form-password-toggle form-control-validation fv-plugins-icon-container">
                                <label class="form-label" for="password">New Password <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge has-validation">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="············" required aria-describedby="password">
                                    <span class="input-group-text cursor-pointer"><i
                                            class="icon-base ti tabler-eye-off"></i></span>
                                </div>
                            </div>
                            <div class="mb-6 form-password-toggle form-control-validation fv-plugins-icon-container">
                                <label class="form-label" for="confirm-password">Confirm Password <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge has-validation">
                                    <input type="password" id="confirm-password" class="form-control"
                                        name="password_confirmation" placeholder="············" aria-describedby="password">
                                    <span class="input-group-text cursor-pointer"><i
                                            class="icon-base ti tabler-eye-off"></i></span>
                                </div>
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <button class="btn btn-primary d-grid w-100 mb-6 waves-effect waves-light">Set new
                                password</button>
                            <div class="text-center">
                                <a href="auth-login-basic.html" class="d-flex justify-content-center">
                                    <i class="icon-base ti tabler-chevron-left scaleX-n1-rtl me-1_5"></i>
                                    Back to login
                                </a>
                            </div>
                            <input type="hidden">
                        </form>
                    </div>
                </div>
                <!-- /Reset Password -->
            </div>
        </div>
    </div>
    @include('backend.layouts.partials.script')
</body>

</html>
