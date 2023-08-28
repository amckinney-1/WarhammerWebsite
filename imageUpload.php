<?php
include_once "Header.php";
include_once "UploadScript.php";
?>
    Upload an Image for the selected Datasheet: &nbsp;
<form action="UploadScript.php" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file" />
    <input type="text" name="ID" value="ID" />
    <input type="submit" name="submit" value="Upload" />
</form>

<?php
// Get images from the database

$query = $db->query("SELECT * FROM `warhammerdb`.`images` as wdb");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'Uploads/'.$row["filename"];
        ?>
<img src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
<p>No image(s) found...</p>
<?php } ?>


<?php
include_once "Footer.php";
?>