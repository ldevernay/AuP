<?php

namespace App\Http\Controllers;

use App\Repositories\ProjectRepository;
use App\Http\Requests\ProjectRequest;
use App\Language;

use DB;
use Auth;

class ProjectController extends Controller
{

  protected $projectRepository;

  protected $nbrPerPage = 4;

  public function __construct(ProjectRepository $projectRepository)
  {
    $this->middleware('auth', ['except' => 'project.index']);
    $this->middleware('admin', ['only' => 'project.destroy']);

    $this->projectRepository = $projectRepository;
  }

  public function index()
  {
    $projects = $this->projectRepository->getPaginate($this->nbrPerPage);
    $links = $projects->render();

    return view('project.list', compact('projects', 'links'));
  }

  public function create()
  {
    $languages = Language::pluck('name', 'id');
    return view('project.create', ['languages'=> $languages]);
  }

  public function store(ProjectRequest $request)
  {
    $inputs = array_merge($request->all(), ['creator_id' => $request->user()->id]);

    $this->projectRepository->store($inputs);

    return redirect(route('project.index'));
  }

  public function destroy($id)
  {
    $this->projectRepository->destroy($id);

    return redirect()->back();
  }

  public function show($id)
  {
    $user = Auth::user();
    $project = $this->projectRepository->getById($id);

    return view('project.show',  compact('project', 'user'));
  }

  public function join($project_id)
  {
    $user = Auth::user();
    DB::table('project_user')->insert(array(
      'project_id' => $project_id,
      'user_id' => $user->id
    ));

    $project = $this->projectRepository->getById($project_id);

    return view('project.show',  compact('project', 'user'));
  }

  public function quit($project_id)
  {
    $user = Auth::user();
    DB::table('project_user')->where(
      'project_id','=',$project_id,
      'AND user_id','=',$user->id
    )->delete();

    $project = $this->projectRepository->getById($project_id);

    return view('project.show',  compact('project', 'user'));
  }

  public function edit($id)
  {
    $project = $this->projectRepository->getById($id);

    return view('project.edit',  compact('project'));
  }

  public function update(ProjectRequest $request, $id)
  {

    $this->projectRepository->update($id, $request->all());

    return redirect('project')->withOk("Le projet " . $request->input('name') . " a été modifié.");
  }

  public function indexLanguage($language_id)
  {
    $projects = $this->projectRepository->getWithUserAndLanguageForLanguagePaginate($language_id, $this->nbrPerPage);
    $links = $projects->render();

    return view('project.list', compact('projects', 'links'))
    ->with('info', 'Résultats pour la recherche');
  }

}
