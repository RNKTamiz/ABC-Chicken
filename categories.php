<?php
    include ('functions/userfunctions.php'); 
    include ('includes/header.php'); 


 ?>
 
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white"> 
            <a class="text-white" href="index.php">
                Home / 
            </a>
            <a class="text-white" href="categories.php">
                Collections / 
            </a>
        </h6>
    </div>

</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <h1>Our collections</h1>
                <hr style="height:1px;border:none;color:#333;background-color:#333;">
                <div class="row">
                    <?php
                        $categories = getAllActive("categories");

                        if(mysqli_num_rows($categories)>0)
                        {
                            foreach($categories as $item)
                            {
                                ?>
                                    <div class="col-md-4 mb-3">
                                        <a href="products.php?category=<?= $item['slug']; ?>">
                                            <div class="card shadow card-body h-100">
                                                <img src="uploads/<?= $item['image']; ?>" alt="Category image" class="w-100 h-100">
                                                <h4 class="text-center"><?= $item['name']; ?></h4>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                            }
                        }
                        else{
                            echo "No data available";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include ('includes/footer.php'); ?>