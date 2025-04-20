<?php

namespace App\Http\Controllers;

use App\Models\Serveur;
use Illuminate\Http\Request;

class ServeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serveurs = Serveur::with(['etat', 'platforme', 'typeserveur', 'os', 'soclestandardomu', 'demande'])->get();
        return response()->json($serveurs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ref' => 'nullable|string|max:255',
            'etat_id' => 'nullable|integer|exists:etats,id',
            'platforme_id' => 'nullable|integer|exists:platformes,id',
            'hostname' => 'nullable|string|max:255',
            'fqdn' => 'nullable|string|max:255',
            'type_id' => 'nullable|integer|exists:typeserveurs,id',
            'modele' => 'nullable|string|max:255',
            'os_id' => 'nullable|integer|exists:o_s,id',
            'verTechFirmware_id' => 'nullable|integer',
            'cluster' => 'nullable|string|max:255',
            'ipSource' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'socleStandardOmu_id' => 'nullable|integer|exists:soclestandardomus,id',
            'complementsInformations' => 'nullable|string',
            'demande_id' => 'required|integer|exists:demandes,id'
        ]);

        $serveur = Serveur::create($validated);

        return response()->json($serveur, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $serveur = Serveur::with(['etat', 'platforme', 'typeserveur', 'os', 'soclestandardomu', 'demande'])->findOrFail($id);
        return response()->json($serveur);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $serveur = Serveur::findOrFail($id);

        $validated = $request->validate([
            'ref' => 'nullable|string|max:255',
            'etat_id' => 'nullable|integer|exists:etats,id',
            'platforme_id' => 'nullable|integer|exists:platformes,id',
            'hostname' => 'nullable|string|max:255',
            'fqdn' => 'nullable|string|max:255',
            'type_id' => 'nullable|integer|exists:typeserveurs,id',
            'modele' => 'nullable|string|max:255',
            'os_id' => 'nullable|integer|exists:o_s,id',
            'verTechFirmware_id' => 'nullable|integer',
            'cluster' => 'nullable|string|max:255',
            'ipSource' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'socleStandardOmu_id' => 'nullable|integer|exists:soclestandardomus,id',
            'complementsInformations' => 'nullable|string',
            'demande_id' => 'nullable|integer|exists:demandes,id'
        ]);

        $serveur->update($validated);

        return response()->json($serveur);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $serveur = Serveur::findOrFail($id);
        $serveur->delete();

        return response()->json(['message' => 'Serveur deleted successfully']);
    }
}
