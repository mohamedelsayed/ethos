<?php

/**
 * @author Author "Mohamed Elsayed"
 * @author Author Email "me@mohamedelsayed.net"
 * @link http://www.mohamedelsayed.net
 * @copyright Copyright (c) 2018 Programming by "mohamedelsayed.net"
 */
require_once '../auth_controller.php';

class EmailTemplatesController extends AuthController {

    var $name = 'EmailTemplates';
    var $uses = array('EmailTemplate');

    //use upload component.
//    var $components = array('Upload');

    function index() {
        $this->EmailTemplate->recursive = 0;
        if (isset($this->data['EmailTemplate']['title'])) {
            $this->paginate = array(
                'conditions' => array('EmailTemplate.title LIKE' => "%" . $this->data['EmailTemplate']['title'] . "%"),
            );
        }
        $this->set('emailTemplates', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid email Template', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('emailTemplate', $this->EmailTemplate->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            //upload image
//            $this->data['EmailTemplate']['image'] = $this->Upload->uploadImage($this->data['EmailTemplate']['image']);
            $this->EmailTemplate->create();
            if ($this->EmailTemplate->save($this->data)) {
                $this->Session->setFlash(__('The email Template has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The email Template could not be saved. Please, try again.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid email Template', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            //upload image
//            $this->EmailTemplate->id = $id;
//            if ($this->data['EmailTemplate']['image']['name']) {
//                $this->Upload->filesToDelete = array($this->EmailTemplate->field('image'));
//                $this->data['EmailTemplate']['image'] = $this->Upload->uploadImage($this->data['EmailTemplate']['image']);
//        } else{
//                unset($this->data['EmailTemplate']['image']);
//        }
            if ($this->EmailTemplate->save($this->data)) {
                $this->Session->setFlash(__('The email Template has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The email Template could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->EmailTemplate->read(null, $id);
        }
    }

    function delete($id = null) {
        $forbidden_ids = array(1, 2, 3, 4, 5);
        if (in_array($id, $forbidden_ids)) {
            $this->Session->setFlash(__('You cannot delete this Email Template!', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for Email Template', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->EmailTemplate->delete($id)) {
            $this->Session->setFlash(__('Email Template deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Email Template was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

}
