<?php
namespace Recipe\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

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
    public function token()
    {
        $expires_in = time() + 604800;

        return [
            'access_token' => JWT::encode([
                'sub' => $this->id,
                'exp' => $expires_in
            ], Security::salt()),
            'token_type'  => 'Bearer',
            'expires_in' => $expires_in
        ];
    }

}