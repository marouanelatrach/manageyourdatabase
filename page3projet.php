<?php
session_start();


if (isset($_GET['reserver'])) {
    $nbrres=$_GET['nbrres'];
    $nom=$_GET['nom'];
    $pren=$_GET['prenom'];
    $tel=$_GET['telef'];
    $sel=$_GET['sel'];
    $nbrj=$_GET['nbrjour'];
    
    

 
   try {
        $user='root';
        $psw='';
        $con="mysql:host=localhost;dbname=hotel";
        $db=new PDO($con,$user,$psw);
        $request=$db->prepare('INSERT INTO liste VALUES (:a,:b,:c,:d,:e,:f);');
        $request->execute([':a'=>$nbrres, ':b'=>"$nom" ,':c'=>"$pren" , ':d'=>$tel ,':e'=>"$sel", ':f'=>$nbrj]);
        
    } catch (PDOEception $th) {
        die($th->getMessage());

    }
    

    echo '<script>alert("data affected");</script>';
    

}
if(isset($_GET['o'])){
    header('location:page2projet.php');

}
if(isset($_GET['x'])){
    session_destroy();
    header('location:page1projet.php');

}
elseif(isset($_GET['b'])){
    header('location:listeaffprojet.php');
}
if(isset($_GET['a'])){

    header('location:page3projet.php');


}
elseif(isset($_GET['c'])){

    header('location:page4del.php');


}
elseif(isset($_GET['d'])){
    
    header('location:page5rechercher.php');


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reserver</title>
    



<style>
        header{
            background-color: rgba(255, 136, 0, 0.875);
            width: 100%;
            height: 40px;
            padding-top: 1px;
        }
        h2{
            text-align: center;
            color: white;
            font-family: sans-serif;
            font-size: 13px;
            
        }
        section{
            background-size: cover;
            border: 6px solid darkorange;
            border-radius: 20px;
            height: 290px;
            backdrop-filter: blur(5px);
            padding-top:30px;


        }
        nav{
            display: flex;
            gap: 20px;
            
        }
        button{
            width: 80px;
            padding:6px;
            background:none;
            border: none;
            border-radius:10px;
            border: 2px solid darkorange;
            padding-bottom: 5px;
            font-size: 10px;
            height:35px;

            
           

        }
        select{
            width: 105px;
            padding:6px;
            background:none;
            border: none;
            border-radius:10px;
            border: 2px solid darkorange;
            padding-bottom: 5px;
            font-size: 10px;
            height:31px;

        }
        .continp{
            margin-left: 20px;
            margin-top: 10px;
            margin-bottom:10px;
            display: flex;
            gap: 30px;
        }
        .log{
            font-family:sans-serif;
            padding-top:15px;
            font-size:15px;
            font-weight:bold;
            padding-left:20px;
        }
        legend{
            color:darkorange;
            font-size:x-large;
            font-family:sans-serif:
            
        }
        .all{
            
        }
        fieldset{
            
            margin:auto;
            width: 50%;
            font-weight:bold;
            


        }
       
        
       
        
    </style>
</head>
<body>
    <header>
        <h2>welcom in our website to reserve your room online</h2>

    </header>
    <nav>
        <img src="pngwing.com.png" width="15%" alt="">
        <div class="continp">
            <form action="">
                <button type="submit" name="a">Reserver</button>
                <button type="submit" name="b" style="width:100px;">liste reservations</button>
                <button type="submit" style="width:100px;" name="c">del reservation</button>
                <button type="submit" name="d">Rechercher</button>
                <button type="submit" name="o">Acceuil</button>
                <button type="submit" name="x">deconexion</button>

        </form></div><br>
        <span class="log">
        <?php
        echo 'User : ' .$_SESSION['nom'].'  '.$_SESSION['prenom'];
        ?></span>

    </nav>
    <section>
    <form action="" class="all" method="get" autocomplet="off">
    <fieldset style="width:50%">
        <legend>Fill in</legend>
        <center><table>
            <tr>
                <td>Nombre Reservation</td><td><input name="nbrres" type="number"></td>
            </tr>
            <tr>
                <td>Nom </td><td><input name="nom" type="text"></td>
            </tr>
            <tr>
                <td>Prenom </td><td><input name="prenom" type="text"></td>
            </tr>
            <tr>
                <td>Tel </td><td><input name="telef" type="tel"></td>
            </tr>
            <tr>
                <td>Hotel </td><td><select name="sel">
                    <option value="Hotel MARIOT">Hotel MARIOT</option>
                    <option value="Hotel IBIS">Hotel IBIS</option>
                    <option value="Hotel RAHA">Hotel RAHA</option>
                    <option value="Hotel BENIMAKADA">Hotel BENIMAKADA</option>
                </select></td>
            </tr>
            <tr>
                <td>Nombre de jours</td><td><input name="nbrjour" type="number"></td>
            </tr>
            <tr>
                <td></td><td><input type="submit" name="reserver" value="reserver"></td>
            </tr>
            
        </table></center>
    </fieldset>

</form>
        
        



 
        
    </section>

    
    
</body>
</html>

