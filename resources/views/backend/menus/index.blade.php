@extends('backend.layouts.admin_master')
@section('title')
    {{ __('Menu') }}
@endsection
@section('main-content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-action">
                <a class="btn btn-primary" href="javascript:void(0)" data-popup-ajax="true"
                    data-target={{ route('admin.menu.create') }} data-title="{{ __('Create') }}"
                    role="button"><i class="fa fa-plus mr-2"></i>{{ __('Create menu') }}</a>
            </div>
            <div class="panel-heading">
                {{ __('List menu') }}
            </div>
            @if (session('status'))
                <div class="alert alert-info">
                    <p style="text-align: center;color: red;">{{ session('status') }}</p>
                </div>
            @endif
            @if (count($errors->all()) > 0)
                @include('error.Note')
            @endif()
            <div class="panel-body">
                <div class="list-media">
                    @php
                        function getHtmlMenu($menus)
                        {
                            $html = '';
                            if(count($menus) <= 0){
                                return '';
                            }else{
                                foreach ($menus as $menu) {
                                    $html .='<div class="media">
                                                <div class="media-content">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <p>'.$menu->name.'</p>
                                                        </div>
                                                        <div class="col-md-4 media-action">
                                                            <a href="javascript:void(0)" data-popup-ajax="true" data-target="'.route('admin.menu.edit', $menu->id).'" data-title="'.__('Edit menu').'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                            <a href="javascript:void(0)" data-target="'.route('admin.menu.destroy', $menu->id).'" data-delete="true"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>' .
                                                getHtmlMenu($menu->children()) .
                                            '</div>';
                                }
                                return $html;
                            }
                        }
                        echo getHtmlMenu($menus);
                    @endphp
                </div>
            </div>
        </div>
    </div>

@endsection
