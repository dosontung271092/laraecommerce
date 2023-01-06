@extends('layouts.public')
@section('content')
<div class="breadcrumb">
   <div class="page-width">
         <h3 class="breadcumb__title">
            Đăng ký
         </h3>
   </div>
</div>
<div class="page-width">
    <form method="POST" action="{{ route('register') }}" class="form__authen">
        @csrf
        <div class="form__item">
            <label class="form-item__label">Tên</label>
            <input class="form-login__input form-login__input--name" type="text" value="{{ old('name') }}" name="name" placeholder="Nhập tên">
            @error('name')
            <div class="form-login__message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form__item">
            <label class="form-item__label">Email</label>
            <input class="form-login__input form-login__input--email" type="email" value="{{ old('email') }}" name="email" placeholder="Nhập email">
            @error('email')
            <div class="form-login__message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form__item">
            <label class="form-item__label">Mật khẩu</label>
            <input class="form-login__input form-login__input--password" type="password" value="{{ old('password') }}" name="password" placeholder="Nhập mật khẩu">
            @error('password')
            <div class="form-login__message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form__item">
            <label class="form-item__label">Xác nhận mật khẩu</label>
            <input class="form-login__input form-login__input--passwordconfirmation" type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu">
            @error('password_confirmation')
            <div class="form-login__message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form__item">
            <button class="form-login__btn">Gửi</button>
        </div>
    </form>
</div>
@endsection