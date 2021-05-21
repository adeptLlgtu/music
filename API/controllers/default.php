<?php 
namespace SDFramework\Controllers;
use SDFramework\Controller;
use \SDFramework\Database;
use SDFramework\Environment;
use SDFramework\ExceptionHandler;
class DefaultController
{
   /**
    * welcome
    * Главная страница
    * @return void
    */
   public static function welcome()
   {
    return '
    <head>

    <div class="wrapper">
       <span>status 200</span>
    </div>';
   }

   /**
    * col_get_between
    * Выводит данные 
    * @param mixed $id
    * @param mixed $field
    * @return void
    */
 

   /**
    * col_get_by
    * Выводит данные 
    * @param mixed $id
    * @param mixed $field
    * @return void
    */
 

   public static function get($table)
   {
      $db = (new Database())->ORM;

    
      $data = $db->getAll('SELECT * FROM '.$table.'');

      return json_encode($data);
   }
   




   public static function registration()
   {
      $db = (new Database())->ORM;
      $data = $_POST;

      // Указываем, что будем работать с таблицей users
      $users = $db->dispense('users');
      // Заполняем объект свойствами
      $users->login = $data['login'];
      $users->password = $data['password'];
   
   
      // Сохраняем объект
      $db->store($users);

      return json_encode($data);
   }

   public static function roots()
   {
      $db = (new Database())->ORM;
      $data = $_POST;
      $id = $data['id'];
      // Указываем, что будем работать с таблицей users
      $users = $db->load('users', $id);
      // Заполняем объект свойствами
      $users->root = $data['root'];
 
   
   
      // Сохраняем объект
      $db->store($users);

      return json_encode($data);
   }

   


}
?>