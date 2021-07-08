@extends('admin.layouts.layout')
@section('title','Sports List')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">
			Sports List </h3>
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
							{{-- <th>Action</th> --}}
						</tr>
					</thead>
					<tbody>
						@foreach($sports as $sport)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$sport->name}}</td>
							{{-- <td style="width:15%;">
                                <a href="{{route('blockfocus.tempolist',$focus->id)}}" class="success p-0" data-original-title="" title="Edit">
									<i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td> --}}
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

