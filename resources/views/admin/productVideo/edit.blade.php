@extends('layouts.app')

@section('css')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">product_video - 編輯</div>

                <div class="card-body">
                    <form method="post" action="/admin/product_video/update/{{$items->id}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">現有圖片</label>
                            <div class="col-sm-10 mb-3">
                                <img width="200px" src="{{$items->img}}" alt="">
                            </div>
                            <label for="img" class="col-sm-2 col-form-label">上傳新圖片<br><small
                                    class="text-danger">*建議圖片尺寸333px(寬)*160px(高)</small></label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="img" value="" name="img">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="title_ch" class="col-sm-2 col-form-label">標題</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title_ch" value="{{$items->title_ch}}" name="title_ch">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="links" class="col-sm-2 col-form-label">超連結網址</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="links" name="links" value="{{$items->links}}">
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
