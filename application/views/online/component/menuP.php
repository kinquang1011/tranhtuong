<section class="menu cid-qSpIxRy3CD" once="menu" id="menu1-0">

  
    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="mailto:nguyenkimnhu94@gmail.com">
                         <img src="<?php echo base_url();?>assets/images/mbr-182x121.jpg" alt="nhukomtranhtuong" title="Tranh Tường Như Kốm" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-5" href="https://mobirise.com">
                        Như Kốm</a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
            	<?php foreach ($menus as $menu){            	
            	if(!empty($menu['sub_menus'])){?>
            	<!--  Check submenu has exister or not -->
            	<li class="nav-item dropdown">
                    <a class="nav-link link text-white dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false"><span class="mbri-windows mbr-iconfont mbr-iconfont-btn"></span>
                        <?php echo $menu['Name'];?></a>
                        	  <!-- Sub item start --> 
                        	<div class="dropdown-menu">
                        	  <?php foreach ($menu['sub_menus'] as $sub){?>
                        		<a class="text-white dropdown-item display-4" href="<?php echo base_url()."index.php/".$sub['sub_id']?>"><?php echo $sub['sub_name']?></a>
                        		<?php }?>
                        		
                        	</div>
                        	  <!--  Sub item end -->
                </li>
                <?php }else{?>
            	<li class="nav-item">
                    <a class="nav-link link text-white display-4" href="<?php echo base_url()."index.php/".$menu['link'];?>">
                        <span class="<?php echo $menu['SpanClass'];?>"></span>
                        <?php echo $menu['Name']; ?></a>
                </li>
                <?php } }?>
                
                <!--<li class="nav-item">
                	<a class="nav-link link text-white display-4" href="https://mobirise.com" aria-expanded="false">
                		<span class="mbrib-magic-stick mbr-iconfont mbr-iconfont-btn"></span>
                        Nội Thất</a></li>
                <li class="nav-item">
                	<a class="nav-link link text-white display-4" href="https://mobirise.com" aria-expanded="false">
                		<span class="mbrib-contact-form mbr-iconfont mbr-iconfont-btn"></span>
                        Liên Hệ</a>
                 </li>
          --></ul>
            
        </div>
    </nav>
</section>