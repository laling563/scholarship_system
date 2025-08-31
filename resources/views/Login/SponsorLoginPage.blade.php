@extends('Login.LoginLayout')

@section('content')
<div class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div class="col-12 col-md-8 col-lg-5">
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-body p-4">
                <!-- Title -->
                <h2 class="text-center fw-bold mb-4">Sponsor Login</h2>

                <!-- Error Alert -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error:</strong> {{ $errors->first() }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('sponsor.login') }}" method="POST">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            placeholder="you@example.com"
                            required
                        >
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input
                            type="password"
                            class="form-control"
                            id="password"
                            name="password"
                            placeholder="••••••••"
                            required
                        >
                    </div>

                    <!-- Submit -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
