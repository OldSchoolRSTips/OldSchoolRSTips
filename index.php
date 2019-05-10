<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="icon" type="image/png" href="daggers.png" />
	<title>OSRS Tips</title>
	<style>

	</style>
</head>
<body>
<div id="background"></div>
<?PHP

$TIPS = file_get_contents("tips.json");
$TIPS = json_decode($TIPS, true);

echo "<h1>OldSchoolRS Tips</h1>";
echo "<p style=\"margin-left:46px; margin-top:-20px; font-size:22px;\">By players. For players.</p>";

$result = NULL;

if( isset($_GET["tip"]) && $_GET["tip"] >= 100 )
{
	
	$result = (int) $_GET["tip"];
	$result -= 100;
}
else if ( !isset($_GET["tip"]) )
{
	$result = mt_rand( 0, count($TIPS) );
	if ( $result === count($TIPS) ) $result--;
}
else
{
	die("<p>Go away, Jed.</p>");
}


echo "<div id='tip'>";

echo "<h1>";
echo "Tip #";
echo $TIPS[$result]["id"];
echo "</h1>";

echo "<p>";
echo $TIPS[$result]["text"]."<br>";
echo "</p>";
echo "</div>";

echo "<div id='shelf'>";

echo "<span>
<a href='?tip={$TIPS[$result]["id"]}'>🔗</a>
</span>";

echo "<span>
❤️
</span>";

echo "<span>
<a href='https://github.com/OldSchoolRSTips/OldSchoolRSTips/issues/new?title=Feedback%20on%20tip%20number%20{$TIPS[$result]["id"]}&body=These%20are%20my%20comments,%20questions,%20and%20suggestions:'>🗨️
</a>
</span>";

echo "<span>
<a href='index.php'>🎲</a>
</span>";
echo "</div>";

echo "<div id='footer'>";
echo "<span>Top tips(soon) | New player tips(soon) | Ironman tips(soon) | <a href='https://github.com/OldSchoolRSTips/OldSchoolRSTips/blob/master/tips.json' target='_blank'>Browse all</a> | <a href='https://github.com/OldSchoolRSTips/OldSchoolRSTips/issues/new?title=Suggestion&body=Idea:' target='_blank'>Suggest a tip</a> | <a href='https://github.com/OldSchoolRSTips/OldSchoolRSTips' target='_blank'>GitHub Repository</a></span>";
echo "</div>";
?>
</body>
</html>