@extends('layouts.app')

@section('css')

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Supplier Classification - 新增</div>
                    <div class="card-body">
                        <form method="POST" action="/admin/product_type/store" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="img" class="col-2 col-form-label">上傳圖片</label>
                                <div class="col-10">
                                    <input type="file" class="form-control-file" id="img" name="img">
                                </div>
                                <div class="col-12"><small class="text-danger">*注意：建議尺寸：64 * 64 (px)</small></div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="type_name_ch" class="col-2 col-form-label">標題</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="type_name_ch" name="type_name_ch" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">排序</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" required value="0" min="0" max="999">
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary d-block mx-auto">新增</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
