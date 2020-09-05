<div class="container-fluid">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Manage Point Value </h3>

        </div>
        <div class="panel-body">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addPoint"><i class="fa fa-plus"></i>
                Add Point Value</a>
            <br/>
            <br/>
            <!-- /.col-lg-6 -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-responsive">
                        <thead class="bg-primary">
                        <tr>
                            <th>#</th>
                            <th>Point Type Name</th>
                            <th>Point Value</th>
                            <th>Point Category</th>
                            <th>Active</th>
                            <th>Create Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($point as $item) { ?>
                            <tr>
                                <td>#</td>
                                <td><?php echo strtoupper($item->point_type_name) ?></td>
                                <td><?php echo $item->point_value ?></td>
                                <td><?php echo $item->point_add_deduct == 1 ? "<i class='fa fa-plus text-primary'> Add</i>" : "<i class='fa fa-close text-danger'> Deduct</i>"; ?></td>
                                <td><?php echo $item->active == 1 ? "<i class='text-primary'>Active</i>" : "<i class='text-danger'>InActive</i>" ?></td>
                                <td><?php echo date('d - M - Y', strtotime($item->create_dt)) ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade " style="vertical-align: middle" id="addPoint" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="panel panel-primary">
            <div class="panel-heading">Add Point Value</div>
            <div class="panel-body text-justify">
                <br/>
                <form action="<?= base_url('control_panel/addPointValue') ?>" method="post">

                    <div class="form-group" id="point_type_id">
                        <select class="form-control" required="required" name="point_type_id">
                            <option value="">-- Select Point Type --</option>
                            <?php getAllIncomingPointType() ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label> Set Point Value</label>
                        <input type="text" class="form-control" name="point_value" required="required">
                    </div>
                    <div class="form-group">
                        <label> Active </label><br/>
                        <input type="radio" checked name="active" value="1"> Yes &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="active" value="0"> No
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Add">
                    </div>
                </form>
                <script>

                </script>
            </div>
        </div>
    </div>
</div>