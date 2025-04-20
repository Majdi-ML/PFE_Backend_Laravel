<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function index()
    {
        $urls = Url::with(['etat', 'criticite', 'monitoredby', 'demande', 'serveurs'])->get();
        return response()->json($urls);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ref' => 'nullable|string|max:255',
            'etat_id' => 'nullable|integer|exists:etat,id',
            'refComposant' => 'nullable|string|max:255',
            'rgSgSiCluster' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:1000',
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

        $url = Url::create($validated);
        $url->serveurs()->attach($validated['serveurs_ids']);

        return response()->json($url->load('serveurs'), 201);
    }

    public function show(string $id)
    {
        $url = Url::with(['etat', 'criticite', 'monitoredby', 'demande', 'serveurs'])->findOrFail($id);
        return response()->json($url);
    }

    public function update(Request $request, string $id)
    {
        $url = Url::findOrFail($id);

        $validated = $request->validate([
            'ref' => 'nullable|string|max:255',
            'etat_id' => 'nullable|integer|exists:etat,id',
            'refComposant' => 'nullable|string|max:255',
            'rgSgSiCluster' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:1000',
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

        $url->update($validated);
        return response()->json($url);
    }

    public function destroy(string $id)
    {
        $url = Url::findOrFail($id);
        $url->serveurs()->detach();
        $url->delete();

        return response()->json(['message' => 'Url deleted successfully']);
    }
}
