@extends ('layouts.app')

@section('content')
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title> Liste des compétences</title>
</head>
<body>
<h1> Utilisateurs </h1>

<table>
  <tr>
      <th>id</th> 
      <th>name</th>
      <th>email</th>
      <th>skills</th>
      <th>level</th>
  </tr>
  <tr>
      <td> {{ $users -> id }} </td>
      <td> {{ $users -> name }} </td>
      <td> {{ $users -> email }} </td>
  
    @foreach ($users->skills as $skill)
      <td> {{ $skill -> name }} </td>
      <td> {{ $skill->pivot -> level }}  </td>
    @endforeach
      <br>
  </tr>
 
</table> 

<a href="{{ route('skill_user') }}">Ajouter une competence</a>
</body>
</html>
@endsection