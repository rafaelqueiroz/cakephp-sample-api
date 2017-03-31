<?php
namespace Recipe\Controller;

/**
 * @author Rafael Queiroz <rafaelfqf@gmail.com>
 */
class RecipesController extends AppController
{

   /**
     * Initialization hook method.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->deny(['add', 'edit', 'delete']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $recipes = $this->paginate($this->Recipes);

        $this->set(compact('recipes'));
        $this->set('_serialize', ['recipes']);
    }

    /**
     * View method
     *
     * @param string|null $id Recipe id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recipe = $this->Recipes->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('recipe', $recipe);
        $this->set('_serialize', ['recipe']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null
     */
    public function add()
    {
        $this->request->allowMethod('post');
        $recipe = $this->Recipes->newEntity($this->request->getData());
        $this->Recipes->save($recipe);

        $this->set(compact('recipe'));
        $this->set('_serialize', ['recipe']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Recipe id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->request->allowMethod(['put']);
        $recipe = $this->Recipes->patchEntity($this->Recipes->get($id), $this->request->getData());
        $this->Recipes->save($recipe);

        $this->set(compact('recipe'));
        $this->set('_serialize', ['recipe']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Recipe id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod('delete');
        $recipe = $this->Recipes->get($id);
        $this->Recipes->delete($recipe);
    }
}
