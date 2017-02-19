
<h3>Fiche de frais du mois <?php echo $numMois . "-" . $numAnnee ?> : 
</h3>

<div class="encadre">
    <form  action="index.php?uc=suiviPaiement&action=miseEnPaiement" method="POST"> 

        <?php
        //Si il n'y a pas de fiche de frais affiche "Pas de fiche " sinon affiche les frais
        if ((!$lesFraisForfait) || ($libEtat != 'Validée et mise en paiement')) {
            ?>
            <h1>Pas de fiche de frais pour ce visiteur ce mois</h1>
            <?php
        } else {
            ?>
            <h3> Situation de la Fiche de Frais : <?php echo $libEtat ?></h3>
            <input type="hidden" name="visiteur" value="<?php echo $VisiteurSelectionner ?>" />
            <input type="hidden" name="mois" value="<?php echo $leMois ?>" />
            <input id="ok" type="submit" value="Mise en Paiment de la Fiche de Frais" size="20" />  
            <caption><h3>Eléments forfaitisés</h3></caption>
            <table class="listeLegere">
                <tr>
                    <?php
                    foreach ($lesFraisForfait as $unFraisForfait) {
                        $libelle = $unFraisForfait['libelle'];
                        ?>	
                        <th> <?php echo $libelle ?></th>
                        <?php
                    }
                    ?> 

                </tr>
                <tr>
                    <?php
                    foreach ($lesFraisForfait as $unFraisForfait) {
                        $quantite = $unFraisForfait['quantite'];
                        ?>
                        <td class="qteForfait"><?php echo $quantite ?> </td>
                        <?php
                    }
                    ?>

                </tr>
            </table>
            <caption><h3>Descriptif des éléments hors forfait -<?php echo $nbJustificatifs ?> justificatifs reçus -</h3>
            </caption>
            <table class="listeLegere">
                <tr>
                    <th class="date">Date</th>
                    <th class="libelle">Libellé</th>
                    <th class='montant'>Montant</th> 
                </tr>
                <?php
                foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                    $date = $unFraisHorsForfait['date'];
                    $libelle = $unFraisHorsForfait['libelle'];
                    $debutLibelle = substr($libelle, 0, 7);
                    $montant = $unFraisHorsForfait['montant'];

                    if ($debutLibelle != "REFUSER") {
                        ?>
                        <tr>
                            <td><?php echo $date ?></td>
                            <td><?php echo $libelle ?></td>
                            <td><?php echo $montant ?></td>                    
                        </tr>

                        <?php
                    }
                }
                ?>

            </table>
            <?php
        }
        ?>

    </form>
</div>

</div>














