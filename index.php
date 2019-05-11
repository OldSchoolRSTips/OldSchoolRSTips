<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="icon" type="image/png" href="daggers.png" />

	<title>OSRS Tips</title>

	<script>
		var _tips = "";
		var firstLoad = true;

		function loadJSON(jpath) //loads "tips.json" into memory
		{
			var result = null;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", jpath, false);
			xmlhttp.send();

			if (xmlhttp.status==200)
			{
				result = xmlhttp.responseText;
			}

  			return result;
		}

		function init()
		{

			_tips = loadJSON("tips.json");
			_tips = JSON.parse(_tips);

			if(document.getElementById("tipParagraph").innerHTML == "" && firstLoad == true)
			{
				firstLoad = false;
				reRoll(); //only do if empty
			}
		}

		function realRandom(min, max) //js randomizer sucks
		{
			return Math.floor(Math.random() * (max - min)) + min;
		}

		function reRoll() //asynchronous content changer - no more page reloading
		{
			var roll = realRandom( 0, Object.keys(_tips).length );
			document.getElementById("tip").innerHTML = "<h1>Tip #"+_tips[roll].id+"</h1>";
			document.getElementById("tip").innerHTML += "<p>"+_tips[roll].text+"</p>";
			document.getElementById("permalink").innerHTML = "<a href='?tip="+_tips[roll].id+"'>🔗</a>";
		}
	</script>
</head>
<body onLoad="init();">
<div id="background"></div>
<?PHP

$TIPS = file_get_contents("tips.json");
$TIPS = json_decode($TIPS, true);

echo "<h1>OldSchoolRS Tips</h1>";
echo "<p style=\"margin-left:46px; margin-top:-20px; font-size:22px;\">By players. For players.</p>";

$result = NULL;



if( isset($_GET["tip"]) && $_GET["tip"] >= 100 ) //tips start at 100, not 1
{
	$result = (int) $_GET["tip"];
	$result -= 100;
	$resultID = $TIPS[$result]["id"];
	$resultText = $TIPS[$result]["text"];
}
else if ( !isset($_GET["tip"]) ) //todo: kill this and replace it with javascript?
{
	$resultID = null;
	$resultText = "";
}
else
{
	die("<p>Go away, Jed.</p>");
}


echo "<div id='tip'>";

echo "<h1 id='tipH1'>";
echo "Tip #";
echo $resultID;
echo "</h1>";

echo "<p id='tipParagraph'>";
echo $resultText;
echo "</p>";
echo "</div>";

echo "<div id='shelf'>";

echo "<span id='permalink'>
<a href='?tip={$TIPS[$result]["id"]}'>🔗</a>
</span>";

echo "<span onClick='like();'>
❤️
</span>";

echo "<span>
<a href='https://github.com/OldSchoolRSTips/OldSchoolRSTips/issues/new?title=Feedback%20on%20tip%20number%20{$TIPS[$result]["id"]}&body=These%20are%20my%20comments,%20questions,%20and%20suggestions:'>🗨️
</a>
</span>";

echo "<span onClick='reRoll();'>
🎲
</span>";
echo "</div>";

echo "<div id='footer'>";
echo "<span>Top tips(soon) | New player tips(soon) | Ironman tips(soon) | <a href='https://github.com/OldSchoolRSTips/OldSchoolRSTips/blob/master/tips.json' target='_blank'>Browse all</a> | <a href='https://github.com/OldSchoolRSTips/OldSchoolRSTips/issues/new?title=Suggestion&body=Idea:' target='_blank'>Suggest a tip</a> | <a href='https://github.com/OldSchoolRSTips/OldSchoolRSTips' target='_blank'>GitHub Repository</a></span>";
echo "</div>";
?>
</body>
</html>
