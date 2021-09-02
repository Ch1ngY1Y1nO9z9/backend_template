@extends('layouts.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    /* .news_infos {
        position: relative;
    }

    .news_infos .btn-danger {
        border-radius: 50%;
        position: absolute;
        right: -5px;
        top: -5px;
    }

    .news_infos .sort {
        display: flex;
        margin-top: 5px;
    }

    .news_infos label {
        margin: 0 5px;
        line-height: 37px;
    }

    .news_infos input {
        width: 100%;
    }

    .time_btn {
        padding: 3px 20px;
        border: 1px solid black;
        cursor: pointer;
        height: 30px;
    }

    .time_btn.active {
        background-color: black;
        color: white;
    } */

</style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">最新消息 - 編輯</div>

                    <div class="card-body">
                        <form method="POST" action="/admin/news/update/{{$news->id}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="title_ch" class="col-2 col-form-label">日期</label>
                                <div class="col-10">
                                <input type="datetime-local" name="date" value="{{$news->date}}">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">現有圖片</label>
                                <div class="col-sm-10 mb-3">
                                    <img width="200px" src="{{$news->img}}" alt="">
                                </div>
                                <label for="img" class="col-sm-2 col-form-label">上傳新圖片<br><small
                                        class="text-danger">*建議圖片尺寸400px(寬)*280px(高)</small></label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="img" name="img">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="title_ch" class="col-2 col-form-label">標題</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="title_ch" name="title_ch" value="{{$news->title_ch}}" required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="content_ch" class="col-2 col-form-label">簡述</label>
                                <div class="col-10">
                                    <textarea style="height:150px;" type="text" class="form-control" id="content_ch" name="content_ch" required>{{$news->content_ch}}</textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="content_ch" class="col-2 col-form-label">內頁詳細內容</label>
                                <div class="col-10">
                                <textarea class="summernote" id="datail_ch" name="datail_ch">{{$news->datail_ch}}</textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="sort" class="col-2 col-form-label">排序</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="sort" name="sort" value="{{$news->sort}}" required min="0" max="999">
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
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.news_infos .btn-danger').click(function () {
    var info_imgs = $(this).data('infoimgs');

        $.ajax({
            method: 'POST',
            url: '/admin/ajax_delete_info_imgs',
            data: {info_imgs: info_imgs},
            success: function (res) {
                $( `.news_infos[data-infoimgs='${info_imgs}']` ).remove();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(textStatus + " " + errorThrown);
            }
        });
    });

    function post_ajax_sort(element,info_imgs_id) {
        var info_imgs_id;
        var sort_value = element.value;

        $.ajax({
            method: 'POST',
            url: '/admin/ajax_sort_product_imgs',
            data: {info_imgs_id: info_imgs_id,sort_value: sort_value},
            success: function (res) {

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(textStatus + " " + errorThrown);
            }
        });
    }

    $(".time_btn").click(function () {
        $(".time_btn").removeClass('active');
        $(this).addClass('active');
        var time_value = this.textContent;
        $("#show_on_what_new").val(time_value);
    });

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
