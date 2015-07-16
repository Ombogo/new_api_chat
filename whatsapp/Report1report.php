<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "ewcfg11.php" ?>
<?php include_once "ewmysql11.php" ?>
<?php include_once "phpfn11.php" ?>
<?php

// Global variable for table object
$Report1 = NULL;

//
// Table class for Report1
//
class cReport1 extends cTableBase {
	var $Count28messages_message29;
	var $dtime;

	//
	// Table class constructor
	//
	function __construct() {
		global $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();
		$this->TableVar = 'Report1';
		$this->TableName = 'Report1';
		$this->TableType = 'REPORT';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PHPExcel only)
		$this->ExportExcelPageSize = ""; // Page size (PHPExcel only)
		$this->UserIDAllowSecurity = 0; // User ID Allow

		// Count(messages.message)
		$this->Count28messages_message29 = new cField('Report1', 'Report1', 'x_Count28messages_message29', 'Count(messages.message)', '`Count(messages.message)`', '`Count(messages.message)`', 20, -1, FALSE, '`Count(messages.message)`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->Count28messages_message29->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['Count(messages.message)'] = &$this->Count28messages_message29;

		// dtime
		$this->dtime = new cField('Report1', 'Report1', 'x_dtime', 'dtime', '`dtime`', '`dtime`', 200, -1, FALSE, '`dtime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['dtime'] = &$this->dtime;
	}

	// Report group level SQL
	var $_SqlGroupSelect = "";

	function getSqlGroupSelect() { // Select
		return ($this->_SqlGroupSelect <> "") ? $this->_SqlGroupSelect : "SELECT DISTINCT `dtime` FROM `view1`";
	}

	function SqlGroupSelect() { // For backward compatibility
    	return $this->getSqlGroupSelect();
	}

	function setSqlGroupSelect($v) {
    	$this->_SqlGroupSelect = $v;
	}
	var $_SqlGroupWhere = "";

	function getSqlGroupWhere() { // Where
		return ($this->_SqlGroupWhere <> "") ? $this->_SqlGroupWhere : "";
	}

	function SqlGroupWhere() { // For backward compatibility
    	return $this->getSqlGroupWhere();
	}

	function setSqlGroupWhere($v) {
    	$this->_SqlGroupWhere = $v;
	}
	var $_SqlGroupGroupBy = "";

	function getSqlGroupGroupBy() { // Group By
		return ($this->_SqlGroupGroupBy <> "") ? $this->_SqlGroupGroupBy : "";
	}

	function SqlGroupGroupBy() { // For backward compatibility
    	return $this->getSqlGroupGroupBy();
	}

	function setSqlGroupGroupBy($v) {
    	$this->_SqlGroupGroupBy = $v;
	}
	var $_SqlGroupHaving = "";

	function getSqlGroupHaving() { // Having
		return ($this->_SqlGroupHaving <> "") ? $this->_SqlGroupHaving : "";
	}

	function SqlGroupHaving() { // For backward compatibility
    	return $this->getSqlGroupHaving();
	}

	function setSqlGroupHaving($v) {
    	$this->_SqlGroupHaving = $v;
	}
	var $_SqlGroupOrderBy = "";

	function getSqlGroupOrderBy() { // Order By
		return ($this->_SqlGroupOrderBy <> "") ? $this->_SqlGroupOrderBy : "`dtime` ASC";
	}

	function SqlGroupOrderBy() { // For backward compatibility
    	return $this->getSqlGroupOrderBy();
	}

	function setSqlGroupOrderBy($v) {
    	$this->_SqlGroupOrderBy = $v;
	}

	// Report detail level SQL
	var $_SqlDetailSelect = "";

	function getSqlDetailSelect() { // Select
		return ($this->_SqlDetailSelect <> "") ? $this->_SqlDetailSelect : "SELECT * FROM `view1`";
	}

	function SqlDetailSelect() { // For backward compatibility
    	return $this->getSqlDetailSelect();
	}

	function setSqlDetailSelect($v) {
    	$this->_SqlDetailSelect = $v;
	}
	var $_SqlDetailWhere = "";

	function getSqlDetailWhere() { // Where
		return ($this->_SqlDetailWhere <> "") ? $this->_SqlDetailWhere : "";
	}

	function SqlDetailWhere() { // For backward compatibility
    	return $this->getSqlDetailWhere();
	}

	function setSqlDetailWhere($v) {
    	$this->_SqlDetailWhere = $v;
	}
	var $_SqlDetailGroupBy = "";

	function getSqlDetailGroupBy() { // Group By
		return ($this->_SqlDetailGroupBy <> "") ? $this->_SqlDetailGroupBy : "";
	}

	function SqlDetailGroupBy() { // For backward compatibility
    	return $this->getSqlDetailGroupBy();
	}

	function setSqlDetailGroupBy($v) {
    	$this->_SqlDetailGroupBy = $v;
	}
	var $_SqlDetailHaving = "";

	function getSqlDetailHaving() { // Having
		return ($this->_SqlDetailHaving <> "") ? $this->_SqlDetailHaving : "";
	}

	function SqlDetailHaving() { // For backward compatibility
    	return $this->getSqlDetailHaving();
	}

	function setSqlDetailHaving($v) {
    	$this->_SqlDetailHaving = $v;
	}
	var $_SqlDetailOrderBy = "";

	function getSqlDetailOrderBy() { // Order By
		return ($this->_SqlDetailOrderBy <> "") ? $this->_SqlDetailOrderBy : "";
	}

	function SqlDetailOrderBy() { // For backward compatibility
    	return $this->getSqlDetailOrderBy();
	}

	function setSqlDetailOrderBy($v) {
    	$this->_SqlDetailOrderBy = $v;
	}

	// Check if Anonymous User is allowed
	function AllowAnonymousUser() {
		switch (@$this->PageID) {
			case "add":
			case "register":
			case "addopt":
				return FALSE;
			case "edit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return FALSE;
			case "delete":
				return FALSE;
			case "view":
				return FALSE;
			case "search":
				return FALSE;
			default:
				return FALSE;
		}
	}

	// Apply User ID filters
	function ApplyUserIDFilters($sFilter) {
		return $sFilter;
	}

	// Check if User ID security allows view all
	function UserIDAllow($id = "") {
		$allow = EW_USER_ID_ALLOW;
		switch ($id) {
			case "add":
			case "copy":
			case "gridadd":
			case "register":
			case "addopt":
				return (($allow & 1) == 1);
			case "edit":
			case "gridedit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Report group SQL
	function GroupSQL() {
		$sFilter = $this->CurrentFilter;
		$sFilter = $this->ApplyUserIDFilters($sFilter);
		$sSort = "";
		return ew_BuildSelectSql($this->getSqlGroupSelect(), $this->getSqlGroupWhere(),
			 $this->getSqlGroupGroupBy(), $this->getSqlGroupHaving(),
			 $this->getSqlGroupOrderBy(), $sFilter, $sSort);
	}

	// Report detail SQL
	function DetailSQL() {
		$sFilter = $this->CurrentFilter;
		$sFilter = $this->ApplyUserIDFilters($sFilter);
		$sSort = "";
		return ew_BuildSelectSql($this->getSqlDetailSelect(), $this->getSqlDetailWhere(),
			$this->getSqlDetailGroupBy(), $this->getSqlDetailHaving(),
			$this->getSqlDetailOrderBy(), $sFilter, $sSort);
	}

	// Return page URL
	function getReturnUrl() {
		$name = EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ew_ServerVar("HTTP_REFERER") <> "" && ew_ReferPage() <> ew_CurrentPage() && ew_ReferPage() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ew_ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "Report1report.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function GetListUrl() {
		return "Report1report.php";
	}

	// View URL
	function GetViewUrl($parm = "") {
		if ($parm <> "")
			return $this->KeyUrl("", $this->UrlParm($parm));
		else
			return $this->KeyUrl("", $this->UrlParm(EW_TABLE_SHOW_DETAIL . "="));
	}

	// Add URL
	function GetAddUrl($parm = "") {
		if ($parm <> "")
			return "?" . $this->UrlParm($parm);
		else
			return "";
	}

	// Edit URL
	function GetEditUrl($parm = "") {
		return $this->KeyUrl("", $this->UrlParm($parm));
	}

	// Inline edit URL
	function GetInlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function GetCopyUrl($parm = "") {
		return $this->KeyUrl("", $this->UrlParm($parm));
	}

	// Inline copy URL
	function GetInlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function GetDeleteUrl() {
		return $this->KeyUrl("", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		return $sUrl;
	}

	// Sort URL
	function SortUrl(&$fld) {
		if ($this->CurrentAction <> "" || $this->Export <> "" ||
			in_array($fld->FldType, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$sUrlParm = $this->UrlParm("order=" . urlencode($fld->FldName) . "&amp;ordertype=" . $fld->ReverseSort());
			return ew_CurrentPage() . "?" . $sUrlParm;
		} else {
			return "";
		}
	}

	// Get record keys from $_POST/$_GET/$_SESSION
	function GetRecordKeys() {
		global $EW_COMPOSITE_KEY_SEPARATOR;
		$arKeys = array();
		$arKey = array();
		if (isset($_POST["key_m"])) {
			$arKeys = ew_StripSlashes($_POST["key_m"]);
			$cnt = count($arKeys);
		} elseif (isset($_GET["key_m"])) {
			$arKeys = ew_StripSlashes($_GET["key_m"]);
			$cnt = count($arKeys);
		} elseif (isset($_GET)) {

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = array();
		foreach ($arKeys as $key) {
			$ar[] = $key;
		}
		return $ar;
	}

	// Get key filter
	function GetKeyFilter() {
		$arKeys = $this->GetRecordKeys();
		$sKeyFilter = "";
		foreach ($arKeys as $key) {
			if ($sKeyFilter <> "") $sKeyFilter .= " OR ";
			$sKeyFilter .= "(" . $this->KeyFilter() . ")";
		}
		return $sKeyFilter;
	}

	// Load rows based on filter
	function &LoadRs($sFilter) {
		global $conn;

		// Set up filter (SQL WHERE clause) and get return SQL
		//$this->CurrentFilter = $sFilter;
		//$sSql = $this->SQL();

		$sSql = $this->GetSQL($sFilter, "");
		$rs = $conn->Execute($sSql);
		return $rs;
	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here	
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>); 

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>
<?php include_once "accountinfo.php" ?>
<?php include_once "userfn11.php" ?>
<?php

//
// Page class
//

$Report1_report = NULL; // Initialize page object first

class cReport1_report extends cReport1 {

	// Page ID
	var $PageID = 'report';

	// Project ID
	var $ProjectID = "{A5768E41-1B3D-4EFB-93F0-AE1113F97625}";

	// Table name
	var $TableName = 'Report1';

	// Page object name
	var $PageObjName = 'Report1_report';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		return $PageUrl;
	}

	// Page URLs
	var $AddUrl;
	var $EditUrl;
	var $CopyUrl;
	var $DeleteUrl;
	var $ViewUrl;
	var $ListUrl;

	// Export URLs
	var $ExportPrintUrl;
	var $ExportHtmlUrl;
	var $ExportExcelUrl;
	var $ExportWordUrl;
	var $ExportXmlUrl;
	var $ExportCsvUrl;
	var $ExportPdfUrl;

	// Custom export
	var $ExportExcelCustom = FALSE;
	var $ExportWordCustom = FALSE;
	var $ExportPdfCustom = FALSE;
	var $ExportEmailCustom = FALSE;

	// Update URLs
	var $InlineAddUrl;
	var $InlineCopyUrl;
	var $InlineEditUrl;
	var $GridAddUrl;
	var $GridEditUrl;
	var $MultiDeleteUrl;
	var $MultiUpdateUrl;

	// Message
	function getMessage() {
		return @$_SESSION[EW_SESSION_MESSAGE];
	}

	function setMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_MESSAGE], $v);
	}

	function getFailureMessage() {
		return @$_SESSION[EW_SESSION_FAILURE_MESSAGE];
	}

	function setFailureMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_FAILURE_MESSAGE], $v);
	}

