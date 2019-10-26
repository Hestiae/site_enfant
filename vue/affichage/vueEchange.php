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
																	<form class="form-group" method="post" action="">
																		<tr>
																				
																				<td> <input type="hidden" name="id_objet" value ="<?php echo $unResultat['ID_Objet']; ?>"></td>
																				<td> <input class ='btn btn-primary' type="submit" name="ajout" value="mettre en vente"> </td>
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