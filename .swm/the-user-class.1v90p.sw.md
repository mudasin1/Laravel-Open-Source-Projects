---
title: The User class
---
This document will cover the User class in the project. We will cover:

1. What is User
2. Variables and functions

# What is User

The User class in <SwmPath>[app/User.php](app/User.php)</SwmPath> represents the user entity in the application. It is primarily used for authentication and notification purposes. This class extends the base Authenticatable class provided by the framework, which equips it with authentication features. Additionally, it uses a trait to enable notification capabilities. Essentially, this class models the users of the system and manages their authentication credentials and notification handling.

<SwmSnippet path="/app/User.php" line="17">

---

The variable <SwmToken path="app/User.php" pos="17:4:4" line-data="    protected $fillable = [">`fillable`</SwmToken> is an array that defines which attributes of the User model can be mass assigned. This protects against mass assignment vulnerabilities by explicitly specifying the fields that are allowed to be set via mass assignment.

```hack
    protected $fillable = [
        'name', 'email', 'password',
    ];
```

---

</SwmSnippet>

<SwmSnippet path="/app/User.php" line="26">

---

The variable <SwmToken path="app/User.php" pos="26:4:4" line-data="    protected $hidden = [">`hidden`</SwmToken> is an array that specifies which attributes should be hidden when the User model is converted to arrays or JSON. This is typically used to hide sensitive information such as passwords and tokens from being exposed in API responses or other outputs.

```hack
    protected $hidden = [
        'password', 'remember_token',
    ];
```

---

</SwmSnippet>

<SwmSnippet path="/app/User.php" line="10">

---

The User class uses the <SwmToken path="app/User.php" pos="10:3:3" line-data="    use Notifiable;">`Notifiable`</SwmToken> trait, which provides methods to send notifications to the user via different channels such as email or database notifications. This trait adds notification-related functionality to the User model.

```hack
    use Notifiable;
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBTGFyYXZlbC1PcGVuLVNvdXJjZS1Qcm9qZWN0cyUzQSUzQW11ZGFzaW4x" repo-name="Laravel-Open-Source-Projects"><sup>Powered by [Swimm](https://app.swimm.io/)</sup></SwmMeta>
