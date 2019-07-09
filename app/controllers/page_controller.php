<?php

/**
 * @author Author "Mohamed Elsayed"
 * @author Author Email "me@mohamedelsayed.net"
 * @link http://www.mohamedelsayed.net
 * @copyright Copyright (c) 2018 Programming by "mohamedelsayed.net"
 */
class PageController extends AppController {

    var $name = 'Page';
    var $uses = null;
    var $components = array('Email', 'Upload');

    function index() {
        $this->redirect(array('controller' => '/'));
    }

    function view($cat_id) {
        $this->redirect(array('controller' => '/'));
    }

    function show($cat_id, $childid = 0) {
        $base_url = $this->getBaseUrl();
        $tree = array();
        $image = '';
        $this->loadModel('Cat');
        $parent_cat = $this->Cat->find('first', array(
            'conditions' => array('Cat.approved' => 1, 'Cat.id' => $cat_id),
            'order' => array('Cat.weight' => 'ASC', 'Cat.id' => 'DESC')
                )
        );
        if (isset($parent_cat['ChildCat']) && $childid == 0) {
            if (!empty($parent_cat['ChildCat'])) {
                if (isset($parent_cat['ChildCat'][0]['id'])) {
                    $childCat_0_id = $parent_cat['ChildCat'][0]['id'];
                    $in_url = $base_url . '/page/show/' . $cat_id . '/' . $childCat_0_id;
                    if ($parent_cat['ChildCat'][0]['has_url'] == 1) {
                        if (strpos($parent_cat['ChildCat'][0]['url'], 'http') !== FALSE) {
                            $in_url = $parent_cat['ChildCat'][0]['url'];
                        } else {
                            $in_url = $base_url . $parent_cat['ChildCat'][0]['url'];
                        }
                    }
                    $this->redirect($in_url);
                }
            }
        }
        //$this->set('parent_cat' , $parent_cat);
        $parent_title = $title = $parent_cat['Cat']['title'];
        $meta_keywords = $parent_cat['Cat']['meta_keywords'];
        $meta_description = $parent_cat['Cat']['meta_description'];
        if (isset($parent_cat['Cat']['image'])) {
            if (trim($parent_cat['Cat']['image']) != '') {
                $this->mainSmartResizeImage($parent_cat['Cat']['image']);
                $image = $base_url . '/img/upload/' . $parent_cat['Cat']['image'];
            }
        }
        if ($childid != 0 && is_numeric($childid)) {
            $child_cat = $this->Cat->find(
                    'first', array(
                'conditions' => array('Cat.approved' => 1, 'Cat.id' => $childid),
                'order' => array('Cat.weight' => 'ASC', 'Cat.id' => 'DESC')
                    )
            );
            //$this->set('child_cat' , $child_cat);
            $title = $child_cat['Cat']['title'];
            $meta_keywords = $child_cat['Cat']['meta_keywords'];
            $meta_description = $child_cat['Cat']['meta_description'];
            if (isset($child_cat['Cat']['image'])) {
                if (trim($child_cat['Cat']['image']) != '') {
                    $this->mainSmartResizeImage($child_cat['Cat']['image']);
                    $image = $base_url . '/img/upload/' . $child_cat['Cat']['image'];
                }
            }
            if ($childid == 14) {
                $this->set('mission_vision_values', 1);
                $this->loadModel('Value');
                $values = $this->Value->find(
                        'all', array(
                    'conditions' => array('Value.approved' => 1),
                    'order' => array('Value.weight' => 'ASC', 'Value.id' => 'DESC'),
                        //'limit' => 4
                        )
                );
                $this->set('values_data', $values);
            }
            if ($childid == 16) {
                $this->set('testimonials', 1);
                $this->loadModel('Testimonial');
                $testimonials = $this->Testimonial->find(
                        'all', array(
                    'conditions' => array('Testimonial.approved' => 1),
                    'order' => array('Testimonial.weight' => 'ASC', 'Testimonial.id' => 'DESC'),
                        //'limit' => 4
                        )
                );
                $this->set('testimonials_data', $testimonials);
            }
            if ($childid == 19) {
                $this->set('whoiswho', 1);
                $this->loadModel('TeamMember');
                $members = $this->TeamMember->find(
                        'all', array(
                    'conditions' => array('TeamMember.approved' => 1),
                    'order' => array('TeamMember.weight' => 'ASC', 'TeamMember.id' => 'DESC'),
                        //'limit' => 4
                        )
                );
                $this->set('members', $members);
            }
            if ($childid == 23) {
                $this->set('admissions', 1);
                $this->loadModel('Term');
                $terms = $this->Term->find(
                        'all', array(
                    'conditions' => array('Term.approved' => 1),
                    'order' => array('Term.weight' => 'ASC', 'Term.id' => 'DESC'),
                        )
                );
                $this->set('terms', $terms);
                $this->loadModel('YearGroup');
                $yearGroups = $this->YearGroup->find(
                        'all', array(
                    'conditions' => array('YearGroup.approved' => 1),
                    'order' => array('YearGroup.weight' => 'ASC', 'YearGroup.id' => 'DESC'),
                        )
                );
                $this->set('yearGroups', $yearGroups);
                $this->loadModel('Disclaimer');
                $disclaimer = $this->Disclaimer->find('first', [
                    'conditions' => [
                        'Disclaimer.id' => 1,
                    ]]
                );
                $disclaimerIn = [];
                if (isset($disclaimer['Disclaimer'])) {
                    $disclaimerIn = $disclaimer['Disclaimer'];
                }
                $this->set('disclaimer', $disclaimerIn);
            }
        }
        $this->set('title_for_layout', strip_tags($title));
        $this->set(
                array(
                    'metaKeywords' => $meta_keywords,
                    'metaDescription' => $meta_description,
                )
        );
        $this->set('selected', strtolower(str_replace(' ', '', $parent_title)));
        if (isset($parent_cat) && !empty($parent_cat)) {
            $url = '';
            if (isset($child_cat) && !empty($child_cat)) {
                $url = '';
            }
            $tree[] = array('url' => '/page/show/' . $parent_cat['Cat']['id'], 'str' => $parent_cat['Cat']['title']);
        }
        if (isset($child_cat) && !empty($child_cat)) {
            $tree[] = array('url' => '', 'str' => $child_cat['Cat']['title']);
        }
        $this->set('tree', $tree);
        $this->set('title', $parent_title);
        $body = '';
        if (isset($child_cat) && !empty($child_cat)) {
            $body = $child_cat['Cat']['body'];
        } elseif (isset($parent_cat) && !empty($parent_cat)) {
            $body = $parent_cat['Cat']['body'];
        }
        $pdf_file = '';
        $pdf_name = '';
        if (isset($child_cat['Cat']['pdf_file'])) {
            if (trim($child_cat['Cat']['pdf_file']) != '') {
                $pdf_file = $base_url . "/app/webroot/files/upload/" . $child_cat['Cat']['pdf_file'];
                $pdf_name = str_replace('.pdf', '', $child_cat['Cat']['pdf_file']);
                $pdf_name = substr($pdf_name, 0, strrpos($pdf_name, "_"));
                $pdf_name = 'Click here for ' . str_replace('_', ' ', $pdf_name);
            }
        }
        $body = $this->linkify_mail($body);
        $this->set('body', $body);
        $this->set('image', $image);
        $this->set('pdf_file', $pdf_file);
        $this->set('pdf_name', $pdf_name);
        //if($cat_id == 4){
        $cats = $this->Cat->find(
                'all', array(
            'conditions' => array('Cat.approved' => 1, 'Cat.parent_id' => $cat_id),
            'order' => array('Cat.weight' => 'ASC', 'Cat.id' => 'DESC')
                )
        );
        $this->set('cats', $cats);
        $this->set('childid', $childid);
        //}
    }

