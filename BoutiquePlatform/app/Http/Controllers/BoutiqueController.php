<?php
namespace App\Http\Controllers;

use App\Models\Boutique;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BoutiqueController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:boutiques,nom|max:255',
        ]);

        // Création de la boutique
        $boutique = Boutique::create([
            'nom' => Str::slug($request->nom),
            'user_id' => Auth::id(),
        ]);

        // Rediriger vers le sous-domaine
        return redirect()->route('boutique.show', ['boutique' => $boutique->nom]);
    }

    public function show($boutique)
    {
        $boutique = Boutique::where('nom', $boutique)->firstOrFail();
        $user = $boutique->user;

        return response()->json([
            'nom' => $user->name,
            'email' => $user->email,
            'age' => $user->age,
        ]);
    }
}
