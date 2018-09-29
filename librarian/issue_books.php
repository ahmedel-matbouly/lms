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
                                <h2>Issue Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <form name ="form1" action="" method="post">
                              <table>
                               <tr>
                                <td>
                                 <select name="enrol" class="form-control selectpicker">
                                  <?php
                                    
                                        $res =mysqli_query($con,"SELECT enrollmentno FROM
                                         student_registeration");
                                         while($row=mysqli_fetch_array($res))
                                         { 
                                             echo "<option>";
                                             echo $row['enrollmentno'];
                                             echo "</option>";
                                         }
                                  ?>
                                 </select>
                                </td>
                                <td>
                                 <input type="submit" name="search" value="Search"
                                  class="btn btn-default" style="margin-top:4px"/>
                                </td>
                               </tr>
                              </table>
                              <?php
                              if(isset($_POST['search']))
                              {
                                  $result =mysqli_query($con,"SELECT * from student_registeration
                                      where enrollmentno =$_POST[enrol]");
                                      while($row2=mysqli_fetch_array($result))
                                      {
                                          $firstname =$row2['firstname'];
                                          $lastname =$row2['lastname'];
                                          $username =$row2['username'];
                                          $email=$row2['email'];
                                          $contact =$row2['contact'];
                                          $sem =$row2['sem'];
                                          $enrollment =$row2['enrollmentno'];
                                          $_SESSION['enrollment'] =$enrollment;
                                          $_SESSION['username']=$username;

                                      }
                                  ?>
                              <table class="table table-bordered">
                             <tr>
                              <td><input type ="text" class="form-control" placeholder="Enrollmentno"
                               name ="enrollnum" value="<?php echo $enrollment; ?>" disabled/>
                               </td>
                               </tr>

                               <tr>
                               <td><input type ="text" class="form-control" placeholder="Student name"
                               name ="studentname"  value="<?php echo $firstname ." ". $lastname; ?>" required/>
                               </td>
                               </tr>

                               <tr>
                               <td><input type ="text" class="form-control" placeholder="Student sem"
                               name ="studentsem" value="<?php echo $sem;  ?>" required/>
                               </td>
                               </tr>

                               <tr>
                                <td><input type ="text" class="form-control" placeholder="Student contact"
                                 name ="studentcont"  value ="<?php echo $contact; ?>" required/>
                                 </td>
                               </tr>

                               <tr>
                               <td><input type ="text" class="form-control" placeholder="Student email"
                               name ="studentemail" value="<?php echo $email; ?>" required/>
                               </td>
                               </tr>

                                <tr>
                                 <td>
                                  <select name="bookname" class="form-control selectpicker">
                                  <?php
                                  $res=mysqli_query($con,"SELECT book_name from add_books");
                                  while($row=mysqli_fetch_array($res))
                                  {
                                    echo "<option>";
                                    echo $row['book_name'];
                                    echo "</option>";
                                  }
                                  ?>
                                  
                                  </select>
                                </td>
                               </tr>

                               <tr>
                               <td><input type ="text" class="form-control" placeholder=" Book issue date"
                               name ="bookissuedate" value="<?php echo date('d - M - Y'); ?>" required/>
                               </td>
                               </tr>

                               <tr>
                               <td><input type ="text" class="form-control" placeholder="Student username"
                               name ="username" value="<?php echo $username; ?>" disabled/>
                               </td>
                               </tr>

                               <tr>
                               <td><input type ="submit" class=" col-lg-3 col-lg-push-4 center-block btn btn-default"
                                value="Issue Book" name ="issuebook" style="background-color:#2a3f54; color:white" />
                               </td>
                               </tr>
                               </table>                  
                                  <?php
                              }
                              ?>
                              </form> 
                              <?php
                            if(isset($_POST['issuebook']))
                            {
                                $res =mysqli_query($con,"SELECT * FROM add_books
                                WHERE book_name ='$_POST[bookname]'");
                                while($row=mysqli_fetch_array($res))
                                {
                                    $quant =$row['available_quan'];
                                }
                                if($quant==0)
                                {
                                    ?>
                                    <div class="alert alert-danger col-lg-6 col-lg-push-3">
                                    <p style="color:white;text-align:center;font-weight:900">Sorry!! this book is not available now in the stock
                                    </p>
                                    
                                    </div>
                                    <?php

                                }else
                                {
                                mysqli_query($con,"INSERT into issue_books values('',' $_SESSION[enrollment]',
                                  '$_POST[studentname]','$_POST[studentsem]','$_POST[studentcont]',
                                  '$_POST[studentemail]','$_POST[bookname]','$_POST[bookissuedate]',
                                  '','$_SESSION[username]')");
                                mysqli_query($con,"UPDATE add_books SET available_quan =available_quan-1
                                 WHERE book_name ='$_POST[bookname]'");
                                $_SESSION['bookname'] = $_POST['bookname'];
                                
                            ?>
                            
                            <script type="text/javascript">
                                alert("books issued successfully");
                                
                            </script>
                           
                            <?php
                            }
                                }
                              ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
        include 'footer.php';

        ?>