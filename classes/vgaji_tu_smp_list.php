<?php
namespace PHPMaker2020\sigap;

/**
 * Page class
 */
class vgaji_tu_smp_list extends vgaji_tu_smp
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}";

	// Table name
	public $TableName = 'vgaji_tu_smp';

	// Page object name
	public $PageObjName = "vgaji_tu_smp_list";

	// Grid form hidden field names
	public $FormName = "fvgaji_tu_smplist";
	public $FormActionName = "k_action";
	public $FormKeyName = "k_key";
	public $FormOldKeyName = "k_oldkey";
	public $FormBlankRowName = "k_blankrow";
	public $FormKeyCountName = "key_count";

	// Page URLs
	public $AddUrl;
	public $EditUrl;
	public $CopyUrl;
	public $DeleteUrl;
	public $ViewUrl;
	public $ListUrl;

	// Export URLs
	public $ExportPrintUrl;
	public $ExportHtmlUrl;
	public $ExportExcelUrl;
	public $ExportWordUrl;
	public $ExportXmlUrl;
	public $ExportCsvUrl;
	public $ExportPdfUrl;

	// Custom export
	public $ExportExcelCustom = FALSE;
	public $ExportWordCustom = FALSE;
	public $ExportPdfCustom = FALSE;
	public $ExportEmailCustom = FALSE;

	// Update URLs
	public $InlineAddUrl;
	public $InlineCopyUrl;
	public $InlineEditUrl;
	public $GridAddUrl;
	public $GridEditUrl;
	public $MultiDeleteUrl;
	public $MultiUpdateUrl;

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken;

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading != "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading != "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->phrase($this->PageID);
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		$url = CurrentPageName() . "?";
		if ($this->UseTokenInUrl)
			$url .= "t=" . $this->TableVar . "&"; // Add page token
		return $url;
	}

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

	// Get message
	public function getMessage()
	{
		return isset($_SESSION[SESSION_MESSAGE]) ? $_SESSION[SESSION_MESSAGE] : $this->_message;
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($this->_message, $v);
		$_SESSION[SESSION_MESSAGE] = $this->_message;
	}

	// Get failure message
	public function getFailureMessage()
	{
		return isset($_SESSION[SESSION_FAILURE_MESSAGE]) ? $_SESSION[SESSION_FAILURE_MESSAGE] : $this->_failureMessage;
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($this->_failureMessage, $v);
		$_SESSION[SESSION_FAILURE_MESSAGE] = $this->_failureMessage;
	}

	// Get success message
	public function getSuccessMessage()
	{
		return isset($_SESSION[SESSION_SUCCESS_MESSAGE]) ? $_SESSION[SESSION_SUCCESS_MESSAGE] : $this->_successMessage;
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($this->_successMessage, $v);
		$_SESSION[SESSION_SUCCESS_MESSAGE] = $this->_successMessage;
	}

	// Get warning message
	public function getWarningMessage()
	{
		return isset($_SESSION[SESSION_WARNING_MESSAGE]) ? $_SESSION[SESSION_WARNING_MESSAGE] : $this->_warningMessage;
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($this->_warningMessage, $v);
		$_SESSION[SESSION_WARNING_MESSAGE] = $this->_warningMessage;
	}

	// Clear message
	public function clearMessage()
	{
		$this->_message = "";
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$this->_failureMessage = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$this->_successMessage = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$this->_warningMessage = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$this->clearMessage();
		$this->clearFailureMessage();
		$this->clearSuccessMessage();
		$this->clearWarningMessage();
	}

	// Show message
	public function showMessage()
	{
		$hidden = TRUE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message != "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fas fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage != "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fas fa-exclamation"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage != "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fas fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage != "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fas fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = [];

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message != "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage != "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage != "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage != "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header != "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer != "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
			if (Get("t") !== NULL)
				return ($this->TableVar == Get("t"));
		}
		return TRUE;
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(Config("TOKEN_NAME")) === NULL)
			return FALSE;
		$fn = Config("CHECK_TOKEN_FUNC");
		if (is_callable($fn))
			return $fn(Post(Config("TOKEN_NAME")), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = Config("CREATE_TOKEN_FUNC"); // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $DashboardReport;
		global $UserTable;

		// Check token
		$this->CheckToken = Config("CHECK_TOKEN");

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (vgaji_tu_smp)
		if (!isset($GLOBALS["vgaji_tu_smp"]) || get_class($GLOBALS["vgaji_tu_smp"]) == PROJECT_NAMESPACE . "vgaji_tu_smp") {
			$GLOBALS["vgaji_tu_smp"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["vgaji_tu_smp"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "vgaji_tu_smpadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "vgaji_tu_smpdelete.php";
		$this->MultiUpdateUrl = "vgaji_tu_smpupdate.php";

		// Table object (pegawai)
		if (!isset($GLOBALS['pegawai']))
			$GLOBALS['pegawai'] = new pegawai();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'vgaji_tu_smp');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = $this->getConnection();

		// User table object (pegawai)
		$UserTable = $UserTable ?: new pegawai();

		// List options
		$this->ListOptions = new ListOptions();
		$this->ListOptions->TableVar = $this->TableVar;

		// Export options
		$this->ExportOptions = new ListOptions("div");
		$this->ExportOptions->TagClassName = "ew-export-option";

		// Import options
		$this->ImportOptions = new ListOptions("div");
		$this->ImportOptions->TagClassName = "ew-import-option";

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["addedit"] = new ListOptions("div");
		$this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
		$this->OtherOptions["detail"] = new ListOptions("div");
		$this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
		$this->OtherOptions["action"] = new ListOptions("div");
		$this->OtherOptions["action"]->TagClassName = "ew-action-option";

		// Filter options
		$this->FilterOptions = new ListOptions("div");
		$this->FilterOptions->TagClassName = "ew-filter-option fvgaji_tu_smplistsrch";

		// List actions
		$this->ListActions = new ListActions();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages, $DashboardReport;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $vgaji_tu_smp;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($vgaji_tu_smp);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessages()));
			return;
		}

		// Go to URL if specified
		if ($url != "") {
			if (!Config("DEBUG") && ob_get_length())
				ob_end_clean();
			SaveDebugMessage();
			AddHeader("Location", $url);
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = [];
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = [];
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									Config("API_FIELD_NAME") . "=" . $fld->Param . "&" .
									Config("API_KEY_NAME") . "=" . rawurlencode($this->getRecordKeyValue($ar)))); //*** need to add this? API may not be in the same folder
								$row[$fldname] = ["type" => ContentType($val), "url" => $url, "name" => $fld->Param . ContentExtension($val)];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, Config("MULTIPLE_UPLOAD_SEPARATOR"))) { // Single file
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									"fn=" . Encrypt($fld->physicalUploadPath() . $val)));
								$row[$fldname] = ["type" => MimeContentType($val), "url" => $url, "name" => $val];
							} else { // Multiple files
								$files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
								$ar = [];
								foreach ($files as $file) {
									$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
										Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
										"fn=" . Encrypt($fld->physicalUploadPath() . $file)));
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => $url, "name" => $file];
								}
								$row[$fldname] = $ar;
							}
						}
					} else {
						if ($fld->DataType == DATATYPE_MEMO && $fld->MemoMaxLength > 0)
							$val = TruncateMemo($val, $fld->MemoMaxLength, $fld->TruncateMemoRemoveHtml);
						$row[$fldname] = $val;
					}
				}
			}
		}
		return $row;
	}

	// Get record key value from array
	protected function getRecordKeyValue($ar)
	{
		$key = "";
		if (is_array($ar)) {
			$key .= @$ar['id'];
		}
		return $key;
	}

	/**
	 * Hide fields for add/edit
	 *
	 * @return void
	 */
	protected function hideFieldsForAddEdit()
	{
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->id->Visible = FALSE;
	}

	// Lookup data
	public function lookup()
	{
		global $Language, $Security;
		if (!isset($Language))
			$Language = new Language(Config("LANGUAGE_FOLDER"), Post("language", ""));

		// Set up API request
		if (!ValidApiRequest())
			return FALSE;
		$this->setupApiSecurity();

		// Get lookup object
		$fieldName = Post("field");
		if (!array_key_exists($fieldName, $this->fields))
			return FALSE;
		$lookupField = $this->fields[$fieldName];
		$lookup = $lookupField->Lookup;
		if ($lookup === NULL)
			return FALSE;
		$tbl = $lookup->getTable();
		if (!$Security->allowLookup(Config("PROJECT_ID") . $tbl->TableName)) // Lookup permission
			return FALSE;

		// Get lookup parameters
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Param("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = Config("AUTO_SUGGEST_MAX_ENTRIES");
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));
		$keys = Post("keys");
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
			if (is_array($keys))
				$keys = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $keys);
			$lookup->FilterFields = []; // Skip parent fields if any
			$lookup->FilterValues[] = $keys; // Lookup values
			$pageSize = -1; // Show all records
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($lookup->FilterFields) ? count($lookup->FilterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect != "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter != "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy != "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson($this); // Use settings from current page
	}

	// Set up API security
	public function setupApiSecurity()
	{
		global $Security;

		// Setup security for API request
		if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
		$Security->loadCurrentUserLevel(Config("PROJECT_ID") . $this->TableName);
		if ($Security->isLoggedIn()) $Security->TablePermission_Loaded();
	}

	// Class variables
	public $ListOptions; // List options
	public $ExportOptions; // Export options
	public $SearchOptions; // Search options
	public $OtherOptions; // Other options
	public $FilterOptions; // Filter options
	public $ImportOptions; // Import options
	public $ListActions; // List actions
	public $SelectedCount = 0;
	public $SelectedIndex = 0;
	public $DisplayRecords = 30;
	public $StartRecord;
	public $StopRecord;
	public $TotalRecords = 0;
	public $RecordRange = 10;
	public $PageSizes = "10,20,30,50,-1"; // Page sizes (comma separated)
	public $DefaultSearchWhere = ""; // Default search WHERE clause
	public $SearchWhere = ""; // Search WHERE clause
	public $SearchPanelClass = "ew-search-panel collapse show"; // Search Panel class
	public $SearchRowCount = 0; // For extended search
	public $SearchColumnCount = 0; // For extended search
	public $SearchFieldsPerRow = 1; // For extended search
	public $RecordCount = 0; // Record count
	public $EditRowCount;
	public $StartRowCount = 1;
	public $RowCount = 0;
	public $Attrs = []; // Row attributes and cell attributes
	public $RowIndex = 0; // Row index
	public $KeyCount = 0; // Key count
	public $RowAction = ""; // Row action
	public $RowOldKey = ""; // Row old key (for copy)
	public $MultiColumnClass = "col-sm";
	public $MultiColumnEditClass = "w-100";
	public $DbMasterFilter = ""; // Master filter
	public $DbDetailFilter = ""; // Detail filter
	public $MasterRecordExists;
	public $MultiSelectKey;
	public $Command;
	public $RestoreSearch = FALSE;
	public $DetailPages;
	public $OldRecordset;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$FormError, $SearchError;

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
			if (!$Security->canList()) {
				SetStatus(401); // Unauthorized
				return;
			}
		} else {
			$Security = new AdvancedSecurity();
			if (!$Security->isLoggedIn())
				$Security->autoLogin();
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName);
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loaded();
			if (!$Security->canList()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				$this->terminate(GetUrl("index.php"));
				return;
			}
		}

		// Get export parameters
		$custom = "";
		if (Param("export") !== NULL) {
			$this->Export = Param("export");
			$custom = Param("custom", "");
		} elseif (IsPost()) {
			if (Post("exporttype") !== NULL)
				$this->Export = Post("exporttype");
			$custom = Post("custom", "");
		} elseif (Get("cmd") == "json") {
			$this->Export = Get("cmd");
		} else {
			$this->setExportReturnUrl(CurrentUrl());
		}
		$ExportFileName = $this->TableVar; // Get export file, used in header

		// Get custom export parameters
		if ($this->isExport() && $custom != "") {
			$this->CustomExport = $this->Export;
			$this->Export = "print";
		}
		$CustomExportType = $this->CustomExport;
		$ExportType = $this->Export; // Get export parameter, used in header

		// Update Export URLs
		if (Config("USE_PHPEXCEL"))
			$this->ExportExcelCustom = FALSE;
		if ($this->ExportExcelCustom)
			$this->ExportExcelUrl .= "&amp;custom=1";
		if (Config("USE_PHPWORD"))
			$this->ExportWordCustom = FALSE;
		if ($this->ExportWordCustom)
			$this->ExportWordUrl .= "&amp;custom=1";
		if ($this->ExportPdfCustom)
			$this->ExportPdfUrl .= "&amp;custom=1";
		$this->CurrentAction = Param("action"); // Set up current action

		// Get grid add count
		$gridaddcnt = Get(Config("TABLE_GRID_ADD_ROW_COUNT"), "");
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->setupListOptions();

		// Setup export options
		$this->setupExportOptions();
		$this->id->Visible = FALSE;
		$this->pid->Visible = FALSE;
		$this->tahun->setVisibility();
		$this->bulan->setVisibility();
		$this->pegawai->setVisibility();
		$this->jenjang_id->setVisibility();
		$this->jabatan_id->setVisibility();
		$this->lama_kerja->setVisibility();
		$this->ijasah->setVisibility();
		$this->type_jabatan->setVisibility();
		$this->tambahan->setVisibility();
		$this->sertif->setVisibility();
		$this->gapok->setVisibility();
		$this->kehadiran->setVisibility();
		$this->value_kehadiran->setVisibility();
		$this->lembur->setVisibility();
		$this->value_lembur->setVisibility();
		$this->value_reward->setVisibility();
		$this->value_inval->setVisibility();
		$this->piket_count->setVisibility();
		$this->value_piket->setVisibility();
		$this->tugastambahan->setVisibility();
		$this->tj_jabatan->setVisibility();
		$this->tunjangan2->setVisibility();
		$this->sub_total->setVisibility();
		$this->potongan->setVisibility();
		$this->penyesuaian->setVisibility();
		$this->total->setVisibility();
		$this->voucher->setVisibility();
		$this->hideFieldsForAddEdit();

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();

		// Setup other options
		$this->setupOtherOptions();

		// Set up custom action (compatible with old version)
		foreach ($this->CustomActions as $name => $action)
			$this->ListActions->add($name, $action);

		// Show checkbox column if multiple action
		foreach ($this->ListActions->Items as $listaction) {
			if ($listaction->Select == ACTION_MULTIPLE && $listaction->Allow) {
				$this->ListOptions["checkbox"]->Visible = TRUE;
				break;
			}
		}

		// Set up lookup cache
		$this->setupLookupOptions($this->bulan);
		$this->setupLookupOptions($this->pegawai);
		$this->setupLookupOptions($this->jenjang_id);
		$this->setupLookupOptions($this->jabatan_id);
		$this->setupLookupOptions($this->type_jabatan);
		$this->setupLookupOptions($this->tambahan);
		$this->setupLookupOptions($this->sertif);

		// Search filters
		$srchAdvanced = ""; // Advanced search filter
		$srchBasic = ""; // Basic search filter
		$filter = "";

		// Get command
		$this->Command = strtolower(Get("cmd"));
		if ($this->isPageRequest()) { // Validate request

			// Process list action first
			if ($this->processListAction()) // Ajax request
				$this->terminate();

			// Set up records per page
			$this->setupDisplayRecords();

			// Handle reset command
			$this->resetCmd();

			// Set up Breadcrumb
			if (!$this->isExport())
				$this->setupBreadcrumb();

			// Hide list options
			if ($this->isExport()) {
				$this->ListOptions->hideAllOptions(["sequence"]);
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			} elseif ($this->isGridAdd() || $this->isGridEdit()) {
				$this->ListOptions->hideAllOptions();
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			}

			// Hide options
			if ($this->isExport() || $this->CurrentAction) {
				$this->ExportOptions->hideAllOptions();
				$this->FilterOptions->hideAllOptions();
				$this->ImportOptions->hideAllOptions();
			}

			// Hide other options
			if ($this->isExport())
				$this->OtherOptions->hideAllOptions();

			// Get default search criteria
			AddFilter($this->DefaultSearchWhere, $this->basicSearchWhere(TRUE));
			AddFilter($this->DefaultSearchWhere, $this->advancedSearchWhere(TRUE));

			// Get basic search values
			$this->loadBasicSearchValues();

			// Get and validate search values for advanced search
			$this->loadSearchValues(); // Get search values

			// Process filter list
			if ($this->processFilterList())
				$this->terminate();
			if (!$this->validateSearch())
				$this->setFailureMessage($SearchError);

			// Restore search parms from Session if not searching / reset / export
			if (($this->isExport() || $this->Command != "search" && $this->Command != "reset" && $this->Command != "resetall") && $this->Command != "json" && $this->checkSearchParms())
				$this->restoreSearchParms();

			// Call Recordset SearchValidated event
			$this->Recordset_SearchValidated();

			// Set up sorting order
			$this->setupSortOrder();

			// Get basic search criteria
			if ($SearchError == "")
				$srchBasic = $this->basicSearchWhere();

			// Get search criteria for advanced search
			if ($SearchError == "")
				$srchAdvanced = $this->advancedSearchWhere();
		}

		// Restore display records
		if ($this->Command != "json" && $this->getRecordsPerPage() != "") {
			$this->DisplayRecords = $this->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecords = 30; // Load default
			$this->setRecordsPerPage($this->DisplayRecords); // Save default to Session
		}

		// Load Sorting Order
		if ($this->Command != "json")
			$this->loadSortOrder();

		// Load search default if no existing search criteria
		if (!$this->checkSearchParms()) {

			// Load basic search from default
			$this->BasicSearch->loadDefault();
			if ($this->BasicSearch->Keyword != "")
				$srchBasic = $this->basicSearchWhere();

			// Load advanced search from default
			if ($this->loadAdvancedSearchDefault()) {
				$srchAdvanced = $this->advancedSearchWhere();
			}
		}

		// Restore search settings from Session
		if ($SearchError == "")
			$this->loadAdvancedSearch();

		// Build search criteria
		AddFilter($this->SearchWhere, $srchAdvanced);
		AddFilter($this->SearchWhere, $srchBasic);

		// Call Recordset_Searching event
		$this->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->Command == "search" && !$this->RestoreSearch) {
			$this->setSearchWhere($this->SearchWhere); // Save to Session
			$this->StartRecord = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRecord);
		} elseif ($this->Command != "json") {
			$this->SearchWhere = $this->getSearchWhere();
		}

		// Build filter
		$filter = "";
		if (!$Security->canList())
			$filter = "(0=1)"; // Filter all records
		AddFilter($filter, $this->DbDetailFilter);
		AddFilter($filter, $this->SearchWhere);

		// Set up filter
		if ($this->Command == "json") {
			$this->UseSessionForListSql = FALSE; // Do not use session for ListSQL
			$this->CurrentFilter = $filter;
		} else {
			$this->setSessionWhere($filter);
			$this->CurrentFilter = "";
		}

		// Export data only
		if (!$this->CustomExport && in_array($this->Export, array_keys(Config("EXPORT_CLASSES")))) {
			$this->exportData();
			$this->terminate();
		}
		if ($this->isGridAdd()) {
			$this->CurrentFilter = "0=1";
			$this->StartRecord = 1;
			$this->DisplayRecords = $this->GridAddRowCount;
			$this->TotalRecords = $this->DisplayRecords;
			$this->StopRecord = $this->DisplayRecords;
		} else {
			$selectLimit = $this->UseSelectLimit;
			if ($selectLimit) {
				$this->TotalRecords = $this->listRecordCount();
			} else {
				if ($this->Recordset = $this->loadRecordset())
					$this->TotalRecords = $this->Recordset->RecordCount();
			}
			$this->StartRecord = 1;
			if ($this->DisplayRecords <= 0 || ($this->isExport() && $this->ExportAll)) // Display all records
				$this->DisplayRecords = $this->TotalRecords;
			if (!($this->isExport() && $this->ExportAll)) // Set up start record position
				$this->setupStartRecord();
			if ($selectLimit)
				$this->Recordset = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords);

			// Set no record found message
			if (!$this->CurrentAction && $this->TotalRecords == 0) {
				if (!$Security->canList())
					$this->setWarningMessage(DeniedMessage());
				if ($this->SearchWhere == "0=101")
					$this->setWarningMessage($Language->phrase("EnterSearchCriteria"));
				else
					$this->setWarningMessage($Language->phrase("NoRecord"));
			}
		}

		// Search options
		$this->setupSearchOptions();

		// Set up search panel class
		if ($this->SearchWhere != "")
			AppendClass($this->SearchPanelClass, "show");

		// Normal return
		if (IsApi()) {
			$rows = $this->getRecordsFromRecordset($this->Recordset);
			$this->Recordset->close();
			WriteJson(["success" => TRUE, $this->TableVar => $rows, "totalRecordCount" => $this->TotalRecords]);
			$this->terminate(TRUE);
		}

		// Set up pager
		$this->Pager = new PrevNextPager($this->StartRecord, $this->getRecordsPerPage(), $this->TotalRecords, $this->PageSizes, $this->RecordRange, $this->AutoHidePager, $this->AutoHidePageSizeSelector);
	}

	// Set up number of records displayed per page
	protected function setupDisplayRecords()
	{
		$wrk = Get(Config("TABLE_REC_PER_PAGE"), "");
		if ($wrk != "") {
			if (is_numeric($wrk)) {
				$this->DisplayRecords = (int)$wrk;
			} else {
				if (SameText($wrk, "all")) { // Display all records
					$this->DisplayRecords = -1;
				} else {
					$this->DisplayRecords = 30; // Non-numeric, load default
				}
			}
			$this->setRecordsPerPage($this->DisplayRecords); // Save to Session

			// Reset start position
			$this->StartRecord = 1;
			$this->setStartRecordNumber($this->StartRecord);
		}
	}

	// Build filter for all keys
	protected function buildKeyFilter()
	{
		global $CurrentForm;
		$wrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$CurrentForm->Index = $rowindex;
		$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		while ($thisKey != "") {
			if ($this->setupKeyValues($thisKey)) {
				$filter = $this->getRecordFilter();
				if ($wrkFilter != "")
					$wrkFilter .= " OR ";
				$wrkFilter .= $filter;
			} else {
				$wrkFilter = "0=1";
				break;
			}

			// Update row index and get row key
			$rowindex++; // Next row
			$CurrentForm->Index = $rowindex;
			$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		}
		return $wrkFilter;
	}

	// Set up key values
	protected function setupKeyValues($key)
	{
		$arKeyFlds = explode(Config("COMPOSITE_KEY_SEPARATOR"), $key);
		if (count($arKeyFlds) >= 1) {
			$this->id->setOldValue($arKeyFlds[0]);
			if (!is_numeric($this->id->OldValue))
				return FALSE;
		}
		return TRUE;
	}

	// Get list of filters
	public function getFilterList()
	{
		global $UserProfile;

		// Initialize
		$filterList = "";
		$savedFilterList = "";
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->pid->AdvancedSearch->toJson(), ","); // Field pid
		$filterList = Concat($filterList, $this->tahun->AdvancedSearch->toJson(), ","); // Field tahun
		$filterList = Concat($filterList, $this->bulan->AdvancedSearch->toJson(), ","); // Field bulan
		$filterList = Concat($filterList, $this->pegawai->AdvancedSearch->toJson(), ","); // Field pegawai
		$filterList = Concat($filterList, $this->jenjang_id->AdvancedSearch->toJson(), ","); // Field jenjang_id
		$filterList = Concat($filterList, $this->jabatan_id->AdvancedSearch->toJson(), ","); // Field jabatan_id
		$filterList = Concat($filterList, $this->lama_kerja->AdvancedSearch->toJson(), ","); // Field lama_kerja
		$filterList = Concat($filterList, $this->ijasah->AdvancedSearch->toJson(), ","); // Field ijasah
		$filterList = Concat($filterList, $this->type_jabatan->AdvancedSearch->toJson(), ","); // Field type_jabatan
		$filterList = Concat($filterList, $this->tambahan->AdvancedSearch->toJson(), ","); // Field tambahan
		$filterList = Concat($filterList, $this->sertif->AdvancedSearch->toJson(), ","); // Field sertif
		$filterList = Concat($filterList, $this->gapok->AdvancedSearch->toJson(), ","); // Field gapok
		$filterList = Concat($filterList, $this->kehadiran->AdvancedSearch->toJson(), ","); // Field kehadiran
		$filterList = Concat($filterList, $this->value_kehadiran->AdvancedSearch->toJson(), ","); // Field value_kehadiran
		$filterList = Concat($filterList, $this->lembur->AdvancedSearch->toJson(), ","); // Field lembur
		$filterList = Concat($filterList, $this->value_lembur->AdvancedSearch->toJson(), ","); // Field value_lembur
		$filterList = Concat($filterList, $this->value_reward->AdvancedSearch->toJson(), ","); // Field value_reward
		$filterList = Concat($filterList, $this->value_inval->AdvancedSearch->toJson(), ","); // Field value_inval
		$filterList = Concat($filterList, $this->piket_count->AdvancedSearch->toJson(), ","); // Field piket_count
		$filterList = Concat($filterList, $this->value_piket->AdvancedSearch->toJson(), ","); // Field value_piket
		$filterList = Concat($filterList, $this->tugastambahan->AdvancedSearch->toJson(), ","); // Field tugastambahan
		$filterList = Concat($filterList, $this->tj_jabatan->AdvancedSearch->toJson(), ","); // Field tj_jabatan
		$filterList = Concat($filterList, $this->tunjangan2->AdvancedSearch->toJson(), ","); // Field tunjangan2
		$filterList = Concat($filterList, $this->sub_total->AdvancedSearch->toJson(), ","); // Field sub_total
		$filterList = Concat($filterList, $this->potongan->AdvancedSearch->toJson(), ","); // Field potongan
		$filterList = Concat($filterList, $this->penyesuaian->AdvancedSearch->toJson(), ","); // Field penyesuaian
		$filterList = Concat($filterList, $this->total->AdvancedSearch->toJson(), ","); // Field total
		$filterList = Concat($filterList, $this->voucher->AdvancedSearch->toJson(), ","); // Field voucher
		if ($this->BasicSearch->Keyword != "") {
			$wrk = "\"" . Config("TABLE_BASIC_SEARCH") . "\":\"" . JsEncode($this->BasicSearch->Keyword) . "\",\"" . Config("TABLE_BASIC_SEARCH_TYPE") . "\":\"" . JsEncode($this->BasicSearch->Type) . "\"";
			$filterList = Concat($filterList, $wrk, ",");
		}

		// Return filter list in JSON
		if ($filterList != "")
			$filterList = "\"data\":{" . $filterList . "}";
		if ($savedFilterList != "")
			$filterList = Concat($filterList, "\"filters\":" . $savedFilterList, ",");
		return ($filterList != "") ? "{" . $filterList . "}" : "null";
	}

	// Process filter list
	protected function processFilterList()
	{
		global $UserProfile;
		if (Post("ajax") == "savefilters") { // Save filter request (Ajax)
			$filters = Post("filters");
			$UserProfile->setSearchFilters(CurrentUserName(), "fvgaji_tu_smplistsrch", $filters);
			WriteJson([["success" => TRUE]]); // Success
			return TRUE;
		} elseif (Post("cmd") == "resetfilter") {
			$this->restoreFilterList();
		}
		return FALSE;
	}

	// Restore list of filters
	protected function restoreFilterList()
	{

		// Return if not reset filter
		if (Post("cmd") !== "resetfilter")
			return FALSE;
		$filter = json_decode(Post("filter"), TRUE);
		$this->Command = "search";

		// Field id
		$this->id->AdvancedSearch->SearchValue = @$filter["x_id"];
		$this->id->AdvancedSearch->SearchOperator = @$filter["z_id"];
		$this->id->AdvancedSearch->SearchCondition = @$filter["v_id"];
		$this->id->AdvancedSearch->SearchValue2 = @$filter["y_id"];
		$this->id->AdvancedSearch->SearchOperator2 = @$filter["w_id"];
		$this->id->AdvancedSearch->save();

		// Field pid
		$this->pid->AdvancedSearch->SearchValue = @$filter["x_pid"];
		$this->pid->AdvancedSearch->SearchOperator = @$filter["z_pid"];
		$this->pid->AdvancedSearch->SearchCondition = @$filter["v_pid"];
		$this->pid->AdvancedSearch->SearchValue2 = @$filter["y_pid"];
		$this->pid->AdvancedSearch->SearchOperator2 = @$filter["w_pid"];
		$this->pid->AdvancedSearch->save();

		// Field tahun
		$this->tahun->AdvancedSearch->SearchValue = @$filter["x_tahun"];
		$this->tahun->AdvancedSearch->SearchOperator = @$filter["z_tahun"];
		$this->tahun->AdvancedSearch->SearchCondition = @$filter["v_tahun"];
		$this->tahun->AdvancedSearch->SearchValue2 = @$filter["y_tahun"];
		$this->tahun->AdvancedSearch->SearchOperator2 = @$filter["w_tahun"];
		$this->tahun->AdvancedSearch->save();

		// Field bulan
		$this->bulan->AdvancedSearch->SearchValue = @$filter["x_bulan"];
		$this->bulan->AdvancedSearch->SearchOperator = @$filter["z_bulan"];
		$this->bulan->AdvancedSearch->SearchCondition = @$filter["v_bulan"];
		$this->bulan->AdvancedSearch->SearchValue2 = @$filter["y_bulan"];
		$this->bulan->AdvancedSearch->SearchOperator2 = @$filter["w_bulan"];
		$this->bulan->AdvancedSearch->save();

		// Field pegawai
		$this->pegawai->AdvancedSearch->SearchValue = @$filter["x_pegawai"];
		$this->pegawai->AdvancedSearch->SearchOperator = @$filter["z_pegawai"];
		$this->pegawai->AdvancedSearch->SearchCondition = @$filter["v_pegawai"];
		$this->pegawai->AdvancedSearch->SearchValue2 = @$filter["y_pegawai"];
		$this->pegawai->AdvancedSearch->SearchOperator2 = @$filter["w_pegawai"];
		$this->pegawai->AdvancedSearch->save();

		// Field jenjang_id
		$this->jenjang_id->AdvancedSearch->SearchValue = @$filter["x_jenjang_id"];
		$this->jenjang_id->AdvancedSearch->SearchOperator = @$filter["z_jenjang_id"];
		$this->jenjang_id->AdvancedSearch->SearchCondition = @$filter["v_jenjang_id"];
		$this->jenjang_id->AdvancedSearch->SearchValue2 = @$filter["y_jenjang_id"];
		$this->jenjang_id->AdvancedSearch->SearchOperator2 = @$filter["w_jenjang_id"];
		$this->jenjang_id->AdvancedSearch->save();

		// Field jabatan_id
		$this->jabatan_id->AdvancedSearch->SearchValue = @$filter["x_jabatan_id"];
		$this->jabatan_id->AdvancedSearch->SearchOperator = @$filter["z_jabatan_id"];
		$this->jabatan_id->AdvancedSearch->SearchCondition = @$filter["v_jabatan_id"];
		$this->jabatan_id->AdvancedSearch->SearchValue2 = @$filter["y_jabatan_id"];
		$this->jabatan_id->AdvancedSearch->SearchOperator2 = @$filter["w_jabatan_id"];
		$this->jabatan_id->AdvancedSearch->save();

		// Field lama_kerja
		$this->lama_kerja->AdvancedSearch->SearchValue = @$filter["x_lama_kerja"];
		$this->lama_kerja->AdvancedSearch->SearchOperator = @$filter["z_lama_kerja"];
		$this->lama_kerja->AdvancedSearch->SearchCondition = @$filter["v_lama_kerja"];
		$this->lama_kerja->AdvancedSearch->SearchValue2 = @$filter["y_lama_kerja"];
		$this->lama_kerja->AdvancedSearch->SearchOperator2 = @$filter["w_lama_kerja"];
		$this->lama_kerja->AdvancedSearch->save();

		// Field ijasah
		$this->ijasah->AdvancedSearch->SearchValue = @$filter["x_ijasah"];
		$this->ijasah->AdvancedSearch->SearchOperator = @$filter["z_ijasah"];
		$this->ijasah->AdvancedSearch->SearchCondition = @$filter["v_ijasah"];
		$this->ijasah->AdvancedSearch->SearchValue2 = @$filter["y_ijasah"];
		$this->ijasah->AdvancedSearch->SearchOperator2 = @$filter["w_ijasah"];
		$this->ijasah->AdvancedSearch->save();

		// Field type_jabatan
		$this->type_jabatan->AdvancedSearch->SearchValue = @$filter["x_type_jabatan"];
		$this->type_jabatan->AdvancedSearch->SearchOperator = @$filter["z_type_jabatan"];
		$this->type_jabatan->AdvancedSearch->SearchCondition = @$filter["v_type_jabatan"];
		$this->type_jabatan->AdvancedSearch->SearchValue2 = @$filter["y_type_jabatan"];
		$this->type_jabatan->AdvancedSearch->SearchOperator2 = @$filter["w_type_jabatan"];
		$this->type_jabatan->AdvancedSearch->save();

		// Field tambahan
		$this->tambahan->AdvancedSearch->SearchValue = @$filter["x_tambahan"];
		$this->tambahan->AdvancedSearch->SearchOperator = @$filter["z_tambahan"];
		$this->tambahan->AdvancedSearch->SearchCondition = @$filter["v_tambahan"];
		$this->tambahan->AdvancedSearch->SearchValue2 = @$filter["y_tambahan"];
		$this->tambahan->AdvancedSearch->SearchOperator2 = @$filter["w_tambahan"];
		$this->tambahan->AdvancedSearch->save();

		// Field sertif
		$this->sertif->AdvancedSearch->SearchValue = @$filter["x_sertif"];
		$this->sertif->AdvancedSearch->SearchOperator = @$filter["z_sertif"];
		$this->sertif->AdvancedSearch->SearchCondition = @$filter["v_sertif"];
		$this->sertif->AdvancedSearch->SearchValue2 = @$filter["y_sertif"];
		$this->sertif->AdvancedSearch->SearchOperator2 = @$filter["w_sertif"];
		$this->sertif->AdvancedSearch->save();

		// Field gapok
		$this->gapok->AdvancedSearch->SearchValue = @$filter["x_gapok"];
		$this->gapok->AdvancedSearch->SearchOperator = @$filter["z_gapok"];
		$this->gapok->AdvancedSearch->SearchCondition = @$filter["v_gapok"];
		$this->gapok->AdvancedSearch->SearchValue2 = @$filter["y_gapok"];
		$this->gapok->AdvancedSearch->SearchOperator2 = @$filter["w_gapok"];
		$this->gapok->AdvancedSearch->save();

		// Field kehadiran
		$this->kehadiran->AdvancedSearch->SearchValue = @$filter["x_kehadiran"];
		$this->kehadiran->AdvancedSearch->SearchOperator = @$filter["z_kehadiran"];
		$this->kehadiran->AdvancedSearch->SearchCondition = @$filter["v_kehadiran"];
		$this->kehadiran->AdvancedSearch->SearchValue2 = @$filter["y_kehadiran"];
		$this->kehadiran->AdvancedSearch->SearchOperator2 = @$filter["w_kehadiran"];
		$this->kehadiran->AdvancedSearch->save();

		// Field value_kehadiran
		$this->value_kehadiran->AdvancedSearch->SearchValue = @$filter["x_value_kehadiran"];
		$this->value_kehadiran->AdvancedSearch->SearchOperator = @$filter["z_value_kehadiran"];
		$this->value_kehadiran->AdvancedSearch->SearchCondition = @$filter["v_value_kehadiran"];
		$this->value_kehadiran->AdvancedSearch->SearchValue2 = @$filter["y_value_kehadiran"];
		$this->value_kehadiran->AdvancedSearch->SearchOperator2 = @$filter["w_value_kehadiran"];
		$this->value_kehadiran->AdvancedSearch->save();

		// Field lembur
		$this->lembur->AdvancedSearch->SearchValue = @$filter["x_lembur"];
		$this->lembur->AdvancedSearch->SearchOperator = @$filter["z_lembur"];
		$this->lembur->AdvancedSearch->SearchCondition = @$filter["v_lembur"];
		$this->lembur->AdvancedSearch->SearchValue2 = @$filter["y_lembur"];
		$this->lembur->AdvancedSearch->SearchOperator2 = @$filter["w_lembur"];
		$this->lembur->AdvancedSearch->save();

		// Field value_lembur
		$this->value_lembur->AdvancedSearch->SearchValue = @$filter["x_value_lembur"];
		$this->value_lembur->AdvancedSearch->SearchOperator = @$filter["z_value_lembur"];
		$this->value_lembur->AdvancedSearch->SearchCondition = @$filter["v_value_lembur"];
		$this->value_lembur->AdvancedSearch->SearchValue2 = @$filter["y_value_lembur"];
		$this->value_lembur->AdvancedSearch->SearchOperator2 = @$filter["w_value_lembur"];
		$this->value_lembur->AdvancedSearch->save();

		// Field value_reward
		$this->value_reward->AdvancedSearch->SearchValue = @$filter["x_value_reward"];
		$this->value_reward->AdvancedSearch->SearchOperator = @$filter["z_value_reward"];
		$this->value_reward->AdvancedSearch->SearchCondition = @$filter["v_value_reward"];
		$this->value_reward->AdvancedSearch->SearchValue2 = @$filter["y_value_reward"];
		$this->value_reward->AdvancedSearch->SearchOperator2 = @$filter["w_value_reward"];
		$this->value_reward->AdvancedSearch->save();

		// Field value_inval
		$this->value_inval->AdvancedSearch->SearchValue = @$filter["x_value_inval"];
		$this->value_inval->AdvancedSearch->SearchOperator = @$filter["z_value_inval"];
		$this->value_inval->AdvancedSearch->SearchCondition = @$filter["v_value_inval"];
		$this->value_inval->AdvancedSearch->SearchValue2 = @$filter["y_value_inval"];
		$this->value_inval->AdvancedSearch->SearchOperator2 = @$filter["w_value_inval"];
		$this->value_inval->AdvancedSearch->save();

		// Field piket_count
		$this->piket_count->AdvancedSearch->SearchValue = @$filter["x_piket_count"];
		$this->piket_count->AdvancedSearch->SearchOperator = @$filter["z_piket_count"];
		$this->piket_count->AdvancedSearch->SearchCondition = @$filter["v_piket_count"];
		$this->piket_count->AdvancedSearch->SearchValue2 = @$filter["y_piket_count"];
		$this->piket_count->AdvancedSearch->SearchOperator2 = @$filter["w_piket_count"];
		$this->piket_count->AdvancedSearch->save();

		// Field value_piket
		$this->value_piket->AdvancedSearch->SearchValue = @$filter["x_value_piket"];
		$this->value_piket->AdvancedSearch->SearchOperator = @$filter["z_value_piket"];
		$this->value_piket->AdvancedSearch->SearchCondition = @$filter["v_value_piket"];
		$this->value_piket->AdvancedSearch->SearchValue2 = @$filter["y_value_piket"];
		$this->value_piket->AdvancedSearch->SearchOperator2 = @$filter["w_value_piket"];
		$this->value_piket->AdvancedSearch->save();

		// Field tugastambahan
		$this->tugastambahan->AdvancedSearch->SearchValue = @$filter["x_tugastambahan"];
		$this->tugastambahan->AdvancedSearch->SearchOperator = @$filter["z_tugastambahan"];
		$this->tugastambahan->AdvancedSearch->SearchCondition = @$filter["v_tugastambahan"];
		$this->tugastambahan->AdvancedSearch->SearchValue2 = @$filter["y_tugastambahan"];
		$this->tugastambahan->AdvancedSearch->SearchOperator2 = @$filter["w_tugastambahan"];
		$this->tugastambahan->AdvancedSearch->save();

		// Field tj_jabatan
		$this->tj_jabatan->AdvancedSearch->SearchValue = @$filter["x_tj_jabatan"];
		$this->tj_jabatan->AdvancedSearch->SearchOperator = @$filter["z_tj_jabatan"];
		$this->tj_jabatan->AdvancedSearch->SearchCondition = @$filter["v_tj_jabatan"];
		$this->tj_jabatan->AdvancedSearch->SearchValue2 = @$filter["y_tj_jabatan"];
		$this->tj_jabatan->AdvancedSearch->SearchOperator2 = @$filter["w_tj_jabatan"];
		$this->tj_jabatan->AdvancedSearch->save();

		// Field tunjangan2
		$this->tunjangan2->AdvancedSearch->SearchValue = @$filter["x_tunjangan2"];
		$this->tunjangan2->AdvancedSearch->SearchOperator = @$filter["z_tunjangan2"];
		$this->tunjangan2->AdvancedSearch->SearchCondition = @$filter["v_tunjangan2"];
		$this->tunjangan2->AdvancedSearch->SearchValue2 = @$filter["y_tunjangan2"];
		$this->tunjangan2->AdvancedSearch->SearchOperator2 = @$filter["w_tunjangan2"];
		$this->tunjangan2->AdvancedSearch->save();

		// Field sub_total
		$this->sub_total->AdvancedSearch->SearchValue = @$filter["x_sub_total"];
		$this->sub_total->AdvancedSearch->SearchOperator = @$filter["z_sub_total"];
		$this->sub_total->AdvancedSearch->SearchCondition = @$filter["v_sub_total"];
		$this->sub_total->AdvancedSearch->SearchValue2 = @$filter["y_sub_total"];
		$this->sub_total->AdvancedSearch->SearchOperator2 = @$filter["w_sub_total"];
		$this->sub_total->AdvancedSearch->save();

		// Field potongan
		$this->potongan->AdvancedSearch->SearchValue = @$filter["x_potongan"];
		$this->potongan->AdvancedSearch->SearchOperator = @$filter["z_potongan"];
		$this->potongan->AdvancedSearch->SearchCondition = @$filter["v_potongan"];
		$this->potongan->AdvancedSearch->SearchValue2 = @$filter["y_potongan"];
		$this->potongan->AdvancedSearch->SearchOperator2 = @$filter["w_potongan"];
		$this->potongan->AdvancedSearch->save();

		// Field penyesuaian
		$this->penyesuaian->AdvancedSearch->SearchValue = @$filter["x_penyesuaian"];
		$this->penyesuaian->AdvancedSearch->SearchOperator = @$filter["z_penyesuaian"];
		$this->penyesuaian->AdvancedSearch->SearchCondition = @$filter["v_penyesuaian"];
		$this->penyesuaian->AdvancedSearch->SearchValue2 = @$filter["y_penyesuaian"];
		$this->penyesuaian->AdvancedSearch->SearchOperator2 = @$filter["w_penyesuaian"];
		$this->penyesuaian->AdvancedSearch->save();

		// Field total
		$this->total->AdvancedSearch->SearchValue = @$filter["x_total"];
		$this->total->AdvancedSearch->SearchOperator = @$filter["z_total"];
		$this->total->AdvancedSearch->SearchCondition = @$filter["v_total"];
		$this->total->AdvancedSearch->SearchValue2 = @$filter["y_total"];
		$this->total->AdvancedSearch->SearchOperator2 = @$filter["w_total"];
		$this->total->AdvancedSearch->save();

		// Field voucher
		$this->voucher->AdvancedSearch->SearchValue = @$filter["x_voucher"];
		$this->voucher->AdvancedSearch->SearchOperator = @$filter["z_voucher"];
		$this->voucher->AdvancedSearch->SearchCondition = @$filter["v_voucher"];
		$this->voucher->AdvancedSearch->SearchValue2 = @$filter["y_voucher"];
		$this->voucher->AdvancedSearch->SearchOperator2 = @$filter["w_voucher"];
		$this->voucher->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
		$this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
	}

	// Advanced search WHERE clause based on QueryString
	protected function advancedSearchWhere($default = FALSE)
	{
		global $Security;
		$where = "";
		if (!$Security->canSearch())
			return "";
		$this->buildSearchSql($where, $this->id, $default, FALSE); // id
		$this->buildSearchSql($where, $this->pid, $default, FALSE); // pid
		$this->buildSearchSql($where, $this->tahun, $default, FALSE); // tahun
		$this->buildSearchSql($where, $this->bulan, $default, FALSE); // bulan
		$this->buildSearchSql($where, $this->pegawai, $default, FALSE); // pegawai
		$this->buildSearchSql($where, $this->jenjang_id, $default, FALSE); // jenjang_id
		$this->buildSearchSql($where, $this->jabatan_id, $default, FALSE); // jabatan_id
		$this->buildSearchSql($where, $this->lama_kerja, $default, FALSE); // lama_kerja
		$this->buildSearchSql($where, $this->ijasah, $default, FALSE); // ijasah
		$this->buildSearchSql($where, $this->type_jabatan, $default, FALSE); // type_jabatan
		$this->buildSearchSql($where, $this->tambahan, $default, FALSE); // tambahan
		$this->buildSearchSql($where, $this->sertif, $default, FALSE); // sertif
		$this->buildSearchSql($where, $this->gapok, $default, FALSE); // gapok
		$this->buildSearchSql($where, $this->kehadiran, $default, FALSE); // kehadiran
		$this->buildSearchSql($where, $this->value_kehadiran, $default, FALSE); // value_kehadiran
		$this->buildSearchSql($where, $this->lembur, $default, FALSE); // lembur
		$this->buildSearchSql($where, $this->value_lembur, $default, FALSE); // value_lembur
		$this->buildSearchSql($where, $this->value_reward, $default, FALSE); // value_reward
		$this->buildSearchSql($where, $this->value_inval, $default, FALSE); // value_inval
		$this->buildSearchSql($where, $this->piket_count, $default, FALSE); // piket_count
		$this->buildSearchSql($where, $this->value_piket, $default, FALSE); // value_piket
		$this->buildSearchSql($where, $this->tugastambahan, $default, FALSE); // tugastambahan
		$this->buildSearchSql($where, $this->tj_jabatan, $default, FALSE); // tj_jabatan
		$this->buildSearchSql($where, $this->tunjangan2, $default, FALSE); // tunjangan2
		$this->buildSearchSql($where, $this->sub_total, $default, FALSE); // sub_total
		$this->buildSearchSql($where, $this->potongan, $default, FALSE); // potongan
		$this->buildSearchSql($where, $this->penyesuaian, $default, FALSE); // penyesuaian
		$this->buildSearchSql($where, $this->total, $default, FALSE); // total
		$this->buildSearchSql($where, $this->voucher, $default, FALSE); // voucher

		// Set up search parm
		if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->id->AdvancedSearch->save(); // id
			$this->pid->AdvancedSearch->save(); // pid
			$this->tahun->AdvancedSearch->save(); // tahun
			$this->bulan->AdvancedSearch->save(); // bulan
			$this->pegawai->AdvancedSearch->save(); // pegawai
			$this->jenjang_id->AdvancedSearch->save(); // jenjang_id
			$this->jabatan_id->AdvancedSearch->save(); // jabatan_id
			$this->lama_kerja->AdvancedSearch->save(); // lama_kerja
			$this->ijasah->AdvancedSearch->save(); // ijasah
			$this->type_jabatan->AdvancedSearch->save(); // type_jabatan
			$this->tambahan->AdvancedSearch->save(); // tambahan
			$this->sertif->AdvancedSearch->save(); // sertif
			$this->gapok->AdvancedSearch->save(); // gapok
			$this->kehadiran->AdvancedSearch->save(); // kehadiran
			$this->value_kehadiran->AdvancedSearch->save(); // value_kehadiran
			$this->lembur->AdvancedSearch->save(); // lembur
			$this->value_lembur->AdvancedSearch->save(); // value_lembur
			$this->value_reward->AdvancedSearch->save(); // value_reward
			$this->value_inval->AdvancedSearch->save(); // value_inval
			$this->piket_count->AdvancedSearch->save(); // piket_count
			$this->value_piket->AdvancedSearch->save(); // value_piket
			$this->tugastambahan->AdvancedSearch->save(); // tugastambahan
			$this->tj_jabatan->AdvancedSearch->save(); // tj_jabatan
			$this->tunjangan2->AdvancedSearch->save(); // tunjangan2
			$this->sub_total->AdvancedSearch->save(); // sub_total
			$this->potongan->AdvancedSearch->save(); // potongan
			$this->penyesuaian->AdvancedSearch->save(); // penyesuaian
			$this->total->AdvancedSearch->save(); // total
			$this->voucher->AdvancedSearch->save(); // voucher
		}
		return $where;
	}

	// Build search SQL
	protected function buildSearchSql(&$where, &$fld, $default, $multiValue)
	{
		$fldParm = $fld->Param;
		$fldVal = ($default) ? $fld->AdvancedSearch->SearchValueDefault : $fld->AdvancedSearch->SearchValue;
		$fldOpr = ($default) ? $fld->AdvancedSearch->SearchOperatorDefault : $fld->AdvancedSearch->SearchOperator;
		$fldCond = ($default) ? $fld->AdvancedSearch->SearchConditionDefault : $fld->AdvancedSearch->SearchCondition;
		$fldVal2 = ($default) ? $fld->AdvancedSearch->SearchValue2Default : $fld->AdvancedSearch->SearchValue2;
		$fldOpr2 = ($default) ? $fld->AdvancedSearch->SearchOperator2Default : $fld->AdvancedSearch->SearchOperator2;
		$wrk = "";
		if (is_array($fldVal))
			$fldVal = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal);
		if (is_array($fldVal2))
			$fldVal2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal2);
		$fldOpr = strtoupper(trim($fldOpr));
		if ($fldOpr == "")
			$fldOpr = "=";
		$fldOpr2 = strtoupper(trim($fldOpr2));
		if ($fldOpr2 == "")
			$fldOpr2 = "=";
		if (Config("SEARCH_MULTI_VALUE_OPTION") == 1 || !IsMultiSearchOperator($fldOpr))
			$multiValue = FALSE;
		if ($multiValue) {
			$wrk1 = ($fldVal != "") ? GetMultiSearchSql($fld, $fldOpr, $fldVal, $this->Dbid) : ""; // Field value 1
			$wrk2 = ($fldVal2 != "") ? GetMultiSearchSql($fld, $fldOpr2, $fldVal2, $this->Dbid) : ""; // Field value 2
			$wrk = $wrk1; // Build final SQL
			if ($wrk2 != "")
				$wrk = ($wrk != "") ? "($wrk) $fldCond ($wrk2)" : $wrk2;
		} else {
			$fldVal = $this->convertSearchValue($fld, $fldVal);
			$fldVal2 = $this->convertSearchValue($fld, $fldVal2);
			$wrk = GetSearchSql($fld, $fldVal, $fldOpr, $fldCond, $fldVal2, $fldOpr2, $this->Dbid);
		}
		AddFilter($where, $wrk);
	}

	// Convert search value
	protected function convertSearchValue(&$fld, $fldVal)
	{
		if ($fldVal == Config("NULL_VALUE") || $fldVal == Config("NOT_NULL_VALUE"))
			return $fldVal;
		$value = $fldVal;
		if ($fld->isBoolean()) {
			if ($fldVal != "")
				$value = (SameText($fldVal, "1") || SameText($fldVal, "y") || SameText($fldVal, "t")) ? $fld->TrueValue : $fld->FalseValue;
		} elseif ($fld->DataType == DATATYPE_DATE || $fld->DataType == DATATYPE_TIME) {
			if ($fldVal != "")
				$value = UnFormatDateTime($fldVal, $fld->DateTimeFormat);
		}
		return $value;
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->pegawai, $arKeywords, $type);
		return $where;
	}

	// Build basic search SQL
	protected function buildBasicSearchSql(&$where, &$fld, $arKeywords, $type)
	{
		$defCond = ($type == "OR") ? "OR" : "AND";
		$arSql = []; // Array for SQL parts
		$arCond = []; // Array for search conditions
		$cnt = count($arKeywords);
		$j = 0; // Number of SQL parts
		for ($i = 0; $i < $cnt; $i++) {
			$keyword = $arKeywords[$i];
			$keyword = trim($keyword);
			if (Config("BASIC_SEARCH_IGNORE_PATTERN") != "") {
				$keyword = preg_replace(Config("BASIC_SEARCH_IGNORE_PATTERN"), "\\", $keyword);
				$ar = explode("\\", $keyword);
			} else {
				$ar = [$keyword];
			}
			foreach ($ar as $keyword) {
				if ($keyword != "") {
					$wrk = "";
					if ($keyword == "OR" && $type == "") {
						if ($j > 0)
							$arCond[$j - 1] = "OR";
					} elseif ($keyword == Config("NULL_VALUE")) {
						$wrk = $fld->Expression . " IS NULL";
					} elseif ($keyword == Config("NOT_NULL_VALUE")) {
						$wrk = $fld->Expression . " IS NOT NULL";
					} elseif ($fld->IsVirtual) {
						$wrk = $fld->VirtualExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
					} elseif ($fld->DataType != DATATYPE_NUMBER || is_numeric($keyword)) {
						$wrk = $fld->BasicSearchExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
					}
					if ($wrk != "") {
						$arSql[$j] = $wrk;
						$arCond[$j] = $defCond;
						$j += 1;
					}
				}
			}
		}
		$cnt = count($arSql);
		$quoted = FALSE;
		$sql = "";
		if ($cnt > 0) {
			for ($i = 0; $i < $cnt - 1; $i++) {
				if ($arCond[$i] == "OR") {
					if (!$quoted)
						$sql .= "(";
					$quoted = TRUE;
				}
				$sql .= $arSql[$i];
				if ($quoted && $arCond[$i] != "OR") {
					$sql .= ")";
					$quoted = FALSE;
				}
				$sql .= " " . $arCond[$i] . " ";
			}
			$sql .= $arSql[$cnt - 1];
			if ($quoted)
				$sql .= ")";
		}
		if ($sql != "") {
			if ($where != "")
				$where .= " OR ";
			$where .= "(" . $sql . ")";
		}
	}

	// Return basic search WHERE clause based on search keyword and type
	protected function basicSearchWhere($default = FALSE)
	{
		global $Security;
		$searchStr = "";
		if (!$Security->canSearch())
			return "";
		$searchKeyword = ($default) ? $this->BasicSearch->KeywordDefault : $this->BasicSearch->Keyword;
		$searchType = ($default) ? $this->BasicSearch->TypeDefault : $this->BasicSearch->Type;

		// Get search SQL
		if ($searchKeyword != "") {
			$ar = $this->BasicSearch->keywordList($default);

			// Search keyword in any fields
			if (($searchType == "OR" || $searchType == "AND") && $this->BasicSearch->BasicSearchAnyFields) {
				foreach ($ar as $keyword) {
					if ($keyword != "") {
						if ($searchStr != "")
							$searchStr .= " " . $searchType . " ";
						$searchStr .= "(" . $this->basicSearchSql([$keyword], $searchType) . ")";
					}
				}
			} else {
				$searchStr = $this->basicSearchSql($ar, $searchType);
			}
			if (!$default && in_array($this->Command, ["", "reset", "resetall"]))
				$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->BasicSearch->setKeyword($searchKeyword);
			$this->BasicSearch->setType($searchType);
		}
		return $searchStr;
	}

	// Check if search parm exists
	protected function checkSearchParms()
	{

		// Check basic search
		if ($this->BasicSearch->issetSession())
			return TRUE;
		if ($this->id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->pid->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->tahun->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->bulan->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->pegawai->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->jenjang_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->jabatan_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->lama_kerja->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ijasah->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->type_jabatan->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->tambahan->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->sertif->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->gapok->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->kehadiran->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->value_kehadiran->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->lembur->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->value_lembur->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->value_reward->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->value_inval->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->piket_count->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->value_piket->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->tugastambahan->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->tj_jabatan->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->tunjangan2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->sub_total->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->potongan->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->penyesuaian->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->total->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->voucher->AdvancedSearch->issetSession())
			return TRUE;
		return FALSE;
	}

	// Clear all search parameters
	protected function resetSearchParms()
	{

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$this->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->resetBasicSearchParms();

		// Clear advanced search parameters
		$this->resetAdvancedSearchParms();
	}

	// Load advanced search default values
	protected function loadAdvancedSearchDefault()
	{
		return FALSE;
	}

	// Clear all basic search parameters
	protected function resetBasicSearchParms()
	{
		$this->BasicSearch->unsetSession();
	}

	// Clear all advanced search parameters
	protected function resetAdvancedSearchParms()
	{
		$this->id->AdvancedSearch->unsetSession();
		$this->pid->AdvancedSearch->unsetSession();
		$this->tahun->AdvancedSearch->unsetSession();
		$this->bulan->AdvancedSearch->unsetSession();
		$this->pegawai->AdvancedSearch->unsetSession();
		$this->jenjang_id->AdvancedSearch->unsetSession();
		$this->jabatan_id->AdvancedSearch->unsetSession();
		$this->lama_kerja->AdvancedSearch->unsetSession();
		$this->ijasah->AdvancedSearch->unsetSession();
		$this->type_jabatan->AdvancedSearch->unsetSession();
		$this->tambahan->AdvancedSearch->unsetSession();
		$this->sertif->AdvancedSearch->unsetSession();
		$this->gapok->AdvancedSearch->unsetSession();
		$this->kehadiran->AdvancedSearch->unsetSession();
		$this->value_kehadiran->AdvancedSearch->unsetSession();
		$this->lembur->AdvancedSearch->unsetSession();
		$this->value_lembur->AdvancedSearch->unsetSession();
		$this->value_reward->AdvancedSearch->unsetSession();
		$this->value_inval->AdvancedSearch->unsetSession();
		$this->piket_count->AdvancedSearch->unsetSession();
		$this->value_piket->AdvancedSearch->unsetSession();
		$this->tugastambahan->AdvancedSearch->unsetSession();
		$this->tj_jabatan->AdvancedSearch->unsetSession();
		$this->tunjangan2->AdvancedSearch->unsetSession();
		$this->sub_total->AdvancedSearch->unsetSession();
		$this->potongan->AdvancedSearch->unsetSession();
		$this->penyesuaian->AdvancedSearch->unsetSession();
		$this->total->AdvancedSearch->unsetSession();
		$this->voucher->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->id->AdvancedSearch->load();
		$this->pid->AdvancedSearch->load();
		$this->tahun->AdvancedSearch->load();
		$this->bulan->AdvancedSearch->load();
		$this->pegawai->AdvancedSearch->load();
		$this->jenjang_id->AdvancedSearch->load();
		$this->jabatan_id->AdvancedSearch->load();
		$this->lama_kerja->AdvancedSearch->load();
		$this->ijasah->AdvancedSearch->load();
		$this->type_jabatan->AdvancedSearch->load();
		$this->tambahan->AdvancedSearch->load();
		$this->sertif->AdvancedSearch->load();
		$this->gapok->AdvancedSearch->load();
		$this->kehadiran->AdvancedSearch->load();
		$this->value_kehadiran->AdvancedSearch->load();
		$this->lembur->AdvancedSearch->load();
		$this->value_lembur->AdvancedSearch->load();
		$this->value_reward->AdvancedSearch->load();
		$this->value_inval->AdvancedSearch->load();
		$this->piket_count->AdvancedSearch->load();
		$this->value_piket->AdvancedSearch->load();
		$this->tugastambahan->AdvancedSearch->load();
		$this->tj_jabatan->AdvancedSearch->load();
		$this->tunjangan2->AdvancedSearch->load();
		$this->sub_total->AdvancedSearch->load();
		$this->potongan->AdvancedSearch->load();
		$this->penyesuaian->AdvancedSearch->load();
		$this->total->AdvancedSearch->load();
		$this->voucher->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->tahun); // tahun
			$this->updateSort($this->bulan); // bulan
			$this->updateSort($this->pegawai); // pegawai
			$this->updateSort($this->jenjang_id); // jenjang_id
			$this->updateSort($this->jabatan_id); // jabatan_id
			$this->updateSort($this->lama_kerja); // lama_kerja
			$this->updateSort($this->ijasah); // ijasah
			$this->updateSort($this->type_jabatan); // type_jabatan
			$this->updateSort($this->tambahan); // tambahan
			$this->updateSort($this->sertif); // sertif
			$this->updateSort($this->gapok); // gapok
			$this->updateSort($this->kehadiran); // kehadiran
			$this->updateSort($this->value_kehadiran); // value_kehadiran
			$this->updateSort($this->lembur); // lembur
			$this->updateSort($this->value_lembur); // value_lembur
			$this->updateSort($this->value_reward); // value_reward
			$this->updateSort($this->value_inval); // value_inval
			$this->updateSort($this->piket_count); // piket_count
			$this->updateSort($this->value_piket); // value_piket
			$this->updateSort($this->tugastambahan); // tugastambahan
			$this->updateSort($this->tj_jabatan); // tj_jabatan
			$this->updateSort($this->tunjangan2); // tunjangan2
			$this->updateSort($this->sub_total); // sub_total
			$this->updateSort($this->potongan); // potongan
			$this->updateSort($this->penyesuaian); // penyesuaian
			$this->updateSort($this->total); // total
			$this->updateSort($this->voucher); // voucher
			$this->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	protected function loadSortOrder()
	{
		$orderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
		if ($orderBy == "") {
			if ($this->getSqlOrderBy() != "") {
				$orderBy = $this->getSqlOrderBy();
				$this->setSessionOrderBy($orderBy);
			}
		}
	}

	// Reset command
	// - cmd=reset (Reset search parameters)
	// - cmd=resetall (Reset search and master/detail parameters)
	// - cmd=resetsort (Reset sort parameters)

	protected function resetCmd()
	{

		// Check if reset command
		if (StartsString("reset", $this->Command)) {

			// Reset search criteria
			if ($this->Command == "reset" || $this->Command == "resetall")
				$this->resetSearchParms();

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->tahun->setSort("");
				$this->bulan->setSort("");
				$this->pegawai->setSort("");
				$this->jenjang_id->setSort("");
				$this->jabatan_id->setSort("");
				$this->lama_kerja->setSort("");
				$this->ijasah->setSort("");
				$this->type_jabatan->setSort("");
				$this->tambahan->setSort("");
				$this->sertif->setSort("");
				$this->gapok->setSort("");
				$this->kehadiran->setSort("");
				$this->value_kehadiran->setSort("");
				$this->lembur->setSort("");
				$this->value_lembur->setSort("");
				$this->value_reward->setSort("");
				$this->value_inval->setSort("");
				$this->piket_count->setSort("");
				$this->value_piket->setSort("");
				$this->tugastambahan->setSort("");
				$this->tj_jabatan->setSort("");
				$this->tunjangan2->setSort("");
				$this->sub_total->setSort("");
				$this->potongan->setSort("");
				$this->penyesuaian->setSort("");
				$this->total->setSort("");
				$this->voucher->setSort("");
			}

			// Reset start position
			$this->StartRecord = 1;
			$this->setStartRecordNumber($this->StartRecord);
		}
	}

	// Set up list options
	protected function setupListOptions()
	{
		global $Security, $Language;

		// Add group option item
		$item = &$this->ListOptions->add($this->ListOptions->GroupOptionName);
		$item->Body = "";
		$item->OnLeft = FALSE;
		$item->Visible = FALSE;

		// List actions
		$item = &$this->ListOptions->add("listactions");
		$item->CssClass = "text-nowrap";
		$item->OnLeft = FALSE;
		$item->Visible = FALSE;
		$item->ShowInButtonGroup = FALSE;
		$item->ShowInDropDown = FALSE;

		// "checkbox"
		$item = &$this->ListOptions->add("checkbox");
		$item->Visible = FALSE;
		$item->OnLeft = FALSE;
		$item->Header = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" name=\"key\" id=\"key\" class=\"custom-control-input\" onclick=\"ew.selectAllKey(this);\"><label class=\"custom-control-label\" for=\"key\"></label></div>";
		$item->ShowInDropDown = FALSE;
		$item->ShowInButtonGroup = FALSE;

		// "sequence"
		$item = &$this->ListOptions->add("sequence");
		$item->CssClass = "text-nowrap";
		$item->Visible = TRUE;
		$item->OnLeft = TRUE; // Always on left
		$item->ShowInDropDown = FALSE;
		$item->ShowInButtonGroup = FALSE;

		// Drop down button for ListOptions
		$this->ListOptions->UseDropDownButton = FALSE;
		$this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
		$this->ListOptions->UseButtonGroup = FALSE;
		if ($this->ListOptions->UseButtonGroup && IsMobile())
			$this->ListOptions->UseDropDownButton = TRUE;

		//$this->ListOptions->ButtonClass = ""; // Class for button group
		// Call ListOptions_Load event

		$this->ListOptions_Load();
		$this->setupListOptionsExt();
		$item = $this->ListOptions[$this->ListOptions->GroupOptionName];
		$item->Visible = $this->ListOptions->groupOptionVisible();
	}

	// Render list options
	public function renderListOptions()
	{
		global $Security, $Language, $CurrentForm;
		$this->ListOptions->loadDefault();

		// Call ListOptions_Rendering event
		$this->ListOptions_Rendering();

		// "sequence"
		$opt = $this->ListOptions["sequence"];
		$opt->Body = FormatSequenceNumber($this->RecordCount);

		// Set up list action buttons
		$opt = $this->ListOptions["listactions"];
		if ($opt && !$this->isExport() && !$this->CurrentAction) {
			$body = "";
			$links = [];
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_SINGLE && $listaction->Allow) {
					$action = $listaction->Action;
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode(str_replace(" ew-icon", "", $listaction->Icon)) . "\" data-caption=\"" . HtmlTitle($caption) . "\"></i> " : "";
					$links[] = "<li><a class=\"dropdown-item ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));\">" . $icon . $listaction->Caption . "</a></li>";
					if (count($links) == 1) // Single button
						$body = "<a class=\"ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));\">" . $icon . $listaction->Caption . "</a>";
				}
			}
			if (count($links) > 1) { // More than one buttons, use dropdown
				$body = "<button class=\"dropdown-toggle btn btn-default ew-actions\" title=\"" . HtmlTitle($Language->phrase("ListActionButton")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("ListActionButton") . "</button>";
				$content = "";
				foreach ($links as $link)
					$content .= "<li>" . $link . "</li>";
				$body .= "<ul class=\"dropdown-menu" . ($opt->OnLeft ? "" : " dropdown-menu-right") . "\">". $content . "</ul>";
				$body = "<div class=\"btn-group btn-group-sm\">" . $body . "</div>";
			}
			if (count($links) > 0) {
				$opt->Body = $body;
				$opt->Visible = TRUE;
			}
		}

		// "checkbox"
		$opt = $this->ListOptions["checkbox"];
		$opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->id->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = $options["action"];

		// Set up options default
		foreach ($options as $option) {
			$option->UseDropDownButton = FALSE;
			$option->UseButtonGroup = TRUE;

			//$option->ButtonClass = ""; // Class for button group
			$item = &$option->add($option->GroupOptionName);
			$item->Body = "";
			$item->Visible = FALSE;
		}
		$options["addedit"]->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
		$options["detail"]->DropDownButtonPhrase = $Language->phrase("ButtonDetails");
		$options["action"]->DropDownButtonPhrase = $Language->phrase("ButtonActions");

		// Filter button
		$item = &$this->FilterOptions->add("savecurrentfilter");
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fvgaji_tu_smplistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fvgaji_tu_smplistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
		$item->Visible = TRUE;
		$this->FilterOptions->UseDropDownButton = TRUE;
		$this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton;
		$this->FilterOptions->DropDownButtonPhrase = $Language->phrase("Filters");

		// Add group option item
		$item = &$this->FilterOptions->add($this->FilterOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	// Render other options
	public function renderOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
			$option = $options["action"];

			// Set up list action buttons
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_MULTIPLE) {
					$item = &$option->add("custom_" . $listaction->Action);
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode($listaction->Icon) . "\" data-caption=\"" . HtmlEncode($caption) . "\"></i> " . $caption : $caption;
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.fvgaji_tu_smplist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
					$item->Visible = $listaction->Allow;
				}
			}

			// Hide grid edit and other options
			if ($this->TotalRecords <= 0) {
				$option = $options["addedit"];
				$item = $option["gridedit"];
				if ($item)
					$item->Visible = FALSE;
				$option = $options["action"];
				$option->hideAllOptions();
			}
	}

	// Process list action
	protected function processListAction()
	{
		global $Language, $Security;
		$userlist = "";
		$user = "";
		$filter = $this->getFilterFromRecordKeys();
		$userAction = Post("useraction", "");
		if ($filter != "" && $userAction != "") {

			// Check permission first
			$actionCaption = $userAction;
			if (array_key_exists($userAction, $this->ListActions->Items)) {
				$actionCaption = $this->ListActions[$userAction]->Caption;
				if (!$this->ListActions[$userAction]->Allow) {
					$errmsg = str_replace('%s', $actionCaption, $Language->phrase("CustomActionNotAllowed"));
					if (Post("ajax") == $userAction) // Ajax
						echo "<p class=\"text-danger\">" . $errmsg . "</p>";
					else
						$this->setFailureMessage($errmsg);
					return FALSE;
				}
			}
			$this->CurrentFilter = $filter;
			$sql = $this->getCurrentSql();
			$conn = $this->getConnection();
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			$rs = $conn->execute($sql);
			$conn->raiseErrorFn = "";
			$this->CurrentAction = $userAction;

			// Call row action event
			if ($rs && !$rs->EOF) {
				$conn->beginTrans();
				$this->SelectedCount = $rs->RecordCount();
				$this->SelectedIndex = 0;
				while (!$rs->EOF) {
					$this->SelectedIndex++;
					$row = $rs->fields;
					$processed = $this->Row_CustomAction($userAction, $row);
					if (!$processed)
						break;
					$rs->moveNext();
				}
				if ($processed) {
					$conn->commitTrans(); // Commit the changes
					if ($this->getSuccessMessage() == "" && !ob_get_length()) // No output
						$this->setSuccessMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionCompleted"))); // Set up success message
				} else {
					$conn->rollbackTrans(); // Rollback changes

					// Set up error message
					if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

						// Use the message, do nothing
					} elseif ($this->CancelMessage != "") {
						$this->setFailureMessage($this->CancelMessage);
						$this->CancelMessage = "";
					} else {
						$this->setFailureMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionFailed")));
					}
				}
			}
			if ($rs)
				$rs->close();
			$this->CurrentAction = ""; // Clear action
			if (Post("ajax") == $userAction) { // Ajax
				if ($this->getSuccessMessage() != "") {
					echo "<p class=\"text-success\">" . $this->getSuccessMessage() . "</p>";
					$this->clearSuccessMessage(); // Clear message
				}
				if ($this->getFailureMessage() != "") {
					echo "<p class=\"text-danger\">" . $this->getFailureMessage() . "</p>";
					$this->clearFailureMessage(); // Clear message
				}
				return TRUE;
			}
		}
		return FALSE; // Not ajax request
	}

