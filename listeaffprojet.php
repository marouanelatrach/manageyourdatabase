

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste</title>
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
            <form action="" method="get">
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
        
        <center><table style=";font-family:sans-serif">
            <tr>
                <th>Nbrres</th><th>Nom</th><th>Prenom</th><th>Tel</th><th>Nom Hotel</th><th>Nbrday</th>
            </tr>
            <?php
try {
        $user='root';
        $psw='';
        $con="mysql:host=localhost;dbname=hotel";
        $db=new PDO($con,$user,$psw);
        $request=$db->prepare('select *from liste');
        $request->execute();
        
        $tab = $request->fetchall(PDO::FETCH_ASSOC);
       
        foreach ($tab as $ligne) {
            echo '<tr>';
            foreach ($ligne as $colonne)
                echo '<td>' . $colonne . '</td>';
            echo '</tr>';
        }
        
    
    } catch (PDOEception $th) {
        die($th->getMessage());


    }






    if(isset($_GET['o'])){
        header('location:page2projet.php');
    
    }
    if(isset($_GET['x'])){
        session_destroy();
        header('location:page1projet.php');
    
    }
    elseif(isset($_GET['c'])){

        header('location:page4del.php');
    
    
    }
    if(isset($_GET['a'])){

        header('location:page3projet.php');
    
    
    }
    elseif(isset($_GET['d'])){
    
        header('location:page5rechercher.php');
    
    
    }
    ?>
        </table></center>



    <?php




?>
        
    </section>
  
    
</body>
</html>
