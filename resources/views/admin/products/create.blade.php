@extends('layouts.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">產品上架 - 新增</div>
                    <div class="card-body">
                        <form method="POST" action="/admin/products/store" enctype="multipart/form-data">
                            @csrf

                            <div class="event">
                                <div class="form-group row">
                                    <label for="img" class="col-2 col-form-label">上傳圖片</label>
                                    <div class="col-10">
                                        <input type="file" class="form-control-file" id="img" name="img">
                                    </div>
                                    <div class="col-12"><small class="text-danger">*注意：建議尺寸：200 * 200 (px)</small></div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label class="col-2" for="type">產品分類</label>
                                <div class="col-10">
                                    <select class="form-control" id="type" name="type">
                                        @foreach($types as $index => $type)
                                            <option value="{{$type->id}}" @if($index == 1)selected @endif>{{$type->type_name_ch}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="name_ch" class="col-2 col-form-label">產品名稱</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="name_ch" name="name_ch" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="content_ch" class="col-2 col-form-label">簡述</label>
                                <div class="col-10">
                                    <textarea class="form-control" id="content_ch" name="content_ch" required rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="datail_ch" class="col-2 col-form-label">超連結</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="links" name="links" required>
                                </div>
                            </div>
                            <hr>

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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="/js/summernote-zh-TW.js"></script>
    <script>
        $(function() {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.summernote').summernote({
                toolbar: [
                    ['style', ['style']],
                    ['fontsize', ['fontsize']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'hr']],
                    ['view', ['fullscreen', 'codeview']],
                    ['help', ['help']]
                ],
                height: 400,
                lang: 'zh-TW',
                fontNames: [
                    'sourcehansans-tc','Microsoft JhengHei', 'Heiti TC', 'LiHei Pro', 'Gotham', 'Helvetica Neue', 'Helvetica', 'Arial', 'sans-serif'
                ],
                callbacks: {
                    onImageUpload: function(files) {
                        url = $(this).data('upload'); //path is defined as data attribute for  textarea
                        for(var i = files.length - 1; i >= 0; i--) {
                            sendFile(files[i], this);
                        }
                    }
                }
            });

            function sendFile(file, editor, welEditable) {
                data = new FormData();
                data.append("file", file);
                $.ajax({
                    data: data,
                    type: "POST",
                    url: "/admin/img/post",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(url) {
                        $('.summernote').summernote('editor.insertImage', url, function ($image) {
                            $image.css('max-width', '100%');
                        });
                    }
                });
            }
        });
    </script>
@endsection

