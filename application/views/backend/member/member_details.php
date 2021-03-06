<div class="container-fluid">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"> Member Details</h3>
            <hr/>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <?php if(!empty($user_info)){ ?>
                    <img src="<?= base_url($user_info->u_image) ?>" id="images" width="150"
                         height="150"
                         class="img-thumbnail">
                    <br/>
                    <br/>

                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-responsive">

                                <tr>
                                    <td class="text-primary">Reference ID</td>
                                    <td><?php echo $user_info->reference_id ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary">Full Name</td>
                                    <td><?php echo $user_info->full_name ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary">Father's Name</td>
                                    <td> <?php echo $user_info->father_name ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary">Mother's Name</td>
                                    <td> <?php echo $user_info->mother_name ?></td>
                                </tr>

                                <tr>
                                    <td class="text-primary">Country</td>
                                    <td><?php echo $user_info->con_name ?></td>
                                </tr>

                                <tr>
                                    <td class="text-primary">District</td>
                                    <td><?php echo $user_info->st_name ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary">City</td>
                                    <td><?php echo $user_info->city ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary">Thana</td>
                                    <td><?php echo $user_info->thana ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary">Union</td>
                                    <td><?php echo $user_info->u_union ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary">Village</td>
                                    <td><?php echo $user_info->village ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary">Post Code</td>
                                    <td><?php echo $user_info->post_code ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary">Present Address</td>
                                    <td><?php echo $user_info->address ?></td>
                                </tr>

                                <tr>
                                    <td class="text-primary">Bank Name</td>
                                    <td><?php echo $user_info->bank_name ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary">Account NO</td>
                                    <td><?php echo $user_info->account_no ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary">Joining Date</td>
                                    <td><?php echo $user_info->user_create_date ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-responsive">
                                <tr>
                                    <td class="text-primary">Email</td>
                                    <td> <?php echo $user_info->email ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary">Mobile No</td>
                                    <td> <?php echo $user_info->mobile ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary">Reference By ID</td>
                                    <td> <?php echo $user_info->parent_user_ref_id ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary">Date of Birth</td>
                                    <td> <?php echo $user_info->dob ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary">National ID</td>
                                    <td> <?php echo $user_info->nid ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary">Religion</td>
                                    <td> <?php generateReligionView($user_info->religion) ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary">Blood Group</td>
                                    <td> <?php generateBloodGroup($user_info->blood_group) ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary">Sex</td>
                                    <td><?php generateSex($user_info->sex) ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary">Nominee Name</td>
                                    <td><?php echo $user_info->nominee_name ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary">Nominee Relation</td>
                                    <td><?php echo $user_info->nominee_relation ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary">Nominee DOB</td>
                                    <td><?php echo $user_info->nominee_dob ?></td>
                                </tr>
                            </table>
                        </div>

                    </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>

</div>