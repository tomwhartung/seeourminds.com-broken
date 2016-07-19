<?php
/**
 * @version		$Id: index.php 20806 2011-02-21 19:44:59Z dextercowley $
 * @package		Joomla.Site
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// Set flag that this is a parent file.
define('_JEXEC', 1);
define('DS', DIRECTORY_SEPARATOR);

echo 'checkpoint 1';

if (file_exists(dirname(__FILE__) . '/defines.php')) {
	include_once dirname(__FILE__) . '/defines.php';
}

echo 'checkpoint 3';

if (!defined('_JDEFINES')) {
	define('JPATH_BASE', dirname(__FILE__));
	require_once JPATH_BASE.'/includes/defines.php';
}

echo 'checkpoint 5';

require_once JPATH_BASE.'/includes/framework.php';

echo 'checkpoint 7';

// Mark afterLoad in the profiler.
JDEBUG ? $_PROFILER->mark('afterLoad') : null;

echo 'checkpoint 9';

// Instantiate the application.
$app = JFactory::getApplication('site');

echo 'checkpoint 11';

// Initialise the application.
$app->initialise();

echo 'checkpoint 13';

// Mark afterIntialise in the profiler.
JDEBUG ? $_PROFILER->mark('afterInitialise') : null;

echo 'checkpoint 15';

// Route the application.
$app->route();

echo 'checkpoint 17';

// Mark afterRoute in the profiler.
JDEBUG ? $_PROFILER->mark('afterRoute') : null;

echo 'checkpoint 19';

// Dispatch the application.
$app->dispatch();

echo 'checkpoint 21';

// Mark afterDispatch in the profiler.
JDEBUG ? $_PROFILER->mark('afterDispatch') : null;

echo 'checkpoint 23';

// Render the application.
$app->render();

echo 'checkpoint 25';

// Mark afterRender in the profiler.
JDEBUG ? $_PROFILER->mark('afterRender') : null;

echo 'checkpoint 27';

// Return the response.
echo $app;
