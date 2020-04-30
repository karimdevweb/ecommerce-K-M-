"use strict";

/***************************one product description*********************/

$(document).ready(function()
{
    let $position = $("#description").offset();
    let $top = $position.top;
    let $sectionposition = $("#oneproduct_section").offset();
    let $sectionTop = $sectionposition.top;
    let $sectionHeight = $("#oneproduct_section").height();
    console.log($sectionHeight)
    $(window).scroll(function()
    {
        if($sectionHeight > 550 )
        {
            if(window.scrollY > $top + 35 && window.scrollY < $sectionTop + $sectionHeight -410)
            {
                $(".description_div").addClass("scroll")
            }else{
                    $(".description_div").removeClass("scroll")
            }
        }
        
    })
})


/*******************cart quantity ***********************************/

// $(document).ready(function()
// {
//     $(".quantity").change(function(e)
//     {    e.preventDefault();

//         let $quantity=  $(this).val();
//         console.log($quantity);
        
//                     // ou index.php?class=sessioncart&action=show
//         let $url = "controleur/SessioncartController.php"; 
//         $.ajax({
//             url:  $url,
//             method: "POST",
//             dataType:"html",
//             data: "quantity="+ $quantity,
//             success:function(response){ 
//                 //$(".quantity").val(response);
//             }
//         })
//     })

// })





/****************************** reCAPTCHA *********************************/ 

grecaptcha.ready(function() {
    grecaptcha.execute('6LeDe-EUAAAAAEH8ifvUHV0T6pPoOxiGXyWuXdFJ', {action: 'login'}).then(function(token) {
    $(".g-recaptcha").val(token)
    });
});

 {/* secret key:6LeDe-EUAAAAAOc1WS4LZYBd3ruKxaVn-AzGcKfC */}



/****************************** pagination *********************************/ 

$(document).ready(function()
{
    
    $(".paginationbtn").on("click",function(e)
    {
      
            $(this).addClass("btn-danger");
            $(this).siblings().removeClass("btn-danger");
            $(this).siblings().addClass("btn-primary");
        
     
            
    })

})


/****************************** newsletter *********************************/ 

$(document).ready(function()
{
    $("#newsletter").on("click",function(e)
    { e.preventDefault();
        $(".newsletter").removeClass("newsletter_hide");
    })
    $(".newsLetter_hide").on("click",function(e)
    {e.preventDefault();
        $(".newsletter").addClass("newsletter_hide");
    })
})