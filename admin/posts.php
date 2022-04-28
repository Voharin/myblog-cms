<?php include "./components/admin_header.php"; ?>
<?php include "./components/admin_navbar.php"; ?>
<div id="wrapper">

    <?php include "./components/admin_sidebar.php"; ?>



    <div id="content-wrapper">
        <div class="container-fluid">
            <h1>Welcome to Admin Page</h1>
            <hr>

            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Post Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th>Comments</th>
                        <th>Image</th>
                        <th>Text</th>
                        <th>Tags</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Veritabanına veri ekleme -->
                    <?php      
                    if (isset($_POST["add_post"])) {
                        $post_title = $_POST["post_title"];
                    
                       
                        $post_category = $_POST["post_category"];
                        $post_author = $_POST["post_author"];
                        $post_date = date("Y-m-d");
                        if(array_key_exists("post_image", $_FILES)){
                            echo "ifdeyim!";
                            $post_image = $_FILES["post_image"]["name"];
                            echo $post_image;
                            $post_image_temp = $_FILES["post_image"]["tmp_name"];
                            move_uploaded_file($post_image_temp, "../uploadedFiles/$post_image");

                        }
 
                        $post_content = $_POST["post_text"];
                        $post_tags = $_POST["post_tags"];
                        $post_comment_count = 0;

                        $sql = "INSERT INTO posts ( post_category, post_title,  post_author, post_date, post_image, post_content, post_comment, post_tags) VALUES ( $post_category, $post_title, $post_author, now(), $post_image, $post_content, $post_comment_count,  $post_tags)";
                        echo $sql;
                        $result = $conn->prepare($sql);
                        $result->execute(); 
                        if ($result) {
                            echo "<div class='alert alert-success'>Post Added</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Post Not Added</div>";
                        }
                        header("Refresh:2"); }
                    ?>

                       <!-- Veritabanından veri silme -->
                       <?php if (isset($_GET["delete"])) {
                        echo "delete";
                        $post_id = $_GET["delete"];
                        $sql = "DELETE FROM posts WHERE post_id = {$post_id}";
                        $result = $conn->prepare($sql);
                        $result->execute();
                        if ($result) {
                            echo "<div class='alert alert-success'>Post Deleted</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Post Not Deleted</div>";
                        }
                        header("Refresh:2");
                    } 
                    ?>

                    <!-- Veritabanında veri güncelleme -->

                    <?php
                    if (isset($_POST["update_post"])) {
                         $post_ids = $_POST['id_value'];
                         echo $post_ids;
                    
                        $post_title = $_POST["post_title"];
                        $post_category = $_POST["post_category"];
                        $post_author = $_POST["post_author"];
                        $post_date = date("Y-m-d");
                        // $post_image = $_POST["post_image"];
                        $post_image= $_FILES["post_image"]["name"];
                        $post_image_temp = $_FILES["post_image"]["tmp_name"];
                        $post_content = $_POST["post_text"];
                        $post_tags = $_POST["post_tags"];
                        $post_comment_count = 0;

                        move_uploaded_file($post_image_temp, "../uploadedFiles/$post_image");

                        $sql = "UPDATE posts SET  post_title = '$post_title', post_author = '$post_author', post_date = '$post_date', post_image = '$post_image', post_content = '$post_content', post_comment = '$post_comment_count', post_tags = '$post_tags' WHERE post_id = $post_ids";
                        echo $sql;
                        $result = $conn->prepare($sql);
                        $result->execute();


                        if ($result) {
                            echo "<div class='alert alert-success'>Post Updated</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Post Not Updated</div>";
                        }
                        header("Refresh:2");
                    }
                    
                    ?>

                    <!-- Verileri veritabanından çekme -->
                    <?php
                    $sql = "SELECT * FROM posts ORDER BY post_id DESC";
                    $result = $conn->prepare($sql);
                    $result->execute();
                        $k=1;
                    while ($posts = $result->fetch(PDO::FETCH_ASSOC)) {
                    //   $posted=  print_r($posts)."<br>";
                    //  $posted_json= json_encode($posted);
                    //  echo "posted is: ".$posted_json ";<br>";
                        $post_id = $posts["post_id"];
                       // echo $post_id;
                        $post_title = $posts["post_title"];
                        $post_category_id = $posts["post_category_id"];
                        $post_author = $posts["post_author"];
                        $post_date = $posts["post_date"];
                        $post_image = $posts["post_image"];
                        $post_content = substr($posts["post_content"], 0, 140);
                        $post_tags = $posts["post_tags"];
                        $post_comment_count = $posts["post_comment"];

                     //   move_uploaded_file($post_image_temp, "../uploadedFiles/$post_image");

                        if(empty($post_image)){
                           $query = "SELECT * FROM posts WHERE post_id = '$_POST[post_id]'"; 
                           $select_image = $conn->prepare($query);
                           $select_image->execute();

                           while($row = $select_image->fetch(PDO::FETCH_ASSOC)){
                               $post_image = $row["post_image"];
                           }
                        }

                        echo " <tr>
                <td>{$post_id}</td>
                <td>{$post_title}</td>
                <td>$post_category_id</td>
                <td>$post_author</td>
                <td>$post_date</td>
                <td>$post_comment_count</td>
                <td><img src='../uploadedFiles/$post_image' style='width:80px; height:80px'/> </td>
                <td>$post_content... </td>
                <td>$post_tags</td>
                <td>
                    <div class='dropdown'>
                        <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            Actions
                        </button>
                        <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                            <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$post_id' >Edit</a>
                            <div class='dropdown-divider'></div>
                            <a class='dropdown-item' href='posts.php?delete={$post_id}'>Delete</a>
                            <div class='dropdown-divider'></div>
                            <a class='dropdown-item' data-toggle='modal' data-target='#add_modal'>Add</a>
                        </div>
                    </div>
                </td>
            </tr>";
                
                    ?>
                    <!-- Edit Modal -->

                    <div id="edit_modal<?php echo $post_id ?>" class="modal fade" >
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Portfolio</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post" enctype="multipart/form-data"> 
                                    <div class="form-group">
                                            <label for="post_id">Post id</label>
                                            <input type="hidden" class="form-control" name="post_id" disabled value="<?php echo $post_id ?>">
                                            <a href="posts.php?post_id=<?php echo $post_id ?>"> <?php echo $post_id ?></a>
                                        </div>
                                        <div class="form-group">
                                            <label for="post_title">Post Title</label>
                                            <input type="text" class="form-control" name="post_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="post_category">Post Category</label>
                                            <input type="text" class="form-control" name="post_category">
                                        </div>
                                        <div class="form-group">
                                            <label for="post_author">Post Author</label>
                                            <input type="text" class="form-control" name="post_author">
                                        </div>

                                        <div class="form-group">
                                            <label for="post_image">Post Image</label>
                                            <input type="file" class="form-control" name="post_image" />
                                        </div>
                                        <div class="form-group">
                                            <label for="post_tags">Post Tags</label>
                                            <input type="text" class="form-control" name="post_tags">
                                        </div>
                                        <div class="form-group">
                                            <label for="post_text">Post Text</label>
                                            <textarea class="form-control" name="post_text" id="" cols="20" rows="5"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="post_id" value="">
                                            <input type="submit" class="btn btn-primary" name="update_post" value="Gonder">
                                            <input type="hidden" class="btn btn-primary" name="id_value" value="<?php echo $post_id ?>">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                            <?php $k++; } //while closes ?>


                    <!-- Add Modal -->

                    <div id="add_modal" class="modal fade" enctype="multipart/form-data">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="post_title">Post Title</label>
                                            <input type="text" class="form-control" name="post_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="post_category">Post Category</label>
                                            <input type="text" class="form-control" name="post_category">
                                        </div>
                                        <div class="form-group">
                                            <label for="post_author">Post Author</label>
                                            <input type="text" class="form-control" name="post_author">
                                        </div>


                                        <div class="form-group">
                                            <label for="post_image">Post Image</label>
                                            <input type="file" class="form-control" name="post_image">
                                        </div>
                                        <div class="form-group">
                                            <label for="post_tags">Post Tags</label>
                                            <input type="text" class="form-control" name="post_tags">
                                        </div>
                                        <div class="form-group">
                                            <label for="post_text">Post Text</label>
                                            <textarea class="form-control" name="post_text" id="" cols="20" rows="5"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="post_id" value="">
                                            <input type="submit" class="btn btn-primary" name="add_post" value="Add Post">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </tbody>
            </table>

            <?php include "./components/admin_footer.php"; ?>

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
            <script src="js/lightbox-plus-jquery.js"></script>
            <script src="js/owl.carousel.min.js"></script>
            <script src="js/main.js"></script>