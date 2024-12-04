<?php

namespace app\controllers;

use app\models\ContactModel;
use app\models\ModelException;

class ContactController extends Controller {

    public function handle($path_fragment) {
        if ($this->isPostRequest()) {
            $this->addContact($_POST);
        }
        else if ($this->isGetRequest()) {
            $this->getContactList();
        }
    }

    public function addContact($data) {
        $model = new ContactModel();
        $model->name = $data['name'];
        $model->email = $data['email'];
        $model->message = $data['message'];
        try {
            $entity = $model->save();
            $this->returnJson(array(
                "code" => 200,
                "message" => "successful",
                "data" => $entity,
            ));
        }
        catch (ModelException $ex) {
            $this->returnJson(array(
                "code" => 500,
                "message" => $ex->getMessage()
            ));
        }
    }

    public function getContactList() {
        $contacts = (new ContactModel())->fetchAll();
        $this->returnView("contact_list_view.php",array('contacts' => $contacts));
    }
}