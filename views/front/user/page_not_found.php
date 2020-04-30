<?php ob_start() ?>

<title>account_activation</title>
<meta name="description" content="se connecter au site Nutrivalen en toutre sécurité..  ">

<?php $meta = ob_get_clean() ?>




<!-------------------------------------->


<?php ob_start() ?>

   <section class="page_not_found_section">
   <div class="page_not_found_div">
         <a href="http://localhost/phpsite/ecommerce/index.php?class=front&action=HomePage" ><button class="btn btn-primary m-auto"> back to home_page</button></a>
     </div>
   </section>


<?php $content=ob_get_clean()   ?>


<!-------------------------------------->


<?php require "views/layout.php" ?>
