<?php
        if(ifItIsMethod('post')){

                if(isset($_POST['login'])){

                    if(isset($_POST['username']) && isset($_POST['password'])){

                        login_user($_POST['username'], $_POST['password']);

                    }else {

                        redirect('index');
                    }

                }
        }
?>



    <input type="checkbox" class="check" id="checked">
    <label class="menu-btn" for="checked">
        <span class="bar top"></span>
        <span class="bar middle"></span>
        <span class="bar bottom"></span>
        <span class="menu-btn__text">БЛОГ</span>
    </label>
    <label class="close-menu" for="checked"></label>
    <nav class="drawer-menu">

            <h4>Blog Search</h4>
            <form action="search.php" method="post">
                <div class="input-group">
                    <input name="search" type="text" class="form-control">
                    <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                    </span>
                </div>
            </form>

            <div class="card card-body bg-light">

        
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">


                </ul>
            </div>

        </div>
        <!-- /.row -->
    </div>
            
    <?php include "widget.php"; ?>

    </nav>


