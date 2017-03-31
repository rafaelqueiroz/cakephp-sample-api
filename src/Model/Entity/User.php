<?php
namespace Recipe\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * @author Rafael Queiroz <rafaelfqf@gmail.com>
 */
class User extends Entity
{

    /**
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    /**
     * @param $password
     * @return bool|string
     */
    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }

    /**
     * @return array
     */
    protected function generateToken() 
    {
        return [];
    }

}