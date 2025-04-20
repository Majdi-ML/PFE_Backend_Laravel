<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Script;
class ScriptController extends Controller
{
    public function index()
    {
        $scripts = Script::with(['etat', 'criticite', 'monitoredby', 'demande', 'serveurs'])->get();
        return response()->json($scripts);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ref' => 'nullable|string|max:255',
            'etat_id' => 'nullable|integer|exists:etat,id',
            'refComposant' => 'nullable|string|max:255',
            'rgSgSiCluster' => 'nullable|string|max:255',
            'script' => 'nullable|string',
            'codeErreur' => 'nullable|string|max:255',
            'criticite_id' => 'nullable|integer|exists:criticite,id',
            'description' => 'nullable|string',
            'instructions' => 'nullable|string',
            'monitoredBy_id' => 'nullable|integer|exists:monitoredby,id',
            'refService' => 'nullable|string|max:255',
            'demande_id' => 'required|integer|exists:demandes,id',
            'serveurs_ids' => 'required|array',
            'serveurs_ids.*' => 'integer|exists:serveurs,id',
        ]);

        $script = Script::create($validated);

        if ($request->has('serveurs_ids')) {
            $script->serveurs()->attach($validated['serveurs_ids']);
        }

        return response()->json($script->load('serveurs'), 201);
    }

    public function show(string $id)
    {
        $script = Script::with(['etat', 'criticite', 'monitoredby', 'demande', 'serveurs'])->findOrFail($id);
        return response()->json($script);
    }

    public function update(Request $request, string $id)
    {
        $script = Script::findOrFail($id);

        $validated = $request->validate([
            'ref' => 'nullable|string|max:255',
            'etat_id' => 'nullable|integer|exists:etat,id',
            'refComposant' => 'nullable|string|max:255',
            'rgSgSiCluster' => 'nullable|string|max:255',
            'script' => 'nullable|string',
            'codeErreur' => 'nullable|string|max:255',
            'criticite_id' => 'nullable|integer|exists:criticite,id',
            'description' => 'nullable|string',
            'instructions' => 'nullable|string',
            'monitoredBy_id' => 'nullable|integer|exists:monitoredby,id',
            'refService' => 'nullable|string|max:255',
            'demande_id' => 'nullable|integer|exists:demandes,id',
        ]);

        $script->update($validated);

        return response()->json($script);
    }

    public function destroy(string $id)
    {
        $script = Script::findOrFail($id);
        $script->serveurs()->detach();
        $script->delete();

        return response()->json(['message' => 'Script deleted successfully']);
    }
}
