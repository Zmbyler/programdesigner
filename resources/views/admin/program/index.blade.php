@extends('admin.layouts.layout')
@section('title','Program List')
@section('content')

<div id="_token" class="hidden" data-token="{{ csrf_token() }}"></div>
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">
				{{request()->has('program_id') ? $programgoal->name : $templatetype->name}} Template
                
			</h3>
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
				<div class="row">
                    <div class="col-9">
                        <form method="post" action="{{ route('program.destroyBulkData') }}">
                            <input type="submit" class="btn btn-danger deleteAllBtn" style="display: none;" value="Delete selected rows">
                            <input type="hidden" name="fullUrl" value="{{Request::fullUrl()}}" id="fullUrl">
                        </form>
                    </div>
                </div><br>
				<table class="table table-bordered" id="tableList">
					<thead>
						<tr>
							<th><lable class="col-3"><input type="checkbox" id="checkAll"/></lable></th>
							<th>#</th>
							<th>Template</th>
							<th>Category</th>
							<th>SubCategory</th>
							<th>Day</th>
							<th>Sequence</th>
							<th>Series</th>
							<th>Frequency</th>
							<th>Time</th>
							<th>Tempo</th>
							<th>Rest</th>
							<th>Week1</th>
							<th>Week2</th>
							<th>Week3</th>
							<th>Week4</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if(count($programs) > 0)
						@foreach($programs as $program)
						<tr>
							<td><input type="checkbox" class="checkBoxClass" name="check_name[]" value="{{$program->id}}" /></td>
							<td>{{$loop->iteration}}</td>
							<td>{{$program->template ? $program->template->name : ''}}</td>
							<td>
                                <a href="#" class="category" data-name="category_id" data-type="select" data-pk="{{ $program->id }}"  data-title="Select category">{{$program->category ? $program->category->name : ''}}</a>
                                {{-- {{$program->category ? $program->category->name : ''}} --}}
                            </td>
							<td>
                                <a href="#" class="subcategory" data-name="subcategory_id" data-type="select" data-pk="{{ $program->id }}" data-source="{{url("admin/getParentsubCategory/$program->category_id")}}" data-title="Select sub category">{{$program->subcategory ? $program->subcategory->name : ''}}</a>
                                {{-- {{$program->subcategory ? $program->subcategory->name : ''}} --}}
                            </td>
							<td>
                                
                                <a href="#" class="xedit" data-type="text" data-pk="{{ $program->id }}" data-name="day" data-title="Edit Day">{!! $program->day !!}</a>
                                {{-- <a href="#" class="xedit" 
                                   data-id="{{$program->id}}"
                                   data-name="day">
                                   {{$program->day}}
                                </a> --}}
                            </td>
							<td>
                                <a href="#" class="xedit" data-type="text" data-pk="{{ $program->id }}" data-name="sequence" data-title="Edit Sequence">{!! $program->sequence !!}</a>
                                {{-- {{$program->sequence}} --}}
                            </td>
							<td>
                                <a href="#" class="xedit" data-type="text" data-pk="{{ $program->id }}" data-name="series" data-title="Edit Sequence">{!! $program->series !!}</a>
                                {{-- {{$program->series}} --}}
                            </td>
							<td>
                                <a href="#" class="xedit" data-type="text" data-pk="{{ $program->id }}" data-name="frequency" data-title="Edit Sequence">{!! $program->frequency !!}</a>
                                {{-- {{$program->frequency}} --}}
                            </td>
							<td>
                                <a href="#" class="xedit" data-type="text" data-pk="{{ $program->id }}" data-name="time" data-title="Edit Sequence">{!! $program->time !!}</a>
                                {{-- {{$program->time}} --}}
                            </td>
							<td>
                                <a href="#" class="xedit" data-type="text" data-pk="{{ $program->id }}" data-name="tempo" data-title="Edit Sequence">{!! $program->tempo !!}</a>
                                {{-- {{$program->tempo}} --}}
                            </td>
							<td>
                                <a href="#" class="xedit" data-type="text" data-pk="{{ $program->id }}" data-name="rest" data-title="Edit Sequence">{!! $program->rest !!}</a>
                                {{-- {{$program->rest}} --}}
                            </td>
							<td>
                                <a href="#" class="xedit" data-type="text" data-pk="{{ $program->id }}" data-name="week1" data-title="Edit Sequence">{!! $program->week1 !!}</a>
                                {{-- {{$program->week1}} --}}
                            </td>
							<td>
                                <a href="#" class="xedit" data-type="text" data-pk="{{ $program->id }}" data-name="week2" data-title="Edit Sequence">{!! $program->week2 !!}</a>
                                {{-- {{$program->week2}} --}}
                            </td>
							<td>
                                <a href="#" class="xedit" data-type="text" data-pk="{{ $program->id }}" data-name="week3" data-title="Edit Sequence">{!! $program->week3 !!}</a>
                                {{-- {{$program->week3}} --}}
                            </td>
							<td>
                                <a href="#" class="xedit" data-type="text" data-pk="{{ $program->id }}" data-name="week4" data-title="Edit Sequence">{!! $program->week4 !!}</a>
                                {{-- {{$program->week4}} --}}
                            </td>
							<td style="width:15%;">
                                <a href="{{route('program.edit',$program->id) }}" class="success p-0" title="Edit">
                                    <i class="flaticon-edit-1 font-large-3 mr-2"></i>
                                </a>
                                <a href="javascript:void(0);" onclick="deleteData({{ $program->id }},'program')" class="success p-0" title="Delete">
									<i class="flaticon-delete font-large-3 mr-2"></i>
								</a>
                            </td>
						</tr>
						@endforeach
						@endif
				    </tbody>
			    </table>
		    </div>
	    </div>
    </div>
</div>
@endsection
@push('scripts')

<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script>
$(document).ready(function() {
    $.fn.editable.defaults.mode = 'inline';

    $.fn.editable.defaults.params = function (params) 
    {
        params._token = $("#_token").data("token");
        return params;
    };
     
    
    $('.category').editable({
       
        source: '{{url("admin/getParentCategory")}}',
        pk: <?php echo $program->id; ?>,
        url: '{{url("admin/programupdate")}}',
        send:'always',
        ajaxOptions: {
        dataType: 'json'
        },
        success: function (data) {
            location.reload();
        }
    });

    $('.subcategory').editable({
        pk: <?php echo $program->id; ?>,
        url: '{{url("admin/programupdate")}}',
        send:'always',
        ajaxOptions: {
        dataType: 'json'
        }
        // success: function (data) {
        //     location.reload();
        // }
    });

});
</script>

{{-- <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script> --}}
<script>
    $(document).ready(function() {

     $.fn.editable.defaults.mode = 'inline';

       $.fn.editable.defaults.params = function (params) 
       {
        params._token = $("#_token").data("token");
        return params;
       };

     $('.xedit').editable({
                
                type: 'text',
                url:'{{url("admin/programupdate")}}',   
                send:'always',
                ajaxOptions: {
                dataType: 'json'
                }

                } );
 } );
// $(document).ready(function () {
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': '{{csrf_token()}}'
//             }
//         });

//         $('.xedit').editable({
//             mode: 'inline',
//             url: '{{url("programupdate")}}',
//             title: 'Update',
//             success: function (response) {
//                 console.log('Updated', response)
//             }
//         });

// })
// $('.xedit').editable({
//     mode: 'inline',
                    
// });
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
        var fullUrl = $('#fullUrl').val();
        //console.log(fullUrl);

        swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete this item!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then(function (result) {
    	//console.log(result);
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
                    	//console.log(result);
                        window.location.href = fullUrl;
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