// Set up list options (extended codes)
	protected function setupListOptionsExt()
	{

		// Hide detail items for dropdown if necessary
		$this->ListOptions->hideDetailItemsForDropDown();
	}

// Render list options (extended codes)
	protected function renderListOptionsExt()
	{
		global $Security, $Language;
	}

	// Load basic search values
	protected function loadBasicSearchValues()
	{
		$this->BasicSearch->setKeyword(Get(Config("TABLE_BASIC_SEARCH"), ""), FALSE);
		if ($this->BasicSearch->Keyword != "" && $this->Command == "")
			$this->Command = "search";
		$this->BasicSearch->setType(Get(Config("TABLE_BASIC_SEARCH_TYPE"), ""), FALSE);
	}

	// Load search values for validation
	protected function loadSearchValues()
	{

		// Load search values
		$got = FALSE;

		// id
		if (!$this->isAddOrEdit() && $this->id->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->id->AdvancedSearch->SearchValue != "" || $this->id->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// pid
		if (!$this->isAddOrEdit() && $this->pid->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->pid->AdvancedSearch->SearchValue != "" || $this->pid->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// tahun
		if (!$this->isAddOrEdit() && $this->tahun->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->tahun->AdvancedSearch->SearchValue != "" || $this->tahun->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// bulan
		if (!$this->isAddOrEdit() && $this->bulan->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->bulan->AdvancedSearch->SearchValue != "" || $this->bulan->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}
		if (is_array($this->bulan->AdvancedSearch->SearchValue))
			$this->bulan->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->bulan->AdvancedSearch->SearchValue);
		if (is_array($this->bulan->AdvancedSearch->SearchValue2))
			$this->bulan->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->bulan->AdvancedSearch->SearchValue2);

		// pegawai
		if (!$this->isAddOrEdit() && $this->pegawai->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->pegawai->AdvancedSearch->SearchValue != "" || $this->pegawai->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// jenjang_id
		if (!$this->isAddOrEdit() && $this->jenjang_id->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->jenjang_id->AdvancedSearch->SearchValue != "" || $this->jenjang_id->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// jabatan_id
		if (!$this->isAddOrEdit() && $this->jabatan_id->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->jabatan_id->AdvancedSearch->SearchValue != "" || $this->jabatan_id->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// lama_kerja
		if (!$this->isAddOrEdit() && $this->lama_kerja->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->lama_kerja->AdvancedSearch->SearchValue != "" || $this->lama_kerja->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ijasah
		if (!$this->isAddOrEdit() && $this->ijasah->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ijasah->AdvancedSearch->SearchValue != "" || $this->ijasah->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// type_jabatan
		if (!$this->isAddOrEdit() && $this->type_jabatan->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->type_jabatan->AdvancedSearch->SearchValue != "" || $this->type_jabatan->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// tambahan
		if (!$this->isAddOrEdit() && $this->tambahan->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->tambahan->AdvancedSearch->SearchValue != "" || $this->tambahan->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// sertif
		if (!$this->isAddOrEdit() && $this->sertif->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->sertif->AdvancedSearch->SearchValue != "" || $this->sertif->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// gapok
		if (!$this->isAddOrEdit() && $this->gapok->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->gapok->AdvancedSearch->SearchValue != "" || $this->gapok->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// kehadiran
		if (!$this->isAddOrEdit() && $this->kehadiran->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->kehadiran->AdvancedSearch->SearchValue != "" || $this->kehadiran->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// value_kehadiran
		if (!$this->isAddOrEdit() && $this->value_kehadiran->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->value_kehadiran->AdvancedSearch->SearchValue != "" || $this->value_kehadiran->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// lembur
		if (!$this->isAddOrEdit() && $this->lembur->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->lembur->AdvancedSearch->SearchValue != "" || $this->lembur->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// value_lembur
		if (!$this->isAddOrEdit() && $this->value_lembur->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->value_lembur->AdvancedSearch->SearchValue != "" || $this->value_lembur->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// value_reward
		if (!$this->isAddOrEdit() && $this->value_reward->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->value_reward->AdvancedSearch->SearchValue != "" || $this->value_reward->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// value_inval
		if (!$this->isAddOrEdit() && $this->value_inval->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->value_inval->AdvancedSearch->SearchValue != "" || $this->value_inval->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// piket_count
		if (!$this->isAddOrEdit() && $this->piket_count->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->piket_count->AdvancedSearch->SearchValue != "" || $this->piket_count->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// value_piket
		if (!$this->isAddOrEdit() && $this->value_piket->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->value_piket->AdvancedSearch->SearchValue != "" || $this->value_piket->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// tugastambahan
		if (!$this->isAddOrEdit() && $this->tugastambahan->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->tugastambahan->AdvancedSearch->SearchValue != "" || $this->tugastambahan->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// tj_jabatan
		if (!$this->isAddOrEdit() && $this->tj_jabatan->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->tj_jabatan->AdvancedSearch->SearchValue != "" || $this->tj_jabatan->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// tunjangan2
		if (!$this->isAddOrEdit() && $this->tunjangan2->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->tunjangan2->AdvancedSearch->SearchValue != "" || $this->tunjangan2->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// sub_total
		if (!$this->isAddOrEdit() && $this->sub_total->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->sub_total->AdvancedSearch->SearchValue != "" || $this->sub_total->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// potongan
		if (!$this->isAddOrEdit() && $this->potongan->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->potongan->AdvancedSearch->SearchValue != "" || $this->potongan->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// penyesuaian
		if (!$this->isAddOrEdit() && $this->penyesuaian->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->penyesuaian->AdvancedSearch->SearchValue != "" || $this->penyesuaian->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// total
		if (!$this->isAddOrEdit() && $this->total->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->total->AdvancedSearch->SearchValue != "" || $this->total->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// voucher
		if (!$this->isAddOrEdit() && $this->voucher->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->voucher->AdvancedSearch->SearchValue != "" || $this->voucher->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}
		return $got;
	}

	// Load recordset
	public function loadRecordset($offset = -1, $rowcnt = -1)
	{

		// Load List page SQL
		$sql = $this->getListSql();
		$conn = $this->getConnection();

		// Load recordset
		$dbtype = GetConnectionType($this->Dbid);
		if ($this->UseSelectLimit) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			if ($dbtype == "MSSQL") {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderBy())]);
			} else {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset);
			}
			$conn->raiseErrorFn = "";
		} else {
			$rs = LoadRecordset($sql, $conn);
		}

		// Call Recordset Selected event
		$this->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->id->setDbValue($row['id']);
		$this->pid->setDbValue($row['pid']);
		$this->tahun->setDbValue($row['tahun']);
		$this->bulan->setDbValue($row['bulan']);
		$this->pegawai->setDbValue($row['pegawai']);
		$this->jenjang_id->setDbValue($row['jenjang_id']);
		$this->jabatan_id->setDbValue($row['jabatan_id']);
		$this->lama_kerja->setDbValue($row['lama_kerja']);
		$this->ijasah->setDbValue($row['ijasah']);
		$this->type_jabatan->setDbValue($row['type_jabatan']);
		$this->tambahan->setDbValue($row['tambahan']);
		$this->sertif->setDbValue($row['sertif']);
		$this->gapok->setDbValue($row['gapok']);
		$this->kehadiran->setDbValue($row['kehadiran']);
		$this->value_kehadiran->setDbValue($row['value_kehadiran']);
		$this->lembur->setDbValue($row['lembur']);
		$this->value_lembur->setDbValue($row['value_lembur']);
		$this->value_reward->setDbValue($row['value_reward']);
		$this->value_inval->setDbValue($row['value_inval']);
		$this->piket_count->setDbValue($row['piket_count']);
		$this->value_piket->setDbValue($row['value_piket']);
		$this->tugastambahan->setDbValue($row['tugastambahan']);
		$this->tj_jabatan->setDbValue($row['tj_jabatan']);
		$this->tunjangan2->setDbValue($row['tunjangan2']);
		$this->sub_total->setDbValue($row['sub_total']);
		$this->potongan->setDbValue($row['potongan']);
		$this->penyesuaian->setDbValue($row['penyesuaian']);
		$this->total->setDbValue($row['total']);
		$this->voucher->setDbValue($row['voucher']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['pid'] = NULL;
		$row['tahun'] = NULL;
		$row['bulan'] = NULL;
		$row['pegawai'] = NULL;
		$row['jenjang_id'] = NULL;
		$row['jabatan_id'] = NULL;
		$row['lama_kerja'] = NULL;
		$row['ijasah'] = NULL;
		$row['type_jabatan'] = NULL;
		$row['tambahan'] = NULL;
		$row['sertif'] = NULL;
		$row['gapok'] = NULL;
		$row['kehadiran'] = NULL;
		$row['value_kehadiran'] = NULL;
		$row['lembur'] = NULL;
		$row['value_lembur'] = NULL;
		$row['value_reward'] = NULL;
		$row['value_inval'] = NULL;
		$row['piket_count'] = NULL;
		$row['value_piket'] = NULL;
		$row['tugastambahan'] = NULL;
		$row['tj_jabatan'] = NULL;
		$row['tunjangan2'] = NULL;
		$row['sub_total'] = NULL;
		$row['potongan'] = NULL;
		$row['penyesuaian'] = NULL;
		$row['total'] = NULL;
		$row['voucher'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id")) != "")
			$this->id->OldValue = $this->getKey("id"); // id
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = $this->getConnection();
			$this->OldRecordset = LoadRecordset($sql, $conn);
		}
		$this->loadRowValues($this->OldRecordset); // Load row values
		return $validKey;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		$this->ViewUrl = $this->getViewUrl();
		$this->EditUrl = $this->getEditUrl();
		$this->InlineEditUrl = $this->getInlineEditUrl();
		$this->CopyUrl = $this->getCopyUrl();
		$this->InlineCopyUrl = $this->getInlineCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// pid
		// tahun
		// bulan
		// pegawai
		// jenjang_id
		// jabatan_id
		// lama_kerja
		// ijasah
		// type_jabatan
		// tambahan
		// sertif
		// gapok
		// kehadiran
		// value_kehadiran
		// lembur
		// value_lembur
		// value_reward
		// value_inval
		// piket_count
		// value_piket
		// tugastambahan
		// tj_jabatan
		// tunjangan2
		// sub_total
		// potongan
		// penyesuaian
		// total
		// voucher

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// pid
			$this->pid->ViewValue = $this->pid->CurrentValue;
			$this->pid->ViewValue = FormatNumber($this->pid->ViewValue, 0, -2, -2, -2);
			$this->pid->ViewCustomAttributes = "";

			// tahun
			$this->tahun->ViewValue = $this->tahun->CurrentValue;
			$this->tahun->ViewCustomAttributes = "";

			// bulan
			$curVal = strval($this->bulan->CurrentValue);
			if ($curVal != "") {
				$this->bulan->ViewValue = $this->bulan->lookupCacheOption($curVal);
				if ($this->bulan->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk != "")
							$filterWrk .= " OR ";
						$filterWrk .= "`id`" . SearchString("=", trim($wrk), DATATYPE_NUMBER, "");
					}
					$sqlWrk = $this->bulan->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->bulan->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->bulan->ViewValue->add($this->bulan->displayValue($arwrk));
							$rswrk->MoveNext();
							$ari++;
						}
						$rswrk->Close();
					} else {
						$this->bulan->ViewValue = $this->bulan->CurrentValue;
					}
				}
			} else {
				$this->bulan->ViewValue = NULL;
			}
			$this->bulan->ViewCustomAttributes = "";

			// pegawai
			$curVal = strval($this->pegawai->CurrentValue);
			if ($curVal != "") {
				$this->pegawai->ViewValue = $this->pegawai->lookupCacheOption($curVal);
				if ($this->pegawai->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`nip`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->pegawai->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->pegawai->ViewValue = $this->pegawai->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->pegawai->ViewValue = $this->pegawai->CurrentValue;
					}
				}
			} else {
				$this->pegawai->ViewValue = NULL;
			}
			$this->pegawai->ViewCustomAttributes = "";

			// jenjang_id
			$this->jenjang_id->ViewValue = $this->jenjang_id->CurrentValue;
			$curVal = strval($this->jenjang_id->CurrentValue);
			if ($curVal != "") {
				$this->jenjang_id->ViewValue = $this->jenjang_id->lookupCacheOption($curVal);
				if ($this->jenjang_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`nourut`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->jenjang_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->jenjang_id->ViewValue = $this->jenjang_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->jenjang_id->ViewValue = $this->jenjang_id->CurrentValue;
					}
				}
			} else {
				$this->jenjang_id->ViewValue = NULL;
			}
			$this->jenjang_id->ViewCustomAttributes = "";

			// jabatan_id
			$this->jabatan_id->ViewValue = $this->jabatan_id->CurrentValue;
			$curVal = strval($this->jabatan_id->CurrentValue);
			if ($curVal != "") {
				$this->jabatan_id->ViewValue = $this->jabatan_id->lookupCacheOption($curVal);
				if ($this->jabatan_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->jabatan_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->jabatan_id->ViewValue = $this->jabatan_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->jabatan_id->ViewValue = $this->jabatan_id->CurrentValue;
					}
				}
			} else {
				$this->jabatan_id->ViewValue = NULL;
			}
			$this->jabatan_id->ViewCustomAttributes = "";

			// lama_kerja
			$this->lama_kerja->ViewValue = $this->lama_kerja->CurrentValue;
			$this->lama_kerja->ViewValue = FormatNumber($this->lama_kerja->ViewValue, 0, -2, -2, -2);
			$this->lama_kerja->ViewCustomAttributes = "";

			// ijasah
			$this->ijasah->ViewValue = $this->ijasah->CurrentValue;
			$this->ijasah->ViewValue = FormatNumber($this->ijasah->ViewValue, 0, -2, -2, -2);
			$this->ijasah->ViewCustomAttributes = "";

			// type_jabatan
			$this->type_jabatan->ViewValue = $this->type_jabatan->CurrentValue;
			$curVal = strval($this->type_jabatan->CurrentValue);
			if ($curVal != "") {
				$this->type_jabatan->ViewValue = $this->type_jabatan->lookupCacheOption($curVal);
				if ($this->type_jabatan->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->type_jabatan->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->type_jabatan->ViewValue = $this->type_jabatan->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->type_jabatan->ViewValue = $this->type_jabatan->CurrentValue;
					}
				}
			} else {
				$this->type_jabatan->ViewValue = NULL;
			}
			$this->type_jabatan->ViewCustomAttributes = "";

			// tambahan
			$this->tambahan->ViewValue = $this->tambahan->CurrentValue;
			$curVal = strval($this->tambahan->CurrentValue);
			if ($curVal != "") {
				$this->tambahan->ViewValue = $this->tambahan->lookupCacheOption($curVal);
				if ($this->tambahan->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->tambahan->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->tambahan->ViewValue = $this->tambahan->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->tambahan->ViewValue = $this->tambahan->CurrentValue;
					}
				}
			} else {
				$this->tambahan->ViewValue = NULL;
			}
			$this->tambahan->ViewCustomAttributes = "";

			// sertif
			$this->sertif->ViewValue = $this->sertif->CurrentValue;
			$curVal = strval($this->sertif->CurrentValue);
			if ($curVal != "") {
				$this->sertif->ViewValue = $this->sertif->lookupCacheOption($curVal);
				if ($this->sertif->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->sertif->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->sertif->ViewValue = $this->sertif->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->sertif->ViewValue = $this->sertif->CurrentValue;
					}
				}
			} else {
				$this->sertif->ViewValue = NULL;
			}
			$this->sertif->ViewCustomAttributes = "";

			// gapok
			$this->gapok->ViewValue = $this->gapok->CurrentValue;
			$this->gapok->ViewValue = FormatNumber($this->gapok->ViewValue, 0, -2, -2, -2);
			$this->gapok->ViewCustomAttributes = "";

			// kehadiran
			$this->kehadiran->ViewValue = $this->kehadiran->CurrentValue;
			$this->kehadiran->ViewValue = FormatNumber($this->kehadiran->ViewValue, 0, -2, -2, -2);
			$this->kehadiran->ViewCustomAttributes = "";

			// value_kehadiran
			$this->value_kehadiran->ViewValue = $this->value_kehadiran->CurrentValue;
			$this->value_kehadiran->ViewValue = FormatNumber($this->value_kehadiran->ViewValue, 0, -2, -2, -2);
			$this->value_kehadiran->ViewCustomAttributes = "";

			// lembur
			$this->lembur->ViewValue = $this->lembur->CurrentValue;
			$this->lembur->ViewValue = FormatNumber($this->lembur->ViewValue, 0, -2, -2, -2);
			$this->lembur->ViewCustomAttributes = "";

			// value_lembur
			$this->value_lembur->ViewValue = $this->value_lembur->CurrentValue;
			$this->value_lembur->ViewValue = FormatNumber($this->value_lembur->ViewValue, 0, -2, -2, -2);
			$this->value_lembur->ViewCustomAttributes = "";

			// value_reward
			$this->value_reward->ViewValue = $this->value_reward->CurrentValue;
			$this->value_reward->ViewValue = FormatNumber($this->value_reward->ViewValue, 0, -2, -2, -2);
			$this->value_reward->ViewCustomAttributes = "";

			// value_inval
			$this->value_inval->ViewValue = $this->value_inval->CurrentValue;
			$this->value_inval->ViewValue = FormatNumber($this->value_inval->ViewValue, 0, -2, -2, -2);
			$this->value_inval->ViewCustomAttributes = "";

			// piket_count
			$this->piket_count->ViewValue = $this->piket_count->CurrentValue;
			$this->piket_count->ViewValue = FormatNumber($this->piket_count->ViewValue, 0, -2, -2, -2);
			$this->piket_count->ViewCustomAttributes = "";

			// value_piket
			$this->value_piket->ViewValue = $this->value_piket->CurrentValue;
			$this->value_piket->ViewValue = FormatNumber($this->value_piket->ViewValue, 0, -2, -2, -2);
			$this->value_piket->ViewCustomAttributes = "";

			// tugastambahan
			$this->tugastambahan->ViewValue = $this->tugastambahan->CurrentValue;
			$this->tugastambahan->ViewValue = FormatNumber($this->tugastambahan->ViewValue, 0, -2, -2, -2);
			$this->tugastambahan->ViewCustomAttributes = "";

			// tj_jabatan
			$this->tj_jabatan->ViewValue = $this->tj_jabatan->CurrentValue;
			$this->tj_jabatan->ViewValue = FormatNumber($this->tj_jabatan->ViewValue, 0, -2, -2, -2);
			$this->tj_jabatan->ViewCustomAttributes = "";

			// tunjangan2
			$this->tunjangan2->ViewValue = $this->tunjangan2->CurrentValue;
			$this->tunjangan2->ViewValue = FormatNumber($this->tunjangan2->ViewValue, 0, -2, -2, -2);
			$this->tunjangan2->ViewCustomAttributes = "";

			// sub_total
			$this->sub_total->ViewValue = $this->sub_total->CurrentValue;
			$this->sub_total->ViewValue = FormatNumber($this->sub_total->ViewValue, 0, -2, -2, -2);
			$this->sub_total->ViewCustomAttributes = "";

			// potongan
			$this->potongan->ViewValue = $this->potongan->CurrentValue;
			$this->potongan->ViewValue = FormatNumber($this->potongan->ViewValue, 0, -2, -2, -2);
			$this->potongan->ViewCustomAttributes = "";

			// penyesuaian
			$this->penyesuaian->ViewValue = $this->penyesuaian->CurrentValue;
			$this->penyesuaian->ViewValue = FormatNumber($this->penyesuaian->ViewValue, 0, -2, -2, -2);
			$this->penyesuaian->ViewCustomAttributes = "";

			// total
			$this->total->ViewValue = $this->total->CurrentValue;
			$this->total->ViewValue = FormatNumber($this->total->ViewValue, 0, -2, -2, -2);
			$this->total->ViewCustomAttributes = "";

			// voucher
			$this->voucher->ViewValue = $this->voucher->CurrentValue;
			$this->voucher->ViewValue = FormatNumber($this->voucher->ViewValue, 0, -2, -2, -2);
			$this->voucher->ViewCustomAttributes = "";

			// tahun
			$this->tahun->LinkCustomAttributes = "";
			$this->tahun->HrefValue = "";
			$this->tahun->TooltipValue = "";

			// bulan
			$this->bulan->LinkCustomAttributes = "";
			$this->bulan->HrefValue = "";
			$this->bulan->TooltipValue = "";

			// pegawai
			$this->pegawai->LinkCustomAttributes = "";
			$this->pegawai->HrefValue = "";
			$this->pegawai->TooltipValue = "";

			// jenjang_id
			$this->jenjang_id->LinkCustomAttributes = "";
			$this->jenjang_id->HrefValue = "";
			$this->jenjang_id->TooltipValue = "";

			// jabatan_id
			$this->jabatan_id->LinkCustomAttributes = "";
			$this->jabatan_id->HrefValue = "";
			$this->jabatan_id->TooltipValue = "";

			// lama_kerja
			$this->lama_kerja->LinkCustomAttributes = "";
			$this->lama_kerja->HrefValue = "";
			$this->lama_kerja->TooltipValue = "";

			// ijasah
			$this->ijasah->LinkCustomAttributes = "";
			$this->ijasah->HrefValue = "";
			$this->ijasah->TooltipValue = "";

			// type_jabatan
			$this->type_jabatan->LinkCustomAttributes = "";
			$this->type_jabatan->HrefValue = "";
			$this->type_jabatan->TooltipValue = "";

			// tambahan
			$this->tambahan->LinkCustomAttributes = "";
			$this->tambahan->HrefValue = "";
			$this->tambahan->TooltipValue = "";

			// sertif
			$this->sertif->LinkCustomAttributes = "";
			$this->sertif->HrefValue = "";
			$this->sertif->TooltipValue = "";

			// gapok
			$this->gapok->LinkCustomAttributes = "";
			$this->gapok->HrefValue = "";
			$this->gapok->TooltipValue = "";

			// kehadiran
			$this->kehadiran->LinkCustomAttributes = "";
			$this->kehadiran->HrefValue = "";
			$this->kehadiran->TooltipValue = "";

			// value_kehadiran
			$this->value_kehadiran->LinkCustomAttributes = "";
			$this->value_kehadiran->HrefValue = "";
			$this->value_kehadiran->TooltipValue = "";

			// lembur
			$this->lembur->LinkCustomAttributes = "";
			$this->lembur->HrefValue = "";
			$this->lembur->TooltipValue = "";

			// value_lembur
			$this->value_lembur->LinkCustomAttributes = "";
			$this->value_lembur->HrefValue = "";
			$this->value_lembur->TooltipValue = "";

			// value_reward
			$this->value_reward->LinkCustomAttributes = "";
			$this->value_reward->HrefValue = "";
			$this->value_reward->TooltipValue = "";

			// value_inval
			$this->value_inval->LinkCustomAttributes = "";
			$this->value_inval->HrefValue = "";
			$this->value_inval->TooltipValue = "";

			// piket_count
			$this->piket_count->LinkCustomAttributes = "";
			$this->piket_count->HrefValue = "";
			$this->piket_count->TooltipValue = "";

			// value_piket
			$this->value_piket->LinkCustomAttributes = "";
			$this->value_piket->HrefValue = "";
			$this->value_piket->TooltipValue = "";

			// tugastambahan
			$this->tugastambahan->LinkCustomAttributes = "";
			$this->tugastambahan->HrefValue = "";
			$this->tugastambahan->TooltipValue = "";

			// tj_jabatan
			$this->tj_jabatan->LinkCustomAttributes = "";
			$this->tj_jabatan->HrefValue = "";
			$this->tj_jabatan->TooltipValue = "";

			// tunjangan2
			$this->tunjangan2->LinkCustomAttributes = "";
			$this->tunjangan2->HrefValue = "";
			$this->tunjangan2->TooltipValue = "";

			// sub_total
			$this->sub_total->LinkCustomAttributes = "";
			$this->sub_total->HrefValue = "";
			$this->sub_total->TooltipValue = "";

			// potongan
			$this->potongan->LinkCustomAttributes = "";
			$this->potongan->HrefValue = "";
			$this->potongan->TooltipValue = "";

			// penyesuaian
			$this->penyesuaian->LinkCustomAttributes = "";
			$this->penyesuaian->HrefValue = "";
			$this->penyesuaian->TooltipValue = "";

			// total
			$this->total->LinkCustomAttributes = "";
			$this->total->HrefValue = "";
			$this->total->TooltipValue = "";

			// voucher
			$this->voucher->LinkCustomAttributes = "";
			$this->voucher->HrefValue = "";
			$this->voucher->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// tahun
			$this->tahun->EditAttrs["class"] = "form-control";
			$this->tahun->EditCustomAttributes = "";
			$this->tahun->EditValue = HtmlEncode($this->tahun->AdvancedSearch->SearchValue);
			$this->tahun->PlaceHolder = RemoveHtml($this->tahun->caption());

			// bulan
			$this->bulan->EditCustomAttributes = "";
			$curVal = trim(strval($this->bulan->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->bulan->AdvancedSearch->ViewValue = $this->bulan->lookupCacheOption($curVal);
			else
				$this->bulan->AdvancedSearch->ViewValue = $this->bulan->Lookup !== NULL && is_array($this->bulan->Lookup->Options) ? $curVal : NULL;
			if ($this->bulan->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->bulan->EditValue = array_values($this->bulan->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk != "")
							$filterWrk .= " OR ";
						$filterWrk .= "`id`" . SearchString("=", trim($wrk), DATATYPE_NUMBER, "");
					}
				}
				$sqlWrk = $this->bulan->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->bulan->EditValue = $arwrk;
			}

			// pegawai
			$this->pegawai->EditAttrs["class"] = "form-control";
			$this->pegawai->EditCustomAttributes = "";

			// jenjang_id
			$this->jenjang_id->EditAttrs["class"] = "form-control";
			$this->jenjang_id->EditCustomAttributes = "";
			$this->jenjang_id->EditValue = HtmlEncode($this->jenjang_id->AdvancedSearch->SearchValue);
			$this->jenjang_id->PlaceHolder = RemoveHtml($this->jenjang_id->caption());

			// jabatan_id
			$this->jabatan_id->EditAttrs["class"] = "form-control";
			$this->jabatan_id->EditCustomAttributes = "";
			$this->jabatan_id->EditValue = HtmlEncode($this->jabatan_id->AdvancedSearch->SearchValue);
			$this->jabatan_id->PlaceHolder = RemoveHtml($this->jabatan_id->caption());

			// lama_kerja
			$this->lama_kerja->EditAttrs["class"] = "form-control";
			$this->lama_kerja->EditCustomAttributes = "";
			$this->lama_kerja->EditValue = HtmlEncode($this->lama_kerja->AdvancedSearch->SearchValue);
			$this->lama_kerja->PlaceHolder = RemoveHtml($this->lama_kerja->caption());

			// ijasah
			$this->ijasah->EditAttrs["class"] = "form-control";
			$this->ijasah->EditCustomAttributes = "";
			$this->ijasah->EditValue = HtmlEncode($this->ijasah->AdvancedSearch->SearchValue);
			$this->ijasah->PlaceHolder = RemoveHtml($this->ijasah->caption());

			// type_jabatan
			$this->type_jabatan->EditAttrs["class"] = "form-control";
			$this->type_jabatan->EditCustomAttributes = "";
			$this->type_jabatan->EditValue = HtmlEncode($this->type_jabatan->AdvancedSearch->SearchValue);
			$this->type_jabatan->PlaceHolder = RemoveHtml($this->type_jabatan->caption());

			// tambahan
			$this->tambahan->EditAttrs["class"] = "form-control";
			$this->tambahan->EditCustomAttributes = "";
			$this->tambahan->EditValue = HtmlEncode($this->tambahan->AdvancedSearch->SearchValue);
			$this->tambahan->PlaceHolder = RemoveHtml($this->tambahan->caption());

			// sertif
			$this->sertif->EditAttrs["class"] = "form-control";
			$this->sertif->EditCustomAttributes = "";
			$this->sertif->EditValue = HtmlEncode($this->sertif->AdvancedSearch->SearchValue);
			$this->sertif->PlaceHolder = RemoveHtml($this->sertif->caption());

			// gapok
			$this->gapok->EditAttrs["class"] = "form-control";
			$this->gapok->EditCustomAttributes = "";
			$this->gapok->EditValue = HtmlEncode($this->gapok->AdvancedSearch->SearchValue);
			$this->gapok->PlaceHolder = RemoveHtml($this->gapok->caption());

			// kehadiran
			$this->kehadiran->EditAttrs["class"] = "form-control";
			$this->kehadiran->EditCustomAttributes = "";
			$this->kehadiran->EditValue = HtmlEncode($this->kehadiran->AdvancedSearch->SearchValue);
			$this->kehadiran->PlaceHolder = RemoveHtml($this->kehadiran->caption());

			// value_kehadiran
			$this->value_kehadiran->EditAttrs["class"] = "form-control";
			$this->value_kehadiran->EditCustomAttributes = "";
			$this->value_kehadiran->EditValue = HtmlEncode($this->value_kehadiran->AdvancedSearch->SearchValue);
			$this->value_kehadiran->PlaceHolder = RemoveHtml($this->value_kehadiran->caption());

			// lembur
			$this->lembur->EditAttrs["class"] = "form-control";
			$this->lembur->EditCustomAttributes = "";
			$this->lembur->EditValue = HtmlEncode($this->lembur->AdvancedSearch->SearchValue);
			$this->lembur->PlaceHolder = RemoveHtml($this->lembur->caption());

			// value_lembur
			$this->value_lembur->EditAttrs["class"] = "form-control";
			$this->value_lembur->EditCustomAttributes = "";
			$this->value_lembur->EditValue = HtmlEncode($this->value_lembur->AdvancedSearch->SearchValue);
			$this->value_lembur->PlaceHolder = RemoveHtml($this->value_lembur->caption());

			// value_reward
			$this->value_reward->EditAttrs["class"] = "form-control";
			$this->value_reward->EditCustomAttributes = "";
			$this->value_reward->EditValue = HtmlEncode($this->value_reward->AdvancedSearch->SearchValue);
			$this->value_reward->PlaceHolder = RemoveHtml($this->value_reward->caption());

			// value_inval
			$this->value_inval->EditAttrs["class"] = "form-control";
			$this->value_inval->EditCustomAttributes = "";
			$this->value_inval->EditValue = HtmlEncode($this->value_inval->AdvancedSearch->SearchValue);
			$this->value_inval->PlaceHolder = RemoveHtml($this->value_inval->caption());

			// piket_count
			$this->piket_count->EditAttrs["class"] = "form-control";
			$this->piket_count->EditCustomAttributes = "";
			$this->piket_count->EditValue = HtmlEncode($this->piket_count->AdvancedSearch->SearchValue);
			$this->piket_count->PlaceHolder = RemoveHtml($this->piket_count->caption());

			// value_piket
			$this->value_piket->EditAttrs["class"] = "form-control";
			$this->value_piket->EditCustomAttributes = "";
			$this->value_piket->EditValue = HtmlEncode($this->value_piket->AdvancedSearch->SearchValue);
			$this->value_piket->PlaceHolder = RemoveHtml($this->value_piket->caption());

			// tugastambahan
			$this->tugastambahan->EditAttrs["class"] = "form-control";
			$this->tugastambahan->EditCustomAttributes = "";
			$this->tugastambahan->EditValue = HtmlEncode($this->tugastambahan->AdvancedSearch->SearchValue);
			$this->tugastambahan->PlaceHolder = RemoveHtml($this->tugastambahan->caption());

			// tj_jabatan
			$this->tj_jabatan->EditAttrs["class"] = "form-control";
			$this->tj_jabatan->EditCustomAttributes = "";
			$this->tj_jabatan->EditValue = HtmlEncode($this->tj_jabatan->AdvancedSearch->SearchValue);
			$this->tj_jabatan->PlaceHolder = RemoveHtml($this->tj_jabatan->caption());

			// tunjangan2
			$this->tunjangan2->EditAttrs["class"] = "form-control";
			$this->tunjangan2->EditCustomAttributes = "";
			$this->tunjangan2->EditValue = HtmlEncode($this->tunjangan2->AdvancedSearch->SearchValue);
			$this->tunjangan2->PlaceHolder = RemoveHtml($this->tunjangan2->caption());

			// sub_total
			$this->sub_total->EditAttrs["class"] = "form-control";
			$this->sub_total->EditCustomAttributes = "";
			$this->sub_total->EditValue = HtmlEncode($this->sub_total->AdvancedSearch->SearchValue);
			$this->sub_total->PlaceHolder = RemoveHtml($this->sub_total->caption());

			// potongan
			$this->potongan->EditAttrs["class"] = "form-control";
			$this->potongan->EditCustomAttributes = "";
			$this->potongan->EditValue = HtmlEncode($this->potongan->AdvancedSearch->SearchValue);
			$this->potongan->PlaceHolder = RemoveHtml($this->potongan->caption());

			// penyesuaian
			$this->penyesuaian->EditAttrs["class"] = "form-control";
			$this->penyesuaian->EditCustomAttributes = "";
			$this->penyesuaian->EditValue = HtmlEncode($this->penyesuaian->AdvancedSearch->SearchValue);
			$this->penyesuaian->PlaceHolder = RemoveHtml($this->penyesuaian->caption());

			// total
			$this->total->EditAttrs["class"] = "form-control";
			$this->total->EditCustomAttributes = "";
			$this->total->EditValue = HtmlEncode($this->total->AdvancedSearch->SearchValue);
			$this->total->PlaceHolder = RemoveHtml($this->total->caption());

			// voucher
			$this->voucher->EditAttrs["class"] = "form-control";
			$this->voucher->EditCustomAttributes = "";
			$this->voucher->EditValue = HtmlEncode($this->voucher->AdvancedSearch->SearchValue);
			$this->voucher->PlaceHolder = RemoveHtml($this->voucher->caption());
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate search
	protected function validateSearch()
	{
		global $SearchError;

		// Initialize
		$SearchError = "";

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return TRUE;
		if (!CheckInteger($this->tahun->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->tahun->errorMessage());
		}

		// Return validate result
		$validateSearch = ($SearchError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateSearch = $validateSearch && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError != "") {
			AddMessage($SearchError, $formCustomError);
		}
		return $validateSearch;
	}

	// Load advanced search
	public function loadAdvancedSearch()
	{
		$this->id->AdvancedSearch->load();
		$this->pid->AdvancedSearch->load();
		$this->tahun->AdvancedSearch->load();
		$this->bulan->AdvancedSearch->load();
		$this->pegawai->AdvancedSearch->load();
		$this->jenjang_id->AdvancedSearch->load();
		$this->jabatan_id->AdvancedSearch->load();
		$this->lama_kerja->AdvancedSearch->load();
		$this->ijasah->AdvancedSearch->load();
		$this->type_jabatan->AdvancedSearch->load();
		$this->tambahan->AdvancedSearch->load();
		$this->sertif->AdvancedSearch->load();
		$this->gapok->AdvancedSearch->load();
		$this->kehadiran->AdvancedSearch->load();
		$this->value_kehadiran->AdvancedSearch->load();
		$this->lembur->AdvancedSearch->load();
		$this->value_lembur->AdvancedSearch->load();
		$this->value_reward->AdvancedSearch->load();
		$this->value_inval->AdvancedSearch->load();
		$this->piket_count->AdvancedSearch->load();
		$this->value_piket->AdvancedSearch->load();
		$this->tugastambahan->AdvancedSearch->load();
		$this->tj_jabatan->AdvancedSearch->load();
		$this->tunjangan2->AdvancedSearch->load();
		$this->sub_total->AdvancedSearch->load();
		$this->potongan->AdvancedSearch->load();
		$this->penyesuaian->AdvancedSearch->load();
		$this->total->AdvancedSearch->load();
		$this->voucher->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fvgaji_tu_smplist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fvgaji_tu_smplist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fvgaji_tu_smplist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
			else
				return "<a href=\"" . $this->ExportPdfUrl . "\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\">" . $Language->phrase("ExportToPDF") . "</a>";
		} elseif (SameText($type, "html")) {
			return "<a href=\"" . $this->ExportHtmlUrl . "\" class=\"ew-export-link ew-html\" title=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\">" . $Language->phrase("ExportToHtml") . "</a>";
		} elseif (SameText($type, "xml")) {
			return "<a href=\"" . $this->ExportXmlUrl . "\" class=\"ew-export-link ew-xml\" title=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\">" . $Language->phrase("ExportToXml") . "</a>";
		} elseif (SameText($type, "csv")) {
			return "<a href=\"" . $this->ExportCsvUrl . "\" class=\"ew-export-link ew-csv\" title=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\">" . $Language->phrase("ExportToCsv") . "</a>";
		} elseif (SameText($type, "email")) {
			$url = $custom ? ",url:'" . $this->pageUrl() . "export=email&amp;custom=1'" : "";
			return '<button id="emf_vgaji_tu_smp" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_vgaji_tu_smp\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fvgaji_tu_smplist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
		} elseif (SameText($type, "print")) {
			return "<a href=\"" . $this->ExportPrintUrl . "\" class=\"ew-export-link ew-print\" title=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\">" . $Language->phrase("PrinterFriendly") . "</a>";
		}
	}

	// Set up export options
	protected function setupExportOptions()
	{
		global $Language;

		// Printer friendly
		$item = &$this->ExportOptions->add("print");
		$item->Body = $this->getExportTag("print");
		$item->Visible = FALSE;

		// Export to Excel
		$item = &$this->ExportOptions->add("excel");
		$item->Body = $this->getExportTag("excel");
		$item->Visible = TRUE;

		// Export to Word
		$item = &$this->ExportOptions->add("word");
		$item->Body = $this->getExportTag("word");
		$item->Visible = FALSE;

		// Export to Html
		$item = &$this->ExportOptions->add("html");
		$item->Body = $this->getExportTag("html");
		$item->Visible = FALSE;

		// Export to Xml
		$item = &$this->ExportOptions->add("xml");
		$item->Body = $this->getExportTag("xml");
		$item->Visible = FALSE;

		// Export to Csv
		$item = &$this->ExportOptions->add("csv");
		$item->Body = $this->getExportTag("csv");
		$item->Visible = FALSE;

		// Export to Pdf
		$item = &$this->ExportOptions->add("pdf");
		$item->Body = $this->getExportTag("pdf");
		$item->Visible = FALSE;

		// Export to Email
		$item = &$this->ExportOptions->add("email");
		$item->Body = $this->getExportTag("email");
		$item->Visible = FALSE;

		// Drop down button for export
		$this->ExportOptions->UseButtonGroup = TRUE;
		$this->ExportOptions->UseDropDownButton = FALSE;
		if ($this->ExportOptions->UseButtonGroup && IsMobile())
			$this->ExportOptions->UseDropDownButton = TRUE;
		$this->ExportOptions->DropDownButtonPhrase = $Language->phrase("ButtonExport");

		// Add group option item
		$item = &$this->ExportOptions->add($this->ExportOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	// Set up search options
	protected function setupSearchOptions()
	{
		global $Language;
		$this->SearchOptions = new ListOptions("div");
		$this->SearchOptions->TagClassName = "ew-search-option";

		// Search button
		$item = &$this->SearchOptions->add("searchtoggle");
		$searchToggleClass = ($this->SearchWhere != "") ? " active" : " active";
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fvgaji_tu_smplistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

		// Button group for search
		$this->SearchOptions->UseDropDownButton = FALSE;
		$this->SearchOptions->UseButtonGroup = TRUE;
		$this->SearchOptions->DropDownButtonPhrase = $Language->phrase("ButtonSearch");

		// Add group option item
		$item = &$this->SearchOptions->add($this->SearchOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Hide search options
		if ($this->isExport() || $this->CurrentAction)
			$this->SearchOptions->hideAllOptions();
		global $Security;
		if (!$Security->canSearch()) {
			$this->SearchOptions->hideAllOptions();
			$this->FilterOptions->hideAllOptions();
		}
	}

	/**
	 * Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
	 *
	 * @param boolean $return Return the data rather than output it
	 * @return mixed
	 */
	public function exportData($return = FALSE)
	{
		global $Language;
		$utf8 = SameText(Config("PROJECT_CHARSET"), "utf-8");
		$selectLimit = $this->UseSelectLimit;

		// Load recordset
		if ($selectLimit) {
			$this->TotalRecords = $this->listRecordCount();
		} else {
			if (!$this->Recordset)
				$this->Recordset = $this->loadRecordset();
			$rs = &$this->Recordset;
			if ($rs)
				$this->TotalRecords = $rs->RecordCount();
		}
		$this->StartRecord = 1;

		// Export all
		if ($this->ExportAll) {
			set_time_limit(Config("EXPORT_ALL_TIME_LIMIT"));
			$this->DisplayRecords = $this->TotalRecords;
			$this->StopRecord = $this->TotalRecords;
		} else { // Export one page only
			$this->setupStartRecord(); // Set up start record position

			// Set the last record to display
			if ($this->DisplayRecords <= 0) {
				$this->StopRecord = $this->TotalRecords;
			} else {
				$this->StopRecord = $this->StartRecord + $this->DisplayRecords - 1;
			}
		}
		if ($selectLimit)
			$rs = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords);
		$this->ExportDoc = GetExportDocument($this, "h");
		$doc = &$this->ExportDoc;
		if (!$doc)
			$this->setFailureMessage($Language->phrase("ExportClassNotFound")); // Export class not found
		if (!$rs || !$doc) {
			RemoveHeader("Content-Type"); // Remove header
			RemoveHeader("Content-Disposition");
			$this->showMessage();
			return;
		}
		if ($selectLimit) {
			$this->StartRecord = 1;
			$this->StopRecord = $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords;
		}

		// Call Page Exporting server event
		$this->ExportDoc->ExportCustom = !$this->Page_Exporting();
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		$doc->Text .= $header;
		$this->exportDocument($doc, $rs, $this->StartRecord, $this->StopRecord, "");
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		$doc->Text .= $footer;

		// Close recordset
		$rs->close();

		// Call Page Exported server event
		$this->Page_Exported();

		// Export header and footer
		$doc->exportHeaderAndFooter();

		// Clean output buffer (without destroying output buffer)
		$buffer = ob_get_contents(); // Save the output buffer
		if (!Config("DEBUG") && $buffer)
			ob_clean();

		// Write debug message if enabled
		if (Config("DEBUG") && !$this->isExport("pdf"))
			echo GetDebugMessage();

		// Output data
		if ($this->isExport("email")) {

			// Export-to-email disabled
		} else {
			$doc->export();
			if ($return) {
				RemoveHeader("Content-Type"); // Remove header
				RemoveHeader("Content-Disposition");
				$content = ob_get_contents();
				if ($content)
					ob_clean();
				if ($buffer)
					echo $buffer; // Resume the output buffer
				return $content;
			}
		}
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
		$Breadcrumb->add("list", $this->TableVar, $url, "", $this->TableVar, TRUE);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// Get default connection and filter
			$conn = $this->getConnection();
			$lookupFilter = "";

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL and connection
			switch ($fld->FieldVar) {
				case "x_bulan":
					break;
				case "x_pegawai":
					break;
				case "x_jenjang_id":
					break;
				case "x_jabatan_id":
					break;
				case "x_type_jabatan":
					break;
				case "x_tambahan":
					break;
				case "x_sertif":
					break;
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql != "" && count($fld->Lookup->Options) == 0) {
				$totalCnt = $this->getRecordCount($sql, $conn);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
						case "x_bulan":
							break;
						case "x_pegawai":
							break;
						case "x_jenjang_id":
							break;
						case "x_jabatan_id":
							break;
						case "x_type_jabatan":
							break;
						case "x_tambahan":
							break;
						case "x_sertif":
							break;
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Set up starting record parameters
	public function setupStartRecord()
	{
		if ($this->DisplayRecords == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			$startRec = Get(Config("TABLE_START_REC"));
			$pageNo = Get(Config("TABLE_PAGE_NO"));
			if ($pageNo !== NULL) { // Check for "pageno" parameter first
				if (is_numeric($pageNo)) {
					$this->StartRecord = ($pageNo - 1) * $this->DisplayRecords + 1;
					if ($this->StartRecord <= 0) {
						$this->StartRecord = 1;
					} elseif ($this->StartRecord >= (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1) {
						$this->StartRecord = (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1;
					}
					$this->setStartRecordNumber($this->StartRecord);
				}
			} elseif ($startRec !== NULL) { // Check for "start" parameter
				$this->StartRecord = $startRec;
				$this->setStartRecordNumber($this->StartRecord);
			}
		}
		$this->StartRecord = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRecord) || $this->StartRecord == "") { // Avoid invalid start record counter
			$this->StartRecord = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRecord);
		} elseif ($this->StartRecord > $this->TotalRecords) { // Avoid starting record > total records
			$this->StartRecord = (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRecord);
		} elseif (($this->StartRecord - 1) % $this->DisplayRecords != 0) {
			$this->StartRecord = (int)(($this->StartRecord - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRecord);
		}
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

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}

	// ListOptions Load event
	function ListOptions_Load() {

		// Example:
		//$opt = &$this->ListOptions->Add("new");
		//$opt->Header = "xxx";
		//$opt->OnLeft = TRUE; // Link on left
		//$opt->MoveTo(0); // Move to first column

	}

	// ListOptions Rendering event
	function ListOptions_Rendering() {

		//$GLOBALS["xxx_grid"]->DetailAdd = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailEdit = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailView = (...condition...); // Set to TRUE or FALSE conditionally

	}

	// ListOptions Rendered event
	function ListOptions_Rendered() {

		// Example:
		//$this->ListOptions["new"]->Body = "xxx";

	}

	// Row Custom Action event
	function Row_CustomAction($action, $row) {

		// Return FALSE to abort
		return TRUE;
	}

	// Page Exporting event
	// $this->ExportDoc = export document object
	function Page_Exporting() {

		//$this->ExportDoc->Text = "my header"; // Export header
		//return FALSE; // Return FALSE to skip default export and use Row_Export event

		return TRUE; // Return TRUE to use default export and skip Row_Export event
	}

	// Row Export event
	// $this->ExportDoc = export document object
	function Row_Export($rs) {

		//$this->ExportDoc->Text .= "my content"; // Build HTML with field value: $rs["MyField"] or $this->MyField->ViewValue
	}

	// Page Exported event
	// $this->ExportDoc = export document object
	function Page_Exported() {

		//$this->ExportDoc->Text .= "my footer"; // Export footer
		//echo $this->ExportDoc->Text;

	}

	// Page Importing event
	function Page_Importing($reader, &$options) {

		//var_dump($reader); // Import data reader
		//var_dump($options); // Show all options for importing
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Row Import event
	function Row_Import(&$row, $cnt) {

		//echo $cnt; // Import record count
		//var_dump($row); // Import row
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Page Imported event
	function Page_Imported($reader, $results) {

		//var_dump($reader); // Import data reader
		//var_dump($results); // Import results

	}
} // End class
?>