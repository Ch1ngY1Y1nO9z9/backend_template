@extends('layouts.app')

@section('css')
<style>
    .brand {
        width: 105px;
        height: 105px;
        overflow: hidden;
        border-radius: 50%;
        margin: 40px auto;
        box-shadow: 0 4px 8px rgb(0 0 0 / 5%);
        position: relative;
        z-index: 1;
    }
</style>
@endsection

@section('content')
<div class="container h-100">
    <div class="row justify-content-center h-100">
        <div class="card-wrapper">
            <div class="brand">
                <img src="/img/OAOLOGO.png" alt="logo">
            </div>
            <div class="card fat">
                <div class="card-body">
                    <h4 class="card-title">登入</h4>
                    <form method="POST" class="my-login-validation" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="email">使用者名稱</label>
                            <input id="email" type="text" class="form-control" name="email" required >
                        </div>

                        <div class="form-group">
                            <label for="password">密碼</label>
                            <div style="position:relative" id="eye-password-0"><input id="password" type="password" class="form-control" name="password" required style="padding-right: 60px;">
                        </div>

                        <div class="form-group">

                        </div>

                        <div class="form-group m-0">
                            <button type="submit" class="btn btn-primary btn-block">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

    @if (Session::has('success'))
        <script>
            alert('密碼更新成功! 請重新登入!')
        </script>
    @endif

@endsection
