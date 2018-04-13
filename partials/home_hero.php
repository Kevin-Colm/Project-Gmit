
<!--
/* App Name: Gig Guide.
 * @Author's:
 * Kevin Gleeson
 * Colm Woodlock
 * Version: 1.0
 * Date: 18/02/2017
 *
 */-->

<!--The jumbotron bootstrap template for our hero section-->
<div class="jumbotron">
    <a><img class="img-fluid pull-left" src="./Images/Banner.png" style='height:200px; padding-right: 10px;' alt=""/></a>
   
    <p>GigGuide is a website where you can find the best events happening around you. We aim to provide the best user, venue and band experience.</p>
   <?php if (!isset($_SESSION['username'])) { ?>
        <a class="btn btn-primary btn-lg" href=" register.php" role="button">Register Here!</a> <!-- This will link to the register page -->
   <?php } ?>
</div>
