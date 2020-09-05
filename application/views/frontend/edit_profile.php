<div class="container"><br>
    <style>
        .error {
            color: red;
        }
    </style>
    <div class="row profile">

        <div class="col-md-3">
            <?php include('page/left_sidebar.php') ?>
        </div>

        <div class="col-md-9">
            <h4> Edit Profile</h4>
            <hr/>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    ...
                </div>
                <div class="panel-body">
                    <?php if (validation_errors()) {
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            echo validation_errors();
                            ?>
                        </div>
                    <?php } ?>
                    <?php

                    $img_msg = $this->session->userdata('img_msg');
                    if (isset($img_msg)) {
                        echo '<div class="alert alert-danger">' . $img_msg . "</div>";
                        $this->session->unset_userdata('img_msg');
                    }

                    ?>
                    <br/>
                    <form id="userReg" class="register-form" action="<?= base_url('user/updateProfile'); ?>"
                          enctype="multipart/form-data"
                          method="post">
                        <div class="col-md-12">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Full name</label>
                                    <input class="form-control placeholder-no-fix" type="text"
                                           placeholder="Full Name"
                                           name="full_name" autofocus="autofocus"
                                           value="<?php echo $user_info->full_name ?>"
                                           style="background: #fff;"/>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control placeholder-no-fix" type="email"
                                           placeholder="Email"
                                           name="email" value="<?php echo $user_info->email ?>"
                                           style="background: #fff;"/>
                                </div>

                                <div class="form-group">
                                    <label>Date of birth</label>
                                    <input class="form-control placeholder-no-fix" type="text"
                                           placeholder="Date Of Birth" id="dob"
                                           name="dob" value="<?php echo $user_info->dob ?>"
                                           style="background: #fff;"/>
                                </div>


                                <div class="form-group">
                                    <label>Father's Name</label>
                                    <input class="form-control placeholder-no-fix" type="text"
                                           placeholder="Father/Husband's Name"
                                           name="father_name" value="<?php echo $user_info->father_name ?>"
                                           style="background: #fff;"/>
                                </div>

                                <div class="form-group">
                                    <label>Mother's Name</label>
                                    <input class="form-control placeholder-no-fix" type="text"
                                           placeholder="Mother Name"
                                           name="mother_name" value="<?php echo $user_info->mother_name ?>"
                                           style="background: #fff;"/>
                                </div>

                                <div class="form-group">
                                    <label>Religion</label>
                                    <select class="form-control" name="religion">
                                        <option value=""> -- Select Religion --</option>
                                        <option value="1">Islam</option>
                                        <option value="2">Hindu</option>
                                        <option value="3">Christian</option>
                                        <option value="4">Buddho</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Blood Group</label>
                                    <select name="blood_group" class="form-control">
                                        <option value="">-- Select Blood Group --</option>
                                        <option value="1">A+</option>
                                        <option value="2">B+</option>
                                        <option value="3">O+</option>
                                        <option value="4">AB+</option>
                                        <option value="5">A-</option>
                                        <option value="6">B-</option>
                                        <option value="7">O-</option>
                                        <option value="8">AB-</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Sex</label>
                                    <select name="sex" class="form-control">
                                        <option value="">-- Select Sex --</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Country</label>
                                    <select name="country" id="country" class="form-control">
                                        <option value="">-- Select Country --</option>
                                        <?php getAllCountryList(); ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>District</label>
                                    <select name="district" class="form-control" id="district">

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input class="form-control placeholder-no-fix" type="text"
                                           placeholder="City"
                                           name="city" value="<?php echo $user_info->city ?>"
                                           style="background: #fff;"/>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Thana</label>
                                    <input class="form-control placeholder-no-fix" type="text"
                                           placeholder="Thana"
                                           name="thana" value="<?php echo $user_info->thana ?>"
                                           style="background: #fff;"/>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Union</label>
                                    <input class="form-control placeholder-no-fix" type="text"
                                           placeholder="Union"
                                           name="u_union" value="<?php echo $user_info->u_union ?>"
                                           style="background: #fff;"/>
                                </div>


                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Village</label>
                                    <input class="form-control placeholder-no-fix" type="text"
                                           placeholder="Village"
                                           name="village" value="<?php echo $user_info->village ?>"
                                           style="background: #fff;"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Post Code</label>
                                    <input class="form-control placeholder-no-fix" type="number"
                                           placeholder="Post Code"
                                           name="post_code" value="<?php echo $user_info->post_code ?>"
                                           style="background: #fff;"/>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Phone Number</label>
                                    <div class="input-group">
                                        <div class="input-group-addon" id="phoneCode">
                                            +<?php echo $user_info->phonecode ?></div>
                                        <input class="form-control placeholder-no-fix"
                                               type="number"
                                               maxlength="15"
                                               placeholder="Mobile Number" id="mobile" name="mobile"
                                               value="<?php echo $user_info->mobile ?>"
                                               style="background: #fff;"/>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Present Address</label>
                                    <textarea class="form-control placeholder-no-fix"
                                              placeholder="Present Address"
                                              name="address"
                                              cols="5" rows="3" style="background: #fff;">
                                                <?php echo $user_info->address ?>
                                            </textarea>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">National ID</label>
                                    <input class="form-control placeholder-no-fix" type="number"
                                           placeholder="Nation ID Number" name="nid"
                                           value="<?php echo $user_info->nid ?>"
                                           style="background: #fff;"/>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Nominee Name</label>
                                    <input class="form-control placeholder-no-fix" type="text"
                                           placeholder="Nominee Name"
                                           value="<?php echo $user_info->nominee_name ?>"
                                           name="nominee_name" style="background: #fff;"/>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Nominee Relation</label>
                                    <input class="form-control placeholder-no-fix" type="text"
                                           placeholder="Nominee Relation"
                                           value="<?php echo $user_info->nominee_relation ?>"
                                           name="nominee_relation" style="background: #fff;"/>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Nominee Date of birth</label>
                                    <input class="form-control placeholder-no-fix" type="text"
                                           placeholder="Nominee Date Of Birth"
                                           id="nominee_dob" value="<?php echo $user_info->nominee_dob ?>"
                                           name="nominee_dob" style="background: #fff;"/>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Referred By</label>
                                    <input class="form-control placeholder-no-fix" type="text"
                                           placeholder="Reference By ID"
                                           value="<?php echo $user_info->parent_user_ref_id ?>"
                                           name="parent_user_ref_id" style="background: #fff;"/>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Bank Name</label>
                                    <input class="form-control placeholder-no-fix" type="text"
                                           placeholder="Bank Name"
                                           value="<?php echo $user_info->bank_name ?>"
                                           name="bank_name" style="background: #fff;"/>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Account NO</label>
                                    <input class="form-control placeholder-no-fix" type="text"
                                           placeholder="Account No"
                                           value="<?php echo $user_info->account_no ?>"
                                           name="account_no" style="background: #fff;"/>
                                </div>


                                <div class="form-group">

                                        <span id="av-image">
                                            <img src="<?= base_url($user_info->u_image) ?>" id="images" width="150"
                                                 height="150"
                                                 class="img-thumbnail">
                                            <img src="" class="hidden" id="imageshidden">

                                            <p style="font-size: 12px;"> Width * Height max : 300 px</p>
                                            <p style="font-size: 12px;"> Size Max : 150 px</p>
                                        </span>

                                    <input type="file" class="hidden" name="u_image"
                                           onchange="readURL(this);"
                                           id="uploadFile"/>

                                    <div class="btn btn-info" id="uploadTrigger">Select Profile Image</div>
                                </div>


                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="<?php echo $user_info->user_id ?>"/>
                        <div style="margin-top: 100px" class="col-md-12 well">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary "
                                       value="Update Your Profile">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
