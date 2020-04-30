<?php 


// # Create Payment using PayPal as payment method
        // This sample code demonstrates how you can process a 
        // PayPal Account based Payment.
        // API used: /v1/payments/payment
        
        use PayPal\Api\Amount;
        use PayPal\Api\Details;
        use PayPal\Api\Item;
        use PayPal\Api\ItemList;
        use PayPal\Api\Payer;
        use PayPal\Api\Payment;
        use PayPal\Api\RedirectUrls;
        use PayPal\Api\Transaction;
        use PayPal\Auth\OAuthTokenCredential;
        use PayPal\Rest\ApiContext;
        use PayPal\Api\PaymentExecution;



class OrdersController
{
    private $total = 0;
    private $cartContents;
    private $cart ;



    public function __construct()
    {
     

        $this->cart = new SessionCart();
        $this->cartContents =($this->cart)->get();
        
        
        foreach($this->cartContents as $id_product => $value)
        {   
            $product = Products::getProductsById($id_product);
            //$this->subTotal = ($product["priceHT"]*TVA);
            $this->total += $value['priceEach']* $value["quantity"];
        }
       
    }
    
/**********************************************/
    private function verifyQuantity()
    {
        $cart = new SessionCart();
        $cartContents = $cart->get();

        $cart_verified = true;

        foreach($cartContents as $id_product => $value)
        {
            
            $product = Products::getProductsById($id_product);
            if($product["quantity"] < $value['quantity'] )
            {
               $cart_verified = false;
               $flash =new SessionFlash();
               $flash->warning("malheureusement, il ne nous reste plus beaucoup d'article, merci de revenir demain ! ");
               header("Location: index.php?class=sessioncart&action=show");
               exit;
            }
        }
        return $cart_verified;
    } 





/* ************************************ */  
    private function add()
    {
       
        if($this->verifyQuantity())
        {
            $cart = new SessionCart();
            $cartContents = $cart->get();

            $user = new SessionUser();
            $id_client =$user->getIdClient();

            $order = new Orders();
            $order->setStatus("En cours");
            $order->setTotalPrice($this->total);
            $id_order= $order->add($id_client);

            if($id_order !=0)
            {
                foreach($cartContents as $id_product => $value)
                {
                    $orderDetail = new OrderDetails();
                    $orderDetail->setQuantityOrdered($value['quantity']);
                    $orderDetail->setIdOrder($id_order);
                    $orderDetail->setIdProduct($id_product);
                    $orderDetail->setPriceEach($value["priceEach"]);
                    

                    $orderDetail->add();

                }

                $cart->empty();
                // header("Location: index.php?class=Orders&action=historique&id=".$id_client);

            }else{

                $flash =new SessionFlash();
                $flash->warning("la commande n'a pas été enregistrée, veuillez revalider, merci ! ");
                header("Location: ".$_SERVER["HTTP_REFERER"]);
            }
        }
        
    }

 




/***************************************************/

    public function payment()
    {
        $session = new SessionUser();
        if (!$session->isLogged()) {
            header("Location: index.php?class=front&action=login_view");
        }
        $this->verifyQuantity();




        $apiContext = $this->getApiContext(PAYPAL['clientId'], PAYPAL['secret']);
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $items = [];
        foreach($this->cartContents as $id_product => $value)
        {
            $product = Products::getProductsById($id_product);
            $item = new Item();
            $item->setName($product["name"])
                ->setCurrency('EUR')
                ->setQuantity($value['quantity'])
                ->setSku($id_product) // Similar to `item_number` in Classic API
                ->setPrice($value['priceEach']);

            $items[] = $item;
        }

        $itemList = new ItemList();
        $itemList->setItems($items);
        
        $details = new Details();
        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal($this->total);

        $amount = new Amount();
        $amount->setCurrency("EUR")
            ->setTotal($this->total)
            ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(BASEURL."/index.php?class=orders&action=executePayment&success=true")
            ->setCancelUrl(BASEURL."/index.php?class=orders&action=executePayment&success=false");

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
        // For Sample Purposes Only.
        $request = clone $payment;
    
        try {
            $payment->create($apiContext);
        } catch (Exception $ex) {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $request, $ex);
            exit(1);
        }
    
        $approvalUrl = $payment->getApprovalLink();
        // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
        //ResultPrinter::printResult("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", "<a href='$approvalUrl' >$approvalUrl</a>", $request, $payment);
        header("Location: $approvalUrl");
        
        
    }




