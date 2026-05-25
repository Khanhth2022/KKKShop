@extends('master')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="container py-4">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body p-0">
                    <div class="p-3 border-bottom d-flex align-items-center">
                        <div class="me-2">
                            <span class="rounded-circle bg-danger text-white d-inline-flex align-items-center justify-content-center" style="width:40px;height:40px;">{{ strtoupper(substr(auth()->user()->name ?? 'U',0,1)) }}</span>
                        </div>
                        <div>
                            <div class="fw-bold">{{ auth()->user()->name ?? 'Người dùng' }}</div>
                        </div>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="{{ route('profile.edit') }}" class="list-group-item list-group-item-action">Thông tin tài khoản</a>
                        <a href="{{ route('orders.index') }}" class="list-group-item list-group-item-action">Quản lý đơn hàng</a>
                        <a href="{{ route('profile.password.edit') }}" class="list-group-item list-group-item-action active">Thay đổi mật khẩu</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="list-group-item list-group-item-action w-100 text-start border-0">Đăng xuất</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-4">Thay đổi mật khẩu</h4>

                    <form method="POST" action="{{ route('profile.password.update') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3 row align-items-center">
                                    <label class="col-sm-4 col-form-label">Mật khẩu hiện tại</label>
                                    <div class="col-sm-8">
                                        <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror">
                                        @error('current_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row align-items-center">
                                    <label class="col-sm-4 col-form-label">Mật khẩu mới</label>
                                    <div class="col-sm-8">
                                        <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror">
                                        @error('new_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row align-items-center">
                                    <label class="col-sm-4 col-form-label">Nhập lại mật khẩu mới</label>
                                    <div class="col-sm-8">
                                        <input type="password" name="new_password_confirmation" class="form-control @error('new_password') is-invalid @enderror">
                                        @error('new_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button class="btn btn-danger">CẬP NHẬT MẬT KHẨU</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
