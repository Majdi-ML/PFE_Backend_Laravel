<?php

namespace App\Http\Controllers;

use App\Models\Requetessql;
use Illuminate\Http\Request;

class RequetessqlController extends Controller
{
    public function index()
    {
        $requetes = Requetessql::with(['etat', 'criticite', 'monitoredby', 'demande', 'serveurs'])->get();
        return response()->json($requetes);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ref' => 'nullable|string|max:255',
            'etat_id' => 'nullable|integer|exists:etat,id',
            'refComposant' => 'nullable|string|max:255',
            'rgSgSiCluster' => 'nullable|string|max:255',
            'requeteSql' => 'nullable|string|max:2000',
            'usernameDbName' => 'nullable|string|max:255',
            'resultatAttenduDeLaRequete' => 'nullable|string|max:1000',
            'performAction' => 'nullable|string|max:255',
            'criticite_id' => 'nullable|integer|exists:criticite,id',
            'messageAlarme' => 'nullable|string|max:1000',
            'instructions' => 'nullable|string|max:1000',
            'intervalleDePolling' => 'nullable|string|max:255',
            'refService' => 'nullable|string|max:255',
            'objet' => 'nullable|string|max:255',
            'monitoredBy_id' => 'nullable|integer|exists:monitoredby,id',
            'nomTemplate' => 'nullable|string|max:255',
            'demande_id' => 'required|integer|exists:demandes,id',
            'serveurs_ids' => 'required|array',
            'serveurs_ids.*' => 'integer|exists:serveurs,id'
        ]);

        $requete = Requetessql::create($validated);
        $requete->serveurs()->attach($validated['serveurs_ids']);

        return response()->json($requete->load('serveurs'), 201);
    }

    public function show(string $id)
    {
        $requete = Requetessql::with(['etat', 'criticite', 'monitoredby', 'demande', 'serveurs'])->findOrFail($id);
        return response()->json($requete);
    }

    public function update(Request $request, string $id)
    {
        $requete = Requetessql::findOrFail($id);

        $validated = $request->validate([
            'ref' => 'nullable|string|max:255',
            'etat_id' => 'nullable|integer|exists:etat,id',
            'refComposant' => 'nullable|string|max:255',
            'rgSgSiCluster' => 'nullable|string|max:255',
            'requeteSql' => 'nullable|string|max:2000',
            'usernameDbName' => 'nullable|string|max:255',
            'resultatAttenduDeLaRequete' => 'nullable|string|max:1000',
            'performAction' => 'nullable|string|max:255',
            'criticite_id' => 'nullable|integer|exists:criticite,id',
            'messageAlarme' => 'nullable|string|max:1000',
            'instructions' => 'nullable|string|max:1000',
            'intervalleDePolling' => 'nullable|string|max:255',
            'refService' => 'nullable|string|max:255',
            'objet' => 'nullable|string|max:255',
            'monitoredBy_id' => 'nullable|integer|exists:monitoredby,id',
            'nomTemplate' => 'nullable|string|max:255',
            'demande_id' => 'nullable|integer|exists:demandes,id'
        ]);

        $requete->update($validated);
        return response()->json($requete);
    }

    public function destroy(string $id)
    {
        $requete = Requetessql::findOrFail($id);
        $requete->serveurs()->detach();
        $requete->delete();

        return response()->json(['message' => 'Requete SQL supprimée avec succès.']);
    }
}
