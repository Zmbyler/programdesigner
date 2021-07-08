<ul>

    @foreach($childs as $child)

        <li>

            {{ $child->name }}&nbsp; &nbsp;<input type="checkbox" name="category_id[]" value="{{$child->id}}" {{in_array($child->id,$program->category->pluck('id')->toArray()) ? 'checked' : ''}}>

            @if(count($child->subcategory))

                @include('admin.program.category',['childs' => $child->subcategory])

            @endif

        </li>

    @endforeach

</ul>