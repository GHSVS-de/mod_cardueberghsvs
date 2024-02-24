<?php

namespace GHSVS\Module\CardUeberGhsvs\Site\Helper;

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\Registry\Registry;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Application\CMSApplication;

class CardUeberGhsvsHelper
{
	public function getDisplayData(Registry $moduleParams, Object $module, $app): array
	{
		$titleParts = $this->getTitle($module, $moduleParams);
		$items = $this->getItems($moduleParams);
		$wa = $this->getWa($app, $module->module);

		if ($items !== false)
		{
			$this->loadFramework($wa, $module->module, $items);
		}

		$data = [
			'moduleclass_sfx' => $this->getModuleclass_sfx($moduleParams),
			'moduleTitle' => $titleParts[0],
			'moduleTitleAlt' => $titleParts[1],
			'modId' => $this->getModId($module),
			'wa' => $wa,
			'items' => $items,
		];

		return $data;
	}

	private function getModId(Object $module): string
	{
		return $module->module . '_modId-' . $module->id;
	}

	private function getModuleclass_sfx(Registry $moduleParams) : string
	{
		return $this->clean($moduleParams->get('moduleclass_sfx', ''));
	}

	private function getTitle(Object $module, Registry $moduleParams): array
	{
		$titleParts = [];
		$titleParts[0] = $module->title;
		$titleParts[1] = $moduleParams->get('headline', '');
		$titleParts = array_map('trim',  $titleParts);

		$titleParts[0] = $titleParts[0] ? Text::_($titleParts[0]) : '';
		$titleParts[1] = $titleParts[1] ? Text::_($titleParts[1]) : '';

		return $titleParts;
	}

	private function clean(String $string) : string
	{
		return empty($string) ? '' : htmlspecialchars(Text::_($string), ENT_QUOTES,
			'UTF-8');
	}

	private function getItems(&$params)
	{
		$items = $params->get('items');

		if (\is_object($items) && \count(get_object_vars($items)))
		{
			foreach ($items as $key => $item)
			{
				if ($item->active !== 1)
				{
					unset($items->$key);
					continue;
				}

				$item->title = trim($item->title);
				$item->iconClass = trim($item->iconClass);
				$item->text = trim($item->text);
			}

			if (\is_object($items) && \count(get_object_vars($items)))
			{
				return $items;
			}
		}

		return false;
	}

	private function getWa(CMSApplication $app, String $moduleName)
	{
		$wa = $app->getDocument()->getWebAssetManager();
		// Searches in media/
		$wa->getRegistry()->addExtensionRegistryFile($moduleName);
		return $wa;
	}

	private function loadFramework($wa, $moduleName)
	{
		$wa->usePreset($moduleName . '.framework');
	}
}
