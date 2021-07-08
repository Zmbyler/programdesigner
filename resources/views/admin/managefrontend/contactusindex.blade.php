@extends('admin.layouts.layout')
@section('title','Contact Page List')
@section('content')

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">
				Contact page List </h3>
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
							<th>Address</th>
							<th>Email</th>
							<th>Phone No</th>
							<th>Short Description</th>
							<th>Long Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($contactpage as $contact)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$contact->name}}</td>
							<td>{{$contact->address}}</td>
							<td>{{$contact->email}}</td>
							<td>{{$contact->phone}}</td>
							<td>{!!$contact->short_description!!}</td>
							<td>{!!$contact->long_description!!}</td>
							<td style="width:15%;">
                                <a href="{{route('contactpage.edit',$contact->id) }}" class="success p-0" data-original-title="" title="Edit">
                                    <i class="flaticon-edit-1 font-large-3 mr-2"></i>
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

