<?php
namespace Recipe\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * @author Rafael Queiroz <rafaelfqf@gmail.com>
 */
class AppController extends Controller
{

    /**
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'storage' => 'Memory',
            'authenticate' => [
                'ADmad/JwtAuth.Jwt' => [
                    'userModel' => 'Users',
                    'fields' => [
                        'id' => 'id',
                    ],
                    'parameter' => 'token',
                    'queryDatasource' => true,
                ]
            ],
            'unauthorizedRedirect' => false,
            'checkAuthIn' => 'Controller.initialize',
        ]);

        $this->Auth->allow();
    }

    /**
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        $this->viewBuilder()->className('Api');
    }

}