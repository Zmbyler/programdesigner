@extends('admin.layouts.layout')
@section('title','Plan List')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">Plan List </h3>
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
							<a href="{{ route('plan.create') }}" class="btn btn-brand btn-icon-sm"><i class="flaticon2-plus"></i>Add New</a>
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
							<th>No of User</th>
							<th>Price</th>
							<th>Interval</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($plans as $plan)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$plan->name}}</td>
							<td>{{$plan->no_of_user}}</td>
							<td>$ {{$plan->price}}</td>
							<td>{{$plan->interval}}</td>
							@if($plan->status == true)
								<td>
	                                <a href="javascript:void(0)" onclick="changeStatus({{ $plan->id }},'plan')" class="kt-badge kt-badge--inline kt-badge--pill  @if($plan->status==true) kt-badge--success  @else kt-badge--danger  @endif">{{ ($plan->status) ? 'Active' : 'Inactive' }}</a>
	                            </td>
							@else
								<td>
									<a href="javascript:void(0)" onclick="changeStatus({{ $plan->id }},'plan')" class="kt-badge kt-badge--inline kt-badge--pill  @if($plan->status==false) kt-badge--danger  @else kt-badge--danger  @endif">{{ ($plan->status) ? 'Inactive' : 'Inactive' }}</a>
								</td>
							@endif
							</td>
							<td style="width:15%;">
                                <a href="{{route('plan.edit',$plan->id) }}" class="success p-0" data-original-title="" title="Edit">
                                    <i class="flaticon-edit-1 font-large-3 mr-2"></i>
                                </a>
                                <a href="javascript:void(0);" onclick="deleteData({{ $plan->id }},'plan')" class="success p-0" title="Delete">
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