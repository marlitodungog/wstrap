	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <?php
        echo $this->Html->script('bootstrap.min.js');
        echo $this->Html->script('bootstrap-modalmanager.js');
        echo $this->Html->script('bootstrap-modal.js');
        echo $this->Html->script('backend-application.js');
        echo $this->Html->script('/TinyMCE/js/tiny_mce/tiny_mce.js', array('inline' => false));
        echo $this->Html->script('ckeditor/ckeditor', array('inline' => false));
    ?>

	<script type="text/javascript">
	    $(function(){
	    	$('.has-tiny-mce').removeAttr('required');

	    	$('.btn-publish-update').click(function(){
	    		if ($(this).children().hasClass('fa-circle-o')) {
	    			$(this).children().removeClass('fa-circle-o');
	    			$(this).children().addClass('fa-check');
	    			$(this).children().attr('title','Set as Unpublish');
	    		}else{
	    			$(this).children().removeClass('fa-check');
	    			$(this).children().addClass('fa-circle-o');
	    			$(this).children().attr('title','Set as Publish');
	    		}

	    		var base_url = $(this).attr("base-url");
	    		var id = $(this).attr("update-id");

	    		$("#message-container").html('Updating...');
			    $("#trigger-modal-btn").trigger("click");
	    		$.post(base_url,{id:id},
			        function(o){
			            $("#message-container").html(o.message);
			    },"json");
	    	});

	    	$('.has-ck-finder').click(function(){
	    		openKCFinder_textbox($(this));
	    	});
	    });

	    $(function(){
		    $.fn.modalmanager.defaults.resize = true;  
		});

		CKEDITOR.replace( 'ckeditor', {
		    width: '600'
	    });

	    function openKCFinder_textbox(field) {
	    	console.log(field);
		    window.KCFinder = {
		        callBack: function(url) {
		            field.val(url);
		        }
		    };
		    window.open('/NixserSite/js/kcfinder/browse.php?type=images&dir=images', 'kcfinder_textbox',
		        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
		        'resizable=1, scrollbars=0, width=800, height=600'
		    );
		}
	</script>