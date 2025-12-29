<?php
// app/controllers/loaiController.class.php
class LoaiController
{
    private $model;

    function __construct()
    {
        $this->model = new Loai; // Khởi tạo model loai 
    }

    // Phương thức thêm mới 
    function add()
    {
        if (isset($_POST['maloai']) && isset($_POST['tenloai'])) {
            if (count($this->model->checkma($_POST['maloai'])) > 0) {
                echo "<script>alert('Ma loai da ton tai');window.location='index.php?url=loai/edit';</script>";
                return;
            } else
                $this->model->insert($_POST['maloai'], $_POST['tenloai']);
        }
        $this->redirect(); // Chuyển hướng về trang danh sách 
    }

    // Phương thức hiển thị View 
    protected function render($view, $data = [])
    {
        require_once APP . '/views/loai/' . $view . '.php'; // Đường dẫn đến file View 
    }

    // Phương thức mặc định (hiển thị danh sách) 
    function index()
    {
        $data = $this->model->getAll(); // Lấy tất cả dữ liệu 
        $this->render('list', $data); // Truyền dữ liệu cho View 'list'
    }

    // Phương thức chỉnh sửa/tạo mới 55]
    function edit()
    {
        $data['action'] = "index.php?url=loai/add"; // Mặc định là action thêm
        $data['isUpdate'] = false;

        if (isset($_GET['maloai'])) { // Nếu có mã NXB, đây là thao tác cập nhật 
            $data['action'] = "index.php?url=loai/upd";
            $data['isUpdate'] = true;
            $data['row'] = $this->model->getById($_GET['maloai'])[0]; // Lấy dữ liệu NXB 
        }

        $this->render('edit', $data); // Hiển thị View 'edit' 
    }

    // Phương thức xóa 
    function del()
    {
        if (isset($_GET['maloai']))
            $this->model->delete($_GET['maloai']);
        $this->redirect();
    }

    // Phương thức cập nhật 
    function upd()
    {
        if (isset($_POST['maloai']) && isset($_POST['tenloai']))
            $this->model->update($_POST['maloai'], $_POST['tenloai']);
        $this->redirect();
    }

    // Phương thức chuyển hướng 
    private function redirect($url = 'index.php?url=loai/index')
    {
        header('location:' . $url);
    }
}
