<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Process;
class ProcessController extends Controller
{
    public function index()
    {
        $processes = Process::with(['etat', 'criticite', 'monitoredby', 'demande', 'serveurs'])->get();
        return response()->json($processes);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ref' => 'nullable|string|max:255',
            'etat_id' => 'nullable|integer|exists:etat,id',
            'refComposant' => 'nullable|string|max:255',
            'process' => 'nullable|string|max:255',
            'criticite_id' => 'nullable|integer|exists:criticite,id',
            'messageAlarme' => 'nullable|string',
            'intervalleDePolling' => 'nullable|string',
            'objet' => 'nullable|string|max:255',
            'nomTemplate' => 'nullable|string|max:255',
            'monitoredBy_id' => 'nullable|integer|exists:monitoredby,id',
            'demande_id' => 'required|integer|exists:demandes,id',
            'serveurs_ids' => 'required|array',
            'serveurs_ids.*' => 'integer|exists:serveurs,id',
        ]);

        $process = Process::create($validated);

        if ($request->has('serveurs_ids')) {
            $process->serveurs()->attach($validated['serveurs_ids']);
        }

        return response()->json($process->load('serveurs'), 201);
    }

    public function show(string $id)
    {
        $process = Process::with(['etat', 'criticite', 'monitoredby', 'demande', 'serveurs'])->findOrFail($id);
        return response()->json($process);
    }

    public function update(Request $request, string $id)
    {
        $process = Process::findOrFail($id);

        $validated = $request->validate([
            'ref' => 'nullable|string|max:255',
            'etat_id' => 'nullable|integer|exists:etat,id',
            'refComposant' => 'nullable|string|max:255',
            'process' => 'nullable|string|max:255',
            'criticite_id' => 'nullable|integer|exists:criticite,id',
            'messageAlarme' => 'nullable|string',
            'intervalleDePolling' => 'nullable|string',
            'objet' => 'nullable|string|max:255',
            'nomTemplate' => 'nullable|string|max:255',
            'monitoredBy_id' => 'nullable|integer|exists:monitoredby,id',
            'demande_id' => 'nullable|integer|exists:demandes,id',
        ]);

        $process->update($validated);

        return response()->json($process);
    }

    public function destroy(string $id)
    {
        $process = Process::findOrFail($id);
        $process->serveurs()->detach();
        $process->delete();

        return response()->json(['message' => 'Process deleted successfully']);
    }
}