<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Blocs Model
 *
 * @property \App\Model\Table\TutorielsTable&\Cake\ORM\Association\BelongsTo $Tutoriels
 *
 * @method \App\Model\Entity\Bloc newEmptyEntity()
 * @method \App\Model\Entity\Bloc newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Bloc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bloc get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bloc findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Bloc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bloc[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bloc|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bloc saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bloc[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Bloc[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Bloc[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Bloc[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BlocsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('blocs');
        $this->setDisplayField('type_contenue');
        $this->setPrimaryKey('bloc_id');

        $this->belongsTo('Tutoriels', [
            'foreignKey' => 'tutoriel_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('tutoriel_id')
            ->notEmptyString('tutoriel_id');

        $validator
            ->scalar('type_contenue')
            ->requirePresence('type_contenue', 'create')
            ->notEmptyString('type_contenue');

        $validator
            ->scalar('contenue')
            ->maxLength('contenue', 4294967295)
            ->requirePresence('contenue', 'create')
            ->notEmptyString('contenue');

        $validator
            ->integer('ordre')
            ->requirePresence('ordre', 'create')
            ->notEmptyString('ordre');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('tutoriel_id', 'Tutoriels'), ['errorField' => 'tutoriel_id']);

        return $rules;
    }
}
