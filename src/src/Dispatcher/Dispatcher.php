<?php
namespace GHSVS\Module\CardUeberGhsvs\Site\Dispatcher;

\defined('_JEXEC') or die;

use Joomla\CMS\Dispatcher\AbstractModuleDispatcher;
use Joomla\CMS\Helper\HelperFactoryAwareInterface;
use Joomla\CMS\Helper\HelperFactoryAwareTrait;

class Dispatcher extends AbstractModuleDispatcher implements HelperFactoryAwareInterface
{
	use HelperFactoryAwareTrait;

	protected function getLayoutData()
	{
		/*
		parent returns:
		'module'   => $this->module,
		'app'      => $this->app,
		'input'    => $this->input,
		'params'   => new Registry($this->module->params),
		'template' => $this->app->getTemplate()
		*/
		$data = parent::getLayoutData();
		$helper = $this->getHelperFactory()->getHelper('CardUeberGhsvsHelper');
		$displayData = $helper->getDisplayData($data['params'], $data['module'], $data['app']);
		$displayData['helper'] = $helper;
		return array_merge($data, $displayData);
	}
}
