<?php
/*
 * This file is part of the Access to Memory (AtoM) software.
 *
 * Access to Memory (AtoM) is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Access to Memory (AtoM) is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Access to Memory (AtoM).  If not, see <http://www.gnu.org/licenses/>.
 */
?>
<?php
/*
 * @ 2022.12.03
 * Authors: Ricardo Pinho (ricardo.pinho@gisvm.com)
 *
 */
?>

<?php echo get_component('default', 'updateCheck') ?>

<?php echo get_component('default', 'privacyMessage') ?>

<?php if ($sf_user->isAdministrator() && (string)QubitSetting::getByName('siteBaseUrl') === ''): ?>
  <div class="site-warning">
    <?php echo link_to(__('Please configure your site base URL'), 'settings/siteInformation', array('rel' => 'home', 'title' => __('Home'))) ?>
  </div>
<?php endif; ?>

<header id="top-bar">
 <div id="logo-bar">
  <div class="container">
   <?php if (sfConfig::get('app_toggleLogo')): ?>
    <?php $pluginpath = substr(__DIR__, strpos(__DIR__, "/plugins"));
          $pluginpath = rtrim($pluginpath, "templates"); ?>
    <?php echo link_to(image_tag($pluginpath.'images/logo.png', array('alt' => 'Arquiv@')), '@homepage', array('id' => 'logo', 'rel' => 'home')) ?>
    <?php echo link_to(image_tag($pluginpath.'images/logo-republica-drcn.png', array('alt' => 'Arquiv@')), '@homepage', array('id' => 'republica_drcn', 'rel' => 'home')) ?>
   <?php endif; ?>

   <?php if (sfConfig::get('app_toggleTitle')): ?>
    <h1 id="site-name">
      <?php echo link_to('<span>'.esc_specialchars(sfConfig::get('app_siteTitle')).'</span>', '@homepage', array('rel' => 'home', 'title' => __('Home'))) ?>
    </h1>
   <?php endif; ?>
  </div>
 </div>
<div id="menu-bar">
 <div class="container">
  <div id="search-bar">
   <div style="float: right;">
    <nav>
    <?php echo get_component('menu', 'quickLinksMenu') ?>

    <?php echo get_component('menu', 'userMenu') ?>

    <?php echo get_component('menu', 'clipboardMenu') ?>

    <?php if (sfConfig::get('app_toggleLanguageMenu')): ?>
      <?php echo get_component('menu', 'changeLanguageMenu') ?>
    <?php endif; ?>

    <?php echo get_component('menu', 'mainMenu', array('sf_cache_key' => $sf_user->getCulture().$sf_user->getUserID())) ?>
    </nav>
   </div>

   <div>
    <?php echo get_component('menu', 'browseMenu', array('sf_cache_key' => $sf_user->getCulture().$sf_user->getUserID())) ?>
   </div>
   <div>
    <?php echo get_component('search', 'box') ?>
   </div>
  </div>
  <?php echo get_component_slot('header') ?>
 </div>
</div>
</header>

<?php if (sfConfig::get('app_toggleDescription')): ?>
  <div id="site-slogan">
    <div class="container">
      <div class="row">
        <div class="span12">
          <span><?php echo esc_specialchars(sfConfig::get('app_siteDescription')) ?></span>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
