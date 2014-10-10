<html>
<head>
<title>Ci PHP Sample Code</title>
</head>

<body>
	<FORM name ="login" method ="post" action ="accessToken.php">

<Input type = 'Radio' Name ='gender' value= 'male'
<?PHP print $male_status; ?>
>Male

<Input type = 'Radio' Name ='gender' value= 'female'
<?PHP print $female_status; ?>
>Female

<P>
<Input type = "Submit" Name = "Submit1" VALUE = "Select a Radio Button">

</FORM>
</body>
</html>