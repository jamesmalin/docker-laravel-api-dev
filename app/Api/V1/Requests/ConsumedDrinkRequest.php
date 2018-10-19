<?php

namespace App\Api\V1\Requests;

use Config;
use Dingo\Api\Http\FormRequest;

class ConsumedDrinkRequest extends FormRequest
{
    /**
     * @return mixed
     */
    public function rules()
    {
        //return Config::get('boilerplate.login.validation_rules');
        return array();
    }

    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
