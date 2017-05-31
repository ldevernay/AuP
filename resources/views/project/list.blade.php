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
					@if(Auth::check() and Auth::user()->admin)
						{!! Form::open(['method' => 'DELETE', 'route' => ['project.destroy', $project->id]]) !!}
							{!! Form::submit('Supprimer ce projet', ['class' => 'btn btn-danger btn-xs ', 'onclick' => 'return confirm(\'Vraiment supprimer ce projet ?\')']) !!}
						{!! Form::close() !!}
					@endif
					<em class="pull-right">
						<span class="glyphicon glyphicon-pencil"></span> {{ $project->user->name }} le {!! $project->created_at->format('d-m-Y') !!}
					</em>
				</section>
			</div>
		</article>
		<br>
	@endforeach
	{!! $links !!}
@endsection
