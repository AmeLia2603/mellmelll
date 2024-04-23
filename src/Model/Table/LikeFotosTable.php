<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LikeFotos Model
 *
 * @property \App\Model\Table\FotosTable&\Cake\ORM\Association\BelongsTo $Fotos
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\LikeFoto newEmptyEntity()
 * @method \App\Model\Entity\LikeFoto newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\LikeFoto> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LikeFoto get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\LikeFoto findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\LikeFoto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\LikeFoto> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\LikeFoto|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\LikeFoto saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\LikeFoto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\LikeFoto>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\LikeFoto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\LikeFoto> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\LikeFoto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\LikeFoto>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\LikeFoto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\LikeFoto> deleteManyOrFail(iterable $entities, array $options = [])
 */
class LikeFotosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('like_fotos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Fotos', [
            'foreignKey' => 'Foto_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'User_id',
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
            ->integer('Foto_id')
            ->notEmptyString('Foto_id');

        $validator
            ->integer('User_id')
            ->notEmptyString('User_id');

        $validator
            ->date('Tanggal_like')
            ->requirePresence('Tanggal_like', 'create')
            ->notEmptyDate('Tanggal_like');

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
        $rules->add($rules->existsIn(['Foto_id'], 'Fotos'), ['errorField' => 'Foto_id']);
        $rules->add($rules->existsIn(['User_id'], 'Users'), ['errorField' => 'User_id']);

        return $rules;
    }
}
