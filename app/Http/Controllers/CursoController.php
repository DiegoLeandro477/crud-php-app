<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursoRequest;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::all();
        return view("curso.index", compact("cursos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("curso.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CursoRequest $request)
    {
        $curso = Curso::create([
            'name'=> $request->name,
            'description'=> $request->description,
        ]);

        if ($curso){
            return redirect()->route('curso.index')->with('success','Curso cadastrado com Sucesso');
        } else {
            return redirect()->route('curso.index')->with('error','Não foi possível cadastar a eletiva');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {   
        return view('curso.update', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CursoRequest $request, Curso $curso)
    {
        $cursoAtualizado = $curso->update([
            'name'=> $request->name,
            'description'=> $request->description,
        ]);

        if ($cursoAtualizado){
            return redirect()->route('curso.index')->with('success','Curso atualizado com Sucesso');
        } else {
            return redirect()->route('curso.index')->with('error','Não foi possível atualizar os dados da eletiva');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();


        if ($curso){
            return redirect()->route('curso.index')->with('success','Curso deletado com Sucesso');
        } else {
            return redirect()->route('curso.index')->with('error','Não foi possível deletar a eletiva');
        }
    }
}
