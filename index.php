<meta charset="utf-8"/>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<script src="extension/codemirror/lib/codemirror.js"></script>
	<link rel="stylesheet" href="extension/codemirror/lib/codemirror.css">
	<script src="extension/codemirror/mode/clike/clike.js"></script>
	<script src="extension/codemirror/mode/shell/shell.js"></script>
	<link rel="stylesheet" href="extension/codemirror/theme/solarized.css">
	<script src="extension/codemirror/addon/selection/active-line.js"></script>
	<script src="extension/codemirror/addon/edit/matchbrackets.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title>C Compiler Web Interface</title>
</head>
<body>
	<?php
		$stdout = "";
		$error = "";
		
		shell_exec("rm in.txt"); // clear in.txt when you first execute
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			shell_exec("rm src.c");
			if (isset($_POST["compile"])){
				if (empty($_POST["editor"])) {
    				$codeErr = "Code is required";
  				} 
				else {
					$src = fopen("./src.c", "w+") or die("Unable to open file!");
					shell_exec("rm ./prog");
    				fwrite($src, $_POST["editor"]);
					fclose($src); 
					$error = shell_exec("gcc -o prog src.c 2>&1");
					
				}
			}
  			else if(isset($_POST["execute"])){
				$stdin = fopen("./in.txt", "w+") or die("Unable to open file!");
				fwrite($stdin, $_POST["stdin"]);
				fclose($stdin);
				$stdout = shell_exec("./prog < in.txt");				
			}	
			$code=shell_exec("cat src.c");
			$input=shell_exec("cat in.txt");
		}	
		
	?>
	
	<header class="w3-container w3-teal">
  		<h1>C Compiler Web Interface</h1>
	</header>
	
	<div class="w3-cell-row">
		<div class="w3-container w3-cell">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
			<p><!-- The Code Editor using codemirror -->	
				<h3>CODE</h3>
				<textarea autofocus id="editor" name="editor"><?php echo $code;?></textarea>
			</p>
			<p><!-- Print the status of the compilation -->
				<h3>Status</h3>
				<textarea readonly id="compile" name="status"><?php echo $error;?></textarea></p>
			</p>
			<p>
				<input class="w3-button w3-teal" type="submit" name="compile" value="Compile">
			</p>
		</div>	

		<div class="`w3-container w3-cell">
 			<p><!-- Write the stdin of the program -->
				<h3>STDIN</h3>
				<textarea id="stdin" name="stdin"><?php echo $input;?></textarea>
			</p>
 			<p><!-- Print the stdout of the program -->
				<h3>STDOUT</h3>
				<textarea id="stdout" name="stdout"><?php echo $stdout;?></textarea>
			</p>
			<p>
				<input class="w3-button w3-teal" type="submit" name="execute" value="Execute">
			</p>
			</form>
		</div>
	</div>
	</body>
</html>	

<script>
	var w = window.innerWidth;
	var h = window.innerHeight;
	var textarea = document.getElementById('editor');
	var editor = CodeMirror.fromTextArea(textarea, {
    	lineNumbers: true,
   		//lineWrapping: true,
    	matchBrackets: true,
		styleActiveLine: true,
		smartIndent: false,
		indentUnit: 4,
		autofocus: true,
		mode: "text/x-csrc",
    	theme: "solarized dark",
		val: textarea.value
	});
	editor.setSize(w/2, h/3);
	var textareain = document.getElementById('stdin');
	var stdin = CodeMirror.fromTextArea(textareain, {
    	lineNumbers: true,
   		//lineWrapping: true,
		styleActiveLine: true,
		smartIndent: false,
		indentUnit: 4,
		val: textareain.value
	});
	stdin.setSize(w/2, h/3);
	var textareaerr = document.getElementById('compile');
	var compile = CodeMirror.fromTextArea(textareaerr, {
    	readOnly: "nocursor",
		mode: "text/x-sh",
		val: textareaerr.value
	});
	compile.setSize(w/2, h/3);
	var textareaout = document.getElementById('stdout');
	var stdout = CodeMirror.fromTextArea(textareaout, {
    	lineNumbers: true,
   		//lineWrapping: true,
		readOnly: true,
		val: textareaout.value
	});
	stdout.setSize(w/2, h/3);
</script>