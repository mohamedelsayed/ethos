<?php

/**
 * @author Author "Mohamed Elsayed"
 * @author Author Email "me@mohamedelsayed.net"
 * @link http://www.mohamedelsayed.net
 * @copyright Copyright (c) 2018 Programming by "mohamedelsayed.net"
 */
require_once '../auth_controller.php';

class DisclaimersController extends AuthController {

    var $name = 'Disclaimers';
    var $uses = array('Disclaimer');

    //use upload component.
//    var $components = array('Upload');

    function index() {
//        $this->Disclaimer->recursive = 0;
//        if (isset($this->data['Disclaimer']['title'])) {
//            $this->paginate = array(
//                'conditions' => array('Disclaimer.title LIKE' => "%" . $this->data['Disclaimer']['title'] . "%"),
//            );
//        }
//        $this->set('disclaimers', $this->paginate());
        $this->redirect(array('action' => 'edit', 1));
    }

//    function view($id = null) {
//        if (!$id) {
//            $this->Session->setFlash(__('Invalid disclaimer', true));
//            $this->redirect(array('action' => 'index'));
//        }
//        $this->set('disclaimer', $this->Disclaimer->read(null, $id));
//    }
//    function add() {
//        if (!empty($this->data)) {
//            //upload image
////            $this->data['Disclaimer']['image'] = $this->Upload->uploadImage($this->data['Disclaimer']['image']);
//            $this->Disclaimer->create();
//            if ($this->Disclaimer->save($this->data)) {
//                $this->Session->setFlash(__('The disclaimer has been saved', true));
//                $this->redirect(array('action' => 'index'));
//            } else {
//                $this->Session->setFlash(__('The disclaimer could not be saved. Please, try again.', true));
//            }
//        }
//    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid disclaimer.', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if (trim(strip_tags($this->data['Disclaimer']['body'])) == '') {
                $this->Session->setFlash(__('Body cannot be left blank.', true));
                $this->redirect(array('action' => 'edit', $id));
            }
            if (!$this->check_if_startdate_lessthan_endate($this->data['Disclaimer']['start_date'], $this->data['Disclaimer']['end_date'])) {
                $this->Session->setFlash(__('Start date must be less than or equal End date.', true));
                $this->redirect(array('action' => 'edit', $id));
            }
            //upload image
//            $this->Disclaimer->id = $id;
//            if ($this->data['Disclaimer']['image']['name']) {
//                $this->Upload->filesToDelete = array($this->Disclaimer->field('image'));
//                $this->data['Disclaimer']['image'] = $this->Upload->uploadImage($this->data['Disclaimer']['image']);
//        } else{
//                unset($this->data['Disclaimer']['image']);
//        }
            if ($this->Disclaimer->save($this->data)) {
                $this->Session->setFlash(__('The disclaimer has been saved.', true));
                $this->redirect(array('action' => 'edit', $id));
            } else {
                $this->Session->setFlash(__('The disclaimer could not be saved. Please, try again.', true));
                $this->redirect(array('action' => 'edit', $id));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Disclaimer->read(null, $id);
        }
    }

//    function delete($id = null) {
//        $forbidden_ids = array();
//        if (in_array($id, $forbidden_ids)) {
//            $this->Session->setFlash(__('You cannot delete this Disclaimer!', true));
//            $this->redirect(array('action' => 'index'));
//        }
//        if (!$id) {
//            $this->Session->setFlash(__('Invalid id for disclaimer', true));
//            $this->redirect(array('action' => 'index'));
//        }
//        if ($this->Disclaimer->delete($id)) {
//            $this->Session->setFlash(__('Disclaimer deleted', true));
//            $this->redirect(array('action' => 'index'));
//        }
//        $this->Session->setFlash(__('Disclaimer was not deleted', true));
//        $this->redirect(array('action' => 'index'));
//    }
}