    function academic($id = 0) {
        $tree = array();
        $this->loadModel('Academic');
        $academic = $this->Academic->find(
                'first', array(
            'conditions' => array('Academic.approved' => 1, 'Academic.id' => $id),
            'order' => array('Academic.id' => 'DESC')
                )
        );
        $title = $academic['Academic']['title'];
        $body = $academic['Academic']['body'];
        $this->set('title', $title);
        $this->set('body', $body);
        $this->set('title_for_layout', strip_tags($title));
        $this->set('selected', 'academics');
        $tree[] = array('url' => '', 'str' => $academic['Academic']['title']);
        $this->set('tree', $tree);
        $this->render('show');
    }

    function search() {
        $keyword = '';
        if (isset($_GET['k'])) {
            $keyword = $_GET['k'];
        }
        $original_keyword = $keyword;
        $all_data = array();
        if (trim($keyword) != '') {
            ini_set("max_execution_time", 9999);
            set_time_limit(9999);
            $this->loadModel('Cat');
            $allTables = array();
            $allTablesFields = array();
            /* $temp = $this->Cat->query("SHOW TABLES");
              if(!empty($temp)){
              foreach ($temp as $key => $value) {
              $allTables[] = $value['TABLE_NAMES']['Tables_in_ethos'];
              }
              } */
            $allTables = array('testimonials', 'cats', 'careers', 'events', 'developments',
                'articles', 'academics', 'albums', 'team_members', 'values');
            foreach ($allTables as $key => $tableName) {
                $temp = $this->Cat->query("SHOW COLUMNS FROM `" . $tableName . "`");
                if (!empty($temp)) {
                    $fieldArray = array();
                    foreach ($temp as $key => $value) {
                        $type = $value['COLUMNS']['Type'];
                        $pos = strpos($type, "(");
                        if ($pos !== false) {
                            $type = substr($type, 0, $pos);
                        }
                        $fieldArray[] = array($value['COLUMNS']['Field'], $type);
                    }
                    $allTablesFields[$tableName] = $fieldArray;
                }
            }
            $data = array();
            $excepted_fields = array('to_email', 'tab_title', 'position', 'image');
            foreach ($allTablesFields as $tableName => $fieldArray) {
                $tmp = array();
                foreach ($fieldArray as $fields) {
                    $field = $fields[0];
                    if (!in_array($field, $excepted_fields)) {
                        $type = $fields[1];
                        $typeO = $type;
                        if (is_int($keyword)) {
                            $typeOfKeyword = "int";
                        } elseif (is_array($keyword)) {
                            $typeOfKeyword = "array";
                        } elseif (is_bool($keyword)) {
                            $typeOfKeyword = "boolean";
                        } elseif (is_string($keyword)) {
                            $typeOfKeyword = "string";
                        } elseif (is_float($keyword)) {
                            $typeOfKeyword = "float";
                        }
                        if ($type == "int" || $type == "smallint" || $type == "largeint" || $type == "tinyint" || $type == "mediumint" || $type == "boolean") {
                            $type = "int";
                        }
                        if ($type == "varchar" || $type == "char" || $type == "datetime" || $type == "text" || $type == "longtext") {
                            $type = "string";
                        }
                        $type = strtolower($type);
                        $typeO = strtolower($typeO);
                        $typeOfKeyword = strtolower($typeOfKeyword);
                        $type = trim($type);
                        $typeOfKeyword = trim($typeOfKeyword);
                        $typeO = trim($typeO);
                        if ($type == $typeOfKeyword) {
                            if ($type != 'int') {
                                $keyword = strtolower($keyword);
                                $sql = "SELECT * FROM `$tableName`
                                			   WHERE (lower(`$field`) like '%$keyword%' OR lower(`$field`) like '$keyword%' OR lower(`$field`) like '%$keyword')
                                			   AND(approved = 1)";
                                $temp = $this->Cat->query($sql);
                                if (!empty($temp)) {
                                    if (count($temp) > 0) {
                                        $all_data = array_merge($temp, $all_data);
                                        //$tmp[]=array('FieldName'=>$field,"Query"=>$sql);
                                    }
                                }
                            }
                        }
                    }
                }
                /* if(count($tmp)>0){
                  $data[$tableName]=$tmp;
                  } */
            }
        }
        $title = 'Search';
        $title_for_layout = 'Search for "' . $original_keyword . '"';
        $this->set('all_data', $all_data);
        $this->set('title_for_layout', $title_for_layout);
        $this->set('selected', 'search');
        $tree[] = array('url' => '', 'str' => $title);
        $this->set('tree', $tree);
        $this->set('all_tables', $allTables);
    }

