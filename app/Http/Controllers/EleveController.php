<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEleveRequest;
use App\Http\Requests\UpdateEleveRequest;
use App\Models\Eleve;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eleves =  Eleve::query()
        ->when(request()->input('search'),function($query, $search){
            $query->where('prenom', 'like', "%{$search}%");
        })
        ->when(request()->has('column'), function($query){
            $query->orderBy(request()->input('column'), request()->input('direction'));
        })
        ->paginate(10)
        ->appends(request()->all());
        return $eleves;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEleveRequest $request)
    {
        $nEleve = new Eleve();
        $nEleve->prenom = $request->prenom;
        $nEleve->nom = $request->nom;
        $nEleve->naissance = $request->naissance;
        $nEleve->mail = $request->mail;
        $nEleve->password = sha1($request->password);
        $nEleve->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Eleve $eleve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Eleve $eleve)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEleveRequest $request, Eleve $eleve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eleve $eleve)
    {
        //
    }
}
