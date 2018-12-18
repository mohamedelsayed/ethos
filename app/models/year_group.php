<?php

/**
 * @author Author "Mohamed Elsayed"
 * @author Author Email "me@mohamedelsayed.net"
 * @link http://www.lifecoachingegypt.com
 * @copyright Copyright (c) 2018 Programming by "mohamedelsayed.net"
 */
class YearGroup extends AppModel {

    var $name = 'YearGroup';
    var $displayField = 'title';
    //Validation rules
    var $validate = array(
//        'title' => array(
//            'notempty' => array(
//                'rule' => array('notempty'),
//                'message' => 'Title cannot be left blank',),
//        ),
//        'weight' => array(
//            'numeric' => array(
//                'rule' => array('numeric'),
//                'message' => 'Weight must be numeric.',
//            ),
//        ),
    );
    var $belongsTo = array(
//        'Member' => array(
//            'className' => 'Member',
//            'foreignKey' => 'member_id',
//            'conditions' => '',
//            'fields' => '',
//            'order' => ''
//        ),
//        'BlockMember' => array(
//            'className' => 'Member',
//            'foreignKey' => 'blocked_member_id',
//            'conditions' => '',
//            'fields' => '',
//            'order' => ''
//        )
    );

}
