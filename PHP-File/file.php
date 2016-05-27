<?php
	session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>		
		<?php
			//原始碼會出現php指令，不會執行php
			echo file_get_contents("form.php");
			echo "<br>==================================================<br>";
			//看似相同但是原始碼不會出現php指令，會執行php
			include("form.php");
		?>
		<?php
			//沒加第三個參數8，會一直產生新檔案，有加8會在內容部分增加
			file_put_contents("2016-05-23test.txt", "Hello file test", 8);
		?>
		<br>===================================================<br>
		<?php
			//記錄瀏覽次數，加session來限制同一位瀏覽者不重複算次數
			$count=file_get_contents("count.txt");
			if($_SESSION["look"] != true){
				$count++;
				file_put_contents("count.txt", $count);
				$_SESSION["look"]=true;
			}
			echo "你是本站第".$count."位瀏覽者";
		?>
		<br>===================================================<br>
		<?php
			//建立資料夾
			mkdir("test");
			//刪除資料夾，裡面有檔案則不會刪除
			rmdir("test");
			//同目錄中將1.jpg複製成2.jpg
			copy("1.jpg","2.jpg");
			//刪除2.jpg
			unlink("2.jpg");
			//判斷檔案是否存在，存在就會傳回1，不存在就會傳回空白
			echo "<br>file_exists：";
			echo file_exists("9999.php");
			//判斷是檔案還是目錄，是目錄就會傳回1，否則傳空白
			echo "<br>is_dir：";
			echo is_dir("5.php");
			//傳回指定路徑的檔案名稱，不會判斷檔案是否存在，都會show出檔名
			echo "<br>basename：";
			echo basename("file:///Users/Download/test.txt");
			//傳回指定路徑的路徑名稱，不會判斷檔案是否存在
			echo "<br>dirname：";
			echo dirname("file:///Users/Download/test.txt");
			//列出當前資料夾的所有檔案名
			echo "<br>glob：";
			foreach(glob("*") as $key => $value) {
				echo $value."<br>";
			}
		?>



	</body>
</html>