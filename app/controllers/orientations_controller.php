<?php

/**
 * @author Author "Mohamed Elsayed"
 * @author Author Email "me@mohamedelsayed.net"
 * @link http://www.mohamedelsayed.net
 * @copyright Copyright (c) 2018 Programming by "mohamedelsayed.net"
 */
require_once '../auth_controller.php';

class OrientationsController extends AuthController {

    var $name = 'Orientations';
    var $uses = array('Orientation');

    //use upload component.
//    var $components = array('Upload');

    function index() {
        $this->Orientation->recursive = 0;
        if (isset($this->data['Orientation']['title'])) {
            $this->paginate = array(
                'conditions' => array('Orientation.title LIKE' => "%" . $this->data['Orientation']['title'] . "%"),
            );
        }
        $this->set('orientations', $this->paginate());
    }

//    function view($id = null) {
//        if (!$id) {
//            $this->Session->setFlash(__('Invalid orientation', true));
//            $this->redirect(array('action' => 'index'));
//        }
//        $this->set('orientation', $this->Orientation->read(null, $id));
//    }
//    function add() {
//        if (!empty($this->data)) {
//            //upload image
////            $this->data['Orientation']['image'] = $this->Upload->uploadImage($this->data['Orientation']['image']);
//            $this->Orientation->create();
//            if ($this->Orientation->save($this->data)) {
//                $this->Session->setFlash(__('The orientation has been saved', true));
//                $this->redirect(array('action' => 'index'));
//            } else {
//                $this->Session->setFlash(__('The orientation could not be saved. Please, try again.', true));
//            }
//        }
//    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid orientation.', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if (trim(strip_tags($this->data['Orientation']['body'])) == '') {
                $this->Session->setFlash(__('Body cannot be left blank.', true));
                $this->redirect(array('action' => 'edit', $id));
            }
            if (!$this->check_if_startdate_lessthan_endate($this->data['Orientation']['start_date'], $this->data['Orientation']['end_date'])) {
                $this->Session->setFlash(__('Start date must be less than or equal End date.', true));
                $this->redirect(array('action' => 'edit', $id));
            }
            //upload image
//            $this->Orientation->id = $id;
//            if ($this->data['Orientation']['image']['name']) {
//                $this->Upload->filesToDelete = array($this->Orientation->field('image'));
//                $this->data['Orientation']['image'] = $this->Upload->uploadImage($this->data['Orientation']['image']);
//        } else{
//                unset($this->data['Orientation']['image']);
//        }
            if ($this->Orientation->save($this->data)) {
                $this->Session->setFlash(__('The orientation has been saved.', true));
                $this->redirect(array('action' => 'edit', $id));
            } else {
                $this->Session->setFlash(__('The orientation could not be saved. Please, try again.', true));
                $this->redirect(array('action' => 'edit', $id));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Orientation->read(null, $id);
        }
    }

//    function delete($id = null) {
//        $forbidden_ids = array();
//        if (in_array($id, $forbidden_ids)) {
//            $this->Session->setFlash(__('You cannot delete this Orientation!', true));
//            $this->redirect(array('action' => 'index'));
//        }
//        if (!$id) {
//            $this->Session->setFlash(__('Invalid id for orientation', true));
//            $this->redirect(array('action' => 'index'));
//        }
//        if ($this->Orientation->delete($id)) {
//            $this->Session->setFlash(__('Orientation deleted', true));
//            $this->redirect(array('action' => 'index'));
//        }
//        $this->Session->setFlash(__('Orientation was not deleted', true));
//        $this->redirect(array('action' => 'index'));
//    }
}
