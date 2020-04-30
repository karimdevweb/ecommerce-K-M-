<?php ob_start() ?>

<title>page d'accueil</title>
<meta name="description" content="visiter notre site K&M et rêvez...">

<?php $meta = ob_get_clean() ?>






<!-------------------------------------->


<!-------------------------------------->




<?php ob_start() ?>
<section class="mb-4">
      <div class="m-2 ">
            <form class="m-auto w-75" action="index.php?class=front&action=search_product" method="post">
            <label for="search_product">cherchez votre produit...</label>
                <div class="d-flex justify-content-center w-100 m-auto h-100">
                    <div class="searchbar">
                        <input class="search_input" id="search_product" type="text" name="search_product" placeholder="Search...">
                        <button type="submit" class=" btn p-1 search_icon" ><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
    </div>
</section>

<section class=" mt-5 container ">
  <div id="carouselExampleSlidesOnly" class=" shadow-lg carousel slide h-50" data-ride="carousel">
  <div class="carousel-inner h-100">
    <div class="carousel-item active h-100  ">
        <img src="http://localhost/phpsite/ecommerce/image/fashion8.png" class=" rounded d-block h-100 w-100" alt="fashion8">
    </div>
    <div class="carousel-item h-100 ">
      <img src="http://localhost/phpsite/ecommerce/image/fashion7.jpg" class=" rounded d-block h-100 w-100 " alt="fashion7">
    </div>
    <div class="carousel-item h-100">
      <img src="http://localhost/phpsite/ecommerce/image/fashion6.jpg" class=" rounded d-block h-100 w-100 " alt="fashion6">
    </div>
  </div>
</div>

<div class="card-deck my-5">
  <div class="card">
    <img src="http://localhost/phpsite/ecommerce/image/robe.jpg" class=" rounded card-img-top" alt="robe">
    <div class="card-body text-center">
      <h5 class="card-title">Girls styling</h5>
      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <button type="button" class="btn btn-outline-secondary">Shopping</button>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="http://localhost/phpsite/ecommerce/image/kids.jpg" class=" rounded card-img-top" alt="kids">
    <div class="card-body text-center">
      <h5 class="card-title">Kids styling</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <button type="button" class="btn btn-outline-secondary">Découvrir</button>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="http://localhost/phpsite/ecommerce/image/boy.jpg" class=" rounded card-img-top" alt="boy">
    <div class="card-body text-center">
      <h5 class="card-title">Boys styling</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <button type="button" class="btn btn-outline-secondary">Shopping</button>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
</div>


    <div class="home_image my-3">
            <img src="http://localhost/phpsite/ecommerce/image/fashion4.jpg" class=" rounded d-block w-100 h-100" alt="fashion4">
            <div class="home_absolute_div">
                <h3  class="h3">Pimentez votre look denim</h3>
                 <button type="button" class="btn btn-outline-primary">Lire la suite</button>
            </div>
            
    </div>
    
    <div class="home_image my-3">
            <img src="http://localhost/phpsite/ecommerce/image/fashion5.jpg" class=" rounded d-block w-100 h-100" alt="fashion5">
            <div class="home_absolute_div">
                <h3 class="h3">Pimentez votre look denim</h3>
                 <button type="button" class="btn btn-outline-primary">Lire la suite</button>
            </div>
    </div>

    <div class=" rounded py-5 mt-5 bg-secondary text-center ">
        <div class="card d-inline-block align-middle m-3  py-2" style="width: 18rem;">
            <img src="http://localhost/phpsite/ecommerce/image/fashion1.jpg" class="card-img-top" alt="fashion1">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <a  href=""> read the story -></a>
        </div>
        <div class="card d-inline-block align-middle m-3  py-2" style="width: 18rem;">
            <img src="http://localhost/phpsite/ecommerce/image/fashion2.jpg" class="card-img-top" alt="fashion2">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <a  href=""> read the story -></a>
        </div>
        <div class="card d-inline-block align-middle m-3 py-2"  style="width: 18rem;">
            <img src="http://localhost/phpsite/ecommerce/image/fashion3.jpeg" class="card-img-top" alt="fashion3">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <a  href=""> read the story -></a>
        </div>
        
    </div>

</section>


<section class="newsletter_hide newsletter m-auto rounded border border-primary">
                     <div class="m-5  text-danger text-right ">
                           <i class=" newsLetter_hide p-3 bg-white border border-primary rounded-circle fas fa-times"></i>
                     </div> 
        <div class="position-relative newsletter_div mx-auto  w-50 h-50 shadow-lg ">
          <div class="position-absolute bg-white  my-4 mx-5 text-center p-3 border border-danger rounded">
            <h3>Merci d'avoir choisi notre NewsLetter </h3>
                  <form class="" action="index.php?class=user&action=newsLetter" method="post">
                       <input class=" text-center font-weight-bold mx-auto form-control m-2 w-75" type="email" name="email" placeholder="votre email , merci">
                       <input type="submit" name="send" class="font-weight-bold  mt-4 btn btn-primary">
                  </form>
          </div>     
        </div>
</section>
<?php $content = ob_get_clean() ?>

<!-------------------------------------->


<!-------------------------------------->


<?php require "views/layout.php" ?>











