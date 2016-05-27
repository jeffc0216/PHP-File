<?php
	session_start();
	if($_GET["action"] == "delete"){
		//判斷是否為資料夾
		if(is_dir($_GET["file"]) == true){
			//echo "此為資料夾";
			rmdir($_GET["file"]);
		}else{
			unlink($_GET["file"]);
		}
	}

	if($_GET["action"] == "create_dir"){
		mkdir($_POST["dirname"]);
	}


?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<style>
			li span {
				display: inline-block;
				width: 300px;
			}
			li {
				padding: 2px 0;
			}
			li:hover {
				background: #ffff00;
			}
			
		</style>
	</head>
	<body>		
		<h2>檔案管理系統</h2><br>
		<form action="?action=create_dir" method="post">
			目錄名稱：<input type="text" name="dirname">
			<input type="submit" value="建立">
		</form>
		<ul>
		<?php
			if($_GET["dir"] != "/" && $_GET["dir"] != ""){
				echo "<a href='?dir=".dirname($_GET["dir"])."'>上一頁</a>";
			}
			foreach(glob($_GET["dir"]."/*") as $key => $value) {
				echo "
				<li>
					<span>".basename($value)."</span>";
				if(is_dir($value) == true){
					echo "<a href='?dir=$value'>[瀏覽]</a>";
				}
				echo "
					<a href='?action=delete&file=".$value."'>[刪除]</a>
				</li>
				";
			}
		?>
		</ul>
	</body>
</html>