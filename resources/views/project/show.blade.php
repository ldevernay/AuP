@extends('template')

@section('contenu')
<div class="col-sm-offset-4 col-sm-4">
  <br>
  <div class="panel panel-primary">
    <div class="panel-heading">Fiche du projet {{ $project->name }}</div>
    <div class="panel-body">
      <p>Pitch : {{ $project->pitch }}</p>
      <p>Nom : {{ $project->github }}</p>
      <p>Créateur : {{ $project->user->name }}</p>
      <p>Langage : {{ $project->language->name }}</p>
      @foreach($project->devs as $dev)
      <p>Dev : {{ $dev->name }}</p>
      @endforeach
      @if(in_array($user, $project->devs->toArray()))
      {!! link_to('project/quit/' . $project->id, 'Quitter',	['class' => 'btn btn-xs btn-info']) !!}
      @else
      {!! link_to('project/join/' . $project->id, 'Rejoindre',	['class' => 'btn btn-xs btn-info']) !!}
      @endif
    </div>
  </div>
  <a href="javascript:history.back()" class="btn btn-primary">
    <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
  </a>
</div>
@endsection
