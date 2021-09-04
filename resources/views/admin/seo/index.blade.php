@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                    @endforeach
                @endif
                <div class="card">
                    <h4 class="card-header">
                        SEO設定
                    </h4>
                    <div class="card-body">
                        <form action="/admin/seo" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="title" class="col-form-label">網頁名稱</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$seo->title}}" required>
                            </div>
                            <div class="form-group">
                                <label for="keyword" class="col-form-label">搜尋引擎關鍵字</label>
                                <input type="text" class="form-control" id="keyword" name="keyword" placeholder="keyword, keyword1, keyword2" value="{{$seo->keyword}}" required>
                                <small class="text-danger">多筆關鍵字需要用逗號分隔,例:keyword, keyword1, keyword2</small>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-form-label">網頁描述</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{$seo->description}}" required>
                            </div>
                            <hr>
                            <div class="offset-5 col-2 text-center">
                                <button class="btn btn-success">更新</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js" defer></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                order: [[ 2, 'desc' ]],
                language:{
                    "processing":   "處理中...",
                    "loadingRecords": "載入中...",
                    "lengthMenu":   "顯示 _MENU_ 項結果",
                    "zeroRecords":  "沒有符合的結果",
                    "info":         "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
                    "infoEmpty":    "顯示第 0 至 0 項結果，共 0 項",
                    "infoFiltered": "(從 _MAX_ 項結果中過濾)",
                    "infoPostFix":  "",
                    "search":       "搜尋:",
                    "paginate": {
                        "first":    "第一頁",
                        "previous": "上一頁",
                        "next":     "下一頁",
                        "last":     "最後一頁"
                    },
                    "aria": {
                        "sortAscending":  ": 升冪排列",
                        "sortDescending": ": 降冪排列"
                    }
                }
            });
        } );

    </script>
@endsection
