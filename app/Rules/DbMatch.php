<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DbMatch implements Rule
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
        //dd($this->d);
        return $this->d['model']::where('name',$this->d['name'])->exists();
        // if($this->d['model']::where('name',$this->d['name'])->exists()){
        //     return true;
        // }else{
        //     return false;
        // }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if(@$this->d['rowno']){
            return $this->d['attr'].' of row no '.$this->d['rowno'].' Not Found';
        }else{
            return $this->d['attr'].' Not Found';
        }
    }
}
