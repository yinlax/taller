<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:30',
            'descripcion' => 'nullable|string|max:100',
            'precio' => 'required|numeric',
            'id_categoria' => 'nullable|exists:categorias,id_categoria',
            'estado' => 'nullable|in:Activo,Inactivo',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $imagenPath = null;
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('productos', 'public');
        }

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'id_categoria' => $request->id_categoria,
            'estado' => $request->estado ?? 'Activo', 
            'imagen' => $imagenPath, 
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all(); 
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:30',
            'descripcion' => 'nullable|string|max:100',
            'precio' => 'required|numeric',
            'id_categoria' => 'nullable|exists:categorias,id_categoria',
            'estado' => 'nullable|in:Activo,Inactivo',
        ]);

        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'id_categoria' => $request->id_categoria,
            'estado' => $request->estado ?? 'Activo', 
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }
}
