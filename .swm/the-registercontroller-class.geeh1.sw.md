---
title: The RegisterController class
---
# Inheritance diagram

This diagram shows the inheritance tree of the class:

```mermaid
graph TD;
 Controller --> RegisterController
 RegisterController:::currentBaseStyle

 classDef currentBaseStyle color:#000000,fill:#7CB9F4

%% Swimm:
%% graph TD;
%%  Controller --> <SwmToken path="app/Http/Controllers/Auth/RegisterController.php" pos="10:2:2" line-data="class RegisterController extends Controller">`RegisterController`</SwmToken>
%%  <SwmToken path="app/Http/Controllers/Auth/RegisterController.php" pos="10:2:2" line-data="class RegisterController extends Controller">`RegisterController`</SwmToken>:::currentBaseStyle
%% 
%%  classDef currentBaseStyle color:#000000,fill:#7CB9F4
```

This document explains the <SwmToken path="app/Http/Controllers/Auth/RegisterController.php" pos="10:2:2" line-data="class RegisterController extends Controller">`RegisterController`</SwmToken> class. It covers:

1. What <SwmToken path="app/Http/Controllers/Auth/RegisterController.php" pos="10:2:2" line-data="class RegisterController extends Controller">`RegisterController`</SwmToken> is and its purpose.
2. The variables and functions defined in <SwmToken path="app/Http/Controllers/Auth/RegisterController.php" pos="10:2:2" line-data="class RegisterController extends Controller">`RegisterController`</SwmToken>, including their roles and implementations.

# What is <SwmToken path="app/Http/Controllers/Auth/RegisterController.php" pos="10:2:2" line-data="class RegisterController extends Controller">`RegisterController`</SwmToken>

<SwmToken path="app/Http/Controllers/Auth/RegisterController.php" pos="10:2:2" line-data="class RegisterController extends Controller">`RegisterController`</SwmToken> is a controller class located in <SwmPath>[app/…/Auth/RegisterController.php](app/Http/Controllers/Auth/RegisterController.php)</SwmPath>. It manages the registration process of new users in the application. This includes validating incoming registration data and creating new user records. The controller leverages a trait to provide the core registration functionality, minimizing the need for additional code.

<SwmSnippet path="/app/Http/Controllers/Auth/RegisterController.php" line="37">

---

The constructor function <SwmToken path="app/Http/Controllers/Auth/RegisterController.php" pos="37:5:5" line-data="    public function __construct()">`__construct`</SwmToken> initializes the <SwmToken path="app/Http/Controllers/Auth/RegisterController.php" pos="10:2:2" line-data="class RegisterController extends Controller">`RegisterController`</SwmToken> instance. It applies the 'guest' middleware to ensure that only unauthenticated users can access the registration routes, preventing logged-in users from accessing the registration page.

```hack
    public function __construct()
    {
        $this->middleware('guest');
    }
```

---

</SwmSnippet>

<SwmSnippet path="/app/Http/Controllers/Auth/RegisterController.php" line="48">

---

The function <SwmToken path="app/Http/Controllers/Auth/RegisterController.php" pos="48:5:5" line-data="    protected function validator(array $data)">`validator`</SwmToken> is responsible for validating the incoming registration data. It takes an array of data as input and returns a Validator instance configured with rules that require the name to be a string with a maximum length of 255 characters, the email to be a unique valid email address, and the password to be at least 6 characters long and confirmed.

```hack
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
```

---

</SwmSnippet>

<SwmSnippet path="/app/Http/Controllers/Auth/RegisterController.php" line="63">

---

The function <SwmToken path="app/Http/Controllers/Auth/RegisterController.php" pos="63:5:5" line-data="    protected function create(array $data)">`create`</SwmToken> handles the creation of a new user after the registration data has been validated. It receives an array of user data and returns a new User instance. The function sets the user's name and email directly from the data and hashes the password using bcrypt before storing it.

```hack
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
```

---

</SwmSnippet>

<SwmSnippet path="/app/Http/Controllers/Auth/RegisterController.php" line="30">

---

The protected variable <SwmToken path="app/Http/Controllers/Auth/RegisterController.php" pos="30:3:4" line-data="    protected $redirectTo = &#39;/home&#39;;">`$redirectTo`</SwmToken> defines the URL path to which users are redirected after successful registration. In this case, it is set to '/home'.

```hack
    protected $redirectTo = '/home';
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBTGFyYXZlbC1PcGVuLVNvdXJjZS1Qcm9qZWN0cyUzQSUzQW11ZGFzaW4x" repo-name="Laravel-Open-Source-Projects"><sup>Powered by [Swimm](https://app.swimm.io/)</sup></SwmMeta>
