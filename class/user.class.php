<?php

class User extends Dbh 
{
    
    /**
     * createUser - Creates a new user
     *
     * @param  mixed $name
     * @param  mixed $password
     * @param  mixed $email
     * @param  mixed $dob
     * @param  mixed $hash
     * @param  mixed $created
     * @return void
     */
    public function createUser($name,$password,$email,$dob,$hash,$created)
    {
        $sql = "INSERT INTO users(Name,Email,Password,dob,Hash_Activation,Active,Created) VALUES (?,?,?,?,?,?,?)";
        // PREPARE SQL STATMENT
        $stmt = $this->connect()->prepare($sql);
        // EXECUTE SQL 
        $stmt->execute([$name,$email,$password,$dob,$hash,0,$created]);
    }

    public function checkEmail($email)
    {
        $sql = "SELECT Email FROM users WHERE Email = ? ";
        // PREPARE SQL STATMENT
        $stmt = $this->connect()->prepare($sql);
        // EXECUTE SQL 
        $stmt->execute([$email]);

        
         if ($stmt->rowCount() >= 1)
         {
             return true;
         }
         else
         {
             return false;
         }
    }
    
    /**
     * loginUser
     *
     * @param  mixed $email
     * @param  mixed $pwd
     * @return 
     */
    public function getUserCount($email,$pwd)
    {
        $sql = "SELECT COUNT(*) FROM users WHERE Email = ? AND Password = ? ";
        // PREPARE SQL STATMENT
        $stmt = $this->connect()->prepare($sql);
        // EXECUTE SQL 
        $stmt->execute([$email,$pwd]);
        $count = $stmt->fetchColumn();

        
         if ($count == 1)
         {

             return true;
         }
         else
         {
             return false;
         }
    }

    public function getUserData($email,$pwd)
    {
        $sql = "SELECT ID, Name FROM users WHERE Email = ? AND Password = ? ";
        $stmt = $this->connect()->prepare($sql);

        if($stmt->execute([$email,$pwd]))
        {
            $result = $stmt->fetchAll();

            return $result;

        }
        else
        {
            return false;
        }
    }






}