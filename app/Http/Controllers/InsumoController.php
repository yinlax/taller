<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use App\Models\Categoria;
use Illuminate\Http\Request;

class InsumoController extends Controller
{
    public function index()
    {
        $insumos = Insumo::all();
        return view('insumos.index', compact('insumos'));
    }

    public function create()
    {
        return view('insumos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'cantidad' => 'required|numeric',
            'unidad' => 'nullable|string|max:10',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagenPath = null;
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('insumos', 'public');
        }

        Insumo::create([
            'nombre' => $request->nombre,
            'cantidad' => $request->cantidad,
            'unidad' => $request->unidad,
            'imagen' => $imagenPath,
        ]);

        return redirect()->route('insumos.index')->with('success', 'Insumo creado exitosamente.');
    }

    public function show($id)
    {
        $insumo = Insumo::where('id_insumo', $id)->firstOrFail();
        return view('insumos.show', compact('insumo'));
    }

    public function edit($id)
    {
        $insumo = Insumo::where('id_insumo', $id)->firstOrFail();
        return view('insumos.edit', compact('insumo'));
    }

    public function update(Request $request, $id)
    {
        $insumo = Insumo::where('id_insumo', $id)->firstOrFail();
        $insumo->update([
            'nombre' => $request->nombre,
            'cantidad' => $request->cantidad,
            'unidad' => $request->unidad,
            'imagen' => $request->imagen,
        ]);

        return redirect()->route('insumos.index')->with('success', 'Insumo actualizado con éxito');
    }

}
