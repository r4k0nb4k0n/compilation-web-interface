<meta charset="utf-8"/>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="lib/codemirror.js"></script>
<link rel="stylesheet" href="lib/codemirror.css">
<script src="/mode/clike/clike.js"></script>
<script src="/addon/selection/active-line.js"></script>
<script src="/addon/edit/matchbrackets.js"></script>
<head>
	<title>Web Compiler</title>
</head>
<body>
	<h1>Web Compiler</h1>
	
	<?php
		$codeErr = "";
		$result = "";
		$error = "";
		$myfile = fopen("./src.c", "w+") or die("Unable to open file!");
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
  			if (empty($_POST["editor"])) {
    			$codeErr = "Code is required";
  			} 
			else {
    			fwrite($myfile, $_POST["editor"]);
				fclose($myfile);
				$error = shell_exec("gcc -o prog src.c 2>&1");
				$result = shell_exec("./prog");
			}
		}
		fclose($myfile);
	?>
	
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		Code:
		<br> 
			<textarea id="editor" name="editor"></textarea>
		<br>
		<input type="submit" name="submit" value="컴파일 및 실행">
	</form>
	
	<!-- Print the err of the compilation -->
	<h1>
		Compile
	</h1>
	<?php
		echo $error."<br>";
		echo $_POST["code"];
	?>
	
	<!-- Print the stdout of the program -->
	<h1>
		Result
	</h1>
	<?php
		echo $result;
	?>
</body>
</html>

<script> 
	var textarea = document.getElementById('editor');
	var editor = CodeMirror.fromTextArea(textarea, {
    	lineNumbers: true,
   		lineWrapping: true,
    	matchBrackets: true,
		smartIndent: true,
		mode: "c++",
    	theme: "solarized dark",
		val: textarea.value
	});
</script>