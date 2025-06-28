<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Http\Requests\StoreEtudiantRequest;
use App\Http\Requests\UpdateEtudiantRequest;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Accueil";
        $etudiants = Etudiant::all();
        return view('index', compact('title', 'etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Créer un Étudiant";
        $etudiant = new Etudiant([
            'nom' => NULL,
            'email' => NULL,
            'date_naissance' => NULL,
            'promotion' => NULL,
            'faculte = NULL'
        ]);
        return view('form', compact('title', 'etudiant'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEtudiantRequest $request)
    {
        Etudiant::create($request->validated());
        return redirect()
            ->route('etudiants.index')
            ->with('success', "Étudiant a été créé avec succès");
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        $title = "Éditer l'Étudiant " . $etudiant->nom;
        return view('form', compact('title', 'etudiant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEtudiantRequest $request, Etudiant $etudiant)
    {
        $etudiant->update($request->validated());
        return redirect()
            ->route('etudiants.index')
            ->with('success', "Étudiant a été modifié avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return back()->with('success', "Étudiant supprimé avec succès");
    }
}
