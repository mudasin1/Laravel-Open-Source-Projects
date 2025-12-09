<?php

namespace App\Domain\Projects\Repositories;

use App\Domain\Projects\Models\Project;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ProjectRepositoryInterface
{
    /**
     * List projects with optional filtering.
     *
     * @param array $filters
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function paginate(array $filters = [], $perPage = 15): LengthAwarePaginator;

    /**
     * Retrieve all projects matching optional filters.
     *
     * @param array $filters
     * @return Collection
     */
    public function all(array $filters = []): Collection;

    public function findBySlug(string $slug): ?Project;

    public function create(array $data): Project;

    public function update(Project $project, array $data): Project;

    public function delete(Project $project): bool;
}
