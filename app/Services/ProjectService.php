<?php

namespace App\Services;

use App\Domain\Projects\Models\Project;
use App\Domain\Projects\Repositories\ProjectRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class ProjectService
{
    /**
     * @var ProjectRepositoryInterface
     */
    private $projects;

    public function __construct(ProjectRepositoryInterface $projects)
    {
        $this->projects = $projects;
    }

    public function paginated(array $filters = [], $perPage = 15): LengthAwarePaginator
    {
        $cacheKey = $this->cacheKey('projects.paginated', $filters, $perPage);

        return Cache::remember($cacheKey, 60, function () use ($filters, $perPage) {
            return $this->projects->paginate($filters, $perPage);
        });
    }

    public function all(array $filters = []): Collection
    {
        $cacheKey = $this->cacheKey('projects.all', $filters);

        return Cache::remember($cacheKey, 60, function () use ($filters) {
            return $this->projects->all($filters);
        });
    }

    public function findBySlug(string $slug): ?Project
    {
        return $this->projects->findBySlug($slug);
    }

    public function create(array $data): Project
    {
        $project = $this->projects->create($data);

        $this->flushCaches();

        return $project;
    }

    public function update(Project $project, array $data): Project
    {
        $updated = $this->projects->update($project, $data);

        $this->flushCaches($project->slug);

        return $updated;
    }

    public function delete(Project $project): bool
    {
        $deleted = $this->projects->delete($project);

        $this->flushCaches($project->slug);

        return $deleted;
    }

    private function cacheKey(string $prefix, array $filters = [], $perPage = null): string
    {
        $encodedFilters = md5(json_encode([$filters, $perPage]));

        return $prefix . '.' . $encodedFilters;
    }

    private function flushCaches(string $slug = null): void
    {
        Cache::flush();

        if ($slug) {
            Cache::forget("project.{$slug}");
        }
    }
}
