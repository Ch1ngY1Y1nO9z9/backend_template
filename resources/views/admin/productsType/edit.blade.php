@extends('layouts.app')

@section('css')

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Supplier Classification - 編輯</div>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                        @endforeach
                    @endif
                    <div class="card-body">
                        <a class="btn btn-primary" href="/admin/product_type">返回</a>
                        <hr>
                        <form method="POST" action="/admin/product_type/{{$item->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label for="img" class="col-2 col-form-label">當前圖片</label>
                                <div class="col-10">
                                    <img width="200" src="{{$item->img}}" alt="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="img" class="col-2 col-form-label">上傳圖片</label>
                                <div class="col-10">
                                    <input type="file" class="form-control-file" id="img" name="img" accept=".jpg, .png, .gif">
                                    <small class="text-danger">*檔案上傳限制: 2MB以下</small>
                                </div>
                                <div class="col-12"><small class="text-danger">*注意：建議尺寸：64 * 64 (px)</small></div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="type_name_ch" class="col-2 col-form-label">標題</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="type_name_ch" name="type_name_ch" value="{{$item->type_name_ch}}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">排序</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" value="{{$item->sort}}" required min="0" max="999">
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary d-block mx-auto">編輯</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
