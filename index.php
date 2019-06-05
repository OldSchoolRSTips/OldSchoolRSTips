<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="icon" type="image/png" href="daggers.png" />

	<title>OSRS Tips - The free and open source community-made tips database for Old School RuneScape players of all types</title>

	<script>
    let _tips = "";

    function setSlogan(newSlogan)
		{
			document.getElementById("slogan").innerHTML = newSlogan;
		};

//  Sets slogan and returns the json file relevant to the subdomain.
		function getDomainFile()
		{
			const URL = window.location.host;
			const splits = URL.split('.');
			const subdomain = splits[0];
      
      switch(subdomain)
			{
				case "f2p":
					setSlogan("New players without membership");
          return "tips_f2p.json";
				case "noob":
					setSlogan("New players with membership");
          return "tips_noob.json";
				case "iron":					
					setSlogan("Tips for the BTWs");
          return _jsonfile = "tips_iron.json";
				case "pvp":
					setSlogan("Spade chasing");
          return _jsonfile = "tips_pvp.json";
				default:
					return _jsonfile = "tips_general.json";
			} 
		}

		function getUrlVars(variable)
		{
			var query = window.location.search.substring(1);
			var vars = query.split("&");

			for (var i=0; i<vars.length; i++)
			{
				var pair = vars[i].split("=");
				if(pair[0] == variable){ return pair[1]; }
			}
			return(false);
		}

		function like()
		{
			alert("The beloved Like feature is not yet complete. Just pretend you see a number between 1 and 150 until it's released. Keep an eye on the GitHub repo for news!");
		}

		function comment()
		{
			alert("The beloved Comment feature is not yet complete. Setup with Disqus is still pending. To provide feedback, please use GitHub for now.");
		}

		function loadJSON(jpath)
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

    function getTipNumber()
    {
      const parsedUrl = new URL(window.location);
			const newUrl = parsedUrl.pathname;
      return Number(newUrl.replace("/", ""));
    }

    function updateTipDisplay(tipData) 
    {
      const { tips, tipNumber } = tipData;
      document.getElementById("tipH1").textContent = `Tip #${tips[tipNumber].id}`;
      document.getElementById("tipParagraph").innerHTML = `${tips[tipNumber].text}`;
    }

    function loadTip(tipNumber)
    {
      // Catches default value for random tip or NaN from parsing URL without a tip number
      if (!tipNumber) {
        const randomNumber = realRandom( 0, Object.keys(_tips).length )
        window.history.pushState("", "", randomNumber + 100);
        return {
          tips: _tips,
          tipNumber: randomNumber
        };
      }
      window.history.pushState("", "", tipNumber);
      return {
        tips: _tips,
        tipNumber: tipNumber - 100
      };
    }

    function generateTip(tipNumber)
    {
      updateTipDisplay(loadTip(tipNumber));
    }

		function init()
		{
      const _tipNumber = getTipNumber();
      const _jsonfile = getDomainFile();
      _tips = loadJSON(_jsonfile);
			_tips = JSON.parse(_tips);
			
      generateTip(_tipNumber);

      // Enables navigating through tips with arrow keys.
      document.addEventListener('keyup', event => {
        if ( event.key === "ArrowLeft" && ( getTipNumber() - 1 ) >= 100 ) {
          generateTip(getTipNumber() - 1);
          return
          };
        if ( event.key === "ArrowRight" && ( getTipNumber() + 1)  <= ( _tips.length + 99 )) {
          generateTip(getTipNumber() + 1);
          return
          };
        alert(
          "There are no more tips in this direction! If you are looking for more information " +
          "perhaps you can look at the OSRS wiki located at https://oldschool.runescape.wiki/"
        );
      });
		}

		function realRandom(min, max) //js randomizer sucks
		{
			return Math.floor( Math.random() * (max - min) ) + min;
		}
	</script>
		<!-- Global site tag (gtag.js) - Google Analytics, for all you curious readers -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-65007791-3"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-65007791-3');
	</script>

</head>
<body onLoad="init();">
<div id="background"></div>
<?PHP

echo "<h1>OldSchoolRS.Tips (Beta)</h1>";
echo "<p id=\"slogan\" style=\"margin-left:16px; margin-top:-20px; font-size:22px;\">By players. For players.</p>";

echo "<div id='tip'>";
echo "<h1 id='tipH1'>";
echo "</h1>";
echo "<p id='tipParagraph'>";
echo "</p>";
echo "</div>";
echo "<div id='shelf'>";

echo "<span onClick='like();'>
❤️0
</span>";

echo "<span onClick='comment();'>
🗨️0
</span>";

echo "<span onClick='generateTip();'>
🎲
</span>";
echo "</div>";

echo "<div id='footer'>";
echo "<span><a href='http://oldschoolrs.tips'>Home</a> | <a href='http://noob.oldschoolrs.tips'>New players</a> | F2P (soon) | PvP (soon) | Ironman (soon) | <a href='https://github.com/OldSchoolRSTips/OldSchoolRSTips/issues/new?title=Suggestion&body=Idea:' target='_blank'>Suggest a tip</a> | <a href='https://github.com/OldSchoolRSTips/OldSchoolRSTips' target='_blank'>GitHub</a> | <a href='https://old.reddit.com/r/OldSchoolRSTips/' target='_blank'>Reddit</a></span>";
echo "</div>";
?>
</body>
</html>
