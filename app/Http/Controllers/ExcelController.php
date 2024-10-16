<?php

namespace App\Http\Controllers;

use App\Jobs\SaveItems;
use Illuminate\Http\Request;
use SoDe\Extend\Response;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class ExcelController extends Controller
{
    public function items(Request $request)
    {
        $response = Response::simpleTryCatch(function (Response $response) use ($request) {
            $validator = Validator::make($request->all(), [
                'file' => 'required|file|mimes:xlsx,xls'
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }

            $file = $request->file('file');

            $array = Excel::toArray([], $file)[0];
            array_shift($array);

            SaveItems::dispatchAfterResponse($array);
        });
        return \response($response->toArray(), $response->status);
    }

    public function images(Request $request) {}
}
