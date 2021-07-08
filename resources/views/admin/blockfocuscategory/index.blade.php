@extends('admin.layouts.layout')
@section('title','Block Focus Category List')
@section('content')
@php($blockfocus = \App\BlockFocus::where('id',request()->route('id'))->value('name'))
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">
			{{$blockfocus}} Category List </h3>
			<span class="kt-subheader__separator kt-hidden"></span>
		</div>              
	</div>
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head kt-portlet__head--lg">
				<div class="kt-portlet__head-label">
				</div>
				<div class="kt-portlet__head-toolbar">
					<div class="kt-portlet__head-wrapper">
						<div class="dropdown dropdown-inline">
							<a href="{{ route('blockfocuscategory.create',request()->route('id')) }}" class="btn btn-success btn-icon-sm"><i class="flaticon2-plus"></i>Add {{$blockfocus}} Category</a>
							<a href="{{ route('blockfocus.index') }}" class="btn btn-danger btn-icon-sm"><i class="flaticon2-back"></i>Back</a>
						</div>
					</div>
				</div>
			</div>
			<div class="kt-portlet__body">
				<table class="table table-bordered" id="tableList">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($blockfocuscategory as $focus)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$focus->category->name}}</td>
							<td style="width:15%;">
                                <a href="{{route('blockfocuscategory.edit',$focus->id)}}" class="success p-0" data-original-title="" title="Edit">
									<i class="flaticon-edit-1 font-large-3 mr-2"></i>
                                </a>
                                {{-- <a href="{{route('blockfocuscategory.index',['blockfocus_id'=>$focus->id])}}" class="success p-0" data-original-title="" title="Category">
                                	<i class="flaticon-edit-1 font-large-3 mr-2"></i>
                                </a> --}}
                            </td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

