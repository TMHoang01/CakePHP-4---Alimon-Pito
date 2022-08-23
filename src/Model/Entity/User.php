<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
//use Cake\Auth\DefaultPasswordHasher;
use Authentication\PasswordHasher\DefaultPasswordHasher;
/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property int $amount
 * @property string $password
 * @property string $image
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Profile[] $profiles
 * @property \App\Model\Entity\Skill[] $skills
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'username' => true,
        'email' => true,
        'amount' => true,
        'password' => true,
        'image' => true,
        'status' => true ,
        'created' => true,
        'modified' => true,
        'profile' => true,
        'skills' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];
    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
