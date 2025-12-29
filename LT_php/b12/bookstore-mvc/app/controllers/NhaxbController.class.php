<?php
// app/controllers/NhaxbController.class.php
class NhaxbController
{
    private $model;

    function __construct()
    {
        $this->model = new Nhaxb; // Khởi tạo model Nhaxb 
    }

    // Phương thức thêm mới 
    function add()
    {
        if (isset($_POST['manxb']) && isset($_POST['tennxb'])) {
            if (count($this->model->checkma($_POST['manxb'])) > 0) {
                echo "<script>alert('Ma NXB da ton tai');window.location='index.php?url=nhaxb/edit';</script>";
                return;
            } else
                $this->model->insert($_POST['manxb'], $_POST['tennxb']);
        }
        $this->redirect(); // Chuyển hướng về trang danh sách 
    }

    // Phương thức hiển thị View 
    protected function render($view, $data = [])
    {
        require_once APP . '/views/Nhaxb/' . $view . '.php'; // Đường dẫn đến file View 
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
        $data['action'] = "index.php?url=nhaxb/add"; // Mặc định là action thêm
        $data['isUpdate'] = false;

        if (isset($_GET['manxb'])) { // Nếu có mã NXB, đây là thao tác cập nhật 
            $data['action'] = "index.php?url=nhaxb/upd";
            $data['isUpdate'] = true;
            $data['row'] = $this->model->getById($_GET['manxb'])[0]; // Lấy dữ liệu NXB 
        }

        $this->render('edit', $data); // Hiển thị View 'edit' 
    }

    // Phương thức xóa 
    function del()
    {
        if (isset($_GET['manxb']))
            $this->model->delete($_GET['manxb']);
        $this->redirect();
    }

    // Phương thức cập nhật 
    function upd()
    {
        if (isset($_POST['manxb']) && isset($_POST['tennxb']))
            $this->model->update($_POST['manxb'], $_POST['tennxb']);
        $this->redirect();
    }

    // Phương thức chuyển hướng 
    private function redirect($url = 'index.php?url=nhaxb/index')
    {
        header('location:' . $url);
    }
}
