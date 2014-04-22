<?php
class View {

	public $topmenuPath = '';
	public $sidenavPath = '';
	public $content = '';
	public $contentframePath = '';
	public $modalforms = '';
	public $modalformPath = array();
	
	function __construct($logged_in){
		if($logged_in == true){
			$this->topnavPath = 'topmenus/welcomemenu';
			$this->contentframePath = 'contentframes/dashboardframe';
			switch (intval($_SESSION['user']['privilege'])) {
				case 5:
					$this->sidenavPath = 'sidenavs/admin';
					break;
				case 4:
					$this->sidenavPath = 'sidenavs/staff';
					break;
				case 3:
					$this->sidenavPath = 'sidenavs/jtk';
					break;
				case 2:
					$this->sidenavPath = 'sidenavs/pm';
					break;
				case 1:
					$this->sidenavPath = 'sidenavs/student';
					break;
			}
		}
		else{
			$this->topnavPath = 'topmenus/signinmenu';
			$this->modalformPath[] = 'modals/signin_modalform';
			$this->contentframePath = 'contentframes/fullpageframe';
		}
		
		$this->js[] = 'jquery-1.11.0.min';
		$this->js[] = 'bootstrap.min';
		$this->css[] = 'bootstrap.min';
		$this->css[] = 'bootstrap-theme.min';
		$this->css[] = 'font-awesome.min';
		$this->css[] = 'font-fsecure';
		$this->css[] = 'base';
	}
	
	public function render($page, $fullpage = false)
	{
		if($fullpage)
			$this->contentframePath = 'contentframes/fullpageframe';
			
		$this->topmenu = $this->getOutputbuffer($this->topnavPath);
		$this->sidenav = $this->getOutputbuffer($this->sidenavPath);
		$this->content = $this->getOutputbuffer($page . '_view');
		$this->contentframe = $this->getOutputbuffer($this->contentframePath);
		foreach($this->modalformPath as $modal)
			$this->modalforms .= $this->getOutputbuffer($modal);
		require 'views/templates/layout.php';  
	}
	
	private function getOutputbuffer($path){
		if($path!=''){
			ob_start();
			require 'views/' . $path . '.php';
			return ob_get_clean();
		}
		else
			return "";
	}

}
?>