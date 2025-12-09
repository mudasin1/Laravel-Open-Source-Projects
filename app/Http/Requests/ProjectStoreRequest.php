<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug',
            'project_type' => 'required|string|max:30',
            'catalog_letter' => 'required|string|size:1',
            'homepage_url' => 'required|url',
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
