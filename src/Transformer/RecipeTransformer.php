<?php
namespace Recipe\Transformer;

use Recipe\Model\Entity\Recipe;
use League\Fractal\TransformerAbstract;

/**
 * @author Rafael Queiroz <rafaelfqf@gmail.com>
 */
class RecipeTransformer extends  TransformerAbstract
{
    /**
     * @var array
     */
    protected $defaultIncludes = ['user'];

    /**
     * @param Recipe $recipe
     * @return array
     */
	public function transform(Recipe $recipe)
	{
		return [
			'id' => $recipe->id,
			'body' => $recipe->body,
            'created' => $recipe->created
		];
	}

    /**
     * @param Recipe $recipe
     * @return \League\Fractal\Resource\Item
     */
    public function includeUser(Recipe $recipe)
    {
        $user = $recipe->user;
        return $this->item($user, new UserTransformer(), 'users');
    }	
}