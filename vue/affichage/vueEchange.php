<style>
H2 { text-align: center }

</style>

<h2> Liste des Objets en Vente </h2>

<div class="container">

            <div class="row">


                <!-- /.col-lg-3 -->

                <div class="col-lg-8">


                    <div class="row">
                        <?php
                        /*
                          usort($result, function ($produit1, $produit2) {
                          });
                         */
                        foreach ($result as $unResultat) {
							if($unResultat['Id_enfant'] != $_SESSION['id_enfant']) {
								?>
							

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100">
                                    <a href="#" data-toggle="modal" data-target="#<?php echo $unResultat['Nom']; ?>"><img class="card-img-top" src="../<?php echo $unResultat['Img']; ?>" alt=""></a>




                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <?php
                                            echo "<td>", $unResultat['Nom'], "</td>";
                                            ?>
                                        </h4>
                                        <?php
                                        echo "<td>", $unResultat['Prix'], " points </td>";
                                        ?>
                                        <div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="<?php $unResultat['Nom'] ?>" aria-hidden="true" id="<?php echo $unResultat['Nom']; ?>">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                                            <h4 class="modal-title" id="myModalLabel"><?php echo "<td>", $unResultat['Nom'], "</td>";
                                        ?></h4>
                                                        </div>
                                                        <img class="card-img-top" src="../<?php echo $unResultat['Img']; ?>" alt="">
                                                        
                                                        <div class="modal-body">
														<p> Achetez cette objet en échange de point :</p>
														<br>
														<?php if ($_SESSION['solde'] >= $unResultat['Prix']) { ?>
																	<form class="form-group" method="post" action="">
																		<tr>
																				<td> <input type="hidden" name="id_objet" value ="<?php echo $unResultat['ID_Objet']; ?>"></td>
																				<td> <input type="hidden" name="id_receveur" value ="<?php echo $unResultat['Id_enfant']; ?>"></td>
																				<td> <input type="hidden" name="prix" value ="<?php echo $unResultat['Prix']; ?>"></td>
																				<td> <input class ='btn btn-primary' type="submit" name="achat" value="Acheter"> </td>
																			</tr>
														</form> <?php } else { ?> <p> Vous n'avez pas la solde suffisante pour acheter cette objet </p> <?php } ?>
														<br>
														<p> Ou échangez le contre un de vos objets de prix similaire : </p>		
												 					<form class="form-group" method="post" action="">
																		<tr>
																				<?php
																				echo '<td> <select id="id_objet2" name="id_objet2">';  
																				foreach ($result1 as $unResultat1){
																					if ($unResultat1['Prix'] - $unResultat['Prix'] >= -5 && $unResultat1['Prix'] - $unResultat['Prix'] <= 5){ 
																						echo '<option value="'; echo $unResultat1['ID_Objet']; echo '">'; echo $unResultat1['Nom']; echo ', '; echo $unResultat1['Prix'];echo 'pts'; echo '</option>';
																					} 
																				}
																				echo '</select> </td>'; ?> 
																				<br>
																				<td> <input type="hidden" name="id_objet" value ="<?php echo $unResultat['ID_Objet']; ?>"></td>
																				<td> <input type="hidden" name="id_receveur" value ="<?php echo $unResultat['Id_enfant']; ?>"></td>
																				<td> <input class ='btn btn-primary' type="submit" name="troc" value="Echanger"> </td>
																			</tr>
																	</form>
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>          
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    <?php
							}
}
?>


                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.col-lg-9 -->

            </div>
            <!-- /.row -->

        </div>
		
<h2> Mes Echanges précédent : </h2>

<div class="container">
  <div class="row">

		<div class="col-lg-8">


			<div class="row">
			<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Donneur de l'objet</th>
      <th scope="col">Receveur de l'objet</th>
      <th scope="col">Date de l'échange</th>
    </tr>
  </thead>
  <tbody>
				<?php
				
				foreach ($result2 as $unResultat2) {
					
  
    ?><tr>
      <th scope="row"><?php echo $unResultat2['Id_echange'];?></th>
      <td><?php echo $unResultat2['id_donneur'];?></td>
      <td><?php echo $unResultat2['id_recepteur'];?></td>
      <td><?php echo $unResultat2['date_echange'];?></td>
    </tr>
  
			<?php	}
						?>
						</tbody>
</table>
			</div>
		</div>
	</div>
</div>
