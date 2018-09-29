<?php
session_start();
if(!isset($_SESSION['username'])){
?>
<script type='text/javascript'>
  window.location ="login.php";
    </script>
<?php
}
include 'header.php';
include 'connect.php';
?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
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
                                <h2>Search Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <form name="form1" action="" method ="post">
                            <table class ="table table-bordered">
                            <tr>
                           <td> <input class="form-control"  type="text" name="bname" placeholder="Enter Book Name"
                            required/></td>
                            <td><input class=" form-control btn btn-default" type="submit" name="search"
                             value ="Search Book" style="background-color:#2a3f54; color:white"/></td>
                             </tr>
                            </table>
                            </form>
                               <?php
                               if(isset($_POST['search']))
                               {
                                $i=0;
                               $res=mysqli_query($con,"SELECT * from add_books
                               WHERE book_name like('$_POST[bname]')");
                                echo "<table class ='table table-bordered'>";
                                echo "<tr>";
                               while($row=mysqli_fetch_array($res)) 
                               {
                                   $i =$i+1;
                                  echo "<td>";
                                  ?> <img src="../librarian/<?php echo $row['book_image']; ?>"
                                   width='100' height='100' /><?php
                                   echo "<br/>"; 
                                   echo "<b>"; echo $row['book_name']; echo "</b>";
                                   echo "</br>";
                                   echo "<b>"."available : ". $row['available_quan']."</b>";
                                  echo "</td>";
                                  if($i==3)
                                  {
                                      echo "</tr>";
                                      echo "<tr>";
                                      $i=0;
                                  }
                               }
                                echo "</tr>";
                                echo "</table>";
                               }
                               
                               else{
                                    $i=0;
                               $res=mysqli_query($con,"SELECT * from add_books");
                                echo "<table class ='table table-bordered'>";
                                echo "<tr>";
                               while($row=mysqli_fetch_array($res)) 
                               {
                                   $i =$i+1;
                                  echo "<td>";
                                  ?> <img src="../librarian/<?php echo $row['book_image']; ?>"
                                   width='100' height='100' /><?php
                                   echo "<br/>"; 
                                   echo "<b>"; echo $row['book_name']; echo "</b>";
                                   echo "</br>";
                                   echo "<b>"."available : ". $row['available_quan']."</b>";
                                  echo "</td>";
                                  if($i==3)
                                  {
                                      echo "</tr>";
                                      echo "<tr>";
                                      $i=0;
                                  }
                               }
                                echo "</tr>";
                                echo "</table>";
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