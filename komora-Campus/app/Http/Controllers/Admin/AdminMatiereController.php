<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matiere;
use App\Models\Niveau;
use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminMatiereController extends Controller
{
    public function index()
    {
        $matieres = Matiere::with(['niveau.filiere'])->latest()->paginate(20);
        $filieres = Filiere::with('niveaux')->orderBy('name')->get();

        return view('admin.matiere', compact('matieres', 'filieres'));
    }

    // Pour AJAX : retourne les niveaux d'une filière
    public function niveauxByFiliere($filiere_id)
    {
        $niveaux = Niveau::where('filiere_id', $filiere_id)->orderBy('name')->get(['id', 'name']);
        return response()->json($niveaux);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'niveau_id'  => 'required|exists:niveaux,id',
            'semester'   => 'required|in:S1,S2',
        ]);

        $matiere = Matiere::create($data);

        Log::info('Matière créée', [
            'id' => $matiere->id,
            'name' => $matiere->name,
            'niveau_id' => $matiere->niveau_id,
            'semester' => $matiere->semester
        ]);

        return redirect()->route('admin.matieres.index')->with('success', 'Matière ajoutée');
    }

    public function update(Request $request, Matiere $matiere)
    {
        $data = $request->validate([
            'name'      => 'required|string|max:255',
            'niveau_id' => 'required|exists:niveaux,id',
            'semester'  => 'required|in:S1,S2',
        ]);

        $matiere->update($data);

        Log::info('Matière modifiée', ['id' => $matiere->id, 'name' => $data['name']]);

        return redirect()->route('admin.matieres.index')->with('success', 'Matière mise à jour');
    }

    public function destroy(Matiere $matiere)
    {
        $matiere->delete();
        Log::info('Matière supprimée', ['id' => $matiere->id]);

        return back()->with('success', 'Matière supprimée');
    }
}