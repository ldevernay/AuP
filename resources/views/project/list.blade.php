@extends('template')

@section('header')
	@if(Auth::check())
		<div class="btn-group pull-right">
			{!! link_to_route('project.create', 'Créer un projet', [], ['class' => 'btn btn-info']) !!}
			{!! link_to('logout', 'Deconnexion', ['class' => 'btn btn-warning']) !!}
		</div>
	@else
		{!! link_to('login', 'Se connecter', ['class' => 'btn btn-info pull-right']) !!}
	@endif
@endsection

@section('contenu')
	@if(isset($info))
		<div class="row alert alert-info">{{ $info }}</div>
	@endif
	{!! $links !!}
	@foreach($projects as $project)
		<article class="row bg-primary">
			<div class="col-md-12">
				<header>
					<h1>{{ $project->name }}</h1>
				</header>
				<hr>
				<section>
					<p>{{ $project->pitch }}</p>
  				<p>{{ $project->github }}</p>
  				{!! link_to('project/language/' . $project->language->id, $project->language->name,	['class' => 'btn btn-xs btn-info']) !!}
					<em class="pull-right">
					{!! link_to_route('project.show', 'Voir', [$project->id], ['class' => 'btn btn-success btn-block']) !!}
					{!! link_to_route('project.edit', 'Modifier', [$project->id], ['class' => 'btn btn-warning btn-block']) !!}
						{!! Form::open(['method' => 'DELETE', 'route' => ['project.destroy', $project->id]]) !!}
							{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce projet ?\')']) !!}
						{!! Form::close() !!}
						<span class="glyphicon glyphicon-pencil"></span> {{ $project->user->name }} le {!! $project->created_at->format('d-m-Y') !!}
					</em>
				</section>
			</div>
		</article>
		<br>
	@endforeach
	{!! $links !!}
	<a href="javascript:history.back()" class="btn btn-primary">
    <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
  </a>
@endsection
