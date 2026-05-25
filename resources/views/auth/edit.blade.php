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
                        <a href="{{ route('profile.edit') }}" class="list-group-item list-group-item-action active">Thông tin tài khoản</a>
                        <a href="{{ route('orders.index') }}" class="list-group-item list-group-item-action">Quản lý đơn hàng</a>
                        <a href="{{ route('profile.password.edit') }}" class="list-group-item list-group-item-action">Thay đổi mật khẩu</a>
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
                    <h4 class="mb-4">Cập nhật thông tin cá nhân</h4>

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3 row align-items-center">
                                    <label class="col-sm-3 col-form-label">Họ tên</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name ?? '') }}">
                                    </div>
                                </div>

                                <div class="mb-3 row align-items-center">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email ?? '') }}">
                                    </div>
                                </div>

                                <div class="mb-3 row align-items-center">
                                    <label class="col-sm-3 col-form-label">Địa chỉ nhà</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="address" class="form-control" value="{{ old('address', auth()->user()->address ?? '') }}">
                                    </div>
                                </div>

                                <div class="mb-3 row align-items-center">
                                    <label class="col-sm-3 col-form-label">Tỉnh/Thành Phố</label>
                                    <div class="col-sm-9">
                                        <select name="city" class="form-select">
                                            <option value="">Chọn Tỉnh / Thành Phố</option>
                                            <option value="HN" {{ old('city', auth()->user()->city ?? '') == 'HN' ? 'selected' : '' }}>Hà Nội</option>
                                            <option value="HCM" {{ old('city', auth()->user()->city ?? '') == 'HCM' ? 'selected' : '' }}>Hồ Chí Minh</option>
                                            <option value="DN" {{ old('city', auth()->user()->city ?? '') == 'DN' ? 'selected' : '' }}>Đà Nẵng</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row align-items-center">
                                    <label class="col-sm-3 col-form-label">Điện thoại</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="phone" class="form-control" value="{{ old('phone', auth()->user()->phone ?? '') }}">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button class="btn btn-danger">THAY ĐỔI</button>
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
