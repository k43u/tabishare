<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SampleRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $totalFileSize = 0;
         
         foreach($value as $image) {
            $totalFileSize += $image->getSize(); 
        }
        

        
        return $totalFileSize <= 50000000; 


    }

    
    
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
       return 'Total file size of :attribute must be less than 50MB';
    }
}
