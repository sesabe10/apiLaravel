<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::all();

        if($client->isEmpty()){
            $data = [
                'message' => 'No hay clientes',
                'status'  => 200
            ];
            return response()->json($data);
        }
        return response()->json($client);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|string',
            'phone' => 'nullable|string',
        ]);

        $client = Client::create($request->all());
        return response()->json([
            'data' => $client,
            'message' => 'Cliente creado con éxito'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return response()->json([
            'data' => $client
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|string',
            'phone' => 'nullable|string',
        ]);

        $client->update($request->all());
        return response()->json(['data' => $client, 'message' => 'Cliente actualizado con éxito'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json(['message' => 'Cliente eliminado con éxito'], 204);
    }
}
