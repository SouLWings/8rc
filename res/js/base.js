function setAjaxDelete(form, container)
{
	form.submit(function(){
		var url = $(this).attr('action');
        var post = $(this).serialize();
        $.post(url, post
		,function(data,status){
			if(status == 'success')
			{
				if(data['status'] == 'success')
				{
					container.fade();
				}
				else
				{
					alert(data['msg']);
				}
			}
			else
			{
				alert('Could not connect to server.');
			}
		},'json');
		return false;
	});
}


$(document).ready(function () {
});