@foreach($subcategories as $subcategory)
 		<tr data-tt-id="{{$subcategory->id}}" data-tt-parent-id="{{$dataParent}}">
      <td width="70px">{{$subcategory->name}}</td>
      <td width="30px"><span class="text-info editcategory" data-editurl={{route('category.edit',$subcategory->id) }}><i class="flaticon-edit-1 font-large-3 mr-2"></i></span>
      <a href="javascript:void(0);" onclick="catdeleteData({{ $subcategory->id }},'category')" class="success p-0" title="Delete">
      <i class="flaticon-delete font-large-3 mr-2"></i></a></td>
    </tr>
    {{-- <tr data-id="{{$subcategory->id}}" data-parent="{{$dataParent}}" data-level="{{$dataLevel + 1}}">
       <td data-column="name">{{$subcategory->name}}</td>
       <td><span class="text-info editcategory" data-editurl={{route('category.edit',$subcategory->id) }}><i class="flaticon-edit-1 font-large-3 mr-2"></i></span></td>
    </tr> --}}
    @if(count($subcategory->subcategory))
        @include('admin.category.category',['subcategories' => $subcategory->subcategory, 'dataParent' => $subcategory->id, 'dataLevel' => $dataLevel ])
    @endif
@endforeach