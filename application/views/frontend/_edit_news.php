<div class="container"><br>

    <div class="row profile">

        <div class="col-md-3">
            <?php include('page/left_sidebar.php') ?>
        </div>
        <div class="col-md-9">
            <h4>News Details</h4>
            <hr/>
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                    ......
                </div>
                <div class="panel-body">

                    <form method="post" name="edit_news" id="edit_news" action="<?= base_url('user/update_news_info');?>" enctype="multipart/form-data">
                        <table align="center" class="table table-condensed">
                            <tr>
                                <td>News Category ID</td>
                                <td>
                                    <?php
                                    $Category = $this->db->query("select * from kha_news_category_info");
                                    $query = $Category->result();
                                    ?>
                                    <select name="news_cat_id" id="select">
                                        <option>--select--</option>
                                        <?php foreach ($query as $qr){ ?>
                                            <option value="<?= $qr->news_cat_id;?>"><?= $qr->news_cat_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>News Headline</td>
                                <td><textarea id="news_headline" name="news_headline" rows="3" cols="80"><?php echo $news_data->news_headline;?></textarea></td>
                            </tr>
                            <tr>
                                <td>News Details
                                    <label for="news_details"></label>
                                <td><textarea id="news_details" name="news_details" rows="10" cols="80"><?php echo $news_data->news_details;?></textarea></td>
                            </tr>
                            <tr>
                                <td>News Unique Message</td>
                                <td><label for="news_unique_msg"></label>
                                    <input type="text" name="news_unique_msg" id="news_unique_msg" value="<?php echo $news_data->news_unique_msg;?>"/></td>
                            </tr>
                            <tr>
                                <td>News Top Page Status</td>
                                <td>
                                    <select name="news_top_page_status" id="select">
                                        <option>--select--</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><img src="<?= base_url('assets/frontend/np/images/news/'.$news_data->news_image);?>" alt="no image found" height="100" width="125px" /></td>
                            </tr>
                            <tr>
                                <td>News Image</td>
                                <td><input type="file" name="filePic" id="filePic" /></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="hidden" name="news_id"  class="btn btn-success btn-sm" value="<?php echo $news_data->news_id; ?>" />
                                    <input name="submit" type="submit" class="btn btn-success btn-sm" value="Update" />
                                </td>
                            </tr>
                        </table>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript">

        document.forms['edit_news'].elements['news_top_page_status'].value='<?php echo $news_data->news_top_page_status; ?>';
        document.forms['edit_news'].elements['news_cat_id'].value='<?php echo $news_data->news_cat_id; ?>';

    </script>
</div>
<br/>


