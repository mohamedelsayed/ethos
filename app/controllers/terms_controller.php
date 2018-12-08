<?php

/**
 * @author Author "Mohamed Elsayed"
 * @author Author Email "me@mohamedelsayed.net"
 * @link http://www.mohamedelsayed.net
 * @copyright Copyright (c) 2018 Programming by "mohamedelsayed.net"
 */
require_once '../auth_controller.php';

class TermsController extends AuthController {

    var $name = 'Terms';
    var $uses = array('Term');

    //use upload component.
//    var $components = array('Upload');

    function index() {
        $this->Term->recursive = 0;
        if (isset($this->data['Term']['title'])) {
            $this->paginate = array(
                'conditions' => array('Term.title LIKE' => "%" . $this->data['Term']['title'] . "%"),
            );
        }
        $this->set('terms', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid term', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('term', $this->Term->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            //upload image
//            $this->data['Term']['image'] = $this->Upload->uploadImage($this->data['Term']['image']);
            $this->Term->create();
            if ($this->Term->save($this->data)) {
                $this->Session->setFlash(__('The term has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The term could not be saved. Please, try again.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid term', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            //upload image
//            $this->Term->id = $id;
//            if ($this->data['Term']['image']['name']) {
//                $this->Upload->filesToDelete = array($this->Term->field('image'));
//                $this->data['Term']['image'] = $this->Upload->uploadImage($this->data['Term']['image']);
//        } else{
//                unset($this->data['Term']['image']);
//        }
            if ($this->Term->save($this->data)) {
                $this->Session->setFlash(__('The term has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The term could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Term->read(null, $id);
        }
    }

    function delete($id = null) {
        $forbidden_ids = array();
        if (in_array($id, $forbidden_ids)) {
            $this->Session->setFlash(__('You cannot delete this Term!', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for term', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Term->delete($id)) {
            $this->Session->setFlash(__('Term deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Term was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

//    function deleteImage($id) {
//        if (!$id) {
//            $this->Session->setFlash(__('Invalid Term', true));
//            $this->redirect($this->referer(array('action' => 'index')));
//        }
//        //to delete image file
//        $this->Term->id = $id;
//        $this->Upload->filesToDelete = array($this->Term->field('image'));
//        if ($this->Term->saveField('image', '')) {
//            $this->Upload->deleteFile();
//            $this->Session->setFlash(__('The Term image has been deleted', true));
//        } else {
//            $this->Session->setFlash(__('The Term image could not be deleted. Please, try again.', true));
//        }
//        $this->redirect($this->referer(array('action' => 'index')));
//    }
}
