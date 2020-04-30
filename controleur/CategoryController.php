<?php 


class CategoryController
{
     public function add()
        {
            $session = new SessionUser();
            if($session->isLogged() && $session->isAdmin())
            {
                  //  insertion de la categorie
                if(isset($_POST["add"]))
                {
                    if(!empty($_POST["name"]) && !empty($_POST["description"]) && !empty($_POST["type"]))
                    {
                        
                      $name = htmlentities($_POST["name"]);
                      $description = htmlentities($_POST["description"]);
                      $type =htmlentities($_POST["type"]);

                        $category =new Category();
                        $category->setName($name);
                        $category->setDescription($description);
                        $category->setType($type);
                       
                        $category->add();

                        $flash =new SessionFlash();
                        $flash->success("l'ajout a bien été effectué,merci");

                      header("Location: index.php?class=category&action=list");
                    }else{
                          $flash =new SessionFlash();
                          $flash->error("n'oubliez pas de remplir tout les champs , veuillez réessayer");

                        }
                    
                } 
                
                // faire l'appel à la vue 
            require "views/admin/category/ajout_categorie_view.php";

            }else
            {
                $flash =new SessionFlash();
                $flash->warning("vous n'avez pas le droit d'être sur cette page sans vous être auparavant identifier ! ");
                header("Location: index.php?class=user&action=register");
            }
            


           
        }


/*********************************************/

        public function edit_view()
        {
             $session = new SessionUser();
            if($session->isLogged() && $session->isAdmin())
            {
                // récupérer la liste de toutes les catégories
                $id = $_GET["id"];
                $cat = Category::getCategoryById($id);

          
                require "views/admin/category/modif_categorie_view.php";
            }else
              {
                  $flash =new SessionFlash();
                  $flash->warning("vous n'avez pas le droit d'être sur cette page sans vous être auparavant identifier ! ");
                  header("Location: index.php?class=user&action=register");
              }

          }







/*********************************************/

    
    public function edit()
        {
             $session = new SessionUser();
            if($session->isLogged() && $session->isAdmin())
            {
                  $id =htmlentities($_GET["id"]);
                  // faire mes test de récupération et insertion du produit
                  if(isset($_POST["edit"]))
                  {
                      if(!empty($_POST["name"]) && !empty($_POST["description"]) && !empty($_POST["type"]))
                        {
                        
                          $name = htmlentities($_POST["name"]);
                          $description = htmlentities($_POST["description"]);
                          $type =htmlentities($_POST["type"]);
                          
                          $category =new Category();
                          $category->setName($name);
                          $category->setDescription($description);
                          $category->setType($type);
              
                          $category->edit($id);
                          

                          $flash =new SessionFlash();
                          $flash->success("la modification a bien été effectuée,merci");
                          header("Location: ".$_SERVER["HTTP_REFERER"]);

                          }else
                            {
                              $flash =new SessionFlash();
                              $flash->error("n'oubliez pas de remplir tout les champs , veuillez réessayer");
                            }
                      }
            }else
            {
                $flash =new SessionFlash();
                $flash->warning("vous n'avez pas le droit d'être sur cette page sans vous être auparavant identifier ! ");
                header("Location: index.php?class=user&action=register");
            }
             

        }
/*******************************************/
      
    public function list()
    {
        $session = new SessionUser();
        if($session->isLogged() && $session->isAdmin())
        {
          if(isset($_POST["search_category"]))
          {

                if(!empty($_POST["search_category"]))
                    {
                        $totalPages="";
                        $category= htmlentities($_POST["search_category"]);
                        $categories = Category::getByName($category);
                        
                    }else
                    {
                        $flash =new SessionFlash();
                        $flash->error("veuillez entrer un mot ou phrase à chercher , merci! ");
                        header("Location: index.php?class=category&action=list");
                    }
                }else
                {
                    if(isset($_GET["page"])  && $_GET["page"] > 0 )
                    {
                      if(!empty($_GET["page"]))
                      {
                          $page=htmlentities($_GET["page"]);
                          $page=intval($page);
                          $thisPage=$page;
                      }else{
                          $thisPage=1;
                          $flash =new SessionFlash();
                          $flash->error("désolé mais la page que vous cherchez n'existe pas , merci! ");
                      }
                    }else{
                        $thisPage=1;
                    }
                    $categoryPerPage= 5;
                    $currentPage = ($thisPage -1)* $categoryPerPage;
                     // récupérer la liste de toutes les catégories
                     $categories = Category::getAllAdmin($categoryPerPage,$currentPage);
                    $categoryNumber= Category::categoryNumber();
                    $totalPages =ceil($categoryNumber[0][0] / $categoryPerPage);
                     
                }
         
              require "views/admin/category/liste_categorie_view.php";

        }else
        {
            $flash =new SessionFlash();
            $flash->warning("vous n'avez pas le droit d'être sur cette page sans vous être auparavant identifier ! ");
            header("Location: index.php?class=user&action=register");
        }
        
    } 

/*******************************************/
   
    public function delete()
    {
      $session =new SessionUser();
      if($session->isLogged() && $session->isAdmin() )
      {
            // supprimer une catégorie
            $id =htmlentities($_GET["id"]);
            $cat = Category::delete($id);
            

            $flash =new SessionFlash();
            $flash->success("la supprission a bien été effectuée");

          header("Location: ".$_SERVER["HTTP_REFERER"]);
          
      }else
      {
          $flash =new SessionFlash();
          $flash->warning("vous n'avez pas le droit d'être sur cette page sans vous être auparavant identifier ! ");
          header("Location: index.php?class=user&action=register");
      }
      
      


    }
  




}




?>