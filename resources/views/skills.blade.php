@extends ('layouts.app')

@section('content')
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Liste des competences</title>
</head>
<body>
<h1> Competences</h1>
<table>
    @foreach ($skills as $skill)
    <tr>
        <td>
            <ul>
                <li> {{ $skill -> name}} </li>
                <li> {{ $skill -> id}} </li>
            </ul>
        </td>
        <td> <a href="/skill_user/{{$skill->id}} "> Ajouter </a> </td>
        

    </tr>
    @endforeach
    
</table>
    <form action="update" method="POST">
        @csrf
        <input type="text" name="id" placeholder="id de la competence"><br><br>
        <input type="text" name="level" placeholder="Niveau entre 1 et 5 "><br><br>
        <button type="submit"> Modifier </button>
        </form>
        <br>
    <form action="delete" method="POST">
        @csrf
        <input type="text" name="id" placeholder="id de la competence"><br><br>
        <button type="submit"> Supprimer </button>
        </form>

</body>
</html>
@endsection