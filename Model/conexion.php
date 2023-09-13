<?php
  
        // $host="localhost";
        // $dbname="Cafeteria";
        // $username="postgres";
        // $password="12345678";

        // try {
        //     $con= new PDO(
        //         'pgsql:host= localhost;port=5433;
        //         dbname='.$dbname, 
        //         $username,
        //         $password,
        //         );

        // } catch (PDOException $exp) {
        //     echo "Se presentó un error, $exp";

        // }
class CConexion
{
    private $pdo;

    public function __construct() {
        $host="localhost";
        $dbname="Cafeteria";
        $username="postgres";
        $password="12345678";
        try {
            $this->pdo = new PDO(
                        'pgsql:host= localhost;port=5433;
                        dbname='.$dbname, 
                        $username,
                        $password,
                        );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error de conexión a la base de datos: ' . $e->getMessage();
        }
    }

    public function ejecutarConsulta($sql) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error al ejecutar la consulta: ' . $e->getMessage();
            return false;
        }
    }

    public function ejecutarGuardar($sql) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $resultado = $stmt->execute();
            return $resultado;
        } catch (PDOException $e) {
            echo 'Error al ejecutar la consulta: ' . $e->getMessage();
            return false;
        }
    }

    public function ejecutarGuardarVenta($sql){
        try {
            $stmt = $this->pdo->prepare($sql);
            $resultado = $stmt->execute();
            if ($stmt->rowCount() > 0) {
                // La venta se registró con éxito
                return $this->pdo->lastInsertId(); // Devuelve el ID de la venta recién insertada
            } else {
                // Error al registrar la venta
                return false;
            }
        } catch (PDOException $e) {
            echo 'Error al ejecutar la consulta: ' . $e->getMessage();
            return false;
        }
    }

}


?>