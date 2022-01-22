<?php

/**
 * @author Author "Mohamed Elsayed"
 * @author Author Email "me@mohamedelsayed.net"
 * @link http://www.mohamedelsayed.net
 * @copyright Copyright (c) 2018 Programming by "mohamedelsayed.net"
 */
require_once '../auth_controller.php';

class RequestsController extends AuthController
{

    var $name = 'Requests';
    var $uses = array('Request');
    var $titleLabel = "Child's Name";
    var $statusOptions = [
        0 => 'Pending',
        1 => 'Accepted',
        2 => 'Resubmitted',
        3 => 'Rejected'
    ];
    var $haveAnySibling = [
        'Yes' => 'Yes',
        'No' => 'No',
        'applying_this_year' => 'Applying this Year',
    ];
    var $limit = 20;

    function index()
    {
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

    function view($id = null)
    {
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
        $this->set('haveAnySibling', $this->haveAnySibling);
        $this->loadModel('Term');
        $terms = $this->Term->find('list');
        $this->set(compact('terms'));
        $this->loadModel('YearGroup');
        $yearGroups = $this->YearGroup->find('list');
        $this->set(compact('yearGroups'));
    }

    function delete($id = null)
    {
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

    function changeStatus($id = null, $status = 0)
    {
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
            //            $from = $cat['Cat']['to_email'];
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
                    $message = str_replace(
                        array('{{name}}', '{{application_number}}', '{{checklist}}'),
                        array($parentName1, $application_number, $checklist),
                        $messageIn
                    );
                    if ($additional_information != '') {
                        $message .= '<br/>' . $additional_information;
                    }
                    $body = str_replace(array('{{mailsubject}}', '{{message}}'), array('', $message), $tpl);
                    $mailSent = $this->sendMail($parentMail1, $subject, $body);
                }
                if ($parentMail2 != '' && isset($messageIn) && $messageIn != '') {
                    $message = str_replace(
                        array('{{name}}', '{{application_number}}', '{{checklist}}'),
                        array($parentName2, $application_number, $checklist),
                        $messageIn
                    );
                    if ($additional_information != '') {
                        $message .= '<br/>' . $additional_information;
                    }
                    $body = str_replace(array('{{mailsubject}}', '{{message}}'), array('', $message), $tpl);
                    $mailSent = $this->sendMail($parentMail2, $subject, $body);
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

    public function exportApplicationToExcel($id = null)
    {
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
            $requests = $this->Request->find(
                'all',
                array(
                    'conditions' => array('Request.id' => $ids),
                    'order' => array('Request.id' => 'DESC'),
                )
            );
        }
        if (!empty($requests)) {
            $this->loadModel('Term');
            $terms = $this->Term->find('list');
            $this->loadModel('YearGroup');
            $yearGroups = $this->YearGroup->find('list');
            $data[] = [
                //application info
                'Application Number',
                'Application Date',
                //tab1
                "Pupil's Name",
                "Pupil's ID number",
                'Date of Birth',
                'Academic Year Entry',
                'Year Group Applying to',
                'Current Year Group',
                'Gender',
                'Nationality',
                'Religion',
                'Language Spoken At Home',
                'Bus',
                'Will the pupil be exempted from the Egyptian Ministry exams',
                'Siblings at EIS',
                'If yes please write his/her name and year group',
                'Siblings at Rukan',
                'If yes please write his/her name and year group',
                'Sibling applying at EIS',
                'If yes, please give details',
                'How did you hear about us',
                'If other, please specify',
                //tab2
                'Previous School',
                'Years Attended',
                'Year Group/ Form / Grade',
                'Curriculum Followed (British, IB, American, National)',
                'Has the pupil ever skipped a year',
                'If yes, which year group, Please give details',
                'Has the pupil ever been asked to repeat a year',
                'If yes, which year group, Please give details',
                'Has the pupil ever applied to Ethos International School',
                'If yes, which year group, Please give details:	',
                //tab3
                //Father
                "Father's Name",
                "Father's Occupation",
                "Father's Employer",
                "Father's Qualifications",
                "Father's University",
                "Father's School",
                "Father's Nationality",
                "Father's ID/ Passport Number",
                "Father's Date of Birth",
                "Father's Address",
                "Father's Mobile Number",
                "Father's Email",
                //Mother
                "Mother's Name",
                "Mother's Occupation",
                "Mother's Employer",
                "Mother's Qualifications",
                "Mother's University",
                "Mother's School",
                "Mother's Nationality",
                "Mother's ID/ Passport Number",
                "Mother's Date of Birth",
                "Mother's Address",
                "Mother's Mobile Number",
                "Mother's Email",
                //Marital
                "Marital Status",
                "If divorced, custody with",
                //tab4
                "Emergancy Name 1",
                "Emergancy Relationship to Pupil 1",
                "Emergancy Mobile Number 1",
                "Emergancy Name 2",
                "Emergancy Relationship to Pupil 2",
                "Emergancy Mobile Number 2",
                //tab5
                'Attention Deficit Disorder / Hyperactive',
                'Speech & Language Disorder	',
                'Developmental Delay',
                'Behavioural Issues',
                'Has your child been diagnosed/ assessed for any learning disabilities / challenges',
                'Other/s (please specify)',
                'Medical History',
                //application status
                "Online Applications Status",
            ];
            foreach ($requests as $key => $request) {
                $dataIn = unserialize($request['Request']['data']);
                $current_year_group_input = '';
                if (isset($yearGroups[$dataIn['current_year_group_input']])) {
                    $current_year_group_input = $yearGroups[$dataIn['current_year_group_input']];
                }
                if (isset($this->statusOptions[$request['Request']['status']])) {
                    $statusIn = $this->statusOptions[$request['Request']['status']];
                } else {
                    $statusIn = '---';
                }
                $how_did_you_hear_about_us = $GLOBALS['how_did_you_hear_about_us'];
                $data[] = [
                    //application info
                    $request['Request']['application_number'],
                    date('d-m-Y', strtotime($request['Request']['created'])),
                    //tab1
                    $request['Request']['title'],
                    $dataIn['child_id_number'],
                    $dataIn['birth_date'],
                    $terms[$dataIn['academic_year_entry_input']],
                    $yearGroups[$dataIn['year_group_applying_to_input']],
                    $current_year_group_input,
                    $dataIn['gender_input'],
                    $dataIn['nationality'],
                    $dataIn['religion'],
                    $dataIn['language'],
                    $dataIn['require_bus'],
                    $dataIn['egyptian_ministry_exams'],
                    $this->haveAnySibling[$dataIn['have_any_sibling_at_EIS']],
                    $dataIn['have_any_sibling_at_EIS_pupil'],
                    $this->haveAnySibling[$dataIn['have_any_sibling_at_rukan']],
                    $dataIn['have_any_sibling_at_rukan_pupil'],
                    $dataIn['are_you_applying_for_any_siblings'],
                    $dataIn['are_you_applying_for_any_siblings_details'],
                    $how_did_you_hear_about_us[$dataIn['how_did_you_hear_about_us']],
                    $dataIn['how_did_you_hear_about_us_other'],
                    //tab2
                    $dataIn['previous_schools_nursery_1_1'],
                    $dataIn['previous_schools_nursery_1_2'],
                    $dataIn['previous_schools_nursery_1_3'],
                    $dataIn['previous_schools_nursery_1_4'],
                    $dataIn['has_the_pupil_ever_skipped_year'],
                    $dataIn['has_the_pupil_ever_skipped_year_details'],
                    $dataIn['has_the_pupil_ever_been_asked_to_repeat_year'],
                    $dataIn['has_the_pupil_ever_been_asked_to_repeat_year_details'],
                    $dataIn['has_the_pupil_ever_applied_to_EIS'],
                    $dataIn['has_the_pupil_ever_applied_to_EIS_details'],
                    //tab3
                    //Father
                    $dataIn['parent_informations1'],
                    $dataIn['parent_informations3'],
                    $dataIn['parent_informations5'],
                    $dataIn['parent_informations7'],
                    $dataIn['parent_informations9'],
                    $dataIn['parent_informations11'],
                    $dataIn['parent_informations13'],
                    $dataIn['parent_informations15'],
                    $dataIn['parent_informations17'],
                    $dataIn['parent_informations19'],
                    $dataIn['parent_informations21'],
                    $dataIn['parent_informations23'],
                    //Mother
                    $dataIn['parent_informations2'],
                    $dataIn['parent_informations4'],
                    $dataIn['parent_informations6'],
                    $dataIn['parent_informations8'],
                    $dataIn['parent_informations10'],
                    $dataIn['parent_informations12'],
                    $dataIn['parent_informations14'],
                    $dataIn['parent_informations16'],
                    $dataIn['parent_informations18'],
                    $dataIn['parent_informations20'],
                    $dataIn['parent_informations22'],
                    $dataIn['parent_informations24'],
                    //Marital
                    $dataIn['parental_marital_status'],
                    $dataIn['parental_marital_status_details'],
                    //tab4
                    $dataIn['emergency1'],
                    $dataIn['emergency3'],
                    $dataIn['emergency5'],
                    $dataIn['emergency2'],
                    $dataIn['emergency4'],
                    $dataIn['emergency6'],
                    //tab5
                    $dataIn['developmental_history0'] ? "Yes" : "No",
                    $dataIn['developmental_history1'] ? "Yes" : "No",
                    $dataIn['developmental_history2'] ? "Yes" : "No",
                    $dataIn['developmental_history3'] ? "Yes" : "No",
                    $dataIn['developmental_history4'] ? "Yes" : "No",
                    $dataIn['developmental_history5'],
                    $dataIn['medical_history'],
                    //application status
                    $statusIn,
                ];
            }
            //            pr($data);
            //            exit;
            $this->exportArrayToExcel($data);
        } else {
            $this->Session->setFlash(__('Invalid applications to export.', true));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function exportArrayToExcel(array $data = [])
    {
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Applications');
        $sheet->fromArray(
            $data,  // The data to set
            NULL,        // Array values with this value will not be set
            'A1'         // Top left coordinate of the worksheet range where
            //    we want to set these values (default is A1)
        );
        // $letters = 'abcdefghijklmnopqrstuvwxyzaaabacadae';
        // $i = 1;
        // foreach ($data as $key => $data_in) {
        //     foreach ($data_in as $key_in => $value_in) {
        //         $step = 1;
        //         if ($key_in > 25) {
        //             $step = 2;
        //         }
        //         $sheet->setCellValue(strtoupper(substr($letters, $key_in, $step)) . $i, $value_in);
        //     }
        //     $i++;
        // }
        // if (!empty($data2)) {
        //     $sheet = $spreadsheet->createSheet(1);
        //     $i = 1;
        //     foreach ($data2 as $key => $data_in) {
        //         foreach ($data_in as $key_in => $value_in) {
        //             $step = 1;
        //             if ($key_in > 25) {
        //                 $step = 2;
        //             }
        //             $sheet->setCellValue(strtoupper(substr($letters, $key_in, $step)) . $i, $value_in);
        //         }
        //         $i++;
        //     }
        //     $sheet->setTitle('Applications');
        // }
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

    function changeLimit()
    {
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

    public function resubmit($id = null)
    {
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

    public function exportApplicationToPDF($id = null, $isHtml = null)
    {
        $haveAnySibling = $this->haveAnySibling;
        if (!$id) {
            $this->Session->setFlash(__('Invalid application.', true));
            $this->redirect(array('action' => 'index'));
        }
        $request = $this->Request->read(null, $id);
        if (!empty($request)) {
            date_default_timezone_set('Africa/Cairo');
            $application_number = $request['Request']['application_number'];
            $this->loadModel('Term');
            $terms = $this->Term->find('list');
            $this->loadModel('YearGroup');
            $yearGroups = $this->YearGroup->find('list');
            $base_url = $this->getBaseUrl();
            $html = '';
            $options = new \Dompdf\Options();
            $options->setIsRemoteEnabled(true);
            $tmpDir= ROOT . DS . 'app' . DS . 'tmp' . DS . 'pdf';
            $options->setTempDir($tmpDir);
            $options->set('debugKeepTemp', TRUE);
            $options->setIsHtml5ParserEnabled(true);
            $dompdf = new Dompdf\Dompdf();
            $dompdf->setOptions($options);
            $context = stream_context_create([
                'ssl' => [
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                    'allow_self_signed' => TRUE
                ]
            ]);
            $dompdf->setHttpContext($context);
            // $style = new \Dompdf\Css\Stylesheet($dompdf);
            // $cssFile = $base_url . '/css/backend/admissions_pdf.css';
            $cssFile = ROOT . DS . APP_DIR . DS . 'webroot' . DS . 'css' . DS . 'backend' . DS . 'admissions_pdf.css';
            //   $cssContent = file_get_contents($cssFile);
            $cssContent = $this->getAdmissionsCss();
            // $style->load_css_file($cssFile);
            // $dompdf->setCss($style);
            $html .= '<html>
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                    </head><style>' . $cssContent 
                    .'</style>
                <body>';
            $data = $request['Request']['data'];
            $dataIn = unserialize($data);
            $imgpath = $base_url . '/app/webroot/img/backend/';
            $userImage = $base_url . '/' . $dataIn['filesData']['child_photo'];
            $html .= '<img style="float:right; position:absolute;" height="150" src="' . $userImage . '" />';
            $html .= '<img width="200" style="margin-top:20px;" src="' . $imgpath . 'admissionLogo.jpg" />';
            $html .= '<h3 class="section_title">1. Pupil’s Information</h3>';
            $path = ROOT . DS . APP_DIR . DS . 'views' . DS . 'requests' . DS . 'tab1.ctp';
            $html .= $this->render_php_file_for_pdf($path, $request, $this->titleLabel, $terms, $yearGroups, $haveAnySibling);
            $html .= '<h3 class="section_title">2. Previous School(s) / Nursery</h3>';
            $path = ROOT . DS . APP_DIR . DS . 'views' . DS . 'requests' . DS . 'tab2.ctp';
            $html .= $this->render_php_file_for_pdf($path, $request, $this->titleLabel, $terms, $yearGroups);
            $html .= '<h3 class="section_title">3. Parents Information</h3>';
            $path = ROOT . DS . APP_DIR . DS . 'views' . DS . 'requests' . DS . 'tab3.ctp';
            $html .= $this->render_php_file_for_pdf($path, $request, $this->titleLabel, $terms, $yearGroups);
            $html .= '<h3 class="section_title">4. Emergency Information</h3>';
            $path = ROOT . DS . APP_DIR . DS . 'views' . DS . 'requests' . DS . 'tab4.ctp';
            $html .= $this->render_php_file_for_pdf($path, $request, $this->titleLabel, $terms, $yearGroups);
            $html .= '<h3 class="section_title">5. Developmental History</h3>';
            $path = ROOT . DS . APP_DIR . DS . 'views' . DS . 'requests' . DS . 'tab5.ctp';
            $html .= $this->render_php_file_for_pdf($path, $request, $this->titleLabel, $terms, $yearGroups);
            $html .= '</body>'
                . '</html>';
            if ($isHtml) {
                $this->autoRender = false;
                header('Content-Type: application/json');
                header("HTTP/1.1 " . "200" . " " . 'OK');
                $dataout['html']=$html;
                echo json_encode($dataout);
                exit;
            }
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            ob_end_clean();
            $dompdf->stream($application_number . '.pdf', ['Attachment' => false]);
            exit;
        } else {
            $this->Session->setFlash(__('Invalid application.', true));
            $this->redirect(array('action' => 'index'));
        }
    }
    public function getAdmissionsCss()
    {
        $cssContent = '.altrow {
        background: #f4f4f4;
    }
    .leftDiv{
        width: 28%;
        overflow-wrap: break-word;
        word-wrap: break-word;
        float: left;
        font-weight: bold;
        padding-left: 1%;
        padding-left: 1%;
    }
    .rightDiv{
        width: 70%;
        float: left;
    }
    .rightDiv img{
        max-width: 100% !important;
    }
    .oneLine{
        clear: both;
        width: 99%;
        margin: 1px;
        padding: 4px;
        line-height: 25px;
    }
    ul.tabs li{
        width: 20%;
    }
    #tapss{
        float: left;
    }
    ul.tabs a{
        height: 40px;
        font-size: 13px;
        text-align: center;
    }
    .download_image{
        width: 100%;
        float: left;
    }
    
    tr, tbody, table, td {
        border: 0 none;
    }
    table, td {
        border: 1px solid #dddddd;
    }
    table{
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
    }
    table tr:first-child td{
        border-bottom: 5px solid #ffffff;
        border-right: 5px solid #ffffff;
        color: #ffffff;
        padding: 1% 0;
        text-decoration: none;
    }
    .admissions table tr td {
        font-size: 16px !important;
    }
    .td_center {
        text-align: center;
    }
    table tr td {
        border-bottom: 5px solid #ffffff;
        border-right: 5px solid #ffffff;
        color: #414141;
        font-size: 17px;
        padding: 5px 0;
        text-align: center;
        text-decoration: none;
    }
    .section_title{
        text-align: center;
        clear: both;
    }';
        return $cssContent;
    }
}
