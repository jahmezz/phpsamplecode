<html>
<head>
<title>Ci PHP Sample Code</title>
<?PHP
	set_include_path("C:\wamp\bin\php\php5.5.12\php");
	require_once "HTTP\Request2.php";
	$api_key='b511eaf948524c7aa6b84e04b0c935a8';
	$api_secret='dff6796c11a34ba8bc5c4fa21633ee23';
	$error_msg = '';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$username = $_POST['username'];
		$password = $_POST['password'];
		//filter html characters
		$username = htmlspecialchars($username);
		$password = htmlspecialchars($password);
		$userpass64 = base64_encode($username . '.' . $password);

		$r = new HTTP_Request2('https://api.cimediacloud.com/oauth2/token', HTTP_Request2::METHOD_POST);
		$r->setAdapter('curl');
		$r->addPostParameter(array('client_id' => $api_key, 'client_secret' => $api_secret, 'grant_type' => 'password'));
		$r->setAuth($username, $password, HTTP_Request2::AUTH_BASIC);
		foreach ($r->getHeaders() as $name => $value) {
    		echo "request $name: $value\n";
		}
		echo $r->getBody();
		try {
		    echo $r->send()->getBody();
		} catch (HttpException $ex) {
		    echo $ex;
		}
	}
?>
</head>

<body>
	Welcome to the Ci API PHP Sample code page! Please fill in your Ci Login credentials to continue.
	<br><br>
<FORM name ="form1" method ="post" action ="main.php">
	Username
	<Input type = 'Text' Name ='username' value= ''>
	<br>
	Password
	<Input type = 'Password' Name ='password' value= ''>
	<?PHP print $error_msg; ?>
	<br>
	<Input type = "Submit" Name = "Submit" VALUE = "Login">
</FORM>	
</body>
</html>