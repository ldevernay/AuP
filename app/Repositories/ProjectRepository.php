<?php

namespace App\Repositories;

use App\Project;

class ProjectRepository
{

  protected $project;

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

  public function getById($id)
	{
		return $this->project->findOrFail($id);
	}

  public function update($id, Array $inputs)
	{
		$this->getById($id)->update($inputs);
	}


}
