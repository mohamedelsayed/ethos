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
    var $limit = 20;

    function index() {
        $limit = $this->limit;
        if ($this->Session->read('Request.limit') && is_numeric($this->Session->read('Request.limit'))) {
            if ($this->Session->read('Request.limit') > 0) {
                $limit = $this->Session->read('Request.limit');
            }
        }
        $this->Request->recursive = 0;
        $order = ['Request.application_number' => 'DESC', 'Request.id' => 'DESC'];
        $conditions = [];
        if (isset($this->data['Request']['title'])) {
            $conditions['Request.title LIKE'] = "%" . $this->data['Request']['title'] . "%";
        }
        if (isset($this->data['Request']['status'])) {
            if (isset($this->statusOptions[$this->data['Request']['status']])) {
                $conditions['Request.status'] = $this->data['Request']['status'];
            }
        }
        $this->paginate = array(
            'conditions' => $conditions,
            'order' => $order,
            'limit' => $limit,
        );
        $this->set('requests', $this->paginate());
        $this->set('titleLabel', $this->titleLabel);
        $this->set('statusOptions', $this->statusOptions);
        $this->set('limit', $limit);
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid application.', true));
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

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid application.', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Request->delete($id)) {
            $this->Session->setFlash(__('Application deleted.', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Application was not deleted.', true));
        $this->redirect(array('action' => 'index'));
    }

    function changeStatus($id = null, $status = 0) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid application.', true));
            $this->redirect(array('action' => 'index'));
        }
        $request = $this->Request->read(null, $id);
        if (!empty($request)) {
            $additional_information = '';
            $checklist = '';
            if ($status == 2) {
                $error = 1;
                $dataResubmit = $this->data;
                foreach ($dataResubmit['Request'] as $key => $value) {
                    if ($value == 1 && $key != 'additional_information') {
                        $error = 0;
                    }
                }
                if ($error == 1) {
                    $this->Session->setFlash(__('You must select at least one item from ckeckboxs.', true));
                    $this->redirect(array('action' => 'resubmit/' . $id));
                } else {
                    $message = '
                        <ul>';
                    foreach ($dataResubmit['Request'] as $key => $value) {
                        if ($value == 1) {
                            if ($key == 'child_photo') {
                                $message .= '<li>Child’s recent photo (passport size)</li>';
                            }
                            if ($key == 'child_birth_certificate') {
                                $message .= '<li>Child’s birth certificate (electronic)</li>';
                            }
                            if ($key == 'parents_ids') {
                                $message .= '<li>Parents IDs</li>';
                            }
                            if ($key == 'previous_school_report') {
                                $message .= '<li>Most recent school report</li>';
                            }
                        }
                        if ($key == 'additional_information') {
                            $additional_information = trim($value);
                        }
                    }
                    $message .= '</ul>';
                    $checklist = $message;
                }
            }
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
            $parentName1 = '';
            if (isset($dataIn['parent_informations1'])) {
                $parentName1 = $dataIn['parent_informations1'];
            }
            $parentName2 = '';
            if (isset($dataIn['parent_informations2'])) {
                $parentName2 = $dataIn['parent_informations2'];
            }
            $application_number = $request['Request']['application_number'];
            if ($this->Request->save($this->data)) {
                if ($status == 1) {
                    $messageIn = $this->getEmailTemplateBody('confirmation-accepted');
                    $this->Session->setFlash(__('Application has been accepted.', true));
                } elseif ($status == 3) {
                    $messageIn = $this->getEmailTemplateBody('confirmation-rejected');
                    $this->Session->setFlash(__('Application has been rejected.', true));
                } elseif ($status == 2) {
                    $messageIn = $this->getEmailTemplateBody('confirmation-resubmitted');
                    $this->Session->setFlash(__('Application has been resubmitted.', true));
                }
                if ($parentMail1 != '' && isset($messageIn) && $messageIn != '') {
                    $message = str_replace(array('{{name}}', '{{application_number}}', '{{checklist}}')
                            , array($parentName1, $application_number, $checklist), $messageIn);
                    if ($additional_information != '') {
                        $message .= '<br/>' . $additional_information;
                    }
                    $body = str_replace(array('{{mailsubject}}', '{{message}}'), array('', $message), $tpl);
                    $mailSent = $this->sendMail($parentMail1, $subject, $body, $from);
                }
                if ($parentMail2 != '' && isset($messageIn) && $messageIn != '') {
                    $message = str_replace(array('{{name}}', '{{application_number}}', '{{checklist}}')
                            , array($parentName2, $application_number, $checklist), $messageIn);
                    if ($additional_information != '') {
                        $message .= '<br/>' . $additional_information;
                    }
                    $body = str_replace(array('{{mailsubject}}', '{{message}}'), array('', $message), $tpl);
                    $mailSent = $this->sendMail($parentMail2, $subject, $body, $from);
                }
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The request could not be saved. Please, try again.', true));
            }
        } else {
            $this->Session->setFlash(__('Invalid application.', true));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function export($id = null) {
        $ids = [];
        if ($id) {
            $ids = [$id];
        }
        if (isset($_POST['selectItem'])) {
            if (!empty($_POST['selectItem'])) {
                $ids = array_values($_POST['selectItem']);
            }
        }
        $requests = [];
        if (!empty($ids)) {
            $requests = $this->Request->find('all', array(
                'conditions' => array('Request.id' => $ids),
                'order' => array('Request.id' => 'DESC'),)
            );
        }
        if (!empty($requests)) {
            $this->loadModel('Term');
            $terms = $this->Term->find('list');
            $this->loadModel('YearGroup');
            $yearGroups = $this->YearGroup->find('list');
            $data[] = [
                'Application Date',
                "Pupil's Name",
                'Date of Birth',
                'Academic Year Entry',
                'Year Group Applying to',
                'Current Year Group',
                'Gender',
                'Nationality',
                'Religion',
                'Bus',
                'Siblings at EIS',
                'Siblings at Rukan',
                'Sibling applying at EIS',
                'Previous School',
                "Mother's Name",
                "Mother's Mobile",
                "Mother's Email",
                "Mother's Qualifications",
                "Father's Name",
                "Father's Mobile",
                "Father's Email",
                "Father's Qualifications",
                "Marital Status",
                "Emergancy Contact 1",
                "Emergancy Contact 2",
            ];
            foreach ($requests as $key => $request) {
                $dataIn = unserialize($request['Request']['data']);
                $current_year_group_input = '';
                if (isset($yearGroups[$dataIn['current_year_group_input']])) {
                    $current_year_group_input = $yearGroups[$dataIn['current_year_group_input']];
                }
                $data[] = [
                    date('d-m-Y', strtotime($request['Request']['created'])),
                    $request['Request']['title'],
                    $dataIn['birth_date'],
                    $terms[$dataIn['academic_year_entry_input']],
                    $yearGroups[$dataIn['year_group_applying_to_input']],
                    $current_year_group_input,
                    $dataIn['gender_input'],
                    $dataIn['nationality'],
                    $dataIn['religion'],
                    $dataIn['require_bus'],
                    $dataIn['have_any_sibling_at_EIS'],
                    $dataIn['have_any_sibling_at_rukan'],
                    $dataIn['are_you_applying_for_any_siblings'],
                    $dataIn['previous_schools_nursery_1_1'],
                    $dataIn['parent_informations2'],
                    $dataIn['parent_informations22'],
                    $dataIn['parent_informations24'],
                    $dataIn['parent_informations8'],
                    $dataIn['parent_informations1'],
                    $dataIn['parent_informations21'],
                    $dataIn['parent_informations23'],
                    $dataIn['parent_informations7'],
                    $dataIn['parental_marital_status'],
                    $dataIn['emergency5'],
                    $dataIn['emergency6'],
                ];
            }
            $this->exportArrayToExcel($data);
        } else {
            $this->Session->setFlash(__('Invalid applications to export.', true));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function exportArrayToExcel(array $data, $data2 = []) {
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Applications');
        $letters = 'abcdefghijklmnopqrstuvwxyz';
        $i = 1;
        foreach ($data as $key => $data_in) {
            foreach ($data_in as $key_in => $value_in) {
                $sheet->setCellValue(strtoupper(substr($letters, $key_in, 1)) . $i, $value_in);
            }
            $i++;
        }
        if (!empty($data2)) {
            $sheet = $spreadsheet->createSheet(1);
            $i = 1;
            foreach ($data2 as $key => $data_in) {
                foreach ($data_in as $key_in => $value_in) {
                    $sheet->setCellValue(strtoupper(substr($letters, $key_in, 1)) . $i, $value_in);
                }
                $i++;
            }
            $sheet->setTitle('Applications');
        }
        $writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->setIncludeCharts(true);
        $exported_file_name_user = 'applications.xlsx';
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

    function changeLimit() {
        $limit = 0;
        if (isset($_POST['limit']) && is_numeric($_POST['limit'])) {
            if ($_POST['limit'] > 0) {
                $limit = $_POST['limit'];
            }
        }
        if ($limit > 0) {
            $request['Request']['limit'] = $limit;
            $this->Session->write($request);
            $this->Session->setFlash(__('Limit changed.', true));
        } else {
            $this->Session->setFlash(__('Invalid limit.', true));
        }
        $this->redirect(array('action' => 'index'));
    }

    public function resubmit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid application.', true));
            $this->redirect(array('action' => 'index'));
        }
        $request = $this->Request->read(null, $id);
        if (!empty($request)) {
            $this->set('request', $request);
        } else {
            $this->Session->setFlash(__('Invalid application.', true));
            $this->redirect(array('action' => 'index'));
        }
    }

}
