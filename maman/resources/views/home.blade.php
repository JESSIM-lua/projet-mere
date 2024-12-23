@extends('layouts.app')

@section('content')
<h1>Bienvenue dans l'Application ! 🎉</h1>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-danger">Déconnexion</button>
</form>
@endsection
