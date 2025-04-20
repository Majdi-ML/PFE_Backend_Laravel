<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cluster;

class ClusterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // Charger les relations, y compris 'serveurs' avec la condition serviceplatfom_id
        $clusters = Cluster::with(['etat', 'demande', 'serveurs'])->get();
        
        return response()->json($clusters);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validation des données
    $validated = $request->validate([
        'ref' => 'nullable|string|max:255',
        'etat_id' => 'nullable|integer|exists:etat,id',
        'nomDuRessourceGroupPackageServiceGuard' => 'nullable|string|max:255',
        'adresseIp' => 'nullable|string|max:255',
        'listeDesServeursConcernes' => 'nullable|string',
        'logicielCluster' => 'nullable|string|max:255',
        'version' => 'nullable|string|max:255',
        'mode' => 'nullable|string|max:255',
        'serveurActif' => 'nullable|string|max:255',
        'complementsInformations' => 'nullable|string',
        'demande_id' => 'required|integer|exists:demandes,id',
        'serveurs_ids' => 'required|array', // Tableau d'IDs des serveurs
        'serveurs_ids.*' => 'integer|exists:serveurs,id', // Validation pour chaque serveur ID
    ]);

    // Création du cluster
    $cluster = Cluster::create($validated);

    // Ajouter les serveurs au cluster via la table pivot
    if ($request->has('serveurs_ids') && !empty($request->serveurs_ids)) {
        $cluster->serveurs()->attach($request->serveurs_ids);
    }

    // Retourner le cluster créé avec les serveurs associés
    return response()->json($cluster->load('serveurs'), 201);
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         // Charger les relations, y compris 'serveurs'
         $cluster = Cluster::with(['etat', 'demande', 'serveurs'])->findOrFail($id);
        
         return response()->json($cluster);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cluster = Cluster::findOrFail($id);

        $validated = $request->validate([
            'ref' => 'nullable|string|max:255',
            'etat_id' => 'nullable|integer|exists:etats,id',
            'nomDuRessourceGroupPackageServiceGuard' => 'nullable|string|max:255',
            'adresseIp' => 'nullable|string|max:255',
            'listeDesServeursConcernes' => 'nullable|string',
            'logicielCluster' => 'nullable|string|max:255',
            'version' => 'nullable|string|max:255',
            'mode' => 'nullable|string|max:255',
            'serveurActif' => 'nullable|string|max:255',
            'complementsInformations' => 'nullable|string',
            'demande_id' => 'nullable|integer|exists:demandes,id',
        ]);

        // Mise à jour du cluster
        $cluster->update($validated);

        return response()->json($cluster);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cluster = Cluster::findOrFail($id);
        $cluster->delete();

        return response()->json(['message' => 'Cluster deleted successfully']);
    }
}
