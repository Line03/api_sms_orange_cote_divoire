<?php 
require 'vendor/ismaeltoe/osms/src/Osms.php';
use \Osms\Osms;
?>
<?php
require __DIR__.'/vendor/autoload.php';

function randomPrefix($length) 
{ 
$random= "";
srand((double)microtime()*1000000);

$data = "AbcDE123IJKLMN67QRSTUVWXYZ"; 
$data .= "aBCdefghijklmn123opq45rs67tuv89wxyz"; 
$data .= "0FGH45OP89";

for($i = 0; $i < $length; $i++) 
{ 
$random .= substr($data, (rand()%(strlen($data))), 1); 
}

return $random; 
}
    $code = randomPrefix(8);
if(!empty($_POST)){

    
	$datas = array_map('htmlspecialchars', $_POST);
	
	$credential = [
		'clientId' => 'Y4LlL3k389cuBFz6JdzudtKvQguA7xCR',
		'clientSecret' => 'TbbSkemzXRQRxPHw'
    ];
    
	$osms = new Osms($credential);
	$token = $osms->getTokenFromConsumerKey();
	$osms->sendSMS('tel:+22509682009', 'tel:' . $datas['tel'], $datas['content'], 'Viens Dindin');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>SMS API ORANGE</title>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col">
    </div>
    <div class="col-6 middle">
	<h3 >Entrez votre numéro de téléphone</h3>
	<div class="form">
	
	<form method="post">
			<div class="form-group">
			<input type="tel" name="tel" value="+225"/>
                <input type="hidden" name="content" value=" <?php echo ("Votre code Viens Dindin est ".$code);  ?>"/>
			</div>
			<button  class="btn btn-light" type="submit">Continuer</button> <br>
			</form>
		</div>
    </div>
    <div class="col">
    </div>
  </div>
</div>
</body>
</html>
