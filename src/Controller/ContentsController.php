<?php
namespace App\Controller;

use App\Controller\AppController;
use JsonSchema\Uri\Retrievers\FileGetContents;

/**
 * Contents Controller
 *
 * @property \App\Model\Table\ContentsTable $Contents
 *
 * @method \App\Model\Entity\Content[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $contents = $this->paginate($this->Contents);

        $this->set(compact('contents'));
    }

    /**
     * timeline method
     *
     * @return \Cake\Http\Response|void
     */
    public function timeline()
    {
        $contents = $this->paginate($this->Contents);
        $username = $this->Auth->user('name');

        $this->set(compact('contents','username'));
    }

    /**
     * View method
     *
     * @param string|null $id Content id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $content = $this->Contents->get($id, [
            'contain' => []
        ]);

        $this->set('content', $content);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $content = $this->Contents->newEntity();
        if ($this->request->is('post')) {

            $get_data = $this->request->getData();

            debug($this->request->getData());

            $userid = $this->Auth->user('id');

            $file['size'] = $get_data['img']['size'];

                $content = $this->Contents->patchEntity($content,
                    ['title' => $get_data['title'],
                    'body' => $get_data['body'],
                    'img' => parent::img_64encode($get_data['img']['tmp_name']),
                    'userid' => $userid,
                    'category' => $get_data['category']
                ]);

            if ($this->Contents->save($content)) {
                $this->Flash->success(__('作成に成功しました。'));

                return $this->redirect(['action' => 'timeline']);
            }
            $this->Flash->error(__('保存に失敗しました。もう一度実行してください。'));
        }
        $this->set(compact('content'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Content id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $content = $this->Contents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $content = $this->Contents->patchEntity($content, $this->request->getData());
            if ($this->Contents->save($content)) {
                $this->Flash->success(__("保存に成功しました"));

                return $this->redirect(['action' => 'timeline']);
            }
            $this->Flash->error(__('保存に失敗しました。もう一度実行してください。'));
        }
        $this->set(compact('content'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Content id.
     * @return \Cake\Http\Response|null Redirects to timeline.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $content = $this->Contents->get($id);
        if ($this->Contents->delete($content)) {
            $this->Flash->success(__('削除に成功しました。'));
        } else {
            $this->Flash->error(__('削除に失敗しました。もう一度実行してください。'));
        }

        return $this->redirect(['action' => 'timeline']);
    }

}
