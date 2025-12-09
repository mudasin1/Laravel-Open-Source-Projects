<?php

namespace App\Domain\Projects\Repositories;

use App\Domain\Projects\Models\Project;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class EloquentProjectRepository implements ProjectRepositoryInterface
{
    /**
     * @var Project
     */
    private $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function paginate(array $filters = [], $perPage = 15): LengthAwarePaginator
    {
        $query = $this->project->newQuery()->orderBy('name');

        $this->applyFilters($query, $filters);

        $perPage = $this->sanitizePageSize($perPage);

        return $query->paginate($perPage);
    }

    public function all(array $filters = []): Collection
    {
        $query = $this->project->newQuery()->orderBy('name');

        $this->applyFilters($query, $filters);

        return $query->get();
    }

    public function findBySlug(string $slug): ?Project
    {
        return $this->project->newQuery()->where('slug', $slug)->first();
    }

    public function create(array $data): Project
    {
        $data['slug'] = $this->resolveSlug($data);
        $data['catalog_letter'] = isset($data['catalog_letter'])
            ? strtoupper($data['catalog_letter'])
            : null;

        return $this->project->create($data);
    }

    public function update(Project $project, array $data): Project
    {
        if (!empty($data['name']) && empty($data['slug'])) {
            $data['slug'] = $this->resolveSlug($data);
        }

        if (isset($data['catalog_letter'])) {
            $data['catalog_letter'] = strtoupper($data['catalog_letter']);
        }

        $project->fill($data);
        $project->save();

        return $project;
    }

    public function delete(Project $project): bool
    {
        return (bool) $project->delete();
    }

    private function applyFilters($query, array $filters): void
    {
        if (!empty($filters['catalog_letter'])) {
            $query->where('catalog_letter', strtoupper($filters['catalog_letter']));
        }

        if (!empty($filters['project_type'])) {
            $query->where('project_type', $filters['project_type']);
        }

        if (array_key_exists('featured', $filters)) {
            $featured = $this->normalizeBoolean($filters['featured']);

            if ($featured !== null) {
                $query->where('is_featured', $featured);
            }
        }

        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($inner) use ($search) {
                $inner->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('project_type', 'like', "%{$search}%");
            });
        }
    }

    private function resolveSlug(array $data): string
    {
        if (!empty($data['slug'])) {
            return $data['slug'];
        }

        return str_slug($data['name']);
    }

    private function sanitizePageSize($perPage): int
    {
        $perPage = (int) $perPage;

        if ($perPage <= 0) {
            $perPage = 15;
        }

        return min($perPage, 100);
    }

    private function normalizeBoolean($value)
    {
        if ($value === null || $value === '') {
            return null;
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }
}
