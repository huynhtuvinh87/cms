<?php 
$this->title = 'Quản lý files';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filemanager">
    <div class="page-title">
        <div class="title_left">
            <h3>
                QUẢN LÝ FILES
            </h3>
        </div>
        
    </div>
    <div class="clearfix"></div>
	<div class="x_panel">
        <div class="x_content">
			<div id="smallContainer">
				<div id="iframeContainer">
					<iframe id="iframe" style="width:100%;" frameborder="0"
						src="/filemanager/dialog.php?type=0">
					</iframe>
				</div>
			</div>	
		</div>
	</div>		
</div>	

<?= $this->registerJs('
    var height = window.innerHeight;
    $(document).ready( function(){
        $("#iframe").css("height", height-200)
    });

')?>