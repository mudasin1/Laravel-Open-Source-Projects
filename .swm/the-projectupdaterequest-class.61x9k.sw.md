---
title: The ProjectUpdateRequest class
---
This document covers the <SwmToken path="app/Http/Requests/ProjectUpdateRequest.php" pos="7:2:2" line-data="class ProjectUpdateRequest extends FormRequest">`ProjectUpdateRequest`</SwmToken> class. We will explain:

1. What <SwmToken path="app/Http/Requests/ProjectUpdateRequest.php" pos="7:2:2" line-data="class ProjectUpdateRequest extends FormRequest">`ProjectUpdateRequest`</SwmToken> is and its purpose.
2. The functions defined in <SwmToken path="app/Http/Requests/ProjectUpdateRequest.php" pos="7:2:2" line-data="class ProjectUpdateRequest extends FormRequest">`ProjectUpdateRequest`</SwmToken> and their roles.

# What is <SwmToken path="app/Http/Requests/ProjectUpdateRequest.php" pos="7:2:2" line-data="class ProjectUpdateRequest extends FormRequest">`ProjectUpdateRequest`</SwmToken>

<SwmToken path="app/Http/Requests/ProjectUpdateRequest.php" pos="7:2:2" line-data="class ProjectUpdateRequest extends FormRequest">`ProjectUpdateRequest`</SwmToken> is a form request class in the <SwmPath>[app/Http/Requests/](app/Http/Requests/)</SwmPath> directory that extends Laravel's <SwmToken path="app/Http/Requests/ProjectUpdateRequest.php" pos="5:8:8" line-data="use Illuminate\Foundation\Http\FormRequest;">`FormRequest`</SwmToken>. It is used to encapsulate and manage the validation logic for updating a project entity. This class ensures that incoming HTTP requests for updating projects meet the defined validation rules before the data is processed further in the application.

<SwmSnippet path="/app/Http/Requests/ProjectUpdateRequest.php" line="9">

---

The function <SwmToken path="app/Http/Requests/ProjectUpdateRequest.php" pos="9:5:5" line-data="    public function authorize()">`authorize`</SwmToken> determines if the user is authorized to make this request. In <SwmToken path="app/Http/Requests/ProjectUpdateRequest.php" pos="7:2:2" line-data="class ProjectUpdateRequest extends FormRequest">`ProjectUpdateRequest`</SwmToken>, it returns true, meaning all users are authorized to perform the update request.

```hack
    public function authorize()
    {
        return true;
    }
```

---

</SwmSnippet>

<SwmSnippet path="/app/Http/Requests/ProjectUpdateRequest.php" line="14">

---

The function <SwmToken path="app/Http/Requests/ProjectUpdateRequest.php" pos="14:5:5" line-data="    public function rules()">`rules`</SwmToken> defines the validation rules that apply to the request data when updating a project. It dynamically retrieves the current project from the route to exclude its ID from the unique slug validation. The rules specify constraints such as string types, maximum lengths, URL formats, and conditional requirements using 'sometimes' and 'nullable' modifiers.

```hack
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
```

---

</SwmSnippet>

<SwmSnippet path="/app/Http/Requests/ProjectUpdateRequest.php" line="33">

---

The function <SwmToken path="app/Http/Requests/ProjectUpdateRequest.php" pos="33:5:5" line-data="    public function validated()">`validated`</SwmToken> returns only the subset of request data fields that are allowed and validated for updating a project. It explicitly lists the fields such as 'name', 'slug', <SwmToken path="app/Http/Requests/ProjectUpdateRequest.php" pos="38:2:2" line-data="            &#39;project_type&#39;,">`project_type`</SwmToken>, and others, ensuring that only these fields are passed forward after validation.

```hack
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
```

---

</SwmSnippet>

# Usage

## <SwmToken path="app/Http/Requests/ProjectUpdateRequest.php" pos="7:2:2" line-data="class ProjectUpdateRequest extends FormRequest">`ProjectUpdateRequest`</SwmToken>

<SwmToken path="app/Http/Requests/ProjectUpdateRequest.php" pos="7:2:2" line-data="class ProjectUpdateRequest extends FormRequest">`ProjectUpdateRequest`</SwmToken> is used as a type-hinted parameter in the update method of the ProjectController. This indicates that it handles the validation and authorization of incoming update requests for a Project.

Within the update method, the validated data from <SwmToken path="app/Http/Requests/ProjectUpdateRequest.php" pos="7:2:2" line-data="class ProjectUpdateRequest extends FormRequest">`ProjectUpdateRequest`</SwmToken> is retrieved by calling the validated() method on the request instance. This ensures that only data that passes validation rules is used for updating the project.

The validated data is then passed to the projects repository's update method along with the project instance to perform the update operation. This shows that <SwmToken path="app/Http/Requests/ProjectUpdateRequest.php" pos="7:2:2" line-data="class ProjectUpdateRequest extends FormRequest">`ProjectUpdateRequest`</SwmToken> acts as a gatekeeper for the update process, ensuring data integrity before the update logic is executed.

Finally, the updated project is transformed and returned as a JSON response, completing the update flow that starts with <SwmToken path="app/Http/Requests/ProjectUpdateRequest.php" pos="7:2:2" line-data="class ProjectUpdateRequest extends FormRequest">`ProjectUpdateRequest`</SwmToken>.

&nbsp;

*This is an auto-generated document by Swimm 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBTGFyYXZlbC1PcGVuLVNvdXJjZS1Qcm9qZWN0cyUzQSUzQW11ZGFzaW4x" repo-name="Laravel-Open-Source-Projects"><sup>Powered by [Swimm](https://app.swimm.io/)</sup></SwmMeta>
