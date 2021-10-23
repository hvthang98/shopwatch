@extends('backend.layouts.admin_master')
@section('main-content')
    <div class="table-agile-info">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link active" id="setting-basic" data-toggle="tab"
                    href="#setting_basic--contemt">{{ __('Setting Basic') }}</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active in" id="setting_basic--contemt">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('admin.setting.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="app_name" class="control-label col-lg-3">{{ __('App name') }}</label>
                                        <div class="col-lg-8">
                                            <input class=" form-control" id="app_name" name="app_name" type="text" required
                                                value="{{ setting('app_name') }}">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary " type="submit"
                                        style=" margin-right: 2rem; ">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
