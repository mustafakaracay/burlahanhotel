<?php

// Error reporting:
error_reporting(E_ALL^E_NOTICE);

include "connect.php";
include "comment.class.php";


/*
/	Select all the comments and populate the $comments array with objects
*/

$comments = array();
$result = mysql_query("SELECT * FROM comments ORDER BY id ASC");

while($row = mysql_fetch_assoc($result))
{
	$comments[] = new Comment($row);
}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles.css" />
<meta charset="UTF-8" />
       <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>Yorumlar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link rel="stylesheet" type="text/css" href="css/topbar.css" />
		<link rel="stylesheet" type="text/css" href="css/sidebar.css" />
</head>
<body>



<div class="container">
            <header>
				<p class="codrops-demos">
					<a href="index.php">Ana Sayfa</a>
					<a href="hakkimizda.html">Hakkımızda</a>
					<a href="galeri.html">Galeri</a>
					<a href="odalar.html">Odalar &amp; Fiyatlar</a>
					<a href="ulasim.html">Ulaşım &amp; Rezervasyon</a>
					<a href="yorumlar.php" class="current-demo">Yorumlar</a>
					</p>
            </header>
        </div>

		<aside id="sticky-social">
			<ul>
				<li><a href="https://www.facebook.com/%C5%9EU%C5%9EU-Pansiyon-215781178579343/?fref=ts" class="entypo-facebook" target="_blank"><span>Facebook</span></a></li>
        		<li><a href="https://www.instagram.com/conradhotels/" class="entypo-instagrem" target="_blank"><span>Instagram</span></a></li>
				<li><a href="http://www.neredekal.com/susunun-yeri-apart-pansiyon/" class="entypo-neredekal" target="_blank"><span>Neredekal</span><img src="../imgsocial/indir (2).png" /" alt="neredekal" height="35" width="35" /></a></li>
			</ul>
		</aside>

<div id="main">
<?php

/*
/	Output the comments one by one:
*/

foreach($comments as $c){
	echo $c->markup();
}

?>

<div id="addCommentContainer">
	<p>Yorumun Herkes İçin Değerli</p>
	<form id="addCommentForm" method="post" action="">
    	<div>
        	<label for="name">Ad Soyad</label>
        	<input type="text" name="name" id="name" />
            
            <label for="email">Email</label>
            <input type="text" name="email" id="email" />
            
            <label for="body">Yorum</label>
            <textarea name="body" id="body" cols="20" rows="7"></textarea>
            
            <input type="submit" id="submit" value="Kaydet" />
        </div>
    </form>
</div>

</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>

</body>
</html>