<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>Data Design Project</title>
	</head>
	<body>
		<header>
			<h1>Data Design Project</h1>
			<p>By Lucas Laudick</p>
		</header>
		<main>
			<h2>Enitites and Attributes</h2>
			<h3>Profile</h3>
			<ul>
				<li>Player</li>
				<li>Rank</li>
				<li>Location</li>
				<li>Social Media</li>
			</ul>
			<h3>Statistics</h3>
			<ul>
				<li>Live stats</li>
				<li>Standings</li>
				<li>Position</li>
			</ul>
			<h3>Article</h3>
			<ul>
				<li>Author</li>
				<li>Content</li>
				<li>Date posted</li>
			</ul>
			<h3>Author</h3>
			<ul>
				<li>Name</li>
				<li>Email</li>
				<li>Hash and Salt</li>
			</ul>
			<h2>Persona</h2>
			<h3>Name: Dillon Miller</h3>
			<h3>Age: 28</h3>
			<h3>Profession:</h3>
			<p>cpa at tax firm looking to check up on live stats of his favorite player and their rank or
			statistics
			going into the next professional event. While working Monday through Friday and sometimes Saturdays and
			tournaments start on Thursday of each week, making it hard to watch during those days forcing individuals to
			check out the site in order to be up to date on their favorite player.
			</p>
			<h3>Technology:</h3>
			<p>Mac Pro Desktop, Mac laptop at home or used for the office, or Iphone 6 with mobile app
			availability.</p>
			<h3>Attitudes and Behaviors:</h3>
			<p>Long hours throughout the week including late nights at the office, and working
			Saturdaysevery so often. Dillon has no time to watch the players live so only has time to pull up the pga tour website every
			so often and needs specific information about players he is interested in.</p>
			<h3>Frustrations and Needs:</h3>
			<p>Dillon works at a cpa firm, works long weeks and sometimes weekends and wants to be up to
			date on his favorite players. Working the long hours required only allows him little time to check updates. Dillon
			looks to find specific information you might not be able to find on any website.</p>
			<h3>Goals:</h3>
			<p>Dillon looks to the pgatour site to find the live updates in order to be up to date on the players
			heading into the weekend. He also looks to find out what specific players are playing well heading into
			the next tournament.</p>
			<h2>Use Case:</h2>
			<h3>Goal: Access PGAtour player world rank</h3>
			<p>A user accesses the website, finds the player profile, clicks on the link to find player rank in the world.</p>
			<h3>Goal: Access articles on specific player through player profile</h3>
			<p>A user accesses the website, finds the player profile, clicks the link to profile, clicks the player article link.</p>
			<h2>Relations</h2>
			<h3>Profile to Stats,    m - to - n</h3>
			<p>There can be many players profiles to many different stats and many different stats to many different player profile.</p>
			<h3>Author to Article,   m - to - n</h3>
			<p>There can be many different authors to many different articles and many different articles to many different authors.</p>
		</main>
	</body>
</html>