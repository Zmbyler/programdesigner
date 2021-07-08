@extends('admin.layouts.layout')
@section('title','Exercise List')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Exercise List</h3>
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
                            <a href="{{ route('exercise.create') }}" class="btn btn-brand btn-icon-sm"><i class="flaticon2-plus"></i>Add New</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="row">
                    <div class="col-9">
                        <form method="post" action="{{ route('exercise.destroyBulkData') }}">
                            <input type="submit" class="btn btn-danger deleteAllBtn" style="display: none;" value="Delete selected rows">
                        </form>
                    </div>
                </div><br>
                <table class="table table-bordered" id="exerciseTableList">
                    <thead>
                        <tr>
                            <th><lable class="col-3"><input type="checkbox" id="checkAll"/></lable></th>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Training Age</th>
                            <th>Athlete Option</th>
                            <th>Block Focus</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($exercises as $list)
                        @php($cat_name = $list->category->first())
                        
                        <tr>
                            <td><input type="checkbox" class="checkBoxClass" name="check_name[]" value="{{$list->id}}" /></td>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$list->name}}</td>
                            <td>{{$list->category ? $cat_name->name : '----'}}</td>
                            <td>{{$list->trainingage ? $list->trainingage->name : '----'}}</td>
                            <td>{{$list->athleteoption ? $list->athleteoption->name : '----'}}</td>
                            <td>{{$list->blockfocus ? $list->blockfocus->name : '----'}}</td>

                            @if($list->status == true)
                            <td>
                                <a href="javascript:void(0)" onclick="changeStatus({{ $list->id }},'exercise')" class="kt-badge kt-badge--inline kt-badge--pill  @if($list->status==true) kt-badge--success  @else kt-badge--danger  @endif">{{ ($list->status) ? 'Active' : 'Inactive' }}</a>
                            </td>
                            @else
                            <td>
                                <a href="javascript:void(0)" onclick="changeStatus({{ $list->id }},'exercise')" class="kt-badge kt-badge--inline kt-badge--pill  @if($list->status==false) kt-badge--danger  @else kt-badge--danger  @endif">{{ ($list->status) ? 'Inactive' : 'Inactive' }}</a>
                            </td>
                            @endif
                            </td>
                            <td style="width:15%;">
                                <a href="{{route('exercise.edit',$list->id) }}" class="success p-0" data-original-title="" title="Edit">
                                    <i class="flaticon-edit-1 font-large-3 mr-2"></i>
                                </a>
                                <a href="javascript:void(0);" onclick="deleteData({{ $list->id }},'exercise')" class="success p-0" title="Delete">
                                    <i class="flaticon-delete font-large-3 mr-2"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                </form>
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
                            window.location.href = "{{route('exercise.index')}}";
                        }
                    });
                } else {
                    toastr.warning("Please select at least one checkbox");
                }

            }

        });
    });
        // delete with checkbox function end
    </script>
    @endpush
