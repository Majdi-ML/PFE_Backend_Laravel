<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Criticite;

class CriticiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   // GET /api/criticites
    public function index()
    {
        return response()->json(Criticite::all());
    }

    /**
     * Store a newly created resource in storage.
     */
     // POST /api/criticites
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'nullable|string|max:255'
        ]);

        $criticite = Criticite::create($request->only('nom'));

        return response()->json($criticite, 201);
    }

    /**
     * Display the specified resource.
     */
    // GET /api/criticites/{id}
    public function show(string $id)
    {
        if (!$criticite) {
            return response()->json(['message' => 'Criticité non trouvée'], 404);
        }

        return response()->json($criticite);
    }

    /**
     * Update the specified resource in storage.
     */
    // PUT /api/criticites/{id}
    public function update(Request $request, string $id)
    {
        $criticite = Criticite::find($id);

        if (!$criticite) {
            return response()->json(['message' => 'Criticité non trouvée'], 404);
        }

        $request->validate([
            'nom' => 'nullable|string|max:255'
        ]);

        $criticite->update($request->only('nom'));

        return response()->json($criticite);
    }

    /**
     * Remove the specified resource from storage.
     */
     // DELETE /api/criticites/{id}
    public function destroy(string $id)
    {
        $criticite = Criticite::find($id);

        if (!$criticite) {
            return response()->json(['message' => 'Criticité non trouvée'], 404);
        }

        $criticite->delete();

        return response()->json(['message' => 'Criticité supprimée avec succès']);
    }
    }

