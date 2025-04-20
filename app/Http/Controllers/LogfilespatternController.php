<?php

namespace App\Http\Controllers;

use App\Models\Logfilespattern;
use Illuminate\Http\Request;

class LogfilespatternController extends Controller
{
    public function index()
    {
        $patterns = Logfilespattern::with(['etat', 'criticite', 'logfile', 'demande'])->get();
        return response()->json($patterns);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nRef' => 'nullable|integer',
            'ref' => 'nullable|string|max:255',
            'etat_id' => 'nullable|integer|exists:etat,id',
            'signification' => 'nullable|string|max:1000',
            'identification' => 'nullable|string|max:1000',
            'criticite_id' => 'nullable|integer|exists:criticite,id',
            'messageAlarme' => 'nullable|string|max:1000',
            'instructions' => 'nullable|string|max:1000',
            'performAction' => 'nullable|string|max:1000',
            'acquittement' => 'nullable|string|max:255',
            'complementsInformations' => 'nullable|string|max:1000',
            'refService' => 'nullable|string|max:255',
            'objet' => 'nullable|string|max:255',
            'logfile_id' => 'nullable|integer|exists:logfiles,id',
            'demande_id' => 'required|integer|exists:demandes,id',
        ]);

        $pattern = Logfilespattern::create($validated);
        return response()->json($pattern->load(['etat', 'criticite', 'logfile', 'demande']), 201);
    }

    public function show(string $id)
    {
        $pattern = Logfilespattern::with(['etat', 'criticite', 'logfile', 'demande'])->findOrFail($id);
        return response()->json($pattern);
    }

    public function update(Request $request, string $id)
    {
        $pattern = Logfilespattern::findOrFail($id);

        $validated = $request->validate([
            'nRef' => 'nullable|integer',
            'ref' => 'nullable|string|max:255',
            'etat_id' => 'nullable|integer|exists:etat,id',
            'signification' => 'nullable|string|max:1000',
            'identification' => 'nullable|string|max:1000',
            'criticite_id' => 'nullable|integer|exists:criticite,id',
            'messageAlarme' => 'nullable|string|max:1000',
            'instructions' => 'nullable|string|max:1000',
            'performAction' => 'nullable|string|max:1000',
            'acquittement' => 'nullable|string|max:255',
            'complementsInformations' => 'nullable|string|max:1000',
            'refService' => 'nullable|string|max:255',
            'objet' => 'nullable|string|max:255',
            'logfile_id' => 'nullable|integer|exists:logfiles,id',
            'demande_id' => 'nullable|integer|exists:demandes,id',
        ]);

        $pattern->update($validated);
        return response()->json($pattern->load(['etat', 'criticite', 'logfile', 'demande']));
    }

    public function destroy(string $id)
    {
        $pattern = Logfilespattern::findOrFail($id);
        $pattern->delete();

        return response()->json(['message' => 'Pattern supprimé avec succès.']);
    }
}
