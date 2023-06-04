<?php 
include("table.php");
Class D{
    public $con;
            public function __construct(){
                $this->con=mysqli_connect("localhost","root","","contectus"); 
                
            }
	public function delete(){
	$id=$_GET['id'];
	$delete="DELETE FROM `contect_us` WHERE id='$id'";
	$result=mysqli_query($this->con,$delete);
	header("Location:table.php");
	}
}
$obj=new D;
$obj->delete();
?>
