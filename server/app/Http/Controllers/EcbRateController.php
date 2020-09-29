<?php

namespace App\Http\Controllers;

use App\Models\EcbRate;
use App\Http\Resources\EcbRateResource;
use App\Http\Resources\EcbRateResourceCollection;
use Illuminate\Http\Request;

class EcbRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ecbRates = EcbRate::actual()->get();

        return new EcbRateResourceCollection($ecbRates);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ecbRate = EcbRate::actual()->find($id);

        if (!$ecbRate) {
            return response()->json([
                'errors' => [
                    'status' => 404,
                    'title' => 'Not found',
                    'detail' => "The server can not find the resource {$id}",
                ],
            ], 404);
        }

        return new EcbRateResource($ecbRate);
    }
}
