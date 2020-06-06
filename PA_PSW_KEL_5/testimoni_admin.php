<!doctype html>
<html>

    <head>
    <?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_five();
?>
        <link rel="stylesheet" href="css/stylee.css">
        <script src="js/jquery-3.2.1.min.js"></script>
        <style>
            body{
                background-color: silver;
            }

            .comment-form-container {
                background: #F0F0F0;
                width: 80%;
                border: silver 3px solid;
                margin-top: 20px;
                margin-right: 0px;
                margin-left: 0px;
                border-radius: 5px;
                color: black;
            }

            .input-row {
                margin-bottom: 20px;
            }

            .input-field {
                width: 30%;
                border-radius: 10px;
                margin:30px;
                padding: 0px;
                border: #e0dfdf 5px solid;
                font-size: 20px;
            }
            .input-pesan {
                width: 80%;
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
                margin-right: 30px;
                margin-left: 30px;
                padding: 20px;
            }

            .reply{
                background: #F0F0F0;
            }

            .outer-comment {
                background: silver;
                padding: 20px;
                width: 90%;
                border: #dedddd 1px solid;
            }

            .a{
                margin-left: 0px;
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
                margin-left: 0px;
                color: black;
                display: none;
            }
        </style>
    </head>

    <body>  
        <div>
            <p style="color:black; font-size:30px; font-family: helvetica">Berikan komentar anda...</p><br>
        </div>
        <div class="comment-form-container">
            <form id="frm-comment">
                <div class="input-row">
                    <input type="hidden" name="comment_id" id="commentId" placeholder="Name" /> 
                    <input style="color:black;" class="input-field" type="text" name="name" id="name" placeholder="Isi nama anda..." />
                    <textarea class="input-pesan" type="text" name="comment" id="comment" placeholder="Add a Comment">  </textarea>
                    <input type="button" class="btn-submit" id="submitButton" value="Kirim" /><div id="comment-message">Komentar berhasil ditambahkan!</div>
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
                        "<div><a class='btn-reply' onClick='postReply(" + data[i]['comment_id'] + ")'>&emsp;&emsp;&emsp;&emsp;&emsp;Jawab</a></div>"+
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
        	get_footer();
        ?>
    </body>  
</html>