<html>
<head>
<title>Ci PHP Sample Code</title>
<?PHP
	require_once "HTTP/Request.php";
	$api_key='';
	$api_secret='';
	$error_msg = '';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$username = $_POST['username'];
		$password = $_POST['password'];
		//filter html characters
		$username = htmlspecialchars($username);
		$password = htmlspecialchars($password);
		$userpass64 = base64_encode($username . '.' . $password);

		$r = new HttpRequest('https://api.cimediacloud.com/oauth2/token', HttpRequest::METH_POST);
		$r->addHeader('Authorization', 'Basic ' . userpass64);
		$r->addPostFields(array('client_id' => $api_key, 'client_secret' => $api_secret));
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
	<Input type = 'Text' Name ='password' value= ''>
	<?PHP print $error_msg; ?>
	<br>
	<Input type = "Submit" Name = "Submit" VALUE = "Login">
</FORM>	
</body>
</html>