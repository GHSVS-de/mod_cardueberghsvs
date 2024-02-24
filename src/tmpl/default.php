<?php
defined('_JEXEC') or die;

use Joomla\CMS\Uri\Uri;
use Joomla\CMS\HTML\HTMLHelper;

/*
From Dispatcher:
$module   Object,
$app,
$input,
$params Registry,
$template,
$modId String,
$moduleclass_sfx String,
$moduleTitle bzw. $module->title Lang strings translated,
$moduleTitleAlt "Alternative Modul-Überschrift" Lang strings translated,
$helper
$wa Web Asset Manager
$items
	[title] => ENTWICKLUNG
	[iconClass] => fa-laptop
	[text] => Sie haben eine Idee, wir entwickeln und realisieren sie mit modernster Technik.
	[active] => 1
*/

if (empty($items))
{
	return '';
}

if ($params->get('backgroundimage', ''))
{
	$wa->addInlineStyle(
'.ueberuns.' . $modId . '{background-image: url("' . Uri::root(true) . '/' . HTMLHelper::_('cleanImageURL', $params->get('backgroundimage'))->url . '");}
', ['name' => $modId]);
}

$moduleTitleToShow = $moduleTitleAlt;

if (!$moduleTitleToShow && $module->showtitle)
{
	$moduleTitleToShow = $moduleTitle;
}
#echo ' 4654sd48sa7d98sD81s8d71dsa <pre>' . print_r($items, true) . '</pre>';exit;
$i = 1;
?>

<div id="<?php echo $modId; ?>" class="container-fluid mod_cardueberghsvs ueberuns <?php echo $modId; ?>">
	<div class="section px-5">
		<?php if ($moduleTitleToShow)
		{
			#echo '<h1 class=moduleHeadline>' . $moduleTitleToShow . '</h1>';
		}?>

		<div id="<?php echo $modId; ?>" class="<?php echo $class;?> container">
			<?php if ($module->showtitle)
			{
				echo '<h1 class=moduleHeadline>' . $moduleTitleToShow . '</h1>';
			}?>
			<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">

				<?php foreach ($items as $key => $item)
				{ ?>
					<div class="px-3 ">

						<div class="card-bodyCycle mx-auto d-flex align-items-center text-center">
							<div class="card-text w-100 pt-0"><?php echo $i++; ?></div>
							<div class="card-icon"><span class="fas <?php echo $item->iconClass; ?>"></span></div>
						</div><!--/.card-bodyCycle -->

						<div class="card-bodyContent text-center">
							<h3 class="itemHeadline"><?php echo $item->title; ?></h3>
							<p><?php echo $item->text; ?></p>
						</div><!--/.card-bodyContent -->

					</div>
				<?php
				} ?>
			</div>
		</div>
	</div><!--/.section -->
</div>
