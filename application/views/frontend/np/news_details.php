<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>worldnews365</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/np/css/style.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/np/slider/style.css?version=new'); ?>"/>
    <script type="text/javascript" src="<?= base_url('assets/frontend/np/slider/js/jquery-1.8.2.js'); ?>"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <script type="text/javascript"
            src="<?= base_url('assets/frontend/np/slider/js/jquery-ui-1.9.0.custom.min.js'); ?>"></script>
    <script type="text/javascript"
            src="<?= base_url('assets/frontend/np/slider/js/jquery-ui-tabs-rotate.js'); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#featured").tabs({fx: {opacity: "toggle"}}).tabs("rotate", 5000, true);
        });
    </script>

</head>
<body id="top">
<!-- BEGIN wrapper -->
<div id="wrapper">
    <!-- BEGIN header -->
    <?php require_once('page/header.php'); ?>
    <div id="block-menu">
        <?php require_once('page/menu.php'); ?>
    </div>

    <!-- END header -->
    <!-- BEGIN content -->
    <div id="content">
        <!-- begin post -->
        <div class="single">
            <br/>
            <h1 style="color:#073300;"><?php echo $news_details_info->news_headline; ?></h1>
            <div style="float:left;">
                <p>Published: <?php echo $news_details_info->news_date; ?></p></div>

            <!-- AddThis Button BEGIN -->
            <!-- <div style="float:right" class="addthis_toolbox addthis_default_style">
            <a class="addthis_button_preferred_1"></a> <a class="addthis_button_preferred_2"></a>
            <a class="addthis_button_preferred_3"></a> <a class="addthis_button_preferred_4"></a>
            <a class="addthis_button_compact"></a> <a class="addthis_counter addthis_bubble_style"></a>
            </div>  -->
            <!-- AddThis Button END -->

            <script type="text/javascript"
                    src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f6e2c8770b33edd"></script>

            <p><img class="alignright"
                    src="<?= base_url('assets/frontend/np/images/news/' . $news_details_info->news_image); ?>"
                    width="600" height="350" alt="News Image"/></p>
            <p>&nbsp;</p>
            <span style="text-align:justify;"><br/><?php echo $news_details_info->news_details; ?></span>

            <!-- AddThis Button END -->
            <script type="text/javascript"
                    src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f6e2c8770b33edd"></script>

        </div>
        <!-- end post -->
        <!--facebook comment -->
        <br/>
        <hr/>
        <form id="form1" name="form1" method="post" action="<?= base_url('news/saveComment') ?>">
            <?php if ($news_details_info->user_id != $this->session->userdata('user_id')) { ?>
                <table width="662" border="0">
                    <?php if ($news_react != null) { ?>
                        <tr>
                            <td height="37">
                                <?php if ($news_react->react_type == LIKE) { ?>
                                    <span style="color: green;"> <i class="fa fa-thumbs-up"></i> Liked</span>
                                <?php } else if ($news_react->react_type == UNLIKE) { ?>
                                    <span style="color: red;">  <i class="fa fa-thumbs-down"></i> Un-Liked</span>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } else {
                        ?>
                        <tr>
                            <td height="37">

                                <i class="fa fa-thumbs-up"></i> <a style="color: black"
                                                                   href="<?= base_url('news/likeNews/' . $news_details_info->news_id) ?>">Like</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="fa fa-thumbs-down"></i> <a style="color: black"
                                                                     href="<?= base_url('news/unlikeNews/' . $news_details_info->news_id) ?>">
                                    Un-Like</a>

                            </td>
                        </tr>

                        <?php
                    } ?>

                    <input type="hidden" name="news_id" value="<?php echo $news_details_info->news_id ?>"/>

                    <tr>
                        <td height="37" colspan="2" style="border-bottom: 1px solid #000;border-top: 3px solid #000;">
                            <br/><br/>
                            <h3 id="reply-title"><i class="fa fa-comment"></i> Leave a Comment</h3><br/></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2"><label for="txtComment"></label>
                            <textarea style="margin-left:10px;" name="comment" required="required" id="txtComment"
                                      cols="80" rows="3"
                                      placeholder="Please Enter Your Comment Here.."></textarea></td>
                    </tr>

                    <tr>
                        <td align="left">
                            <br/>
                            <br/>
                            <input type="submit" style="padding: 10px;color: white;background-color: #0ea0db;"
                                   name="butPostComment" id="butPostComment" value="Post Comment"/>

                        </td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td align="right">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-top: 3px solid #000;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td height="37" colspan="2">

                            <!--                        </div>-->
                            <style>
                                .user_comment {
                                    width: 100%;
                                    border: solid 1px #ccc;
                                    float: left;
                                    margin-bottom: 1%;
                                    overflow-wrap: break-word;
                                    padding: 10px 10px;
                                }

                                .user_image {
                                    width: 10%;
                                    float: left;
                                    margin-right: 5%;
                                    padding: 10px 10px;
                                }
                            </style>
                            <?php
                            foreach ($news_comments as $nc) { ?>

                                <div class="user_comment">
                                    <div class="user_image">
                                        <img src="<?= base_url($nc->u_image); ?>"
                                             width="100%"
                                             height="100%">
                                    </div>
                                    <span style="color: green;font-size: 18px; padding-top: 10px">
                                    <?php echo $nc->full_name ?>
                                </span>
                                    <span style="margin-left: 25%; font-size: 12px; color: red;padding-top: 10px"> <?php echo date('d M Y : h:i', strtotime($nc->comment_time)) ?>
                                </span><br>
                                    <br/>
                                    <p style="padding-bottom: 10px">  <?php echo $nc->comment ?></p>
                                </div>
                            <?php } ?>


                        </td>
                    </tr>
                </table>
            <?php } ?>
        </form>
        <!--facebook comment -->

    </div>
    <!-- END content -->
    <!-- BEGIN sidebar -->
    <?php require_once('page/news_details_sidebar.php'); ?>
    <!-- END sidebar -->
    <!-- BEGIN footer -->
    <?php require_once('page/footer.php'); ?>
    <p id="back-top"><a href="#top"><span></span></a></p>
    <!-- END footer -->

</div>

<!-- END wrapper -->
</body>
</html>

<!-- back to top button -->
<script>
    $(document).ready(function () {
        var height = $(document).height(); // returns height of HTML document
        var scroll = (height / 100) * 3;
//alert(scroll);
        // hide #back-top first
        $("#back-top").hide();

        // fade in #back-top
        $(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > scroll) {
                    $('#back-top').fadeIn();
                } else {
                    $('#back-top').fadeOut();
                }
            });

            // scroll body to 0px on click
            $('#back-top a').click(function () {
                $('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        });
    });
</script>
<!-- back to top -->

<!-- menu fixing -->

<script>

    $(document).scroll(function () {
        var y = $(document).scrollTop(),
            header = $("#block-menu");
        if (y >= 300) {
            header.css({position: "fixed", "z-index": "10000", "top": "0", "left": "77", "width": "1200px",});
        } else {
            header.css({position: "relative", "top": "0", "left": "0", "width": "1200px",});
        }
    });

</script>
<!-- menu fixing -->