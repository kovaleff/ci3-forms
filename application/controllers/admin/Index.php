<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once "BaseAdminController.php";


class Index extends BaseAdminController {

	public function index()
	{

		$this->render_page('admin/index',[

		]);
	}

	public function questions()
	{
		$this->render_page('admin/questions',[

		]);
	}
}
