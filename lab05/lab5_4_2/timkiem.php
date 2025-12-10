<h2>Tìm kiếm thông tin sản phẩm</h2>
<form action="ketqua.php" method="get">

    Tên sản phẩm:
    <input type="text" name="tensp"><br><br>

    Cách tìm:
    <input type="radio" name="cachtim" value="gandung" checked> Gần đúng
    <input type="radio" name="cachtim" value="chinhxac"> Chính xác
    <br><br>

    Loại sản phẩm:
    <select name="loai">
        <option value="tatca">Tất cả</option>
        <option value="loai1">Loại 1</option>
        <option value="loai2">Loại 2</option>
        <option value="loai3">Loại 3</option>
    </select>
    <br><br>

    <input type="submit" value="Tìm kiếm">
</form>