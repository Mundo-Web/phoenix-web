<?php

namespace App\Http\Controllers;

use App\Jobs\SaveItems;
use Exception;
use Illuminate\Http\Request;
use SoDe\Extend\Response;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use ZipArchive;

class ExcelController extends Controller
{
    public function items(Request $request)
    {
        $response = Response::simpleTryCatch(function (Response $response) use ($request) {
            $validator = Validator::make($request->all(), [
                'file' => 'required|file|mimes:xlsx,xls',
                'zip' => 'file|mimes:zip'
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }

            $file = $request->file('file');

            $array = Excel::toArray([], $file)[0];
            array_shift($array);

            if (\count($array) == 0) throw new Exception('No hay items a procesar');

            if ($request->hasFile('zip')) {
                $file = $request->file('zip');
                $destinationPath = public_path('storage/images/products');
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }
                $zip = new ZipArchive;
                if ($zip->open($file) === TRUE) {
                    $zip->extractTo($destinationPath);
                    $zip->close();
                } else {
                    throw new Exception('No se pudo abrir el archivo ZIP');
                }
            }

            SaveItems::dispatchAfterResponse($array, $request->image_route_pattern);
            return $array;
        });
        return \response($response->toArray(), $response->status);
    }

    public function images(Request $request) {}
}
