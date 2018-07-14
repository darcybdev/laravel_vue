<?php

namespace App\Base\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Validate the given request with the given rules.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $rules
     * @param  array  $messages
     * @param  array  $customAttributes
     * @return array
     */
    public function _validate(Request $request, array $rules,
                             array $messages = [], array $customAttributes = [])
    {
        $validator = $this->getValidationFactory()
             ->make($request->all(), $rules, $messages, $customAttributes);
        if ($validator->fails()) {
            return $validator->errors();
        }
        return false;
    }
}
