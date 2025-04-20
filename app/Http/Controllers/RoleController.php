<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
class RoleController extends Controller
{
    public function index() { return response()->json(Role::all()); }
    public function store(Request $request) {
        $request->validate(['role' => 'nullable|string|max:255']);
        return response()->json(Role::create($request->only('role')), 201);
    }
    public function show(string $id) {
        $role = Role::find($id);
        if (!$role) return response()->json(['message' => 'Rôle non trouvé'], 404);
        return response()->json($role);
    }
    public function update(Request $request, string $id) {
        $role = Role::find($id);
        if (!$role) return response()->json(['message' => 'Rôle non trouvé'], 404);
        $request->validate(['role' => 'nullable|string|max:255']);
        $role->update($request->only('role'));
        return response()->json($role);
    }
    public function destroy(string $id) {
        $role = Role::find($id);
        if (!$role) return response()->json(['message' => 'Rôle non trouvé'], 404);
        $role->delete();
        return response()->json(['message' => 'Rôle supprimé avec succès']);
    }
}
