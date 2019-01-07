<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 18/04/2018
 * Time: 17:41
 */

namespace Core\Auth;


use Core\Database\Database;

class DBAuth
{
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getId()
    {
        if ($this->logged()) {
            return $_SESSION['auth'];
        }
    }

    public function logged()
    {
        return isset($_SESSION['auth']);
    }

    /**
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($username, $password)
    {
        $user = $this->db->prepare('SELECT * FROM users WHERE username= ?', [$username], null, true);
        if ($user) {
            if ($user->password === sha1($password)) {

                $_SESSION['auth'] = $user->id;
                return true;
            }
        }
        return false;


    }
}