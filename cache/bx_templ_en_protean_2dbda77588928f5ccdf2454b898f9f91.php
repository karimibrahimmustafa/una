<div id="bx-dbd-version" class="bx-dbd-block-content bx-def-margin-bottom">
	<div class="bx-dbd-virsion-image">
		<img src="http://localhost/una2/studio/template/images/dbd_version.svg"/>
	</div>
	<div class="bx-dbd-virsion-info">
		<div class="bx-def-margin-thd-top">UNA on&nbsp;<b><?php echo $a['domain'];?></b></div>
		<div class="bx-def-margin-thd-top">Version:&nbsp;<b><?php echo $a['version'];?></b>&nbsp;Installed:&nbsp;<b><?php echo $a['installed'];?></b></div>
		<div class="bx-dbd-version-available bx-def-margin-thd-top bx-clearfix"></div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			<?php echo $a['js_object'];?>.checkForUpgrade();
		});
	</script>
</div>