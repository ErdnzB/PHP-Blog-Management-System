<?php  //KAYIT ATILMAYAN YER VAR BAKILACAK

    
   if(isset($_POST['create_post'])) {
   
            $post_title        = mysqli_real_escape_string($connection,$_POST['title']);
            $post_author       =  mysqli_real_escape_string($connection,$_POST['author']);
            $post_category_id  = mysqli_real_escape_string($connection,$_POST['post_category']);
            $post_status       = mysqli_real_escape_string($connection,$_POST['post_status']);
    
            $post_image        = mysqli_real_escape_string($connection,$_FILES['image']['name']);
            $post_image_temp   = mysqli_real_escape_string($connection,$_FILES['image']['tmp_name']);
    
    
            $post_tags         = mysqli_real_escape_string($connection,$_POST['post_tags']);
            $post_content      = mysqli_real_escape_string($connection,$_POST['post_content']);
            $post_date         = mysqli_real_escape_string($connection,date('d-m-y'));
            //$post_comment_count = 4;

       
        move_uploaded_file($post_image_temp, "../images/$post_image" );
       
       
      $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date,post_image,post_content,post_tags,post_status) ";
             
      $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}') "; 
             
      $create_post_query = mysqli_query($connection, $query);  
          
       confirm($create_post_query);
       
       echo "<div class='alert alert-success' role='alert'> Post has been updated successfully <a href='../post.php?p_id={$the_post_id}'>View This Post </a> or <a href='posts.php'>Edit More Posts</a> </div>";
        


   }

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="category">Post Category</label>
        <select name="post_category" id="">

            <?php

        $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection,$query);
        
        confirm($select_categories);

        while($row = mysqli_fetch_assoc($select_categories )) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
                   
            echo "<option value='$cat_id'>{$cat_title}</option>";
      
        }
        ?>
        </select>
    </div>


    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <select name ="post_status" id="">
            <option value="draft">Post Status</option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
        </select>  
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="body" cols="30" rows="10"></textarea>
          <script>
        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
        </script>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>

</form>