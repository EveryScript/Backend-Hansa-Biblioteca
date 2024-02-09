<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    public function __construct()
    {
    }
    // Get all clients
    public function index()
    {
        $clients = Client::all();

        return response()->json([
            'status' => 'success',
            'clients' => $clients
        ]);
    }
    // Get client by id
    public function show($id)
    {
        $client = Client::find($id)->load('loans');

        return response()->json([
            'status' => 'success',
            'client' => $client
        ]);
    }
    // Create client
    public function store(ClientRequest $request)
    {

        Client::create($request->validated());

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Client created'
        ], 200);
    }
    // Update client
    public function update(ClientRequest $request, $id)
    {

        Client::where('id', $id)->update($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Client updated',
        ], 200);
    }
    // Delete client
    public function destroy($id)
    {
        $client = Client::where('id', $id);
        if (is_object($client)) {
            $client->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Client deleted',
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Error on client deleted',
            ], 500);
        }
    }
    // Get Unreturned Books on clients
    public function getExpiredClients()
    {
        $clients = Client::all()->load('loansUnreturned');

        return response()->json([
            'status' => 'success',
            'clients' => $clients
        ]);
    }
}
