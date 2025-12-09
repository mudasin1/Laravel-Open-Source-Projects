---
title: The CreatePasswordResetsTable class
---
This document explains the <SwmToken path="database/migrations/2014_10_12_100000_create_password_resets_table.php" pos="7:2:2" line-data="class CreatePasswordResetsTable extends Migration">`CreatePasswordResetsTable`</SwmToken> migration class. It covers:

1. What <SwmToken path="database/migrations/2014_10_12_100000_create_password_resets_table.php" pos="7:2:2" line-data="class CreatePasswordResetsTable extends Migration">`CreatePasswordResetsTable`</SwmToken> is and its purpose
2. The variables and functions defined in <SwmToken path="database/migrations/2014_10_12_100000_create_password_resets_table.php" pos="7:2:2" line-data="class CreatePasswordResetsTable extends Migration">`CreatePasswordResetsTable`</SwmToken>
3. Details on the up and down functions

# What is <SwmToken path="database/migrations/2014_10_12_100000_create_password_resets_table.php" pos="7:2:2" line-data="class CreatePasswordResetsTable extends Migration">`CreatePasswordResetsTable`</SwmToken>

<SwmToken path="database/migrations/2014_10_12_100000_create_password_resets_table.php" pos="7:2:2" line-data="class CreatePasswordResetsTable extends Migration">`CreatePasswordResetsTable`</SwmToken> is a migration class located in <SwmPath>[database/migrations/2014_10_12_100000_create_password_resets_table.php](database/migrations/2014_10_12_100000_create_password_resets_table.php)</SwmPath>. It is used to create and manage the <SwmToken path="database/migrations/2014_10_12_100000_create_password_resets_table.php" pos="16:6:6" line-data="        Schema::create(&#39;password_resets&#39;, function (Blueprint $table) {">`password_resets`</SwmToken> table in the database, which stores password reset tokens and related information for users who request password resets.

<SwmSnippet path="/database/migrations/2014_10_12_100000_create_password_resets_table.php" line="14">

---

The function <SwmToken path="database/migrations/2014_10_12_100000_create_password_resets_table.php" pos="14:5:5" line-data="    public function up()">`up`</SwmToken> is responsible for running the migration. It creates the <SwmToken path="database/migrations/2014_10_12_100000_create_password_resets_table.php" pos="16:6:6" line-data="        Schema::create(&#39;password_resets&#39;, function (Blueprint $table) {">`password_resets`</SwmToken> table with three columns: an indexed string column for email, a string column for the reset token, and a nullable timestamp column for the creation time of the reset request.

```hack
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }
```

---

</SwmSnippet>

<SwmSnippet path="/database/migrations/2014_10_12_100000_create_password_resets_table.php" line="28">

---

The function <SwmToken path="database/migrations/2014_10_12_100000_create_password_resets_table.php" pos="28:5:5" line-data="    public function down()">`down`</SwmToken> reverses the migration by dropping the <SwmToken path="database/migrations/2014_10_12_100000_create_password_resets_table.php" pos="30:6:6" line-data="        Schema::dropIfExists(&#39;password_resets&#39;);">`password_resets`</SwmToken> table if it exists. This allows rolling back the migration cleanly.

```hack
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBTGFyYXZlbC1PcGVuLVNvdXJjZS1Qcm9qZWN0cyUzQSUzQW11ZGFzaW4x" repo-name="Laravel-Open-Source-Projects"><sup>Powered by [Swimm](https://app.swimm.io/)</sup></SwmMeta>
