---
title: The CreateUsersTable class
---
This document explains the <SwmToken path="database/migrations/2014_10_12_000000_create_users_table.php" pos="7:2:2" line-data="class CreateUsersTable extends Migration">`CreateUsersTable`</SwmToken> migration class. It covers:

1. What <SwmToken path="database/migrations/2014_10_12_000000_create_users_table.php" pos="7:2:2" line-data="class CreateUsersTable extends Migration">`CreateUsersTable`</SwmToken> is and its purpose.
2. The variables and functions defined in <SwmToken path="database/migrations/2014_10_12_000000_create_users_table.php" pos="7:2:2" line-data="class CreateUsersTable extends Migration">`CreateUsersTable`</SwmToken>, including their roles and implementations.

# What is <SwmToken path="database/migrations/2014_10_12_000000_create_users_table.php" pos="7:2:2" line-data="class CreateUsersTable extends Migration">`CreateUsersTable`</SwmToken>

<SwmToken path="database/migrations/2014_10_12_000000_create_users_table.php" pos="7:2:2" line-data="class CreateUsersTable extends Migration">`CreateUsersTable`</SwmToken> is a migration class located in <SwmPath>[database/migrations/2014_10_12_000000_create_users_table.php](database/migrations/2014_10_12_000000_create_users_table.php)</SwmPath>. It is used to define the structure of the 'users' table in the database. This class manages the creation and deletion of the users table schema, which includes fields such as id, name, email, password, remember token, and timestamps.

<SwmSnippet path="/database/migrations/2014_10_12_000000_create_users_table.php" line="14">

---

The function <SwmToken path="database/migrations/2014_10_12_000000_create_users_table.php" pos="14:5:5" line-data="    public function up()">`up`</SwmToken> is responsible for running the migration. It creates the 'users' table with its columns and their respective data types and constraints. This function uses the Schema facade to define the table structure, including an auto-incrementing id, string fields for name, email (unique), and password, a remember token for session management, and timestamp fields for created_at and updated_at.

```hack
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
```

---

</SwmSnippet>

<SwmSnippet path="/database/migrations/2014_10_12_000000_create_users_table.php" line="31">

---

The function <SwmToken path="database/migrations/2014_10_12_000000_create_users_table.php" pos="31:5:5" line-data="    public function down()">`down`</SwmToken> is used to reverse the migration. It drops the 'users' table if it exists, effectively undoing the changes made by the <SwmToken path="database/migrations/2014_10_12_000000_create_users_table.php" pos="14:5:5" line-data="    public function up()">`up`</SwmToken> function. This allows for rollback of the migration when needed.

```hack
    public function down()
    {
        Schema::dropIfExists('users');
    }
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBTGFyYXZlbC1PcGVuLVNvdXJjZS1Qcm9qZWN0cyUzQSUzQW11ZGFzaW4x" repo-name="Laravel-Open-Source-Projects"><sup>Powered by [Swimm](https://app.swimm.io/)</sup></SwmMeta>
