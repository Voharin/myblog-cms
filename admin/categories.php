<?php include "../admin/components/admin_header.php"; ?>
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
                        <th>Category Name</th>
                        <th>Add - Edit - Delete</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT * FROM categories";
                    $result = $conn->prepare($sql);
                    $result->execute();

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        // $categories[] = $row;
                        $category_id = $row['id'];
                        $category_name = $row['cat_name'];

                        echo "<tr>
                    <td>{$category_id}</td>
                    <td>{$category_name}</td>
                    <td>
                    <div class='dropdown'>
                    <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                      Actions
                    </button>
                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                      <a class='dropdown-item' href='#' data-toggle='modal' data-target='#modalAdding'>Add</a>
                      <a class='dropdown-item' href='#'>Edit</a>
                      <a class='dropdown-item' href='#'>Delete</a>
                    </div>
                  </div>
                    </td>
                </tr>
                
               ";
                    } ?>

                    <?php
                    // if (isset($_POST['add_category'])) {
                    //     $category_name = $_POST['category_name'];
                    //     $sql = "INSERT INTO `categories` (cat_name) VALUES (:cat_name)";
                    //     $result = $conn->prepare($sql);
                    //     $result->bindParam(':cat_name', $cat_name);
                    //     $result->execute();
                    //     if ($result) {
                    //         echo "<div class='alert alert-success'>Category Added Successfully</div>";
                    //     } else {
                    //         echo "<div class='alert alert-danger'>Category Not Added</div>";
                    //     }
                    // }

                    if (isset($_POST["add_category"])) {
                        $category_name = $_POST["category_name"];
                    }
                    if (!empty($category_name) && strlen($category_name) > 3) {
                        $sql = "INSERT INTO categories (cat_name) VALUES (:category_name)";
                        $result = $conn->prepare($sql);
                        $result->bindParam(':category_name', $category_name);
                        $result->execute();
                        if ($result) {
                            echo "<div class='alert alert-success'>Category Added Successfully</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Category Not Added</div>";
                        }
                    }


                    ?>

                    <!--Modal -->
                    <div class="modal fade" id="modalAdding" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Yeni bir kategori ekleyin</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="category_name">Kategori Adı</label>
                                            <input type="text" class="form-control" id="category_name" name="category_name">
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="add_category">Ekle</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                    <button type="button" class="btn btn-primary">Kaydet</button> -->
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

            <?php {
                /**
                 * 
                 * 
                 */
            }

            ?>