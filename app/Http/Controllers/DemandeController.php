<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demandes = Demande::all();
        return response()->json($demandes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'status_id' => 'required|integer|exists:status,id',
            'user_id' => 'nullable|integer|exists:users,id',
            'serviceplatfom_id' => 'required|integer|exists:serviceplatfom,id',
        ]);

        $demande = Demande::create([
            'description' => $request->description,
            'status_id' => $request->status_id,
            'user_id' => $request->user_id,
            'serviceplatfom_id' => $request->serviceplatfom_id,
        ]);

        return response()->json($demande, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $demande = Demande::findOrFail($id);
        return response()->json($demande);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'description' => 'nullable|string|max:255',
            'status_id' => 'nullable|integer|exists:status,id',
            'user_id' => 'nullable|integer|exists:users,id',
            'serviceplatfom_id' => 'nullable|integer|exists:serviceplatfom,id',
        ]);

        $demande = Demande::findOrFail($id);
        $demande->update([
            'description' => $request->description ?? $demande->description,
            'status_id' => $request->status_id ?? $demande->status_id,
            'user_id' => $request->user_id ?? $demande->user_id,
            'serviceplatfom_id' => $request->serviceplatfom_id ?? $demande->serviceplatfom_id,
        ]);

        return response()->json($demande);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $demande = Demande::findOrFail($id);
        $demande->delete();
        return response()->json(['message' => 'Demande deleted successfully']);
    }
}
