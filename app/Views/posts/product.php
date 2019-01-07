<!--<form action="" method="post">-->
<form action="" method="post">

    <div class="content">
        <div class="main main2">

            <div class="page-container">

                <!-- bloc-0 -->
                <div class="blocproduit bgc-white l-bloc " id="bloc-0">
                    <div class="container bloc-lg">
                        <div class="row">
                            <div class="col-sm-6 product">
                                <img src="<?= $imageSrc ?>" class="img-responsive lazyload productimg"/>
                            </div>
                            <div class="col-sm-6 productdes">
                                <h2 class="mg-lg">
                                    <?= $produit_virtuel->Libelle_Produit ?>
                                </h2>
                                <h3 class="mg-sm">
                                    <?= $produit_virtuel->ShortdescriptionP ?>
                                </h3>
                                <p class="mg-lg">
                                    <?= $produit_virtuel->Longdescription ?>
                                </p>

                                <p>
                                    <br>
                                    <br>
                                    <br>
                                </p>
                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="input-group number-spinner">
                                        <span class="input-group-btn data-dwn">
                                            <button type="button" class="btn btn-default btn-info" data-dir="dwn">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                            <input type="text" name="qte" class="form-control text-center"
                                                   value="<?= $produit_virtuel->Quantite_stock <= 0 ? 0 : 1 ?>" min="1"
                                                   max="<?= $produit_virtuel->Quantite_stock ?>">

                                            <span class="input-group-btn data-up">

					<button type="button" class="btn btn-default btn-info" data-dir="up">

                        <span class="glyphicon glyphicon-plus"></span>
                    </button>

				</span>
                                        </div>

                                    </div>
                                    <?php
                                    if ($produit_virtuel->Quantite_stock >= 1) {
                                        ?>
                                        <label style="line-height: 30px;font-size: large; color: #00f38e;font-family: Chalet-Tokyo"
                                               for="">Quantite
                                            Disponible: <?= $produit_virtuel->Quantite_stock ?></label>
                                        <?php
                                    } else {
                                        ?>
                                        <label style="line-height: 30px;font-size: large; color: #ff5768;font-family: Chalet-Tokyo"
                                               for="">Desole Pas Disponible</label>
                                        <?php
                                    }

                                    ?>

                                </div>

                                <?php if ($produit_virtuel->Quantite_stock >= 1): ?>
                                    <!--<button type="submit" name="buy" href="index.html"
                                            class=" btn btn-d btn-lg blocs-blue-button addcart">
                                        Buy Now
                                    </button>-->

                                    <button type="submit" name="add" class="btn btn-d btn-lg blocs-blue-button buy ">
                                        Add To
                                        Panier
                                    </button>


                                <?php endif; ?>


                            </div>

                        </div>
                    </div>
                </div>
                <!-- bloc-0 END -->

                <!-- ScrollToTop Button -->
                <a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1')"><span
                            class="fa fa-chevron-up"></span></a>
                <!-- ScrollToTop Button END-->


            </div>
        </div>

    </div>

</form><!--</form>-->