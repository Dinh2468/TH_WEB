<h2>Đăng ký thành viên</h2>
<form action="data.php" method="post" enctype="multipart/form-data">
    <label>Tên đăng nhập (*):</label>
    <input type="text" name="username"><br><br>

    <label>Mật khẩu (*):</label>
    <input type="password" name="password"><br><br>

    <label>Nhập lại mật khẩu (*):</label>
    <input type="password" name="repassword"><br><br>

    <label>Giới tính (*):</label>
    <input type="radio" name="gender" value="Nam" check> Nam
    <input type="radio" name="gender" value="Nữ"> Nữ<br><br>

    <label>Sở thích:</label><br>
    <input type="checkbox" name="hobbies[]" value="Đọc sách"> Đọc sách
    <input type="checkbox" name="hobbies[]" value="Du lịch"> Du lịch
    <input type="checkbox" name="hobbies[]" value="Nghe nhạc"> Nghe nhạc
    <input type="checkbox" name="hobbies[]" value="Thể thao"> Thể thao<br><br>

    <label>Hình ảnh (tùy chọn):</label>
    <input type="file" name="image"><br><br>

    <label>Tỉnh (*):</label>
    <select name="province">
        <option value="chon">--Chọn tỉnh--</option>
        <option value="Hà Nội">Hà Nội</option>
        <option value="TP.HCM">TP.HCM</option>
        <option value="Đà Nẵng">Đà Nẵng</option>
        <option value="Cần Thơ">Cần Thơ</option>
    </select><br><br>

    <input type="submit" value="Đăng ký">
    <input type="reset" value="Làm lại">
</form>