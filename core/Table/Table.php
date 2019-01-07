<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 23/03/2018
 * Time: 17:37
 */

namespace Core\Table;

use App\App;


//qui gere partie requete du base de donnee(vers la source original)

/**
 * Class Table
 * @package Core\Table
 */
class Table
{

    /*protected static $table; ce paramettre est static sur touts les enfants si et seulemnt si n'est pas declarer sur les enfants
    donc si la table est recoit qq chose donc tout les class enfant va recu la meme table ce qui est male
    exemple
    appeler une function getTable sur ArticleTable aussi $table sur Categorie recoit ArticleTable pour ce la soit en mettre cette solution de redefinit sur les enfants soit
     juste declarer sur les class enfants et mettre getTable qui va etre chaque class sa propre variable $table static
    */

    /*private static function getTable()
    {
        if (static::$table === null) {//self::$table fait refercee au Table et pas au child du cette class donc il faut remplacer par static
            //self::$table=__CLASS__;// pas comme car trjs vos donne Table
            $class_name = explode('\\', get_called_class());//comme split sur javascript
            //static::$table=strtolower(end($class_name));
            static::$table = end($class_name);


        }
        return static::$table;
    }*/


    public static function find($index)
    {
        $class_name = static::$table;

        //return App::getDatabase()->prepare('SELECT titre FROM '.static::getTable().' WHERE id=?',[$index],get_called_class(),true);
        //return App::getDatabase()->prepare("SELECT titre FROM {$class_name} WHERE id={$index}",array(),get_called_class(),true);
        return static::query("SELECT * FROM {$class_name} WHERE id={$index}", null, true);
    }

    protected static function query($statement, $attributes = null, $one = false)//$db injection des dependances
    {
        /*if ($attributes) {
            return App::getInstance()->getDatabase()->prepare($statement, $attributes, static::class, $one);
        } else {
            return App::getInstance()->getDatabase()->query($statement, static::class, $one);
        }*/


        if ($attributes) {
            return App::getInstance()->getDatabase()->prepare($statement, $attributes, str_replace('Table', 'Entity', static::class), $one);
        } else {
            return App::getInstance()->getDatabase()->query($statement, str_replace('Table', 'Entity', static::class), $one);
        }
    }

    public static function extractone($key, $value)
    {
        $records = static::all();//$records type class
        $return = [];//$return type array

    }

    public static function all()
    {
        $class_name = static::$table;

        return static::query("SELECT * FROM {$class_name}");
    }

    public static function extract($key, $value)
    {
        $records = static::all();//$records type class
        $return = [];//$return type array
        //recorde c'est
        /*
         *array (size=5)
  0 =>
    object(App\Entity\ArticleEntity)[13]
      public 'id' => string '3' (length=1)
      public 'titre' => string 'titre3' (length=6)
      public 'contenu' => string '<p>Qui officia deserunt mollit anim id est l<p>
      public 'date' => string '2018-03-21 21:37:54' (length=19)
      public 'categorie_id' => string '1' (length=1)
  1 =>
    object(App\Entity\ArticleEntity)[14]
      public 'id' => string '4' (length=1)
      public 'titre' => string 'titre4' (length=6)
      public 'contenu' => string '<p>Nemo enim ipsam voluptatem quia vol<p>u
  2 =>
    object(App\Entity\ArticleEntity)[15]
      public 'id' => string '9' (length=1)
      public 'titre' => string 'hello' (length=5)
      public 'contenu' => string '<p>Facere posi sint occaecati.</p>
      public 'date' => string '2018-03-21 21:42:52' (length=19)
      public 'categorie_id' => string '2' (length=1)
         *
         *
         *
         *
         */

        foreach ($records as $v) {
            //$v c'est chqaue block 0=> et 1=> et 2=> ....
            $return[$v->$key] = $v->$value;
            //$v->$key c'est $v->id si $recorde de type class/object mais si $records type array en faire $v[$key] par exemple comme cle du array $retrurn
        }
        return $return;
    }

    public static function findbyIdutil($index)
    {
        $class_name = static::$table;

        return static::query("SELECT * FROM {$class_name} WHERE Idutil={$index}", null, true);

    }


    //CRUD
    public static function update($index, $fileds = [])
    {

        $sql_parts = [];
        $class_name = static::$table;
        $primarykey = static::$primarykey;
        $attributes = [];
        foreach ($fileds as $k => $v) {
            $sql_parts[] = "$k = ?";//{titre = ? ,contenu = ?,categorie_id = ?}
            $attributes[] = $v;//valeurs de /\ haut
        }
        $attributes[] = $index;//le dernier pour WHERE
        $sql_part = implode(',', $sql_parts);//"titre = ? ,contenu = ?,categorie_id = ?" de type String
        //return App::getDatabase()->prepare('SELECT titre FROM '.static::getTable().' WHERE id=?',[$index],get_called_class(),true);
        //return App::getDatabase()->prepare("SELECT titre FROM {$class_name} WHERE id={$index}",array(),get_called_class(),true);
        return static::query("UPDATE  {$class_name} SET $sql_part WHERE {$primarykey}=?", $attributes, true);
    }

    public static function delete($index)
    {
        $class_name = static::$table;
        $primarykey = static::$primarykey;
        //return App::getDatabase()->prepare('SELECT titre FROM '.static::getTable().' WHERE id=?',[$index],get_called_class(),true);
        //return App::getDatabase()->prepare("SELECT titre FROM {$class_name} WHERE id={$index}",array(),get_called_class(),true);
        return static::query("DELETE FROM  {$class_name}  WHERE {$primarykey}=?", [$index], true);
    }

    public static function create($fileds)
    {
        $sql_parts = [];
        $class_name = static::$table;
        $attributes = [];
        foreach ($fileds as $k => $v) {
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }

        $sql_part = implode(',', $sql_parts);
        //return App::getDatabase()->prepare('SELECT titre FROM '.static::getTable().' WHERE id=?',[$index],get_called_class(),true);
        //return App::getDatabase()->prepare("SELECT titre FROM {$class_name} WHERE id={$index}",array(),get_called_class(),true);
        return static::query("INSERT INTO  {$class_name} SET $sql_part ", $attributes, true);
    }


}