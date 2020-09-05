<div class="container-fluid">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Company Point </h3>
        </div>
        <div class="panel-body">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#compnayPointEntry"><i
                    class="fa fa-plus"></i> Company Point Entry</a>
            <br/>
            <br/>
            <!-- /.col-lg-6 -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-responsive">
                        <thead class="bg-primary">
                        <tr>
                            <th>#</th>
                            <th>Point Value</th>
                            <th>Point Status</th>
                            <th>Create Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($point as $item) { ?>
                            <tr>
                                <td>#</td>
                                <td><?php numFormat($item->point_value)?></td>
                                <td><?php echo $item->io_status == 1 ? "<i class='fa fa-plus text-primary'></i>" : "<i class='fa fa-close text-danger'></i>"; ?></td>
                                <td><?php echo date('d - M - Y', strtotime($item->create_dt)) ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <?php echo $this->pagination->create_links() ?>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " style="vertical-align: middle" id="compnayPointEntry" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="panel panel-primary">
            <div class="panel-heading">Company Point Entry</div>
            <div class="panel-body text-justify">
                <br/>
                <form action="<?= base_url('control_panel/companyPointEntry') ?>" method="post">
                    <div class="form-group">
                        <label> Point </label>
                        <input type="text" class="form-control" name="point" required="required">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
