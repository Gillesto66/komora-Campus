<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AdminFiliereController extends Controller
{
    public function index()
    {
        $filieres = Filiere::latest()->paginate(15);
        return view('admin.filiere', compact('filieres'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255|unique:filieres,name',
            'description' => 'required|string',
            'emblem'      => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
        ]);

        $data['emblem'] = $request->file('emblem')->store('filieres', 'public');

        $filiere = Filiere::create($data);

        Log::info('Filière créée', ['id' => $filiere->id, 'name' => $filiere->name]);

        return redirect()->route('admin.filieres.index')->with('success', 'Filière ajoutée avec succès');
    }

    public function update(Request $request, Filiere $filiere)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255|unique:filieres,name,' . $filiere->id,
            'description' => 'required|string',
            'emblem'      => 'sometimes|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
        ]);

        if ($request->hasFile('emblem')) {
            Storage::disk('public')->delete($filiere->emblem);
            $data['emblem'] = $request->file('emblem')->store('filieres', 'public');
            Log::info('Emblem mis à jour', ['filiere_id' => $filiere->id]);
        }

        $filiere->update($data);

        Log::info('Filière modifiée', ['id' => $filiere->id]);

        return redirect()->route('admin.filieres.index')->with('success', 'Filière modifiée');
    }

    public function destroy(Filiere $filiere)
    {
        if ($filiere->emblem) {
            Storage::disk('public')->delete($filiere->emblem);
        }
        $filiere->delete();

        Log::info('Filière supprimée', ['id' => $filiere->id]);

        return back()->with('success', 'Filière supprimée');
    }
}