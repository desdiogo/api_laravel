<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PeopleController extends Controller
{
    private People $people;

    /**
     * PeopleController constructor.
     * @param $people
     */
    public function __construct(People $people)
    {
        $this->people = $people;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $people = People::all();
        return response()->json($people);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $this->people->create($request->all());

            $return = ['msg' => 'O registro foi salvo.'];
            return response()->json($return, 201);
        } catch (\Exception $e) {
            $return = ['msg' => 'Error ao salvar registro.'];
            return response()->json($return, 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy(People $id): JsonResponse
    {
        try {
            $id->delete();
            return response()->json(['msg' => 'O registro foi removido com sucesso!'], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Ocorreu um erro na exlcusão do registro'], 500);
        }
    }
}
