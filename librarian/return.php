<?php
session_start();
include 'connect.php';
$id =$_GET['id'];
$date=  date('d - M - Y');
$res =mysqli_query($con,"UPDATE issue_books SET book_return_date ='$date' WHERE id=$id");

$res =mysqli_query($con,"SELECT * from issue_books WHERE id=$id");
while($row=mysqli_fetch_array($res))
{
    $bookname =$row['book_name'];
    
}
mysqli_query($con,"UPDATE add_books SET available_quan =available_quan +1 WHERE book_name='$bookname'");

?>

<script type="text/javascript">
window.location ="return_books.php";
</script>

