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

<footer id="footer">

 <div class="container">

     <div id="DireitosDRCN">
        <h5>@ 2022 Direção Regional de Cultura do Norte<br/>
        Todos os direitos reservados</h5>
      </div>

      <div id="Logos-financiamento">
        <?php $pluginpath = substr(__DIR__, strpos(__DIR__, "/plugins"));$pluginpath = rtrim($pluginpath, "templates"); ?>
	  <?php echo image_tag($pluginpath.'images/logos-financiamento-footer.png', array('id' => 'atom-logo')) ?>
      </div>


  <?php if (QubitAcl::check('userInterface', 'translate')): ?>
    <?php echo get_component('sfTranslatePlugin', 'translate') ?>
  <?php endif; ?>

  <?php echo get_component_slot('footer') ?>

 </div>

  <div id="print-date">
    <?php echo __('Printed: %d%', array('%d%' => date('Y-m-d'))) ?>
  </div>

</footer>

<?php $gaKey = sfConfig::get('app_google_analytics_api_key', '') ?>
<?php if (!empty($gaKey)): ?>
  <script>
    window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
    ga('create', '<?php echo $gaKey ?>', 'auto');
    <?php include_slot('google_analytics') ?>
    ga('send', 'pageview');
  </script>
  <script async src='https://www.google-analytics.com/analytics.js'></script>
<?php endif; ?>
