<?php use Models\Movie as Movie; ?>

<div class="wrapper row3 gradient">
  <h2 class="page-title">API Movie List</h2>
  <main class="hoc container clear" > 
    <div class="content" > 
           <!-- ##################################### ADMIN BUTTONS ########################################################### -->
        <?php  if($_SESSION && $_SESSION["loggedUser"]=="admin@moviepass.com"){   ?>
          
          <form action="<?php echo FRONT_ROOT?>Movie/showMoviePage" method="post">
                <div class="floating-label">
                    <input type="number" name="pass" placeholder="# Page" value="<?php if($page){echo $page;} ?>" class="floating-input fl_left pageNumber" min="1" max="70" required>
                   
                </div>
                    <button type="submit" name="id" class="btn fl_left up2" value="">Show Movie Page</button> 
                    <h1 class="msg"><?php if($this->msg){ echo $this->msg;} ?></h1>
                    
          </form>

        <?php  } ?>
         <!-- ####################################### MOVIE GALLERY ######################################################### -->
      <div id="gallery">
        <figure>
          <ul class="nospace clear">
          <form action="<?php echo FRONT_ROOT?>Movie/addMultipleMovies" method="POST" >
          
              <?php $indice=0; ?>
              <?php foreach ($movieList as $movie){
                if($indice % 4 == 0){?>
                  <li class="one_quarter first anim1 slideDown">                                       <!-- PRIMERA IMAGEN DE LA FILA -->
                  <input type="checkbox" name="movies[]" value="<?php echo $movie->getTmdbID();?>">
                    <a href="<?php echo FRONT_ROOT?>Movie/showMovie/<?php echo $movie->getTmdbID()?>">
                      <img src="<?php echo $movie->getPoster()?>" alt=""> 
                    </a>         
                    <p class="p-title"><?php echo $movie->getTitle()?></p>
                    <p><i class="fa-spin fa fa-star"></i><?php echo " ".$movie->getVoteAverage()?></p>
                    <p><i class="fa fa-tags"></i><?php $str=""; if(!is_array($movie->getGenres())){
                                                                  echo $movie->getGenres()->getName();
                                                                }else{ 
                                                                  foreach($movie->getGenres() as $genre){
                                                                  $str .=" ".$genre->getName()." /";}
                                                                  echo substr_replace($str,"", -1); ?><?php
                                                                }?></p>
                    
                  </li>
                  <?php }else{ ?>
                  <li class="one_quarter anim1 slideDown">                                             <!-- LAS OTRAS TRES IMAGENES DE LA FILA -->
                    <input type="checkbox" name="movies[]" value="<?php echo $movie->getTmdbID();?>">
                    <a href="<?php echo FRONT_ROOT?>Movie/showMovie/<?php echo $movie->getTmdbID()?>">
                      <img src="<?php echo $movie->getPoster()?>" alt="">
                    </a>
                    <p class="p-title"><?php echo $movie->getTitle()?></p>
                    <p><i class="fa-spin fa fa-star"></i><?php echo " ".$movie->getVoteAverage()?></p>
                    <p><i class="fa fa-tags"></i><?php $str=""; if(!is_array($movie->getGenres())){
                                                                  echo $movie->getGenres()->getName();
                                                                }else{ 
                                                                  foreach($movie->getGenres() as $genre){
                                                                  $str .=" ".$genre->getName()." /";
                                                                  }
                                                                  echo substr_replace($str,"", -1); ?></p><?php
                                                                } ?>
              
                  </li><?php } 
                $indice++;
              }?>
              <button type="submit" name="idadd" class="btn fl_left up5" value="">Add</button> 
            </form>
          </ul>
        </figure>
      </div>
    </div>
  </main>
</div>