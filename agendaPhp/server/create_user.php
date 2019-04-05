 <?php      
       include('conector.php');
       $con = new ConectorBD('localhost','root','');
       $response['conexion'] = $con->initConexion('agenda');
       if ($con->recordCount('usuarios')>0){ //Invoca la función recordCount para saber si la tabla contiene registros
             echo "<h3>La tabla usuarios ya contiene registros</h3>";
             exit;
       }
       if ($response['conexion']=='OK') {
             $data = array();
             $data = [
                         [
                               'email' => "'andresmaldonado@gmail.com'",
                               'nombre' => "'ANDRES MALDONADO'",
                               'psw' => "'".password_hash('andres', PASSWORD_DEFAULT)."'",
                               'fecha_nacimiento' => "'1990-05-13'"
                         ],
                         [
                               'email' => "'mariaballestas@gmail.com'",
                               'nombre' => "'MARIA BALLESTAS RIVERA'",
                               'psw' => "'".password_hash('maria', PASSWORD_DEFAULT)."'",
                               'fecha_nacimiento' => "'1990-05-11'",
                         ],
                         [
                               'email' => "'soniaguerrero@email.com'",
                               'nombre' => "'SONIA GUERRERO PUELLO'",
                               'psw' => "'".password_hash('sonia', PASSWORD_DEFAULT)."'",
                               'fecha_nacimiento' => "'1990-05-12'",
                         ]
              ];             
             echo "<h3>Usuarios</h3><br>";
             foreach($data as $d){
                   if($con->insertData('usuarios', $d)){
                         echo $d["nombre"]." - ". $d["email"] ."... Registro creado <br>";
                   }else {
                         echo "Hubo un error y los datos no han sido guardados...<br>";
                   }    
             }             
       }else {
             echo "No se pudo conectar a la base de datos";
       }
?>
