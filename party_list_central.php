<?php 
//require('config.php');

//requete de tous les dossiers crees par l utilisateur
$query = "SELECT * FROM `jeu`";

//execution de la requete
$result = mysqli_query($conn,$query) or die(mysql_error());
?>
<div style="width:100%; text-align:center">
<h1>Liste des parties</h1>
<table id="table" class="table table-hover">
	<thead>
		<tr>
			<th>Nombre de joueurs</th>

            <th>Etat de la partie</th>
			
			<th>Détails</th>
            
            <th>Supprimer</th>


		</tr>
	</thead>
	<tbody>

<?php
while($obj = $result->fetch_object()){//Parcourrir tous les dossiers
?>
	<tr>
		<td data-title="Nombre de Joueurs"><?php echo($obj->NB_JOUEUR);?></td>

        <td data-title="Etat de la partie"><?php if($obj->ETAT == 1){
                                                    echo("En Cours");
                                                } else {
                                                    echo("Terminée");
                                                };?></td>

		<td td data-title="Détails">
			<a class="link-danger" href="details_jeu.php?id=<?php echo($obj->ID_JEU); ?>">Détails</a></td>

		<td td data-title="Supprimer">>
			<a class="link-danger" href="delete_jeu.php?id=<?php echo($obj->ID_JEU); ?>">Supprimer</a></td>

            
	</tr>
<?php
} ?>
</table>
</div>
