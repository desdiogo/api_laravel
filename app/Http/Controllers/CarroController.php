<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarroController extends Controller
{
    private Carro $carro;

    /**
     * PeopleController constructor.
     * @param Carro $carro
     */
    public function __construct(Carro $carro)
    {
        $this->carro = $carro;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $carro = Carro::with('marca')->get();
        return response()->json($carro);
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
            $this->carro->create($request->all());
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
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $peopple = $this->carro->find($id);

        if (!$peopple) {
            return response()->json(['msg' => 'O registro não foi localizado!'], 404);
        }

        return response()->json($peopple);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $carroData = $request->all();
            $carro = $this->carro->find($id);
            $carro->update($carroData);

            return response()->json(['msg' => 'O registro foi atualizado com sucesso!'], 201);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Houve um erro ao realizar operação de atualizar'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy(Carro $id): JsonResponse
    {
        try {
            $id->delete();
            return response()->json(['msg' => 'O registro foi removido com sucesso!'], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Ocorreu um erro na exlcusão do registro'], 500);
        }
    }
}
