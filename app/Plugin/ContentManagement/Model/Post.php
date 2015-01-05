<?php
App::uses('ContentManagementAppModel', 'ContentManagement.Model');
/**
 * Post Model
 *
 * @property Category $Category
 */
class Post extends ContentManagementAppModel {

    public $actsAs = array(
        'Tree',
        'Search.Searchable',
    );

    public $order = array(
        'Post.published' => 'DESC',
    );

    public $filterArgs = array(
        'title' => array(
            'type' => 'like',
            'field' => 'title',
        ),
        'enabled' => array(
            'type' => 'value',
        )
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


    /**
     * Use this instead of "exists" for public actions, to make sure a Post is really meant to be visible by the world.
     *
     * @return bool
     */
    public function isPubliclyAvailable() {
        $id = $this->getID();
        $the_post = $this->find('first', array(
            'conditions' => array(
                'Post.id' => $id,
            ),
            'fields' => array(
                'Post.enabled',
                'Post.published',
            ),
            'recursive' => -1,
            'callbacks' => false,
        ));

        $invalid_post = empty($the_post);

//        Don't try to process any more logic unless we know the Post even exists.
        if ($invalid_post) {
            return false;
        }

        $disabled_post = $the_post['Post']['enabled'] === false;
        $unpublished_post = new DateTime($the_post['Post']['published']) > new DateTime();

        if ($disabled_post || $unpublished_post) {
            return false;
        }
        else {
            return true;
        }
    }
}
