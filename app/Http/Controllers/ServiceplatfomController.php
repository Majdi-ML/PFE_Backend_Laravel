<?php

namespace App\Http\Controllers;

use App\Models\Serviceplatfom;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ServiceplatfomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceplatfoms = Serviceplatfom::all();
        return response()->json($serviceplatfoms);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'user_id' => 'nullable|integer|exists:users,id',
            'support_id' => 'nullable|integer|exists:supports,id',
        ]);

        $serviceplatfom = Serviceplatfom::create([
            'nom' => $request->nom,
            'user_id' => $request->user_id,
            'support_id' => $request->support_id,
        ]);

        return response()->json($serviceplatfom, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $serviceplatfom = Serviceplatfom::findOrFail($id);
        return response()->json($serviceplatfom);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'nullable|string|max:255',
            'user_id' => 'nullable|integer|exists:users,id',
            'support_id' => 'nullable|integer|exists:supports,id',
        ]);

        $serviceplatfom = Serviceplatfom::findOrFail($id);
        $serviceplatfom->update([
            'nom' => $request->nom ?? $serviceplatfom->nom,
            'user_id' => $request->user_id ?? $serviceplatfom->user_id,
            'support_id' => $request->support_id ?? $serviceplatfom->support_id,
        ]);

        return response()->json($serviceplatfom);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $serviceplatfom = Serviceplatfom::findOrFail($id);
        $serviceplatfom->delete();
        return response()->json(['message' => 'Serviceplatfom deleted successfully']);
    }
}
