<div class="modal fade" id="signinmodal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style=''>
		<div class="modal-content">
			<div class="modal-body">
				<form id='' action='<?php echo URL ?>user/signin' method='post' class='form-horizontal'>
					<fieldset>
						<legend>Sign in</legend>
						<div class='form-group'>
							<label class='col-lg-3 control-label'>Username:</label>
							<div class='col-lg-8'>
								<input required type='text' class='form-control' name='account'/>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-lg-3 control-label'>Password:</label>
							<div class='col-lg-8'>
								<input required type='password' class='form-control' name='password'/>
							</div>
						</div>
						<div class='submit-group'>
							<input type='submit' class='btn btn-primary' value='Sign in'/>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
    </div>
</div>
