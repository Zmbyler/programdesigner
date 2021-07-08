@extends('admin.layouts.layout')
@section('title','program template List')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">
				Program Template List </h3>
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
							<a href="{{ route('programtemplate.create') }}" class="btn btn-brand btn-icon-sm"><i class="flaticon2-plus"></i>Add New</a>
						</div>
					</div>
				</div>
			</div>
			<div class="kt-portlet__body">
				<div class="row">
                    <div class="col-9">
                        <form method="post" action="{{ route('programtemplate.destroyBulkData') }}">
                            <input type="submit" class="btn btn-danger deleteAllBtn" style="display: none;" value="Delete selected rows">
                        </form>
                    </div>
                </div><br>
				<table class="table table-bordered" id="tableList">
					<thead>
						<tr>
							<th><lable class="col-3"><input type="checkbox" id="checkAll"/></lable></th>
							<th>#</th>
							<th>Template type</th>
                            <th>Days</th>
							<th>Name</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($programtemplate as $template)
						<tr>
							<td><input type="checkbox" class="checkBoxClass" name="check_name[]" value="{{$template->id}}" /></td>
							<td>{{$loop->iteration}}</td>
							<td>{{$template->templatetype->name}} {{$template->programgoal ? ' > '. $template->programgoal->name : ""}}</td>
							<td>{{$template->day ? $template->day->name : '---' }}</td>
                            <td>{{$template->name}}</td>
								@if($template->status == true)
								<td>
                                    <a href="javascript:void(0)" onclick="changeStatus({{ $template->id }},'programtemplate')" class="kt-badge kt-badge--inline kt-badge--pill  @if($template->status==true) kt-badge--success  @else kt-badge--danger  @endif">{{ ($template->status) ? 'Active' : 'Inactive' }}</a>
                                </td>
								@else
								<td>
								<a href="javascript:void(0)" onclick="changeStatus({{ $template->id }},'programtemplate')" class="kt-badge kt-badge--inline kt-badge--pill  @if($template->status==false) kt-badge--danger  @else kt-badge--danger  @endif">{{ ($template->status) ? 'Inactive' : 'Inactive' }}</a>
								 </td>
								@endif
							</td>
							<td style="width:15%;">
                                <a href="{{route('programtemplate.edit',$template->id) }}" class="success p-0" data-original-title="" title="Edit">
                                    <i class="flaticon-edit-1 font-large-3 mr-2"></i>
                                </a>
                                <a href="javascript:void(0);" onclick="deleteData({{ $template->id }},'programtemplate')" class="success p-0" title="Delete">
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
    @push('scripts')
    <script>
        // delete with checkbox function start
        $(document).ready(function() {
            $('#checkAll').prop('checked', false);
            $('.checkBoxClass').prop('checked', false);
        });
        $('#checkAll').change(function(e) {
            if ($('#checkAll').is(":checked")) {
                $('#checkAll').attr('checked', 'checked');
                $('.checkBoxClass').prop('checked', $(this).prop('checked'));
                $('.deleteAllBtn').css({
                    'display': 'block'
                });

            } else {
                $('#checkAll').removeAttr('checked');
                $('.checkBoxClass').prop('checked', false);
                $('.deleteAllBtn').css({
                    'display': 'none'
                });
            }
        });
        $("input[name='check_name[]']").click(function(e) {
            var self = $(this);
            if ($('#checkAll').is(":checked")) {
                $('#checkAll').prop('checked', false);
                if (self.is(":checked")) {
                    self.attr('checked', 'checked');
                }
            } else {
                self.removeAttr('checked');
            }
            if ($("input[name='check_name[]']:checked").length > 0) {
                $('.deleteAllBtn').css({
                    'display': 'block'
                });
            } else {
                $('.deleteAllBtn').css({
                    'display': 'none'
                });
            }
        });
        $('.deleteAllBtn').click(function(e) {
                e.preventDefault();
                var href = $('form').attr('action');
                var data = [];


                swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete this item!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then(function (result) {
                if (result.value) {
                    if ($("input[name='check_name[]']:checked").length > 0) {
                        $.each($("input[name='check_name[]']:checked"), function() {
                            data.push($(this).val());
                        });
                        // console.log(data);
                        $.ajax({
                            method: 'post',
                            url: href,
                            data: {
                                '_token': '{{csrf_token()}}',
                                'check_name': data
                            },
                            success: function(result) {
                                window.location.href = "{{route('programtemplate.index')}}";
                            }
                        });
                    } else {
                        toastr.warning("Please select at least one checkbox");
                    }

                    //window.location.href = ADMIN_BASE_URL + `/` + element + `/delete-all`;
                }
            });
            


        });
        // delete with checkbox function end
    </script>
    @endpush

