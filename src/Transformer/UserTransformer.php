<?php
namespace Recipe\Transformer;

use Recipe\Model\Entity\User;
use League\Fractal\TransformerAbstract;

/**
 * @author Rafael Queiroz <rafaelfqf@gmail.com>
 */
class UserTransformer extends  TransformerAbstract
{

    /**
     * @param User $user
     * @return array
     */
	public function transform(User $user)
	{
		return [
			'id' => $user->id,
			'email' => $user->email,
            'created' => $user->created
		];
	}
    
}