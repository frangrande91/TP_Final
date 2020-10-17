<div class="wrapper row1">
  <header id="header" class="clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="<?php echo FRONT_ROOT?>Home/Index">MoviePass</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <!----------------- MENU GENERAL -----------------------> 
      <ul class="clear">         
        <li><a href="<?php echo FRONT_ROOT?>Movie/ShowAllMovies">Movies</a></li>
        <?php if($_SESSION){?>
      
      <!----------------- MENU USUARIO -----------------------> 
        <li class="active"><a class="drop" href="#"><img class="icon" src="<?php echo IMG_PATH?>/icons/profile-userlogged.png"></a>
        <?php }else{ ?>
        <li class="active"><a class="drop" href="#"><img class="icon" src="<?php echo IMG_PATH?>/icons/profile-user.png"></a>
        <?php }?>
          <ul>
          <?php if($_SESSION){   ?>
          <?php if($_SESSION["loggedUser"]=="admin@moviepass.com")  { ?>
            
            <!---Admin*/-->
            <li><a href="<?php echo FRONT_ROOT?>Cinema/ShowAddView">Add Cinema</a></li>
            <li><a href="<?php echo FRONT_ROOT?>Cinema/ShowListView">List Cinema</a></li>
            <li><a href="<?php echo FRONT_ROOT?>Client/Logout">Sign out</a></li>
           <?php }else{ ?>

            <!---User*/-->
          <li><a href="<?php echo FRONT_ROOT?>Client/ShowProfile">Profile</a></li>
          <li><a href="<?php echo FRONT_ROOT?>Client/Logout">Sign out</a></li>
          <?php }?>
          <?php } else{ ?>  
      
          <!---Guest*/-->
          <li><a href="<?php echo FRONT_ROOT?>Client/ShowLogin">Login</a></li>
          <li><a href="<?php echo FRONT_ROOT?>Client/ShowRegister">Register</a></li>
          <?php } ?>
      </ul></ul>
    </nav>
  </header>
</div>