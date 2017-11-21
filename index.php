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
	<?php
		$codeErr = "";
		$stdout = "";
		$error = "";
		$src = fopen("./src.c", "w+") or die("Unable to open file!");
		$in = fopen("./in.txt", "w+") or die("Unable to open file!");
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
  			if (empty($_POST["editor"])) {
    			$codeErr = "Code is required";
  			} 
			else {
    			fwrite($src, $_POST["editor"]); fwrite($in, $_POST["stdin"]);
				fclose($src); fclose($in);
				$error = shell_exec("gcc -o prog src.c 2>&1");
				$stdout = shell_exec("./prog < in.txt");
				shell_exec("rm ./prog");
			}
		}
		fclose($src); fclose($in);
	?>
	<h1>Web Compiler</h1>
	
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<h2>CODE</h2>
		<textarea id="editor" name="editor"></textarea>
		<h2>STDIN</h2>
		<textarea id="stdin" name="stdin"></textarea>
		<br>
		<input type="submit" name="submit" value="컴파일 및 실행">
	</form>
	
	<!-- Print the err of the compilation -->
	<h1>
		Compile
	</h1>
	<textarea id="compile" name="compile"><?php echo $error;?></textarea>
	
	<!-- Print the stdout of the program -->
	<h1>
		stdout
	</h1>
	<textarea id="stdout" name="stdout"><?php echo $stdout;?></textarea>
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
	var textareain = document.getElementById('stdin');
	var stdin = CodeMirror.fromTextArea(textareain, {
    	lineNumbers: true,
   		lineWrapping: true,
		val: textarea.value
	});
	var textareaerr = document.getElementById('compile');
	var compile = CodeMirror.fromTextArea(textareaerr, {
    	lineNumbers: true,
   		lineWrapping: true,
		val: textarea.value
	});
	var textareaout = document.getElementById('stdout');
	var stdout = CodeMirror.fromTextArea(textareaout, {
    	lineNumbers: true,
   		lineWrapping: true,
		val: textarea.value
	});
</script>