---
title: The EventServiceProvider class
---
This document explains the <SwmToken path="app/Providers/EventServiceProvider.php" pos="6:10:10" line-data="use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;">`EventServiceProvider`</SwmToken> class in the application. It covers:

1. What is <SwmToken path="app/Providers/EventServiceProvider.php" pos="6:10:10" line-data="use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;">`EventServiceProvider`</SwmToken>
2. Variables and functions in <SwmToken path="app/Providers/EventServiceProvider.php" pos="6:10:10" line-data="use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;">`EventServiceProvider`</SwmToken>
3. Details about the boot function

# What is <SwmToken path="app/Providers/EventServiceProvider.php" pos="6:10:10" line-data="use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;">`EventServiceProvider`</SwmToken>

The <SwmToken path="app/Providers/EventServiceProvider.php" pos="6:10:10" line-data="use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;">`EventServiceProvider`</SwmToken> class in <SwmPath>[app/Providers/EventServiceProvider.php](app/Providers/EventServiceProvider.php)</SwmPath> is a service provider responsible for registering event listeners in the application. It maps events to their respective listeners so that when an event is fired, the corresponding listeners are executed. This class extends the base <SwmToken path="app/Providers/EventServiceProvider.php" pos="6:14:14" line-data="use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;">`ServiceProvider`</SwmToken> provided by the framework and centralizes event registration to keep the application organized and maintainable.

<SwmSnippet path="/app/Providers/EventServiceProvider.php" line="15">

---

The variable <SwmToken path="app/Providers/EventServiceProvider.php" pos="15:4:4" line-data="    protected $listen = [">`listen`</SwmToken> is a protected array that holds the event-to-listener mappings for the application. Each key is an event class, and its value is an array of listener classes that should respond to that event. This array enables the framework to automatically register the listeners for the specified events.

```hack
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
    ];
```

---

</SwmSnippet>

<SwmSnippet path="/app/Providers/EventServiceProvider.php" line="26">

---

The function <SwmToken path="app/Providers/EventServiceProvider.php" pos="26:5:5" line-data="    public function boot()">`boot`</SwmToken> is a public method that registers any events for the application. It overrides the parent <SwmToken path="app/Providers/EventServiceProvider.php" pos="6:14:14" line-data="use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;">`ServiceProvider`</SwmToken>'s boot method and calls <SwmToken path="app/Providers/EventServiceProvider.php" pos="28:1:5" line-data="        parent::boot();">`parent::boot()`</SwmToken> to ensure the base functionality is preserved. This method is the place to add any additional event registration logic if needed, although in this implementation it currently only calls the parent method.

```hack
    public function boot()
    {
        parent::boot();

        //
    }
```

---

</SwmSnippet>

# Usage

## <SwmToken path="app/Providers/EventServiceProvider.php" pos="6:10:10" line-data="use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;">`EventServiceProvider`</SwmToken>

<SwmToken path="app/Providers/EventServiceProvider.php" pos="6:10:10" line-data="use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;">`EventServiceProvider`</SwmToken> is registered as a service provider in the application's configuration file <SwmPath>[config/app.php](config/app.php)</SwmPath>. This registration enables the framework to load and use the event listeners and subscribers defined within the <SwmToken path="app/Providers/EventServiceProvider.php" pos="6:10:10" line-data="use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;">`EventServiceProvider`</SwmToken> during the application's lifecycle.

&nbsp;

*This is an auto-generated document by Swimm 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBTGFyYXZlbC1PcGVuLVNvdXJjZS1Qcm9qZWN0cyUzQSUzQW11ZGFzaW4x" repo-name="Laravel-Open-Source-Projects"><sup>Powered by [Swimm](https://app.swimm.io/)</sup></SwmMeta>
