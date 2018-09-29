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
                                <h2><strong>Display Books</strong></h2>

                                <div class="clearfix"></div>
                                    <form action="" method="post" name="form1">
                                        <input type="text" name="ename" placeholder="Enter book name" class="col-lg-3"/>
                                        <input type="submit" name="search" value ="Search"/>
                                    </form>
                                </div>
                            <div class="x_content">
              <?php
              if(isset($_POST['search']))
              {
                $res = mysqli_query($con,"select * from add_books where book_name like('$_POST[ename]')");
                    echo"<table class='table table-bordered'>";
                    echo "<tr>";

                    echo "<th>"; echo "ID"; echo "</th>";
                    echo "<th>"; echo "Book Name"; echo "</th>";
                    echo "<th>"; echo "Book Image"; echo "</th>";
                    echo "<th>"; echo "Book Author name"; echo "</th>";
                    echo "<th>"; echo "Book publication name"; echo "</th>";
                    echo "<th>"; echo "Book Purchase date"; echo "</th>";
                    echo "<th>"; echo "Book Price"; echo "</th>";
                    echo "<th>"; echo "Book Quantity"; echo "</th>";
                    echo "<th>"; echo "Available Quantity"; echo "</th>";
                    echo "<th>"; echo "Librarian Username"; echo "</th>";
                    echo "<th>"; echo "Delete Book"; echo "</th>";
                    
                    echo "</tr>";
                while($row=mysqli_fetch_array($res))
                {
                    echo"<tr>";
                    echo"<td>"; echo $row['id']; echo"</td>";
                    echo"<td>"; echo $row['book_name']; echo"</td>";
                    echo"<td>";?> <img src="<?php echo $row['book_image']; ?>" height="100" width="100"/><?php   echo"</td>" ;
                    echo"<td>"; echo $row['book_author_name']; echo"</td>";
                    echo"<td>"; echo $row['book_publication_name']; echo"</td>";
                    echo"<td>"; echo $row['book_purchase_date']; echo"</td>";
                    echo"<td>"; echo $row['book_price']; echo"</td>";
                    echo"<td>"; echo $row['book_quan']; echo"</td>";
                    echo"<td>"; echo $row['available_quan']; echo"</td>";
                    echo"<td>"; echo $row['librarian_username']; echo"</td>";
                    echo"<td>"; ?><a href="delete_books.php?id=<?php echo $row["id"] ?>">Delete Book</a> <?php echo"</td>";

                    echo"</tr>";
                }
                echo "</table>";
              }
              else
              {

             
                $res = mysqli_query($con,'select * from add_books');
                    echo"<table class='table table-bordered'>";
                    echo "<tr>";

                    echo "<th>"; echo "ID"; echo "</th>";
                    echo "<th>"; echo "Book Name"; echo "</th>";
                    echo "<th>"; echo "Book Image"; echo "</th>";
                    echo "<th>"; echo "Book Author name"; echo "</th>";
                    echo "<th>"; echo "Book publication name"; echo "</th>";
                    echo "<th>"; echo "Book Purchase date"; echo "</th>";
                    echo "<th>"; echo "Book Price"; echo "</th>";
                    echo "<th>"; echo "Book Quantity"; echo "</th>";
                    echo "<th>"; echo "Available Quantity"; echo "</th>";
                    echo "<th>"; echo "Librarian Username"; echo "</th>";
                    echo "<th>"; echo "Delete Book"; echo "</th>";

                    
                    echo "</tr>";
                while($row=mysqli_fetch_array($res))
                {
                    echo"<tr>";
                    echo"<td>"; echo $row['id']; echo"</td>";
                    echo"<td>"; echo $row['book_name']; echo"</td>";
                    echo"<td>";?> <img src="<?php echo $row['book_image']; ?>" height="100" width="100"/><?php   echo"</td>" ;
                    echo"<td>"; echo $row['book_author_name']; echo"</td>";
                    echo"<td>"; echo $row['book_publication_name']; echo"</td>";
                    echo"<td>"; echo $row['book_purchase_date']; echo"</td>";
                    echo"<td>"; echo $row['book_price']; echo"</td>";
                    echo"<td>"; echo $row['book_quan']; echo"</td>";
                    echo"<td>"; echo $row['available_quan']; echo"</td>";
                    echo"<td>"; echo $row['librarian_username']; echo"</td>";
                    echo"<td>"; ?><a href="delete_books.php?id=<?php echo $row["id"] ?>">Delete Book</a> <?php echo"</td>";
                    echo"</tr>";
                }
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