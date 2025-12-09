---
title: The ProjectStoreRequest class
---
This document explains the <SwmToken path="app/Http/Requests/ProjectStoreRequest.php" pos="7:2:2" line-data="class ProjectStoreRequest extends FormRequest">`ProjectStoreRequest`</SwmToken> class. We will cover:

1. What is <SwmToken path="app/Http/Requests/ProjectStoreRequest.php" pos="7:2:2" line-data="class ProjectStoreRequest extends FormRequest">`ProjectStoreRequest`</SwmToken>
2. Variables and functions

# What is <SwmToken path="app/Http/Requests/ProjectStoreRequest.php" pos="7:2:2" line-data="class ProjectStoreRequest extends FormRequest">`ProjectStoreRequest`</SwmToken>

<SwmToken path="app/Http/Requests/ProjectStoreRequest.php" pos="7:2:2" line-data="class ProjectStoreRequest extends FormRequest">`ProjectStoreRequest`</SwmToken> is a form request class in the <SwmPath>[app/Http/Requests/](app/Http/Requests/)</SwmPath> directory that extends Laravel's <SwmToken path="app/Http/Requests/ProjectStoreRequest.php" pos="5:8:8" line-data="use Illuminate\Foundation\Http\FormRequest;">`FormRequest`</SwmToken>. It is used to encapsulate and manage the validation logic for storing project data submitted via HTTP requests. This class ensures that incoming data for creating or storing a project meets the defined validation rules before it is processed further in the application.

<SwmSnippet path="/app/Http/Requests/ProjectStoreRequest.php" line="9">

---

The function <SwmToken path="app/Http/Requests/ProjectStoreRequest.php" pos="9:5:5" line-data="    public function authorize()">`authorize`</SwmToken> determines if the user is authorized to make this request. In <SwmToken path="app/Http/Requests/ProjectStoreRequest.php" pos="7:2:2" line-data="class ProjectStoreRequest extends FormRequest">`ProjectStoreRequest`</SwmToken>, it returns true, meaning all users are authorized to perform this request.

```hack
    public function authorize()
    {
        return true;
    }
```

---

</SwmSnippet>

<SwmSnippet path="/app/Http/Requests/ProjectStoreRequest.php" line="14">

---

The function <SwmToken path="app/Http/Requests/ProjectStoreRequest.php" pos="14:5:5" line-data="    public function rules()">`rules`</SwmToken> defines the validation rules that apply to the request data. It returns an array specifying requirements such as 'name' being required and a string with a maximum length of 255, 'slug' being nullable but unique in the projects table, <SwmToken path="app/Http/Requests/ProjectStoreRequest.php" pos="19:2:2" line-data="            &#39;project_type&#39; =&gt; &#39;required|string|max:30&#39;,">`project_type`</SwmToken> being required, and other fields having specific validation constraints like URL format or boolean type.

```hack
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
```

---

</SwmSnippet>

<SwmSnippet path="/app/Http/Requests/ProjectStoreRequest.php" line="30">

---

The function <SwmToken path="app/Http/Requests/ProjectStoreRequest.php" pos="30:5:5" line-data="    public function validated()">`validated`</SwmToken> returns only the validated data from the request. It uses the <SwmToken path="app/Http/Requests/ProjectStoreRequest.php" pos="32:6:6" line-data="        return $this-&gt;only([">`only`</SwmToken> method to extract the fields that are defined in the validation rules, ensuring that only these fields are passed forward for further processing.

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

## <SwmToken path="app/Http/Requests/ProjectStoreRequest.php" pos="7:2:2" line-data="class ProjectStoreRequest extends FormRequest">`ProjectStoreRequest`</SwmToken>

<SwmToken path="app/Http/Requests/ProjectStoreRequest.php" pos="7:2:2" line-data="class ProjectStoreRequest extends FormRequest">`ProjectStoreRequest`</SwmToken> is used as a type-hinted parameter in the store method of ProjectController. This means that when a request to create a new project is made, the incoming data is validated according to the rules defined in <SwmToken path="app/Http/Requests/ProjectStoreRequest.php" pos="7:2:2" line-data="class ProjectStoreRequest extends FormRequest">`ProjectStoreRequest`</SwmToken> before the controller proceeds.

Inside the store method, the validated data from <SwmToken path="app/Http/Requests/ProjectStoreRequest.php" pos="7:2:2" line-data="class ProjectStoreRequest extends FormRequest">`ProjectStoreRequest`</SwmToken> is accessed via the validated() method. This ensures that only data that passes validation is used to create a new project, enhancing data integrity and security.

The validated data is then passed to the projects repository's create method, which handles the actual creation of the project record in the database or storage layer.

&nbsp;

*This is an auto-generated document by Swimm 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBTGFyYXZlbC1PcGVuLVNvdXJjZS1Qcm9qZWN0cyUzQSUzQW11ZGFzaW4x" repo-name="Laravel-Open-Source-Projects"><sup>Powered by [Swimm](https://app.swimm.io/)</sup></SwmMeta>
