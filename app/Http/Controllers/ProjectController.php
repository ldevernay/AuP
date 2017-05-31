<?php

namespace App\Http\Controllers;

use App\Repositories\ProjectRepository;
use App\Http\Requests\ProjectRequest;

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
		return view('project.create');
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
  		$user = $this->projectRepository->getById($id);

  		return view('project.show',  compact('project'));
  	}

  	public function edit($id)
  	{
  		$user = $this->projectRepository->getById($id);

  		return view('project.edit',  compact('project'));
  	}

  	public function update(ProjectRequest $request, $id)
  	{
  		$this->setAdmin($request);

  		$this->projectRepository->update($id, $request->all());

  		return redirect('project')->withOk("Le projet " . $request->input('name') . " a été modifié.");
  	}


}
