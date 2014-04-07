<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
 
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', $_ENV['OPENSHIFT_APP_NAME']);
 
/** MySQL database username */
define('DB_USER', $_ENV['OPENSHIFT_MYSQL_DB_USERNAME']);
 
/** MySQL database password */
define('DB_PASSWORD', $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD']);
 
/** MySQL hostname */
define('DB_HOST', $_ENV['OPENSHIFT_MYSQL_DB_HOST'] . ':' . $_ENV['OPENSHIFT_MYSQL_DB_PORT']);
 
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');
 
/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');


$conn = mysql_connect('DB_HOST', 'DB_USER', 'DB_PASSWORD') or die (mysql_error());

$sql = 'INSERT INTO test'.
       '(userID, firstName, lastName, userEmail, userRole) '.
       'VALUES ( 1111, "Harrison", "Schueler", "buluen@gmail.com", 1 )';

$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
echo "Entered data successfully\n";
mysql_close($conn);
?>