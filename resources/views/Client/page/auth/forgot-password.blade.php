@extends('client.layout.index')

@section('content')
    <div class="mn-breadcrumb m-b-30">
        <div class="row">
            <div class="col-12">
                <div class="row gi_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="mn-breadcrumb-title">Quên mật khẩu</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- mn-breadcrumb-list start -->
                        <ul class="mn-breadcrumb-list">
                            <li class="mn-breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                            <li class="mn-breadcrumb-item active">Quên mật khẩu</li>
                        </ul>
                        <!-- mn-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login section -->
    <section class="mn-login p-b-15">
        <div class="mn-title d-none">
            <h2>Quên mật khẩu<span></span></h2>
            <p>Nhập mail để đặt lại mật khẩu</p>
        </div>
        <div class="mn-login-content">
            <div class="mn-login-box">
                <div class="mn-login-wrapper">
                    <div class="mn-login-container">
                        <div class="mn-login-form">
                            <form action="{{ route('auth.forgot-password.post') }}" method="post">
                                @csrf
                                <span class="mn-login-wrap">
                                    <label>Địa chỉ Email</label>
                                    <input value="{{ old('email') }}" type="text" name="email"
                                        placeholder="Nhập địa chỉ email của bạn..." required="">
                                    @error('email')
                                        <span class="text-danger text-small">* {{ $message }}</span>
                                    @enderror
                                </span>
                                <span class="text-end">

                                    <button class="mn-btn-1 btn" type="submit"><span> Gửi link đặt lại mật
                                            khẩu</span></button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mn-login-box d-n-991">
                <div class="mn-login-img">
                    <img src="https://maraviyainfotech.com/projects/mantu-html/assets/img/common/about-3.png" alt="login">
                </div>
            </div>
        </div>
    </section>
@endsection