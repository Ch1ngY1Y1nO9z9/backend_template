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
                    <div class="card-header">最新消息 - 新增</div>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                        @endforeach
                    @endif
                    <div class="card-body">
                        <a class="btn btn-primary" href="/admin/news">返回</a>
                        <hr>
                        <form method="POST" action="/admin/news" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="title_ch" class="col-2 col-form-label">日期</label>
                                <div class="col-10">
                                <input type="date" name="date" value="" required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="img" class="col-sm-2 col-form-label">縮圖 <br><small
                                        class="text-danger">*建議圖片尺寸400px(寬)*280px(高)</small></label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="img" value="" name="img" required accept=".jpg, .png, .gif">
                                    <small class="text-danger">*檔案上傳限制: 2MB以下</small>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="title_ch" class="col-2 col-form-label">標題</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="title_ch" name="title_ch" required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="content_ch" class="col-2 col-form-label">簡述</label>
                                <div class="col-10">
                                    <textarea style="height:150px;" type="text" class="form-control" id="content_ch" name="content_ch" required></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="content_ch" class="col-2 col-form-label">內頁詳細內容</label>
                                <div class="col-10">
                                <textarea class="summernote" id="datail_ch" name="datail_ch"></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">排序</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" required value="0" min="0" max="999">
                                </div>
                                <div class="col-12"><small class="text-danger">*注意：只會顯示數字最大的前兩則新聞</small></div>
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
    <script>
        var current_date = new Date();

        var date = current_date.getFullYear() + '.' + (current_date.getMonth() + 1) + '.' + current_date.getDate()

        document.querySelector('input[name="date"]').setAttribute('value', date)
    </script>
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
