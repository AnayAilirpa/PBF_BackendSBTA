<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class View extends BaseController
{
    public function index()
    {
        $user_model = new UserModel();
        $all_data_user = $user_model->findAll();
        return $this->response->setJSON($all_data_user);
    }
}
?>
