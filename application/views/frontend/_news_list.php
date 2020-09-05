<div class="container"><br>

    <div class="row profile">

        <div class="col-md-3">
            <?php include('page/left_sidebar.php') ?>
        </div>
        <div class="col-md-9">
            <h4>News</h4>
            <hr/>
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                    ......
                </div>
                <div class="panel-body">
                    <a class="btn btn-primary pull-right" href="<?= base_url('user/addNews') ?>">Add News </a>
                    <a class="btn btn-primary pull-right" href="<?= base_url('user/top_news_info') ?>">Scroll News </a>
                    <br/>
                    <br/>
                    <table class="table table-condensed">
                        <tr class="bg-info">
                            <td>SN</td>
                            <td>Image</td>
                            <td>News Headline</td>
                            <td>News Details</td>
                            <td>Top Page Status</td>
                            <td>Read</td>
                            <td>Action</td>
                        </tr>
                        <?php
                        $count = 1;
                        foreach ($news_info as $news) { ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td>
                                <img src="<?php echo base_url('assets/frontend/np/images/news/' . $news->news_image); ?>"
                                     width="40" height="40"/></td>
                            <td><?php echo mb_substr($news->news_headline, 0, 30, "UTF-8"); ?></td>
                            <td><?php echo mb_substr($news->news_details, 0, 20, "UTF-8"); ?></td>
                            <td><?php echo $news->news_top_page_status; ?></td>
                            <td><?php echo $news->news_read_count; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>user/edit_news_info/<?php echo $news->news_id; ?>">
                                    <input name="vdoEdit" type="submit" class="btn btn-info btn-sm" value="Edit"/>
                                </a>
                                <?php if ($news->news_status == 1) { ?>
                                    <a href="<?= base_url(); ?>user/inactive_news_info/<?php echo $news->news_id; ?>">
                                        Inactive
                                    </a>
                                <?php } else { ?>
                                    <a href="<?= base_url(); ?>user/active_news_info/<?php echo $news->news_id; ?>">
                                        Active
                                    </a>
                                <?php } ?>
                            </td>

                            <!--                            </tr>-->
                            <!--                            <tr>-->
                            <!--                                <td colspan="3">-->
                            <!--                                    --><?php
                            //                                    $msg = $this->session->userdata('message');
                            //                                    if ($msg) {
                            //                                        echo $msg;
                            //                                        $this->session->unset_userdata('message');
                            //                                    }
                            //                                    ?>
                            <!--                                    <input type="hidden" name="news_id" id="txtRec"-->
                            <!--                                           value="-->
                            <?php //echo $news->news_id; ?><!--"/></td>-->
                            <!--                            </tr>-->
                            <?php } ?>
                        <tr>
                            <td class="2">

                                <?php echo $this->pagination->create_links(); ?>

                            </td>
                        </tr>
                    </table>
                </div>


            </div>
        </div>
    </div>

</div>
<br/>


