@extends('template')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">
			<div class="panel-heading">Modification d'un projet</div>
			<div class="panel-body">
				<div class="col-sm-12">
					{!! Form::model($project, ['route' => ['project.update', $project->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
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
						{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@endsection
