

<?php include "includes/db.php";?>
<?php //HEADER ALANINI VE FOOTER ALANINI REF OLARAK GÖSTERMEK İÇİN KULLANDIĞIMIZ DOSYA İÇİ REFERANS
    include "includes/header.php";?>
    <!--NAVIGATION-->
    <?php include "includes/navigation.php";?>  
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                <!-- POSTLARI GÖSTERMEK ICIN KULLANIYORUM-->
                <?php 
                    $query ="SELECT * FROM posts";
                     $select_all_posts_query = mysqli_query($connection,$query);
                    
                        while($row = mysqli_fetch_assoc($select_all_posts_query)){
    
                            $post_id = $row['post_id']; 
                            $post_title = $row['post_title']; 
                            $post_author= $row['post_author']; 
                            $post_date  = $row['post_date']; 
                            $post_image = $row['post_image']; 
                            $post_content = substr($row['post_content'],0,100); 
                            $post_status = $row['post_status'];
                            
                            if($post_status == 'published'){
                                
                           /*     echo "<h1 class='text-center'>THERE IS NO POST TO */                        
                ?>
                
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                <hr>
                <a  href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                </a>    
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>

      <?php }  } ?>     
                        
                
            </div>        
            <!--SIDEBAR-->
          <?php include "includes/sidebar.php";?>
        </div>
        <!-- /.row -->
        <hr>      
        <!--FOOTER-->
        <?php include "includes/footer.php"; ?>
       