<?php
	session_start();
	require '../connect.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <?php require 'head.php'; ?>
  </head>
<body>
<?php 
	include_once ("atas_bukti_transfer.php"); 
	//echo $_SESSION["id_penjualan"];
?>	
<div class="container">

<section id="atas" class="hero-unit span10">
  <h2>Bukti Transfer</h2>  
	<section class="span7">
		<form action="data_add_bukti_transfer.php" method="post" enctype="multipart/form-data">
			<section class="span2 kanan">Gambar: </section>
			<section class="span4">
				<input type="file" name="file_gambar" id="file_gambar" required="required" onchange="ValidateSingleInput(this);" /><br/>
				
			<input id="submit" class="btn btn-mini" type="submit" value="Submit"/>
			</section>
		</form>
	</section>
</section>

<p></p>
</div>
<script>
var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}
</script>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>