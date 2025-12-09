<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $project = $this->route('project');
        $projectId = $project ? $project->id : null;

        return [
            'name' => 'sometimes|required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug,' . $projectId,
            'project_type' => 'sometimes|required|string|max:30',
            'catalog_letter' => 'sometimes|required|string|size:1',
            'homepage_url' => 'sometimes|required|url',
            'repository_url' => 'nullable|url',
            'credit_name' => 'nullable|string|max:255',
            'credit_url' => 'nullable|url',
            'description' => 'nullable|string',
            'is_featured' => 'boolean',
        ];
    }

    public function validated()
    {
        return $this->only([
            'name',
            'slug',
            'project_type',
            'catalog_letter',
            'homepage_url',
            'repository_url',
            'credit_name',
            'credit_url',
            'description',
            'is_featured',
        ]);
    }
}
