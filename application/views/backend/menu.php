<nav>
    <ul class="nav">
        <li><a href="<?= base_url('control_panel') ?>"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
        <li><a href="<?= base_url('control_panel/members') ?>"><i class="lnr lnr-user"></i> <span>Members</span></a>
        </li>
        <li><a href="<?= base_url('control_panel/messages') ?>"><i class="lnr lnr-user"></i> <span>Messages</span></a>  </li>
<!--        <li><a href="--><?//= base_url('control_panel/messages') ?><!--"><i class="lnr lnr-user"></i> <span>Scroll News</span></a>  </li>-->
        <li>
            <a href="#point" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i>
                <span>Point</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
            <div id="point" class="collapse ">
                <ul class="nav">
                    <li><a href="<?= base_url('control_panel/managePointTypeValue') ?>" class="">Manage Point Value</a>
                    </li>
                    <li><a href="<?= base_url('control_panel/manageCompanyPoint') ?>" class="">Manage Company Point</a>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <a href="#balance" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i>
                <span>Balance</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
            <div id="balance" class="collapse ">
                <ul class="nav">
                    <li><a href="<?= base_url('control_panel/userBalanceReq') ?>" class="">User Balance Request</a></li>
                    <li><a href="<?= base_url('control_panel/userBalanceEntry') ?>" class="">User Balance Entry</a></li>
                    <li><a href="<?= base_url('control_panel/vatCommissionGetFromUser') ?>" class="">User
                            VAT/Commission</a></li>
                </ul>
            </div>
        </li>



        <!--News Menu-->
          <li class="text-center">News Section</li>
<!--        <li class="collapse ">-->
<!--            <a href="#newsman" data-toggle="collapse" class="collapsed"> <i class="fa fa-laptop"></i> <span>News Management</span>-->
<!--                <i-->
<!--                    class="fa fa-angle-left pull-right"></i> </a>-->
<!--            <div id="newsman" class="collapse ">-->
<!--                <ul class="nav">-->
<!--                    <li>-->
<!--                        <a href="--><?php ////echo base_url('backend/top_news_info'); ?><!--" target="abc"><i-->
<!--                                class="fa fa-angle-double-right"></i> Create Scroll News</a></li>-->
<!--                    <li><a href="news_category_info.php" target="abc"><i class="fa fa-angle-double-right"></i> Edit News Category</a></li> -->
<!--        <li><a href="--><?php ////echo base_url('backend/news_info'); ?><!--" target="abc"><i-->
<!--                                class="fa fa-angle-double-right"></i> Create / Edit News</a></li>-->
<!--                     <li><a href="multiple_image_upload.php" target="abc"><i class="fa fa-angle-double-right"></i> Multiple News Image</a></li> -->
<!--              </ul>-->
<!--            </div>-->
<!---->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="#GM" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i>-->
<!--                <span>Gallery Management</span> <i class="icon-submenu lnr lnr-chevron-left"></i>-->
<!--            </a>-->
<!--            <div id="GM" class="collapse ">-->
<!--                <ul class="nav">-->
<!--                    <li><a href="--><?php ////echo base_url('backend/gallery'); ?><!--" target="abc"><i-->
<!--                                class="fa fa-angle-double-right"></i>Photo Gallery</a></li>-->
<!--                    <li><a href="--><?php ////echo base_url('backend/video'); ?><!--" target="abc"><i-->
<!--                                class="fa fa-angle-double-right"></i>Video Gallery</a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </li>-->
        <li>
            <a href="#AM" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i>
                <span>Ads Management</span> <i class="icon-submenu lnr lnr-chevron-left"></i>
            </a>
            <div id="AM" class="collapse ">
                <ul class="nav">
                    <li><a href="<?php echo base_url('control_panel/ads_info'); ?>" target=""><i class="fa fa-angle-double-right"></i>Show Ads</a></li>
                </ul>
            </div>
        </li>
<!--        <li>-->
<!--            <a href="#VM" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i>-->
<!--                <span>Vote Management</span> <i class="icon-submenu lnr lnr-chevron-left"></i>-->
<!--            </a>-->
<!--            <div id="VM" class="collapse ">-->
<!--                <ul class="nav">-->
<!--                    <li><a href="--><?php //echo base_url('backend/vote_message_info'); ?><!--" target="abc"><i-->
<!--                                class="fa fa-angle-double-right"></i>Vote Question Create</a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </li>-->
<!---->
<!--        <li class="treeview"> <a href="#"> <i class="fa fa-table"></i> <span>Namaz time</span> <i class="fa fa-angle-left pull-right"></i> </a>-->
<!--          <ul class="treeview-menu">-->
<!--        <li><a href="namaz_info.php" target="abc"><i class="fa fa-angle-double-right"></i>Show Time</a></li>-->
<!--          </ul>-->
<!--        </li>-->


        <li><a href="<?= base_url('control_panel/logout') ?>"><i class="lnr lnr-file-empty"></i> <span>Logout</span></a>
        </li>
    </ul>
</nav>