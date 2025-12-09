---
title: The RedirectIfAuthenticated class
---
This document explains the class <SwmToken path="app/Http/Middleware/RedirectIfAuthenticated.php" pos="8:2:2" line-data="class RedirectIfAuthenticated">`RedirectIfAuthenticated`</SwmToken>. We will cover:

1. What <SwmToken path="app/Http/Middleware/RedirectIfAuthenticated.php" pos="8:2:2" line-data="class RedirectIfAuthenticated">`RedirectIfAuthenticated`</SwmToken> is and its purpose.
2. The variables and functions defined in <SwmToken path="app/Http/Middleware/RedirectIfAuthenticated.php" pos="8:2:2" line-data="class RedirectIfAuthenticated">`RedirectIfAuthenticated`</SwmToken>, with detailed explanations and code references.

# What is <SwmToken path="app/Http/Middleware/RedirectIfAuthenticated.php" pos="8:2:2" line-data="class RedirectIfAuthenticated">`RedirectIfAuthenticated`</SwmToken>

<SwmToken path="app/Http/Middleware/RedirectIfAuthenticated.php" pos="8:2:2" line-data="class RedirectIfAuthenticated">`RedirectIfAuthenticated`</SwmToken> is a middleware class located in <SwmPath>[app/…/Middleware/RedirectIfAuthenticated.php](app/Http/Middleware/RedirectIfAuthenticated.php)</SwmPath>. Its primary purpose is to intercept incoming HTTP requests and check if the user is already authenticated. If the user is authenticated, it redirects them to a predefined route (in this case, '/home'). Otherwise, it allows the request to proceed further in the application pipeline. This middleware is typically used to prevent authenticated users from accessing routes meant only for guests, such as login or registration pages.

# Variables and functions

The class <SwmToken path="app/Http/Middleware/RedirectIfAuthenticated.php" pos="8:2:2" line-data="class RedirectIfAuthenticated">`RedirectIfAuthenticated`</SwmToken> does not define any member variables. It solely contains one method responsible for handling the middleware logic.

<SwmSnippet path="/app/Http/Middleware/RedirectIfAuthenticated.php" line="18">

---

The function <SwmToken path="app/Http/Middleware/RedirectIfAuthenticated.php" pos="18:5:5" line-data="    public function handle($request, Closure $next, $guard = null)">`handle`</SwmToken> is the core method of the <SwmToken path="app/Http/Middleware/RedirectIfAuthenticated.php" pos="8:2:2" line-data="class RedirectIfAuthenticated">`RedirectIfAuthenticated`</SwmToken> middleware. It accepts three parameters: the current HTTP request, a Closure representing the next step in the request lifecycle, and an optional guard string to specify which authentication guard to check. Inside the function, it uses Laravel's Auth facade to check if the user is authenticated under the specified guard. If authenticated, it returns a redirect response to the '/home' route. If not, it passes the request to the next middleware or controller by invoking the Closure. This function ensures that authenticated users are redirected away from guest-only pages.

```hack
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBTGFyYXZlbC1PcGVuLVNvdXJjZS1Qcm9qZWN0cyUzQSUzQW11ZGFzaW4x" repo-name="Laravel-Open-Source-Projects"><sup>Powered by [Swimm](https://app.swimm.io/)</sup></SwmMeta>
