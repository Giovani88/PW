<?php
include("conexion.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yila'ob</title>
    <link rel="stylesheet" href="./css/alert.css">
    <link rel="stylesheet" href="css/login.css">

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/styles2.css">
    <script defer src="alert.js"></script>
    <?php
  include("nav.php");
    ?>
</head>
<body class="back-img">

  <div class="contenedor-login">

     <div class="login">
        <div class="login__bienvenido">
            <h1 class="h1-r">Bienvenido</h1>
            <img class="login__img" src="img/logo.png" alt="logo">
       
        </div>
<?php
if(isset($_POST['enviar'])){
  require 'conexion.php';
    $correo = $_POST['email'];
    $password=sha1($_POST['password']);
    $query = "SELECT * FROM usuarios WHERE correo='$correo' AND contraseña='$password'";
    

	$consulta = mysqli_query($con,$query);
	if(mysqli_num_rows($consulta)!=0){//Si encontro el usuario		
        session_start();    
        $row = mysqli_fetch_assoc($consulta);
        $nombre = $row['nombre'];
        $_SESSION['username']=$correo;        
        $_SESSION['id']= $row["id_usuario"];        
        header("location: index.php");

	}else{
       echo "<div id='alert' class='alert'>
       <span class='closebtn'>&times;</span>
       Correo electrónico y/o contraseña incorrectos.
     </div>";

	} 
    
}
?>
        <form action="" method="post">
            <div class="login__input">
                <label for="email">Correo Electronico</label><br>
                <input class="input-email" type="email" name="email" placeholder="Example@gmail.com" 
                id="email" pattern="^[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}$"
                value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"
                required>
            </div>
            <div class="login__input">
                <label for="password">Contraseña</label><br>
                <input class="input-pass" type="password" name="password" placeholder="Contraseña" id="password" required>
            </div>
    
            <div class="login__btn">
                <button class="btn" name="enviar" type="submit">Iniciar Sesión</button>
            </div>
        </form>

        <div class="login__registro">
            <h2>¿Eres Nuevo?</h2> 
            <a href="registro.php">Registrate aqui</a>
        </div>
        <div class="login__forget">
            <h2>¿Olvidaste la</h2> 
            <a href="">contraseña</a>
            <h2>?</h2>
        </div>
    </div>
  </div>

<?php
  include("footer.php");
?>


</body>
</html>