@extends('template')

@section('contenu')
	<br>
	<div class="col-sm-offset-3 col-sm-6">
		<div class="panel panel-info">
			<div class="panel-heading">Ajout d'un projet</div>
			<div class="panel-body">
				{!! Form::open(['route' => 'project.store']) !!}
					<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
						{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
						{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('pitch') ? 'has-error' : '' !!}">
						{!! Form::textarea ('pitch', null, ['class' => 'form-control', 'placeholder' => 'Pitch']) !!}
						{!! $errors->first('pitch', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('github') ? 'has-error' : '' !!}">
						{!! Form::text ('github', null, ['class' => 'form-control', 'placeholder' => 'Lien Github']) !!}
						{!! $errors->first('github', '<small class="help-block">:message</small>') !!}
					</div>
					{!! Form::submit('En avant!', ['class' => 'btn btn-info pull-right']) !!}
				{!! Form::close() !!}
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@endsection
