<?php
session_start();
if(!isset($_SESSION['librarian'])){
?>
<script type="text/javascript"> 
window.location="login.php";
</script>
<?php
}
include "connect.php";
include 'header.php';
?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3></h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Send Notifications to students</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                           <form class="col-lg-6" action="" method="post">
                           <table class="table table-bordered"> 
                           <tr>
                           <td>
                            <select class="form-control" name="usern">
                            <?php
                                $res =mysqli_query($con,"SELECT * FROM student_registeration");
                                while($row=mysqli_fetch_array($res))
                                {
                                    echo "<option>"; echo $row['username'];  echo "</option>";
                                }
                                ?>
                                <tr>
                                    <td><input class="form-control" type="text" name="titl" placeholder="Enter title"/></td>
                                </tr>
                                <tr>
                                    <td><textarea name="mess" class="form-control" rows="10" cols ="1" placeholder="Enter your messsage"></textarea></td>
                                </tr>
                                <tr>
                                <td><input class="col-lg-6 col-lg-push-3 btn btn-primary" type ="submit" value="Send" name="send"/> </td>
                                </tr>
                            </select>
                           </td>
                           </tr>
                           </table>
                           </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
        <?php
         if(isset($_POST['send'])){
            $res =mysqli_query($con,"INSERT INTO messages values ('','$_SESSION[librarian]',
            '$_POST[usern]','$_POST[titl]','$_POST[mess]','n')");
         
         ?>
        <script type="text/javascript">
          alert("Message has been sent successfully");
         </script>
         <?php
         }
        ?>

<?php
        include 'footer.php';

        ?>