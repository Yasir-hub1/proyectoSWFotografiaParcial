<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FotoPerfil;
use Illuminate\Http\Request;
use App\Traits\ApiResponder;

use Illuminate\Http\JsonResponse;

class ClienteController extends Controller
{
    use ApiResponder;
    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function fotosDelCliente(Request $request):JsonResponse
    {
        $getFoto = FotoPerfil::select(["id", "imagen"])
                                ->where($request->id_cliente, "cliente_id")
                                ->get();

        return $this->success(
            "fotoPerfilCliente",
            $getFoto->toArray(),
        );
    }
}
