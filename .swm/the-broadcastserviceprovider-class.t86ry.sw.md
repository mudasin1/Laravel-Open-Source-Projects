---
title: The BroadcastServiceProvider class
---
This document explains the <SwmToken path="app/Providers/BroadcastServiceProvider.php" pos="8:2:2" line-data="class BroadcastServiceProvider extends ServiceProvider">`BroadcastServiceProvider`</SwmToken> class. We will cover:

1. What <SwmToken path="app/Providers/BroadcastServiceProvider.php" pos="8:2:2" line-data="class BroadcastServiceProvider extends ServiceProvider">`BroadcastServiceProvider`</SwmToken> is and its purpose.
2. The variables and functions defined in <SwmToken path="app/Providers/BroadcastServiceProvider.php" pos="8:2:2" line-data="class BroadcastServiceProvider extends ServiceProvider">`BroadcastServiceProvider`</SwmToken>, including the boot function.

# What is <SwmToken path="app/Providers/BroadcastServiceProvider.php" pos="8:2:2" line-data="class BroadcastServiceProvider extends ServiceProvider">`BroadcastServiceProvider`</SwmToken>

<SwmToken path="app/Providers/BroadcastServiceProvider.php" pos="8:2:2" line-data="class BroadcastServiceProvider extends ServiceProvider">`BroadcastServiceProvider`</SwmToken> is a service provider class located in <SwmPath>[app/Providers/BroadcastServiceProvider.php](app/Providers/BroadcastServiceProvider.php)</SwmPath>. It is used to register and bootstrap broadcasting services in the Laravel application. Broadcasting allows real-time event broadcasting over WebSockets or other drivers, enabling the application to push server-side events to clients. This provider sets up the necessary routes and loads the channel authorization routes to manage event broadcasting authorization.

<SwmSnippet path="/app/Providers/BroadcastServiceProvider.php" line="15">

---

The function <SwmToken path="app/Providers/BroadcastServiceProvider.php" pos="15:5:5" line-data="    public function boot()">`boot`</SwmToken> is the only method defined in <SwmToken path="app/Providers/BroadcastServiceProvider.php" pos="8:2:2" line-data="class BroadcastServiceProvider extends ServiceProvider">`BroadcastServiceProvider`</SwmToken>. It is responsible for bootstrapping any application services related to broadcasting. This method registers the broadcasting routes and loads the channel authorization routes from the <SwmPath>[routes/channels.php](routes/channels.php)</SwmPath> file.

```hack
    public function boot()
    {
        Broadcast::routes();

        require base_path('routes/channels.php');
    }
```

---

</SwmSnippet>

# Usage

## <SwmToken path="app/Providers/BroadcastServiceProvider.php" pos="8:2:2" line-data="class BroadcastServiceProvider extends ServiceProvider">`BroadcastServiceProvider`</SwmToken>

<SwmToken path="app/Providers/BroadcastServiceProvider.php" pos="8:2:2" line-data="class BroadcastServiceProvider extends ServiceProvider">`BroadcastServiceProvider`</SwmToken> is registered in the application's service providers list within the <SwmPath>[config/app.php](config/app.php)</SwmPath> file. This registration enables the broadcasting services provided by the framework, allowing the application to handle real-time event broadcasting.

By including <SwmToken path="app/Providers/BroadcastServiceProvider.php" pos="8:2:2" line-data="class BroadcastServiceProvider extends ServiceProvider">`BroadcastServiceProvider`</SwmToken> in the providers array, the application ensures that broadcasting features such as event broadcasting and WebSocket support are bootstrapped and available throughout the application lifecycle.

&nbsp;

*This is an auto-generated document by Swimm 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBTGFyYXZlbC1PcGVuLVNvdXJjZS1Qcm9qZWN0cyUzQSUzQW11ZGFzaW4x" repo-name="Laravel-Open-Source-Projects"><sup>Powered by [Swimm](https://app.swimm.io/)</sup></SwmMeta>
