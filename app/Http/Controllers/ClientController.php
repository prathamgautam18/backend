<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return response()->json(Client::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:100',
            'Email' => 'required|string|email|max:100|unique:clients',
            'Phone' => 'nullable|string|max:15',
            'Address' => 'nullable|string',
        ]);

        $client = Client::create($request->all());

        return response()->json($client, 201);
    }

    public function show($id)
    {
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['error' => 'Client not found'], 404);
        }

        return response()->json($client);
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['error' => 'Client not found'], 404);
        }

        $request->validate([
            'Name' => 'required|string|max:100',
            'Email' => 'required|string|email|max:100|unique:clients,Email,' . $id,
            'Phone' => 'nullable|string|max:15',
            'Address' => 'nullable|string',
        ]);

        $client->update($request->all());

        return response()->json($client);
    }

    public function destroy($id)
    {
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['error' => 'Client not found'], 404);
        }

        $client->delete();

        return response()->noContent();
    }
}