    function admissionsform($type = 'notajax') {
        $admissionCatId = 23;
        $data = $_POST;
        $files = $_FILES;
        $dataIn['status'] = 'fail';
        $dataIn['msg'] = __('There was a problem sending the Email. Please try again.', true);
        if (!empty($data)) {
            $this->loadModel('Request');
            $this->data['Request']['title'] = $data['child_name'];
            if (isset($data['i_agree'])) {
                unset($data['i_agree']);
            }
            if (isset($data['_method'])) {
                unset($data['_method']);
            }
            $filesData = [];
            if (!empty($files)) {
                foreach ($files as $key => $fileIn) {
                    $filesData[$key] = $this->uploadAdmissionFile($fileIn);
                }
            }
            $data['filesData'] = $filesData;
            $parentMail1 = '';
            if (isset($data['parent_informations23'])) {
                $parentMail1 = $data['parent_informations23'];
            }
            $parentName1 = '';
            if (isset($data['parent_informations1'])) {
                $parentName1 = $data['parent_informations1'];
            }
            $parentMail2 = '';
            if (isset($data['parent_informations24'])) {
                $parentMail2 = $data['parent_informations24'];
            }
            if (isset($data['birth_date']))
                $parentName2 = '';
            if (isset($data['parent_informations2'])) {
                $parentName2 = $data['parent_informations2'];
            }
            $required_inputs_array = ['birth_date', 'academic_year_entry_input',
                'year_group_applying_to_input', 'gender_input', 'nationality',
                'religion', 'language', 'require_bus', 'parental_marital_status'
            ];
            for ($i = 1; $i <= 24; $i++) {
                $required_inputs_array[] = 'parent_informations' . $i;
            }
            for ($i = 1; $i <= 6; $i++) {
                $required_inputs_array[] = 'emergency' . $i;
            }
            for ($i = 0; $i <= 4; $i++) {
                $required_inputs_array[] = 'developmental_history' . $i;
            }
            $is_valid = $this->validate_required_data($data, $required_inputs_array);
            if (!$is_valid) {
                $dataIn['status'] = 'fail';
                $dataIn['msg'] = __('Please fill required inputs.', true);
            } else {
                $this->data['Request']['data'] = serialize($data);
                $application_number = $this->generateApplicationNumber();
                $this->data['Request']['application_number'] = $application_number;
                $this->Request->create();
                $saved = false;
                if ($this->Request->save($this->data)) {
                    $saved = true;
                }
                $this->loadModel('Cat');
                $cat = $this->Cat->read(null, $admissionCatId);
                $to = $cat['Cat']['to_email'];
                $this->loadModel('Setting');
                $settings = $this->Setting->read(null, 1);
                $siteTitle = $settings['Setting']['title'];
                $subject = $cat['Cat']['title'] . ' "' . $siteTitle . '"';
                $messageIn = $this->getEmailTemplateBody('notification_admin');
                $message = str_replace(array('{{name}}', '{{application_number}}'), array('Admin', $application_number), $messageIn);
                $email_tpl_path = ROOT . DS . APP_DIR . DS . 'views' . DS . 'elements' . DS . 'email' . DS . 'admissions' . DS;
                $tpl = file_get_contents($email_tpl_path . 'request.ctp');
                $body = str_replace(array('{{mailsubject}}', '{{message}}'), array('', $message), $tpl);
                $mailSent = $this->sendMail($to, $subject, $body);
                $tpl = file_get_contents($email_tpl_path . 'request.ctp');
                $messageIn = $this->getEmailTemplateBody('notification');
                if ($parentMail1 != '') {
                    $message = str_replace(array('{{name}}', '{{application_number}}'), array($parentName1, $application_number), $messageIn);
                    $body = str_replace(array('{{mailsubject}}', '{{message}}'), array('', $message), $tpl);
                    $mailSent = $this->sendMail($parentMail1, $subject, $body);
                }
                if ($parentMail2 != '') {
                    $message = str_replace(array('{{name}}', '{{application_number}}'), array($parentName2, $application_number), $messageIn);
                    $body = str_replace(array('{{mailsubject}}', '{{message}}'), array('', $message), $tpl);
                    $mailSent = $this->sendMail($parentMail2, $subject, $body);
                }
                if ($mailSent) {
                    $dataIn['status'] = 'success';
                    $dataIn['msg'] = __('Thank you for your message. We will get back to you the soonest, your application number is: ' . $application_number . '', true);
                }
            }
        }
        if ($type == 'notajax') {
            $this->redirect($this->getBaseUrl() . '/');
        } elseif ($type == 'ajax') {
            $this->autoRender = false;
            header('Content-Type: application/json');
            echo json_encode($dataIn);
            exit;
        }
    }

