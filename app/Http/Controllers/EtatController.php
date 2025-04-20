<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etat;
class EtatController extends Controller
{
    public function index() { return response()->json(Etat::all()); }
    public function store(Request $request) {
        $request->validate(['nom' => 'nullable|string|max:255']);
        return response()->json(Etat::create($request->only('nom')), 201);
    }
    public function show(string $id) {
        $etat = Etat::find($id);
        if (!$etat) return response()->json(['message' => 'État non trouvé'], 404);
        return response()->json($etat);
    }
    public function update(Request $request, string $id) {
        $etat = Etat::find($id);
        if (!$etat) return response()->json(['message' => 'État non trouvé'], 404);
        $request->validate(['nom' => 'nullable|string|max:255']);
        $etat->update($request->only('nom'));
        return response()->json($etat);
    }
    public function destroy(string $id) {
        $etat = Etat::find($id);
        if (!$etat) return response()->json(['message' => 'État non trouvé'], 404);
        $etat->delete();
        return response()->json(['message' => 'État supprimé avec succès']);
    }
}
