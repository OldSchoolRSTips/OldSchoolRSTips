<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="icon" type="image/png" href="daggers.png" />

	<title>OSRS Tips - The free and open source community-made tips database for Old School RuneScape players of all types</title>

	<script>
		var _tips = "";
		var _subdomain = "";
		var firstLoad = true;

		function getSubdomain()
		{
			var URL = window.location.host;
			var splits = URL.split('.');
			var subdomain = splits[0];
			return subdomain;
		}

		function setSlogan(newSlogan)
		{
			document.getElementById("slogan").innerHTML = newSlogan;
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

		function init()
		{
			_subdomain = getSubdomain();
			_jsonfile = ""

			switch(_subdomain)
			{
				case "f2p":
					_jsonfile = "tips_f2p.json";
					setSlogan("New players without membership");
				break;
				case "noob":
					_jsonfile = "tips_noob.json";
					setSlogan("New players with membership");
				break;
				case "iron":
					_jsonfile = "tips_iron.json";
					setSlogan("Tips for the BTWs");
				break;
				case "pvp":
					_jsonfile = "tips_pvp.json";
					setSlogan("Spade chasing");
				break;
				default:
					_jsonfile = "tips_general.json";
			} 

			_tips = loadJSON(_jsonfile);
			_tips = JSON.parse(_tips);
			var _get; 


			var parsedUrl = new URL(window.location);
			var newUrl = parsedUrl.pathname;
			_get = newUrl.replace("/", "");


			if( _get == false )
			{
				randRoll();
			}
			else
			{
				permRoll(_get);
				window.history.pushState("", "", _get);
			}

		}

		function realRandom(min, max) //js randomizer sucks
		{
			return Math.floor( Math.random() * (max - min) ) + min;
		}

		function processTags(tags)
		{
			//iterate through all tags
			//tags div inner html += decided image for tag.
			//skill icons, coin icon, 1/2/3 stripe rank/difficulty	

			document.getElementById("tags").innerHTML = "";	

			if(tags)
			{
				var _finalTagImages = "";
				//alert(tags);
				if( tags.includes('woodcutting') )
				{
					_finalTagImages += "<img class='timg' src='tagimg/18.png'>";
				}
				if( tags.includes('runecrafting') )
				{
					_finalTagImages += "<img class='timg' src='tagimg/19.png'>";
				}
				if( tags.includes('slayer') )
				{
					_finalTagImages += "<img class='timg' src='tagimg/20.png'>";
				}
				if( tags.includes('farming') )
				{
					_finalTagImages += "<img class='timg' src='tagimg/21.png'>";
				}
				if( tags.includes('hunter') )
				{
					_finalTagImages += "<img class='timg' src='tagimg/23.png'>";
				}
				if( tags.includes('magic') )
				{
					_finalTagImages += "<img class='timg' src='tagimg/16.png'>";
				}
				if( tags.includes('construction') )
				{
					_finalTagImages += "<img class='timg' src='tagimg/22.png'>";
				}
				if( tags.includes('prayer') )
				{
					_finalTagImages += "<img class='timg' src='tagimg/13.png'>";
				}
				if( tags.includes('money') )
				{
					_finalTagImages += "<img class='timg' src='tagimg/coins.png'>";
				}
				if( tags.includes('frugal') )
				{
					_finalTagImages += "<img class='timg' src='tagimg/coins.png'>";
				}
				if( tags.includes('combat') )
				{
					_finalTagImages += "<img class='timg' src='tagimg/1.png'>";
				}
				if( tags.includes('skull') )
				{
					_finalTagImages += "<img class='timg' src='tagimg/pvp.png'>";
				}

				document.getElementById("tags").innerHTML = _finalTagImages;

				_finalTagImages = "";
			}
		}

		function randRoll() //rolls a random tip and sets it
		{
			//

			var roll = realRandom( 0, Object.keys(_tips).length );
			processTags(_tips[roll].tags);
			document.getElementById("tipH1").innerHTML = "Tip #"+_tips[roll].id;
			document.getElementById("tipParagraph").innerHTML = _tips[roll].text;
			
			

			window.history.pushState("", "", roll+100);
		}

		function permRoll(get) //loads a specific tip
		{
			//document.getElementById("tags").innerHTML = "";	
			
			get -= 100; //starts at 100!
			processTags(_tips[get].tags);
			document.getElementById("tipH1").innerHTML = "Tip #"+_tips[get].id+"";
			document.getElementById("tipParagraph").innerHTML = ""+_tips[get].text+"";

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

echo "<h1>OldSchoolRS.tips (Beta 2)</h1>";
echo "<p id=\"slogan\" style=\"margin-left:16px; margin-top:-20px; font-size:22px;\">By players. For players.</p>";

echo "<div id='tip'>";

echo "<span id='tags'> </span>";

echo "<h1 id='tipH1'>";
echo "</h1>";



echo "<p id='tipParagraph'>";
echo "</p>";

echo "</div>";

echo "<div id='shelf'>";

echo "<span onClick='like();'>❤️0
</span>";

echo "<span onClick='comment();'>
🗨️0
</span>";

echo "<span onClick='randRoll();'>
🎲
</span>";
echo "</div>";

echo "<div id='footer'>";
echo "<span><a href='http://oldschoolrs.tips'>Home</a> | <a href='http://noob.oldschoolrs.tips'>New players</a> | F2P (soon) | PvP (soon) | Ironman (soon) | <a href='https://forms.gle/6MuLEKsB9byTN5Ng8' target='_blank'>Suggest a tip</a> | <a href='https://github.com/OldSchoolRSTips/OldSchoolRSTips' target='_blank'>GitHub</a> | <a href='https://old.reddit.com/r/OldSchoolRSTips/' target='_blank'>Reddit</a></span>";
echo "</div>";
?>
</body>
</html>
