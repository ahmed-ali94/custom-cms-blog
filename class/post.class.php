<?php

class Post extends Dbh 
{
    
    public function getPosts()
    {
        $sql = "SELECT * FROM posts";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetchAll();

        return $result;

    }

    public function setUsers($firstname,$lastname)
    {
        $sql = "INSERT INTO users(User_firstname,User_lastname) VALUES (?,?)";
        // PREPARE SQL STATMENT
        $stmt = $this->connect()->prepare($sql);
        // EXECUTE SQL 
        $stmt->execute([$firstname,$lastname]);
    }
    
    /**
     * setPost
     *
     * @param  mixed $post_title
     * @param  mixed $post_headline
     * @param  mixed $post_content
     * @param  mixed $post_author
     * @param  mixed $post_date
     * @return void
     */
    public function setPost($user_id,$post_title,$post_headline,$post_content,$post_author,$post_date)
    {
        $sql = "INSERT INTO posts(User_ID,Post_Title,Post_Subtitle,Post_Body,Post_Author,Post_Date) VALUES (?,?,?,?,?,?)";
        // PREPARE SQL STATMENT
        $stmt = $this->connect()->prepare($sql);
        // EXECUTE SQL 
        if ($stmt->execute([$user_id,$post_title,$post_headline,$post_content,$post_author,$post_date]))
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function getSinglePost($id)
    {
        $sql = "SELECT * FROM posts WHERE ID= ?";
        $stmt = $this->connect()->prepare($sql);

        if($stmt->execute([$id]))
        {
            $result = $stmt->fetchAll();

            return $result;

        }
        else
        {
            return false;
        }
    }

    public function getUserPosts($user_id)
    {
        $sql = "SELECT ID, User_ID, Post_Title FROM posts WHERE User_ID= ? LIMIT 10";
        $stmt = $this->connect()->prepare($sql);

        if($stmt->execute([$user_id]))
        {
            $result = $stmt->fetchAll();

            return $result;

        }
        else
        {
            return false;
        }
    }

    public function updatePost($post_id,$post_title,$post_headline,$post_content,$post_date)
    {
        $sql = "UPDATE posts SET Post_Title = ?, Post_Subtitle = ?, Post_Body = ?, Post_Date = ? WHERE ID = ?";
        // PREPARE SQL STATMENT
        $stmt = $this->connect()->prepare($sql);
        // EXECUTE SQL 
        if ($stmt->execute([$post_title,$post_headline,$post_content,$post_date,$post_id]))
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function deletePost($post_id)
    {
        $sql = "DELETE FROM posts WHERE ID = ?";
        // PREPARE SQL STATMENT
        $stmt = $this->connect()->prepare($sql);
        // EXECUTE SQL 
        if ($stmt->execute([$post_id]))
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    

}