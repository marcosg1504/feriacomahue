
<style>
    .panel-footer{
  background-color:#337ab7;
  border-color: #337ab7;
  color: #FFFFFF;
 }
 </style>
<footer >
    <div class="panel-footer">

 <!-- Copyright -->
 <div class="footer-copyright text-center py-3 "> © 2021 Copyright Feria Comahue
    <a style="color:#FFFFFF;" href="https://feriacomahue.com/" > Erick Calderon - Marcos Gutierrez</a>
  </div>
  <!-- Copyright -->

    </div>
 
</footer>


<div class="search-model">
<div class="h-100 d-flex align-items-center justify-content-center">
<div class="search-close-switch">+</div>
<form class="search-model-form">
<input type="text" id="search-input" placeholder="Search here.....">
</form>
</div>
</div>


<script src="<?= base_url("assets/"); ?>js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url("assets/"); ?>js/bootstrap.min.js"></script>
<script src="<?= base_url("assets/"); ?>js/jquery.nice-select.min.js"></script>
<script src="<?= base_url("assets/"); ?>js/jquery.barfiller.js"></script>
<script src="<?= base_url("assets/"); ?>js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url("assets/"); ?>js/jquery.slicknav.js"></script>
<script src="<?= base_url("assets/"); ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url("assets/"); ?>js/jquery.nicescroll.min.js"></script>
<script src="<?= base_url("assets/"); ?>js/main.js"></script>


<script>
function showSnackbar(message) {
  var x = document.getElementById("snackbar");
  x.innerHTML = message;
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}


function setCookie(cname, cvalue)
  {
    var d = new Date();
    d.setTime(d.getTime() + (1 * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function refreshCart()
  {
    var products = JSON.parse(localStorage.getItem("products"));
    if(products != null)
    {
      var spnCartMobile = document.getElementById("spnCartMobile");
      var spnCartWeb = document.getElementById("spnCartWeb");
      spnCartMobile.innerText = products.length;
      spnCartWeb.innerText = products.length;
    }    
  }

  refreshCart();
</script>

<script type="text/javascript">

    function login()
    {

        var form = $('#loginForm');
        var url = form.attr('action');

        $.ajax(
        {
            type: "POST",
            url: 'recaptcha.php',
            data: form.serialize(),
            success: function(data)
            {
                 $('#message').empty();
                $('#message').append(data);
            }
        });

    }


    grecaptcha.ready(function() {
    grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'homepage'})
    .then(function(token) {
        
        $('#google-response-token').val(token);
        //alert(token);
    });
    });


</script>



</body>
</html>
