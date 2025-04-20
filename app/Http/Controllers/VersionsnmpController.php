<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Versionsnmp;
class VersionsnmpController extends Controller
{public function index() { return response()->json(Versionsnmp::all()); }
public function store(Request $request) {
    $request->validate(['nom' => 'nullable|string|max:255']);
    return response()->json(Versionsnmp::create($request->only('nom')), 201);
}
public function show(string $id) {
    $version = Versionsnmp::find($id);
    if (!$version) return response()->json(['message' => 'Version SNMP non trouvée'], 404);
    return response()->json($version);
}
public function update(Request $request, string $id) {
    $version = Versionsnmp::find($id);
    if (!$version) return response()->json(['message' => 'Version SNMP non trouvée'], 404);
    $request->validate(['nom' => 'nullable|string|max:255']);
    $version->update($request->only('nom'));
    return response()->json($version);
}
public function destroy(string $id) {
    $version = Versionsnmp::find($id);
    if (!$version) return response()->json(['message' => 'Version SNMP non trouvée'], 404);
    $version->delete();
    return response()->json(['message' => 'Version SNMP supprimée avec succès']);
}
}
