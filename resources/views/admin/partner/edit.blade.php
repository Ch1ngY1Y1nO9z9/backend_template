@extends('layouts.app')

@section('css')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Partner - 編輯</div>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                    @endforeach
                @endif
                <div class="card-body">
                    <a class="btn btn-primary" href="/admin/partner">返回</a>
                    <hr>
                    <form method="post" action="/admin/partner/{{$items->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">現有圖片</label>
                            <div class="col-sm-10 mb-3">
                                <img width="200px" src="{{$items->img}}" alt="">
                            </div>
                            <label for="img" class="col-sm-2 col-form-label">上傳新圖片<br><small
                                    class="text-danger">*建議圖片尺寸230px(寬)*160px(高)</small></label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="img" value="" name="img" accept=".jpg, .png, .gif">
                                <small class="text-danger">*檔案上傳限制: 2MB以下</small>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="title_ch" class="col-sm-2 col-form-label">標題</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title_ch" name="title_ch"  value="{{$items->title_ch}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content_ch" class="col-sm-2 col-form-label">敘述</label>
                            <div class="col-sm-10">
                                <textarea name="content_ch" class="form-control" id="content_ch" rows="5">{{$items->content_ch}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="links" class="col-sm-2 col-form-label">超連結網址</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="links" name="links"  value="{{$items->links}}">
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="sort" class="col-sm-2 col-form-label">排序</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="sort" name="sort" value="{{$items->sort}}" required><br>
                                <small class="text-danger">數字越大,排序越前面</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary">SEND</button>
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
@endsection
