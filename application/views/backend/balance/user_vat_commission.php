<div class="container-fluid">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Vat and Commission From Users</h3>

        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-responsive">
                        <thead class="bg-primary">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0;
                        foreach ($userVatComm as $item) { ?>

                                <tr>
                                    <td><?php echo $i; ?></td>

                                    <td><?php echo $item->full_name ?></td>
                                    <td><?php echo $item->reference_id ?></td>
                                    <td><?php
                                        if ($item->balance_type == Company_Vat) {
                                            echo "<i class='text-primary'>VAT</i>";
                                        } else {
                                            echo "<i class='text-success'>Commission</i>";
                                        } ?>
                                    </td>
                                    <td><?php echo $item->amount ?></td>
                                    <td><?php echo $item->create_dt ?></td>

                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 pull-right">
                    <?php if ($this->pagination->create_links()) echo $this->pagination->create_links(); ?>
                </div>
            </div>

        </div>
    </div>
</div>

