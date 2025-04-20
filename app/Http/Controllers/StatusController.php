<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
class StatusController extends Controller
{
    public function index() { return response()->json(Status::all()); }
    public function store(Request $request) {
        $request->validate(['nom' => 'nullable|string|max:255']);
        return response()->json(Status::create($request->only('nom')), 201);
    }
    public function show(string $id) {
        $status = Status::find($id);
        if (!$status) return response()->json(['message' => 'Status non trouvé'], 404);
        return response()->json($status);
    }
    public function update(Request $request, string $id) {
        $status = Status::find($id);
        if (!$status) return response()->json(['message' => 'Status non trouvé'], 404);
        $request->validate(['nom' => 'nullable|string|max:255']);
        $status->update($request->only('nom'));
        return response()->json($status);
    }
    public function destroy(string $id) {
        $status = Status::find($id);
        if (!$status) return response()->json(['message' => 'Status non trouvé'], 404);
        $status->delete();
        return response()->json(['message' => 'Status supprimé avec succès']);
    }
}