/***************************************************/

    public function executePayment()
    {
        $apiContext = $this->getApiContext(PAYPAL['clientId'], PAYPAL['secret']);

        // ### Approval Status
        // Determine if the user approved the payment or not
        if (isset($_GET['success']) && $_GET['success'] == 'true') {
            // Get the payment Object by passing paymentId
            // payment id was previously stored in session in
            // CreatePaymentUsingPayPal.php
            $paymentId = $_GET['paymentId'];
            $payment = Payment::get($paymentId, $apiContext);
            // ### Payment Execute
            // PaymentExecution object includes information necessary
            // to execute a PayPal account payment.
            // The payer_id is added to the request query parameters
            // when the user is redirected from paypal back to your site
            $execution = new PaymentExecution();
            $execution->setPayerId($_GET['PayerID']);
            // ### Optional Changes to Amount
            // If you wish to update the amount that you wish to charge the customer,
            // based on the shipping address or any other reason, you could
            // do that by passing the transaction object with just `amount` field in it.
            // Here is the example on how we changed the shipping to $1 more than before.
            $transaction = new Transaction();
            $amount = new Amount();
            $details = new Details();
            $details->setShipping(0)
                ->setTax(0)
                ->setSubtotal($this->total);
            $amount->setCurrency('EUR');
            $amount->setTotal($this->total);
            $amount->setDetails($details);
            $transaction->setAmount($amount);
            // Add the above transaction object inside our Execution object.
            $execution->addTransaction($transaction);
            try {
                // Execute the payment
                // (See bootstrap.php for more on `ApiContext`)
                $result = $payment->execute($execution, $apiContext);
                // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
                ResultPrinter::printResult("Executed Payment", "Payment", $payment->getId(), $execution, $result);
                try {
                    $payment = Payment::get($paymentId, $apiContext);
                } catch (Exception $ex) {
                    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
                    ResultPrinter::printError("Get Payment", "Payment", null, null, $ex);
                    exit(1);
                }
            } catch (Exception $ex) {
                // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
                ResultPrinter::printError("Executed Payment", "Payment", null, null, $ex);
                exit(1);
            }
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            ResultPrinter::printResult("Get Payment", "Payment", $payment->getId(), null, $payment);
            
            $is_payed = $payment->getState();
        
            if ($is_payed) {
                $this->add();
            }else{
                $f = new SessionFlash();
                $f->error("Commande non  validée");
                header("Location: index.php?class=Sessioncart&action=show");
            }
        } else {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            ResultPrinter::printResult("User Cancelled the Approval", null);
            exit;
        }    
        
    }





/*************************************************/

    private function getApiContext($clientId, $clientSecret)
    {
        // #### SDK configuration
        // Register the sdk_config.ini file in current directory
        // as the configuration source.
        /*
        if(!defined("PP_CONFIG_PATH")) {
            define("PP_CONFIG_PATH", __DIR__);
        }
        */
        // ### Api context
        // Use an ApiContext object to authenticate
        // API calls. The clientId and clientSecret for the
        // OAuthTokenCredential class can be retrieved from
        // developer.paypal.com
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                $clientId,
                $clientSecret
            )
        );
        // Comment this line out and uncomment the PP_CONFIG_PATH
        // 'define' block if you want to use static file
        // based configuration
        $apiContext->setConfig(
            array(
                'mode' => 'sandbox',
                'log.LogEnabled' => true,
                'log.FileName' => '../PayPal.log',
                'log.LogLevel' => 'DEBUG', // PLEASE USE `INFO` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
                'cache.enabled' => true,
                //'cache.FileName' => '/PaypalCache' // for determining paypal cache directory
                // 'http.CURLOPT_CONNECTTIMEOUT' => 30
                // 'http.headers.PayPal-Partner-Attribution-Id' => '123123123'
                //'log.AdapterFactory' => '\PayPal\Log\DefaultLogFactory' // Factory class implementing \PayPal\Log\PayPalLogFactory
            )
        );
        // Partner Attribution Id
        // Use this header if you are a PayPal partner. Specify a unique BN Code to receive revenue attribution.
        // To learn more or to request a BN Code, contact your Partner Manager or visit the PayPal Partner Portal
        // $apiContext->addRequestHeader('PayPal-Partner-Attribution-Id', '123123123');
        return $apiContext;
    }











}


?>