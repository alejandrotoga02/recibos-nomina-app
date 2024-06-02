<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayrollReceiptController extends Controller
{

    /**
     * Store a new payroll.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $bodyContent = $request->getContent();

        if (!$this->is_valid_xml($bodyContent)) {
            dd("Error");
        }

        $json = json_encode(simplexml_load_string($bodyContent));
        $json = json_decode($json);
        dd($json);
    }

    function is_valid_xml($content)
    {
        libxml_use_internal_errors(true);
        $doc = simplexml_load_string($content);
        return ($doc !== false);
    }
}
