<?php

namespace App\Http\Controllers;

use App\Models\Reklamation;
use Illuminate\Http\Request;

class ReklamationController extends Controller
{
    /**
     * @param $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function getReklamations($status = null)
    {
        $reklamationsQuery = Reklamation::query();

        if ($status) {
            $reklamationsQuery->whereStatus($status);
        }

        $reklamations = $reklamationsQuery->get();

        return response()->json($reklamations);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function addReklamation(Request $request)
    {
        Reklamation::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'created_data' => time(),
            'status' => $request->input('status'),
        ]);

        return response()->json(['message' => 'Created']);//TODO  сделать как везде, вернуть ответ в джейсооон
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getReklamationById($id)
    {
        $reklamations = Reklamation::find($id);

        return response()->json($reklamations);
    }

    /**
     * @param Request $request
     * @return int
     */
    public function deleteReklamationById(Request $request)
    {
        return Reklamation::destroy($request->input('id'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateReklamationById(Request $request, $id)
    {
        $reklamations = Reklamation::find($id);
        $data = $request->all();
        $reklamations->update($data);

        return response()->json(['data' => $reklamations]);
    }
    public function timeCreateReklamation(){
        $reklamations = Reklamation::orderBy('created_date','desc')->get();
        return response()->json($reklamations);
    }
}

