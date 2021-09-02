@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="/admin/resetPassword">
                        @csrf

                        {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">舊密碼</label>

                            <div class="col-md-6">
                                <input id="OldPassword" type="password" class="form-control" name="OldPassword" required autofocus>
                            </div>

                            @if (Session::has('OldPasswordFailed'))
                                <label class="col-md-4 col-form-label"></label>

                                <div class="col-md-6">
                                    <small class="text-danger">*舊密碼輸入錯誤!</small>
                                </div>
                            @endif

                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">新密碼</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">新密碼確認</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            @if (Session::has('PasswordConfirmationFailed'))
                            <label class="col-md-4 col-form-label"></label>

                            <div class="col-md-6">
                                <small class="text-danger">*新密碼確認未通過!</small>
                            </div>
                        @endif
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    送出修改
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

    @if (Session::has('OldPasswordFailed'))
        <script>
            alert('舊密碼輸入錯誤!')
        </script>
    @endif

    @if (Session::has('PasswordConfirmationFailed'))
    <script>
        alert('新密碼確認未通過')
    </script>
@endif
@endsection
