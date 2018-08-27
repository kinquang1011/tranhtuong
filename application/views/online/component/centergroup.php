<section class="mbr-section article content10 cid-qTQ3410Sis" id="content10-j">
    
     

    <div class="container">
        <div class="inner-container" style="width: 66%;">
            <h2 id="title_222" align="center"><?php echo $name?></h2>
            <hr class="line" style="width: 25%;">
            <div class="section-text align-center mbr-white mbr-fonts-style display-5">
                   <?php echo $description?>
                </div>
            <hr class="line" style="width: 25%;">
        </div>
    </div>
</section>

<section class="mbr-gallery mbr-slider-carousel cid-qSpJFq1NRt" id="gallery1-7">
         <!-- Filter --><!-- Gallery -->
         <div class="mbr-gallery-row">
            <div class="mbr-gallery-layout-default">
               <div>
                  <div>
                  	<?php for ($i = 0; $i < count($lstImg); $i++) {?>
                  	<div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Awesome">
                        <div href="#lb-gallery1-7" data-slide-to="<?php echo $i;?>" data-toggle="modal"><img src="<?php echo base_url() ."/uploads/files/". $lstImg[$i]['url_img']?>" alt="" title="" height="260px" and width="195px"><span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7 "> Click here <span class ="mbri-cursor-click mbr-iconfont mbr-iconfont-btn"></span></span></div>
                     </div>	
                  	<?php }?>
                     <!--
                     <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Responsive">
                        <div href="#lb-gallery1-7" data-slide-to="1" data-toggle="modal"><img src="<?php echo base_url();?>/assets/images/gallery01.jpg" alt="" title=""><span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7">Type caption here</span></div>
                     </div>
                     <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Creative">
                        <div href="#lb-gallery1-7" data-slide-to="2" data-toggle="modal"><img src="<?php echo base_url();?>/assets/images/gallery02.jpg" alt="" title=""><span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7">Type caption here</span></div>
                     </div>
                     <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Animated">
                        <div href="#lb-gallery1-7" data-slide-to="3" data-toggle="modal"><img src="<?php echo base_url();?>/assets/images/gallery03.jpg" alt="" title=""><span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7">Type caption here</span></div>
                     </div>
                     <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Awesome">
                        <div href="#lb-gallery1-7" data-slide-to="4" data-toggle="modal"><img src="<?php echo base_url();?>/assets/images/gallery04.jpg" alt="" title=""><span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7">Type caption here</span></div>
                     </div>
                     <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Awesome">
                        <div href="#lb-gallery1-7" data-slide-to="5" data-toggle="modal"><img src="<?php echo base_url();?>/assets/images/gallery05.jpg" alt="" title=""><span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7">Type caption here</span></div>
                     </div>
                     <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Responsive">
                        <div href="#lb-gallery1-7" data-slide-to="6" data-toggle="modal"><img src="<?php echo base_url();?>/assets/images/gallery06.jpg" alt="" title=""><span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7">Type caption here</span></div>
                     </div>
                     <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Animated">
                        <div href="#lb-gallery1-7" data-slide-to="7" data-toggle="modal"><img src="<?php echo base_url();?>/assets/images/gallery07.jpg" alt="" title=""><span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7">Type caption here</span></div>
                     </div>
                  --></div>
               </div>
               <div class="clearfix"></div>
            </div>
         </div>
         <!-- Lightbox -->
         <div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1" data-keyboard="true" data-interval="false" id="lb-gallery1-7">
            <div class="modal-dialog"">
               <div class="modal-content">
                  <div class="modal-body">
                     <div class="carousel-inner">
                        <?php for ($j = 0; $j < count($lstImg); $j++) {?>
                        <div class="carousel-item <?php if ($j==0){?> active <?php }?>"><img src="<?php echo base_url()."/uploads/files/".$lstImg[$j]['url_img']?>" alt="" title=""></div>
                        <?php }?>
                        <!--  
                        <div class="carousel-item"><img src="<?php echo base_url();?>/assets/images/gallery01.jpg" alt="" title=""></div>
                        <div class="carousel-item"><img src="<?php echo base_url();?>/assets/images/gallery02.jpg" alt="" title=""></div>
                        <div class="carousel-item"><img src="<?php echo base_url();?>/assets/images/gallery03.jpg" alt="" title=""></div>
                        <div class="carousel-item"><img src="<?php echo base_url();?>/assets/images/gallery04.jpg" alt="" title=""></div>
                        <div class="carousel-item"><img src="<?php echo base_url();?>/assets/images/gallery05.jpg" alt="" title=""></div>
                        <div class="carousel-item"><img src="<?php echo base_url();?>/assets/images/gallery06.jpg" alt="" title=""></div>
                        <div class="carousel-item"><img src="<?php echo base_url();?>/assets/images/gallery07.jpg" alt="" title=""></div>
                        -->
                     </div>
                     <a class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#lb-gallery1-7"><span class="mbri-left mbr-iconfont" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control carousel-control-next" role="button" data-slide="next" href="#lb-gallery1-7"><span class="mbri-right mbr-iconfont" aria-hidden="true"></span><span class="sr-only">Next</span></a><a class="close" href="#" role="button" data-dismiss="modal"><span class="sr-only">Close</span></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>