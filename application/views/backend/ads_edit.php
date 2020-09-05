<div class="container-fluid">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="box-title">Update || <a class="btn btn-info" href="<?= base_url('control_panel/ads_info'); ?>">
                    <span class="fa fa-plus"></span> &nbsp; Back </a>
            </h3>
            <hr/>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8">
                    <form method="post" action="<?= base_url('control_panel/update_ads_info'); ?>"
                          enctype="multipart/form-data" class="form-horizontal">

                        <table class="table table-bordered table-responsive">
                            <tr>
                                <td><label class="control-label">Site Link</label></td>
                                <td><input class="form-control" type="text" name="site_link"
                                           placeholder="Enter Site Link" value="<?= $ads_info->site_link; ?>"/></td>
                                <input type="hidden" name="id" value="<?= $ads_info->id; ?>"/>
                            </tr>
                            <tr>
                                <td><label class="control-label">Ads Position</label></td>
                                <td><input class="form-control" type="text" name="ads_position"
                                           placeholder="Enter Site Link" value="<?= $ads_info->ads_position; ?>"/></td>

                            </tr>

                            <tr>
                                <td><label class="control-label">Image</label></td>
                                <td>
                                    <p><img src="<?= base_url('assets/frontend/np/adsimage/' . $ads_info->img_name) ?>" height="100"
                                            width="100"/></p>
                                    <input class="input-group" type="file" name="img_name"/>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <button type="submit" name="sub" class="btn btn-info">
                                        <span class="fa fa-save"></span> &nbsp; Update
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </form><!-- /.box-body -->
                </div>
            </div>

        </div>
    </div>

</div>

