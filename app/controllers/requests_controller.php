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
            if ($this->Request->save($this->data)) {
                if ($status == 1) {
                    $this->Session->setFlash(__('Application has been accepted.', true));
                } elseif ($status == 1) {
                    $this->Session->setFlash(__('Application has been resubmitted.', true));
                } elseif ($status == 1) {
                    $this->Session->setFlash(__('Application has been rejected.', true));
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

}
