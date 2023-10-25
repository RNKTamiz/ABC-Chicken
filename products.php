<?php
    include ('functions/userfunctions.php'); 
    include ('includes/header.php'); 

    if(isset($_GET['category']))
    {
    $category_slug = $_GET['category'];
    $category_data = getSlugActive('categories',$category_slug);
    $category = mysqli_fetch_array($category_data);
    if(isset($category))
    {
    $cid = $category['id']; 
 ?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php">
                Home /
            </a>
            <a class="text-white" href="categories.php">
                Collection /
            </a>
            <?= $category['name']; ?>
        </h6>
    </div>

</div>
<div class="py-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">


                <h2><?= $category['name']; ?></h2>
                <hr style="height:1px;border:none;color:#333;background-color:#333;">
                <div class="row">
                    <?php
                        $products = getProdByCategory($cid);

                        if(mysqli_num_rows($products)>0)
                        {
                            foreach($products as $item)
                            {
                                ?>
                                <div class="col-md-4 mb-2">
                                    <div class="card shadow card-body h-100">
                                        
                                        <a class="text-dark" href="product-view.php?product=<?= $item['slug']; ?>">

                                            <img src="uploads/<?= $item['image']; ?>" alt="Product image" class="w-100 h-100 rounded" >
                                            <h4  class="text-center"><?= $item['name']; ?></h4>
                                        </a>
                                        
                                        <div class="text-center mt-3">
                                            <hr style="height:1px;border:none;color:#333;background-color:#333;">
                                            <p><?= $item['small_description']; ?></p>
                                        </div>

                                        <button type="button" class="align-self-end btn btn-sm btn-block btn-primary" style="margin-top: auto;">View Details</button>
                                    
                                    </div>
                                    
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
<?php
    }
    else{
        echo "Something Went Wrong";
    }
}
else{
    echo "Something Went Wrong";
}


include ('includes/footer.php'); ?>