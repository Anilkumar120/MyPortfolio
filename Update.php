<?php 
include("table.php");
class B{
	public $con;
	public function __construct(){
		$this->con=mysqli_connect("localhost","root","","insert");
	}
	public function update(){
		if(isset($_POST['update'])){
            $fullname=$_POST['fullname'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $message=$_POST['message'];
            if (empty($fullname) || empty($email) || empty($phone) || empty($message)) {
                echo "Please fill all the required fields!";
            } else {
			$update="UPDATE `contect_us` SET `id`='$id',`fullname`='$fullname',`email`='$email',`phone`='$phone',`message`='$message' WHERE  id='$id'";
			$result=mysqli_query($this->con,$update);
		header("location:table.php");
        }
	}
	$id=$_GET['id'];
	$select="SELECT * FROM `contect_us` WHERE id='$id'";
	$updat_query=mysqli_query($this->con,$select);
	?>
	<form method="post">
		<?php
		while($row=mysqli_fetch_assoc($updat_query)){
			?>
			<input type="hidden"name="id"value="<?php echo $row['id'];?>">
			<label>Name</label><br>
			<input type="text"name="name" value="<?php echo $row['fullname'];?>"><br>
			<label>Email</label><br>
			<input type="email"name="email" value="<?php echo $row['email'];?>"><br>
			<label>Phone</label><br>
			<input type="phone"name="phone" value="<?php echo $row['phone'];?>"><br>
            <label>Message</label><br>
			<input type="message"name=message" value="<?php echo $row['message'];?>"><br>
			<input type="submit"name="update" value="update">
		<?php } ?>
		</form>
<?php		
}
}
$obj=new B;
$obj->update();
?>