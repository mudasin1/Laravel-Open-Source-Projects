<?php

namespace Tests\Feature;

use App\Domain\Projects\Models\Project;
use Tests\TestCase;

class ProjectApiTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();

        $this->app['config']->set('database.default', 'sqlite');
        $this->app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $this->artisan('migrate');
        $this->artisan('db:seed', ['--class' => 'ProjectSeeder']);
    }

    public function test_it_lists_projects_with_filters()
    {
        $response = $this->json('GET', '/api/v1/projects?catalog_letter=L&per_page=5');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'meta' => ['current_page', 'last_page', 'per_page', 'total'],
            ]);

        $payload = $this->decode($response);

        $this->assertTrue(collect($payload['data'])->every(function ($project) {
            return $project['catalog_letter'] === 'L';
        }));
    }

    public function test_it_creates_a_project()
    {
        $payload = [
            'name' => 'New Enterprise Tool',
            'project_type' => 'platform',
            'catalog_letter' => 'N',
            'homepage_url' => 'https://example.com',
            'repository_url' => 'https://github.com/example/tool',
            'credit_name' => 'Example Org',
            'credit_url' => 'https://github.com/example',
            'description' => 'A new platform-level project.',
            'is_featured' => true,
        ];

        $response = $this->json('POST', '/api/v1/projects', $payload);

        $response->assertStatus(201);

        $this->seeInDatabase('projects', ['slug' => 'new-enterprise-tool', 'catalog_letter' => 'N']);
    }

    public function test_it_updates_a_project()
    {
        $project = Project::first();

        $response = $this->json('PUT', '/api/v1/projects/' . $project->slug, [
            'project_type' => 'revised-type',
            'catalog_letter' => 'R',
        ]);

        $response->assertStatus(200);

        $this->seeInDatabase('projects', ['slug' => $project->slug, 'project_type' => 'revised-type', 'catalog_letter' => 'R']);
    }

    private function decode($response): array
    {
        return json_decode($response->getContent(), true);
    }
}
