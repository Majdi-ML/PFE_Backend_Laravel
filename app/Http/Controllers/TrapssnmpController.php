<?php

namespace App\Http\Controllers;

use App\Models\Trapssnmp;
use Illuminate\Http\Request;

class TrapssnmpController extends Controller
{
    public function index()
    {
        $traps = Trapssnmp::with(['etat', 'versionsnmp', 'criticite', 'demande', 'serveurs'])->get();
        return response()->json($traps);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ref' => 'nullable|string|max:255',
            'etat_id' => 'nullable|integer|exists:etat,id',
            'refComposant' => 'nullable|string|max:255',
            'signification' => 'nullable|string|max:1000',
            'versionSnmp_id' => 'nullable|integer|exists:versionsnmp,id',
            'oid' => 'nullable|string|max:255',
            'specificTrap' => 'nullable|string|max:255',
            'variableBinding' => 'nullable|string|max:1000',
            'criticite_id' => 'nullable|integer|exists:criticite,id',
            'messageAlarme' => 'nullable|string|max:1000',
            'instructions' => 'nullable|string|max:1000',
            'acquittement' => 'nullable|string|max:255',
            'mibAssocie' => 'nullable|string|max:255',
            'objet' => 'nullable|string|max:255',
            'compelementInformation' => 'nullable|string|max:1000',
            'demande_id' => 'required|integer|exists:demandes,id',
            'serveurs_ids' => 'required|array',
            'serveurs_ids.*' => 'integer|exists:serveurs,id'
        ]);

        $trap = Trapssnmp::create($validated);
        $trap->serveurs()->attach($validated['serveurs_ids']);

        return response()->json($trap->load('serveurs'), 201);
    }

    public function show(string $id)
    {
        $trap = Trapssnmp::with(['etat', 'versionsnmp', 'criticite', 'demande', 'serveurs'])->findOrFail($id);
        return response()->json($trap);
    }

    public function update(Request $request, string $id)
    {
        $trap = Trapssnmp::findOrFail($id);

        $validated = $request->validate([
            'ref' => 'nullable|string|max:255',
            'etat_id' => 'nullable|integer|exists:etat,id',
            'refComposant' => 'nullable|string|max:255',
            'signification' => 'nullable|string|max:1000',
            'versionSnmp_id' => 'nullable|integer|exists:versionsnmp,id',
            'oid' => 'nullable|string|max:255',
            'specificTrap' => 'nullable|string|max:255',
            'variableBinding' => 'nullable|string|max:1000',
            'criticite_id' => 'nullable|integer|exists:criticite,id',
            'messageAlarme' => 'nullable|string|max:1000',
            'instructions' => 'nullable|string|max:1000',
            'acquittement' => 'nullable|string|max:255',
            'mibAssocie' => 'nullable|string|max:255',
            'objet' => 'nullable|string|max:255',
            'compelementInformation' => 'nullable|string|max:1000',
            'demande_id' => 'nullable|integer|exists:demandes,id'
        ]);

        $trap->update($validated);
        return response()->json($trap);
    }

    public function destroy(string $id)
    {
        $trap = Trapssnmp::findOrFail($id);
        $trap->serveurs()->detach();
        $trap->delete();

        return response()->json(['message' => 'Trap SNMP supprimé avec succès.']);
    }
}
