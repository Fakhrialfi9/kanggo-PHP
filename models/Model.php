<?php
session_start();

class Model {
    private $datasetkaryawan;
    private $file = 'DataReport.json'; 

    public function __construct() {
        if (!isset($_SESSION['reports'])) {
            $_SESSION['reports'] = require 'DataReport.php';
        }
        $this->datasetkaryawan = &$_SESSION['reports']; 
    }

    public function getReports() {
        return $this->datasetkaryawan;
    }

    public function getReportById($id) {
        foreach ($this->datasetkaryawan as $data) {
            if ($data['id'] == $id) {
                return $data;
            }
        }
        return null;
    }

    public function addReport($data) {
        $newId = count($this->datasetkaryawan) + 1;
        $this->datasetkaryawan[] = [
            'id' => $newId,
            'nama' => $data['nama'],
            'posisi' => $data['posisi'],
            'usia' => $data['usia'],
            'tanggal_mulai' => $data['tanggal_mulai'],
            'gaji' => $data['gaji']
        ];
        $_SESSION['reports'] = $this->datasetkaryawan; 
    }

    public function updateReport($id, $data) {
        foreach ($this->datasetkaryawan as &$report) { 
            if ($report['id'] == $id) {
                $report['nama'] = $data['nama'];
                $report['posisi'] = $data['posisi'];
                $report['usia'] = $data['usia'];
                $report['tanggal_mulai'] = $data['tanggal_mulai'];
                $report['gaji'] = $data['gaji'];
                break;
            }
        }
        $_SESSION['reports'] = $this->datasetkaryawan; 
    }

    public function deleteReport($id) {
        foreach ($this->datasetkaryawan as $key => $report) { // Changed $data to $report
            if ($report['id'] == $id) {
                unset($this->datasetkaryawan[$key]);
                $this->datasetkaryawan = array_values($this->datasetkaryawan); 
                break;
            }
        }
        $_SESSION['reports'] = $this->datasetkaryawan; 
    }
}
?>
