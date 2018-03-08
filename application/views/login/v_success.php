<!DOCTYPE html>
<html class="bg-white">
    <head>
        <meta charset="UTF-8">
        <title>Tabloid Jubi | Sign In</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- masukin style ke view -->
        <?php $this->load->view('style/css.php'); ?>

    </head>
    <body>
    <center>
        <div class="form-box" id="login-box" style="margin-top:150px">
            <div class="header bg-black">Selamat.</div>
                <div class="body bg-gray">
                    <b>Password anda telah berubah.</b>
                </div>
            </div>
        </div>
    </center>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>js/AdminLTE/app.js" type="text/javascript"></script>

        <script type="text/javascript">
            function hide()
            {
                document.getElementById('notifikasi').style.display="none" ;
            }

            function show(a) {
                if (a ==1) {
                    document.getElementById('pass').setAttribute('type', 'text');    
                    document.getElementById('link1').style.display="none";
                    document.getElementById('link2').style.display="block";
                }
                else {
                    document.getElementById('pass').setAttribute('type', 'password');    
                    document.getElementById('link1').style.display="block";
                    document.getElementById('link2').style.display="none";
                }
            }

        </script>
    </body>
</html>