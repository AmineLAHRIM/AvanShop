<?php
//Include autoloader
require_once '../dompdf/autoload.inc.php';

//Reference the Dompdf namespace
use Dompdf\Dompdf;

ob_start();
?>
    <head>

        <link rel="stylesheet" href="css/bootstrap.min.css">

    </head>

    <div class="container">
        <div class="starter-template">
            <h1 style="text-align: center;color: #00f38e;font-family: Skia">AvanShop Facture</h1>
            <hr>
            <br>
            <br>
            <h3 style="text-align: left ;color: #ff6a80;font-family: Skia">Information du Client</h3>

            <table class="table">
                <thead>
                <tr>
                    <td>Nom Client</td>
                    <td>Prenom Client</td>
                    <td>Telephone</td>
                    <td>Adresse</td>
                </tr>

                </thead>
                <tbody>
                <tr>
                    <td><?= $util->Nom ?></td>
                    <td><?= $util->Prenom ?></td>
                    <td><?= $util->Tele ?></td>
                    <td><?= $util->Adresse ?></td>


                </tr>
                </tbody>
            </table>
            <br>
            <br>
            <h3 style="text-align: left ;color: #ff6a80;font-family: Skia">Les Commandes</h3>
            <br>
            <?php foreach ($articles as $article): ?>

                <?php
                $produit_virtuel_vendeur = \App\Table\Produit_VirtuelTable::find($article->Id_ProduitV);
                $boutique_vendeur = \App\Table\BoutiqueTable::find($produit_virtuel_vendeur->Id_boutique);
                $vendeur = \App\Table\UtilisateurTable::find($boutique_vendeur->Idutil);

                ?>
                <div style="border: dashed 1px gray">
                    <table class="table">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nom Article</td>
                            <td>Quantite De Stock</td>
                            <td>Prix Unitaire</td>
                            <td>Prix promotion</td>
                            <td>Prix Livraison</td>
                            <td style="color: #00dd00 ;font-size: large">Prix À Payer</td>
                        </tr>

                        </thead>
                        <tbody>

                        <tr>
                            <td><?= $article->Id_article ?></td>
                            <td><?= $article->Nom_article ?></td>
                            <td><?= $article->Qte_Article ?></td>
                            <?php
                            $produit_virtuel = \App\Table\ArticleTable::findbyIdproduit_virtuel($article->Id_ProduitV)
                            ?>
                            <td><?= $produit_virtuel->Prix_Unitaire ?></td>
                            <td><?= $produit_virtuel->Prix_promotion ?></td>
                            <td><?= $produit_virtuel->PrixLivraison ?></td>
                            <?php
                            if ($produit_virtuel->Prix_promotion == 0) {
                                $prixtotal = $produit_virtuel->Prix_Unitaire*$article->Qte_Article + $produit_virtuel->PrixLivraison;
                            } else {
                                $prixtotal = $produit_virtuel->Prix_promotion*$article->Qte_Article + $produit_virtuel->PrixLivraison;

                            }
                            ?>
                            <td><?= $prixtotal ?></td>

                        </tr>

                        </tbody>


                    </table>
                    <br><br>
                    <label >ALLER CONTACTER VOTRE VENDEUR ET FAIRE TON PAYMENT AVEC LE RELEVER SUIVANT</label>
                    <br><br>
                    <table class="table">
                        <thead>
                        <tr>
                            <td>Nom Vendeur</td>
                            <td>Prenom Vendeur</td>
                            <td>Telephone</td>
                            <td>Adresse</td>
                        </tr>

                        </thead>
                        <tbody>
                        <tr>
                            <td><?= $vendeur->Nom ?></td>
                            <td><?= $vendeur->Prenom ?></td>
                            <td><?= $vendeur->Tele ?></td>
                            <td><?= $vendeur->Adresse ?></td>

                        </tr>
                        </tbody>
                    </table>

                </div><br><br><br>
            <? endforeach; ?>
        </div>
    </div>

<?php
$e = ob_get_clean();
$domdpf = new Dompdf();
$domdpf->loadHtml($e . '');
//$domdpf -> loadHtml($contenthtml.'');

$domdpf->setPaper('A4', 'landscape');
$domdpf->render();

//Output the file
$domdpf->stream('codexworld', array('Attachament' => 0));

?>