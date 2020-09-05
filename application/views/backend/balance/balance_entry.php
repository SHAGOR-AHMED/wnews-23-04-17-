<div class="container-fluid">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">User Balance Entry </h3>

        </div>
        <div class="panel-body">

            <!-- /.col-lg-6 -->
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group">
                        <input type="text" class="form-control" id="search"
                               placeholder="Enter your member ID for search..">
                        <span class="input-group-btn">
        <button class="btn btn-primary" id="btnSearch" type="button"><i class="fa fa-search"></i> Search...</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center" id="display">


                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#btnSearch').click(function () {
        var key = document.getElementById('search');
        $.get("<?php echo base_url()?>control_panel/searchUserByRef/" + key.value, function (data, response) {

            $('#display').html(data);
        });
    });
    $('#search').keypress(function () {
        if (event.keyCode == 13) {
            var key = document.getElementById('search');
            $.get("<?php echo base_url()?>control_panel/searchUserByRef/" + key.value, function (data, response) {

                $('#display').html(data);
            });
        }
    });
</script>
