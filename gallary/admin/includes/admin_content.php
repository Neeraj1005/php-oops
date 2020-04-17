<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Dashboard Page
                            <small>Subheading</small>
                        </h1>
                        
                        <?php
                        
                        $users = User::find_all_users();

                        foreach($users as $user){

                            echo $user->id . "<br>";

                        }
                        echo "Below Find User by id <br>";
                        $user_id = User::find_user_by_id(2);

                        echo $user_id->username;

                        ?>

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Admin Dashboard Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->