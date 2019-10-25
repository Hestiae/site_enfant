<style>
H2 { text-align: center }

</style>

<h2> Mes Objets </h2>

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
?>


                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.col-lg-9 -->

            </div>
            <!-- /.row -->

        </div>
<div class="container-fluid">
    <h2> Ajoutez un Objet </h2>
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="Nom" class="col-sm-4 control-label">Nom de votre Objet</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Nom de l'objet">
            </div>
        </div>
        <div class="form-group">
            <label for="Prix"  class="col-sm-4 control-label">Prix en points de votre Objet</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="Prix" name="Prix" placeholder="0">
            </div>
        </div  
        <div class="form-group">
            <label for="image" class="col-sm-4 control-label">Photo de votre Objet Format 700 x 700</label>
            <div class="col-sm-8">
                <input type="file" id="Img" name="Img" class="form-control">
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <input class='btn btn-primary' type="submit" name="ajouter" value="Ajouter">
            </div>
        </div>
    </form>
</div>