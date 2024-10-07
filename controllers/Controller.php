<?php
include_once 'models/Model.php';

class Controller {
    private $model;

    public function __construct() {
        $this->model = new Model();
    }

    public function index() {
        $datasetkaryawan = $this->model->getReports();
        include 'views/index.php';
    }

    public function add() {
        include 'views/form.php';
    }

    public function edit($id) {
        $data = $this->model->getReportById($id);
        include 'views/form.php';
    }

    public function delete($id) {
        if ($id !== null) {
            $this->model->deleteReport($id);
            $_SESSION['flash_message'] = "Data deleted successfully!";
        }
        header('Location: index.php');
        exit();
    }

    public function save($data) {
        try {
            if (!empty($data['id'])) {
                $this->model->updateReport($data['id'], $data);
                $_SESSION['flash_message'] = "Data update successfully!";
            } else {
                $this->model->addReport($data);
                $_SESSION['flash_message'] = "Add data successfully!";
            }
            header('Location: index.php');
            exit();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
