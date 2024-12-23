<style>/* Styles généraux */
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

/* Formulaires (Modification et Création) */
form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

form div {
    margin-bottom: 15px;
}

form label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

form input[type="text"],
form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

form textarea {
    resize: vertical;
    height: 100px;
}

form button {
    display: block;
    width: 100%;
    padding: 10px;
    font-size: 16px;
    color: #fff;
    background-color: #2ecc71;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

form button:hover {
    background-color: #27ae60;
}

/* Bouton spécial pour Création */
.btn-success {
    background-color: #28a745;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    padding: 10px 20px;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-success:hover {
    background-color: #218838;
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

    form {
        padding: 15px;
    }
}
</style>
<h1>➕ Créer une Liste</h1>

<form method="POST" action="{{ route('shopping-lists.store') }}">
    @csrf
    <div>
        <label for="title">Titre :</label>
        <input type="text" name="title" id="title" required>
    </div>
    <div>
        <label for="items">Articles :</label>
        <textarea name="items" id="items" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Créer</button>
</form>

