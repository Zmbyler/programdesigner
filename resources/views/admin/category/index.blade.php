@extends('admin.layouts.layout')
@section('title','Category List')
@push('css')
{{Html::style(ASSETS_PATH.'/tabletree/screen.css')}}
{{Html::style(ASSETS_PATH.'/tabletree/jquery.treetable.css')}}
{{Html::style(ASSETS_PATH.'/tabletree/jquery.treetable.theme.default.css')}}
@endpush
@section('content')
<div class="jquery-script-clear"></div>
{{-- <style>
    .treegrid-indent {
        width: 0px;
        height: 16px;
        display: inline-block;
        position: relative;
    }

    .treegrid-expander {
        width: 0px;
        height: 16px;
        display: inline-block;
        position: relative;
        left:-17px;
    }
</style> --}}

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">Category List </h3>
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
							<a href="{{ route('category.create') }}" class="btn btn-brand btn-icon-sm"><i class="flaticon2-plus"></i>Add New</a>
						</div>
					</div>
				</div>
			</div>
			<div class="kt-portlet__body">
				<table id="example-basic-expandable" class="table table-hover table-bordered">
                    <tbody>
                    <th>Categories </th>
                    <th>Action </th>
                    @foreach($parentCategories as $category)
                    	<tr data-tt-id="{{$category->id}}">
				          	<td width="70px">{{$category->name}}</td>
				          	<td width="30px">
                            	<a href="{{route('category.edit',$category->id) }}" class="success p-0" data-original-title="" title="Edit"><i class="flaticon-edit-1 font-large-3 mr-2"></i></a>
                    			<a href="javascript:void(0);" onclick="catdeleteData({{ $category->id }},'category')" class="success p-0" title="Delete">
                                    <i class="flaticon-delete font-large-3 mr-2"></i>
                                </a>
                    		</td>
				        </tr>
						        
                       {{--  <tr data-id="{{$category->id}}" data-parent="0" data-level="1">
                            <td data-column="name">{{$category->name}}</td>
                            <td>
                            	<a href="{{route('category.edit',$category->id) }}" class="success p-0" data-original-title="" title="Edit"><i class="flaticon-edit-1 font-large-3 mr-2"></i></a>
                    			
                    		</td>
                        </tr>--}} 
                        @if(count($category->subcategory))
                            @include('admin.category.category',['subcategories' => $category->subcategory, 'dataParent' => $category->id , 'dataLevel' => 1])
                        @endif      
				        @endforeach
                    </tbody>
                </table>
		    </div>
	    </div>
    </div>
</div>
@push('scripts')

<script type="text/javascript">
$(document).ready(function () { 
	$('.editcategory').on('click',function(){
	  var editurl = $(this).attr('data-editurl');
	  window.location.href = editurl;
	});
});
</script>
@endpush
@endsection