<?php
include("admin/includes/config.php");
error_reporting(0);
?>
<?php if($_SESSION['login']!="")
{?>
<header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php echo htmlentities($_SESSION['sname']);?>
                    &nbsp;&nbsp;
                </div>

            </div>
        </div>
    </header>
    <?php } ?>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="color:#fff; font-size:24px; line-height:24px; ">

                  Student Online Course Registration
                </a>

            </div>

            <div class="left-div">
                <i class="fa fa-user login-icon" ></i>
        </div>
            </div>
        </div>