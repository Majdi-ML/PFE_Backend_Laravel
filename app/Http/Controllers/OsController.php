<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OS;
class OsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(OS::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'nullable|string|max:255'
        ]);
        $os = OS::create($request->only('nom'));

        return response()->json($os, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $os = OS::find($id);

        if (!$os) {
            return response()->json(['message' => 'OS non trouvé'], 404);
        }

        return response()->json($os);//
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $os = OS::find($id);

        if (!$os) {
            return response()->json(['message' => 'OS non trouvé'], 404);
        }

        $request->validate([
            'nom' => 'nullable|string|max:255'
        ]);

        $os->update($request->only('nom'));

        return response()->json($os);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $os = OS::find($id);

        if (!$os) {
            return response()->json(['message' => 'OS non trouvé'], 404);
        }

        $os->delete();

        return response()->json(['message' => 'OS supprimé avec succès']);
    }
}
