<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Category;

class CategoryMatch implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $d;
    public function __construct($d)
    {
        $this->d = $d;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(is_null($this->d['parent_id'])){
            return Category::where('name',$this->d['name'])->exists();
        }else{
            return Category::where('name',$this->d['name'])->where('parent_id',$this->d['parent_id'])->exists();
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        
        return 'Subcategory'.' of row no '.$this->d['rowno'].' Not Found';
    }
}
