<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page1</title>
    <script>
         function red(){
            n=document.getElementById('email').value;
            p=document.querySelector('#nom').value;
            i=document.querySelector('#prenom').value;
            if(n=='' || p=='' || i==''){
                alert ('++++++fill the following inputs please+++++');
                


            
        }}
        
    </script>
    <style>
        body{
            background-image: url(pexels-pixabay-261102.jpg);
            background-size: cover;
            
        }
        .cont{
            background-color: rgba(255, 255, 255, 0.842);
            color: black;
            font-size: x-large;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            width: 450px;
            padding: 30px;
            box-shadow: 0px 0px 20px black;
            border-radius: 30px;
            backdrop-filter: blur(5px);
            margin-top: 50px;
            font-weight: bold;
            height: 320px;
        }
        h1{
            font-size: 30px;
            text-align: center;
            color: rgb(213, 124, 16);
        }
        input{
            background-color: rgba(128, 128, 128, 0.386);
            border: 1px black solid;
            border-radius: 10px;
            width: 250px;
            height: 25px;
        }
        td{
            color: rgb(1, 1, 255);
            height: 50px;
            font-size: 20px;
        }
        .sub{
            width: 100px;
            
            font-size: large;
            padding: 10px;
            padding-top: 0px;
            transition: .4s;
        }
        .sub:hover{
            background-color: rgba(137, 137, 137, 0.172);
            transform: scale(1.1);

        }
    </style>

</head>
<body>
    <center><div class="cont">
        <h1>S'Enregister</h1><br>
        <form action="" method="get">
        <table>
            <tr>
                <td>Nom </td><td><input name="nom"  id="nom" type="text"></td>
            </tr>
            <tr>
                <td>Prenom </td><td><input name="prenom" id="prenom" type="text"></td>
            </tr>
            <tr>
                <td>Email </td><td><input name="email"  id="email" type="text"></td>
            </tr>
            <tr>
                <td> </td><td><input class="sub" type="submit" onclick="red()"  name="sube" value="registrer"></td>
            </tr>

        </table>

    </div></form></center>




    
</body>
</html>
<?php
if (isset ($_GET['sube'])    && !empty($_GET['email']) && !empty($_GET['nom']) && !empty($_GET['prenom'])) {
    $nom=$_GET['nom'];
    $prenom=$_GET['prenom'];
    $email=$_GET['email'];
    $_SESSION['nom']=$nom;
    $_SESSION['prenom']=$prenom;
    $_SESSION['email']=$email;
    header("location:page2projet.php");
}





?>