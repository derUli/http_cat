<?php
class HttpCat extends Controller {
	private $moduleName = "http_cat";
	public function beforeHtml() {
		$status = check_status ();
		$status = explode ( " ", $status );
		$status = intval ( $status [0] );
		ViewBag::set ( "http_status_image", "https://http.cat/" . $status );
		if (startsWith ( $status, "4" ) or startsWith ( $status, "5" ) or (Request::getMethod () == "brew" || Request::hasVar ( "brew" ) || containsModule ( null, "teapot" ))) {
			HTMLResult ( Template::executeModuleTemplate ( $this->moduleName, "fullcat.php" ), intval ( $status ) );
		}
	}
	public function statusFilter($status) {
		if (Request::getMethod () == "brew" || Request::hasVar ( "brew" ) || containsModule ( null, "teapot" )) {
			$status = Request::getStatusCodeByNumber ( 418 );
		}
		return $status;
	}
	public function beforeMaintenanceMessage() {
		$this->beforeHtml ();
	}
	public function render() {
		return Template::executeModuleTemplate ( $this->moduleName, "cat.php" );
	}
}