<?php ob_start() ?>

<title>tableau de bord</title>
<meta name="description" content="prenez la décision qu'il faut...  ">

<?php $meta = ob_get_clean() ?>



<!-------------------------------------->


<!-------------------------------------->





<?php ob_start() ?>
<section class="admin_dashboard_section p-5 h-100 w-100">
    <section class="my-2 p-4  border rounded border-primary text-center shadow container">
        <div class="bg-light p-2 w-50 border border-danger rounded m-auto shadow">
            <h1 class="">bienvenue <?php echo ucfirst( $_SESSION["user"]["lastName"])  ?>,</h1>
            <p class="font-weight-bold">que voulez-vous faire aujourd'hui ?</p>
        </div>
            
        <div class="d-flex flex-row justify-content-between p-3 rounded">
                <div class="dashboard p-3 m-2 shadow bg-light border border-danger rounded w-25">
                    <h3>voir les categories</h3>
                    <a href="index.php?class=category&action=list"><button class="btn btn-primary rounded">cliquez ici</button></a>
                </div>
                <div class="dashboard  p-3 m-2 shadow  bg-light border border-danger rounded w-25">
                    <h3>voir les produits</h3>
                    <a href="index.php?class=products&action=list"><button class=" btn btn-primary rounded">cliquez ici</button></a>
                </div>
                <div class="dashboard p-3 m-2 shadow bg-light border border-danger rounded w-25">
                    <h3>voir la liste des clients</h3>
                    <a href="index.php?class=user&action=AllUsers"><button class="btn btn-primary rounded">cliquez ici</button></a>
                </div>
        </div>
            


    </section>
</section>


<?php $content = ob_get_clean() ?>


<!-------------------------------------->


<!-------------------------------------->


<?php require "views/layout.php" ?>