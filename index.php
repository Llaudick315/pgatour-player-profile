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
			<h2>PGAtour Player Profile</h2>
			<h3>Enitites and Attributes</h3>
			<h4>Player</h4>
			<ul>
				<li>Player</li>
				<li>Rank</li>
				<li>Location</li>
				<li>Social Media</li>
			</ul>
			<h4>Statistics</h4>
			<ul>
				<li>Live stats</li>
				<li>Standings</li>
				<li>Position</li>
			</ul>
			<h4>Article</h4>
			<ul>
				<li>Content</li>
				<li>Date posted</li>
			</ul>
			<h4>Authorship</h4>
			<ul>
				<li>Author Id</li>
				<li>Article Id</li>
			</ul>
			<h4>Author</h4>
			<ul>
				<li>Name</li>
				<li>Email</li>
				<li>Hash</li>
				<li>Salt</li>
			</ul>
			<h3>Persona</h3>
			<h4>Name: Dillon Miller</h4>
			<h4>Age: 28</h4>
			<h4>Profession:</h4>
			<p>CPA at tax firm looking to check up on live stats of his favorite player and their rank or
			statistics
			going into the next professional event. While working Monday through Friday and sometimes Saturdays and
			tournaments start on Thursday of each week, making it hard to watch during those days forcing individuals to
			check out the site in order to be up to date on their favorite player.
			</p>
			<h4>Technology:</h4>
			<p>Mac Pro Desktop, Mac laptop at home or used for the office, or Iphone 6 with mobile app
			availability.</p>
			<h4>Attitudes and Behaviors:</h4>
			<p>Long hours throughout the week including late nights at the office, and working
			Saturdaysevery so often. Dillon has no time to watch the players live so only has time to pull up the pga tour website every
			so often and needs specific information about players he is interested in.</p>
			<h4>Frustrations and Needs:</h4>
			<p>Dillon works at a cpa firm, works long weeks and sometimes weekends and wants to be up to
			date on his favorite players. Working the long hours required only allows him little time to check updates. Dillon
			looks to find specific information you might not be able to find on any website.</p>
			<h4>Goals:</h4>
			<p>Dillon looks to the pgatour site to find the live updates in order to be up to date on the players
			heading into the weekend. He also looks to find out what specific players are playing well heading into
			the next tournament.</p>
			<h3>Use Case:</h3>
			<h4>Goal: Access PGAtour player world rank</h4>
			<p>A user accesses the website, the user then clicks the link to the player profile at the top of the page, the website loads the page asks for what
				specific player the user is looking for, the user finds the player and clicks the player profile, the website loads the page, in which the user
				locates the world ranking of the player on the player profile page.</p>
			<h4>Goal: Access articles on specific player through player profile</h4>
			<p>A user accesses the website, finds the player profile, clicks the link to profile, clicks the player article link.</p>
			<h3>Relations</h3>
			<h4>Profile to Stats,    m - to - n</h4>
			<p>There can be many players profiles to many different stats and many different stats to many different player profile.</p>
			<h4>Author to Article,   m - to - n</h4>
			<p>A user accesses the website, the user then clicks the link to the player profile at the top of the page, the website loads the page asks for what
				specific player the user is looking for, the user finds the player and clicks the player profile, the website loads the page, the user now looks for
				articles on the player they chose in the article section below the ranks, the user clicks the article they wont, then the webpage loads the article
				for the user to read.</p>
		</main>
	</body>
</html>