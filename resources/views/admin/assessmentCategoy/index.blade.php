@extends('admin.layouts.layout')
@section('title','Assessment Category List')
@section('content')

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">Assessment Category List </h3>
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
							<a href="{{ route('assessmentCategory.create') }}" class="btn btn-brand btn-icon-sm"><i class="flaticon2-plus"></i>Add New</a>
						</div>
					</div>
				</div>
			</div>
			<div class="kt-portlet__body">
				<table class="table table-bordered" id="tableCategory">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Assessment->option</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					@foreach($assementcategory as $assessmentCategory)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$assessmentCategory->name}}</td>
							
							<td>
								@foreach($assessmentCategory->assessmentcatoption as $option)
								<span class="kt-badge kt-badge--inline kt-badge--pill kt-badge--danger">{{$option->assessmentresult->name}} => {{$option->option_value}}</span>
								@endforeach
							</td>
							{{-- <td>{{$option->assessmentresult->name}}=> {{$option->option_value}}</td> --}}
							
							<td style="width:15%;">
                                <a href="{{route('assessmentCategory.edit',$assessmentCategory->id) }}" class="success p-0" data-original-title="" title="Edit">
                                    <i class="flaticon-edit-1 font-large-3 mr-2"></i>
                                </a>
                                <a href="javascript:void(0);" onclick="deleteData({{ $assessmentCategory->id }},'assessmentCategory')" class="success p-0" title="Delete">
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