<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RequiredValidation implements Rule
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
        if(is_null($value)){
            return false;
        }else{
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->d['attr'].' Filled is Required';
    }
}
