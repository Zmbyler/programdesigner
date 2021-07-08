<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Category extends Model
{

	protected $fillable = ['name','parent_id','status'];

	public function parent(){
	   return $this->belongsTo('App\Category','parent_id');
    }

    public function subcategory()
    {
        return $this->hasMany('App\Category', 'parent_id')->orderBy ('name', 'asc');
    }

    public function child()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function categories()
    {
        return $this->hasMany('App\Category','parent_id');
    }

    public function childrenCategories()
	{
	    return $this->hasMany('App\Category','parent_id')->with('categories');
	}

    public function exercise(){
	   return $this->hasMany('App\Exercise','category_id');
    }

    // public function exercisesub(){
	   // return $this->hasMany('App\Exercise','category_id');
    // }

    public function childrenrecursive() {
        return $this->child()->with('childrenrecursive');
    }

    public function exercisesub() 
    {
        return $this->belongsToMany('App\Exercise');
    }

     

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    

    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    // recursive, loads all descendants
    public function recursiveparent()
    {
       return $this->parent()->with('recursiveparent');
    }

    // public function getParentsAttribute()
    // {
    //     $parents = collect([]);

    //     $parent = $this->parent;

    //     while(!is_null($parent)) {
    //         $parents->push($parent);
    //         $parent = $parent->parent;
    //     }

    //     return $parents;
    // }


}
