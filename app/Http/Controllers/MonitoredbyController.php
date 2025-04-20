<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monitoredby;

class MonitoredbyController extends Controller
{
    public function index() { return response()->json(Monitoredby::all()); }
    public function store(Request $request) {
        $request->validate(['nom' => 'nullable|string|max:255']);
        return response()->json(Monitoredby::create($request->only('nom')), 201);
    }
    public function show(string $id) {
        $monitored = Monitoredby::find($id);
        if (!$monitored) return response()->json(['message' => 'MonitoredBy non trouvé'], 404);
        return response()->json($monitored);
    }
    public function update(Request $request, string $id) {
        $monitored = Monitoredby::find($id);
        if (!$monitored) return response()->json(['message' => 'MonitoredBy non trouvé'], 404);
        $request->validate(['nom' => 'nullable|string|max:255']);
        $monitored->update($request->only('nom'));
        return response()->json($monitored);
    }
    public function destroy(string $id) {
        $monitored = Monitoredby::find($id);
        if (!$monitored) return response()->json(['message' => 'MonitoredBy non trouvé'], 404);
        $monitored->delete();
        return response()->json(['message' => 'MonitoredBy supprimé avec succès']);
    }
}
