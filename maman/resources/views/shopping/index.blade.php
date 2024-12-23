<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* Styles généraux */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9fafc;
}

h1 {
    text-align: center;
    color: #2c3e50;
    margin-top: 20px;
}

/* Bouton Ajouter Nouvelle Liste */
.btn-primary {
    display: block;
    width: fit-content;
    margin: 20px auto;
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    background-color: #3498db;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    text-align: center;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #2980b9;
}

/* Alertes de succès */
.alert-success {
    text-align: center;
    color: #155724;
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    border-radius: 5px;
    padding: 10px;
    margin: 20px auto;
    width: 80%;
}

/* Liste des courses */
ul {
    list-style: none;
    padding: 0;
    margin: 20px auto;
    max-width: 600px;
}

li {
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 10px;
    padding: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

li strong {
    font-size: 16px;
    color: #2c3e50;
}

/* Liens Modifier */
li a {
    text-decoration: none;
    color: #f39c12;
    margin-right: 10px;
    transition: color 0.3s;
}

li a:hover {
    color: #e67e22;
}

/* Bouton Supprimer */
.btn-danger {
    background-color: #e74c3c;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-danger:hover {
    background-color: #c0392b;
}

form {
    display: inline;
}

/* Responsive */
@media (max-width: 600px) {
    li {
        flex-direction: column;
        align-items: flex-start;
    }

    li a, .btn-danger {
        margin-top: 10px;
    }
}

</style>
<body>
    
<h1>🛒 Listes de Courses</h1>
<a href="{{ route('shopping-lists.create') }}" class="btn btn-primary">➕ Nouvelle Liste</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<ul>
    @foreach ($lists as $list)
        <li>
            <strong>{{ $list->title }}</strong> - {{ $list->items }}
            <a href="{{ route('shopping-lists.edit', $list->id) }}">✏️ Modifier</a>
            <form action="{{ route('shopping-lists.destroy', $list->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">🗑️ Supprimer</button>
            </form>
        </li>
    @endforeach
</ul>

</body>
</html>
