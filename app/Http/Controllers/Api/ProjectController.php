<?php

namespace App\Http\Controllers\Api;

use App\Domain\Projects\Models\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    /**
     * @var ProjectService
     */
    private $projects;

    public function __construct(ProjectService $projects)
    {
        $this->projects = $projects;
    }

    public function index(Request $request)
    {
        $filters = $request->only(['catalog_letter', 'project_type', 'featured', 'search']);
        $perPage = $request->get('per_page', 15);

        $paginator = $this->projects->paginated($filters, $perPage);

        return response()->json([
            'data' => $paginator->getCollection()->map(function (Project $project) {
                return $this->transformProject($project);
            }),
            'meta' => [
                'current_page' => $paginator->currentPage(),
                'last_page' => $paginator->lastPage(),
                'per_page' => $paginator->perPage(),
                'total' => $paginator->total(),
            ],
        ]);
    }

    public function store(ProjectStoreRequest $request)
    {
        $project = $this->projects->create($request->validated());

        return response()->json(['data' => $this->transformProject($project)], Response::HTTP_CREATED);
    }

    public function show(Project $project)
    {
        return response()->json(['data' => $this->transformProject($project)]);
    }

    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $updated = $this->projects->update($project, $request->validated());

        return response()->json(['data' => $this->transformProject($updated)]);
    }

    public function destroy(Project $project)
    {
        $this->projects->delete($project);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    private function transformProject(Project $project): array
    {
        return [
            'slug' => $project->slug,
            'name' => $project->name,
            'project_type' => $project->project_type,
            'catalog_letter' => $project->catalog_letter,
            'homepage_url' => $project->homepage_url,
            'repository_url' => $project->repository_url,
            'credit_name' => $project->credit_name,
            'credit_url' => $project->credit_url,
            'description' => $project->description,
            'is_featured' => (bool) $project->is_featured,
            'created_at' => $project->created_at,
            'updated_at' => $project->updated_at,
        ];
    }
}
