<?php
//datu guztiak jaso
if(isset($_GET['mail'])){$mail=$_GET['mail'];}
if(isset($_GET['galdera'])){$galdera=$_GET['galdera'];}
if(isset($_GET['zuzena'])){$zuzena=$_GET['zuzena'];}
if(isset($_GET['erantzunokerra1'])){$erantzunokerra1=$_GET['erantzunokerra1'];}
if(isset($_GET['erantzunokerra2'])){$erantzunokerra2=$_GET['erantzunokerra2'];}
if(isset($_GET['erantzunokerra3'])){$erantzunokerra3=$_GET['erantzunokerra3'];}
if(isset($_GET['zailtasuna'])){$zailtasuna=$_GET['zailtasuna'];}
if(isset($_GET['gaia'])){$gaia=$_GET['gaia'];}
//if(isset($_GET[''])){$=$_GET[''];}

//daturen bat falta den aztertu
if($mail==''||$galdera==''||$zuzena==''||$erantzunokerra1==''||$erantzunokerra2==''||$erantzunokerra3==''||$zailtasuna==''||$gaia==''){
	header("location:mezua.php=goiburu=Errorea!!&gorputza=Ez dira datu guztiak jaso&auk=<a href='addQuestion.html'>Idatzi beste galdera bat</a>"); 
}

//mysql-rekin konexioa egin
//if(!$konexioa=new mysqli("127.0.0.1","root","5artu")){
if(!$konexioa=new mysqli("localhost","id7270487_zmutu","60ra3u5kalH3rr1a")){
	header("location:mezua.php=goiburu=Errorea!!&gorputza=ez da konexioa lortu<br/>".$konexioa->error."&auk=<a href='addQuestion.html'>Idatzi beste galdera bat</a>");
}

//datu-basea aukeratu
//if(!($konexioa->select_db('quiz'))){
if(!($konexioa->select_db('id7270487_quiz'))){
	header("location:mezua.php=goiburu=Errorea!!&gorputza=ezin da taula lortu<br/>".$konexioa->error."&auk=<a href='addQuestion.html'>Idatzi beste galdera bat</a>");
}

//sql kontsulta sortu
$sql="insert into questions(mail,galdera,erantzun_zuzena,erantzun_okerra_1,erantzun_okerra_2,erantzun_okerra_3,zailtasuna,gaia) values('".$mail."','".$galdera."','".$zuzena."','".$erantzunokerra1."','".$erantzunokerra2."','".$erantzunokerra3."',".$zailtasuna.",'".$gaia."')";

//sql kontsulta exekutatu
if(!($emaitza=$konexioa->query($sql))){
	header("location:mezua.php=goiburu=Errorea!!&gorputza=SQL kontsulta ez da exekutatu<br/>".$konexioa->error."&auk=<a href='addQuestion.html'>Idatzi beste galdera bat</a>");
}
//konexioa itxi
$konexioa->close();

header("location:mezua.php?goiburu=Eskaera gauzatu da&gorputza=Bidalitako datuak batu-basean ongi gorde dira&auk=<a href='layout.html'>Orri nagusia</a><br/><a href='showQuestions.php'>Ikusi galdera guztiak (marrazkirik gabe)</a><br/><a href='addQuestionwithImage.php'>Ikusi galdera guztiak (marrazkiekin)</a>");