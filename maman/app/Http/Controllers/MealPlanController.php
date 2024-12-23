<?php

namespace App\Http\Controllers;

use App\Models\MealPlan;
use Illuminate\Http\Request;

class MealPlanController extends Controller
{
    // Affiche le calendrier
    public function index()
    {
        return view('mealplans.index');
    }

    // Affiche les détails d'un jour spécifique
    public function show($date)
    {
        $mealPlan = MealPlan::firstOrCreate(['date' => $date]);

        return view('mealplans.show', compact('mealPlan'));
    }

    // Met à jour les repas pour une date donnée
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'lunch' => 'nullable|string|max:255',
            'dinner' => 'nullable|string|max:255',
        ]);

        $mealPlan = MealPlan::findOrFail($id);
        $mealPlan->update($validated);

        return redirect()->route('meal-plans.show', $mealPlan->date)
                         ->with('success', 'Repas mis à jour avec succès.');
    }
}
