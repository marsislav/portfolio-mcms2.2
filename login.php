<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php

		checkIfUserIsLoggedInAndRedirect('/admin');

		if(ifItIsMethod('post')){

			if(isset($_POST['username']) && isset($_POST['password'])){

				login_user($_POST['username'], $_POST['password']);

			}else {

				redirect('/login.php');
			}
		}
?>

<!-- Navigation -->

<?php  include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container">
    <div class="all">

    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                            <h3>Вход</h3>
                            
                            <div class="panel-body">


                                <form id="login-form" role="form" autocomplete="off" class="form" method="post">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-user color-blue"></i></span>

                                            <input name="username" type="text" class="form-control"
                                                placeholder="Въведете потребителско име">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-lock color-blue"></i></span>
                                            <input name="password" type="password" class="form-control"
                                                placeholder="Въведете парола">
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <input name="login" class="btn btn-lg btn-primary btn-block" value="Вход"
                                            type="submit">
                                    </div>

                                </form>

                            </div><!-- Body-->

                        
                    </div>
                </div>
            </div>
        </div>


    <hr>

    

</div> <!-- /.container -->
<?php include "includes/footer.php";?>