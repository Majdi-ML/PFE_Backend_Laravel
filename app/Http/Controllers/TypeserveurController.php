<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typeserveur;
class TypeserveurController extends Controller
{
    public function index()
    {
        return response()->json(Typeserveur::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'nullable|string|max:255'
        ]);

        $type = Typeserveur::create($request->only('nom'));

        return response()->json($type, 201);
    }

    public function show(string $id)
    {
        $type = Typeserveur::find($id);

        if (!$type) {
            return response()->json(['message' => 'Type serveur non trouvé'], 404);
        }

        return response()->json($type);
    }

    public function update(Request $request, string $id)
    {
        $type = Typeserveur::find($id);

        if (!$type) {
            return response()->json(['message' => 'Type serveur non trouvé'], 404);
        }

        $request->validate([
            'nom' => 'nullable|string|max:255'
        ]);

        $type->update($request->only('nom'));

        return response()->json($type);
    }

    public function destroy(string $id)
    {
        $type = Typeserveur::find($id);

        if (!$type) {
            return response()->json(['message' => 'Type serveur non trouvé'], 404);
        }

        $type->delete();

        return response()->json(['message' => 'Type serveur supprimé avec succès']);
    }
}
