<?php

namespace App\Http\Controllers;

use App\Models\Logfile;
use Illuminate\Http\Request;

class LogfileController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logfiles = Logfile::with(['etat', 'monitoredby', 'demande', 'serveurs', 'logfilespatterns'])->get();
        return response()->json($logfiles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ref' => 'nullable|string|max:255',
            'etat_id' => 'nullable|integer|exists:etat,id',
            'refComposant' => 'nullable|string|max:255',
            'rgSgSiCluster' => 'nullable|string|max:255',
            'logfile' => 'nullable|string|max:255',
            'localisation' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'formatLogfile' => 'nullable|string|max:255',
            'separateur' => 'nullable|string|max:255',
            'intervalleDePolling' => 'nullable|string|max:255',
            'monitoredBy_id' => 'nullable|integer|exists:monitoredby,id',
            'fourniEnAnnexe' => 'nullable|string|max:255',
            'refService' => 'nullable|string|max:255',
            'nomTemplate' => 'nullable|string|max:255',
            'logConditions' => 'nullable|string',
            'demande_id' => 'nullable|integer|exists:demandes,id',
            'serveurs_ids' => 'nullable|array',
            'serveurs_ids.*' => 'integer|exists:serveurs,id',
        ]);

        $logfile = Logfile::create($validated);

        if ($request->has('serveurs_ids')) {
            $logfile->serveurs()->attach($request->serveurs_ids);
        }

        return response()->json($logfile->load(['etat', 'monitoredby', 'demande', 'serveurs', 'logfilespatterns']), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $logfile = Logfile::with(['etat', 'monitoredby', 'demande', 'serveurs', 'logfilespatterns'])->findOrFail($id);
        return response()->json($logfile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $logfile = Logfile::findOrFail($id);

        $validated = $request->validate([
            'ref' => 'nullable|string|max:255',
            'etat_id' => 'nullable|integer|exists:etat,id',
            'refComposant' => 'nullable|string|max:255',
            'rgSgSiCluster' => 'nullable|string|max:255',
            'logfile' => 'nullable|string|max:255',
            'localisation' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'formatLogfile' => 'nullable|string|max:255',
            'separateur' => 'nullable|string|max:255',
            'intervalleDePolling' => 'nullable|string|max:255',
            'monitoredBy_id' => 'nullable|integer|exists:monitoredby,id',
            'fourniEnAnnexe' => 'nullable|string|max:255',
            'refService' => 'nullable|string|max:255',
            'nomTemplate' => 'nullable|string|max:255',
            'logConditions' => 'nullable|string',
            'demande_id' => 'nullable|integer|exists:demandes,id',
            'serveurs_ids' => 'nullable|array',
            'serveurs_ids.*' => 'integer|exists:serveurs,id',
        ]);

        $logfile->update($validated);

        // Synchroniser les serveurs liés (mise à jour de la table pivot)
        if ($request->has('serveurs_ids')) {
            $logfile->serveurs()->sync($request->serveurs_ids);
        }

        return response()->json($logfile->load(['etat', 'monitoredby', 'demande', 'serveurs', 'logfilespatterns']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $logfile = Logfile::findOrFail($id);
        $logfile->serveurs()->detach(); // détacher d'abord de la table pivot
        $logfile->delete();

        return response()->json(['message' => 'Logfile deleted successfully']);
    }
}


