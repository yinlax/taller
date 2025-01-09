<?php
namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClienteController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user_id = Session::get('usuario_id');
            if (!$user_id) {
                return redirect()->route('login');
            }
            return $next($request);
        });
    }
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        Cliente::create($request->all());
        return redirect()->route('clientes.index');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('clientes.index');
    }
    
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index');
    }


}
