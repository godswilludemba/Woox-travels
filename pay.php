<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>

<?php
//private route 
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: http://localhost/wooxtravel/index.php');
    exit;
}


?>

    <div class="container">  
                    <!-- Replace "test" with your own sandbox Business account app client ID -->
                    <script src="https://www.paypal.com/sdk/js?client-id=AVksX9C9CcZrbYd8B_TrA0yZmlOToMqLYkS7xT5L7uclG35Gs2L4_jaPe7y3ddWfnCC_OWiTHfIUjNHu&currency=USD"></script>
                    <!-- Set up a container element for the button -->
                    <div style="margin:204px"; id="paypal-button-container"></div>
                    <script>
                        paypal.Buttons({
                        // Sets up the transaction when a payment button is clicked
                        createOrder: (data, actions) => {
                            return actions.order.create({
                            purchase_units: [{
                                amount: {
                                value: "<?php echo $_SESSION['payment']; ?>" // Can also reference a variable or function
                                }
                            }]
                            });
                        },
                        // Finalize the transaction after payer approval
                        onApprove: (data, actions) => {
                            return actions.order.capture().then(function(orderData) {
                          
                             window.location.href='index.php';
                            });
                        }
                        }).render('#paypal-button-container');
                    </script>
                  
                </div>
            </div>
        </div>


        <?php require "includes/footer.php"; ?>