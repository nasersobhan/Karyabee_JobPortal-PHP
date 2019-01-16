<?

DEFINE ('DB_USER', 'your_username');
DEFINE ('DB_PASSWORD', 'your_password');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'your_databasename');

$hostname = "localhost"; 
$database = "karyabee_x111"; 
$username = "karyabee_xmyuser"; 
$password = "5*HfHs&H0XKG";  

// Make the connnection and then select the database.
$dbc = @mysql_connect ($hostname, $username, $password) OR die ('Could not connect to MySQL: ' . mysql_error() );
mysql_select_db ($database) OR die ('Could not select the database: ' . mysql_error() );

?>