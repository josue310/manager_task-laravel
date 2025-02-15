<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tache;

class tacheController extends Controller
{
    public function liste_tache()
    {
        $taches = Tache::all();
        return view('tache.liste', compact('taches'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required',
            'description' => 'required'
        ]);

        $tache = Tache::create([
            'nomTache' => $validated['titre'],
            'descriptionTache' => $validated['description']
        ]);

        if ($tache) {
            return redirect()->route('tache.liste')->with('success', 'Super 😁 Tâche crée avec succès !');
        } else {
            redirect()->route('tache.liste')->with('error', "Echec de la création 👎🏿");
        }
    }

    public function destroy(Request $request)
    {
        $tache = Tache::find($request->idTache);

        if (!$tache) {
            return redirect()->route('tache.liste')->with('error', "Tâche introuvable ❌");
        }

        if ($tache->delete()) {
            return redirect()->route('tache.liste')->with('success', 'Super 😁 Tâche supprimée avec succès !');
        }

        return redirect()->route('tache.liste')->with('error', "Échec de la suppression 👎🏿");
    }

    public function edit($idTache)
    {
        $tache = Tache::find($idTache);

        if (!$tache) {
            return redirect()->route('tache.liste')->with('error', "Tâche introuvable ❌");
        }

        return view('tache.modifier', compact('tache'));
    }


    public function update(Request $request)
    {
        $tache = Tache::find($request->idTache);

        if (!$tache) {
            return redirect()->route('tache.liste')->with('error', "Tâche introuvable ❌");
        }

        $tache->nomTache = $request->titre;
        $tache->descriptionTache = $request->description;

        if ($tache->save()) {
            return redirect()->route('tache.liste')->with('success', "Tâche mise à jour avec succès ✅");
        }

        return redirect()->route('tache.liste')->with('error', "Échec de la mise à jour 👎🏿");
    }
}
