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


                    <form method="post" name="form1" action="<?= base_url('user/save_news_info'); ?>"
                          enctype="multipart/form-data">
                        <table align="center" class="table table-condensed">

                            <tr>
                                <td>News Category ID</td>
                                <td>
                                    <?php
                                    $Category = $this->db->query("select * from kha_news_category_info");
                                    $query = $Category->result();
                                    ?>
                                    <select class="form-control" name="news_cat_id" id="select">
                                        <option>--select--</option>
                                        <?php foreach ($query as $qr) { ?>
                                            <option value="<?= $qr->news_cat_id; ?>"><?= $qr->news_cat_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>News Headline</td>
                                <td><textarea  class="form-control" id="news_headline" name="news_headline" rows="3" cols="80"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>News Details
                                    <label for="news_details"></label>
                                <td><textarea  class="form-control" id="news_details" name="news_details" rows="10" cols="80"></textarea></td>
                            </tr>
                            <tr>
                                <td>News Unique Message</td>
                                <td><label for="news_unique_msg"></label>
                                    <input type="text"  class="form-control" name="news_unique_msg" id="news_unique_msg" value=""/></td>
                            </tr>
                            <tr>
                                <td>News Top Page Status</td>
                                <td>
                                    <select  class="form-control" name="news_top_page_status" id="select">
                                        <option>--select--</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>News Image</td>
                                <td><input  class="form-control" type="file" name="filePic" id="filePic"/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input   name="submit" type="submit" class="btn btn-success btn-sm" value="Submit"/>
                                </td>
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


