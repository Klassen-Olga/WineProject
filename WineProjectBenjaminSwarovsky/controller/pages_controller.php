<?php

namespace app\controller;


class PagesController extends \app\core\Controller
{
	


	public function actionRegister(){
		
	}

	public function actionLogin()
	{
		
	}

	public function actionLogout()
	{
		if($_SESSION['loggedIn'] === true)
		{
			$_SESSION['loggedIn'] = false;
		}

		header('Location: index.php');
		exit();
	}


	public function actionProfile()
	{
		if($_SESSION['loggedIn'] === true)
		{

		}
		else
		{
			header('Location: index.php');
		}
	}

	public function actionStart(){

		include __DIR__.'/../models/customer.class.php';
		//Customer::find('');
	/*	
			ob_start();
			{
				
			}
			$test = ob_get_clean();*/

	}
	public function actionBasket(){
		
	}

	public function actionProducts(){
		
	}

	public function actionImprint(){
		
	}

	public function actionWine_information(){
		
	}

	public function actionError404()
	{
		
	}
}