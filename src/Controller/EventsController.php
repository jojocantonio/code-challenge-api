<?php
namespace App\Controller;

use Cake\View\JsonView;
use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;
use Cake\Controller\Exception\InvalidParameterException;
/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 * @method \App\Model\Entity\Events[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = []) 
 */

 /**
  * Index method
  *
  * @return \Cake\Http\Response|null|void Renders view
  */



class EventsController extends AppController
{
      // public function viewClasses(): array
      // {
      //   return [JsonView::class];
      // }

      /**
       * Index method
       *
       * @return \Cake\Http\Response|null|void Renders view
       */
      public function index(){
        // $events = $this->Events->find('all')->all();
        // $this->set('events', $events);
        // $this->viewBuilder()->setOption('serialize', ['events']);
        $settings = ['limit'=> 10, 'scope'=> 'events', 'order'=> ['Events.eventName'=> 'ASC']];
        $events = $this->paginate($this->Events, $settings);
        $this->set(compact('events'));
        // $this->viewBuilder()->setOption('serialize', 'events');
      }

        /**
       * View method
       *
       * @param string|null $id Event id.
       * @return \Cake\Http\Response|null|void Renders view
       * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
       */
      public function view($id=null) {
        $event = $this->Events->get($id);

        $this->set(compact('event'));
      }

      
      /**
       * Add method
       *
       * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
       */
      public function add(){
        // $this->request->allowMethod(['post', 'put']);
        // $event = $this->Events->newEntity($this->request->getData());
        // if($this->Events->save($event)) {
        //     $message = "Saved";
        // } else {
        //     $message = 'Error';
        // }

        // $event = $this->Event->newEmptyEntity();
        // $event = $this->Event->patchEntity($event, $this->request->getData());
        // $this->Event->save($event);
        $event = $this->Events->newEmptyEntity();
        if ($this->request->is('post')) {
            $event = $this->events->patchEntity($event, $this->request->getData());
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The event could not be saved. Please, try again.'));
        }
        
        $this->set(compact('event'));
      }

       /**
       * Edit method
       *
       * @param string|null $id Event id.
       * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
       * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
       */
      public function edit($id=null){
        $event = $this->Events->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $event = $this->Events->patchEntity($user, $this->request->getData());
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The event could not be saved. Please, try again.'));
        }
        
        $this->set(compact('event'));
      }

        /**
       * Delete method
       *
       * @param string|null $id Event id.
       * @return \Cake\Http\Response|null|void Redirects to index.
       * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
       */
      public function delete($id=null) {
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id);
        if ($this->Users->delete($event)) {
            $this->Flash->success(__('The event has been deleted.'));
        } else {
            $this->Flash->error(__('The event could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
      }
}