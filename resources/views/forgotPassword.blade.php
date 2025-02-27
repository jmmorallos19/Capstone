<x-login-layout>
    <form action="{{ route('password.update') }}" method="post"
        class="col col-10 col-sm-10 col-md-8 col-lg-10 col-xl-8 col-xxl-6 p-5 p-xxl-4">
        @csrf

        <div class="text-center mb-5">
            <img src="{{ asset('assets/images/college.jpg') }}" alt="Logo" class="img-fluid mb-0 ms-0" id="img"
                style=" border-radius: 50%; border: 2px solid #193c71;">
            <h2 class="text-primary fs-3 fw-bold mb-4 mt-1">Reset Password</h2>
        </div>

        @if (session('status'))
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-right',
                    iconColor: 'white',
                    customClass: {
                        popup: 'colored-toast',
                    },
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                })

                Toast.fire({
                    icon: 'success',
                    title: "{{ session('status') }}",
                })
            </script>
        @endif

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-floating mb-2">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="email@example.com">
            <label for="floatingInput">Email Address</label>
            @error('email')
                <div class="text-danger pt-1 ps-2" style="font-size: .9rem">{{ $message }}</div>
            @enderror
        </div>

        <div class="input-group mb-2">
            <div class="form-floating">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                <label for="floatingPassword">New Password</label>
            </div>
            <span class="input-group-text" id="toggle-password">
                <i class="bi bi-eye-slash" id="eye-icon"></i>
            </span>
        </div>

        <div class="input-group mb-2">
            <div class="form-floating">
                <input type="password" class="form-control" id="password_confirmation" placeholder="Password"
                    name="password_confirmation">
                <label for="floatingPassword">Password Confirmation</label>
            </div>
            <span class="input-group-text" id="toggle-password-confirm"
                onclick="togglePasswordVisibility('password_confirmation', 'eye-icon-password-confirm')">
                <i class="bi bi-eye-slash" id="eye-icon-password-confirm"></i>
            </span>
        </div>


        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
        </div>

    </form>

    <script>
        // Function to toggle password visibility
        function togglePasswordVisibility(inputId, iconId) {
            var input = document.getElementById(inputId);
            var icon = document.getElementById(iconId);

            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("bi-eye-slash");
                icon.classList.add("bi-eye");
            } else {
                input.type = "password";
                icon.classList.remove("bi-eye");
                icon.classList.add("bi-eye-slash");
            }
        }
    </script>
</x-login-layout>