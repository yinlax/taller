<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

use App\Http\Requests\UsuarioRequest;
use App\Models\Role;

class UsuarioController extends Controller
{

    public function index(Request $request)
    {
        $query = Usuario::query();

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where('nombre', 'LIKE', "%{$searchTerm}%")
                ->orWhere('email', 'LIKE', "%{$searchTerm}%");
        }

        $usuarios = $query->get();

        return view('usuario.index', compact('usuarios'));
    }


    public function create()
    {
        $roles = Role::all(); 
        return view('usuario.create', compact('roles'));
    }


    public function store(UsuarioRequest $request)
    {

        if ($request->password !== $request->password_confirmation) {
            return back()->withErrors(['password' => 'Las contraseñas no coinciden.']);
        }
        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => bcrypt($request->password), 
            'id_rol' => $request->rol, 
            'estado' => 'Activo',  
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente');
    }

    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuario.show', compact('usuario'));
    }

        public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuario.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:usuarios,email,' . $id . ',id_usuario', 
            'password' => 'nullable|min:8|confirmed',
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->estado = $request->estado;

        if ($request->filled('password')) {
            $usuario->password = bcrypt($request->password);
        }

        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

}
