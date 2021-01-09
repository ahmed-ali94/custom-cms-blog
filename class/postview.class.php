<?php
/**
 * PostView
 */
class PostView extends Post
{
            
    /**
     * displayPosts - Displays all blog posts stored in the DB if it is not empty.
     *
     * @method
     */
    
    public function displayPosts()
    {
        if (!empty($this->getPosts()))  // if there is any data
        {
          foreach ($this->getPosts() as $post)
          {
            // Format the date from SQL table so that it can look like 26/12/2020 08:40 PM
            $date = new DateTime($post["Post_Date"]);


            echo  "<div class='col-lg-4'>"
                  ."<div class='card mb-3'>\n"
                  ."<img class='card-img-top' src='img/poggy.jfif' alt='Card image cap'>\n"
                  ."<div class='card-body'>\n"
                  ."<a href='post.php?post_id=" . $post["ID"]. "'>\n"
                    ."<h2 class='post-title'>". $post['Post_Title']."</h2></a>\n"
                    ."<p class='post-subtitle'>".$post["Post_Subtitle"]  . "</p>\n"
                    ."<p class='card-text'><small class='text-muted'>Posted by " . $post["Post_Author"] ." on " . $date->format('d/m/Y h:i A') ." AEST</small></p>\n"
                    ."</div>\n"
                    ."</div>\n"
                  ."</div>\n"
                  ."<hr>";
            
          }

        }

        else
        {
          echo "No new Posts";
        }

    }

}