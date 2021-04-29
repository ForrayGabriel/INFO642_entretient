<link rel="stylesheet" type="text/css" href="./././css/panel.css"/>

<?php 
	$espaces = [1=>"Etudiant", 2=>"Enseignant", 3=>"Administrateur"];
	$onglets = [
		1=>["Accueil"=>".","Mes résultats"=>".?r=resultat","Contact"=>"?r=contact"],
		2=>["Accueil"=>".","Disponibilités"=>"?r=disponibilite","Notations"=>".?r=prestation"],
		3=>["Accueil"=>".","Salles"=>"","Évènements"=>"?r=event","Contact"=>"?r=contact","J'ai pas de nom cool pour ça" => "?r=group"]
	];
?>

<div class="banner">
	<img src="./images/banner.jpg">
	<?php print("<h2>Espace ".$espaces[get_role()]."</h2>");?>
</div>

<?php 
	print("<div class='logged_menu'>");
	foreach($onglets[get_role()] as $name => $href) {
		echo "<a class='onglet' href='$href'>$name</a>";
	}
	print("</div>");
?>