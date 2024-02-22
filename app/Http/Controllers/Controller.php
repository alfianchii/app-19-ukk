<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected array $exportRules = [
        "table" => ["required"],
        "type" => ["required", "in:XLSX,CSV,HTML,MPDF"],
    ];

    public function responseJsonMessage($message, $status = 200)
    {
        return response()->json([
            "message" => $message,
        ], $status);
    }
}
