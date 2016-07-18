# seeourminds.com

Code used on the seeourminds.com site - most of it, anyway.

### Files Changed

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

| Done | Changed | To | Comments |
|:----:|---------|----|----------|
| X | mysql_connect | mysqli_connect | Checks version; changed for php 7 only |
| X | mysql_select_db | mysqli_select_db | |
|   | mysql_result | mysqli_result | |

[ ] mysql_query to mysqli_query
[ ] mysql_ to mysqli_
[ ] mysql_ to mysqli_
[ ] mysql_ to mysqli_

### References

http://www.bestwebframeworks.com/tutorials/php/36/solve-mysql-extension-is-deprecated--will-be-removed-in-the-future-of-php/

http://php.net/manual/en/function.mysql-connect.php
http://php.net/manual/en/function.mysql-select-db.php
http://php.net/manual/en/function.mysql-query.php

http://php.net/manual/en/function.mysqli-connect.php and http://php.net/manual/en/mysqli.construct.php
http://php.net/manual/en/mysqli.select-db.php
http://php.net/manual/en/mysqli.query.php
