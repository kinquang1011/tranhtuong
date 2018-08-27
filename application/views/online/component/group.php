<section class="mbr-gallery mbr-slider-carousel cid-qSpJFq1NRt" id="gallery1-7">
<div class="container">
   <div>
   
   <?php foreach ($groups as $group){?>
      <h5 class="section-title section-title-bold"><a class="section-title-main" href="<?php echo base_url()."index.php/danhmuc/".$group['link']?>"> <?php  echo $group['name']?></a><b></b></h5>
      <div class="mbr-gallery-row">
         <div class="mbr-gallery-layout-default">
            <div>
               <div>
                    <!--  1 Group Start--> 
                  <?php foreach ($group['catalogy'] as $img) {?>
                  	<div class="mbr-gallery-item mbr-gallery-item--p1"
                     data-tags="Awesome">
                     <a href="<?php echo base_url()."index.php/danhmuc/".$group['link']?>" >
	                     <div class ="border border-white" >
	                        <img src="<?php echo base_url()."/uploads/files/". $img['url_img'];?>" alt="" title="" height="260px" and width="195px">
	                          <!--  <span class="mbr-gallery-title mbr-fonts-style display-7"></span>-->
	                     </div>
                     </a>
                  </div>
                  <?php }?>
                    <!--  1 Group End--> 
                  
               </div>
            </div>
            <div class="clearfix"></div>
         </div>
      </div>
      <?php }?>
         <!--  End 1 row image-->  
   </div>
</div>
</section> 