<?php

/**
 * @author Author "Mohamed Elsayed"
 * @author Author Email "me@mohamedelsayed.net"
 * @link http://www.mohamedelsayed.net
 * @copyright Copyright (c) 2018 Programming by "mohamedelsayed.net"
 */
class EmailTemplate extends AppModel {

    var $name = 'EmailTemplate';
    var $displayField = 'title';
    var $validate = array(
        'title' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Title cannot be left blank',),
        ),
        'body' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Body cannot be left blank',),
        ),
        'identifier' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Identifier cannot be left blank',),
        ),
//        'weight' => array(
//            'numeric' => array(
//                'rule' => array('numeric'),
//                'message' => 'Weight must be numeric.',
//            ),
//        ),
    );
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    var $belongsTo = array(
            /* 'Artist' => array(
              'className' => 'Artist',
              'foreignKey' => 'artist_id',
              'conditions' => '',
              'fields' => '',
              'order' => ''
              ), */
    );

}
