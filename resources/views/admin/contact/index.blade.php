@extends('admin.layouts.layout')
@section('title','Contact Us List')
@section('content')

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">Contact Us List </h3>
			<span class="kt-subheader__separator kt-hidden"></span>
		</div>              
	</div>
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head kt-portlet__head--lg">
				<div class="kt-portlet__head-label">
				</div>
				
			</div>
			<div class="kt-portlet__body">
				<table class="table table-bordered" id="tableList">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Query</th>
							<th>Message</th>
						</tr>
					</thead>
					<tbody>
					@foreach($contacts as $contact)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$contact->name}}</td>
							<td>{{$contact->email}}</td>
							<td>{{$contact->query}}</td>
							<td>{{$contact->message}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection