@extends('admin.layouts.layout')
@section('title','CMS List')
@section('content')

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">
				CMS List </h3>
			<span class="kt-subheader__separator kt-hidden"></span>
			
		</div>              
	</div>

<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="kt-portlet kt-portlet--mobile">
			
			<div class="kt-portlet__body">
			<table id="tableList" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Title</th>
							<th>Short Description</th>
							<th>Long Description</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($cmspage as $cms)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$cms->title}}</td>
							<td>{!!$cms->short_description!!}</td>
							<td>{!!$cms->long_description!!}</td>
							
							<td style="width:15%;">
                                <a href="{{route('cms.edit',$cms->id) }}" class="success p-0" data-original-title="" title="Edit">
                                    <i class="flaticon-edit-1 font-large-3 mr-2"></i>
                                </a>
                                
                            </td>
						</tr>
						@endforeach
					</tbody>
				</table>

				<!--end: Datatable -->
		</div>
	</div>
</div>
@endsection

