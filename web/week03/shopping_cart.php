<?php
session_start();

$items = array("Death Stranding", "Jedi Fallen Order", "Modern Warfare", "Medievil");
$amounts = array("49.99", "59.99", "69.99","29.99");

function _addImage($name){
    switch($name){
    case "Death Stranding":
        echo "<img class='game img-responsive' src='death_stranding.jpg' alt='deathStranding' width='120' height='auto'>";
        break;
    case "Jedi Fallen Order":
        echo "<img class='game img-responsive' src='Jedi_Fallen_Order.jpg' alt='jediFallenOrder' width='120' height='auto'>";
        break;
    case "Modern Warfare":
        echo "<img class='game img-responsive' src='Modern_Warfare.jpg' alt='modernWarfare' width='120' height='auto'>";
        break;
    case "Medievil":
        echo "<img class='game img-responsive' src='medievil.jpg' alt='medievil' width='120' height='auto'>";
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <script src="https://use.fontawesome.com/c560c025cf.js"></script>
    <div class="container">
       <div class="card shopping-cart">
                <div class="card-header bg-dark text-light">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Shopping cart
                    <a href="" class="btn btn-outline-info btn-sm pull-right">Continue shopping</a>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body">
                        <!-- PRODUCT -->
<?php
    foreach($_SESSION["cart"] as $i){
?>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-2 text-center">
                                    <?php _addImage($items[$_SESSION["cart"][$i]]); ?>
                                    <!--<img class="img-responsive" src="http://placehold.it/120x80" alt="prewiew" width="120" height="80">-->
                            </div>
                            <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                                <h4 class="product-name"><strong><?php echo($items[$_SESSION["cart"][$i]]); ?></strong></h4>
                            </div>
                            <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                                <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                    <h6><strong><?php echo($_SESSION["amounts"][$i]); ?><span class="text-muted"> x </span></strong></h6>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <div class="quantity">
                                        <input type="button" value="+" class="plus">
                                        <input type="number" step="1" max="99" min="1" value="1" title="Qty" class="qty"
                                               size="4">
                                        <input type="button" value="-" class="minus">
                                    </div>
                                </div>
                                <div class="col-2 col-sm-2 col-md-2 text-right">
                                    <button type="button" class="btn btn-outline-danger btn-xs">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr>
<?php
    $total = $total + $_SESSION["amounts"][$i];
    }
    $_SESSION["total"] = $total;
?>
                        <!-- END PRODUCT -->
                    <div class="pull-right">
                        <a href="" class="btn btn-outline-secondary pull-right">
                            Update shopping cart
                        </a>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="cupone code">
                            </div>
                            <div class="col-6">
                                <input type="submit" class="btn btn-default" value="Use cupone">
                            </div>
                        </div>
                    </div>
                    <div class="pull-right" style="margin: 10px">
                        <a href="browseItems.php" class="btn btn-success pull-right" style="margin-right: 10px;">Continue Shopping</a>
                        <a href="checkout.php" class="btn btn-success pull-right">Checkout</a>
                        <div class="pull-right" style="margin: 5px">
                            Total price: <b><?php echo($total); ?></b>
                        </div>
                    </div>
                </div>
            </div>
    </div>   
</body>
</html>