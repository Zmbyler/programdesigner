@extends('admin.layouts.layout')
@section('title','Dashboard')
@section('content')
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">Dashboard</h3>
    </div>
</div>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="row">
        <div class="col-lg-12">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Users</h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-widget12">
                        <div class="kt-widget12__content">
                            <div class="kt-widget12__item">
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">Total Users</span>
                                    <span class="kt-widget12__value">{{$user->count()}}</span>
                                </div>
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">CMS</span>
                                    <span class="kt-widget12__value">{{$cmscount}}</span>
                                </div>
                                <div class="kt-widget12__info">
                                    <span class="kt-widget12__desc">Exercise</span>
                                    <span class="kt-widget12__value">{{$exercisecount}}</span>
                                </div>                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection