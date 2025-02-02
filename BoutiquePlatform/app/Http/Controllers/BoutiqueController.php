<?php
namespace App\Http\Controllers;
use App\Models\Boutique;
use Illuminate\Http\Request;
use Illuminate\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;


class BoutiqueController extends Controller
{
    public function create()
    {
        return view('boutique.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:boutiques,nom|max:255',
        ]);

        $boutique = Boutique::create([
            'nom' => Str::slug($request->nom),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('boutique.show', $boutique->nom);
    }

    public function show($nom)
    {
        $boutique = Boutique::where('nom', $nom)->firstOrFail();
        $user = $boutique->user;

        return response()->json([
            'nom' => $user->name,
            'email' => $user->email,
            'age' => $user->age,
        ]);
    }
}
