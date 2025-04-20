<?php

namespace App\Http\Controllers;
use App\Models\Platforme;
use Illuminate\Http\Request;

class PlatformeController extends Controller
{
    public function index()
    {
        return response()->json(Platforme::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'nullable|string|max:255'
        ]);

        $platforme = Platforme::create($request->only('nom'));

        return response()->json($platforme, 201);
    }

    public function show(string $id)
    {
        $platforme = Platforme::find($id);

        if (!$platforme) {
            return response()->json(['message' => 'Plateforme non trouvée'], 404);
        }

        return response()->json($platforme);
    }

    public function update(Request $request, string $id)
    {
        $platforme = Platforme::find($id);

        if (!$platforme) {
            return response()->json(['message' => 'Plateforme non trouvée'], 404);
        }

        $request->validate([
            'nom' => 'nullable|string|max:255'
        ]);

        $platforme->update($request->only('nom'));

        return response()->json($platforme);
    }

    public function destroy(string $id)
    {
        $platforme = Platforme::find($id);

        if (!$platforme) {
            return response()->json(['message' => 'Plateforme non trouvée'], 404);
        }

        $platforme->delete();

        return response()->json(['message' => 'Plateforme supprimée avec succès']);
    }
}
