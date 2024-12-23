@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">🍲 Repas du {{ $mealPlan->date }}</h1>

<form method="POST" action="{{ route('meal-plans.update', $mealPlan->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="lunch" class="block font-bold">Déjeuner :</label>
        <input type="text" name="lunch" value="{{ $mealPlan->lunch }}" class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label for="dinner" class="block font-bold">Dîner :</label>
        <input type="text" name="dinner" value="{{ $mealPlan->dinner }}" class="w-full border rounded p-2">
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Enregistrer</button>
</form>

<a href="{{ route('meal-plans.index') }}" class="text-blue-500 mt-4 block">⬅️ Retour au calendrier</a>
@endsection