    public function uploadAdmissionFile($fileData = []) {
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
        $file_path = '';
        if (isset($fileData['name']) && $fileData['name'] != '') {
            $file_name = str_replace("#", "_", basename($fileData['name']));
            $file_name = str_replace("?", "_", $file_name);
            $file_name = str_replace(" ", "_", $file_name);
            $file = $final_upload_dir . $file_name;
            if (file_exists($file)) {
                $file_name = time() . $file_name;
            }
            $file = $final_upload_dir . $file_name;
            if (isset($fileData['tmp_name']) && $fileData['tmp_name'] != '') {
                if (move_uploaded_file($fileData['tmp_name'], $file)) {
                    $file_path = $file;
                }
            }
        }
        $file_path = str_replace(ROOT, '', $file_path);
        return $file_path;
    }

    public function generateApplicationNumber() {
        $this->loadModel('Request');
        $lastRequest = $this->Request->find(
                'first', ['order' => [
                'Request.application_number' => 'DESC',
                'Request.id' => 'DESC']
                ]
        );
        $month = date('n');
        $leadingYear = date('y');
        if ($month >= 10) {
            $leadingYear += 1;
        }
        $year_application_number = ($leadingYear * 100000) + 1;
        $last_application_number = 0;
        if (!empty($lastRequest) && isset($lastRequest['Request']['application_number'])) {
            $last_application_number = $lastRequest['Request']['application_number'];
        }
        $application_number = $year_application_number;
        if ($last_application_number >= $year_application_number) {
            $application_number = $last_application_number + 1;
        }
        return $application_number;
    }

    public function validate_required_data($data, $required_inputs_array) {
        foreach ($required_inputs_array as $key => $value) {
            if (isset($data[$value])) {
                $item = trim($data[$value]);
                if ($item == '' || is_null($item)) {
                    return false;
                }
            } else {
                return false;
            }
        }
        return true;
    }

}
