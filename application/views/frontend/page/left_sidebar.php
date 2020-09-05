<div class="profile-sidebar thumbnail bg-blue-ebonyclay">

        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
            <img src="<?= base_url($this->session->userdata('u_image')); ?>" alt="." class="img-responsive">
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                <?php echo $this->session->userdata('full_name') ?>
            </div>
            <div class="profile-usertitle-job">
                <?php echo $this->session->userdata('ref_id') ?>
            </div>
        </div>

    <!-- END SIDEBAR USER TITLE -->
    <!-- SIDEBAR BUTTONS -->
    <!--                <div class="profile-userbuttons">-->
    <!--                    <a href="#"><i id="social" class="fa fa-facebook-square fa-3x social-fb"></i></a>-->
    <!--                    <a href="#"><i id="social" class="fa fa-twitter-square fa-3x social-tw"></i></a>-->
    <!--                    <a href="#"><i id="social" class="fa fa-google-plus-square fa-3x social-gp"></i></a>-->
    <!--                    <a href="#"><i id="social" class="fa fa-envelope-square fa-3x social-em"></i></a>-->
    <!--                </div>-->
    <!-- END SIDEBAR BUTTONS -->
    <!-- SIDEBAR MENU -->
    <div class="profile-usermenu">
        <ul class="nav">

            <li>
                <a href="<?= base_url('user'); ?>">
                    <i class="fa fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="<?= base_url('user/profile'); ?>">
                    <i class="fa fa-pencil-square-o"></i>
                    Profile
                </a>
            </li>


            <li>
                <a href="<?= base_url('user/earningReport'); ?>">
                    <i class="fa fa-list"></i>
                    Earning report
                </a>
            </li>
            <li>
                <a href="<?= base_url('user/userPoint'); ?>">
                    <i class="fa fa-bath"></i>
                    Point
                </a>
            </li>
            <li>
                <a href="<?= base_url('user/userBalance'); ?>">
                    <i class="fa fa-dollar"></i>
                    Balance
                </a>
            </li>

            <li>
                <a href="<?= base_url('user/memberList'); ?>">
                    <i class="fa fa-list-alt"></i>
                    Member List
                </a>
            </li>


            <li>
                <a href="<?= base_url('user/newsListByMember'); ?>">
                    <i class="fa fa-send"></i>
                    News
                </a>
            </li>
            <li>
                <a href="<?= base_url('user/messageList'); ?>">
                    <i class="fa fa-send"></i>
                    Messages
                </a>
            </li>

            <li>
                <a href="<?= base_url('user/changePassword'); ?>">
                    <i class="fa fa-key"></i>
                    Change Password
                </a>
            </li>

            <li>
                <a href="<?= base_url('user/logout'); ?>">
                    <i class="fa fa-sign-out"></i>
                    Logout
                </a>
            </li>

        </ul>
    </div>
    <!-- END MENU -->
</div>