@extends('layouts.public')
@section('content')
<div class="breadcrumb">
   <div class="page-width">
         <h3 class="breadcumb__title">
            Đăng nhập
         </h3>
   </div>
</div>
<div class="page-width">
   <form method="POST" action="{{ route('login') }}" class="form__authen">
      @csrf
      <div class="form__item">
         <label class="form-item__label">Email</label>
         <input class="form-item form-login__input form-login__input--email" type="text" value="{{ old('name') }}" name="email" placeholder="Nhập email">
         @error('email')
            <div class="form-login__message">{{ $message }}</div>
         @enderror
      </div>

      <div class="form__item">
         <label class="form-item__label">Mật khẩu</label>
         <input class="form-item form-login__input form-login__input--password" type="password" name="password" placeholder="Nhập password">
         @error('password')
            <div class="form-login__message">{{ $message }}</div>
         @enderror
      </div>
      <div class="form__item">
         <button class="form-login__btn">Gửi</button>
      </div>
   </form>
</div>
@endsection