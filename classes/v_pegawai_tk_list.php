<?php
namespace PHPMaker2020\sigap;

/**
 * Page class
 */
class v_pegawai_tk_list extends v_pegawai_tk
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}";

	// Table name
	public $TableName = 'v_pegawai_tk';

	// Page object name
	public $PageObjName = "v_pegawai_tk_list";

	// Grid form hidden field names
	public $FormName = "fv_pegawai_tklist";
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

		// Table object (v_pegawai_tk)
		if (!isset($GLOBALS["v_pegawai_tk"]) || get_class($GLOBALS["v_pegawai_tk"]) == PROJECT_NAMESPACE . "v_pegawai_tk") {
			$GLOBALS["v_pegawai_tk"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["v_pegawai_tk"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "v_pegawai_tkadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "v_pegawai_tkdelete.php";
		$this->MultiUpdateUrl = "v_pegawai_tkupdate.php";

		// Table object (pegawai)
		if (!isset($GLOBALS['pegawai']))
			$GLOBALS['pegawai'] = new pegawai();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'v_pegawai_tk');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fv_pegawai_tklistsrch";

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
		global $v_pegawai_tk;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($v_pegawai_tk);
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
		$this->nip->setVisibility();
		$this->username->Visible = FALSE;
		$this->password->setVisibility();
		$this->jenjang_id->setVisibility();
		$this->jabatan->setVisibility();
		$this->periode_jabatan->setVisibility();
		$this->jjm->Visible = FALSE;
		$this->status_peg->setVisibility();
		$this->type->setVisibility();
		$this->sertif->setVisibility();
		$this->tambahan->setVisibility();
		$this->lama_kerja->setVisibility();
		$this->nama->setVisibility();
		$this->alamat->setVisibility();
		$this->_email->setVisibility();
		$this->wa->setVisibility();
		$this->hp->setVisibility();
		$this->tgllahir->setVisibility();
		$this->rekbank->setVisibility();
		$this->pendidikan->setVisibility();
		$this->jurusan->setVisibility();
		$this->agama->setVisibility();
		$this->jenkel->setVisibility();
		$this->status->Visible = FALSE;
		$this->foto->setVisibility();
		$this->file_cv->Visible = FALSE;
		$this->mulai_bekerja->Visible = FALSE;
		$this->keterangan->setVisibility();
		$this->level->setVisibility();
		$this->aktif->Visible = FALSE;
		$this->kehadiran->Visible = FALSE;
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
		$this->setupLookupOptions($this->jenjang_id);
		$this->setupLookupOptions($this->jabatan);
		$this->setupLookupOptions($this->status_peg);
		$this->setupLookupOptions($this->type);
		$this->setupLookupOptions($this->sertif);
		$this->setupLookupOptions($this->tambahan);
		$this->setupLookupOptions($this->pendidikan);
		$this->setupLookupOptions($this->agama);
		$this->setupLookupOptions($this->jenkel);
		$this->setupLookupOptions($this->level);

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
		$filterList = Concat($filterList, $this->nip->AdvancedSearch->toJson(), ","); // Field nip
		$filterList = Concat($filterList, $this->username->AdvancedSearch->toJson(), ","); // Field username
		$filterList = Concat($filterList, $this->password->AdvancedSearch->toJson(), ","); // Field password
		$filterList = Concat($filterList, $this->jenjang_id->AdvancedSearch->toJson(), ","); // Field jenjang_id
		$filterList = Concat($filterList, $this->jabatan->AdvancedSearch->toJson(), ","); // Field jabatan
		$filterList = Concat($filterList, $this->periode_jabatan->AdvancedSearch->toJson(), ","); // Field periode_jabatan
		$filterList = Concat($filterList, $this->jjm->AdvancedSearch->toJson(), ","); // Field jjm
		$filterList = Concat($filterList, $this->status_peg->AdvancedSearch->toJson(), ","); // Field status_peg
		$filterList = Concat($filterList, $this->type->AdvancedSearch->toJson(), ","); // Field type
		$filterList = Concat($filterList, $this->sertif->AdvancedSearch->toJson(), ","); // Field sertif
		$filterList = Concat($filterList, $this->tambahan->AdvancedSearch->toJson(), ","); // Field tambahan
		$filterList = Concat($filterList, $this->lama_kerja->AdvancedSearch->toJson(), ","); // Field lama_kerja
		$filterList = Concat($filterList, $this->nama->AdvancedSearch->toJson(), ","); // Field nama
		$filterList = Concat($filterList, $this->alamat->AdvancedSearch->toJson(), ","); // Field alamat
		$filterList = Concat($filterList, $this->_email->AdvancedSearch->toJson(), ","); // Field email
		$filterList = Concat($filterList, $this->wa->AdvancedSearch->toJson(), ","); // Field wa
		$filterList = Concat($filterList, $this->hp->AdvancedSearch->toJson(), ","); // Field hp
		$filterList = Concat($filterList, $this->tgllahir->AdvancedSearch->toJson(), ","); // Field tgllahir
		$filterList = Concat($filterList, $this->rekbank->AdvancedSearch->toJson(), ","); // Field rekbank
		$filterList = Concat($filterList, $this->pendidikan->AdvancedSearch->toJson(), ","); // Field pendidikan
		$filterList = Concat($filterList, $this->jurusan->AdvancedSearch->toJson(), ","); // Field jurusan
		$filterList = Concat($filterList, $this->agama->AdvancedSearch->toJson(), ","); // Field agama
		$filterList = Concat($filterList, $this->jenkel->AdvancedSearch->toJson(), ","); // Field jenkel
		$filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
		$filterList = Concat($filterList, $this->foto->AdvancedSearch->toJson(), ","); // Field foto
		$filterList = Concat($filterList, $this->file_cv->AdvancedSearch->toJson(), ","); // Field file_cv
		$filterList = Concat($filterList, $this->mulai_bekerja->AdvancedSearch->toJson(), ","); // Field mulai_bekerja
		$filterList = Concat($filterList, $this->keterangan->AdvancedSearch->toJson(), ","); // Field keterangan
		$filterList = Concat($filterList, $this->level->AdvancedSearch->toJson(), ","); // Field level
		$filterList = Concat($filterList, $this->aktif->AdvancedSearch->toJson(), ","); // Field aktif
		$filterList = Concat($filterList, $this->kehadiran->AdvancedSearch->toJson(), ","); // Field kehadiran
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fv_pegawai_tklistsrch", $filters);
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

		// Field nip
		$this->nip->AdvancedSearch->SearchValue = @$filter["x_nip"];
		$this->nip->AdvancedSearch->SearchOperator = @$filter["z_nip"];
		$this->nip->AdvancedSearch->SearchCondition = @$filter["v_nip"];
		$this->nip->AdvancedSearch->SearchValue2 = @$filter["y_nip"];
		$this->nip->AdvancedSearch->SearchOperator2 = @$filter["w_nip"];
		$this->nip->AdvancedSearch->save();

		// Field username
		$this->username->AdvancedSearch->SearchValue = @$filter["x_username"];
		$this->username->AdvancedSearch->SearchOperator = @$filter["z_username"];
		$this->username->AdvancedSearch->SearchCondition = @$filter["v_username"];
		$this->username->AdvancedSearch->SearchValue2 = @$filter["y_username"];
		$this->username->AdvancedSearch->SearchOperator2 = @$filter["w_username"];
		$this->username->AdvancedSearch->save();

		// Field password
		$this->password->AdvancedSearch->SearchValue = @$filter["x_password"];
		$this->password->AdvancedSearch->SearchOperator = @$filter["z_password"];
		$this->password->AdvancedSearch->SearchCondition = @$filter["v_password"];
		$this->password->AdvancedSearch->SearchValue2 = @$filter["y_password"];
		$this->password->AdvancedSearch->SearchOperator2 = @$filter["w_password"];
		$this->password->AdvancedSearch->save();

		// Field jenjang_id
		$this->jenjang_id->AdvancedSearch->SearchValue = @$filter["x_jenjang_id"];
		$this->jenjang_id->AdvancedSearch->SearchOperator = @$filter["z_jenjang_id"];
		$this->jenjang_id->AdvancedSearch->SearchCondition = @$filter["v_jenjang_id"];
		$this->jenjang_id->AdvancedSearch->SearchValue2 = @$filter["y_jenjang_id"];
		$this->jenjang_id->AdvancedSearch->SearchOperator2 = @$filter["w_jenjang_id"];
		$this->jenjang_id->AdvancedSearch->save();

		// Field jabatan
		$this->jabatan->AdvancedSearch->SearchValue = @$filter["x_jabatan"];
		$this->jabatan->AdvancedSearch->SearchOperator = @$filter["z_jabatan"];
		$this->jabatan->AdvancedSearch->SearchCondition = @$filter["v_jabatan"];
		$this->jabatan->AdvancedSearch->SearchValue2 = @$filter["y_jabatan"];
		$this->jabatan->AdvancedSearch->SearchOperator2 = @$filter["w_jabatan"];
		$this->jabatan->AdvancedSearch->save();

		// Field periode_jabatan
		$this->periode_jabatan->AdvancedSearch->SearchValue = @$filter["x_periode_jabatan"];
		$this->periode_jabatan->AdvancedSearch->SearchOperator = @$filter["z_periode_jabatan"];
		$this->periode_jabatan->AdvancedSearch->SearchCondition = @$filter["v_periode_jabatan"];
		$this->periode_jabatan->AdvancedSearch->SearchValue2 = @$filter["y_periode_jabatan"];
		$this->periode_jabatan->AdvancedSearch->SearchOperator2 = @$filter["w_periode_jabatan"];
		$this->periode_jabatan->AdvancedSearch->save();

		// Field jjm
		$this->jjm->AdvancedSearch->SearchValue = @$filter["x_jjm"];
		$this->jjm->AdvancedSearch->SearchOperator = @$filter["z_jjm"];
		$this->jjm->AdvancedSearch->SearchCondition = @$filter["v_jjm"];
		$this->jjm->AdvancedSearch->SearchValue2 = @$filter["y_jjm"];
		$this->jjm->AdvancedSearch->SearchOperator2 = @$filter["w_jjm"];
		$this->jjm->AdvancedSearch->save();

		// Field status_peg
		$this->status_peg->AdvancedSearch->SearchValue = @$filter["x_status_peg"];
		$this->status_peg->AdvancedSearch->SearchOperator = @$filter["z_status_peg"];
		$this->status_peg->AdvancedSearch->SearchCondition = @$filter["v_status_peg"];
		$this->status_peg->AdvancedSearch->SearchValue2 = @$filter["y_status_peg"];
		$this->status_peg->AdvancedSearch->SearchOperator2 = @$filter["w_status_peg"];
		$this->status_peg->AdvancedSearch->save();

		// Field type
		$this->type->AdvancedSearch->SearchValue = @$filter["x_type"];
		$this->type->AdvancedSearch->SearchOperator = @$filter["z_type"];
		$this->type->AdvancedSearch->SearchCondition = @$filter["v_type"];
		$this->type->AdvancedSearch->SearchValue2 = @$filter["y_type"];
		$this->type->AdvancedSearch->SearchOperator2 = @$filter["w_type"];
		$this->type->AdvancedSearch->save();

		// Field sertif
		$this->sertif->AdvancedSearch->SearchValue = @$filter["x_sertif"];
		$this->sertif->AdvancedSearch->SearchOperator = @$filter["z_sertif"];
		$this->sertif->AdvancedSearch->SearchCondition = @$filter["v_sertif"];
		$this->sertif->AdvancedSearch->SearchValue2 = @$filter["y_sertif"];
		$this->sertif->AdvancedSearch->SearchOperator2 = @$filter["w_sertif"];
		$this->sertif->AdvancedSearch->save();

		// Field tambahan
		$this->tambahan->AdvancedSearch->SearchValue = @$filter["x_tambahan"];
		$this->tambahan->AdvancedSearch->SearchOperator = @$filter["z_tambahan"];
		$this->tambahan->AdvancedSearch->SearchCondition = @$filter["v_tambahan"];
		$this->tambahan->AdvancedSearch->SearchValue2 = @$filter["y_tambahan"];
		$this->tambahan->AdvancedSearch->SearchOperator2 = @$filter["w_tambahan"];
		$this->tambahan->AdvancedSearch->save();

		// Field lama_kerja
		$this->lama_kerja->AdvancedSearch->SearchValue = @$filter["x_lama_kerja"];
		$this->lama_kerja->AdvancedSearch->SearchOperator = @$filter["z_lama_kerja"];
		$this->lama_kerja->AdvancedSearch->SearchCondition = @$filter["v_lama_kerja"];
		$this->lama_kerja->AdvancedSearch->SearchValue2 = @$filter["y_lama_kerja"];
		$this->lama_kerja->AdvancedSearch->SearchOperator2 = @$filter["w_lama_kerja"];
		$this->lama_kerja->AdvancedSearch->save();

		// Field nama
		$this->nama->AdvancedSearch->SearchValue = @$filter["x_nama"];
		$this->nama->AdvancedSearch->SearchOperator = @$filter["z_nama"];
		$this->nama->AdvancedSearch->SearchCondition = @$filter["v_nama"];
		$this->nama->AdvancedSearch->SearchValue2 = @$filter["y_nama"];
		$this->nama->AdvancedSearch->SearchOperator2 = @$filter["w_nama"];
		$this->nama->AdvancedSearch->save();

		// Field alamat
		$this->alamat->AdvancedSearch->SearchValue = @$filter["x_alamat"];
		$this->alamat->AdvancedSearch->SearchOperator = @$filter["z_alamat"];
		$this->alamat->AdvancedSearch->SearchCondition = @$filter["v_alamat"];
		$this->alamat->AdvancedSearch->SearchValue2 = @$filter["y_alamat"];
		$this->alamat->AdvancedSearch->SearchOperator2 = @$filter["w_alamat"];
		$this->alamat->AdvancedSearch->save();

		// Field email
		$this->_email->AdvancedSearch->SearchValue = @$filter["x__email"];
		$this->_email->AdvancedSearch->SearchOperator = @$filter["z__email"];
		$this->_email->AdvancedSearch->SearchCondition = @$filter["v__email"];
		$this->_email->AdvancedSearch->SearchValue2 = @$filter["y__email"];
		$this->_email->AdvancedSearch->SearchOperator2 = @$filter["w__email"];
		$this->_email->AdvancedSearch->save();

		// Field wa
		$this->wa->AdvancedSearch->SearchValue = @$filter["x_wa"];
		$this->wa->AdvancedSearch->SearchOperator = @$filter["z_wa"];
		$this->wa->AdvancedSearch->SearchCondition = @$filter["v_wa"];
		$this->wa->AdvancedSearch->SearchValue2 = @$filter["y_wa"];
		$this->wa->AdvancedSearch->SearchOperator2 = @$filter["w_wa"];
		$this->wa->AdvancedSearch->save();

		// Field hp
		$this->hp->AdvancedSearch->SearchValue = @$filter["x_hp"];
		$this->hp->AdvancedSearch->SearchOperator = @$filter["z_hp"];
		$this->hp->AdvancedSearch->SearchCondition = @$filter["v_hp"];
		$this->hp->AdvancedSearch->SearchValue2 = @$filter["y_hp"];
		$this->hp->AdvancedSearch->SearchOperator2 = @$filter["w_hp"];
		$this->hp->AdvancedSearch->save();

		// Field tgllahir
		$this->tgllahir->AdvancedSearch->SearchValue = @$filter["x_tgllahir"];
		$this->tgllahir->AdvancedSearch->SearchOperator = @$filter["z_tgllahir"];
		$this->tgllahir->AdvancedSearch->SearchCondition = @$filter["v_tgllahir"];
		$this->tgllahir->AdvancedSearch->SearchValue2 = @$filter["y_tgllahir"];
		$this->tgllahir->AdvancedSearch->SearchOperator2 = @$filter["w_tgllahir"];
		$this->tgllahir->AdvancedSearch->save();

		// Field rekbank
		$this->rekbank->AdvancedSearch->SearchValue = @$filter["x_rekbank"];
		$this->rekbank->AdvancedSearch->SearchOperator = @$filter["z_rekbank"];
		$this->rekbank->AdvancedSearch->SearchCondition = @$filter["v_rekbank"];
		$this->rekbank->AdvancedSearch->SearchValue2 = @$filter["y_rekbank"];
		$this->rekbank->AdvancedSearch->SearchOperator2 = @$filter["w_rekbank"];
		$this->rekbank->AdvancedSearch->save();

		// Field pendidikan
		$this->pendidikan->AdvancedSearch->SearchValue = @$filter["x_pendidikan"];
		$this->pendidikan->AdvancedSearch->SearchOperator = @$filter["z_pendidikan"];
		$this->pendidikan->AdvancedSearch->SearchCondition = @$filter["v_pendidikan"];
		$this->pendidikan->AdvancedSearch->SearchValue2 = @$filter["y_pendidikan"];
		$this->pendidikan->AdvancedSearch->SearchOperator2 = @$filter["w_pendidikan"];
		$this->pendidikan->AdvancedSearch->save();

		// Field jurusan
		$this->jurusan->AdvancedSearch->SearchValue = @$filter["x_jurusan"];
		$this->jurusan->AdvancedSearch->SearchOperator = @$filter["z_jurusan"];
		$this->jurusan->AdvancedSearch->SearchCondition = @$filter["v_jurusan"];
		$this->jurusan->AdvancedSearch->SearchValue2 = @$filter["y_jurusan"];
		$this->jurusan->AdvancedSearch->SearchOperator2 = @$filter["w_jurusan"];
		$this->jurusan->AdvancedSearch->save();

		// Field agama
		$this->agama->AdvancedSearch->SearchValue = @$filter["x_agama"];
		$this->agama->AdvancedSearch->SearchOperator = @$filter["z_agama"];
		$this->agama->AdvancedSearch->SearchCondition = @$filter["v_agama"];
		$this->agama->AdvancedSearch->SearchValue2 = @$filter["y_agama"];
		$this->agama->AdvancedSearch->SearchOperator2 = @$filter["w_agama"];
		$this->agama->AdvancedSearch->save();

		// Field jenkel
		$this->jenkel->AdvancedSearch->SearchValue = @$filter["x_jenkel"];
		$this->jenkel->AdvancedSearch->SearchOperator = @$filter["z_jenkel"];
		$this->jenkel->AdvancedSearch->SearchCondition = @$filter["v_jenkel"];
		$this->jenkel->AdvancedSearch->SearchValue2 = @$filter["y_jenkel"];
		$this->jenkel->AdvancedSearch->SearchOperator2 = @$filter["w_jenkel"];
		$this->jenkel->AdvancedSearch->save();

		// Field status
		$this->status->AdvancedSearch->SearchValue = @$filter["x_status"];
		$this->status->AdvancedSearch->SearchOperator = @$filter["z_status"];
		$this->status->AdvancedSearch->SearchCondition = @$filter["v_status"];
		$this->status->AdvancedSearch->SearchValue2 = @$filter["y_status"];
		$this->status->AdvancedSearch->SearchOperator2 = @$filter["w_status"];
		$this->status->AdvancedSearch->save();

		// Field foto
		$this->foto->AdvancedSearch->SearchValue = @$filter["x_foto"];
		$this->foto->AdvancedSearch->SearchOperator = @$filter["z_foto"];
		$this->foto->AdvancedSearch->SearchCondition = @$filter["v_foto"];
		$this->foto->AdvancedSearch->SearchValue2 = @$filter["y_foto"];
		$this->foto->AdvancedSearch->SearchOperator2 = @$filter["w_foto"];
		$this->foto->AdvancedSearch->save();

		// Field file_cv
		$this->file_cv->AdvancedSearch->SearchValue = @$filter["x_file_cv"];
		$this->file_cv->AdvancedSearch->SearchOperator = @$filter["z_file_cv"];
		$this->file_cv->AdvancedSearch->SearchCondition = @$filter["v_file_cv"];
		$this->file_cv->AdvancedSearch->SearchValue2 = @$filter["y_file_cv"];
		$this->file_cv->AdvancedSearch->SearchOperator2 = @$filter["w_file_cv"];
		$this->file_cv->AdvancedSearch->save();

		// Field mulai_bekerja
		$this->mulai_bekerja->AdvancedSearch->SearchValue = @$filter["x_mulai_bekerja"];
		$this->mulai_bekerja->AdvancedSearch->SearchOperator = @$filter["z_mulai_bekerja"];
		$this->mulai_bekerja->AdvancedSearch->SearchCondition = @$filter["v_mulai_bekerja"];
		$this->mulai_bekerja->AdvancedSearch->SearchValue2 = @$filter["y_mulai_bekerja"];
		$this->mulai_bekerja->AdvancedSearch->SearchOperator2 = @$filter["w_mulai_bekerja"];
		$this->mulai_bekerja->AdvancedSearch->save();

		// Field keterangan
		$this->keterangan->AdvancedSearch->SearchValue = @$filter["x_keterangan"];
		$this->keterangan->AdvancedSearch->SearchOperator = @$filter["z_keterangan"];
		$this->keterangan->AdvancedSearch->SearchCondition = @$filter["v_keterangan"];
		$this->keterangan->AdvancedSearch->SearchValue2 = @$filter["y_keterangan"];
		$this->keterangan->AdvancedSearch->SearchOperator2 = @$filter["w_keterangan"];
		$this->keterangan->AdvancedSearch->save();

		// Field level
		$this->level->AdvancedSearch->SearchValue = @$filter["x_level"];
		$this->level->AdvancedSearch->SearchOperator = @$filter["z_level"];
		$this->level->AdvancedSearch->SearchCondition = @$filter["v_level"];
		$this->level->AdvancedSearch->SearchValue2 = @$filter["y_level"];
		$this->level->AdvancedSearch->SearchOperator2 = @$filter["w_level"];
		$this->level->AdvancedSearch->save();

		// Field aktif
		$this->aktif->AdvancedSearch->SearchValue = @$filter["x_aktif"];
		$this->aktif->AdvancedSearch->SearchOperator = @$filter["z_aktif"];
		$this->aktif->AdvancedSearch->SearchCondition = @$filter["v_aktif"];
		$this->aktif->AdvancedSearch->SearchValue2 = @$filter["y_aktif"];
		$this->aktif->AdvancedSearch->SearchOperator2 = @$filter["w_aktif"];
		$this->aktif->AdvancedSearch->save();

		// Field kehadiran
		$this->kehadiran->AdvancedSearch->SearchValue = @$filter["x_kehadiran"];
		$this->kehadiran->AdvancedSearch->SearchOperator = @$filter["z_kehadiran"];
		$this->kehadiran->AdvancedSearch->SearchCondition = @$filter["v_kehadiran"];
		$this->kehadiran->AdvancedSearch->SearchValue2 = @$filter["y_kehadiran"];
		$this->kehadiran->AdvancedSearch->SearchOperator2 = @$filter["w_kehadiran"];
		$this->kehadiran->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->nip, $default, FALSE); // nip
		$this->buildSearchSql($where, $this->username, $default, FALSE); // username
		$this->buildSearchSql($where, $this->password, $default, FALSE); // password
		$this->buildSearchSql($where, $this->jenjang_id, $default, FALSE); // jenjang_id
		$this->buildSearchSql($where, $this->jabatan, $default, FALSE); // jabatan
		$this->buildSearchSql($where, $this->periode_jabatan, $default, FALSE); // periode_jabatan
		$this->buildSearchSql($where, $this->jjm, $default, FALSE); // jjm
		$this->buildSearchSql($where, $this->status_peg, $default, FALSE); // status_peg
		$this->buildSearchSql($where, $this->type, $default, FALSE); // type
		$this->buildSearchSql($where, $this->sertif, $default, FALSE); // sertif
		$this->buildSearchSql($where, $this->tambahan, $default, FALSE); // tambahan
		$this->buildSearchSql($where, $this->lama_kerja, $default, FALSE); // lama_kerja
		$this->buildSearchSql($where, $this->nama, $default, FALSE); // nama
		$this->buildSearchSql($where, $this->alamat, $default, FALSE); // alamat
		$this->buildSearchSql($where, $this->_email, $default, FALSE); // email
		$this->buildSearchSql($where, $this->wa, $default, FALSE); // wa
		$this->buildSearchSql($where, $this->hp, $default, FALSE); // hp
		$this->buildSearchSql($where, $this->tgllahir, $default, FALSE); // tgllahir
		$this->buildSearchSql($where, $this->rekbank, $default, FALSE); // rekbank
		$this->buildSearchSql($where, $this->pendidikan, $default, FALSE); // pendidikan
		$this->buildSearchSql($where, $this->jurusan, $default, FALSE); // jurusan
		$this->buildSearchSql($where, $this->agama, $default, FALSE); // agama
		$this->buildSearchSql($where, $this->jenkel, $default, FALSE); // jenkel
		$this->buildSearchSql($where, $this->status, $default, FALSE); // status
		$this->buildSearchSql($where, $this->foto, $default, FALSE); // foto
		$this->buildSearchSql($where, $this->file_cv, $default, FALSE); // file_cv
		$this->buildSearchSql($where, $this->mulai_bekerja, $default, FALSE); // mulai_bekerja
		$this->buildSearchSql($where, $this->keterangan, $default, FALSE); // keterangan
		$this->buildSearchSql($where, $this->level, $default, FALSE); // level
		$this->buildSearchSql($where, $this->aktif, $default, FALSE); // aktif
		$this->buildSearchSql($where, $this->kehadiran, $default, FALSE); // kehadiran

		// Set up search parm
		if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->id->AdvancedSearch->save(); // id
			$this->pid->AdvancedSearch->save(); // pid
			$this->nip->AdvancedSearch->save(); // nip
			$this->username->AdvancedSearch->save(); // username
			$this->password->AdvancedSearch->save(); // password
			$this->jenjang_id->AdvancedSearch->save(); // jenjang_id
			$this->jabatan->AdvancedSearch->save(); // jabatan
			$this->periode_jabatan->AdvancedSearch->save(); // periode_jabatan
			$this->jjm->AdvancedSearch->save(); // jjm
			$this->status_peg->AdvancedSearch->save(); // status_peg
			$this->type->AdvancedSearch->save(); // type
			$this->sertif->AdvancedSearch->save(); // sertif
			$this->tambahan->AdvancedSearch->save(); // tambahan
			$this->lama_kerja->AdvancedSearch->save(); // lama_kerja
			$this->nama->AdvancedSearch->save(); // nama
			$this->alamat->AdvancedSearch->save(); // alamat
			$this->_email->AdvancedSearch->save(); // email
			$this->wa->AdvancedSearch->save(); // wa
			$this->hp->AdvancedSearch->save(); // hp
			$this->tgllahir->AdvancedSearch->save(); // tgllahir
			$this->rekbank->AdvancedSearch->save(); // rekbank
			$this->pendidikan->AdvancedSearch->save(); // pendidikan
			$this->jurusan->AdvancedSearch->save(); // jurusan
			$this->agama->AdvancedSearch->save(); // agama
			$this->jenkel->AdvancedSearch->save(); // jenkel
			$this->status->AdvancedSearch->save(); // status
			$this->foto->AdvancedSearch->save(); // foto
			$this->file_cv->AdvancedSearch->save(); // file_cv
			$this->mulai_bekerja->AdvancedSearch->save(); // mulai_bekerja
			$this->keterangan->AdvancedSearch->save(); // keterangan
			$this->level->AdvancedSearch->save(); // level
			$this->aktif->AdvancedSearch->save(); // aktif
			$this->kehadiran->AdvancedSearch->save(); // kehadiran
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
		$this->buildBasicSearchSql($where, $this->nip, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->password, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->type, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->sertif, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->nama, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->alamat, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->_email, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->wa, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->hp, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->rekbank, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->jurusan, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->agama, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->jenkel, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->foto, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->keterangan, $arKeywords, $type);
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
		if ($this->nip->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->username->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->password->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->jenjang_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->jabatan->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->periode_jabatan->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->jjm->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->status_peg->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->type->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->sertif->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->tambahan->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->lama_kerja->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->nama->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->alamat->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_email->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->wa->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->hp->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->tgllahir->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->rekbank->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->pendidikan->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->jurusan->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->agama->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->jenkel->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->status->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->foto->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->file_cv->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->mulai_bekerja->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->keterangan->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->level->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->aktif->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->kehadiran->AdvancedSearch->issetSession())
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
		$this->nip->AdvancedSearch->unsetSession();
		$this->username->AdvancedSearch->unsetSession();
		$this->password->AdvancedSearch->unsetSession();
		$this->jenjang_id->AdvancedSearch->unsetSession();
		$this->jabatan->AdvancedSearch->unsetSession();
		$this->periode_jabatan->AdvancedSearch->unsetSession();
		$this->jjm->AdvancedSearch->unsetSession();
		$this->status_peg->AdvancedSearch->unsetSession();
		$this->type->AdvancedSearch->unsetSession();
		$this->sertif->AdvancedSearch->unsetSession();
		$this->tambahan->AdvancedSearch->unsetSession();
		$this->lama_kerja->AdvancedSearch->unsetSession();
		$this->nama->AdvancedSearch->unsetSession();
		$this->alamat->AdvancedSearch->unsetSession();
		$this->_email->AdvancedSearch->unsetSession();
		$this->wa->AdvancedSearch->unsetSession();
		$this->hp->AdvancedSearch->unsetSession();
		$this->tgllahir->AdvancedSearch->unsetSession();
		$this->rekbank->AdvancedSearch->unsetSession();
		$this->pendidikan->AdvancedSearch->unsetSession();
		$this->jurusan->AdvancedSearch->unsetSession();
		$this->agama->AdvancedSearch->unsetSession();
		$this->jenkel->AdvancedSearch->unsetSession();
		$this->status->AdvancedSearch->unsetSession();
		$this->foto->AdvancedSearch->unsetSession();
		$this->file_cv->AdvancedSearch->unsetSession();
		$this->mulai_bekerja->AdvancedSearch->unsetSession();
		$this->keterangan->AdvancedSearch->unsetSession();
		$this->level->AdvancedSearch->unsetSession();
		$this->aktif->AdvancedSearch->unsetSession();
		$this->kehadiran->AdvancedSearch->unsetSession();
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
		$this->nip->AdvancedSearch->load();
		$this->username->AdvancedSearch->load();
		$this->password->AdvancedSearch->load();
		$this->jenjang_id->AdvancedSearch->load();
		$this->jabatan->AdvancedSearch->load();
		$this->periode_jabatan->AdvancedSearch->load();
		$this->jjm->AdvancedSearch->load();
		$this->status_peg->AdvancedSearch->load();
		$this->type->AdvancedSearch->load();
		$this->sertif->AdvancedSearch->load();
		$this->tambahan->AdvancedSearch->load();
		$this->lama_kerja->AdvancedSearch->load();
		$this->nama->AdvancedSearch->load();
		$this->alamat->AdvancedSearch->load();
		$this->_email->AdvancedSearch->load();
		$this->wa->AdvancedSearch->load();
		$this->hp->AdvancedSearch->load();
		$this->tgllahir->AdvancedSearch->load();
		$this->rekbank->AdvancedSearch->load();
		$this->pendidikan->AdvancedSearch->load();
		$this->jurusan->AdvancedSearch->load();
		$this->agama->AdvancedSearch->load();
		$this->jenkel->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->foto->AdvancedSearch->load();
		$this->file_cv->AdvancedSearch->load();
		$this->mulai_bekerja->AdvancedSearch->load();
		$this->keterangan->AdvancedSearch->load();
		$this->level->AdvancedSearch->load();
		$this->aktif->AdvancedSearch->load();
		$this->kehadiran->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->nip); // nip
			$this->updateSort($this->password); // password
			$this->updateSort($this->jenjang_id); // jenjang_id
			$this->updateSort($this->jabatan); // jabatan
			$this->updateSort($this->periode_jabatan); // periode_jabatan
			$this->updateSort($this->status_peg); // status_peg
			$this->updateSort($this->type); // type
			$this->updateSort($this->sertif); // sertif
			$this->updateSort($this->tambahan); // tambahan
			$this->updateSort($this->lama_kerja); // lama_kerja
			$this->updateSort($this->nama); // nama
			$this->updateSort($this->alamat); // alamat
			$this->updateSort($this->_email); // email
			$this->updateSort($this->wa); // wa
			$this->updateSort($this->hp); // hp
			$this->updateSort($this->tgllahir); // tgllahir
			$this->updateSort($this->rekbank); // rekbank
			$this->updateSort($this->pendidikan); // pendidikan
			$this->updateSort($this->jurusan); // jurusan
			$this->updateSort($this->agama); // agama
			$this->updateSort($this->jenkel); // jenkel
			$this->updateSort($this->foto); // foto
			$this->updateSort($this->keterangan); // keterangan
			$this->updateSort($this->level); // level
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
				$this->nip->setSort("");
				$this->password->setSort("");
				$this->jenjang_id->setSort("");
				$this->jabatan->setSort("");
				$this->periode_jabatan->setSort("");
				$this->status_peg->setSort("");
				$this->type->setSort("");
				$this->sertif->setSort("");
				$this->tambahan->setSort("");
				$this->lama_kerja->setSort("");
				$this->nama->setSort("");
				$this->alamat->setSort("");
				$this->_email->setSort("");
				$this->wa->setSort("");
				$this->hp->setSort("");
				$this->tgllahir->setSort("");
				$this->rekbank->setSort("");
				$this->pendidikan->setSort("");
				$this->jurusan->setSort("");
				$this->agama->setSort("");
				$this->jenkel->setSort("");
				$this->foto->setSort("");
				$this->keterangan->setSort("");
				$this->level->setSort("");
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

		// "edit"
		$item = &$this->ListOptions->add("edit");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canEdit();
		$item->OnLeft = FALSE;

		// "copy"
		$item = &$this->ListOptions->add("copy");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canAdd();
		$item->OnLeft = FALSE;

		// "delete"
		$item = &$this->ListOptions->add("delete");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canDelete();
		$item->OnLeft = FALSE;

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

		// "edit"
		$opt = $this->ListOptions["edit"];
		$editcaption = HtmlTitle($Language->phrase("EditLink"));
		if ($Security->canEdit()) {
			$opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" href=\"" . HtmlEncode($this->EditUrl) . "\">" . $Language->phrase("EditLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "copy"
		$opt = $this->ListOptions["copy"];
		$copycaption = HtmlTitle($Language->phrase("CopyLink"));
		if ($Security->canAdd()) {
			$opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode($this->CopyUrl) . "\">" . $Language->phrase("CopyLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "delete"
		$opt = $this->ListOptions["delete"];
		if ($Security->canDelete())
			$opt->Body = "<a class=\"ew-row-link ew-delete\"" . "" . " title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" href=\"" . HtmlEncode($this->DeleteUrl) . "\">" . $Language->phrase("DeleteLink") . "</a>";
		else
			$opt->Body = "";

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
		$option = $options["addedit"];

		// Add
		$item = &$option->add("add");
		$addcaption = HtmlTitle($Language->phrase("AddLink"));
		$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("AddLink") . "</a>";
		$item->Visible = $this->AddUrl != "" && $Security->canAdd();
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fv_pegawai_tklistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fv_pegawai_tklistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.fv_pegawai_tklist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
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

		// nip
		if (!$this->isAddOrEdit() && $this->nip->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->nip->AdvancedSearch->SearchValue != "" || $this->nip->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// username
		if (!$this->isAddOrEdit() && $this->username->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->username->AdvancedSearch->SearchValue != "" || $this->username->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// password
		if (!$this->isAddOrEdit() && $this->password->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->password->AdvancedSearch->SearchValue != "" || $this->password->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// jenjang_id
		if (!$this->isAddOrEdit() && $this->jenjang_id->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->jenjang_id->AdvancedSearch->SearchValue != "" || $this->jenjang_id->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// jabatan
		if (!$this->isAddOrEdit() && $this->jabatan->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->jabatan->AdvancedSearch->SearchValue != "" || $this->jabatan->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// periode_jabatan
		if (!$this->isAddOrEdit() && $this->periode_jabatan->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->periode_jabatan->AdvancedSearch->SearchValue != "" || $this->periode_jabatan->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// jjm
		if (!$this->isAddOrEdit() && $this->jjm->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->jjm->AdvancedSearch->SearchValue != "" || $this->jjm->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// status_peg
		if (!$this->isAddOrEdit() && $this->status_peg->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->status_peg->AdvancedSearch->SearchValue != "" || $this->status_peg->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// type
		if (!$this->isAddOrEdit() && $this->type->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->type->AdvancedSearch->SearchValue != "" || $this->type->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// sertif
		if (!$this->isAddOrEdit() && $this->sertif->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->sertif->AdvancedSearch->SearchValue != "" || $this->sertif->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// tambahan
		if (!$this->isAddOrEdit() && $this->tambahan->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->tambahan->AdvancedSearch->SearchValue != "" || $this->tambahan->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// lama_kerja
		if (!$this->isAddOrEdit() && $this->lama_kerja->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->lama_kerja->AdvancedSearch->SearchValue != "" || $this->lama_kerja->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// nama
		if (!$this->isAddOrEdit() && $this->nama->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->nama->AdvancedSearch->SearchValue != "" || $this->nama->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// alamat
		if (!$this->isAddOrEdit() && $this->alamat->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->alamat->AdvancedSearch->SearchValue != "" || $this->alamat->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// email
		if (!$this->isAddOrEdit() && $this->_email->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_email->AdvancedSearch->SearchValue != "" || $this->_email->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// wa
		if (!$this->isAddOrEdit() && $this->wa->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->wa->AdvancedSearch->SearchValue != "" || $this->wa->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// hp
		if (!$this->isAddOrEdit() && $this->hp->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->hp->AdvancedSearch->SearchValue != "" || $this->hp->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// tgllahir
		if (!$this->isAddOrEdit() && $this->tgllahir->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->tgllahir->AdvancedSearch->SearchValue != "" || $this->tgllahir->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// rekbank
		if (!$this->isAddOrEdit() && $this->rekbank->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->rekbank->AdvancedSearch->SearchValue != "" || $this->rekbank->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// pendidikan
		if (!$this->isAddOrEdit() && $this->pendidikan->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->pendidikan->AdvancedSearch->SearchValue != "" || $this->pendidikan->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// jurusan
		if (!$this->isAddOrEdit() && $this->jurusan->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->jurusan->AdvancedSearch->SearchValue != "" || $this->jurusan->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// agama
		if (!$this->isAddOrEdit() && $this->agama->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->agama->AdvancedSearch->SearchValue != "" || $this->agama->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// jenkel
		if (!$this->isAddOrEdit() && $this->jenkel->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->jenkel->AdvancedSearch->SearchValue != "" || $this->jenkel->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// status
		if (!$this->isAddOrEdit() && $this->status->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->status->AdvancedSearch->SearchValue != "" || $this->status->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// foto
		if (!$this->isAddOrEdit() && $this->foto->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->foto->AdvancedSearch->SearchValue != "" || $this->foto->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// file_cv
		if (!$this->isAddOrEdit() && $this->file_cv->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->file_cv->AdvancedSearch->SearchValue != "" || $this->file_cv->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// mulai_bekerja
		if (!$this->isAddOrEdit() && $this->mulai_bekerja->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->mulai_bekerja->AdvancedSearch->SearchValue != "" || $this->mulai_bekerja->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// keterangan
		if (!$this->isAddOrEdit() && $this->keterangan->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->keterangan->AdvancedSearch->SearchValue != "" || $this->keterangan->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// level
		if (!$this->isAddOrEdit() && $this->level->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->level->AdvancedSearch->SearchValue != "" || $this->level->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// aktif
		if (!$this->isAddOrEdit() && $this->aktif->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->aktif->AdvancedSearch->SearchValue != "" || $this->aktif->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// kehadiran
		if (!$this->isAddOrEdit() && $this->kehadiran->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->kehadiran->AdvancedSearch->SearchValue != "" || $this->kehadiran->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
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
		$this->nip->setDbValue($row['nip']);
		$this->username->setDbValue($row['username']);
		$this->password->setDbValue($row['password']);
		$this->jenjang_id->setDbValue($row['jenjang_id']);
		$this->jabatan->setDbValue($row['jabatan']);
		$this->periode_jabatan->setDbValue($row['periode_jabatan']);
		$this->jjm->setDbValue($row['jjm']);
		$this->status_peg->setDbValue($row['status_peg']);
		$this->type->setDbValue($row['type']);
		$this->sertif->setDbValue($row['sertif']);
		$this->tambahan->setDbValue($row['tambahan']);
		$this->lama_kerja->setDbValue($row['lama_kerja']);
		$this->nama->setDbValue($row['nama']);
		$this->alamat->setDbValue($row['alamat']);
		$this->_email->setDbValue($row['email']);
		$this->wa->setDbValue($row['wa']);
		$this->hp->setDbValue($row['hp']);
		$this->tgllahir->setDbValue($row['tgllahir']);
		$this->rekbank->setDbValue($row['rekbank']);
		$this->pendidikan->setDbValue($row['pendidikan']);
		$this->jurusan->setDbValue($row['jurusan']);
		$this->agama->setDbValue($row['agama']);
		$this->jenkel->setDbValue($row['jenkel']);
		$this->status->setDbValue($row['status']);
		$this->foto->Upload->DbValue = $row['foto'];
		$this->foto->setDbValue($this->foto->Upload->DbValue);
		$this->file_cv->Upload->DbValue = $row['file_cv'];
		$this->file_cv->setDbValue($this->file_cv->Upload->DbValue);
		$this->mulai_bekerja->setDbValue($row['mulai_bekerja']);
		$this->keterangan->setDbValue($row['keterangan']);
		$this->level->setDbValue($row['level']);
		$this->aktif->setDbValue($row['aktif']);
		$this->kehadiran->setDbValue($row['kehadiran']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['pid'] = NULL;
		$row['nip'] = NULL;
		$row['username'] = NULL;
		$row['password'] = NULL;
		$row['jenjang_id'] = NULL;
		$row['jabatan'] = NULL;
		$row['periode_jabatan'] = NULL;
		$row['jjm'] = NULL;
		$row['status_peg'] = NULL;
		$row['type'] = NULL;
		$row['sertif'] = NULL;
		$row['tambahan'] = NULL;
		$row['lama_kerja'] = NULL;
		$row['nama'] = NULL;
		$row['alamat'] = NULL;
		$row['email'] = NULL;
		$row['wa'] = NULL;
		$row['hp'] = NULL;
		$row['tgllahir'] = NULL;
		$row['rekbank'] = NULL;
		$row['pendidikan'] = NULL;
		$row['jurusan'] = NULL;
		$row['agama'] = NULL;
		$row['jenkel'] = NULL;
		$row['status'] = NULL;
		$row['foto'] = NULL;
		$row['file_cv'] = NULL;
		$row['mulai_bekerja'] = NULL;
		$row['keterangan'] = NULL;
		$row['level'] = NULL;
		$row['aktif'] = NULL;
		$row['kehadiran'] = NULL;
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
		// nip
		// username

		$this->username->CellCssStyle = "white-space: nowrap;";

		// password
		// jenjang_id
		// jabatan
		// periode_jabatan
		// jjm

		$this->jjm->CellCssStyle = "white-space: nowrap;";

		// status_peg
		// type
		// sertif
		// tambahan
		// lama_kerja
		// nama
		// alamat
		// email
		// wa
		// hp
		// tgllahir
		// rekbank
		// pendidikan
		// jurusan
		// agama
		// jenkel
		// status

		$this->status->CellCssStyle = "white-space: nowrap;";

		// foto
		// file_cv

		$this->file_cv->CellCssStyle = "white-space: nowrap;";

		// mulai_bekerja
		$this->mulai_bekerja->CellCssStyle = "white-space: nowrap;";

		// keterangan
		// level
		// aktif

		$this->aktif->CellCssStyle = "white-space: nowrap;";

		// kehadiran
		$this->kehadiran->CellCssStyle = "white-space: nowrap;";
		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// pid
			$this->pid->ViewValue = $this->pid->CurrentValue;
			$this->pid->ViewValue = FormatNumber($this->pid->ViewValue, 0, -2, -2, -2);
			$this->pid->ViewCustomAttributes = "";

			// nip
			$this->nip->ViewValue = $this->nip->CurrentValue;
			$this->nip->ViewCustomAttributes = "";

			// password
			$this->password->ViewValue = $this->password->CurrentValue;
			$this->password->ViewCustomAttributes = "";

			// jenjang_id
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

			// jabatan
			$curVal = strval($this->jabatan->CurrentValue);
			if ($curVal != "") {
				$this->jabatan->ViewValue = $this->jabatan->lookupCacheOption($curVal);
				if ($this->jabatan->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->jabatan->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->jabatan->ViewValue = $this->jabatan->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->jabatan->ViewValue = $this->jabatan->CurrentValue;
					}
				}
			} else {
				$this->jabatan->ViewValue = NULL;
			}
			$this->jabatan->ViewCustomAttributes = "";

			// periode_jabatan
			$this->periode_jabatan->ViewValue = $this->periode_jabatan->CurrentValue;
			$this->periode_jabatan->ViewValue = FormatNumber($this->periode_jabatan->ViewValue, 0, -2, -2, -2);
			$this->periode_jabatan->ViewCustomAttributes = "";

			// status_peg
			$curVal = strval($this->status_peg->CurrentValue);
			if ($curVal != "") {
				$this->status_peg->ViewValue = $this->status_peg->lookupCacheOption($curVal);
				if ($this->status_peg->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->status_peg->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->status_peg->ViewValue = $this->status_peg->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->status_peg->ViewValue = $this->status_peg->CurrentValue;
					}
				}
			} else {
				$this->status_peg->ViewValue = NULL;
			}
			$this->status_peg->ViewCustomAttributes = "";

			// type
			$this->type->ViewValue = $this->type->CurrentValue;
			$curVal = strval($this->type->CurrentValue);
			if ($curVal != "") {
				$this->type->ViewValue = $this->type->lookupCacheOption($curVal);
				if ($this->type->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->type->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->type->ViewValue = $this->type->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->type->ViewValue = $this->type->CurrentValue;
					}
				}
			} else {
				$this->type->ViewValue = NULL;
			}
			$this->type->ViewCustomAttributes = "";

			// sertif
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

			// tambahan
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

			// lama_kerja
			$this->lama_kerja->ViewValue = $this->lama_kerja->CurrentValue;
			$this->lama_kerja->ViewValue = FormatNumber($this->lama_kerja->ViewValue, 0, -2, -2, -2);
			$this->lama_kerja->ViewCustomAttributes = "";

			// nama
			$this->nama->ViewValue = $this->nama->CurrentValue;
			$this->nama->ViewCustomAttributes = "";

			// alamat
			$this->alamat->ViewValue = $this->alamat->CurrentValue;
			$this->alamat->ViewCustomAttributes = "";

			// email
			$this->_email->ViewValue = $this->_email->CurrentValue;
			$this->_email->ViewCustomAttributes = "";

			// wa
			$this->wa->ViewValue = $this->wa->CurrentValue;
			$this->wa->ViewCustomAttributes = "";

			// hp
			$this->hp->ViewValue = $this->hp->CurrentValue;
			$this->hp->ViewCustomAttributes = "";

			// tgllahir
			$this->tgllahir->ViewValue = $this->tgllahir->CurrentValue;
			$this->tgllahir->ViewValue = FormatDateTime($this->tgllahir->ViewValue, 0);
			$this->tgllahir->ViewCustomAttributes = "";

			// rekbank
			$this->rekbank->ViewValue = $this->rekbank->CurrentValue;
			$this->rekbank->ViewCustomAttributes = "";

			// pendidikan
			$curVal = strval($this->pendidikan->CurrentValue);
			if ($curVal != "") {
				$this->pendidikan->ViewValue = $this->pendidikan->lookupCacheOption($curVal);
				if ($this->pendidikan->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->pendidikan->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->pendidikan->ViewValue = $this->pendidikan->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->pendidikan->ViewValue = $this->pendidikan->CurrentValue;
					}
				}
			} else {
				$this->pendidikan->ViewValue = NULL;
			}
			$this->pendidikan->ViewCustomAttributes = "";

			// jurusan
			$this->jurusan->ViewValue = $this->jurusan->CurrentValue;
			$this->jurusan->ViewCustomAttributes = "";

			// agama
			$curVal = strval($this->agama->CurrentValue);
			if ($curVal != "") {
				$this->agama->ViewValue = $this->agama->lookupCacheOption($curVal);
				if ($this->agama->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->agama->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->agama->ViewValue = $this->agama->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->agama->ViewValue = $this->agama->CurrentValue;
					}
				}
			} else {
				$this->agama->ViewValue = NULL;
			}
			$this->agama->ViewCustomAttributes = "";

			// jenkel
			$curVal = strval($this->jenkel->CurrentValue);
			if ($curVal != "") {
				$this->jenkel->ViewValue = $this->jenkel->lookupCacheOption($curVal);
				if ($this->jenkel->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`gen`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->jenkel->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->jenkel->ViewValue = $this->jenkel->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->jenkel->ViewValue = $this->jenkel->CurrentValue;
					}
				}
			} else {
				$this->jenkel->ViewValue = NULL;
			}
			$this->jenkel->ViewCustomAttributes = "";

			// foto
			if (!EmptyValue($this->foto->Upload->DbValue)) {
				$this->foto->ViewValue = $this->foto->Upload->DbValue;
			} else {
				$this->foto->ViewValue = "";
			}
			$this->foto->ViewCustomAttributes = "";

			// keterangan
			$this->keterangan->ViewValue = $this->keterangan->CurrentValue;
			$this->keterangan->ViewCustomAttributes = "";

			// level
			$curVal = strval($this->level->CurrentValue);
			if ($curVal != "") {
				$this->level->ViewValue = $this->level->lookupCacheOption($curVal);
				if ($this->level->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`userlevelid`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->level->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->level->ViewValue = $this->level->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->level->ViewValue = $this->level->CurrentValue;
					}
				}
			} else {
				$this->level->ViewValue = NULL;
			}
			$this->level->ViewCustomAttributes = "";

			// nip
			$this->nip->LinkCustomAttributes = "";
			$this->nip->HrefValue = "";
			$this->nip->TooltipValue = "";

			// password
			$this->password->LinkCustomAttributes = "";
			$this->password->HrefValue = "";
			$this->password->TooltipValue = "";

			// jenjang_id
			$this->jenjang_id->LinkCustomAttributes = "";
			$this->jenjang_id->HrefValue = "";
			$this->jenjang_id->TooltipValue = "";

			// jabatan
			$this->jabatan->LinkCustomAttributes = "";
			$this->jabatan->HrefValue = "";
			$this->jabatan->TooltipValue = "";

			// periode_jabatan
			$this->periode_jabatan->LinkCustomAttributes = "";
			$this->periode_jabatan->HrefValue = "";
			$this->periode_jabatan->TooltipValue = "";

			// status_peg
			$this->status_peg->LinkCustomAttributes = "";
			$this->status_peg->HrefValue = "";
			$this->status_peg->TooltipValue = "";

			// type
			$this->type->LinkCustomAttributes = "";
			$this->type->HrefValue = "";
			$this->type->TooltipValue = "";

			// sertif
			$this->sertif->LinkCustomAttributes = "";
			$this->sertif->HrefValue = "";
			$this->sertif->TooltipValue = "";

			// tambahan
			$this->tambahan->LinkCustomAttributes = "";
			$this->tambahan->HrefValue = "";
			$this->tambahan->TooltipValue = "";

			// lama_kerja
			$this->lama_kerja->LinkCustomAttributes = "";
			$this->lama_kerja->HrefValue = "";
			$this->lama_kerja->TooltipValue = "";

			// nama
			$this->nama->LinkCustomAttributes = "";
			$this->nama->HrefValue = "";
			$this->nama->TooltipValue = "";

			// alamat
			$this->alamat->LinkCustomAttributes = "";
			$this->alamat->HrefValue = "";
			$this->alamat->TooltipValue = "";

			// email
			$this->_email->LinkCustomAttributes = "";
			$this->_email->HrefValue = "";
			$this->_email->TooltipValue = "";

			// wa
			$this->wa->LinkCustomAttributes = "";
			$this->wa->HrefValue = "";
			$this->wa->TooltipValue = "";

			// hp
			$this->hp->LinkCustomAttributes = "";
			$this->hp->HrefValue = "";
			$this->hp->TooltipValue = "";

			// tgllahir
			$this->tgllahir->LinkCustomAttributes = "";
			$this->tgllahir->HrefValue = "";
			$this->tgllahir->TooltipValue = "";

			// rekbank
			$this->rekbank->LinkCustomAttributes = "";
			$this->rekbank->HrefValue = "";
			$this->rekbank->TooltipValue = "";

			// pendidikan
			$this->pendidikan->LinkCustomAttributes = "";
			$this->pendidikan->HrefValue = "";
			$this->pendidikan->TooltipValue = "";

			// jurusan
			$this->jurusan->LinkCustomAttributes = "";
			$this->jurusan->HrefValue = "";
			$this->jurusan->TooltipValue = "";

			// agama
			$this->agama->LinkCustomAttributes = "";
			$this->agama->HrefValue = "";
			$this->agama->TooltipValue = "";

			// jenkel
			$this->jenkel->LinkCustomAttributes = "";
			$this->jenkel->HrefValue = "";
			$this->jenkel->TooltipValue = "";

			// foto
			$this->foto->LinkCustomAttributes = "";
			$this->foto->HrefValue = "";
			$this->foto->ExportHrefValue = $this->foto->UploadPath . $this->foto->Upload->DbValue;
			$this->foto->TooltipValue = "";

			// keterangan
			$this->keterangan->LinkCustomAttributes = "";
			$this->keterangan->HrefValue = "";
			$this->keterangan->TooltipValue = "";

			// level
			$this->level->LinkCustomAttributes = "";
			$this->level->HrefValue = "";
			$this->level->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// nip
			$this->nip->EditAttrs["class"] = "form-control";
			$this->nip->EditCustomAttributes = "";
			if (!$this->nip->Raw)
				$this->nip->AdvancedSearch->SearchValue = HtmlDecode($this->nip->AdvancedSearch->SearchValue);
			$this->nip->EditValue = HtmlEncode($this->nip->AdvancedSearch->SearchValue);
			$this->nip->PlaceHolder = RemoveHtml($this->nip->caption());

			// password
			$this->password->EditAttrs["class"] = "form-control";
			$this->password->EditCustomAttributes = "";
			if (!$this->password->Raw)
				$this->password->AdvancedSearch->SearchValue = HtmlDecode($this->password->AdvancedSearch->SearchValue);
			$this->password->EditValue = HtmlEncode($this->password->AdvancedSearch->SearchValue);
			$this->password->PlaceHolder = RemoveHtml($this->password->caption());

			// jenjang_id
			$this->jenjang_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->jenjang_id->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->jenjang_id->AdvancedSearch->ViewValue = $this->jenjang_id->lookupCacheOption($curVal);
			else
				$this->jenjang_id->AdvancedSearch->ViewValue = $this->jenjang_id->Lookup !== NULL && is_array($this->jenjang_id->Lookup->Options) ? $curVal : NULL;
			if ($this->jenjang_id->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->jenjang_id->EditValue = array_values($this->jenjang_id->Lookup->Options);
				if ($this->jenjang_id->AdvancedSearch->ViewValue == "")
					$this->jenjang_id->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`nourut`" . SearchString("=", $this->jenjang_id->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->jenjang_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->jenjang_id->AdvancedSearch->ViewValue = $this->jenjang_id->displayValue($arwrk);
				} else {
					$this->jenjang_id->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->jenjang_id->EditValue = $arwrk;
			}

			// jabatan
			$this->jabatan->EditAttrs["class"] = "form-control";
			$this->jabatan->EditCustomAttributes = "";

			// periode_jabatan
			$this->periode_jabatan->EditAttrs["class"] = "form-control";
			$this->periode_jabatan->EditCustomAttributes = "";
			$this->periode_jabatan->EditValue = HtmlEncode($this->periode_jabatan->AdvancedSearch->SearchValue);
			$this->periode_jabatan->PlaceHolder = RemoveHtml($this->periode_jabatan->caption());

			// status_peg
			$this->status_peg->EditAttrs["class"] = "form-control";
			$this->status_peg->EditCustomAttributes = "";

			// type
			$this->type->EditAttrs["class"] = "form-control";
			$this->type->EditCustomAttributes = "";
			$this->type->EditValue = HtmlEncode($this->type->AdvancedSearch->SearchValue);
			$this->type->PlaceHolder = RemoveHtml($this->type->caption());

			// sertif
			$this->sertif->EditCustomAttributes = "";
			$curVal = trim(strval($this->sertif->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->sertif->AdvancedSearch->ViewValue = $this->sertif->lookupCacheOption($curVal);
			else
				$this->sertif->AdvancedSearch->ViewValue = $this->sertif->Lookup !== NULL && is_array($this->sertif->Lookup->Options) ? $curVal : NULL;
			if ($this->sertif->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->sertif->EditValue = array_values($this->sertif->Lookup->Options);
				if ($this->sertif->AdvancedSearch->ViewValue == "")
					$this->sertif->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->sertif->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->sertif->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->sertif->AdvancedSearch->ViewValue = $this->sertif->displayValue($arwrk);
				} else {
					$this->sertif->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->sertif->EditValue = $arwrk;
			}

			// tambahan
			$this->tambahan->EditAttrs["class"] = "form-control";
			$this->tambahan->EditCustomAttributes = "";

			// lama_kerja
			$this->lama_kerja->EditAttrs["class"] = "form-control";
			$this->lama_kerja->EditCustomAttributes = "";
			$this->lama_kerja->EditValue = HtmlEncode($this->lama_kerja->AdvancedSearch->SearchValue);
			$this->lama_kerja->PlaceHolder = RemoveHtml($this->lama_kerja->caption());

			// nama
			$this->nama->EditAttrs["class"] = "form-control";
			$this->nama->EditCustomAttributes = "";
			if (!$this->nama->Raw)
				$this->nama->AdvancedSearch->SearchValue = HtmlDecode($this->nama->AdvancedSearch->SearchValue);
			$this->nama->EditValue = HtmlEncode($this->nama->AdvancedSearch->SearchValue);
			$this->nama->PlaceHolder = RemoveHtml($this->nama->caption());

			// alamat
			$this->alamat->EditAttrs["class"] = "form-control";
			$this->alamat->EditCustomAttributes = "";
			if (!$this->alamat->Raw)
				$this->alamat->AdvancedSearch->SearchValue = HtmlDecode($this->alamat->AdvancedSearch->SearchValue);
			$this->alamat->EditValue = HtmlEncode($this->alamat->AdvancedSearch->SearchValue);
			$this->alamat->PlaceHolder = RemoveHtml($this->alamat->caption());

			// email
			$this->_email->EditAttrs["class"] = "form-control";
			$this->_email->EditCustomAttributes = "";
			if (!$this->_email->Raw)
				$this->_email->AdvancedSearch->SearchValue = HtmlDecode($this->_email->AdvancedSearch->SearchValue);
			$this->_email->EditValue = HtmlEncode($this->_email->AdvancedSearch->SearchValue);
			$this->_email->PlaceHolder = RemoveHtml($this->_email->caption());

			// wa
			$this->wa->EditAttrs["class"] = "form-control";
			$this->wa->EditCustomAttributes = "";
			if (!$this->wa->Raw)
				$this->wa->AdvancedSearch->SearchValue = HtmlDecode($this->wa->AdvancedSearch->SearchValue);
			$this->wa->EditValue = HtmlEncode($this->wa->AdvancedSearch->SearchValue);
			$this->wa->PlaceHolder = RemoveHtml($this->wa->caption());

			// hp
			$this->hp->EditAttrs["class"] = "form-control";
			$this->hp->EditCustomAttributes = "";
			if (!$this->hp->Raw)
				$this->hp->AdvancedSearch->SearchValue = HtmlDecode($this->hp->AdvancedSearch->SearchValue);
			$this->hp->EditValue = HtmlEncode($this->hp->AdvancedSearch->SearchValue);
			$this->hp->PlaceHolder = RemoveHtml($this->hp->caption());

			// tgllahir
			$this->tgllahir->EditAttrs["class"] = "form-control";
			$this->tgllahir->EditCustomAttributes = "";
			$this->tgllahir->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->tgllahir->AdvancedSearch->SearchValue, 0), 8));
			$this->tgllahir->PlaceHolder = RemoveHtml($this->tgllahir->caption());

			// rekbank
			$this->rekbank->EditAttrs["class"] = "form-control";
			$this->rekbank->EditCustomAttributes = "";
			if (!$this->rekbank->Raw)
				$this->rekbank->AdvancedSearch->SearchValue = HtmlDecode($this->rekbank->AdvancedSearch->SearchValue);
			$this->rekbank->EditValue = HtmlEncode($this->rekbank->AdvancedSearch->SearchValue);
			$this->rekbank->PlaceHolder = RemoveHtml($this->rekbank->caption());

			// pendidikan
			$this->pendidikan->EditAttrs["class"] = "form-control";
			$this->pendidikan->EditCustomAttributes = "";

			// jurusan
			$this->jurusan->EditAttrs["class"] = "form-control";
			$this->jurusan->EditCustomAttributes = "";
			if (!$this->jurusan->Raw)
				$this->jurusan->AdvancedSearch->SearchValue = HtmlDecode($this->jurusan->AdvancedSearch->SearchValue);
			$this->jurusan->EditValue = HtmlEncode($this->jurusan->AdvancedSearch->SearchValue);
			$this->jurusan->PlaceHolder = RemoveHtml($this->jurusan->caption());

			// agama
			$this->agama->EditAttrs["class"] = "form-control";
			$this->agama->EditCustomAttributes = "";

			// jenkel
			$this->jenkel->EditCustomAttributes = "";

			// foto
			$this->foto->EditAttrs["class"] = "form-control";
			$this->foto->EditCustomAttributes = "";
			if (!$this->foto->Raw)
				$this->foto->AdvancedSearch->SearchValue = HtmlDecode($this->foto->AdvancedSearch->SearchValue);
			$this->foto->EditValue = HtmlEncode($this->foto->AdvancedSearch->SearchValue);
			$this->foto->PlaceHolder = RemoveHtml($this->foto->caption());

			// keterangan
			$this->keterangan->EditAttrs["class"] = "form-control";
			$this->keterangan->EditCustomAttributes = "";
			if (!$this->keterangan->Raw)
				$this->keterangan->AdvancedSearch->SearchValue = HtmlDecode($this->keterangan->AdvancedSearch->SearchValue);
			$this->keterangan->EditValue = HtmlEncode($this->keterangan->AdvancedSearch->SearchValue);
			$this->keterangan->PlaceHolder = RemoveHtml($this->keterangan->caption());

			// level
			$this->level->EditAttrs["class"] = "form-control";
			$this->level->EditCustomAttributes = "";
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
		$this->nip->AdvancedSearch->load();
		$this->username->AdvancedSearch->load();
		$this->password->AdvancedSearch->load();
		$this->jenjang_id->AdvancedSearch->load();
		$this->jabatan->AdvancedSearch->load();
		$this->periode_jabatan->AdvancedSearch->load();
		$this->jjm->AdvancedSearch->load();
		$this->status_peg->AdvancedSearch->load();
		$this->type->AdvancedSearch->load();
		$this->sertif->AdvancedSearch->load();
		$this->tambahan->AdvancedSearch->load();
		$this->lama_kerja->AdvancedSearch->load();
		$this->nama->AdvancedSearch->load();
		$this->alamat->AdvancedSearch->load();
		$this->_email->AdvancedSearch->load();
		$this->wa->AdvancedSearch->load();
		$this->hp->AdvancedSearch->load();
		$this->tgllahir->AdvancedSearch->load();
		$this->rekbank->AdvancedSearch->load();
		$this->pendidikan->AdvancedSearch->load();
		$this->jurusan->AdvancedSearch->load();
		$this->agama->AdvancedSearch->load();
		$this->jenkel->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->foto->AdvancedSearch->load();
		$this->file_cv->AdvancedSearch->load();
		$this->mulai_bekerja->AdvancedSearch->load();
		$this->keterangan->AdvancedSearch->load();
		$this->level->AdvancedSearch->load();
		$this->aktif->AdvancedSearch->load();
		$this->kehadiran->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fv_pegawai_tklist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fv_pegawai_tklist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fv_pegawai_tklist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
			return '<button id="emf_v_pegawai_tk" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_v_pegawai_tk\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fv_pegawai_tklist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fv_pegawai_tklistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
				case "x_jenjang_id":
					break;
				case "x_jabatan":
					break;
				case "x_status_peg":
					break;
				case "x_type":
					break;
				case "x_sertif":
					break;
				case "x_tambahan":
					break;
				case "x_pendidikan":
					break;
				case "x_agama":
					break;
				case "x_jenkel":
					break;
				case "x_level":
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
						case "x_jenjang_id":
							break;
						case "x_jabatan":
							break;
						case "x_status_peg":
							break;
						case "x_type":
							break;
						case "x_sertif":
							break;
						case "x_tambahan":
							break;
						case "x_pendidikan":
							break;
						case "x_agama":
							break;
						case "x_jenkel":
							break;
						case "x_level":
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