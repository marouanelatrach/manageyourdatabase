<?php
session_start();

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
    <title>rechercher</title>
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
            padding:3px;
            background:none;
            border: none;
            border-radius:10px;
            border: 2px solid darkorange;
            padding-bottom: px;
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
        fieldset{
            
            margin:auto;
            width: 50%;
            font-weight:bold;
          


        }
        fieldset{

        }
        th{
            width: 150px;
            border:2px solid darkorange;

        }
        td{
            border:1px solid darkorange;
            padding:4px;

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
                <button type="submit" style="width:100px;" name="b">liste reservations</button>
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
    <?php if (isset($_GET['sub'])) {
    $nom=$_GET['nom'];
    $prenom=$_GET['prenom'];


    try {
        $user='root';
        $psw='';
        $con="mysql:host=localhost;dbname=hotel";
        $db=new PDO($con,$user,$psw);
        $request=$db->prepare('SELECT *from liste where Nom=:b and Prenom=:c;');
        $request->execute([ ':b'=>"$nom" ,':c'=>"$prenom"]);
        
        $tab = $request->fetchall(PDO::FETCH_ASSOC);
        echo "<center><table>";
        echo "<tr>
        <th>Nbrres</th><th>Nom</th><th>Prenom</th><th>Tel</th><th>Nom Hotel</th><th>Nbrday</th>
    </tr>";
        foreach ($tab as $ligne) {
            
            echo '<tr>';
            foreach ($ligne as $colonne)
                echo '<td>' . $colonne . '</td>';
            echo '</tr>';
        };
        echo "</table></center>";

        
    
    } catch (PDOEception $th) {
        die($th->getMessage());
    
    
    }} ?>
    <form action="" method="get" autocomplet="off">
    <fieldset style="width:50%">
        <legend>Fill in</legend>
        <center><table>
            <tr>
                <td  style="border:none;">Nom</td><td  style="border:none;"><input style="  width: 130px;" name="nom" type="text"></td>
            </tr>
            <tr>
                <td  style="border:none;">Prenom</td><td  style="border:none;"><input style="  width: 130px;" name="prenom" type="text"></td>
            </tr>
            
            <tr>
                <td  style="border:none;"></td><td  style="border:none;"><input style="  width: 130px;" type="submit" name="sub" value="Rechercher"><br><br></td>
            </tr>
            </table></center>
    </fieldset>

</form>

        
        



    <?php

if(isset($_GET['a'])){

    header('location:page3projet.php');


}
elseif(isset($_GET['c'])){

    header('location:page4del.php');


}
elseif(isset($_GET['b'])){
    header('location:listeaffprojet.php');
}
elseif(isset($_GET['x'])){
    session_destroy();
    header('location:page1projet.php');

}

?>
        
    </section>
  
    
</body>
</html>
