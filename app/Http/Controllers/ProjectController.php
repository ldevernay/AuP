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
		$this->middleware('auth', ['except' => 'index']);
		$this->middleware('admin', ['only' => 'destroy']);

		$this->projectRepository = $projectRepository;
	}

	public function index()
	{
		$posts = $this->projectRepository->getPaginate($this->nbrPerPage);
		$links = $posts->render();

		return view('projects.liste', compact('projects', 'links'));
	}

	public function create()
	{
		return view('projects.add');
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

}
