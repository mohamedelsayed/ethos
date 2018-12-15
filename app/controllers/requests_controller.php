<?php

/**
 * @author Author "Mohamed Elsayed"
 * @author Author Email "me@mohamedelsayed.net"
 * @link http://www.mohamedelsayed.net
 * @copyright Copyright (c) 2018 Programming by "mohamedelsayed.net"
 */
require_once '../auth_controller.php';

class RequestsController extends AuthController {

    var $name = 'Requests';
    var $uses = array('Request');
    var $titleLabel = "Child's Name";
    var $statusOptions = [
        0 => 'Pending',
        1 => 'Accepted',
        2 => 'Resubmitted',
        3 => 'Rejected'
    ];

    //use upload component.
//    var $components = array('Upload');

    function index() {
        $this->Request->recursive = 0;
        $order = ['Request.application_number' => 'DESC', 'Request.id' => 'DESC'];
        if (isset($this->data['Request']['title'])) {
            $this->paginate = array(
                'conditions' => array('Request.title LIKE' => "%" . $this->data['Request']['title'] . "%"),
                'order' => $order,
            );
        } else {
            $this->paginate = array(
                'order' => $order,
            );
        }
        $this->set('requests', $this->paginate());
        $this->set('titleLabel', $this->titleLabel);
        $this->set('statusOptions', $this->statusOptions);
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid application', true));
            $this->redirect(array('action' => 'index'));
        }
        $request = $this->Request->read(null, $id);
        $data = $request['Request']['data'];
        $request['Request']['data'] = unserialize($data);
//        pr($request);
        $this->set('request', $request);
        $this->set('titleLabel', $this->titleLabel);
        $this->set('statusOptions', $this->statusOptions);
        $this->loadModel('Term');
        $terms = $this->Term->find('list');
        $this->set(compact('terms'));
        $this->loadModel('YearGroup');
        $yearGroups = $this->YearGroup->find('list');
        $this->set(compact('yearGroups'));
    }

    function changeStatus($id = null, $status = 0) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid application', true));
            $this->redirect(array('action' => 'index'));
        }
        $request = $this->Request->read(null, $id);
        if (!empty($request)) {
            $this->Request->id = $id;
            $this->data['Request']['status'] = $status;
            $admissionCatId = 23;
            $this->loadModel('Cat');
            $cat = $this->Cat->read(null, $admissionCatId);
            $from = $cat['Cat']['to_email'];
            $this->loadModel('Setting');
            $settings = $this->Setting->read(null, 1);
            $siteTitle = $settings['Setting']['title'];
            $subject = $cat['Cat']['title'] . ' "' . $siteTitle . '"';
            $email_tpl_path = ROOT . DS . APP_DIR . DS . 'views' . DS . 'elements' . DS . 'email' . DS . 'admissions' . DS;
            $tpl = file_get_contents($email_tpl_path . 'request.ctp');
            $dataIn = unserialize($request['Request']['data']);
            $parentMail1 = '';
            if (isset($dataIn['parent_informations23'])) {
                $parentMail1 = $dataIn['parent_informations23'];
            }
            $parentMail2 = '';
            if (isset($dataIn['parent_informations24'])) {
                $parentMail2 = $dataIn['parent_informations24'];
            }
            $application_number = $request['Request']['application_number'];
            if ($this->Request->save($this->data)) {
                if ($status == 1) {
                    $message = 'Your application ' . $application_number . ' has been accepted.';
                    $body = str_replace(array('{{mailsubject}}', '{{message}}'), array($subject, $message), $tpl);
                    $this->Session->setFlash(__('Application has been accepted.', true));
                } elseif ($status == 3) {
                    $message = 'Your application ' . $application_number . ' has been rejected.';
                    $body = str_replace(array('{{mailsubject}}', '{{message}}'), array($subject, $message), $tpl);
                    $this->Session->setFlash(__('Application has been rejected.', true));
                } elseif ($status == 2) {
                    $message = 'Your application ' . $application_number . ' has been resubmitted.';
                    $body = str_replace(array('{{mailsubject}}', '{{message}}'), array($subject, $message), $tpl);
                    $this->Session->setFlash(__('Application has been resubmitted.', true));
                }
                if ($parentMail1 != '' && isset($message) && $message != '') {
                    $mailSent = $this->sendMail($parentMail1, $subject, $body, $from);
                }
                if ($parentMail2 != '') {
                    $mailSent = $this->sendMail($parentMail2, $subject, $body, $from);
                }
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The request could not be saved. Please, try again.', true));
            }
        } else {
            $this->Session->setFlash(__('Invalid application', true));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function export() {
        $ids = [32, 31];
        $requests = $this->Request->find(
                'all', array(
            'conditions' => array('Request.id' => $ids),
            'order' => array('Request.id' => 'DESC'),
                )
        );
        $data[] = ['Application number', $this->titleLabel, 'Date of Birth'];
        if (!empty($requests)) {
            foreach ($requests as $key => $request) {
                $dataIn = unserialize($request['Request']['data']);
                $data[] = [$request['Request']['application_number'], $request['Request']['title'], $dataIn['birth_date']];
            }
        }
        $data2[] = ['Application number2', $this->titleLabel, 'Date of Birth2'];
        if (!empty($requests)) {
            foreach ($requests as $key => $request) {
                $dataIn = unserialize($request['Request']['data']);
                $data2[] = [$request['Request']['application_number'], $request['Request']['title'], $dataIn['birth_date']];
            }
        }
        $this->exportArrayToExcel($data, $data2);
    }

    public function exportArrayToExcel(array $data, $data2 = []) {
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Translation');
        $letters = 'abcdefghijklmnopqrstuvwxyz';
        $i = 1;
        foreach ($data as $key => $data_in) {
            foreach ($data_in as $key_in => $value_in) {
                $sheet->setCellValue(strtoupper(substr($letters, $key_in, 1)) . $i, $value_in);
            }
            $i++;
        }
        $sheet = $spreadsheet->createSheet(1);
        $i = 1;
        foreach ($data2 as $key => $data_in) {
            foreach ($data_in as $key_in => $value_in) {
                $sheet->setCellValue(strtoupper(substr($letters, $key_in, 1)) . $i, $value_in);
            }
            $i++;
        }
        $sheet->setTitle('second');
        $writer = new PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
        $writer->setIncludeCharts(true);
        $exported_file_name_user = 'applications.xls';
        $upload_dir = ROOT . DS . APP_DIR . DS . 'webroot' . DS . 'files' . DS . 'admissions';
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777);
        }
        $current_year = date('Y');
        $current_month = date('m');
        $dir_name_with_year = $upload_dir . DS . $current_year;
        if (!file_exists($dir_name_with_year)) {
            mkdir($dir_name_with_year, 0777);
        }
        $dir_name_with_month = $upload_dir . DS . $current_year . DS . $current_month;
        if (!file_exists($dir_name_with_month)) {
            mkdir($dir_name_with_month, 0777);
        }
        $final_upload_dir = $upload_dir . DS . $current_year . DS . $current_month . DS;
        $exported_file = $final_upload_dir . DS . $exported_file_name_user;
        $writer->save($exported_file);
        $file = $exported_file;
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . $exported_file_name_user);
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            unlink($exported_file);
            exit;
        }
    }

}
