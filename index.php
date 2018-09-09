<?php
	$name = isset ($_POST ['name']) ? $_POST['name']:'';
	$email = isset ($_POST['email']) ? $_POST['email']: '';
	$content = isset ($_POST['content']) ? $_POST['content']: '';
	$check = isset ($_POST['check']) ? $_POST['check']: '';
	$empty = isset ($_POST['empty']) ? $_POST['empty']: null;
	$success = isset ($_GET ['success']) ? $_GET['success']:'';
	$error = array("name" => "","email" => "", "content" => "","database" => "");
	
	
	
	if($_POST){
		
		if(strlen($name)> 0 && strpos($email,'@') && strlen($content) > 0 && $check == 4 && $empty == null) {
			
				$conn = new mysqli('localhost', 'root', 'root', 'contact'); 
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			 
			$name = $conn->real_escape_string($name);
			$email= $conn->real_escape_string($email);
			$content = $conn->real_escape_string($content);
			
			$saved = $conn->query("INSERT INTO contact_message (name, email, content)
				VALUES ('$name', '$email', '$content')");
			if ($saved) {	
				header('Location: ' . $_SERVER['PHP_SELF'] . '?success=OK');
			} else {
				$error['database'] = "Error when saving";
			}
			
			
		}else {
			
			if(strlen($name) == 0 || strlen($name) > 255 || strlen($email) == 0 || strlen($email) > 255 || strlen($content) == 0 || $empty !=null){
						if(strlen($name) == 0){
							$error['name'] = 'Error: invalid data in "Name"';
						}
						if(strlen($name) > 255){
							$error['name'] = 'Error: too long data input in "Name"';
						}
						if(strlen($email) == 0){
							$error['email'] = 'Error: invalid data in "Email"';
						}
						
						if(strlen($email) > 255) {
							$error['email'] = 'Error: too long data input in "Email"';
						}

						if(strlen($content) == 0) {
							$error['content'] = 'Error: invalid data in "Content"';
					}	
			}	
		}	
	}		
	
	
		
	if(strlen($success) == 0) {
			
?>


<!doctype html>
<html>
	<head>
		<title>Škac Art</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous"/>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="normalize.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	</head>

	<body>
		<header>
			<section class="header">
				<h1>
					<span>Škac Art</span>
				</h1>
				<nav>
					<ul>
						<li><a href="#S1">Apie</a></li>
						<li><a href="#S2">Darbai</a></li>
						<li><a href="#S3">Q&A</a></li>
						<li><a href="#S4">Galerija</a></li>
						<li><a href="#S5">Kontaktai</a></li>
					</ul>
				</nav>
			</section>
		</header>

		<main>
			<section class="cover">
				<div class="cover-inner">
				</div>
			</section>
		
	<!-- About -->
			<section id="S1" class="about">
				<article class="about-inner">
					<h2>Apie mane</h2>
					<p>
					Labas! Esu Škac! Kodėl taip save pristatau? Nes taip mane praminė draugai, o draugų reikia klausyti :) Būtent šeima ir draugai paskatino mane pažvelgti į savo paveikslus kitomis akimis – pajausti, kad tai, ką darau, gali būti skirta ne tik man. Kad mano darbai gali džiuginti ir aplinkinius, kad kiti gali juose pamatyti ir pajausti tai, ką ir aš jaučiu.
					</p>
					<p>Tapymas – mano savotiška meditacija. Tapau tik tada, kai gerai jaučiuosi, nes aš tikiu, kad kiekvienas kūrėjas savo emocijas perduoda į kūrinį. Būtent emocijos, jausmai yra mano pagrindinis variklis, aš <span style="font-style: italic;">pasinešusi</span> ant jų. Tiesiog tapau tai, ką ir kaip jaučiu. Kiekvienas mano paveikslas turi savotišką istoriją, nes jį tapau su mintimi, pvz., kad viskas priklauso nuo to, kaip tu mąstysi ar tai, kad kartais nereikia žodžių – užtenka tiesiog apkabinimo.
					</p>
					<p>Tai ir ta pati mintis, kad keistis niekada nėra vėlu. Nes kad ir kaip banaliai skambėtų, tačiau kiekvienas turėtų daryti tai, ką iš tikrųjų nori daryti, siekti to, tikėti tuo ir tada jis tai turės. Tai man yra savotiška pozityvaus mąstymo magija, bet tai tikrai veikia. Ačiū draugei, kuri paskatino mane ir kuri padėjo man tai suvokti.
					</p>
					<p>
					Tad kiekvienam linkiu atrasti tai, ko ieško ir kas teiktų pačias geriausias emocijas. Tebūnie ne mano darbuose, galbūt net ne mene. Tiesiog būkit atviri viskam. Ir jauskit:)
					</p>
					<iframe width="560" height="315" src="https://www.youtube.com/embed/QEyh4TcIxOE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</article>
				
			</section>
		
	<!-- Works -->
	
			<section id="S2" class="works">	
				<div class="works-inner">
				
					<h2>Darbai</h2>
					
					<div class="responsive contain">
					  <div class="img">
						<img class="opacity" src="images/2.jpg" alt="Apkabinimas1">
						<div class="shake">
							<p style="font-style: italic;">Rado naujus namus</p>
						</div>
						<div class="desc">
							<h4>„Nebijok“</h4>
							<p>Akrilas and drobės, 40x50</p>	
						</div>
					  </div>
					</div>
					
					<div class="responsive contain">
					  <div class="img">
						<img class="opacity" src="images/7.jpg" alt="Frida">
						<div class="shake">
							<p style="font-style: italic;">Rado naujus namus</p>
						</div>
						<div class="desc">
							<h4>„Mano tipo Frida</h4>
							<p>Akrilas and drobės, 40x50</p>
						</div>
					  </div>
					</div>
					
					<div class="responsive contain">
					  <div class="img">
						<img class="opacity" src="images/3.jpg" alt="Apkabinimas2">
						<div class="shake">
							<p style="font-style: italic;">Rado naujus namus</p>
						</div>
						<div class="desc">
							<h4>„Kaip tik panorėsi“</h4>
							<p>Akrilas and drobės, 30x40</p>
						</div>
					  </div>
					</div>
					
					<div class="responsive contain">
					  <div class="img">
						  <img class="opacity" src="images/6.jpg" alt="Apkabinimas5">
						  <div class="shake">
							<p style="font-style: italic;">Rado naujus namus</p>
						  </div>
						<div class="desc">
							<h4>„Apkabinimas – geriausias vaistas“</h4>
							<p>Akrilas and drobės, 50x70</p>
						</div>
					  </div>
					</div>
					
					<div class="responsive contain">
					  <div class="img">
						<img class="opacity" src="images/10.jpg" alt="Angelas be sparno">
						<div class="shake">
							<p style="font-style: italic;">Rado naujus namus</p>
						</div>
					   <div class="desc">
							<h4>„Metamorfozė“</h4>
							<p>Akrilas and drobės, 50x70</p>
						</div>
					  </div>
					</div>
					
					<div class="responsive contain">
					  <div class="img">
						<img class="opacity" src="images/13_3.jpg" alt="Veidai2-1">
						<div class="shake">
							<p style="font-style: italic;">Rado naujus namus</p>
						</div>
						<div class="desc">
							<h4>„Kaip nori (1 pusė)“</h4>
							<p>Akrilas and drobės, 60x80</p>
						</div>
					  </div>
					</div>

					<div class="responsive contain">
					  <div class="img">
						<img class="opacity" src="images/14.jpg" alt="Veidai2-2">
						<div class="shake">
							<p style="font-style: italic;">Rado naujus namus</p>
						</div>  
						<div class="desc">
							<h4>„Kaip nori (2 pusė)“</h4>
							<p>Akrilas and drobės, 60x80</p>
						</div>
					  </div>
					</div>

					<div class="responsive contain">
					  <div class="img">
						<img class="opacity" src="images/15.jpg" alt="Veidai2-3">
						<div class="shake">
							<p style="font-style: italic;">Rado naujus namus</p>
						</div>
						<div class="desc">
							<h4>„Kaip nori (3 pusė)“</h4>
							<p>Akrilas and drobės, 60x80</p>
						</div>
					  </div>
					</div>

					<div class="responsive contain">
					  <div class="img">
						<img class="opacity" src="images/16.jpg" alt="Veidai2-4">
						<div class="shake">
							<p style="font-style: italic;">Rado naujus namus</p>
						</div>
						<div class="desc">
							<h4>„Kaip nori (4 pusė)“</h4>
							<p>Akrilas and drobės, 60x80</p>
						</div>
					  </div>
					</div>
					
					
					<div class="responsive contain">
					  <div class="img">
						  <img class="opacity" src="images/1.jpg" alt="Angelas">
						<div class="shake">
							<p style="font-style: italic;">Rado naujus namus</p>
						</div>
						<div class="desc">
							<h4>„Mano tipo angelas“</h4>
							<p>Akrilas and drobės, 40x50</p>
						</div>
					  </div>
					</div>

					<div class="responsive contain">
					  <div class="img">
						<img class="opacity" src="images/18.jpg" alt="Rhum Room">
						<div class="shake">
							<p style="font-style: italic;">Rado naujus namus</p>
						</div>
						<div class="desc">
							<h4>„Rhum Room“</h4>
							<p>Akrilas and drobės, 110x90</p>
						</div>
					  </div>
					</div>

					<div class="responsive contain">
					  <div class="img">
						<img class="opacity" src="images/17.jpg" alt="Veidas">
						<div class="shake">
							<p style="font-style: italic;">Rado naujus namus</p>
						</div>
						<div class="desc">
							<h4>„Suprask mane kaip nori“</h4>
							<p>Akrilas and drobės, 30x40</p>
						</div>
					  </div>
					</div>
					
					<div class="responsive contain">
					  <div class="img">
						<img class="opacity" src="images/8.jpg" alt="Geles ant galvos">
						<div class="shake">
							<p style="font-style: italic;">Ieško naujų namų</p>
						</div>
						<div class="desc">
							<h4>„Būk kuo nori būti“</h4>
							<p>Akrilas and drobės, 30x40</p>
						</div>
					  </div>
					</div>

					<div class="responsive contain">
					  <div class="img">
						<img class="opacity" src="images/11.jpg" alt="Veidai1-1">
						<div class="shake">
							<p style="font-style: italic;">Ieško naujų namų</p>
						</div>
						<div class="desc">
							<h4>„Aukštyn kojom (1 pusė)“</h4>
							<p>Akrilas and drobės, 60x80</p>
						</div>
					  </div>
					</div>

					<div class="responsive contain">
					  <div class="img">
						<img class="opacity" src="images/12.jpg" alt="Veidai1-2">
						<div class="shake">
							<p style="font-style: italic;">Ieško naujų namų</p>
						</div>
						<div class="desc">
							<h4>„Aukštyn kojom (2 pusė)“</h4>
							<p>Akrilas and drobės, 60x80</p>
						</div>
					  </div>
					</div>
					
					<div class="responsive contain">
					  <div class="img">
						<img class="opacity" src="images/9.jpg" alt="Sokis">
						<div class="shake">
							<p style="font-style: italic;">Ieško naujų namų</p>
						</div>
						<div class="desc">
							<h4>„Laisvė“</h4>
							<p>Akrilas and drobės, 40x50</p>
						</div>
					  </div>
					</div>

					<div class="responsive contain">
					  <div class="img">
						<img class="opacity" src="images/4.jpg" alt="Apkabinimas3">
						<div class="shake">
							<p style="font-style: italic;">Ieško naujų namų</p>
						</div>
					   <div class="desc">
							<h4>„Apkabinimui nereikia progos“</h4>
							<p>Akrilas and drobės, 50x40</p>
						</div>
					  </div>
					</div>

					<div class="responsive contain">
					  <div class="img">
						<img class="opacity" src="images/5.jpg" alt="Apkabinimas4">
						<div class="shake">
							<p style="font-style: italic;">Ieško naujų namų</p>
						</div>
						<div class="desc">
							<h4>Paskęsti</h4>
							<p>Akrilas and drobės, 40x50</p>
						</div>
					  </div>
					</div>


					<!-- The Modal -->
					<div id="myModal" class="modal">
					  <span class="close">×</span>
					  <img class="modal-content" id="img01">
					  <div id="caption"></div>
					</div>

					<script>
					
					var modal = document.getElementById('myModal');

					var span = document.getElementsByClassName("close")[0];

					span.onclick = function() { 
						modal.style.display = "none";
					}

					var images = document.getElementsByTagName('img');
					var modalImg = document.getElementById("img01");
					var captionText = document.getElementById("caption");
					var i;
					for (i = 0; i < images.length; i++) {
					   images[i].onclick = function(){
						   modal.style.display = "block";
						   modalImg.src = this.src;
						   modalImg.alt = this.alt;
						   captionText.innerHTML = this.nextElementSibling.innerHTML;
					   }
					}
					</script>		

				</div>
			</section>
		
	<!-- Q&A -->
		
			<section id="S3" class="QA">	
				<div class="QA-inner">
				
					<h2>Q&A</h2>
						
						<button class="accordion">Iš kur semiesi idėjų savo darbams?</button>
						<div class="panel">
						  <p>Geriausios idėjos gimsta prieš miegą :) Nežinau kodėl taip, bet kartais kažką galvoju ir galvoju beužmigdama ir gimsta vaizdinys galvoje. Kartais naujas paveikslas tiesiog išnyra man akyse. O kartais pamatau ką nors internete, gatvėje stebėdama žmones, formas ir užsikabinu.</p>
						</div>
						
						<button class="accordion">Kodėl tavo darbai tokių skirtingų stilių?</button>
						<div class="panel">
						  <p>Nes aš esu visokia :) Kartais noriu tapyti vienu stiliumi, kartais kitu. Aš niekada nežinau, kaip galiausiai atrodys darbas. Kartais atsisėdu tapyti galvodama, kad jis bus švelnus, o betapydama atrandu, kad man tą kartą labiau tinka ir patinka griežtesnis stilius. Tad argi aš turėčiau save riboti? :)</p>
						</div>
						
						<button class="accordion">Ar yra galimybė apžiūrėti darbus gyvai?</button>
						<div class="panel">
						  <p>Susisiekite su manimi ir suderinsime jums tinkamą laiką ir vietą susitikimui.</p>
						</div>
						
						<button class="accordion">Ar esi baigusi dailę aukštojoje mokykloje ar bent kokį nors būrelį mokykloje?</button>
						<div class="panel">
						  <p>Ne, nebent <span style="font-style: italic;">skaitosi</span> mėnuo menų mokykloje dar mokyklos laikais :) Paišau kiek save atsimenu. Nežinau jokių taisyklių, dėsnių ir pan., nuo mažens nuolat paišydavau, bandydavau vėl ir vėl iš naujo. Vaikystėje pagrindinis mano favoritas buvo žirgai – tiesiog negalėjau jais atsigrožėti. Tačiau bet kuriuo atveju menų mokyklai esu labai dėkinga, nes jei ne ji, turbūt niekada pieštuko nebūčiau iškeitusi į dažus – tiesiog negalvojau, kad man tai gali patikti, kol nepabandžiau. O va kaip gavosi :) </p>
						</div>
						
						<button class="accordion">Kiek kainuoja tavo paveikslai?</button>
						<div class="panel">
						  <p>Susisiekite su manimi ir aš atsiųsiu jums kainą. Ji priklauso nuo paveikslo dydžio ir kiek laiko jam skiriu. Aš niekada nepaleisiu darbo į pasaulį, jei pati jo nebūsiu įsimylėjusi, nes aš tikiu, kad jis atras savo tikrąjį savininką – tą žmogų, kuriam jis ir buvo skirtas. Nes jis pajaus tą patį, kai aš jį tapiau. 
						  </p>
						</div>
						
						<button class="accordion">Ar tapai pagal užsakymus?</button>
						<div class="panel">
						  <p>Taip, bet ne visada. Tapau tik tada, kai noriu, kai nuotaika gera, nes aš tikiu, kad emocijos sugula į kūrinį ir tai galiausiai jaučia kiti žmonės. O „sudėti“ gerų emocijų nebūtų įmanoma, jei tapyčiau tai, kas man neįdomu / negražu / tiesiog <span style="font-style: italic;">neveža</span>. Kas tai? Kiekvienas atvejis individualus, tad jei turite kažkokią idėją, susisiekite su manimi ir pažiūrėsime, ką būtų galima padaryti :)
						  </p>
						</div>
						
						<button class="accordion">Ar siunti darbus į kitus Lietuvos miestus / kitas šalis?</button>
						<div class="panel">
						  <p>Taip, jei sutinkate apmokėti siuntimo išlaidos. Vilniečiams darbus pristatau nemokamai.</p>
						</div>
						
						<button class="accordion">Ar pati suprogramavai šį puslapį?</button>
						<div class="panel">
						  <p>Žinau žinau, tai ne tas klausimas, kurį man galite norėti užduoti :) Tebūnie ir nieko čia labai <span style="font-style: italic;">mandro</span>, bet tai mano „vaikas“ ir aš juo labai džiaugiuosi :) </p>
						</div>
				</div>
			</section>

			<script>
			var acc = document.getElementsByClassName("accordion");
			var i;

			for (i = 0; i < acc.length; i++) {
			  acc[i].addEventListener("click", function() {
				this.classList.toggle("active");
				var panel = this.nextElementSibling;
				if (panel.style.maxHeight){
				  panel.style.maxHeight = null;
				} else {
				  panel.style.maxHeight = panel.scrollHeight + "px";
				} 
			  });
			}
			</script>
				
	<!-- Gallery -->
	
			<section id="S4" class="gallery">	

				<h2>Galerija</h2>
				<div class="carousel-container">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
							<li data-target="#myCarousel" data-slide-to="3"></li>
							<li data-target="#myCarousel" data-slide-to="4"></li>
							<li data-target="#myCarousel" data-slide-to="5"></li>
							<li data-target="#myCarousel" data-slide-to="6"></li>
						</ol>
						<!-- Wrapper for slides -->
						<div class="carousel-inner">	
							<div class="item active">
								<img class="img-responsive center-block" class ="carousel-image" src="images/c1.jpg" alt="1"/>
								<div class="carousel-caption">
								</div>
							</div>
 
							<div class="item">
								<img class="img-responsive center-block" class="carousel-image" src="images/c2.jpg" alt="2"/>
								<div class="carousel-caption">
								</div>
							</div> 

							<div class="item">
								<img class="img-responsive center-block" class="carousel-image" src="images/c3.jpg" alt="3"/>
								<div class="carousel-caption">
								</div>
							</div>
							
							<div class="item">
								<img class="img-responsive center-block" class="carousel-image" src="images/c4.jpg" alt="4"/>
								<div class="carousel-caption">
								</div>
							</div>
							
							<div class="item">
								<img class="img-responsive center-block" class="carousel-image" src="images/c5.jpg" alt="5"/>
								<div class="carousel-caption">
								</div>
							</div>
							
							<div class="item">
								<img class="img-responsive center-block" class="carousel-image" src="images/c6.jpg" alt="6"/>
								<div class="carousel-caption">
								</div>
							</div>
							
							<div class="item">
								<img class="img-responsive center-block" class="carousel-image" src="images/c7.jpg" alt="7"/>
								<div class="carousel-caption">
								</div>
							</div>
						</div>

						<!-- Left and right controls -->
						<a class="left carousel-control" href="#myCarousel" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</section>
		
		
	<!-- Contacts -->	

		<section id="S5" class="contacts">
			<div class="contacts-inner">
				<div>
					<h2> Kontaktai </h2>
					<p>Turite klausimų apie mano darbus? Norite apžiūrėti juos gyvai, o gal svarstote įsigyti? Parašykite man – susisieksiu su jumis artimiausiu metu ir susibėgsime kavos :) </p>
				</div>
				<form class="contactform" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
					<div class="inputblock">
						<input type="text" class="input1" placeholder="Vardas" name="name" value="<?php echo $name; ?>"/>
						<div style="font-size: 1em;"><?php echo $error['name']; ?></div>
					</div>
					<div class="inputblock">
						<input type="text" class="input1" placeholder="El. paštas" name="email" value="<?php echo $email; ?>"/>
						<div style="font-size: 1em;"><?php echo $error['email']; ?></div>
					</div>
					<div class="inputblock">
						<input type="text" class="input1" placeholder="2+2" name="check"/>
					<div class="empty">
							<h4></h4><input class="empty" type="text" name="empty"/> 
					</div>	
					</div>
						<textarea id="message" placeholder="Žinutė" name="content"><?php echo $content; ?></textarea><br></br>
							<div style="font-size: 1.5em;"><?php echo $error['content']; ?></div>
						<?php echo $success; ?>
						<input type="submit" value="Siųsti" id="sendbtn">
				</form>
		</section>	

		
		</main>
		
		<footer>
			<section class="footer-first">
					<section class="footer-first">
						<div>
							<p>skacartist@gmail.com</p>
							<p>+37065253130</p>
							<p>Vilnius, Lietuva</p>
						</div>
					</section>
					
					<section class="footer-second">
						<div>
							<h4>Susidraugaukime!</h4>
							<br>
							<a href="https://www.facebook.com/skacart/"><i class="fab fa-facebook-f"></i></a>
							<a href="https://www.instagram.com/daivasalc/"><i class="fab fa-instagram"></i></a>
							<a href="https://www.linkedin.com/in/daiva-salc/"><i class="fab fa-linkedin-in"></i></a>
								
						</div>
					</section>
				</section>
				<p class="copyright">Copyright © Škac Art 2018. <span class="all">All rights reserved.</span><p>
			</footer>
	</body>
</html>


<?php
	}else {
		header('Location: index.php'); 
	}
?>
