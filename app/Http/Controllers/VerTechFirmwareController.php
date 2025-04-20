<?php

namespace App\Http\Controllers;

use App\Models\VerTechFirmware;
use Illuminate\Http\Request;

class VerTechFirmwareController extends Controller
{
    public function index()
    {
        return response()->json(VerTechFirmware::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        $firmware = VerTechFirmware::create($request->only('nom'));

        return response()->json($firmware, 201);
    }

    public function show($id)
    {
        return response()->json(VerTechFirmware::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $firmware = VerTechFirmware::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        $firmware->update($request->only('nom'));

        return response()->json($firmware);
    }

    public function destroy($id)
    {
        VerTechFirmware::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}
