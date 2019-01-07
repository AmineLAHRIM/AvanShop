<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 27/03/2018
 * Time: 01:28
 */

namespace Core\Database;

use PDO;

//qui gere partie requete du base de donnee(la source original)

class MysqlDatabase extends Database
{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = 'root', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    /**
     * @param $statement la requette
     * @param $class_name la classe pour lui construre une class depant de la Entity a ete recu par la req
     * @return $datas Array Object Entity des objets de la classe $class_name
     */
    public function query($statement, $class_name = null, $one = false)
    {

        $req = $this->getPdo()->query($statement);
        //soit en fait comme ca ou si on besoin ajouter des colones sur Entity ArticleEntity
        //$datas=$req->fetchAll(PDO::FETCH_OBJ);

        //si il y a UPDATE OU INSERT OU DELETE
        if (
            strpos($statement, 'UPDATE') === 0 ||//trees Attention si tu met == strops return flase et bien sur flase c'est 0 mais su tu fait 3 il va recontre l'emplacement du 'UPDATE'
            strpos($statement, 'DELETE') === 0 ||
            strpos($statement, 'INSERT') === 0
        ) {
            return $req;
        }

        //$class_name exemple: App\Entity\ArticleEntity
        if ($class_name === null) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }

        if ($one == false) {
            $datas = $req->fetchAll();//send array d'object de type $class_name pour l'afficher obliger de faire foreach
        } else {
            $datas = $req->fetch();//send object de type $class_name pour le afficher sans foreach
        }
        return $datas;
    }

    public function getPdo()
    {
        if ($this->pdo === null) {
            $pdo = new PDO("mysql:dbname=" . $this->db_name . ";host=" . $this->db_host, $this->db_user, $this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function prepare($statement, $attributes, $class_name = null, $one = false)
    {
        $req = $this->getPdo()->prepare($statement);
        $res = $req->execute($attributes);

        if (
            strpos($statement, 'UPDATE') === 0 ||//trees Attention si tu met == strops return flase et bien sur flase c'est 0 mais su tu fait 3 il va recontre l'emplacement du 'UPDATE'
            strpos($statement, 'DELETE') === 0 ||
            strpos($statement, 'INSERT') === 0
        ) {
            return $res;
        }

        if ($class_name === null) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }

        if ($one == false) {
            $datas = $req->FetchAll();
        } else {
            $datas = $req->fetch();
        }
        return $datas;
    }

    public function lastinsertid()
    {
        return $this->getPdo()->lastInsertId();
    }
}