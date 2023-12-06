<?php
require("C:/xampp/htdocs/asd/pags/db_connection.php");
class Todolist
{

    public $id;
    public $titulo;
    public $descripcion;
    public $fecha;
    public $completado;


    public static function getTodolist()
    {
        $conn = getConn();
        $todolist = [];

        $res = $conn->query("SELECT * from todolist where completado=0 order by fecha desc,id desc");

        if ($res === false) {
            echo $conn->error;
        }

        while ($a = $res->fetch_Object("Todolist")) {
            $todolist[] = $a;
        }
        $res->free();
        $conn->close();

        return $todolist;
    }

    public static function getCompl()
    {
        $conn = getConn();
        $todolist = [];

        $res = $conn->query("SELECT * from todolist where completado=1 order by fecha desc,id desc");

        if ($res === false) {
            echo $conn->error;
        }

        while ($a = $res->fetch_Object("Todolist")) {
            $todolist[] = $a;
        }
        $res->free();
        $conn->close();

        return $todolist;
    }

    public static function completar($id)
    {
        $conn = getConn();


        $st = $conn->prepare("update todolist set completado=1 where id=?");

        if ($st === false) {
            die($conn->error);
        }
        $st->bind_param("s", $id);
        $st->execute();

        $conn->close();
    }

    public static function descompletar($id)
    {
        $conn = getConn();


        $st = $conn->prepare("update todolist set completado=0 where id=?");

        if ($st === false) {
            die($conn->error);
        }
        $st->bind_param("s", $id);
        $st->execute();

        $conn->close();
    }


public static function insertar($titulo,$descripcion,$fecha){
        $conn = getConn();

        if($fecha!=""){
            $st = $conn->prepare("insert into todolist(titulo,descripcion,fecha,completado) values(?,?,?,0)");
            if ($st === false) {
                die($conn->error);
            }
            $st->bind_param("sss", $titulo,$descripcion,$fecha);
        }
        else{
            $st = $conn->prepare("insert into todolist(titulo,descripcion,completado) values(?,?,0)");
            if ($st === false) {
                die($conn->error);
            }
            $st->bind_param("ss", $titulo,$descripcion);
        }

        $st->execute();

        $conn->close();
    }

}

?>