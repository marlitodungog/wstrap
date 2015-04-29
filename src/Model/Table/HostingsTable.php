<?php
namespace App\Model\Table;

use App\Model\Entity\Hosting;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hostings Model
 */
class HostingsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('hostings');
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
            ->requirePresence('body', 'create')
            ->notEmpty('body')
            ->requirePresence('meta_title', 'create')
            ->notEmpty('meta_title')
            ->requirePresence('meta_keyword', 'create')
            ->notEmpty('meta_keyword')
            ->requirePresence('meta_description', 'create')
            ->notEmpty('meta_description')
            ->add('is_publish', 'valid', ['rule' => 'numeric'])
            ->requirePresence('is_publish', 'create')
            ->notEmpty('is_publish')
            ->add('sorting', 'valid', ['rule' => 'numeric'])
            ->requirePresence('sorting', 'create')
            ->notEmpty('sorting');

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
