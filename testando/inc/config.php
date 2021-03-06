<?php
# -- BEGIN LICENSE BLOCK ---------------------------------------
#
# This file is part of Dotclear 2.
#
# Copyright (c) 2003-2011 Olivier Meunier & Association Dotclear
# Licensed under the GPL version 2.0 license.
# See LICENSE file or
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
#
# -- END LICENSE BLOCK -----------------------------------------
if (!defined('DC_RC_PATH')) { return; }

// Database driver (mysql, pgsql, sqlite)
define('DC_DBDRIVER','mysql');

// Database hostname (usually "localhost")
define('DC_DBHOST','mysql.main-hosting.com');

// Database user
define('DC_DBUSER','u313230586_zesel');

// Database password
define('DC_DBPASSWORD','LeMysyjysa');

// Database name
define('DC_DBNAME','u313230586_dasax');

// Tables' prefix
define('DC_DBPREFIX','dc_');

// Persistent database connection
define('DC_DBPERSIST',false);

// Crypt key (password storage)
define('DC_MASTER_KEY','fda1ccfe27b9c66a4ae841e0b6ca1d40');


// Admin URL. You need to set it for some features.
define('DC_ADMIN_URL','http://shoelbriegel.com/testando/admin/');

// Admin mail from address. For password recovery and such.
define('DC_ADMIN_MAILFROM','steph.hoel@gmail.com');

// Cookie's name
define('DC_SESSION_NAME','dcxd');

// Plugins root
define('DC_PLUGINS_ROOT',dirname(__FILE__).'/../plugins');

// Template cache directory
define('DC_TPL_CACHE',dirname(__FILE__).'/../cache');


// If you have PATH_INFO issue, uncomment following lines
//if (!isset($_SERVER['ORIG_PATH_INFO'])) {
//	$_SERVER['ORIG_PATH_INFO'] = '';
//}
//$_SERVER['PATH_INFO'] = $_SERVER['ORIG_PATH_INFO'];


// If you have mail problems, uncomment following lines and adapt it to your hosting configuration
// For more information about this setting, please refer to http://doc.dotclear.net/2.0/admin/install/custom-sendmail
//function _mail($to,$subject,$message,$headers)
//{
//	socketMail::$smtp_relay = 'my.smtp.relay.org';
//	socketMail::mail($to,$subject,$message,$headers);
//}

?>