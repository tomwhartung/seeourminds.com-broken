# seeourminds.com

Code used on the seeourminds.com site - most of it, anyway.

### Status

We made the changes detailed below, but there are still issues with running this code on PHP 7, so we are abandoning this work for now.

#### New Branch: "checkpoints"

A big issue with all this is whitescreening without any error messages (including in the apache error log file).

In an effort to try to track down the issues "manually," we added some checkpoint displays to key files:

* index.php

* libraries/joomla/application/application.php

* libraries/joomla/factory.php

To run the code with these checkpoints, checkout the checkpoints branch

```
git checkout checkpoints
git branch        # note that branch checkpoints is now active
git status
more index.php    # see the checkpoints in the code (and when you access the site in the browser)
```

*THIS CODE IS EXPERIMENTAL!!  DO NOT MERGE THIS CODE WITH THE MAIN BRANCH!!*

#### Returning to the "master" Branch

To return to the baseline code in the master branch:

```
git checkout master
git branch        # note that master branch is now active
git status
more index.php    # see that the code no longer displays checkpoints when you access the site in the browser
```

### Changes Made

#### Files Changed

libraries/joomla/database/database/mysql.php
libraries/simplepie/simplepie.php

#### Files NOT Changed

* libraries/joomla/database/database/mysqli.php - not changing comments

* media/editors/codemirror/js/tokenizephp.js - list of functions, mysqli_* functions already present

* plugins/content/geshi/geshi/geshi/php-brief.php - list of functions, mysqli_* functions already present

* plugins/content/geshi/geshi/geshi/php.php - list of functions, mysqli_* functions NOT already present (possibly for a good reason?)

* plugins/content/geshi/geshi/geshi/php-brief.php

* plugins/content/geshi/geshi/geshi/php.php


### Changes Made

| Done | Changed | To | In File(s) | Comments |
|:----:|---------|----|----------|----------|
| Y | mysql_connect | mysqli_connect | mysql.php | Checks version in only 1 of 3 places; changed for php 7 only |
| Y | mysql_connect | mysqli_connect | simplepie.php | Kept it simple, unsure whether this is being used |
| | | | | | |
| Y | mysql_select_db | mysqli_select_db | mysql.php | Checks version; changed for php 7 only |
| Y | mysql_select_db | mysqli_select_db | simplepie.php | Kept it simple, unsure whether this is being used |
| | | | | | |
| Y | mysql_get_server_info | mysqli_get_server_info | mysql.php | |
| N | mysql_get_server_info | mysqli_get_server_info | simplepie.php | No calls to function found |
| | | | | | |
| Y | mysql_query | mysqli_query | mysql.php | Checks version in 4 of 4 places; changed for PHP 7 only |
| N | mysql_query | mysqli_query | simplepie.php | Contains 15 calls to mysql_query (*) |
| | | | | | |
| Y | mysql_real_escape_string | mysqli_real_escape_string | mysql.php | Checks version in 1 of 1 places; changed for PHP 7 only |
| N | mysql_real_escape_string | mysqli_real_escape_string | simplepie.php | Contains 16 calls to mysql_real_escape_string (*) |
| | | | | | |
| Y | | mysql_errno | mysqli_errno | mysql.php | Changed in all 2 of 2 places |
| N | | mysql_errno | mysqli_errno | simplepie.php | Function not found in file |
| | | | | | |
| Y | mysql_close | mysqli_close | mysql.php | Used in only one place |
| Y | mysql_ping | mysqli_ping | mysql.php | Used in only one place |
| Y | mysql_insert_id | mysqli_insert_id | mysql.php | Used in only one place |
| Y | mysql_error | mysqli_error | mysql.php | Changed both of two uses |
| Y | mysql_fetch_assoc | mysqli_fetch_assoc | mysql.php | Used in only one place |
| Y | mysql_free_result | mysqli_free_result | mysql.php | Used in only one place |
| Y | mysql_fetch_row | mysqli_fetch_row | mysql.php | Checks version in 1 of 1 places; changed for PHP 7 only |
| Y | mysql_fetch_row | mysqli_fetch_row | mysql.php | Checks version in 1 of 1 places; changed for PHP 7 only |
| | | | | | |
| Y | mysql_affected_rows | mysqli_affected_rows | mysql.php | Used in only one place |
| Y | mysql_affected_rows | mysqli_affected_rows | simplepie.php | Used in only one place |
| | | | | | |
| Y | mysql_num_rows | mysqli_num_rows | mysql.php | Used in only one place |
| Y | mysql_num_rows | mysqli_num_rows | simplepie.php | Changed both of two uses |
| | | | | | |
| N | mysql_result | mysqli_result | mysql.php | Not found in file |
| N | mysql_result | mysqli_result | simplepie.php | Not found in file |

(*) Once we started getting error messages about missing functions, we started focusing on fixing those in mysql.php.  It really looks like we are not using simplepie at this time, so I am reluctant to spend time on it, especially if it contains a lot of calls, and I have decided to check the PHP_MAJOR_VERSION, which seems like the thing to do.

### References

A general reference:

http://www.bestwebframeworks.com/tutorials/php/36/solve-mysql-extension-is-deprecated--will-be-removed-in-the-future-of-php/

#### MySql Functions

* http://php.net/manual/en/function.mysql-connect.php
* http://php.net/manual/en/function.mysql-select-db.php
* http://php.net/manual/en/function.mysql-get-server-info.php
* http://php.net/manual/en/function.mysql-query.php
* http://php.net/manual/en/function.mysql-real-escape-string.php
* http://php.net/manual/en/function.mysql-errno.php
* http://php.net/manual/en/function.mysql-close.php
* http://php.net/manual/en/function.mysql-ping.php
* http://php.net/manual/en/function.mysql-affected-rows.php
* http://php.net/manual/en/function.mysql-num-rows.php
* http://php.net/manual/en/function.mysql-insert-id.php
* http://php.net/manual/en/function.mysql-error.php
* http://php.net/manual/en/function.mysql-fetch-assoc.php
* http://php.net/manual/en/function.mysql-fetch-row.php
* http://php.net/manual/en/function.mysql-fetch-object.php
* http://php.net/manual/en/function.mysql-free-result.php

#### MySqlI Functions

* http://php.net/manual/en/function.mysqli-connect.php and http://php.net/manual/en/mysqli.construct.php
* http://php.net/manual/en/mysqli.select-db.php
* http://php.net/manual/en/mysqli.get-server-info.php
* http://php.net/manual/en/mysqli.query.php
* http://php.net/manual/en/mysqli.real-escape-string.php
* http://php.net/manual/en/mysqli.errno.php
* http://php.net/manual/en/mysqli.close.php
* http://php.net/manual/en/mysqli.ping.php
* http://php.net/manual/en/mysqli.affected-rows.php
* http://php.net/manual/en/mysqli-result.num-rows.php
* http://php.net/manual/en/mysqli.insert-id.php
* http://php.net/manual/en/mysqli.error.php
* http://php.net/manual/en/mysqli-result.fetch-assoc.php
* http://php.net/manual/en/mysqli-result.fetch-row.php
* http://php.net/manual/en/mysqli-result.fetch-object.php
* http://php.net/manual/en/mysqli-result.free.php
