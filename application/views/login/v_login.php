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
    <?php 
        $ceklogin = $this->session->userdata('ceklogin');
        if ($ceklogin == 'gagal') {
    ?>
        <div class="box-body" style="margin-top:15px; margin-right:15px" id="notifikasi">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="hide()">&times;</button>
                <b>Maaf !</b>
                <b>Username</b> dan <b>Password</b> yang anda masukan salah. Silahkan coba lagi dengan benar!
            </div>
        </div>

    <?php
            $this->session->unset_userdata('ceklogin');
        }
    ?>
    <center>
        <div class="form-box" id="login-box" style="margin-top:150px">
            <div class="header bg-black">User Authentication</div>

            <?php echo form_open('cms/login/sign_in'); ?>
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="username" required/>
                    </div>     
                    <div class="input-group" style="margin-bottom:15px">
                        <input type="password" name="password" class="form-control" placeholder="password" id="pass" required/>
                        <span class="input-group-addon" >
                            <a href="#" onclick="show(1)" id="link1" style="display:block"><i class="fa fa-eye" ></i></a>
                            <a href="#" onclick="show(2)" id="link2" style="display:none"><i class="fa fa-eye-slash"></i></a>
                        </span>
                    </div>
                </div>
                <div class="footer bg-gray" style="padding-bottom:20px">                                                               
                    <button type="submit" class="btn bg-black btn-block"><i class="fa fa-sign-in" style="margin-right: 10px"></i>Sign In</button>  
                </div>
            <?php echo form_close(); ?>
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