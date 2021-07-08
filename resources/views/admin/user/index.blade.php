@extends('admin.layouts.layout')
@section('title','Users List')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">
				User List </h3>
			<span class="kt-subheader__separator kt-hidden"></span>
			
		</div>              
	</div>

	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<div class="kt-portlet kt-portlet--mobile">
		<div class="kt-portlet__body">
			<table class="table table-bordered" id="tableList">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Business Name</th>
						<th>Country</th>
						<th>City</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($userdata as $user)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$user->first_name ? $user->first_name .' '.$user->last_name : ''}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->business_name}}</td>
						<td>{{$user->userdetails->country ? $user->userdetails->country->name : ''}}</td>
						<td>{{$user->userdetails->city ? $user->userdetails->city : ''}}</td>
						
							@if($user->status == true)
							<td>
                                <a href="javascript:void(0)" onclick="changeStatus({{ $user->id }},'users')" class="kt-badge kt-badge--inline kt-badge--pill  @if($user->status==true) kt-badge--success  @else kt-badge--danger  @endif">{{ ($user->status) ? 'Active' : 'Inactive' }}</a>
                            </td>
							@else
							<td>
							<a href="javascript:void(0)" onclick="changeStatus({{ $user->id }},'users')" class="kt-badge kt-badge--inline kt-badge--pill  @if($user->status==false) kt-badge--danger  @else kt-badge--danger  @endif">{{ ($user->status) ? 'Inactive' : 'Inactive' }}</a>
							 </td>
							@endif
						</td>
						<td style="width:15%;">
                            <a href="{{route('users.edit',$user->id) }}" class="success p-0" data-original-title="" title="Edit">
                                <i class="flaticon-edit-1 font-large-3 mr-2"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="deleteData({{ $user->id }},'users')" class="success p-0" title="Delete">
                                <i class="flaticon-delete font-large-3 mr-2"></i>
                            </a>
                        </td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection