<?php
namespace App\Model\Table;

use App\Model\Entity\Slide;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Slides Model
 */
class SlidesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('slides');
        $this->displayField('title');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->requirePresence('title', 'create')
            ->notEmpty('title')
            ->requirePresence('caption', 'create')
            ->notEmpty('caption')
            ->requirePresence('link', 'create')
            ->requirePresence('thumbnail', 'create')
            ->notEmpty('thumbnail')
            ->add('sorting', 'valid', ['rule' => 'numeric'])
            ->requirePresence('sorting', 'create')
            ->notEmpty('sorting')
            ->add('is_publish', 'valid', ['rule' => 'numeric'])
            ->requirePresence('is_publish', 'create')
            ->notEmpty('is_publish');

        return $validator;
    }

    public function findAllPublished($query)
    {
        $query = $query->where([
            $this->alias() . '.is_publish' => 1
        ]);
        return $query;
    }
}
