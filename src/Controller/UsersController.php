<?php
namespace Recipe\Controller;
use Cake\Http\Response;

/**
 * @author Rafael Queiroz <rafaelfqf@gmail.com>
 */
class UsersController extends AppController
{

    /**
     * Access token method
     *
     * @return \Cake\Network\Response
     */
    public function token()
    {
        $this->request->allowMethod('post');
        $user = $this->Auth->identify();
        if ($user) {
            $token = $user->token();
        }
        
        $this->set(compact('token'));
        $this->set('_serialize', ['token']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response
     */
    public function add()
    {
        $this->request->allowMethod('post');
        $user = $this->Users->newEntity($this->request->getData());
        $this->Users->save($user);

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

}