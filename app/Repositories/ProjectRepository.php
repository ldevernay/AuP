<?php

namespace App\Repositories;

use App\Project;

class ProjectRepository
{

    protected $post;

    public function __construct(Project $project)
	{
		$this->project = $project;
	}

	public function getPaginate($n)
	{
		return $this->project->with('user')
		->orderBy('projects.created_at', 'desc')
		->paginate($n);
	}

	public function store($inputs)
	{
		$this->project->create($inputs);
	}

	public function destroy($id)
	{
		$this->project->findOrFail($id)->delete();
	}

}
