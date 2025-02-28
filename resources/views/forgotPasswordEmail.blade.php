<x-login-layout>
    <form action="{{ route('password.email')}}" method="post" x-data="formSubmit" @submit.prevent="submit"
        class="col col-10 col-sm-10 col-md-8 col-lg-10 col-xl-8 col-xxl-6 p-5 p-xxl-4">
        @csrf

        <div class="text-center mb-5">
            <img src="assets/images/college.jpg" alt="Logo" class="img-fluid mb-0 ms-0" id="img"
                style=" border-radius: 50%; border: 2px solid #193c71;">
            <h2 class="text-primary fs-3 fw-medium mb-4 mt-1">Password Reset Email</h2>
        </div>

        <div class="form-floating mb-2">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="email@example.com">
            <label for="floatingInput">Email Address</label>
            @error('email')
                <div class="text-danger pt-1 ps-2" style="font-size: .9rem">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 text-center">
            <button type="submit" x-ref="btn" class="btn btn-primary w-100">Submit</button>
        </div>

    </form>

    <script>
        // Set form: x-data="formSubmit" @submit.prevent="submit" and button: x-ref="btn"
        document.addEventListener('alpine:init', () => {
            Alpine.data('formSubmit', () => ({
                submit() {
                    this.$refs.btn.disabled = true;
                    this.$refs.btn.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
                    this.$refs.btn.classList.add('bg-indigo-400');
                    this.$refs.btn.innerHTML =
                        `<span class="absolute left-2 top-1/2 -translate-y-1/2 transform">
                        <i class="fa-solid fa-spinner animate-spin"></i>
                        </span>Please wait...`;

                    this.$el.submit()
                }
            }))
        })
    </script>
</x-login-layout>