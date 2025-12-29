<?php
$newsObj = new News();
$ac = Utils::getIndex("ac", "show");

// --- XEM DANH SÁCH ---
if ($ac == "show") {
    include "show.php";
}

// --- FORM THÊM / SỬA ---
if ($ac == "add" || $ac == "edit") {
    include "edit.php";
}

// --- XỬ LÝ LƯU (THÊM MỚI) ---
if ($ac == "saveAdd") {
    $title = Utils::postIndex("title");
    $short = Utils::postIndex("short_content");
    $content = isset($_POST['content']) ? $_POST['content'] : ''; // Lấy nội dung HTML
    $hot = isset($_POST['hot']) ? 1 : 0;

    // Xử lý upload ảnh
    $imgName = "";
    if (isset($_FILES['img']) && $_FILES['img']['name'] != "") {
        $imgName = time() . "_" . $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], "../images/news/" . $imgName);
    }

    $newsObj->add($title, $short, $content, $imgName, $hot);
    echo "<script>alert('Thêm tin thành công!'); window.location='index.php?mod=news';</script>";
}

// --- XỬ LÝ LƯU (SỬA) ---
if ($ac == "saveEdit") {
    $id = Utils::postIndex("id");
    $title = Utils::postIndex("title");
    $short = Utils::postIndex("short_content");
    $content = isset($_POST['content']) ? $_POST['content'] : '';
    $hot = isset($_POST['hot']) ? 1 : 0;

    // Xử lý ảnh
    $imgName = ""; // Mặc định rỗng (giữ ảnh cũ)
    if (isset($_FILES['img']) && $_FILES['img']['name'] != "") {
        $imgName = time() . "_" . $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], "../images/news/" . $imgName);
    }

    $newsObj->update($id, $title, $short, $content, $imgName, $hot);
    echo "<script>alert('Cập nhật thành công!'); window.location='index.php?mod=news';</script>";
}

// --- XÓA ---
if ($ac == "delete") {
    $newsObj->delete(Utils::getIndex("id"));
    echo "<script>window.location='index.php?mod=news';</script>";
}
