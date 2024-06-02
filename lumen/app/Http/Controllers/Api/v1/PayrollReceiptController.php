<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Logic\Payroll\CreateLogic;

class PayrollReceiptController extends Controller
{
    protected $createLogic;

    public function __construct(CreateLogic $createLogic)
    {
        $this->createLogic = $createLogic;
    }

    /**
     * Store a new payroll.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $bodyContent = $request->getContent();

        $data = $this->createLogic->init($bodyContent);

        return response()->json($data);
    }
}
