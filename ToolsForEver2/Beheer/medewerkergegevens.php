<?php 
/*
    Document   : medewerkerToevoegen
    Created on : 11-dec-2013, 10:30:39
    Author     : Ton van Beuningen
*/
session_start();
require "connectie.php";


    $stmt = $dbConn->prepare("select * from gebruiker where id=?");
//    $stmt->execute(array($medewerkerscode));
	
    $id = (isset($_SESSION["id"])?$_SESSION["id"]:"");
    $stmt->execute($id);
	$aantalRijen = $stmt->rowCount();
	if ($aantalRijen==1) {
	    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $result = $stmt->fetch();
        $voornaam = $result["voornaam"];
        $tussenvoegsel = $result["tussenvoegsel"];
        $achternaam = $result["achternaam"];
        $winkelcode = $result["winkelcode"];
        $gebruikersnaam = $result["gebruikersnaam"];

	}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>FlowerPower uw gegegevens</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link href="FlowerPower.css" rel="stylesheet" type="text/css" media="screen" />
    </head>
    <body>
        <div id="wrapper">
        <?php include "header.php"; ?>
        <?php include "navigatieIngelogd.php";?>
        <div id = "content">
            <form id="invoer" method="POST">
                        <fieldset>
                            <legend>Uw gegevens</legend>
                            <?php if($error == -2) {
                                echo("<p class=\"error\">Wachtwoorden zijn niet gelijk..!</p>");
                            }
                            else {if($error== 1)
                                echo("<p class=\"error\">Er is iets fout gegaan met de gegevens..!</p>");
                            }
                             ?>
                            <div class="rij">
                                <label for="voorletters">Voorletters</label>
                                <input type="text" name="voornaam" id="voornaam" value="<?php echo $voornaam; ?>" autofocus />
                            </div>
                            <div class="rij">
                                <label for="tussenvoegsels">Tussenvoegsels</label>
                                <input type="text" name="tussenvoegsels" id="tussenvoegsels" value="<?php echo $tussenvoegsels; ?>" />
                            </div>
                            <div class="rij">
                                <label for="achternaam">Achternaam</label>
                                <input type="text" name="achternaam" id="achternaam" value="<?php echo $achternaam; ?>" />
                            </div>
                            <div class="rij">
                                <label for="postcode">Gebruikersnaam</label>
                                <input type="text" name="gebruikersnaam" id="gebruikersnaam" value="<?php echo $gebruikersnaam; ?>" />
                            </div>
                            <div class="rij">
                                <label for="wachtwoord">Wachtwoord</label>
                                <input type="password" name="wachtwoord" id="wachtwoord" value="" />
                            </div>
                             <div class="rij">
                                <label for="wachtwoord2">Wachtwoord</label>
                                <input type="password" name="wachtwoord2" id="wachtwoord2" value="" />
                            </div>
                            <div class="rij">
                                <input type="submit" name="wijzigen" value="Wijzigen" />
                                <input type="submit" name="verwijderen" value="Verwijderen" onclick="return confirm('Weet u zeker dat u deze medewerker wilt verwijderen?')" />
                                <input type="submit" name="terug" value="Terug"/>
                            </div>
                        </fieldset>
                    </form>
        </div>
        <footer>&copy; 2013 FastDevelopment version 1 build 1453</footer>
        </div>
    </body>
</html>
