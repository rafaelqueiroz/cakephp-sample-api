<?php
namespace Recipe\Controller;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;

/**
 * @author Rafael Queiroz <rafaelfqf@gmail.com>
 */
class UsersController extends AppController
{

    /**
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        $this->RequestHandler->respondAs('json');
        $this->RequestHandler->renderAs($this, 'json');
        $this->set('_serialize', true);
    }

    /**
     * Access token method
     *
     * @return \Cake\Network\Response
     */
    public function token()
    {
        $this->request->allowMethod('post');
        $user = $this->Auth->identify();
        if (!$user) {
            throw new UnauthorizedException("Invalid credentials");
        }

        $user = $this->Users->newEntity($user);
        $this->set($user->token());
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
        $this->Users->register($user);

        $this->set(compact('user'));
    }

}