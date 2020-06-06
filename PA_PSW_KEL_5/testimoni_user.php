<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Testimoni</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="img/login/travelword.jpg">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/themify-icons.css">
        <link rel="stylesheet" href="css/nice-select.css">
        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/gijgo.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/slicknav.css">
        <link rel="stylesheet" href="css/stylee.css">
        <script src="js/jquery-3.2.1.min.js"></script>
        <style>
            body{
                background-color: silver;
            }

            .comment-form-container {
                background: #F0F0F0;
                border: silver 3px solid;
                margin-top: 20px;
                margin-right: 300px;
                margin-left: 300px;
                border-radius: 5px;
                color: black;
            }

            .input-row {
                margin-bottom: 20px;
            }

            .input-field {
                width: 50%;
                height: 30px;
                border-radius: 5px;
                margin:30px;
                padding: 30px;
                border: #e0dfdf 2px solid;
                font-size: 20px;
            }
            .input-pesan {
                width: 95%;
                border-radius: 5px;
                margin:30px;
                padding: 30px;
                border: #e0dfdf 2px solid;
            }

            .btn-submit {
                padding: 10px 10px;
                background: #333;
                border: #1d1d1d 1px solid;
                color: #f0f0f0;
                font-size: 0.9em;
                width: 100px;
                border-radius: 2px;
                cursor:pointer;
                margin: 40px;
            }
            ul {
                list-style-type: none;
            }

            .comment-row {
                border-bottom: #e0dfdf 2px solid;
                margin-right: 300px;
                margin-left: 300px;
                padding: 20px;
            }

            .reply{
                background: silver;
            }

            .outer-comment {
                background: lightblue;
                padding: 20px;
                border: #dedddd 1px solid;
            }

            .a{
                margin-left: 300px;
            }

            span.commet-row-label {
                font-style: italic;

            }

            span.posted-by {
                color: red;
            }

            .comment-info {
                font-size: 0.8em;
            }
            .comment-text {
            }
            .btn-reply {
                font-size: 0.8em;
                text-decoration: underline;
                color: #888787;
                cursor:pointer;
                padding: 20px;
            }
            #comment-message {
                margin-left: 50px;
                color: black;
                display: none;
            }
        </style>
    </head>

    <body>
        <?php
            require_once 'commons/header.php';
        ?>
        <!-- bradcam_area  -->
        <div class="bradcam_area bradcam_bg_4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bradcam_text text-center">
                            <h3>Silahkan berikan tanggapan kamu</h3>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div><div class="newletter_area overlay">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bradcam_text text-center">
                            <h3 style="color:white; font-size:50px;">Bagaimana dengan liburanmu?? Bukankah kamu menikmatinya?</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/><br/><br/>
        <div class="container">
            <p style="color:black; font-size:30px; font-family: helvetica">Berikan tanggapanmu...</p>
        </div>
        <div class="comment-form-container">
            <form id="frm-comment">
                <div class="input-row">
                    <input type="hidden" name="comment_id" id="commentId" placeholder="Name" /> 
                    <input style="color:black;" class="input-field" type="text" name="name" id="name" placeholder="Masukkan nama anda..." />
                    <textarea class="input-pesan" type="text" name="comment" id="comment" placeholder="Add a Comment">  </textarea>
                    <input type="button" class="btn-submit" id="submitButton" value="Kirim" /><div id="comment-message">Comments Added Successfully!</div>
                </div>
            </form>
        </div><br><br>
        <div id="output"></div>
        
        <script>
            function postReply(commentId) {
                $('#commentId').val(commentId);
                $("#name").focus();
            }

            $("#submitButton").click(function () {
            	   $("#comment-message").css('display', 'none');
                var str = $("#frm-comment").serialize();

                $.ajax({
                    url: "comment-add.php",
                    data: str,
                    type: 'post',
                    success: function (response)
                    {
                        var result = eval('(' + response + ')');
                        if (response)
                        {
                        	$("#comment-message").css('display', 'inline-block');
                            $("#name").val("");
                            $("#comment").val("");
                            $("#commentId").val("");
                     	   listComment();
                        } else
                        {
                            alert("Failed to add comments !");
                            return false;
                        }
                    }
                });
            });
            
            $(document).ready(function () {
            	   listComment();
            });

            function listComment() {
                $.post("comment-list.php",
                        function (data) {
                               var data = JSON.parse(data);
                            
                            var comments = "";
                            var replies = "";
                            var item = "";
                            var parent = -1;
                            var results = new Array();

                            var list = $("<ul class='outer-comment'>");
                            var item = $("<li class='reply'>").html(comments);

                            for (var i = 0; (i < data.length); i++)
                            {
                                var commentId = data[i]['comment_id'];
                                parent = data[i]['parent_comment_id'];

                                if (parent == "0")
                                {
                                    comments = "<div class='comment-row reply'>"+
                                    "<div class='comment-info'><span class='commet-row-label'><strong>from</strong></span> <span class='posted-by'>" + data[i]['comment_sender_name'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['date'] + "</span></div>" + 
                                    "<div class='comment-text'>" + data[i]['comment'] + "</div>"+
                                    "<div><a class='btn-reply' onClick='postReply(" + commentId + ")'>Tanggapi</a></div>"+
                                    "</div>";

                                    var item = $("<li>").html(comments);
                                    list.append(item);
                                    var reply_list = $('<ul>');
                                    item.append(reply_list);
                                    listReplies(commentId, data, reply_list);
                                }
                            }
                            $("#output").html(list);
                        });
            }

            function listReplies(commentId, data, list) {
                for (var i = 0; (i < data.length); i++)
                {
                    if (commentId == data[i].parent_comment_id)
                    {
                        var comments = "<div class='comment-row'>"+
                        "<div class='comment-info'>&emsp;&emsp;&emsp;&emsp;&emsp;<span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['comment_sender_name'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['date'] + "</span></div>" + 
                        "<div class='comment-text'>&emsp;&emsp;&emsp;&emsp;&emsp;" + data[i]['comment'] + "</div>"+
                        "<div><a class='btn-reply' onClick='postReply(" + data[i]['comment_id'] + ")'>&emsp;&emsp;&emsp;&emsp;&emsp;Tanggapi</a></div>"+
                        "</div>";
                        var item = $("<li>").html(comments);
                        var reply_list = $('<ul>');
                        list.append(item);
                        item.append(reply_list);
                        listReplies(data[i].comment_id, data, reply_list);
                    }
                }
            }
        </script>
        
        <?php
            require_once 'commons/footer.php'
        ?>

        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/ajax-form.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/scrollIt.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/nice-select.min.js"></script>
        <script src="js/jquery.slicknav.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/gijgo.min.js"></script>
        <script src="js/slick.min.js"></script>
       
        <!--contact js-->
        <script src="js/contact.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/mail-script.js"></script>

        <script src="js/main.js"></script>
        <script>
            $('#datepicker').datepicker({
                iconsLibrary: 'fontawesome',
                icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }
            });
        </script>
    </body>  
</html>