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
                    <a class="btn btn-primary pull-right" href="<?= base_url('user/newsListByMember') ?>">  News List</a>
                    <a class="btn btn-primary pull-right" href="<?= base_url('user/add_top_news') ?>">Add Scroll News </a>
                    <br/>
                    <br/>
                    <table class="table table-condensed">
                        <tr class="bg-info">
                            <td>Top News ID</td>
                            <td>Scroll News Details</td>
                            <td>Action</td>
                        </tr>
                        <?php foreach($top_news_info as $top_news){ ?>
                            <tr>
                                <td><?php echo $top_news->top_news_id; ?></td>
                                <td><?php echo $top_news->top_news; ?></td>
                                <td>
                                    <a href="<?= base_url();?>user/edit_top_news/<?php echo $top_news->top_news_id; ?>">
                                        <input name="btnEdit" type="submit" class="btn btn-info btn-sm" id="btnEdit" value="Edit"/>
                                    </a>

                                    <a href="<?= base_url();?>user/delete_top_news/<?php echo $top_news->top_news_id; ?>">
                                        <input name="btnDelete" type="submit" class="btn btn-danger btn-sm" id="btnDelete" value="Delete" onclick="return(confirm('Are You Sure?'));" />
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td class="3">

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


