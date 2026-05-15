@extends('master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow" style="border: none; margin-top: 20px;">
            <div class="card-body p-5">
                <h2 class="text-center fw-bold mb-4">Đăng nhập</h2>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            Email<span class="text-danger">*</span>
                        </label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Mật khẩu -->
                    <div class="mb-3">
                        <label for="password" class="form-label">
                            Mật khẩu<span class="text-danger">*</span>
                        </label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Hiển thị mật khẩu -->
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="show-password">
                        <label class="form-check-label" for="show-password">
                            Hiển thị mật khẩu
                        </label>
                    </div>

                    <!-- Lưu lại mật khẩu -->
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                        <label class="form-check-label" for="remember">
                            Lưu lại mật khẩu
                        </label>
                    </div>

                    <!-- Nút Đăng nhập -->
                    <button type="submit" class="btn w-100 fw-bold" style="background-color: #dc3545; color: white; padding: 10px; font-size: 14px;">
                        ĐĂNG NHẬP
                    </button>
                </form>

                <!-- Links -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a href="{{ route('register') }}" class="text-decoration-none" style="color: #333;">
                        ĐĂNG KÝ TÀI KHOẢN
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Hiển thị/ẩn mật khẩu
    document.getElementById('show-password').addEventListener('change', function() {
        const passwordInput = document.getElementById('password');
        passwordInput.type = this.checked ? 'text' : 'password';
    });
</script>
@endsection
