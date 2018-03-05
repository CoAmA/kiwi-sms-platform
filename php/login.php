<?php 
    $message = '';
    if(isset($_POST['register_user_submit'])){ 
        $message = $User->loginUser($_POST);
    }
?>
<style>
	body,html{
		height:100%;
	}
	#page-wrapper{
		height:100%;
	}
	.container{
		height:100%;
	}
	#register-user-form{
		margin-top:19%;
	}
</style>
<div id="wrapper">
	<div id="page-wrapper">
		<div class="container">
                        <div class="row" style="background-color:#FFF;border-radius:10px;margin-top:200px;<?=($message==''?'height:0;':'')?>">
                            <div class="col-xs-12">
                                <?=($message=='pass_failed'?'Ați greșit parola, va rugăm introduceți-o din nou':($message=='credentials_failed'?'Nu avem înregistrat nici un utilizator cu acest cont vă rugăm introduceți din nou username-ul și parola.<br />Dacă problema persista vă rugăm contactați-ne la email-ul forms_support@kiwiagency.ro':''))?>
                            </div>
                        </div>
			<form id="register-user-form" action="" method="POST" class="jqValidation center-block" role="form">
				<div class="form-group">
					<label>Username or E-mail:</label>
					<input type="text" class="form-control" name="user_name" required>
				</div>
				<div class="form-group">
					<label>Password:</label>
					<input type="password" class="form-control" name="user_pass" required>
				</div>				
				<button type="submit" class="btn btn-default" name="register_user_submit">Submit</button>
			</form>
		</div>
	</div>
</div><!-- /#wrapper -->