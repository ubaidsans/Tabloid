<!DOCTYPE html>
<html class="bg-white">
    <head>
        <meta charset="UTF-8">
        <title>Tabloid Jubi | Forget Password</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- masukin style ke view -->
        <?php $this->load->view('style/css.php'); ?>

    </head>
    <body>
    <?php 
        $passconfirm = $this->session->userdata('passconfirm');
        if ($passconfirm == 'gagal') {
    ?>
        <div class="box-body" style="margin-top:15px; margin-right:15px" id="notifikasi">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="hide()">&times;</button>
                <b>Maaf !</b>
                <b>password tidak sesuai</b>
            </div>
        </div>

    <?php
            $this->session->unset_userdata('passconfirm');
        }
    ?>
    <center>
        <div class="form-box" id="login-box" style="margin-top:150px">
            <div class="header bg-black">Ganti Password</div>

            <?php echo form_open('cms/login/updatepass'); ?>
                <div class="body bg-gray">
                    <div class="input-group" style="margin-bottom:15px">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="password" name="pass" class="form-control" placeholder="password" id="pass" required/>
                        <span class="input-group-addon" >
                            <a href="#" onclick="show(1)" id="link1" style="display:block"><i class="fa fa-eye" ></i></a>
                            <a href="#" onclick="show(2)" id="link2" style="display:none"><i class="fa fa-eye-slash"></i></a>
                        </span>
                    </div>     
                    <div class="input-group" style="margin-bottom:15px">
                        <input type="password" name="passconfirm" class="form-control" placeholder="re enter password" id="passconfirm" required/>
                        <span class="input-group-addon" >
                            <a href="#" onclick="show(3)" id="con1" style="display:block"><i class="fa fa-eye" ></i></a>
                            <a href="#" onclick="show(4)" id="con2" style="display:none"><i class="fa fa-eye-slash"></i></a>
                        </span>
                    </div>
                </div>
                <div class="footer bg-gray" style="padding-bottom:20px">                                                               
                    <button type="submit" class="btn bg-black btn-block"><i class="fa fa-sign-in" style="margin-right: 10px"></i>Update</button>  
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
                if (a == 1) {
                    document.getElementById('pass').setAttribute('type', 'text');    
                    document.getElementById('link1').style.display="none";
                    document.getElementById('link2').style.display="block";
                }
                else if (a == 2){
                    document.getElementById('pass').setAttribute('type', 'password');    
                    document.getElementById('link1').style.display="block";
                    document.getElementById('link2').style.display="none";
                } else if (a == 3) {
                    document.getElementById('passconfirm').setAttribute('type', 'text');    
                    document.getElementById('con1').style.display="none";
                    document.getElementById('con2').style.display="block";
                }
                else {
                    document.getElementById('passconfirm').setAttribute('type', 'password');    
                    document.getElementById('con1').style.display="block";
                    document.getElementById('con2').style.display="none";
                }
            }

        </script>
    </body>
</html>