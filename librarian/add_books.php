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
                                <h2>Add Books Information</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                    <form name="form1" action="" method ="post" class="col-lg-6" enctype="multipart/form-data">
                     <table class="table table-bordered">
                        <tr>
                          <td><input type ="text" class="form-control" placeholder="Book name" name ="bname" required=""/></td>
                        </tr>
                        <tr>
                          <td><input type ="file" name="fil" required=""/></td>
                        </tr>
                        <tr>
                          <td><input type ="text" class="form-control" placeholder="Book author name" name="bauthorname" required=""/></td>
                        </tr> 
                        <tr>
                          <td><input type ="text" class="form-control" placeholder="Book publication name" name="pname" required=""/></td>
                        </tr> 
                        <tr>
                          <td><input type ="text" class="form-control" placeholder="Book purchase date" name="pdate" required=""/></td>
                        </tr>  
                        <tr>
                          <td><input type ="text" class="form-control" placeholder="Book price" name="bprice" required=""/></td>
                        </tr>  
                        <tr>
                          <td><input type ="text" class="form-control" placeholder="Book quantity" name="bquan" required=""/></td>
                        </tr> 
                        <tr>
                          <td><input type ="text" class="form-control" placeholder="available quantity" name="aquan" required=""/></td>
                        </tr>   
                      </table>
                      <input type ="submit" name="submit1" class ="btn btn-primary submit col-lg-6 col-lg-push-3 " value ="insert book details" style="background-color:#2a3f54; color:white"/>
                      </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
        <?php
            if(isset($_POST["submit1"])){
                $tm = md5(time());
                $name =$_FILES["fil"]["name"];  // store the original filename from the client
                $temp = $_FILES['fil']['tmp_name']; 
                $path ="./upload/".$tm.$name;  
                $path1 ="upload/".$tm.$name;  
                move_uploaded_file($temp,$path);

                mysqli_query($con,"insert into add_books 
                values('','$_POST[bname]','$path1','$_POST[bauthorname]','$_POST[pname]','$_POST[pdate]','$_POST[bprice]','$_POST[bquan]','$_POST[aquan]','$_SESSION[librarian]')");
                ?>
                <script type ="text/javascript">
                    alert("book information inserted successfully");
                </script>
                <?php
            }

        ?>

<?php
        include 'footer.php';

        ?>