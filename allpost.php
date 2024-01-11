<?php
   session_start();
   include "./db/env.php";
   $query="SELECT * FROM posts";
   $res=mysqli_query($conn,$query);
   $posts=mysqli_fetch_all($res,1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post_reaction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<!--nav section start-->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">Post Reaction</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">add post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./allpost.php">all post</a>
        </li>
      
      </ul>
    </div>
  </div>
</nav>
<!--nav section end-->
<!--form user section start-->
<section id="user_form">
      <div class="container">
          <div class="row">
              <div class="user_form_section_start col-lg-8 m-auto" style="margin-top:  45px;">
                     <div class="card">
                        <div  class="car-header"style="padding:15px;">post form</div>
                     </div>
                  <table class="table">   
                    <tr>
                        <th>id</th>
                        <th>author</th>
                        <th>title</th>
                        <th>details</th>
                        <th></th>
                    </tr>
                    <?php 
                        if(count($posts)>0){
                          foreach($posts as $key=>$post){
                       ?> 
                           <tr>
                                <td><?= ++$key  ?></td>  
                                <td><?= $post["author"]   ?></td>
                                <td><?= $post["title"]   ?></td>
                                <td><?= $post["details"]   ?></td>  
                                <td>
                                       <div class="btn">
                                           <a href="./edit.php?post_id=<?= $post["id"] ?>">edit</a>
                                           <a href="./controller/delete.php">delete</a>
                                       </div>
                                </td> 
                           </tr>
                      <?php  

                          }
                        }else{
                       ?> 
                            <tr>
                              <td>no post found </td>
                            </tr>
                      <?php    
                        }
                    ?>
</table>

<?php
?>

              </div>
          </div>
      </div>
</section>
<!--//form user section end-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<?php
   session_unset();
?>