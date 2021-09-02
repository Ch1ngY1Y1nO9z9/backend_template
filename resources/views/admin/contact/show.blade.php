@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h4 class="card-header">
                        聯絡我們管理-查看更多
                    </h4>
                    <div class="card-body">
                        <form>
                            @csrf
                            <div class="form-group row">
                                <label for="date" class="col-2 col-form-label">寄件日期</label>
                                <div class="col-10">
                                    <input id="date" class="form-control" type="text" readonly value="{{$contact_info->created_at}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country_name" class="col-2 col-form-label">Company Name</label>
                                <div class="col-10">
                                    <input id="country_name" class="form-control" type="text" readonly value="{{$contact_info->companyName}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="country_name" class="col-2 col-form-label">Company Website</label>
                                <div class="col-10">
                                    <input id="country_name" class="form-control" type="text" readonly value="{{$contact_info->companyWebsite}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country_name" class="col-2 col-form-label">Country</label>
                                <div class="col-10">
                                    <input id="country_name" class="form-control" type="text" readonly value="{{$contact_info->country}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country_name" class="col-2 col-form-label">Business Type</label>
                                <div class="col-10">
                                    <input id="country_name" class="form-control" type="text" readonly value="{{$contact_info->business}}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="country_name" class="col-2 col-form-label">Email</label>
                                <div class="col-10">
                                    <input id="country_name" class="form-control" type="text" readonly value="{{$contact_info->email}}">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="content" class="col-2 col-form-label">Message</label>
                                <div class="col-10">
                                    <textarea id="content" class="form-control" rows="3" disabled>{{$contact_info->content}}</textarea>
                                </div>
                            </div>

                            <hr>
                        </form>

                        <a href="/admin/contact" class="btn btn-primary d-block col-2 mx-auto">回到上一頁</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
