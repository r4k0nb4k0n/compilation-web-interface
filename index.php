<?php 
	session_start();
	$cwd = "./sessions/".session_id()."/";
	$time = 60 * 10; // 10 minutes only.
	if (!isset($_SESSION['EXPIRES']) || $_SESSION['EXPIRES'] < time()+$time) {
		shell_exec("rm ".$cwd."*");
    	session_destroy();
    	$_SESSION = array();
	}
	$_SESSION['EXPIRES'] = time() + $time;
?>
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
	<?PHP
		shell_exec("mkdir ./sessions/".session_id()); // 세션의 고유 ID을 이름으로 하는 디렉토리 생성
	
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Execute the program when compilation is successfully done.
			$_SESSION[code] = $_POST["editor"];
			$_SESSION[stdin] = $_POST["stdin"];
			if (isset($_POST["execute"])){
				if (empty($_POST["editor"])) {
    				$_SESSION[status] = "Code is required.";
  				} 
				else {
					$_SESSION[src] = fopen($cwd."src.c", "w+") or die("Unable to open file!");
					shell_exec("rm ".$cwd."prog");
    				fwrite($_SESSION[src], $_POST["editor"]);
					fclose($_SESSION[src]); 
					$_SESSION[status] = shell_exec("gcc -o ".$cwd."prog ".$cwd."src.c 2>&1");
					if ($_SESSION[status] == ""){ // When compilation is succesfully done,
						$_SESSION[stdin_file] = fopen($cwd."in.txt", "w+") or die("Unable to open file!");
						fwrite($_SESSION[stdin_file], $_POST["stdin"]);
						fclose($_SESSION[stdin_file]);
						$_SESSION[stdout] = shell_exec($cwd."prog < ".$cwd."in.txt"); // Execute the program.
					}
				}
			}
			// Initiate all files.
  			else if(isset($_POST["init"])){
				$_SESSION[code] = "";
				$_SESSION[status] = "";
				$_SESSION[stdin] = "";
				$_SESSION[stdout] = "";
				shell_exec("rm ".$cwd."*");
			}
		}	
	?>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	
	<header class="w3-container w3-teal">
  		<h1>
			C Compiler Web Interface
			<input class="w3-button w3-gray" type="submit" name="execute" value="Execute">
			<input class="w3-button w3-gray" type="submit" name="init" value="Init">
		</h1>
	</header>
	<div class="w3-cell-row">
		<div class="w3-container w3-cell">
			<p>
				<h3>Code</h3>
				<textarea autofocus id="textarea_editor" name="editor"><?php echo $_SESSION[code];?></textarea>
			</p>
			<p>
				<h3>Status</h3>
				<textarea id="textarea_status" name="status"><?php echo $_SESSION[status];?></textarea>
			</p>
		</div>
		<div class="w3-container w3-cell">
 			<p>
				<h3>STDIN</h3>
				<textarea id="textarea_stdin" name="stdin"><?php echo $_SESSION[stdin];?></textarea>
			</p>
 			<p>
				<h3>STDOUT</h3>
				<textarea id="textarea_stdout" name="stdout"><?php echo $_SESSION[stdout];?></textarea>
			</p>
		</div>
	</div>

	</form>
</body>

</html>	

<script>
	var w = window.innerWidth;
	var h = window.innerHeight;
	var textarea_editor = document.getElementById('textarea_editor');
	var codemirror_editor = CodeMirror.fromTextArea(textarea_editor, {
    	lineNumbers: true,
   		//lineWrapping: true,
    	matchBrackets: true,
		styleActiveLine: true,
		smartIndent: false,
		indentUnit: 4,
		autofocus: true,
		mode: "text/x-csrc",
    	theme: "solarized dark",
		val: textarea_editor.value
	});
	codemirror_editor.setSize(w/2, h/3);
	var textarea_stdin = document.getElementById('textarea_stdin');
	var codemirror_stdin = CodeMirror.fromTextArea(textarea_stdin, {
    	lineNumbers: true,
   		//lineWrapping: true,
		styleActiveLine: true,
		smartIndent: false,
		indentUnit: 4,
		val: textarea_stdin.value
	});
	codemirror_stdin.setSize(w/2, h/3);
	var textarea_status = document.getElementById('textarea_status');
	var codemirror_status = CodeMirror.fromTextArea(textarea_status, {
    	readOnly: "nocursor",
		mode: "text/x-sh",
		val: textarea_status.value
	});
	codemirror_status.setSize(w/2, h/3);
	var textarea_stdout = document.getElementById('textarea_stdout');
	var codemirror_stdout = CodeMirror.fromTextArea(textarea_stdout, {
    	lineNumbers: true,
   		//lineWrapping: true,
		readOnly: true,
		val: textarea_stdout.value
	});
	codemirror_stdout.setSize(w/2, h/3);
</script>