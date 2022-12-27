<?php
    session_start();
    if(isset($_REQUEST["msg"])){
        echo "<a href='deconnexion.php'>Se Deconnecter</a>"."</br>";       
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Administration</title>
    <script>
        function showTable( id,prenoms,name, email, adresse, telephone) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("liste").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "listetudiants.php?name=" +escape(name) + "&id=" +escape(id) +
            "&prenoms=" + escape(prenoms) + "&email=" +escape(email) + "&adresse=" + escape(adresse) +
            "&telephone=" + escape(telephone), true);
            xhttp.send();
        }
    </script>
    <style>
        #entete{
            text-align: center;
        }
        #formu{
            color: red;
        }
        td{
            text-align: center;
        }
        .t2{
            border: 0px;
            border-collapse: separate;
        }
    </style>
</head>
<body>
    <a href="indexconn.php" id="b">Allez a la page d'acceuil</a>
    <?php
    if(isset($_REQUEST["msg"])){
        echo "<br>";
        $b=$_REQUEST["msg"];

        echo "<span style='color:green'> $b</span>";
    }
    ?>
    </br>
    <p id="liste"></p>
    <br>
    <table class="t2">
        <tr>
        <th class="t2" id="formu" colspan="7">Formulaire de Recherche par:</th>
        </tr>
        <tr class="champ">
        <td class="t2">Id:         </br> <input type="text" id="search-id" onkeyup="showTable(this.value)" ></td></br>
        <td class="t2">Prenom:     </br> <input type="text" id="search-prenoms" onkeyup="showTable(document.getElementById('search-id').value, this.value)"></td></br>
        <td class="t2">Nom:        </br> <input type="text" id="search-name" onkeyup="showTable(document.getElementById('search-id'),document.getElementById('search-prenoms').value,)"></td></br>
        <td class="t2">Email:      </br> <input type="text" id="search-email" onkeyup="showTable(document.getElementById('search-id').value, document.getElementById('search-prenoms'),document.getElementById('search-name').value, this.value)"></td></br>
        <td class="t2">Adresse:    </br> <input type="text" id="search-adresse" onkeyup="showTable(document.getElementById('search-id').value, document.getElementById('search-prenoms'),document.getElementById('search-name').value, document.getElementById('search-email'),this.value)"></td></br>
        <td class="t2">Telephone:  </br> <input type="text" id="search-telephone" onkeyup="showTable(document.getElementById('search-id').value, document.getElementById('search-prenoms'),document.getElementById('search-name').value, document.getElementById('search-email'), document.getElementById('search-adresse'),this.value)"></td></br>
        </tr>
    </table>
    </br><a href='ajouter.php'>Cliquer pour ajouter un nouveau etudiant</a>
</body>
</html>