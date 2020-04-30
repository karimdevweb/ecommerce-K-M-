<?php


class Database 
{
     private $cnx;
     private $lastInsertId;
     public function __construct()
     {
         try {
             $this->cnx = new PDO("mysql:host=localhost;dbname=".DATABASE["dbname"].";charset=utf8", DATABASE["user"], DATABASE["password"]);
         } catch (PDOException $e) {
           die($e->getMessage());
         }
     }

     
    /**
    * Get the value of lastInsertId
    */
       public function getLastInsertId() : int
    {
        return $this->lastInsertId;
    }


     /**
      * @param string $request
      * @param array $params
      * @return boolean
      */
      public function insertIntoDB(string $request, array $params) : bool
      {
            $stmt = ($this->cnx)->prepare($request);
            $result = $stmt->execute($params);
            $this->lastInsertId = ($this->cnx)->lastInsertId();
            return $result;
      }


      /**
      * @param string $request
      * @param array $params
      * @return boolean
      */
      public function modifDB(string $request, array $params) : bool
      {
            $stmt = ($this->cnx)->prepare($request);
            $result = $stmt->execute($params);
            return $result;
      }


      /**
      * @param string $request
      * @param array $params
      * @return array
      */
      public function getAllFromDB(string $request, array $params) : array
      {
          $stmt = ($this->cnx)->prepare($request);
          $stmt->execute($params);
          $result = $stmt->fetchAll();
          return $result;

      }
      /**
      * @param string $request
      * @param array $params
      * @return array
      */
      public function getOneFromDB(string $request, array $params) : array
      {
          $stmt = ($this->cnx)->prepare($request);
          $stmt->execute($params);
          $result = $stmt->fetch();
          return $result;

      }

   

    public function __destruct()
    {
        $this->cnx = null;
        //unset($this->cnx)
    }








}