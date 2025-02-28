<x-login-layout>
    <form action="{{ route('auth.login') }}" method="post"
        class="col col-10 col-sm-10 col-md-8 col-lg-10 col-xl-8 col-xxl-6 p-5 p-xxl-4">
        @csrf
        @method('post')

        <div class="text-center mb-5">
            <img src="assets/images/college.jpg" alt="Logo" class="img-fluid mb-0 ms-0" id="img"
                style=" border-radius: 50%; border: 2px solid #193c71;">
            <h2 class="text-primary form-h2 fs-2 mb-4 mt-1">Sign In</h2>
        </div>

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="email@example.com">
            <label for="floatingInput">Email Address</label>
        </div>

        <div class="input-group mb-2">
            <div class="form-floating">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
            </div>
            <span class="input-group-text" id="toggle-password">
                <i class="bi bi-eye-slash" id="eye-icon"></i>
            </span>
        </div>

        <div class="pe-1 mb-2 w-100 d-flex justify-content-end">
            <a href="{{ route('password.request') }}" style="text-decoration: none;">Forgot Password?</a>
        </div>

        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-primary w-100">Sign In</button>
        </div>

    </form>
</x-login-layout>