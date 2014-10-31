<?php
App::uses('ContentManagementAppModel', 'ContentManagement.Model');
/**
 * Post Model
 *
 * @property Category $Category
 */
class Post extends ContentManagementAppModel {

    public $actsAs = array('Tree');

    public $order = array(
        'Post.published' => 'DESC',
    );

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'category_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'excerpt' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'body' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'enabled' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'slug' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'type' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Category' => array(
			'className' => 'ContentManagement.Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'ParentPost' => array(
            'className' => 'ContentManagement.Post',
            'foreignKey' => 'parent_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
	);

/**
 * hasOne associations
 * @var array
 */
    public $hasOne = array(
        'Meta' => array(
            'className' => 'ContentManagement.Meta',
            'foreignKey' => 'model_id',
            'conditions' => array('model' => 'Post'),
            'fields' => '',
            'order' => '',
        ),
    );

    public function beforeSave($options = array()) {
        if (empty($this->data['Post']['slug']) && !empty($this->data['Post']['title'])) {
            $strings = new Strings();
            $this->data['Post']['slug'] = $strings->sanitize($this->data['Post']['title']);
        }
        return true;
    }

    public function afterFind($results, $primary = false) {
        foreach ($results as $k => $v) {
            if (isset($v['Post']) && isset($v['Post']['body'])) {
                $strings = new Strings();
                $results[$k]['Post']['excerpt'] = $strings->get_excerpt($v['Post']['body'], $v['Post']['excerpt']);
            }
        }

        return $results;
    }
}
