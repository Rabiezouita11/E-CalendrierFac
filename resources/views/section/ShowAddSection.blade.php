<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
<h2 class="text-center">Ajouter Groupe</h2>
<form action="{{route('AjoutSection')}}" method="post" >
 <input type="hidden" name="_token" value="{{ Session::token() }}">
 <div class="form-group">
          <label>Nom du section</label>
          
          <select name="section"  class="form-control">

@foreach($sections as $cat)

<option value="{{$cat->nom}}">  {{ $cat->nom }}</option>
@endforeach

</select>
 </div>
 <div class="form-group">
 <label>Niveaux</label>
          
          <select name="niveaux"  class="form-control">

@foreach($niveaux as $chat)

<option value="{{$chat->nom}}">  {{ $chat->nom }}</option>
@endforeach

</select>
 </div>
 <div class="form-group">
 <label>Nom du groupe</label>
          
	<input class="form-control" type="text" name="nom"  required>
 </div>
 <a href="{{route('section')}}" class="btn btn-default">Annuler</a>
 <button type="submit" class="btn btn-success pull-right">Ajouter</button>
</form></body>
</html>

