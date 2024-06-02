<?php

namespace App\Logic\Payroll;

use App\Models\Company;
use App\Models\Employee;

class CreateLogic
{
    /**
     * Initializes the logic
     */
    public function init($content)
    {
        if (!$this->is_valid_xml($content)) {
            dd("Error");
        }

        $json = $this->xmlStringAsJson($content);

        $company = Company::firstOrCreate([
            'name' => $json->empresa->nombre
        ]);

        $employee = Employee::firstOrCreate([
            'name' => $json->empleado->nombre,
            'rfc' => $json->empleado->rfc ?? '',
            'curp' => $json->empleado->curp ?? ''
        ]);


        return $json;
    }

    private function is_valid_xml($content)
    {
        libxml_use_internal_errors(true);
        $doc = simplexml_load_string($content);
        return ($doc !== false);
    }

    private function xmlStringAsJson($content)
    {
        $json = json_encode(simplexml_load_string($content));
        return json_decode($json);
    }
}
