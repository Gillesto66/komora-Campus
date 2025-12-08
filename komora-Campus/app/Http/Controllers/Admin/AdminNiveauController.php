<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Niveau;
use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminNiveauController extends Controller
{
    public function index()
    {
        $niveaux = Niveau::with('filiere')->latest()->paginate(20);
        $filieres = Filiere::orderBy('name')->get(); // Pour les selects

        return view('admin.niveau', compact('niveaux', 'filieres'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'filiere_id'  => 'required|exists:filieres,id',
        ]);

        $niveau = Niveau::create($data);

        Log::info('Niveau créé', ['id' => $niveau->id, 'name' => $niveau->name, 'filiere_id' => $niveau->filiere_id]);

        return redirect()->route('admin.niveaux.index')->with('success', 'Niveau ajouté avec succès');
    }

    public function update(Request $request, Niveau $niveau)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        $niveau->update($data);

        Log::info('Niveau modifié', ['id' => $niveau->id, 'name' => $data['name']]);

        return redirect()->route('admin.niveaux.index')->with('success', 'Niveau mis à jour');
    }

    public function destroy(Niveau $niveau)
    {
        // Optionnel : tu peux ajouter une vérif si le niveau a des matières
        // if ($niveau->matieres()->exists()) { ... }

        $niveau->delete();

        Log::info('Niveau supprimé', ['id' => $niveau->id]);

        return back()->with('success', 'Niveau supprimé');
    }
}