<?php
define('MAIN_PATH','');

/*****  ADMIN, STYLE CONSTANT PATH *****/
define('ASSETS_PATH',  	MAIN_PATH.'/assets');
define('GENERAL_PATH',  	ASSETS_PATH.'/vendors/general');
define('CUSTOM_PATH',  		ASSETS_PATH.'/vendors/custom');
define('MEDIA_PATH',  	ASSETS_PATH.'/media');


function categoryTree($parent_id = 0, $sub_mark = '',$cat_id =''){
        
    $query = App\Category::where('parent_id',$parent_id)->orderby('name','asc')->get();
    
    if(count($query) > 0){
        foreach ($query as $key => $row) {
        	$selected = $cat_id == $row->id ? 'selected' : '';
        	echo "<option $selected value='{$row['id']}'>{$sub_mark}{$row['name']}</option>";
            //echo '<option "'.$selected.'" value="'.$row->id.'">'.$sub_mark.$row->name.'</option>';
            categoryTree($row->id, $sub_mark.'-',$cat_id);
        }
            
    }
}

function isAssociative($x) : bool {
  if (!is_array($x)) {
    return false;
  }
  $i = count($x);
  while ($i > 0) {
    if (!isset($x[--$i])) {
      return true;
    }
  }
  return false;
}

function is_multi(array $array):bool
{
    return is_array($array[array_key_first($array)]);
}



function getParentIds($category) {
    $array = [$category->id];
    if(!$category->recursiveparent) {
        return $array;
    } 
    else  {
        array_push($array, $category->recursiveparent->id);
        if($category->recursiveparent->recursiveparent){
            $array = array_merge($array, getChildren($category->recursiveparent->recursiveparent, $array));
        }
     
        return $array;
    }
}

function getChildren($recursiveparent, $array) {
    array_push($array, $recursiveparent->id);
    if($recursiveparent->recursiveparent){
        return $array = array_merge($array, getChildren($recursiveparent->recursiveparent, $array));
    }
    return $array;
}


function getchildIds($category) {
    //dd($category->childrenrecursive);
    $array = [$category->id];
    if(!$category->childrenrecursive) {
        return $array;
    } 
    else  {
        foreach($category->childrenrecursive as $childrenrecursive){
           array_push($array, $childrenrecursive->id);
            if($childrenrecursive->childrenrecursive){
                $array = array_merge($array, getChild($childrenrecursive->childrenrecursive, $array));
            } 
        }
        
     
        return $array;
    }
}

function getChild($childrenrecursive, $array) {
    foreach($childrenrecursive as $recursive){
        array_push($array, $recursive->id);
        if($recursive->childrenrecursive){
            return $array = array_merge($array, getChild($recursive->childrenrecursive, $array));
        }
    }
    
    return $array;
}

