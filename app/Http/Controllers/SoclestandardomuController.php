<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soclestandardomu;
class SoclestandardomuController extends Controller
{
    public function index()
    {
        return response()->json(Soclestandardomu::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'nullable|string|max:255'
        ]);

        $socle = Soclestandardomu::create($request->only('nom'));

        return response()->json($socle, 201);
    }

    public function show(string $id)
    {
        $socle = Soclestandardomu::find($id);

        if (!$socle) {
            return response()->json(['message' => 'Socle non trouvé'], 404);
        }

        return response()->json($socle);
    }

    public function update(Request $request, string $id)
    {
        $socle = Soclestandardomu::find($id);

        if (!$socle) {
            return response()->json(['message' => 'Socle non trouvé'], 404);
        }

        $request->validate([
            'nom' => 'nullable|string|max:255'
        ]);

        $socle->update($request->only('nom'));

        return response()->json($socle);
    }

    public function destroy(string $id)
    {
        $socle = Soclestandardomu::find($id);

        if (!$socle) {
            return response()->json(['message' => 'Socle non trouvé'], 404);
        }

        $socle->delete();

        return response()->json(['message' => 'Socle supprimé avec succès']);
    }
}
