<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<header class="header">

   <section class="flex">

      <a href="home.php" class="logo"><i><b>H</b><span>alet</span></i></a>

      <nav class="navbar">
         <a href="home.php">Acceuille</a>
         <a href="about.php">à propos</a>
         <a href="orders.php">Ordres</a>
         <a href="shop.php">Boutique</a>
         <a href="contact.php">Contact</a>
         <div class="categ">
            <h2>catégorie</h2>
            <a href="category.php?category=laptop">Laptop<i class="fa-solid fa-star" style="color: #fbb741;"></i></a>
            <a href="category.php?category=camera">Camera<i class="fa-solid fa-star" style="color: #fbb741;"></i></a>
            <a href="category.php?category=mouse">Mouse<i class="fa-solid fa-star" style="color: #fbb741;"></i></a>
            <a href="category.php?category=smartphone">Smartphone<i class="fa-solid fa-star" style="color: #fbb741;"></i></a>
            <a href="category.php?category=watch">Watch<i class="fa-solid fa-star" style="color: #fbb741;"></i></a>
         <div>
      </nav>

      <div class="icons">
         <?php
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
            $total_wishlist_counts = $count_wishlist_items->rowCount();

            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();
         ?>
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="search_page.php"><i class="fas fa-search"></i></a>
         <a href="wishlist.php"><i class="fas fa-heart"></i><span>(<?= $total_wishlist_counts; ?>)</span></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_counts; ?>)</span></a>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php          
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile["name"]; ?></p>
         <a href="update_user.php" class="btn">modifier profile</a>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">enregistrer</a>
            <a href="user_login.php" class="option-btn">connecter</a>
         </div>
         <a href="components/user_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">déconnecter</a> 
         <?php
            }else{
         ?>
         <p>Connectez vous ou enregistrez vous s'il vous plait !</p>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">enregistrer</a>
            <a href="user_login.php" class="option-btn">connecter</a>
         </div>
         <?php
            }
         ?>      
         
         
      </div>

   </section>

</header>