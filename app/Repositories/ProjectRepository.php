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
    $project = $this->project->findOrFail($id);
    $project->language->detach();
    $project->delete();
  }

  public function getById($id)
  {
    return $this->project->findOrFail($id);
  }

  public function update($id, Array $inputs)
  {
    $this->getById($id)->update($inputs);
  }

  private function queryWithUserAndLanguages()
  {
    return $this->project->with('user', 'language')
    ->orderBy('projects.created_at', 'desc');
  }

  public function getWithUserAndLanguagesPaginate($n)
  {
    return $this->queryWithUserAndLanguages()->paginate($n);
  }

  public function getWithUserAndLanguageForLanguagePaginate($language_id, $n)
  {
    return $this->queryWithUserAndLanguages()
    ->whereHas('language', function($q) use ($language_id)
    {
      $q->where('language_id', $language_id);
    })->paginate($n);
  }


}
