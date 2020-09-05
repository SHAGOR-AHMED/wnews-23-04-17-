<style>
    .error {
        color: red;
    }
</style>
<div class="row bg-white">

    <div class="col-md-12">
        <div class="profile-content" style="background-color: white; ">
            <div class="row">

                <h3 class="text-center well">Registration</h3>

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
                        }    ?>
                        <br/>
                        <form id="userReg" class="register-form" action="<?= base_url('user/saveUser'); ?>"
                              enctype="multipart/form-data"
                              method="post">
                            <div class="col-md-12">
                                <div class="col-md-5">

                                    <div class="form-group">
                                        <input class="form-control placeholder-no-fix" type="text"
                                               placeholder="Full Name"
                                               name="full_name" autofocus="autofocus" value=""
                                               style="background: #fff;"/>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control placeholder-no-fix" type="email"
                                               placeholder="Email"
                                               name="email" value="" style="background: #fff;"/>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control placeholder-no-fix" type="text"
                                               placeholder="Date Of Birth" id="dob"
                                               name="dob" value="" style="background: #fff;"/>
                                    </div>


                                    <div class="form-group">
                                        <input class="form-control placeholder-no-fix" type="text"
                                               placeholder="Father/Husband's Name"
                                               name="father_name" value="" style="background: #fff;"/>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control placeholder-no-fix" type="text"
                                               placeholder="Mother Name"
                                               name="mother_name" value="" style="background: #fff;"/>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" name="religion">
                                            <option value=""> -- Select Religion --</option>
                                            <option value="1">Islam</option>
                                            <option value="2">Hindu</option>
                                            <option value="3">Christian</option>
                                            <option value="4">Buddho</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
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
                                        <select name="sex" class="form-control">
                                            <option value="">-- Select Sex --</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="country" id="country" class="form-control">
                                            <option value="">-- Select Country --</option>
                                            <?php getAllCountryList(); ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="refIdKey" id="refIdKey">

                                    <div class="form-group">
                                        <select name="district" class="form-control" id="district">

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="City"
                                               name="city" value="" style="background: #fff;"/>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label visible-ie8 visible-ie9">Thana</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Thana"
                                               name="thana" value="" style="background: #fff;"/>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control placeholder-no-fix" type="text"
                                               placeholder="Union"
                                               name="u_union" value="" style="background: #fff;"/>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control placeholder-no-fix" type="text"
                                               placeholder="Village"
                                               name="village" value="" style="background: #fff;"/>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control placeholder-no-fix" type="number"
                                               placeholder="Post Code"
                                               name="post_code" value="" style="background: #fff;"/>
                                    </div>

                                    <div class="form-group">

                                        <div class="input-group">
                                            <div class="input-group-addon hidden" id="phoneCode"></div>
                                            <input class="form-control placeholder-no-fix" type="number" maxlength="15"
                                                   placeholder="Mobile Number" id="mobile" name="mobile" value=""
                                                   style="background: #fff;"/>

                                        </div>
                                    </div>


                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                            <textarea class="form-control placeholder-no-fix"
                                                      placeholder="Present Address"
                                                      name="address"
                                                      cols="5" rows="3" style="background: #fff;"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label visible-ie8 visible-ie9">NID</label>
                                        <input class="form-control placeholder-no-fix" type="number"
                                               placeholder="Nation ID Number" name="nid"
                                               style="background: #fff;"/>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control placeholder-no-fix" type="text"
                                               placeholder="Nominee Name"
                                               name="nominee_name" style="background: #fff;"/>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control placeholder-no-fix" type="text"
                                               placeholder="Nominee Relation"
                                               name="nominee_relation" style="background: #fff;"/>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control placeholder-no-fix" type="text"
                                               placeholder="Nominee Date Of Birth"
                                               id="nominee_dob"
                                               name="nominee_dob" style="background: #fff;"/>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control placeholder-no-fix" type="text"
                                               placeholder="Reference By ID" autocomplete="off"
                                               name="parent_user_ref_id" style="background: #fff;"/>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control placeholder-no-fix" type="text"
                                               placeholder="Bank Name"
                                               name="bank_name" style="background: #fff;"/>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control placeholder-no-fix" type="text"
                                               placeholder="Account No"
                                               name="account_no" style="background: #fff;"/>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control placeholder-no-fix" type="password"
                                               autocomplete="off"
                                               id="password"
                                               placeholder="Password" name="password"
                                               style="background: #fff;"/>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control placeholder-no-fix" type="password"
                                               autocomplete="off"
                                               placeholder="Retype Password" name="re_password"
                                               style="background: #fff;"/>
                                    </div>

                                    <div class="form-group">

                                        <span id="av-image">
                                            <img src="<?= base_url('assets/avt.jpg') ?>" id="images"
                                                 class="img-thumbnail">
                                            <img src="" class="hidden" id="imageshidden">

                                            <p style="font-size: 12px;"> Width * Height max : 300 px</p>
                                            <p style="font-size: 12px;"> Size Max : 150 px</p>
                                        </span>

                                        <input type="file" class="hidden" name="u_image" onchange="readURL(this);"
                                               id="uploadFile"/>

                                        <div class="btn btn-info" id="uploadTrigger">Select Profile Image</div>
                                    </div>


                                </div>
                            </div>

                            <div style="margin-top: 100px" class="col-md-12 well">

                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-primary " value="Submit Your Application">
                                </div>
                            </div>
                        </form>

                    </div>
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
//                u_image: {
//                    required: true
//                },
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
            $.get("<?php echo base_url()?>home/getStateByCountryId/" + this.value, function (data, status) {
                $('#district').html(data);
            });
            $.get("<?php echo base_url()?>home/getCountryCode/" + this.value, function (data, status) {
                if (status == 'success') {
                    $('#phoneCode').html(data).removeClass('hidden');
                    $('#refIdKey').val(data);
                } else {
                    $('#phoneCode').addClass('hidden');
                }
            });
        });

    });
    $(function () {
        $('#dob').datepick();
    });
    $(function () {
        $('#nominee_dob').datepick();
    });
</script>
<br/><br/>