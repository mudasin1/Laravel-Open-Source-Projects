---
title: The RedirectIfAuthenticated class
---
This document explains the class <SwmToken path="app/Http/Middleware/RedirectIfAuthenticated.php" pos="8:2:2" line-data="class RedirectIfAuthenticated">`RedirectIfAuthenticated`</SwmToken>. We will cover:

1. What <SwmToken path="app/Http/Middleware/RedirectIfAuthenticated.php" pos="8:2:2" line-data="class RedirectIfAuthenticated">`RedirectIfAuthenticated`</SwmToken> is and its purpose.
2. The variables and functions defined in <SwmToken path="app/Http/Middleware/RedirectIfAuthenticated.php" pos="8:2:2" line-data="class RedirectIfAuthenticated">`RedirectIfAuthenticated`</SwmToken>, including detailed explanations of each.

# What is <SwmToken path="app/Http/Middleware/RedirectIfAuthenticated.php" pos="8:2:2" line-data="class RedirectIfAuthenticated">`RedirectIfAuthenticated`</SwmToken>

<SwmToken path="app/Http/Middleware/RedirectIfAuthenticated.php" pos="8:2:2" line-data="class RedirectIfAuthenticated">`RedirectIfAuthenticated`</SwmToken> is a middleware class located in <SwmPath>[app/…/Middleware/RedirectIfAuthenticated.php](app/Http/Middleware/RedirectIfAuthenticated.php)</SwmPath>. Its primary purpose is to intercept incoming HTTP requests and check if the user is already authenticated. If the user is authenticated, it redirects them to the '/home' route, preventing access to routes intended only for guests (unauthenticated users). Otherwise, it allows the request to proceed further in the application pipeline.

<SwmSnippet path="/app/Http/Middleware/RedirectIfAuthenticated.php" line="8">

---

The class <SwmToken path="app/Http/Middleware/RedirectIfAuthenticated.php" pos="8:2:2" line-data="class RedirectIfAuthenticated">`RedirectIfAuthenticated`</SwmToken> does not define any class-level variables. It solely contains one method named <SwmToken path="app/Http/Middleware/RedirectIfAuthenticated.php" pos="18:5:5" line-data="    public function handle($request, Closure $next, $guard = null)">`handle`</SwmToken> which manages the middleware logic.

```hack
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }
}
```

---

</SwmSnippet>

<SwmSnippet path="/app/Http/Middleware/RedirectIfAuthenticated.php" line="18">

---

The function <SwmToken path="app/Http/Middleware/RedirectIfAuthenticated.php" pos="18:5:5" line-data="    public function handle($request, Closure $next, $guard = null)">`handle`</SwmToken> is the core method of the <SwmToken path="app/Http/Middleware/RedirectIfAuthenticated.php" pos="8:2:2" line-data="class RedirectIfAuthenticated">`RedirectIfAuthenticated`</SwmToken> middleware. It accepts the current HTTP request, a closure representing the next step in the request lifecycle, and an optional guard parameter to specify the authentication guard. Inside the method, it checks if the user is authenticated using the specified guard. If authenticated, it returns a redirect response to '/home'. If not, it passes the request to the next middleware or controller by invoking the closure.

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
