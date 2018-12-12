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
    var $statusOptions = ['Pending', 'Accepted', 'Resubmitted', 'Rejected'];

    //use upload component.
//    var $components = array('Upload');

    function index() {
        $this->Request->recursive = 0;
        if (isset($this->data['Request']['title'])) {
            $this->paginate = array(
                'conditions' => array('Request.title LIKE' => "%" . $this->data['Request']['title'] . "%"),
            );
        }
        $this->set('requests', $this->paginate());
        $this->set('titleLabel', $this->titleLabel);
        $this->set('statusOptions', $this->statusOptions);
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid request', true));
            $this->redirect(array('action' => 'index'));
        }
        $request = $this->Request->read(null, $id);
        $data = $request['Request']['data'];
        $request['Request']['data'] = unserialize($data);
        pr($request);
        $this->set('request', $request);
        $this->set('titleLabel', $this->titleLabel);
        $this->set('statusOptions', $this->statusOptions);
    }

//    function add() {
//        if (!empty($this->data)) {
//            //upload image
////            $this->data['Request']['image'] = $this->Upload->uploadImage($this->data['Request']['image']);
//            $this->Request->create();
//            if ($this->Request->save($this->data)) {
//                $this->Session->setFlash(__('The request has been saved', true));
//                $this->redirect(array('action' => 'index'));
//            } else {
//                $this->Session->setFlash(__('The request could not be saved. Please, try again.', true));
//            }
//        }
//    }
//    function edit($id = null) {
//        if (!$id && empty($this->data)) {
//            $this->Session->setFlash(__('Invalid request', true));
//            $this->redirect(array('action' => 'index'));
//        }
//        if (!empty($this->data)) {
//            //upload image
////            $this->Request->id = $id;
////            if ($this->data['Request']['image']['name']) {
////                $this->Upload->filesToDelete = array($this->Request->field('image'));
////                $this->data['Request']['image'] = $this->Upload->uploadImage($this->data['Request']['image']);
////        } else{
////                unset($this->data['Request']['image']);
////        }
//            if ($this->Request->save($this->data)) {
//                $this->Session->setFlash(__('The request has been saved', true));
//                $this->redirect(array('action' => 'index'));
//            } else {
//                $this->Session->setFlash(__('The request could not be saved. Please, try again.', true));
//            }
//        }
//        if (empty($this->data)) {
//            $this->data = $this->Request->read(null, $id);
//        }
//    }
//    function delete($id = null) {
//        $forbidden_ids = array();
//        if (in_array($id, $forbidden_ids)) {
//            $this->Session->setFlash(__('You cannot delete this Request!', true));
//            $this->redirect(array('action' => 'index'));
//        }
//        if (!$id) {
//            $this->Session->setFlash(__('Invalid id for request', true));
//            $this->redirect(array('action' => 'index'));
//        }
//        if ($this->Request->delete($id)) {
//            $this->Session->setFlash(__('Request deleted', true));
//            $this->redirect(array('action' => 'index'));
//        }
//        $this->Session->setFlash(__('Request was not deleted', true));
//        $this->redirect(array('action' => 'index'));
//    }
//    function deleteImage($id) {
//        if (!$id) {
//            $this->Session->setFlash(__('Invalid Request', true));
//            $this->redirect($this->referer(array('action' => 'index')));
//        }
//        //to delete image file
//        $this->Request->id = $id;
//        $this->Upload->filesToDelete = array($this->Request->field('image'));
//        if ($this->Request->saveField('image', '')) {
//            $this->Upload->deleteFile();
//            $this->Session->setFlash(__('The Request image has been deleted', true));
//        } else {
//            $this->Session->setFlash(__('The Request image could not be deleted. Please, try again.', true));
//        }
//        $this->redirect($this->referer(array('action' => 'index')));
//    }
}
