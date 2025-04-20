<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Support;
class SupportController extends Controller
{
    public function index() { return response()->json(Support::all()); }
    public function store(Request $request) {
        $request->validate(['support' => 'nullable|string|max:255']);
        return response()->json(Support::create($request->only('support')), 201);
    }
    public function show(string $id) {
        $support = Support::find($id);
        if (!$support) return response()->json(['message' => 'Support non trouvé'], 404);
        return response()->json($support);
    }
    public function update(Request $request, string $id) {
        $support = Support::find($id);
        if (!$support) return response()->json(['message' => 'Support non trouvé'], 404);
        $request->validate(['support' => 'nullable|string|max:255']);
        $support->update($request->only('support'));
        return response()->json($support);
    }
    public function destroy(string $id) {
        $support = Support::find($id);
        if (!$support) return response()->json(['message' => 'Support non trouvé'], 404);
        $support->delete();
        return response()->json(['message' => 'Support supprimé avec succès']);
    }
}
