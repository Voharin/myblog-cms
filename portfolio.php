<!doctype html>
<html lang="en">

<?php include("./components/header.php")  ?>

<body>

    <!-- Navigation -->
    <?php include("components/navigation.php"); ?>

    <!--==========================
    INSIDE HERO SECTION Section
============================-->
    <section class="page-image page-image-portfolio md-padding">
        <h1 class="text-white text-center">PORTFOLIO</h1>
    </section>

    <!--==========================
    PORTFOLIO Section
============================-->
    <section id="portfolio" class="md-padding">
        <div class="container">

            <div class="row text-center">
                <div class="col-md-4 offset-md-4">
                    <div class="section-header">
                        <h2 class="title">Çalışmalar</h2>
                    </div>
                </div>
            </div>
            <div class='row'>
                <?php
                $portfolio = $conn->prepare("SELECT * FROM portfolios ORDER BY id DESC");
                $portfolio->execute();
                while ($row = $portfolio->fetch(PDO::FETCH_ASSOC)) {

                    $portfolio_id = $row['id'];
                    $portfolio_title = $row['title'];
                    $portfolio_image_large = $row['large_image'];
                    $portfolio_category = $row['portfolio_category'];

                    echo "
                    
                       <div class='col-md-4 col-sm-6 portfolio-item'>
                           <a href='./uploadedFiles/{$portfolio_image_large}' class='portfolio-link' data-lightbox='{$portfolio_category}' data-title='{$portfolio_title}' >
                               <div class='portfolio-hover'>
                                   <div class='portfolio-hover-content'>
                                   </div>
                               </div>
                               <img class='img-fluid' src='./uploadedFiles/{$portfolio_image_large}' alt='>
                           </a>
                           <div class='portfolio-caption'>
                               <h4>{$portfolio_title}</h4>
                               <p class='text-muted'>{$portfolio_category}</p>
                           </div>
                   
                       ";
                }

                ?>
            </div>
        </div>
        </div>
    </section>

    <?php include('./components/footer.php') ?>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="js/lightbox-plus-jquery.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>