	function getSuccessMessage() {
		return @$_SESSION[EW_SESSION_SUCCESS_MESSAGE];
	}

	function setSuccessMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_SUCCESS_MESSAGE], $v);
	}

	function getWarningMessage() {
		return @$_SESSION[EW_SESSION_WARNING_MESSAGE];
	}

	function setWarningMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_WARNING_MESSAGE], $v);
	}

	// Show message
	function ShowMessage() {
		$hidden = FALSE;
		$html = "";

		// Message
		$sMessage = $this->getMessage();
		$this->Message_Showing($sMessage, "");
		if ($sMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sMessage;
			$html .= "<div class=\"alert alert-info ewInfo\">" . $sMessage . "</div>";
			$_SESSION[EW_SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$sWarningMessage = $this->getWarningMessage();
		$this->Message_Showing($sWarningMessage, "warning");
		if ($sWarningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sWarningMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sWarningMessage;
			$html .= "<div class=\"alert alert-warning ewWarning\">" . $sWarningMessage . "</div>";
			$_SESSION[EW_SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$sSuccessMessage = $this->getSuccessMessage();
		$this->Message_Showing($sSuccessMessage, "success");
		if ($sSuccessMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sSuccessMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sSuccessMessage;
			$html .= "<div class=\"alert alert-success ewSuccess\">" . $sSuccessMessage . "</div>";
			$_SESSION[EW_SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$sErrorMessage = $this->getFailureMessage();
		$this->Message_Showing($sErrorMessage, "failure");
		if ($sErrorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sErrorMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sErrorMessage;
			$html .= "<div class=\"alert alert-danger ewError\">" . $sErrorMessage . "</div>";
			$_SESSION[EW_SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo "<div class=\"ewMessageDialog\"" . (($hidden) ? " style=\"display: none;\"" : "") . ">" . $html . "</div>";
	}
	var $PageHeader;
	var $PageFooter;

	// Show Page Header
	function ShowPageHeader() {
		$sHeader = $this->PageHeader;
		$this->Page_DataRendering($sHeader);
		if ($sHeader <> "") { // Header exists, display
			echo "<p>" . $sHeader . "</p>";
		}
	}

	// Show Page Footer
	function ShowPageFooter() {
		$sFooter = $this->PageFooter;
		$this->Page_DataRendered($sFooter);
		if ($sFooter <> "") { // Footer exists, display
			echo "<p>" . $sFooter . "</p>";
		}
	}

	// Validate page request
	function IsPageRequest() {
		return TRUE;
	}
	var $Token = "";
	var $CheckToken = EW_CHECK_TOKEN;
	var $CheckTokenFn = "ew_CheckToken";
	var $CreateTokenFn = "ew_CreateToken";

	// Valid Post
	function ValidPost() {
		if (!$this->CheckToken || !ew_IsHttpPost())
			return TRUE;
		if (!isset($_POST[EW_TOKEN_NAME]))
			return FALSE;
		$fn = $this->CheckTokenFn;
		if (is_callable($fn))
			return $fn($_POST[EW_TOKEN_NAME]);
		return FALSE;
	}

	// Create Token
	function CreateToken() {
		global $gsToken;
		if ($this->CheckToken) {
			$fn = $this->CreateTokenFn;
			if ($this->Token == "" && is_callable($fn)) // Create token
				$this->Token = $fn();
			$gsToken = $this->Token; // Save to global variable
		}
	}

	//
	// Page class constructor
	//
	function __construct() {
		global $conn, $Language;
		$GLOBALS["Page"] = &$this;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Parent constuctor
		parent::__construct();

		// Table object (Report1)
		if (!isset($GLOBALS["Report1"]) || get_class($GLOBALS["Report1"]) == "cReport1") {
			$GLOBALS["Report1"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["Report1"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";

		// Table object (account)
		if (!isset($GLOBALS['account'])) $GLOBALS['account'] = new caccount();

		// User table object (account)
		if (!isset($GLOBALS["UserTable"])) $GLOBALS["UserTable"] = new caccount();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'report', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'Report1', TRUE);

		// Start timer
		if (!isset($GLOBALS["gTimer"])) $GLOBALS["gTimer"] = new cTimer();

		// Open connection
		if (!isset($conn)) $conn = ew_Connect();

		// Export options
		$this->ExportOptions = new cListOptions();
		$this->ExportOptions->Tag = "div";
		$this->ExportOptions->TagClassName = "ewExportOption";
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsCustomExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;

		// Security
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate(ew_GetUrl("login.php"));
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel($this->ProjectID . $this->TableName);
		$Security->TablePermission_Loaded();
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Get export parameters
		$custom = "";
		if (@$_GET["export"] <> "") {
			$this->Export = $_GET["export"];
			$custom = @$_GET["custom"];
		} elseif (@$_POST["export"] <> "") {
			$this->Export = $_POST["export"];
			$custom = @$_POST["custom"];
		}
		$gsExportFile = $this->TableVar; // Get export file, used in header

		// Get custom export parameters
		if ($this->Export <> "" && $custom <> "") {
			$this->CustomExport = $this->Export;
			$this->Export = "print";
		}
		$gsCustomExport = $this->CustomExport;
		$gsExport = $this->Export; // Get export parameter, used in header

		// Update Export URLs
		if (defined("EW_USE_PHPEXCEL"))
			$this->ExportExcelCustom = FALSE;
		if ($this->ExportExcelCustom)
			$this->ExportExcelUrl .= "&amp;custom=1";
		if (defined("EW_USE_PHPWORD"))
			$this->ExportWordCustom = FALSE;
		if ($this->ExportWordCustom)
			$this->ExportWordUrl .= "&amp;custom=1";
		if ($this->ExportPdfCustom)
			$this->ExportPdfUrl .= "&amp;custom=1";
		$this->CurrentAction = (@$_GET["a"] <> "") ? $_GET["a"] : @$_POST["a_list"]; // Set up current action

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->ValidPost()) {
			echo $Language->Phrase("InvalidPostRequest");
			$this->Page_Terminate();
			exit();
		}

		// Create Token
		$this->CreateToken();
	}

	//
	// Page_Terminate
	//
	function Page_Terminate($url = "") {
		global $conn, $gsExportFile, $gTmpImages;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $EW_EXPORT_REPORT;
		if ($this->Export <> "" && array_key_exists($this->Export, $EW_EXPORT_REPORT)) {
			$sContent = ob_get_contents();
			$fn = $EW_EXPORT_REPORT[$this->Export];
			$this->$fn($sContent);
		}
		$this->Page_Redirecting($url);

		 // Close connection
		$conn->Close();

		// Go to URL if specified
		if ($url <> "") {
			if (!EW_DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			header("Location: " . $url);
		}
		exit();
	}
	var $ExportOptions; // Export options
	var $RecCnt = 0;
	var $ReportSql = "";
	var $ReportFilter = "";
	var $DefaultFilter = "";
	var $DbMasterFilter = "";
	var $DbDetailFilter = "";
	var $MasterRecordExists;
	var $Command;
	var $DtlRecordCount;
	var $ReportGroups;
	var $ReportCounts;
	var $LevelBreak;
	var $ReportTotals;
	var $ReportMaxs;
	var $ReportMins;
	var $Recordset;
	var $DetailRecordset;
	var $RecordExists;

	//
	// Page main
	//
	function Page_Main() {
		global $Language;
		$this->ReportGroups = &ew_InitArray(2, NULL);
		$this->ReportCounts = &ew_InitArray(2, 0);
		$this->LevelBreak = &ew_InitArray(2, FALSE);
		$this->ReportTotals = &ew_Init2DArray(2, 2, 0);
		$this->ReportMaxs = &ew_Init2DArray(2, 2, 0);
		$this->ReportMins = &ew_Init2DArray(2, 2, 0);

		// Set up Breadcrumb
		$this->SetupBreadcrumb();
	}

	// Check level break
	function ChkLvlBreak() {
		$this->LevelBreak[1] = FALSE;
		if ($this->RecCnt == 0) { // Start Or End of Recordset
			$this->LevelBreak[1] = TRUE;
		} else {
			if (!ew_CompareValue($this->dtime->CurrentValue, $this->ReportGroups[0])) {
				$this->LevelBreak[1] = TRUE;
			}
		}
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language;
		global $gsLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// Count(messages.message)
		// dtime

		if ($this->RowType == EW_ROWTYPE_VIEW) { // View row

			// Count(messages.message)
			$this->Count28messages_message29->ViewValue = $this->Count28messages_message29->CurrentValue;
			$this->Count28messages_message29->ViewCustomAttributes = "";

			// dtime
			$this->dtime->ViewValue = $this->dtime->CurrentValue;
			$this->dtime->ViewCustomAttributes = "";

			// Count(messages.message)
			$this->Count28messages_message29->LinkCustomAttributes = "";
			$this->Count28messages_message29->HrefValue = "";
			$this->Count28messages_message29->TooltipValue = "";

			// dtime
			$this->dtime->LinkCustomAttributes = "";
			$this->dtime->HrefValue = "";
			$this->dtime->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($this->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Set up Breadcrumb
	function SetupBreadcrumb() {
		global $Breadcrumb, $Language;
		$Breadcrumb = new cBreadcrumb();
		$url = substr(ew_CurrentUrl(), strrpos(ew_CurrentUrl(), "/")+1);
		$url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
		$Breadcrumb->Add("report", $this->TableVar, $url, "", $this->TableVar, TRUE);
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}
}
?>
<?php ew_Header(FALSE) ?>
<?php

// Create page object
if (!isset($Report1_report)) $Report1_report = new cReport1_report();

// Page init
$Report1_report->Page_Init();

// Page main
$Report1_report->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$Report1_report->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if ($Report1->Export == "") { ?>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<div class="ewToolbar">
<?php if ($Report1->Export == "") { ?>
<?php $Breadcrumb->Render(); ?>
<?php } ?>
<?php if ($Report1->Export == "") { ?>
<?php echo $Language->SelectionForm(); ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php
$Report1_report->DefaultFilter = "";
$Report1_report->ReportFilter = $Report1_report->DefaultFilter;
if (!$Security->CanReport()) {
	if ($Report1_report->ReportFilter <> "") $Report1_report->ReportFilter .= " AND ";
	$Report1_report->ReportFilter .= "(0=1)";
}
if ($Report1_report->DbDetailFilter <> "") {
	if ($Report1_report->ReportFilter <> "") $Report1_report->ReportFilter .= " AND ";
	$Report1_report->ReportFilter .= "(" . $Report1_report->DbDetailFilter . ")";
}

// Set up filter and load Group level sql
$Report1->CurrentFilter = $Report1_report->ReportFilter;
$Report1_report->ReportSql = $Report1->GroupSQL();

// Load recordset
$Report1_report->Recordset = $conn->Execute($Report1_report->ReportSql);
$Report1_report->RecordExists = !$Report1_report->Recordset->EOF;
?>
<?php if ($Report1->Export == "") { ?>
<?php if ($Report1_report->RecordExists) { ?>
<div class="ewViewExportOptions"><?php $Report1_report->ExportOptions->Render("body") ?></div>
<?php } ?>
<?php } ?>
<?php $Report1_report->ShowPageHeader(); ?>
<table class="ewReportTable">
<?php

// Get First Row
if ($Report1_report->RecordExists) {
	$Report1->dtime->setDbValue($Report1_report->Recordset->fields('dtime'));
	$Report1_report->ReportGroups[0] = $Report1->dtime->DbValue;
}
$Report1_report->RecCnt = 0;
$Report1_report->ReportCounts[0] = 0;
$Report1_report->ChkLvlBreak();
while (!$Report1_report->Recordset->EOF) {

	// Render for view
	$Report1->RowType = EW_ROWTYPE_VIEW;
	$Report1->ResetAttrs();
	$Report1_report->RenderRow();

	// Show group headers
	if ($Report1_report->LevelBreak[1]) { // Reset counter and aggregation
?>
	<tr><td class="ewGroupField"><?php echo $Report1->dtime->FldCaption() ?></td>
	<td colspan=1 class="ewGroupName">
<span<?php echo $Report1->dtime->ViewAttributes() ?>>
<?php echo $Report1->dtime->ViewValue ?></span>
</td></tr>
<?php
	}

	// Get detail records
	$Report1_report->ReportFilter = $Report1_report->DefaultFilter;
	if ($Report1_report->ReportFilter <> "") $Report1_report->ReportFilter .= " AND ";
	if (is_null($Report1->dtime->CurrentValue)) {
		$Report1_report->ReportFilter .= "(`dtime` IS NULL)";
	} else {
		$Report1_report->ReportFilter .= "(`dtime` = '" . ew_AdjustSql($Report1->dtime->CurrentValue) . "')";
	}
	if ($Report1_report->DbDetailFilter <> "") {
		if ($Report1_report->ReportFilter <> "")
			$Report1_report->ReportFilter .= " AND ";
		$Report1_report->ReportFilter .= "(" . $Report1_report->DbDetailFilter . ")";
	}
	if (!$Security->CanReport()) {
		if ($sFilter <> "") $sFilter .= " AND ";
		$sFilter .= "(0=1)";
	}

	// Set up detail SQL
	$Report1->CurrentFilter = $Report1_report->ReportFilter;
	$Report1_report->ReportSql = $Report1->DetailSQL();

	// Load detail records
	$Report1_report->DetailRecordset = $conn->Execute($Report1_report->ReportSql);
	$Report1_report->DtlRecordCount = $Report1_report->DetailRecordset->RecordCount();

	// Initialize aggregates
	if (!$Report1_report->DetailRecordset->EOF) {
		$Report1_report->RecCnt++;
		$Report1->Count28messages_message29->setDbValue($Report1_report->DetailRecordset->fields('Count(messages.message)'));
	}
	if ($Report1_report->RecCnt == 1) {
		$Report1_report->ReportCounts[0] = 0;
		$Report1_report->ReportTotals[0][0] = 0;
		if (!$Report1_report->DetailRecordset->EOF) {
			$Report1_report->ReportMins[0][0] = $Report1->Count28messages_message29->DbValue;
		} else {
			$Report1_report->ReportMins[0][0] = 0;
		}
		if (!$Report1_report->DetailRecordset->EOF) {
			$Report1_report->ReportMaxs[0][0] = $Report1->Count28messages_message29->DbValue;
		} else {
			$Report1_report->ReportMaxs[0][0] = 0;
		}
	}
	for ($i = 1; $i <= 1; $i++) {
		if ($Report1_report->LevelBreak[$i]) { // Reset counter and aggregation
			$Report1_report->ReportCounts[$i] = 0;
			$Report1_report->ReportTotals[$i][0] = 0;
			if (!$Report1_report->DetailRecordset->EOF) {
				$Report1_report->ReportMins[$i][0] = $Report1->Count28messages_message29->CurrentValue;
			} else {
				$Report1_report->ReportMins[$i][0] = 0;
			}
			if (!$Report1_report->DetailRecordset->EOF) {
				$Report1_report->ReportMaxs[$i][0] = $Report1->Count28messages_message29->CurrentValue;
			} else {
				$Report1_report->ReportMaxs[$i][0] = 0;
			}
		}
	}
	$Report1_report->ReportCounts[0] += $Report1_report->DtlRecordCount;
	$Report1_report->ReportCounts[1] += $Report1_report->DtlRecordCount;
	if ($Report1_report->RecordExists) {
?>
	<tr>
		<td><div class="ewGroupIndent"></div></td>
		<td class="ewGroupHeader"><?php echo $Report1->Count28messages_message29->FldCaption() ?></td>
	</tr>
<?php
	}
	while (!$Report1_report->DetailRecordset->EOF) {
		$Report1->Count28messages_message29->setDbValue($Report1_report->DetailRecordset->fields('Count(messages.message)'));
		$Report1_report->ReportTotals[0][0] += $Report1->Count28messages_message29->CurrentValue;
		if ($Report1_report->ReportMins[0][0] > $Report1->Count28messages_message29->CurrentValue)
			$Report1_report->ReportMins[0][0] = $Report1->Count28messages_message29->CurrentValue;
		if ($Report1_report->ReportMaxs[0][0] < $Report1->Count28messages_message29->CurrentValue)
			$Report1_report->ReportMaxs[0][0] = $Report1->Count28messages_message29->CurrentValue;
		$Report1_report->ReportTotals[1][0] += $Report1->Count28messages_message29->CurrentValue;
		if ($Report1_report->ReportMins[1][0] > $Report1->Count28messages_message29->CurrentValue)
			$Report1_report->ReportMins[1][0] = $Report1->Count28messages_message29->CurrentValue;
		if ($Report1_report->ReportMaxs[1][0] < $Report1->Count28messages_message29->CurrentValue)
			$Report1_report->ReportMaxs[1][0] = $Report1->Count28messages_message29->CurrentValue;

		// Render for view
		$Report1->RowType = EW_ROWTYPE_VIEW;
		$Report1->ResetAttrs();
		$Report1_report->RenderRow();
?>
	<tr>
		<td><div class="ewGroupIndent"></div></td>
		<td<?php echo $Report1->Count28messages_message29->CellAttributes() ?>>
<span<?php echo $Report1->Count28messages_message29->ViewAttributes() ?>>
<?php echo $Report1->Count28messages_message29->ViewValue ?></span>
</td>
	</tr>
<?php
		$Report1_report->DetailRecordset->MoveNext();
	}
	$Report1_report->DetailRecordset->Close();

	// Save old group data
	$Report1_report->ReportGroups[0] = $Report1->dtime->CurrentValue;

	// Get next record
	$Report1_report->Recordset->MoveNext();
	if ($Report1_report->Recordset->EOF) {
		$Report1_report->RecCnt = 0; // EOF, force all level breaks
	} else {
		$Report1->dtime->setDbValue($Report1_report->Recordset->fields('dtime'));
	}
	$Report1_report->ChkLvlBreak();

	// Show footers
	if ($Report1_report->LevelBreak[1]) {
		$Report1->dtime->CurrentValue = $Report1_report->ReportGroups[0];

		// Render row for view
		$Report1->RowType = EW_ROWTYPE_VIEW;
		$Report1->ResetAttrs();
		$Report1_report->RenderRow();
		$Report1->dtime->CurrentValue = $Report1->dtime->DbValue;
?>
	<tr><td colspan=2 class="ewGroupSummary"><?php echo $Language->Phrase("RptSumHead") ?>&nbsp;<?php echo $Report1->dtime->FldCaption() ?>:&nbsp;<?php echo $Report1->dtime->ViewValue ?> (<?php echo ew_FormatNumber($Report1_report->ReportCounts[1],0) ?> <?php echo $Language->Phrase("RptDtlRec") ?>)</td></tr>
<?php
	$Report1->Count28messages_message29->CurrentValue = $Report1_report->ReportTotals[1][0];

	// Render row for view
	$Report1->RowType = EW_ROWTYPE_VIEW;
	$Report1->ResetAttrs();
	$Report1_report->RenderRow();
?>
	<tr>
		<td class="ewGroupAggregate"><?php echo $Language->Phrase("RptSum") ?></td>
		<td<?php echo $Report1->Count28messages_message29->CellAttributes() ?>>
<span<?php echo $Report1->Count28messages_message29->ViewAttributes() ?>>
<?php echo $Report1->Count28messages_message29->ViewValue ?></span>
</td>
	</tr>
<?php
	if ($Report1_report->ReportCounts[1] > 0) {
		$Report1->Count28messages_message29->CurrentValue = $Report1_report->ReportTotals[1][0] / $Report1_report->ReportCounts[1];
	} else {
		$Report1->Count28messages_message29->CurrentValue = 0;
	}

	// Render row for view
	$Report1->RowType = EW_ROWTYPE_VIEW;
	$Report1->ResetAttrs();
	$Report1_report->RenderRow();
?>
	<tr>
		<td class="ewGroupAggregate"><?php echo $Language->Phrase("RptAvg") ?></td>
		<td<?php echo $Report1->Count28messages_message29->CellAttributes() ?>>
<span<?php echo $Report1->Count28messages_message29->ViewAttributes() ?>>
<?php echo $Report1->Count28messages_message29->ViewValue ?></span>
</td>
	</tr>
<?php
	$Report1->Count28messages_message29->CurrentValue = $Report1_report->ReportMins[1][0];

	// Render row for view
	$Report1->RowType = EW_ROWTYPE_VIEW;
	$Report1->ResetAttrs();
	$Report1_report->RenderRow();
?>
	<tr>
		<td class="ewGroupAggregate"><?php echo $Language->Phrase("RptMin") ?></td>
		<td<?php echo $Report1->Count28messages_message29->CellAttributes() ?>>
<span<?php echo $Report1->Count28messages_message29->ViewAttributes() ?>>
<?php echo $Report1->Count28messages_message29->ViewValue ?></span>
</td>
	</tr>
<?php
	$Report1->Count28messages_message29->CurrentValue = $Report1_report->ReportMaxs[1][0];

	// Render row for view
	$Report1->RowType = EW_ROWTYPE_VIEW;
	$Report1->ResetAttrs();
	$Report1_report->RenderRow();
?>
	<tr>
		<td class="ewGroupAggregate"><?php echo $Language->Phrase("RptMax") ?></td>
		<td<?php echo $Report1->Count28messages_message29->CellAttributes() ?>>
<span<?php echo $Report1->Count28messages_message29->ViewAttributes() ?>>
<?php echo $Report1->Count28messages_message29->ViewValue ?></span>
</td>
	</tr>
	<tr><td colspan=2>&nbsp;<br></td></tr>
<?php
}
}

// Close recordset
$Report1_report->Recordset->Close();
?>
<?php if ($Report1_report->RecordExists) { ?>
	<tr><td colspan=2>&nbsp;<br></td></tr>
	<tr><td colspan=2 class="ewGrandSummary"><?php echo $Language->Phrase("RptGrandTotal") ?>&nbsp;(<?php echo ew_FormatNumber($Report1_report->ReportCounts[0], 0) ?>&nbsp;<?php echo $Language->Phrase("RptDtlRec") ?>)</td></tr>
<?php
	$Report1->Count28messages_message29->CurrentValue = $Report1_report->ReportTotals[0][0];

	// Render row for view
	$Report1->RowType = EW_ROWTYPE_VIEW;
	$Report1->ResetAttrs();
	$Report1_report->RenderRow();
?>
	<tr>
		<td class="ewGroupAggregate"><?php echo $Language->Phrase("RptSum") ?></td>
		<td<?php echo $Report1->Count28messages_message29->CellAttributes() ?>>
<span<?php echo $Report1->Count28messages_message29->ViewAttributes() ?>>
<?php echo $Report1->Count28messages_message29->ViewValue ?></span>
</td>
	</tr>
<?php
	if ($Report1_report->ReportCounts[1] > 0) {
		$Report1->Count28messages_message29->CurrentValue = $Report1_report->ReportTotals[0][0] / $Report1_report->ReportCounts[0];
	} else {
		$Report1->Count28messages_message29->CurrentValue = 0;
	}

	// Render row for view
	$Report1->RowType = EW_ROWTYPE_VIEW;
	$Report1->ResetAttrs();
	$Report1_report->RenderRow();
?>
	<tr>
		<td class="ewGroupAggregate"><?php echo $Language->Phrase("RptAvg") ?></td>
		<td<?php echo $Report1->Count28messages_message29->CellAttributes() ?>>
<span<?php echo $Report1->Count28messages_message29->ViewAttributes() ?>>
<?php echo $Report1->Count28messages_message29->ViewValue ?></span>
</td>
	</tr>
<?php
	$Report1->Count28messages_message29->CurrentValue = $Report1_report->ReportMins[0][0];

	// Render row for view
	$Report1->RowType = EW_ROWTYPE_VIEW;
	$Report1->ResetAttrs();
	$Report1_report->RenderRow();
?>
	<tr>
		<td class="ewGroupAggregate"><?php echo $Language->Phrase("RptMin") ?></td>
		<td<?php echo $Report1->Count28messages_message29->CellAttributes() ?>>
<span<?php echo $Report1->Count28messages_message29->ViewAttributes() ?>>
<?php echo $Report1->Count28messages_message29->ViewValue ?></span>
</td>
	</tr>
<?php
	$Report1->Count28messages_message29->CurrentValue = $Report1_report->ReportMaxs[0][0];

	// Render row for view
	$Report1->RowType = EW_ROWTYPE_VIEW;
	$Report1->ResetAttrs();
	$Report1_report->RenderRow();
?>
	<tr>
		<td class="ewGroupAggregate"><?php echo $Language->Phrase("RptMax") ?></td>
		<td<?php echo $Report1->Count28messages_message29->CellAttributes() ?>>
<span<?php echo $Report1->Count28messages_message29->ViewAttributes() ?>>
<?php echo $Report1->Count28messages_message29->ViewValue ?></span>
</td>
	</tr>
<?php } ?>
<?php if ($Report1_report->RecordExists) { ?>
	<tr><td colspan=2>&nbsp;<br></td></tr>
<?php } else { ?>
	<tr><td><?php echo $Language->Phrase("NoRecord") ?></td></tr>
<?php } ?>
</table>
<?php
$Report1_report->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<?php if ($Report1->Export == "") { ?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$Report1_report->Page_Terminate();
?>
