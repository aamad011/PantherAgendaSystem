<?php
/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 11/23/2014
 * Time: 11:43 AM
 */

class EventsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function details($id = null) {
        if(!$id) {
            throw new NotFoundException(__('Invalid Event'));
        }

        $event = $this->Event->findById($id);
        if(!$event) {
            throw new NotFoundException(__('Invalid Event'));
        }

        $this->set('event', $event);
    }

    public function edit($id = null) {
        if(!$id) {
            throw new NotFoundException(__('Invalid Event'));
        }

        $event = $this->Event->findById($id);
        if(!$event) {
            throw new NotFoundException(__('Invalid Event'));
        }

        if($this->request->is(array('post', 'put'))) {
            $this->Event->id = $id;
            if($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your event has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your event.'));
        }

        if(!$this->request->data) {
            $this->request->data = $event;
        }
    }
} 