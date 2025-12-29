<?
//print_r($_FILES);
if (isset($_FILES['f_img'])) {
    $file = $_FILES['f_img'];
    if ($file['error'] != 0) {
        echo "Error.";
        exit;
    }
    $src = $file['tmp_name'];
    $des = "images/" . $file['name'];
    if (move_uploaded_file($src, $des)) {
        echo "<img src='$des' width='900'>";
    } else
        echo "Upload failed!";
}
