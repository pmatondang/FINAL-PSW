<!DOCTYPE html>
<html lang="en">
    <head>
    <?php
        require_once("functions/function.php");
        get_header();
        get_sidebar();
        get_bread_seven();
    ?>
    </head>

    <body>
        <div class="row-fluid sortable">		
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2></i><span class="break"></span>Data Pesanan</h2>
                </div>
                <div class="box-content"><br>
                    <div class="row justify-content-center"><h2>
                        <div class="col-md-6 col-md-offset-3 container">
                            <h1><span class="break"></span><b><u> Form Pengiriman Pesan</u></b></h1><br><br>
                            <div class="control-group">
                                <label class="control-label" style="font-size:20px;" for="focusedInput"><strong> Nama pengirim  </strong>
                                    &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;<input style="color:black;width:40%;" id="name" class="form-control" placeholder=" Nama anda ..." required>
								</label>
							</div><br><hr>
                            <div class="control-group">
                                <label class="control-label" style="font-size:20px;" for="focusedInput"><strong> Tujuan email </strong>
                                    &emsp;&emsp;&emsp;&emsp;&emsp;<input style="color:black;width:40%;" id="email" class="form-control" placeholder=" Email tujuan anda ..." required>
                                </label>
							</div><br><hr>
                            <div class="control-group">
                                <label class="control-label" style="font-size:20px;" for="focusedInput"><strong> Subjek  </strong>
                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<input style="color:black;width:40%;" id="subject" class="form-control" placeholder=" Subjek email ..." required>
								</label>
							</div><br><hr>
                            <div class="control-group">
                                <label class="control-label" style="font-size:20px;" for="focusedInput"><strong> Isi pesan </strong>
                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<textarea style="color:black;width:40%;border-box:2px black;" rows="4" id="body" placeholder=" Isi pesan yang ingin anda kirim ..." class="form-control" required></textarea>
								</label>
							</div><br><br><br>
                            <input style="float:left;color:#fff;width:8%;" type="button" value="Kirim" onclick="kirimEmail()" class="btn btn-primary">
                        </div><br>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            function kirimEmail()
            {
                console.log("sending...");
                var name = $("#name");
                var email = $("#email");
                var subject = $("#subject");
                var body = $("#body");
                
                if(tidakkosong(name) && tidakkosong(email) && tidakkosong(subject) && tidakkosong(body)){
                    console.log("selesai..");
                    $.ajax({
                        url:'kirimEmail.php',
                        method:'POST',
                        dataType:'json',
                        data : {
                            name : name.val(),
                            email : email.val(),
                            subject : subject.val(),
                            body : body.val()
                        }, success: function (response)
                        {
                            if(response.status == "sukses")
                            alert('Email anda telah terkirim..!');
                            else{
                                alert('Maaf, silahkan coba lagi');
                                console.log(response);
                            }
                        }
                    });
                }
            }

            function tidakkosong(caller){
                if(caller.val() == "")
                {
                    caller.css('border', '1px solid red');
                    return false;
                }
                else
                {
                    caller.css('border', '');
                    return true;
                }
            }
        </script>
        
        <?php
            get_footer();
        ?>	

    </body>
</html>
