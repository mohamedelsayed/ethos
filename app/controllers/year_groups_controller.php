<?php

/**
 * @author Author "Mohamed Elsayed"
 * @author Author Email "me@mohamedelsayed.net"
 * @link http://www.mohamedelsayed.net
 * @copyright Copyright (c) 2018 Programming by "mohamedelsayed.net"
 */
require_once '../auth_controller.php';

class YearGroupsController extends AuthController {

    var $name = 'YearGroups';
    var $uses = array('YearGroup');

    //use upload component.
//    var $components = array('Upload');

    function index() {
        $this->YearGroup->recursive = 0;
        if (isset($this->data['YearGroup']['title'])) {
            $this->paginate = array(
                'conditions' => array('YearGroup.title LIKE' => "%" . $this->data['YearGroup']['title'] . "%"),
            );
        }
        $this->set('yearGroups', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid year group', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('yearGroup', $this->YearGroup->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            //upload image
//            $this->data['YearGroup']['image'] = $this->Upload->uploadImage($this->data['YearGroup']['image']);
            $this->YearGroup->create();
            if ($this->YearGroup->save($this->data)) {
                $this->Session->setFlash(__('The year group has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The year group could not be saved. Please, try again.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid year group', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            //upload image
//            $this->YearGroup->id = $id;
//            if ($this->data['YearGroup']['image']['name']) {
//                $this->Upload->filesToDelete = array($this->YearGroup->field('image'));
//                $this->data['YearGroup']['image'] = $this->Upload->uploadImage($this->data['YearGroup']['image']);
//        } else{
//                unset($this->data['YearGroup']['image']);
//        }
            if ($this->YearGroup->save($this->data)) {
                $this->Session->setFlash(__('The year group has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The year group could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->YearGroup->read(null, $id);
        }
    }

    function delete($id = null) {
        $forbidden_ids = array();
        if (in_array($id, $forbidden_ids)) {
            $this->Session->setFlash(__('You cannot delete this Year group!', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for year group', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->YearGroup->delete($id)) {
            $this->Session->setFlash(__('Year group deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Year group was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

//    function deleteImage($id) {
//        if (!$id) {
//            $this->Session->setFlash(__('Invalid YearGroup', true));
//            $this->redirect($this->referer(array('action' => 'index')));
//        }
//        //to delete image file
//        $this->YearGroup->id = $id;
//        $this->Upload->filesToDelete = array($this->YearGroup->field('image'));
//        if ($this->YearGroup->saveField('image', '')) {
//            $this->Upload->deleteFile();
//            $this->Session->setFlash(__('The YearGroup image has been deleted', true));
//        } else {
//            $this->Session->setFlash(__('The YearGroup image could not be deleted. Please, try again.', true));
//        }
//        $this->redirect($this->referer(array('action' => 'index')));
//    }
}
