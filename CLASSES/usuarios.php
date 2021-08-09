<?php

Class Usuario{

    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $user, $password){

        global $pdo;
        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$user,$password);
        } catch (PDOException $e){
            $msgErro = $e->getMessage();
        }
        

    }

    public function cadastrar($email,$user,$password){
        global $pdo;

        $sql = $pdo->prepare("SELECT id FROM login WHERE user = :u");
        $sql->bindValue(":u",$user);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false;
        } else {
            $sql = $pdo->prepare("INSERT INTO login (user, email, password) VALUES (:u, :e, :s)");
            $sql->bindValue(":u",$user);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($password));
            $sql->execute();

            return true;
        }
    }

    public function logar($user, $password){

        global $pdo;
        $sql = $pdo->prepare("SELECT id FROM login WHERE user = :e AND password = :s");
        $sql->bindValue(":e",$user);
        $sql->bindValue(":s",md5($password));
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_user'] = $dado['id'];
            return true;
        } else {
            return false;
        }
    }

}


?>