<script>
    $("#uploadTrigger").click(function () {
        $("#uploadFile").click();

    });
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imageshidden')
                    .attr('src', e.target.result);
                var x = document.getElementById("imageshidden").width;
                var y = document.getElementById("imageshidden").height;
                if (x > 300 || y > 300) {
                    alert('Image too large');
                } else {
                    $('#images')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(130);
                }
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#userReg').validate({ // initialize the plugin
            rules: {
                full_name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                dob: {
                    required: true
                },
                mobile: {
                    required: true
                },
                address: {
                    required: true
                },
                father_name: {
                    required: true
                },
                mother_name: {
                    required: true
                },
                religion: {
                    required: true
                },
                blood_group: {
                    required: true
                },
                sex: {
                    required: true
                },
                division: {
                    required: true
                },
                district: {
                    required: true
                },
                thana: {
                    required: true
                },
                u_union: {
                    required: true
                },
                village: {
                    required: true
                },
                city: {
                    required: true
                },
                country: {
                    required: true
                },
                post_code: {
                    required: true
                },
                nid: {
                    required: true
                },
                parent_user_ref_id: {
                    required: true
                },
                nominee_name: {
                    required: true
                },
                nominee_relation: {
                    required: true
                },
                nominee_dob: {
                    required: true
                },
                u_image: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 8
                },
                re_password: {
                    required: true,
                    equalTo: "#password"
                }


            }
        });
        $('#country').change(function () {
            $.get("<?php echo base_url()?>user/getStateByCountryId/" + this.value, function (data, status) {
                $('#district').html(data);
            });
        });
        <?php if($user_info->con_id != 0 || $user_info->con_id != null){?>
        $.get("<?php echo base_url()?>user/getStateByCountryId/" + <?= $user_info->con_id?>, function (data, status) {
            $('#district').html(data).val(<?php echo $user_info->st_id?>);
        });
        <?php }?>
    });
    $(function () {
        $('#dob').datepick();
    });
    $(function () {
        $('#nominee_dob').datepick();
    });
    <?php if($user_info->con_id != 0 || $user_info->con_id != null){?>;
    document.forms['userReg'].elements['country'].value = <?php echo $user_info->con_id?>;
    <?php }?>
    document.forms['userReg'].elements['sex'].value = <?php echo $user_info->sex?>;
    document.forms['userReg'].elements['blood_group'].value = <?php echo $user_info->blood_group?>;
    document.forms['userReg'].elements['religion'].value = <?php echo $user_info->religion?>;
</script>
<br/>