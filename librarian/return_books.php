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
                                <h2>Return Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                         <form name="form1" action="" method="post">
                             <table class="table table-bordered">
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
                                          class=" form-control btn btn-default "
                                        style="background-color:#2a3f54; color:white"/>
                                     </td>
                                 </tr>
                             </table>
                             
                        <?php
                        if(isset($_POST['search']))
                        {
                            
                             $res =mysqli_query($con,"SELECT * FROM issue_books
                               where student_enrollment =$_POST[enrol]");
                          
                            echo "<table class='table table-bordered'>";
                            echo "<tr>";
                            echo "<th>"; echo "Student Enrollment"; "</th>";
                            echo "<th>"; echo "Student Name"; "</th>";
                            echo "<th>"; echo "Student Sem"; "</th>";
                            echo "<th>"; echo "Student Contact"; "</th>";
                            echo "<th>"; echo "Student Email"; "</th>";
                            echo "<th>"; echo "Book Name"; "</th>";
                            echo "<th>"; echo "Book Issue Date"; "</th>";
                            echo "<th>"; echo "Return Book"; "</th>";
                            echo "</tr>";
                            
                             while($row = mysqli_fetch_array($res))
                             {
                               
                                echo "<tr>";
                                echo "<td>"; echo $row['student_enrollment']; echo "</td>";
                                echo "<td>"; echo $row['student_name']; echo "</td>";
                                echo "<td>"; echo $row['student_sem']; echo "</td>";
                                echo "<td>"; echo $row['student-contact']; echo "</td>";
                                echo "<td>"; echo $row['student_email']; echo "</td>";
                                echo "<td>"; echo $row['book_name']; echo "</td>";
                                echo "<td>"; echo $row['book_issue_date']; echo "</td>";
                                echo "<td>";?> <a href="return.php?id=<?php echo $row['id'];  ?>">return book</a> <?php echo "</td>";
                                echo "</tr>";
                    
                             }
                            echo "</table>";
                            
                        }
                        
                        ?>
                          </form>
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