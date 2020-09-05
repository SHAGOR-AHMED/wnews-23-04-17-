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
<a class="btn btn-primary" href="<?php echo base_url('user/top_news_info')?>">Scroll News</a>
                    <br/>
                    <form method="post" name="form1" action="<?= base_url('user/save_top_news');?>"  >
                        <table width="973" align="center" class="table table-condensed">
                            <tr>
                                <td>&nbsp;</td>
                                <td colspan="2">Scroll News Details
                                    <label for="top_news"></label>
                                    <textarea id="top_news" name="top_news" rows="3" cols="80"></textarea></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><input name="btnAdd" type="submit" class="btn btn-success btn-sm" id="btnAdd" value="Add Top News" /></td>
                            </tr>
                        </table>
                    </form>

                </div>

                <!--                    <div class="row">-->
                <!--                        <div class="col-md-6 pull-right">-->
                <!--                            --><?php ////echo $this->pagination->create_links(); ?>
                <!--                        </div>-->
                <!--                    </div>-->
            </div>
        </div>
    </div>

</div>
<br/>


