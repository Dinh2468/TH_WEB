<!DOCTYPE html>
<html lang="vi">

<head>
	<meta charset="UTF-8">
	<title>Lab5_2 - Form giữ giá trị</title>
</head>

<body>
	<fieldset>
		<legend>Form</legend>
		<form action="" method="post">
			Nhập tên:
			<input type="text" name="ten" value="<?php echo isset($_POST['ten']) ? htmlspecialchars($_POST['ten']) : ''; ?>"><br><br>

			Giới tính:
			<input type="radio" name="gt" value="1" <?php if (isset($_POST['gt']) && $_POST['gt'] == '1') echo 'checked'; ?>> Nam
			<input type="radio" name="gt" value="0" <?php if (isset($_POST['gt']) && $_POST['gt'] == '0') echo 'checked'; ?>> Nữ
			<br><br>

			Sở Thích:
			<input type="checkbox" name="st[]" value="tt" <?php if (isset($_POST['st']) && in_array('tt', $_POST['st'])) echo 'checked'; ?>> Thể Thao
			<input type="checkbox" name="st[]" value="dl" <?php if (isset($_POST['st']) && in_array('dl', $_POST['st'])) echo 'checked'; ?>> Du Lịch
			<input type="checkbox" name="st[]" value="game" <?php if (isset($_POST['st']) && in_array('game', $_POST['st'])) echo 'checked'; ?>> Game
			<br><br>

			<input type="submit" name="submit" value="Submit">
		</form>
	</fieldset>

	<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
		$ten = isset($_POST['ten']) ? htmlspecialchars($_POST['ten']) : "";
		$gt = isset($_POST['gt']) ? ($_POST['gt'] == '1' ? "Nam" : "Nữ") : "Chưa chọn";
		$st = isset($_POST['st']) ? $_POST['st'] : [];

		echo "<fieldset>";
		echo "<legend>Kết quả nhập</legend>";
		echo "<b>Tên:</b> $ten <br>";
		echo "<b>Giới tính:</b> $gt <br>";
		echo "<b>Sở thích:</b> " . (!empty($st) ? implode(", ", $st) : "Không chọn") . "<br>";
		echo "</fieldset>";
	}
	?>

</body>

</html>