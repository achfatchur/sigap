<?php
namespace PHPMaker2020\sigap;

/**
 * Page class
 */
class potongan_tk_grid extends potongan_tk
{

	// Page ID
	public $PageID = "grid";

	// Project ID
	public $ProjectID = "{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}";

	// Table name
	public $TableName = 'potongan_tk';

	// Page object name
	public $PageObjName = "potongan_tk_grid";

	// Grid form hidden field names
	public $FormName = "fpotongan_tkgrid";
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
		$this->FormActionName .= "_" . $this->FormName;
		$this->FormKeyName .= "_" . $this->FormName;
		$this->FormOldKeyName .= "_" . $this->FormName;
		$this->FormBlankRowName .= "_" . $this->FormName;
		$this->FormKeyCountName .= "_" . $this->FormName;
		$GLOBALS["Grid"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (potongan_tk)
		if (!isset($GLOBALS["potongan_tk"]) || get_class($GLOBALS["potongan_tk"]) == PROJECT_NAMESPACE . "potongan_tk") {
			$GLOBALS["potongan_tk"] = &$this;

			// $GLOBALS["MasterTable"] = &$GLOBALS["Table"];
			// if (!isset($GLOBALS["Table"]))
			// 	$GLOBALS["Table"] = &$GLOBALS["potongan_tk"];

		}
		$this->AddUrl = "potongan_tkadd.php";

		// Table object (pegawai)
		if (!isset($GLOBALS['pegawai']))
			$GLOBALS['pegawai'] = new pegawai();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'grid');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'potongan_tk');

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

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["addedit"] = new ListOptions("div");
		$this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages, $DashboardReport;

		// Export
		global $potongan_tk;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($potongan_tk);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}

//		$GLOBALS["Table"] = &$GLOBALS["MasterTable"];
		unset($GLOBALS["Grid"]);
		if ($url === "")
			return;
		if (!IsApi())
			$this->Page_Redirecting($url);

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
		if ($this->isAddOrEdit())
			$this->datetime->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->u_by->Visible = FALSE;
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
	public $ShowOtherOptions = FALSE;
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

		// Get grid add count
		$gridaddcnt = Get(Config("TABLE_GRID_ADD_ROW_COUNT"), "");
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->setupListOptions();
		$this->id->Visible = FALSE;
		$this->datetime->setVisibility();
		$this->u_by->setVisibility();
		$this->month->Visible = FALSE;
		$this->tahun->setVisibility();
		$this->bulan->setVisibility();
		$this->nama->setVisibility();
		$this->jenjang_id->setVisibility();
		$this->jabatan_id->setVisibility();
		$this->sertif->setVisibility();
		$this->terlambat->setVisibility();
		$this->value_terlambat->setVisibility();
		$this->izin->setVisibility();
		$this->value_izin->setVisibility();
		$this->izinperjam->setVisibility();
		$this->izinperjamvalue->setVisibility();
		$this->sakit->Visible = FALSE;
		$this->value_sakit->Visible = FALSE;
		$this->sakitperjam->setVisibility();
		$this->sakitperjamvalue->setVisibility();
		$this->pulcep->setVisibility();
		$this->value_pulcep->setVisibility();
		$this->tidakhadir->Visible = FALSE;
		$this->value_tidakhadir->Visible = FALSE;
		$this->tidakhadirjam->setVisibility();
		$this->tidakhadirjamvalue->setVisibility();
		$this->totalpotongan->setVisibility();
		$this->pid->Visible = FALSE;
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

		// Set up master detail parameters
		$this->setupMasterParms();

		// Setup other options
		$this->setupOtherOptions();

		// Set up lookup cache
		$this->setupLookupOptions($this->u_by);
		$this->setupLookupOptions($this->bulan);
		$this->setupLookupOptions($this->nama);
		$this->setupLookupOptions($this->jenjang_id);
		$this->setupLookupOptions($this->sertif);

		// Search filters
		$srchAdvanced = ""; // Advanced search filter
		$srchBasic = ""; // Basic search filter
		$filter = "";

		// Get command
		$this->Command = strtolower(Get("cmd"));
		if ($this->isPageRequest()) { // Validate request

			// Set up records per page
			$this->setupDisplayRecords();

			// Handle reset command
			$this->resetCmd();

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

			// Show grid delete link for grid add / grid edit
			if ($this->AllowAddDeleteRow) {
				if ($this->isGridAdd() || $this->isGridEdit()) {
					$item = $this->ListOptions["griddelete"];
					if ($item)
						$item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->setupSortOrder();
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

		// Build filter
		$filter = "";
		if (!$Security->canList())
			$filter = "(0=1)"; // Filter all records

		// Restore master/detail filter
		$this->DbMasterFilter = $this->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Restore detail filter
		AddFilter($filter, $this->DbDetailFilter);
		AddFilter($filter, $this->SearchWhere);

		// Load master record
		if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "m_potongan") {
			global $m_potongan;
			$rsmaster = $m_potongan->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("m_potonganlist.php"); // Return to master page
			} else {
				$m_potongan->loadListRowValues($rsmaster);
				$m_potongan->RowType = ROWTYPE_MASTER; // Master row
				$m_potongan->renderListRow();
				$rsmaster->close();
			}
		}

		// Set up filter
		if ($this->Command == "json") {
			$this->UseSessionForListSql = FALSE; // Do not use session for ListSQL
			$this->CurrentFilter = $filter;
		} else {
			$this->setSessionWhere($filter);
			$this->CurrentFilter = "";
		}
		if ($this->isGridAdd()) {
			if ($this->CurrentMode == "copy") {
				$selectLimit = $this->UseSelectLimit;
				if ($selectLimit) {
					$this->TotalRecords = $this->listRecordCount();
					$this->Recordset = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords);
				} else {
					if ($this->Recordset = $this->loadRecordset())
						$this->TotalRecords = $this->Recordset->RecordCount();
				}
				$this->StartRecord = 1;
				$this->DisplayRecords = $this->TotalRecords;
			} else {
				$this->CurrentFilter = "0=1";
				$this->StartRecord = 1;
				$this->DisplayRecords = $this->GridAddRowCount;
			}
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
			$this->DisplayRecords = $this->TotalRecords; // Display all records
			if ($selectLimit)
				$this->Recordset = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords);
		}

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

	// Exit inline mode
	protected function clearInlineMode()
	{
		$this->LastAction = $this->CurrentAction; // Save last action
		$this->CurrentAction = ""; // Clear action
		$_SESSION[SESSION_INLINE_MODE] = ""; // Clear inline mode
	}

	// Switch to Grid Add mode
	protected function gridAddMode()
	{
		$this->CurrentAction = "gridadd";
		$_SESSION[SESSION_INLINE_MODE] = "gridadd";
		$this->hideFieldsForAddEdit();
	}

	// Switch to Grid Edit mode
	protected function gridEditMode()
	{
		$this->CurrentAction = "gridedit";
		$_SESSION[SESSION_INLINE_MODE] = "gridedit";
		$this->hideFieldsForAddEdit();
	}

	// Perform update to grid
	public function gridUpdate()
	{
		global $Language, $CurrentForm, $FormError;
		$gridUpdate = TRUE;

		// Get old recordset
		$this->CurrentFilter = $this->buildKeyFilter();
		if ($this->CurrentFilter == "")
			$this->CurrentFilter = "0=1";
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		if ($rs = $conn->execute($sql)) {
			$rsold = $rs->getRows();
			$rs->close();
		}

		// Call Grid Updating event
		if (!$this->Grid_Updating($rsold)) {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("GridEditCancelled")); // Set grid edit cancelled message
			return FALSE;
		}
		$key = "";

		// Update row index and get row key
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Update all rows based on key
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
			$CurrentForm->Index = $rowindex;
			$rowkey = strval($CurrentForm->getValue($this->FormKeyName));
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));

			// Load all values and keys
			if ($rowaction != "insertdelete") { // Skip insert then deleted rows
				$this->loadFormValues(); // Get form values
				if ($rowaction == "" || $rowaction == "edit" || $rowaction == "delete") {
					$gridUpdate = $this->setupKeyValues($rowkey); // Set up key values
				} else {
					$gridUpdate = TRUE;
				}

				// Skip empty row
				if ($rowaction == "insert" && $this->emptyRow()) {

					// No action required
				// Validate form and insert/update/delete record

				} elseif ($gridUpdate) {
					if ($rowaction == "delete") {
						$this->CurrentFilter = $this->getRecordFilter();
						$gridUpdate = $this->deleteRows(); // Delete this row
					} else if (!$this->validateForm()) {
						$gridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($FormError);
					} else {
						if ($rowaction == "insert") {
							$gridUpdate = $this->addRow(); // Insert this row
						} else {
							if ($rowkey != "") {
								$this->SendEmail = FALSE; // Do not send email on update success
								$gridUpdate = $this->editRow(); // Update this row
							}
						} // End update
					}
				}
				if ($gridUpdate) {
					if ($key != "")
						$key .= ", ";
					$key .= $rowkey;
				} else {
					break;
				}
			}
		}
		if ($gridUpdate) {

			// Get new recordset
			if ($rs = $conn->execute($sql)) {
				$rsnew = $rs->getRows();
				$rs->close();
			}

			// Call Grid_Updated event
			$this->Grid_Updated($rsold, $rsnew);
			$this->clearInlineMode(); // Clear inline edit mode
		} else {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("UpdateFailed")); // Set update failed message
		}
		return $gridUpdate;
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

	// Perform Grid Add
	public function gridInsert()
	{
		global $Language, $CurrentForm, $FormError;
		$rowindex = 1;
		$gridInsert = FALSE;
		$conn = $this->getConnection();

		// Call Grid Inserting event
		if (!$this->Grid_Inserting()) {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("GridAddCancelled")); // Set grid add cancelled message
			return FALSE;
		}

		// Init key filter
		$wrkfilter = "";
		$addcnt = 0;
		$key = "";

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Insert all rows
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction != "" && $rowaction != "insert")
				continue; // Skip
			if ($rowaction == "insert") {
				$this->RowOldKey = strval($CurrentForm->getValue($this->FormOldKeyName));
				$this->loadOldRecord(); // Load old record
			}
			$this->loadFormValues(); // Get form values
			if (!$this->emptyRow()) {
				$addcnt++;
				$this->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->validateForm()) {
					$gridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($FormError);
				} else {
					$gridInsert = $this->addRow($this->OldRecordset); // Insert this row
				}
				if ($gridInsert) {
					if ($key != "")
						$key .= Config("COMPOSITE_KEY_SEPARATOR");
					$key .= $this->id->CurrentValue;

					// Add filter for this record
					$filter = $this->getRecordFilter();
					if ($wrkfilter != "")
						$wrkfilter .= " OR ";
					$wrkfilter .= $filter;
				} else {
					break;
				}
			}
		}
		if ($addcnt == 0) { // No record inserted
			$this->clearInlineMode(); // Clear grid add mode and return
			return TRUE;
		}
		if ($gridInsert) {

			// Get new recordset
			$this->CurrentFilter = $wrkfilter;
			$sql = $this->getCurrentSql();
			if ($rs = $conn->execute($sql)) {
				$rsnew = $rs->getRows();
				$rs->close();
			}

			// Call Grid_Inserted event
			$this->Grid_Inserted($rsnew);
			$this->clearInlineMode(); // Clear grid add mode
		} else {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("InsertFailed")); // Set insert failed message
		}
		return $gridInsert;
	}

	// Check if empty row
	public function emptyRow()
	{
		global $CurrentForm;
		if ($CurrentForm->hasValue("x_tahun") && $CurrentForm->hasValue("o_tahun") && $this->tahun->CurrentValue != $this->tahun->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_bulan") && $CurrentForm->hasValue("o_bulan") && $this->bulan->CurrentValue != $this->bulan->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_nama") && $CurrentForm->hasValue("o_nama") && $this->nama->CurrentValue != $this->nama->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_jenjang_id") && $CurrentForm->hasValue("o_jenjang_id") && $this->jenjang_id->CurrentValue != $this->jenjang_id->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_jabatan_id") && $CurrentForm->hasValue("o_jabatan_id") && $this->jabatan_id->CurrentValue != $this->jabatan_id->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_sertif") && $CurrentForm->hasValue("o_sertif") && $this->sertif->CurrentValue != $this->sertif->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_terlambat") && $CurrentForm->hasValue("o_terlambat") && $this->terlambat->CurrentValue != $this->terlambat->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_value_terlambat") && $CurrentForm->hasValue("o_value_terlambat") && $this->value_terlambat->CurrentValue != $this->value_terlambat->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_izin") && $CurrentForm->hasValue("o_izin") && $this->izin->CurrentValue != $this->izin->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_value_izin") && $CurrentForm->hasValue("o_value_izin") && $this->value_izin->CurrentValue != $this->value_izin->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_izinperjam") && $CurrentForm->hasValue("o_izinperjam") && $this->izinperjam->CurrentValue != $this->izinperjam->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_izinperjamvalue") && $CurrentForm->hasValue("o_izinperjamvalue") && $this->izinperjamvalue->CurrentValue != $this->izinperjamvalue->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_sakitperjam") && $CurrentForm->hasValue("o_sakitperjam") && $this->sakitperjam->CurrentValue != $this->sakitperjam->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_sakitperjamvalue") && $CurrentForm->hasValue("o_sakitperjamvalue") && $this->sakitperjamvalue->CurrentValue != $this->sakitperjamvalue->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_pulcep") && $CurrentForm->hasValue("o_pulcep") && $this->pulcep->CurrentValue != $this->pulcep->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_value_pulcep") && $CurrentForm->hasValue("o_value_pulcep") && $this->value_pulcep->CurrentValue != $this->value_pulcep->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_tidakhadirjam") && $CurrentForm->hasValue("o_tidakhadirjam") && $this->tidakhadirjam->CurrentValue != $this->tidakhadirjam->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_tidakhadirjamvalue") && $CurrentForm->hasValue("o_tidakhadirjamvalue") && $this->tidakhadirjamvalue->CurrentValue != $this->tidakhadirjamvalue->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_totalpotongan") && $CurrentForm->hasValue("o_totalpotongan") && $this->totalpotongan->CurrentValue != $this->totalpotongan->OldValue)
			return FALSE;
		return TRUE;
	}

	// Validate grid form
	public function validateGridForm()
	{
		global $CurrentForm;

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Validate all records
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction != "delete" && $rowaction != "insertdelete") {
				$this->loadFormValues(); // Get form values
				if ($rowaction == "insert" && $this->emptyRow()) {

					// Ignore
				} else if (!$this->validateForm()) {
					return FALSE;
				}
			}
		}
		return TRUE;
	}

	// Get all form values of the grid
	public function getGridFormValues()
	{
		global $CurrentForm;

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;
		$rows = [];

		// Loop through all records
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction != "delete" && $rowaction != "insertdelete") {
				$this->loadFormValues(); // Get form values
				if ($rowaction == "insert" && $this->emptyRow()) {

					// Ignore
				} else {
					$rows[] = $this->getFieldValues("FormValue"); // Return row as array
				}
			}
		}
		return $rows; // Return as array of array
	}

	// Restore form values for current row
	public function restoreCurrentRowFormValues($idx)
	{
		global $CurrentForm;

		// Get row based on current index
		$CurrentForm->Index = $idx;
		$this->loadFormValues(); // Load form values
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
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

			// Reset master/detail keys
			if ($this->Command == "resetall") {
				$this->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$this->pid->setSessionValue("");
				$this->bulan->setSessionValue("");
				$this->tahun->setSessionValue("");
			}

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
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

		// "griddelete"
		if ($this->AllowAddDeleteRow) {
			$item = &$this->ListOptions->add("griddelete");
			$item->CssClass = "text-nowrap";
			$item->OnLeft = FALSE;
			$item->Visible = FALSE; // Default hidden
		}

		// Add group option item
		$item = &$this->ListOptions->add($this->ListOptions->GroupOptionName);
		$item->Body = "";
		$item->OnLeft = FALSE;
		$item->Visible = FALSE;

		// "view"
		$item = &$this->ListOptions->add("view");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canView();
		$item->OnLeft = FALSE;

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

		// Set up row action and key
		if (is_numeric($this->RowIndex) && $this->CurrentMode != "view") {
			$CurrentForm->Index = $this->RowIndex;
			$actionName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormActionName);
			$oldKeyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormOldKeyName);
			$keyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormKeyName);
			$blankRowName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormBlankRowName);
			if ($this->RowAction != "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $actionName . "\" id=\"" . $actionName . "\" value=\"" . $this->RowAction . "\">";
			if ($CurrentForm->hasValue($this->FormOldKeyName))
				$this->RowOldKey = strval($CurrentForm->getValue($this->FormOldKeyName));
			if ($this->RowOldKey != "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $oldKeyName . "\" id=\"" . $oldKeyName . "\" value=\"" . HtmlEncode($this->RowOldKey) . "\">";
			if ($this->RowAction == "delete") {
				$rowkey = $CurrentForm->getValue($this->FormKeyName);
				$this->setupKeyValues($rowkey);

				// Reload hidden key for delete
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $keyName . "\" id=\"" . $keyName . "\" value=\"" . HtmlEncode($rowkey) . "\">";
			}
			if ($this->RowAction == "insert" && $this->isConfirm() && $this->emptyRow())
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $blankRowName . "\" id=\"" . $blankRowName . "\" value=\"1\">";
		}

		// "delete"
		if ($this->AllowAddDeleteRow) {
			if ($this->CurrentMode == "add" || $this->CurrentMode == "copy" || $this->CurrentMode == "edit") {
				$options = &$this->ListOptions;
				$options->UseButtonGroup = TRUE; // Use button group for grid delete button
				$opt = $options["griddelete"];
				if (!$Security->canDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$opt->Body = "&nbsp;";
				} else {
					$opt->Body = "<a class=\"ew-grid-link ew-grid-delete\" title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" onclick=\"return ew.deleteGridRow(this, " . $this->RowIndex . ");\">" . $Language->phrase("DeleteLink") . "</a>";
				}
			}
		}

		// "sequence"
		$opt = $this->ListOptions["sequence"];
		$opt->Body = FormatSequenceNumber($this->RecordCount);
		if ($this->CurrentMode == "view") { // View mode

		// "view"
		$opt = $this->ListOptions["view"];
		$viewcaption = HtmlTitle($Language->phrase("ViewLink"));
		if ($Security->canView()) {
			$opt->Body = "<a class=\"ew-row-link ew-view\" title=\"" . $viewcaption . "\" data-caption=\"" . $viewcaption . "\" href=\"" . HtmlEncode($this->ViewUrl) . "\">" . $Language->phrase("ViewLink") . "</a>";
		} else {
			$opt->Body = "";
		}

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
		} // End View mode
		if ($this->CurrentMode == "edit" && is_numeric($this->RowIndex) && $this->RowAction != "delete") {
			$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $keyName . "\" id=\"" . $keyName . "\" value=\"" . $this->id->CurrentValue . "\">";
		}
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set record key
	public function setRecordKey(&$key, $rs)
	{
		$key = "";
		if ($key != "")
			$key .= Config("COMPOSITE_KEY_SEPARATOR");
		$key .= $rs->fields('id');
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$option = $this->OtherOptions["addedit"];
		$option->UseDropDownButton = FALSE;
		$option->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
		$option->UseButtonGroup = TRUE;

		//$option->ButtonClass = ""; // Class for button group
		$item = &$option->add($option->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Add
		if ($this->CurrentMode == "view") { // Check view mode
			$item = &$option->add("add");
			$addcaption = HtmlTitle($Language->phrase("AddLink"));
			$this->AddUrl = $this->getAddUrl();
			$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("AddLink") . "</a>";
			$item->Visible = $this->AddUrl != "" && $Security->canAdd();
		}
	}

	// Render other options
	public function renderOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		if (($this->CurrentMode == "add" || $this->CurrentMode == "copy" || $this->CurrentMode == "edit") && !$this->isConfirm()) { // Check add/copy/edit mode
			if ($this->AllowAddDeleteRow) {
				$option = $options["addedit"];
				$option->UseDropDownButton = FALSE;
				$item = &$option->add("addblankrow");
				$item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"#\" onclick=\"return ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
				$item->Visible = $Security->canAdd();
				$this->ShowOtherOptions = $item->Visible;
			}
		}
		if ($this->CurrentMode == "view") { // Check view mode
			$option = $options["addedit"];
			$item = $option["add"];
			$this->ShowOtherOptions = $item && $item->Visible;
		}
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

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->datetime->CurrentValue = NULL;
		$this->datetime->OldValue = $this->datetime->CurrentValue;
		$this->u_by->CurrentValue = NULL;
		$this->u_by->OldValue = $this->u_by->CurrentValue;
		$this->month->CurrentValue = NULL;
		$this->month->OldValue = $this->month->CurrentValue;
		$this->tahun->CurrentValue = NULL;
		$this->tahun->OldValue = $this->tahun->CurrentValue;
		$this->bulan->CurrentValue = NULL;
		$this->bulan->OldValue = $this->bulan->CurrentValue;
		$this->nama->CurrentValue = NULL;
		$this->nama->OldValue = $this->nama->CurrentValue;
		$this->jenjang_id->CurrentValue = NULL;
		$this->jenjang_id->OldValue = $this->jenjang_id->CurrentValue;
		$this->jabatan_id->CurrentValue = NULL;
		$this->jabatan_id->OldValue = $this->jabatan_id->CurrentValue;
		$this->sertif->CurrentValue = NULL;
		$this->sertif->OldValue = $this->sertif->CurrentValue;
		$this->terlambat->CurrentValue = NULL;
		$this->terlambat->OldValue = $this->terlambat->CurrentValue;
		$this->value_terlambat->CurrentValue = NULL;
		$this->value_terlambat->OldValue = $this->value_terlambat->CurrentValue;
		$this->izin->CurrentValue = NULL;
		$this->izin->OldValue = $this->izin->CurrentValue;
		$this->value_izin->CurrentValue = NULL;
		$this->value_izin->OldValue = $this->value_izin->CurrentValue;
		$this->izinperjam->CurrentValue = NULL;
		$this->izinperjam->OldValue = $this->izinperjam->CurrentValue;
		$this->izinperjamvalue->CurrentValue = NULL;
		$this->izinperjamvalue->OldValue = $this->izinperjamvalue->CurrentValue;
		$this->sakit->CurrentValue = NULL;
		$this->sakit->OldValue = $this->sakit->CurrentValue;
		$this->value_sakit->CurrentValue = NULL;
		$this->value_sakit->OldValue = $this->value_sakit->CurrentValue;
		$this->sakitperjam->CurrentValue = NULL;
		$this->sakitperjam->OldValue = $this->sakitperjam->CurrentValue;
		$this->sakitperjamvalue->CurrentValue = NULL;
		$this->sakitperjamvalue->OldValue = $this->sakitperjamvalue->CurrentValue;
		$this->pulcep->CurrentValue = NULL;
		$this->pulcep->OldValue = $this->pulcep->CurrentValue;
		$this->value_pulcep->CurrentValue = NULL;
		$this->value_pulcep->OldValue = $this->value_pulcep->CurrentValue;
		$this->tidakhadir->CurrentValue = NULL;
		$this->tidakhadir->OldValue = $this->tidakhadir->CurrentValue;
		$this->value_tidakhadir->CurrentValue = NULL;
		$this->value_tidakhadir->OldValue = $this->value_tidakhadir->CurrentValue;
		$this->tidakhadirjam->CurrentValue = NULL;
		$this->tidakhadirjam->OldValue = $this->tidakhadirjam->CurrentValue;
		$this->tidakhadirjamvalue->CurrentValue = NULL;
		$this->tidakhadirjamvalue->OldValue = $this->tidakhadirjamvalue->CurrentValue;
		$this->totalpotongan->CurrentValue = NULL;
		$this->totalpotongan->OldValue = $this->totalpotongan->CurrentValue;
		$this->pid->CurrentValue = NULL;
		$this->pid->OldValue = $this->pid->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;
		$CurrentForm->FormName = $this->FormName;

		// Check field name 'datetime' first before field var 'x_datetime'
		$val = $CurrentForm->hasValue("datetime") ? $CurrentForm->getValue("datetime") : $CurrentForm->getValue("x_datetime");
		if (!$this->datetime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->datetime->Visible = FALSE; // Disable update for API request
			else
				$this->datetime->setFormValue($val);
			$this->datetime->CurrentValue = UnFormatDateTime($this->datetime->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_datetime"))
			$this->datetime->setOldValue($CurrentForm->getValue("o_datetime"));

		// Check field name 'u_by' first before field var 'x_u_by'
		$val = $CurrentForm->hasValue("u_by") ? $CurrentForm->getValue("u_by") : $CurrentForm->getValue("x_u_by");
		if (!$this->u_by->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->u_by->Visible = FALSE; // Disable update for API request
			else
				$this->u_by->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_u_by"))
			$this->u_by->setOldValue($CurrentForm->getValue("o_u_by"));

		// Check field name 'tahun' first before field var 'x_tahun'
		$val = $CurrentForm->hasValue("tahun") ? $CurrentForm->getValue("tahun") : $CurrentForm->getValue("x_tahun");
		if (!$this->tahun->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tahun->Visible = FALSE; // Disable update for API request
			else
				$this->tahun->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_tahun"))
			$this->tahun->setOldValue($CurrentForm->getValue("o_tahun"));

		// Check field name 'bulan' first before field var 'x_bulan'
		$val = $CurrentForm->hasValue("bulan") ? $CurrentForm->getValue("bulan") : $CurrentForm->getValue("x_bulan");
		if (!$this->bulan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->bulan->Visible = FALSE; // Disable update for API request
			else
				$this->bulan->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_bulan"))
			$this->bulan->setOldValue($CurrentForm->getValue("o_bulan"));

		// Check field name 'nama' first before field var 'x_nama'
		$val = $CurrentForm->hasValue("nama") ? $CurrentForm->getValue("nama") : $CurrentForm->getValue("x_nama");
		if (!$this->nama->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->nama->Visible = FALSE; // Disable update for API request
			else
				$this->nama->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_nama"))
			$this->nama->setOldValue($CurrentForm->getValue("o_nama"));

		// Check field name 'jenjang_id' first before field var 'x_jenjang_id'
		$val = $CurrentForm->hasValue("jenjang_id") ? $CurrentForm->getValue("jenjang_id") : $CurrentForm->getValue("x_jenjang_id");
		if (!$this->jenjang_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->jenjang_id->Visible = FALSE; // Disable update for API request
			else
				$this->jenjang_id->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_jenjang_id"))
			$this->jenjang_id->setOldValue($CurrentForm->getValue("o_jenjang_id"));

		// Check field name 'jabatan_id' first before field var 'x_jabatan_id'
		$val = $CurrentForm->hasValue("jabatan_id") ? $CurrentForm->getValue("jabatan_id") : $CurrentForm->getValue("x_jabatan_id");
		if (!$this->jabatan_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->jabatan_id->Visible = FALSE; // Disable update for API request
			else
				$this->jabatan_id->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_jabatan_id"))
			$this->jabatan_id->setOldValue($CurrentForm->getValue("o_jabatan_id"));

		// Check field name 'sertif' first before field var 'x_sertif'
		$val = $CurrentForm->hasValue("sertif") ? $CurrentForm->getValue("sertif") : $CurrentForm->getValue("x_sertif");
		if (!$this->sertif->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sertif->Visible = FALSE; // Disable update for API request
			else
				$this->sertif->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_sertif"))
			$this->sertif->setOldValue($CurrentForm->getValue("o_sertif"));

		// Check field name 'terlambat' first before field var 'x_terlambat'
		$val = $CurrentForm->hasValue("terlambat") ? $CurrentForm->getValue("terlambat") : $CurrentForm->getValue("x_terlambat");
		if (!$this->terlambat->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->terlambat->Visible = FALSE; // Disable update for API request
			else
				$this->terlambat->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_terlambat"))
			$this->terlambat->setOldValue($CurrentForm->getValue("o_terlambat"));

		// Check field name 'value_terlambat' first before field var 'x_value_terlambat'
		$val = $CurrentForm->hasValue("value_terlambat") ? $CurrentForm->getValue("value_terlambat") : $CurrentForm->getValue("x_value_terlambat");
		if (!$this->value_terlambat->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->value_terlambat->Visible = FALSE; // Disable update for API request
			else
				$this->value_terlambat->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_value_terlambat"))
			$this->value_terlambat->setOldValue($CurrentForm->getValue("o_value_terlambat"));

		// Check field name 'izin' first before field var 'x_izin'
		$val = $CurrentForm->hasValue("izin") ? $CurrentForm->getValue("izin") : $CurrentForm->getValue("x_izin");
		if (!$this->izin->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->izin->Visible = FALSE; // Disable update for API request
			else
				$this->izin->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_izin"))
			$this->izin->setOldValue($CurrentForm->getValue("o_izin"));

		// Check field name 'value_izin' first before field var 'x_value_izin'
		$val = $CurrentForm->hasValue("value_izin") ? $CurrentForm->getValue("value_izin") : $CurrentForm->getValue("x_value_izin");
		if (!$this->value_izin->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->value_izin->Visible = FALSE; // Disable update for API request
			else
				$this->value_izin->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_value_izin"))
			$this->value_izin->setOldValue($CurrentForm->getValue("o_value_izin"));

		// Check field name 'izinperjam' first before field var 'x_izinperjam'
		$val = $CurrentForm->hasValue("izinperjam") ? $CurrentForm->getValue("izinperjam") : $CurrentForm->getValue("x_izinperjam");
		if (!$this->izinperjam->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->izinperjam->Visible = FALSE; // Disable update for API request
			else
				$this->izinperjam->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_izinperjam"))
			$this->izinperjam->setOldValue($CurrentForm->getValue("o_izinperjam"));

		// Check field name 'izinperjamvalue' first before field var 'x_izinperjamvalue'
		$val = $CurrentForm->hasValue("izinperjamvalue") ? $CurrentForm->getValue("izinperjamvalue") : $CurrentForm->getValue("x_izinperjamvalue");
		if (!$this->izinperjamvalue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->izinperjamvalue->Visible = FALSE; // Disable update for API request
			else
				$this->izinperjamvalue->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_izinperjamvalue"))
			$this->izinperjamvalue->setOldValue($CurrentForm->getValue("o_izinperjamvalue"));

		// Check field name 'sakitperjam' first before field var 'x_sakitperjam'
		$val = $CurrentForm->hasValue("sakitperjam") ? $CurrentForm->getValue("sakitperjam") : $CurrentForm->getValue("x_sakitperjam");
		if (!$this->sakitperjam->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sakitperjam->Visible = FALSE; // Disable update for API request
			else
				$this->sakitperjam->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_sakitperjam"))
			$this->sakitperjam->setOldValue($CurrentForm->getValue("o_sakitperjam"));

		// Check field name 'sakitperjamvalue' first before field var 'x_sakitperjamvalue'
		$val = $CurrentForm->hasValue("sakitperjamvalue") ? $CurrentForm->getValue("sakitperjamvalue") : $CurrentForm->getValue("x_sakitperjamvalue");
		if (!$this->sakitperjamvalue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sakitperjamvalue->Visible = FALSE; // Disable update for API request
			else
				$this->sakitperjamvalue->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_sakitperjamvalue"))
			$this->sakitperjamvalue->setOldValue($CurrentForm->getValue("o_sakitperjamvalue"));

		// Check field name 'pulcep' first before field var 'x_pulcep'
		$val = $CurrentForm->hasValue("pulcep") ? $CurrentForm->getValue("pulcep") : $CurrentForm->getValue("x_pulcep");
		if (!$this->pulcep->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->pulcep->Visible = FALSE; // Disable update for API request
			else
				$this->pulcep->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_pulcep"))
			$this->pulcep->setOldValue($CurrentForm->getValue("o_pulcep"));

		// Check field name 'value_pulcep' first before field var 'x_value_pulcep'
		$val = $CurrentForm->hasValue("value_pulcep") ? $CurrentForm->getValue("value_pulcep") : $CurrentForm->getValue("x_value_pulcep");
		if (!$this->value_pulcep->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->value_pulcep->Visible = FALSE; // Disable update for API request
			else
				$this->value_pulcep->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_value_pulcep"))
			$this->value_pulcep->setOldValue($CurrentForm->getValue("o_value_pulcep"));

		// Check field name 'tidakhadirjam' first before field var 'x_tidakhadirjam'
		$val = $CurrentForm->hasValue("tidakhadirjam") ? $CurrentForm->getValue("tidakhadirjam") : $CurrentForm->getValue("x_tidakhadirjam");
		if (!$this->tidakhadirjam->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tidakhadirjam->Visible = FALSE; // Disable update for API request
			else
				$this->tidakhadirjam->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_tidakhadirjam"))
			$this->tidakhadirjam->setOldValue($CurrentForm->getValue("o_tidakhadirjam"));

		// Check field name 'tidakhadirjamvalue' first before field var 'x_tidakhadirjamvalue'
		$val = $CurrentForm->hasValue("tidakhadirjamvalue") ? $CurrentForm->getValue("tidakhadirjamvalue") : $CurrentForm->getValue("x_tidakhadirjamvalue");
		if (!$this->tidakhadirjamvalue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tidakhadirjamvalue->Visible = FALSE; // Disable update for API request
			else
				$this->tidakhadirjamvalue->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_tidakhadirjamvalue"))
			$this->tidakhadirjamvalue->setOldValue($CurrentForm->getValue("o_tidakhadirjamvalue"));

		// Check field name 'totalpotongan' first before field var 'x_totalpotongan'
		$val = $CurrentForm->hasValue("totalpotongan") ? $CurrentForm->getValue("totalpotongan") : $CurrentForm->getValue("x_totalpotongan");
		if (!$this->totalpotongan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->totalpotongan->Visible = FALSE; // Disable update for API request
			else
				$this->totalpotongan->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_totalpotongan"))
			$this->totalpotongan->setOldValue($CurrentForm->getValue("o_totalpotongan"));

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd())
			$this->id->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->datetime->CurrentValue = $this->datetime->FormValue;
		$this->datetime->CurrentValue = UnFormatDateTime($this->datetime->CurrentValue, 0);
		$this->u_by->CurrentValue = $this->u_by->FormValue;
		$this->tahun->CurrentValue = $this->tahun->FormValue;
		$this->bulan->CurrentValue = $this->bulan->FormValue;
		$this->nama->CurrentValue = $this->nama->FormValue;
		$this->jenjang_id->CurrentValue = $this->jenjang_id->FormValue;
		$this->jabatan_id->CurrentValue = $this->jabatan_id->FormValue;
		$this->sertif->CurrentValue = $this->sertif->FormValue;
		$this->terlambat->CurrentValue = $this->terlambat->FormValue;
		$this->value_terlambat->CurrentValue = $this->value_terlambat->FormValue;
		$this->izin->CurrentValue = $this->izin->FormValue;
		$this->value_izin->CurrentValue = $this->value_izin->FormValue;
		$this->izinperjam->CurrentValue = $this->izinperjam->FormValue;
		$this->izinperjamvalue->CurrentValue = $this->izinperjamvalue->FormValue;
		$this->sakitperjam->CurrentValue = $this->sakitperjam->FormValue;
		$this->sakitperjamvalue->CurrentValue = $this->sakitperjamvalue->FormValue;
		$this->pulcep->CurrentValue = $this->pulcep->FormValue;
		$this->value_pulcep->CurrentValue = $this->value_pulcep->FormValue;
		$this->tidakhadirjam->CurrentValue = $this->tidakhadirjam->FormValue;
		$this->tidakhadirjamvalue->CurrentValue = $this->tidakhadirjamvalue->FormValue;
		$this->totalpotongan->CurrentValue = $this->totalpotongan->FormValue;
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
		$this->datetime->setDbValue($row['datetime']);
		$this->u_by->setDbValue($row['u_by']);
		$this->month->setDbValue($row['month']);
		$this->tahun->setDbValue($row['tahun']);
		$this->bulan->setDbValue($row['bulan']);
		$this->nama->setDbValue($row['nama']);
		$this->jenjang_id->setDbValue($row['jenjang_id']);
		$this->jabatan_id->setDbValue($row['jabatan_id']);
		$this->sertif->setDbValue($row['sertif']);
		$this->terlambat->setDbValue($row['terlambat']);
		$this->value_terlambat->setDbValue($row['value_terlambat']);
		$this->izin->setDbValue($row['izin']);
		$this->value_izin->setDbValue($row['value_izin']);
		$this->izinperjam->setDbValue($row['izinperjam']);
		$this->izinperjamvalue->setDbValue($row['izinperjamvalue']);
		$this->sakit->setDbValue($row['sakit']);
		$this->value_sakit->setDbValue($row['value_sakit']);
		$this->sakitperjam->setDbValue($row['sakitperjam']);
		$this->sakitperjamvalue->setDbValue($row['sakitperjamvalue']);
		$this->pulcep->setDbValue($row['pulcep']);
		$this->value_pulcep->setDbValue($row['value_pulcep']);
		$this->tidakhadir->setDbValue($row['tidakhadir']);
		$this->value_tidakhadir->setDbValue($row['value_tidakhadir']);
		$this->tidakhadirjam->setDbValue($row['tidakhadirjam']);
		$this->tidakhadirjamvalue->setDbValue($row['tidakhadirjamvalue']);
		$this->totalpotongan->setDbValue($row['totalpotongan']);
		$this->pid->setDbValue($row['pid']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['datetime'] = $this->datetime->CurrentValue;
		$row['u_by'] = $this->u_by->CurrentValue;
		$row['month'] = $this->month->CurrentValue;
		$row['tahun'] = $this->tahun->CurrentValue;
		$row['bulan'] = $this->bulan->CurrentValue;
		$row['nama'] = $this->nama->CurrentValue;
		$row['jenjang_id'] = $this->jenjang_id->CurrentValue;
		$row['jabatan_id'] = $this->jabatan_id->CurrentValue;
		$row['sertif'] = $this->sertif->CurrentValue;
		$row['terlambat'] = $this->terlambat->CurrentValue;
		$row['value_terlambat'] = $this->value_terlambat->CurrentValue;
		$row['izin'] = $this->izin->CurrentValue;
		$row['value_izin'] = $this->value_izin->CurrentValue;
		$row['izinperjam'] = $this->izinperjam->CurrentValue;
		$row['izinperjamvalue'] = $this->izinperjamvalue->CurrentValue;
		$row['sakit'] = $this->sakit->CurrentValue;
		$row['value_sakit'] = $this->value_sakit->CurrentValue;
		$row['sakitperjam'] = $this->sakitperjam->CurrentValue;
		$row['sakitperjamvalue'] = $this->sakitperjamvalue->CurrentValue;
		$row['pulcep'] = $this->pulcep->CurrentValue;
		$row['value_pulcep'] = $this->value_pulcep->CurrentValue;
		$row['tidakhadir'] = $this->tidakhadir->CurrentValue;
		$row['value_tidakhadir'] = $this->value_tidakhadir->CurrentValue;
		$row['tidakhadirjam'] = $this->tidakhadirjam->CurrentValue;
		$row['tidakhadirjamvalue'] = $this->tidakhadirjamvalue->CurrentValue;
		$row['totalpotongan'] = $this->totalpotongan->CurrentValue;
		$row['pid'] = $this->pid->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		$keys = [$this->RowOldKey];
		$cnt = count($keys);
		if ($cnt >= 1) {
			if (strval($keys[0]) != "")
				$this->id->OldValue = strval($keys[0]); // id
			else
				$validKey = FALSE;
		} else {
			$validKey = FALSE;
		}

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
		$this->CopyUrl = $this->getCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// datetime
		// u_by
		// month
		// tahun
		// bulan
		// nama
		// jenjang_id
		// jabatan_id
		// sertif
		// terlambat
		// value_terlambat
		// izin
		// value_izin
		// izinperjam
		// izinperjamvalue
		// sakit
		// value_sakit
		// sakitperjam
		// sakitperjamvalue
		// pulcep
		// value_pulcep
		// tidakhadir
		// value_tidakhadir
		// tidakhadirjam
		// tidakhadirjamvalue
		// totalpotongan
		// pid

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// datetime
			$this->datetime->ViewValue = $this->datetime->CurrentValue;
			$this->datetime->ViewValue = FormatDateTime($this->datetime->ViewValue, 0);
			$this->datetime->ViewCustomAttributes = "";

			// u_by
			$this->u_by->ViewValue = $this->u_by->CurrentValue;
			$curVal = strval($this->u_by->CurrentValue);
			if ($curVal != "") {
				$this->u_by->ViewValue = $this->u_by->lookupCacheOption($curVal);
				if ($this->u_by->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->u_by->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->u_by->ViewValue = $this->u_by->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->u_by->ViewValue = $this->u_by->CurrentValue;
					}
				}
			} else {
				$this->u_by->ViewValue = NULL;
			}
			$this->u_by->ViewCustomAttributes = "";

			// tahun
			$this->tahun->ViewValue = $this->tahun->CurrentValue;
			$this->tahun->ViewCustomAttributes = "";

			// bulan
			$this->bulan->ViewValue = $this->bulan->CurrentValue;
			$curVal = strval($this->bulan->CurrentValue);
			if ($curVal != "") {
				$this->bulan->ViewValue = $this->bulan->lookupCacheOption($curVal);
				if ($this->bulan->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->bulan->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->bulan->ViewValue = $this->bulan->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->bulan->ViewValue = $this->bulan->CurrentValue;
					}
				}
			} else {
				$this->bulan->ViewValue = NULL;
			}
			$this->bulan->ViewCustomAttributes = "";

			// nama
			$curVal = strval($this->nama->CurrentValue);
			if ($curVal != "") {
				$this->nama->ViewValue = $this->nama->lookupCacheOption($curVal);
				if ($this->nama->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`nip`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->nama->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->nama->ViewValue = $this->nama->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->nama->ViewValue = $this->nama->CurrentValue;
					}
				}
			} else {
				$this->nama->ViewValue = NULL;
			}
			$this->nama->ViewCustomAttributes = "";

			// jenjang_id
			$this->jenjang_id->ViewValue = $this->jenjang_id->CurrentValue;
			$curVal = strval($this->jenjang_id->CurrentValue);
			if ($curVal != "") {
				$this->jenjang_id->ViewValue = $this->jenjang_id->lookupCacheOption($curVal);
				if ($this->jenjang_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
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
			$this->jabatan_id->ViewValue = FormatNumber($this->jabatan_id->ViewValue, 0, -2, -2, -2);
			$this->jabatan_id->ViewCustomAttributes = "";

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

			// terlambat
			$this->terlambat->ViewValue = $this->terlambat->CurrentValue;
			$this->terlambat->ViewValue = FormatNumber($this->terlambat->ViewValue, 0, -2, -2, -2);
			$this->terlambat->ViewCustomAttributes = "";

			// value_terlambat
			$this->value_terlambat->ViewValue = $this->value_terlambat->CurrentValue;
			$this->value_terlambat->ViewValue = FormatNumber($this->value_terlambat->ViewValue, 0, -2, -2, -2);
			$this->value_terlambat->ViewCustomAttributes = "";

			// izin
			$this->izin->ViewValue = $this->izin->CurrentValue;
			$this->izin->ViewValue = FormatNumber($this->izin->ViewValue, 0, -2, -2, -2);
			$this->izin->ViewCustomAttributes = "";

			// value_izin
			$this->value_izin->ViewValue = $this->value_izin->CurrentValue;
			$this->value_izin->ViewValue = FormatNumber($this->value_izin->ViewValue, 0, -2, -2, -2);
			$this->value_izin->ViewCustomAttributes = "";

			// izinperjam
			$this->izinperjam->ViewValue = $this->izinperjam->CurrentValue;
			$this->izinperjam->ViewValue = FormatNumber($this->izinperjam->ViewValue, 0, -2, -2, -2);
			$this->izinperjam->ViewCustomAttributes = "";

			// izinperjamvalue
			$this->izinperjamvalue->ViewValue = $this->izinperjamvalue->CurrentValue;
			$this->izinperjamvalue->ViewValue = FormatNumber($this->izinperjamvalue->ViewValue, 0, -2, -2, -2);
			$this->izinperjamvalue->ViewCustomAttributes = "";

			// sakitperjam
			$this->sakitperjam->ViewValue = $this->sakitperjam->CurrentValue;
			$this->sakitperjam->ViewValue = FormatNumber($this->sakitperjam->ViewValue, 0, -2, -2, -2);
			$this->sakitperjam->ViewCustomAttributes = "";

			// sakitperjamvalue
			$this->sakitperjamvalue->ViewValue = $this->sakitperjamvalue->CurrentValue;
			$this->sakitperjamvalue->ViewValue = FormatNumber($this->sakitperjamvalue->ViewValue, 0, -2, -2, -2);
			$this->sakitperjamvalue->ViewCustomAttributes = "";

			// pulcep
			$this->pulcep->ViewValue = $this->pulcep->CurrentValue;
			$this->pulcep->ViewValue = FormatNumber($this->pulcep->ViewValue, 0, -2, -2, -2);
			$this->pulcep->ViewCustomAttributes = "";

			// value_pulcep
			$this->value_pulcep->ViewValue = $this->value_pulcep->CurrentValue;
			$this->value_pulcep->ViewValue = FormatNumber($this->value_pulcep->ViewValue, 0, -2, -2, -2);
			$this->value_pulcep->ViewCustomAttributes = "";

			// tidakhadirjam
			$this->tidakhadirjam->ViewValue = $this->tidakhadirjam->CurrentValue;
			$this->tidakhadirjam->ViewValue = FormatNumber($this->tidakhadirjam->ViewValue, 0, -2, -2, -2);
			$this->tidakhadirjam->ViewCustomAttributes = "";

			// tidakhadirjamvalue
			$this->tidakhadirjamvalue->ViewValue = $this->tidakhadirjamvalue->CurrentValue;
			$this->tidakhadirjamvalue->ViewValue = FormatNumber($this->tidakhadirjamvalue->ViewValue, 0, -2, -2, -2);
			$this->tidakhadirjamvalue->ViewCustomAttributes = "";

			// totalpotongan
			$this->totalpotongan->ViewValue = $this->totalpotongan->CurrentValue;
			$this->totalpotongan->ViewValue = FormatNumber($this->totalpotongan->ViewValue, 0, -2, -2, -2);
			$this->totalpotongan->ViewCustomAttributes = "";

			// pid
			$this->pid->ViewValue = $this->pid->CurrentValue;
			$this->pid->ViewValue = FormatNumber($this->pid->ViewValue, 0, -2, -2, -2);
			$this->pid->ViewCustomAttributes = "";

			// datetime
			$this->datetime->LinkCustomAttributes = "";
			$this->datetime->HrefValue = "";
			$this->datetime->TooltipValue = "";

			// u_by
			$this->u_by->LinkCustomAttributes = "";
			$this->u_by->HrefValue = "";
			$this->u_by->TooltipValue = "";

			// tahun
			$this->tahun->LinkCustomAttributes = "";
			$this->tahun->HrefValue = "";
			$this->tahun->TooltipValue = "";

			// bulan
			$this->bulan->LinkCustomAttributes = "";
			$this->bulan->HrefValue = "";
			$this->bulan->TooltipValue = "";

			// nama
			$this->nama->LinkCustomAttributes = "";
			$this->nama->HrefValue = "";
			$this->nama->TooltipValue = "";

			// jenjang_id
			$this->jenjang_id->LinkCustomAttributes = "";
			$this->jenjang_id->HrefValue = "";
			$this->jenjang_id->TooltipValue = "";

			// jabatan_id
			$this->jabatan_id->LinkCustomAttributes = "";
			$this->jabatan_id->HrefValue = "";
			$this->jabatan_id->TooltipValue = "";

			// sertif
			$this->sertif->LinkCustomAttributes = "";
			$this->sertif->HrefValue = "";
			$this->sertif->TooltipValue = "";

			// terlambat
			$this->terlambat->LinkCustomAttributes = "";
			$this->terlambat->HrefValue = "";
			$this->terlambat->TooltipValue = "";

			// value_terlambat
			$this->value_terlambat->LinkCustomAttributes = "";
			$this->value_terlambat->HrefValue = "";
			$this->value_terlambat->TooltipValue = "";

			// izin
			$this->izin->LinkCustomAttributes = "";
			$this->izin->HrefValue = "";
			$this->izin->TooltipValue = "";

			// value_izin
			$this->value_izin->LinkCustomAttributes = "";
			$this->value_izin->HrefValue = "";
			$this->value_izin->TooltipValue = "";

			// izinperjam
			$this->izinperjam->LinkCustomAttributes = "";
			$this->izinperjam->HrefValue = "";
			$this->izinperjam->TooltipValue = "";

			// izinperjamvalue
			$this->izinperjamvalue->LinkCustomAttributes = "";
			$this->izinperjamvalue->HrefValue = "";
			$this->izinperjamvalue->TooltipValue = "";

			// sakitperjam
			$this->sakitperjam->LinkCustomAttributes = "";
			$this->sakitperjam->HrefValue = "";
			$this->sakitperjam->TooltipValue = "";

			// sakitperjamvalue
			$this->sakitperjamvalue->LinkCustomAttributes = "";
			$this->sakitperjamvalue->HrefValue = "";
			$this->sakitperjamvalue->TooltipValue = "";

			// pulcep
			$this->pulcep->LinkCustomAttributes = "";
			$this->pulcep->HrefValue = "";
			$this->pulcep->TooltipValue = "";

			// value_pulcep
			$this->value_pulcep->LinkCustomAttributes = "";
			$this->value_pulcep->HrefValue = "";
			$this->value_pulcep->TooltipValue = "";

			// tidakhadirjam
			$this->tidakhadirjam->LinkCustomAttributes = "";
			$this->tidakhadirjam->HrefValue = "";
			$this->tidakhadirjam->TooltipValue = "";

			// tidakhadirjamvalue
			$this->tidakhadirjamvalue->LinkCustomAttributes = "";
			$this->tidakhadirjamvalue->HrefValue = "";
			$this->tidakhadirjamvalue->TooltipValue = "";

			// totalpotongan
			$this->totalpotongan->LinkCustomAttributes = "";
			$this->totalpotongan->HrefValue = "";
			$this->totalpotongan->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// datetime
			// u_by
			// tahun

			$this->tahun->EditAttrs["class"] = "form-control";
			$this->tahun->EditCustomAttributes = "";
			if ($this->tahun->getSessionValue() != "") {
				$this->tahun->CurrentValue = $this->tahun->getSessionValue();
				$this->tahun->OldValue = $this->tahun->CurrentValue;
				$this->tahun->ViewValue = $this->tahun->CurrentValue;
				$this->tahun->ViewCustomAttributes = "";
			} else {
				$this->tahun->EditValue = HtmlEncode($this->tahun->CurrentValue);
				$this->tahun->PlaceHolder = RemoveHtml($this->tahun->caption());
			}

			// bulan
			$this->bulan->EditAttrs["class"] = "form-control";
			$this->bulan->EditCustomAttributes = "";
			if ($this->bulan->getSessionValue() != "") {
				$this->bulan->CurrentValue = $this->bulan->getSessionValue();
				$this->bulan->OldValue = $this->bulan->CurrentValue;
				$this->bulan->ViewValue = $this->bulan->CurrentValue;
				$curVal = strval($this->bulan->CurrentValue);
				if ($curVal != "") {
					$this->bulan->ViewValue = $this->bulan->lookupCacheOption($curVal);
					if ($this->bulan->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
						$sqlWrk = $this->bulan->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->bulan->ViewValue = $this->bulan->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->bulan->ViewValue = $this->bulan->CurrentValue;
						}
					}
				} else {
					$this->bulan->ViewValue = NULL;
				}
				$this->bulan->ViewCustomAttributes = "";
			} else {
				$this->bulan->EditValue = HtmlEncode($this->bulan->CurrentValue);
				$curVal = strval($this->bulan->CurrentValue);
				if ($curVal != "") {
					$this->bulan->EditValue = $this->bulan->lookupCacheOption($curVal);
					if ($this->bulan->EditValue === NULL) { // Lookup from database
						$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
						$sqlWrk = $this->bulan->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = HtmlEncode($rswrk->fields('df'));
							$this->bulan->EditValue = $this->bulan->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->bulan->EditValue = HtmlEncode($this->bulan->CurrentValue);
						}
					}
				} else {
					$this->bulan->EditValue = NULL;
				}
				$this->bulan->PlaceHolder = RemoveHtml($this->bulan->caption());
			}

			// nama
			$this->nama->EditCustomAttributes = "";
			$curVal = trim(strval($this->nama->CurrentValue));
			if ($curVal != "")
				$this->nama->ViewValue = $this->nama->lookupCacheOption($curVal);
			else
				$this->nama->ViewValue = $this->nama->Lookup !== NULL && is_array($this->nama->Lookup->Options) ? $curVal : NULL;
			if ($this->nama->ViewValue !== NULL) { // Load from cache
				$this->nama->EditValue = array_values($this->nama->Lookup->Options);
				if ($this->nama->ViewValue == "")
					$this->nama->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`nip`" . SearchString("=", $this->nama->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->nama->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->nama->ViewValue = $this->nama->displayValue($arwrk);
				} else {
					$this->nama->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->nama->EditValue = $arwrk;
			}

			// jenjang_id
			$this->jenjang_id->EditAttrs["class"] = "form-control";
			$this->jenjang_id->EditCustomAttributes = "";
			$this->jenjang_id->EditValue = HtmlEncode($this->jenjang_id->CurrentValue);
			$curVal = strval($this->jenjang_id->CurrentValue);
			if ($curVal != "") {
				$this->jenjang_id->EditValue = $this->jenjang_id->lookupCacheOption($curVal);
				if ($this->jenjang_id->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->jenjang_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->jenjang_id->EditValue = $this->jenjang_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->jenjang_id->EditValue = HtmlEncode($this->jenjang_id->CurrentValue);
					}
				}
			} else {
				$this->jenjang_id->EditValue = NULL;
			}
			$this->jenjang_id->PlaceHolder = RemoveHtml($this->jenjang_id->caption());

			// jabatan_id
			$this->jabatan_id->EditAttrs["class"] = "form-control";
			$this->jabatan_id->EditCustomAttributes = "";
			$this->jabatan_id->EditValue = HtmlEncode($this->jabatan_id->CurrentValue);
			$this->jabatan_id->PlaceHolder = RemoveHtml($this->jabatan_id->caption());

			// sertif
			$this->sertif->EditAttrs["class"] = "form-control";
			$this->sertif->EditCustomAttributes = "";
			$this->sertif->EditValue = HtmlEncode($this->sertif->CurrentValue);
			$curVal = strval($this->sertif->CurrentValue);
			if ($curVal != "") {
				$this->sertif->EditValue = $this->sertif->lookupCacheOption($curVal);
				if ($this->sertif->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->sertif->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->sertif->EditValue = $this->sertif->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->sertif->EditValue = HtmlEncode($this->sertif->CurrentValue);
					}
				}
			} else {
				$this->sertif->EditValue = NULL;
			}
			$this->sertif->PlaceHolder = RemoveHtml($this->sertif->caption());

			// terlambat
			$this->terlambat->EditAttrs["class"] = "form-control";
			$this->terlambat->EditCustomAttributes = "";
			$this->terlambat->EditValue = HtmlEncode($this->terlambat->CurrentValue);
			$this->terlambat->PlaceHolder = RemoveHtml($this->terlambat->caption());

			// value_terlambat
			$this->value_terlambat->EditAttrs["class"] = "form-control";
			$this->value_terlambat->EditCustomAttributes = "";
			$this->value_terlambat->EditValue = HtmlEncode($this->value_terlambat->CurrentValue);
			$this->value_terlambat->PlaceHolder = RemoveHtml($this->value_terlambat->caption());

			// izin
			$this->izin->EditAttrs["class"] = "form-control";
			$this->izin->EditCustomAttributes = "";
			$this->izin->EditValue = HtmlEncode($this->izin->CurrentValue);
			$this->izin->PlaceHolder = RemoveHtml($this->izin->caption());

			// value_izin
			$this->value_izin->EditAttrs["class"] = "form-control";
			$this->value_izin->EditCustomAttributes = "";
			$this->value_izin->EditValue = HtmlEncode($this->value_izin->CurrentValue);
			$this->value_izin->PlaceHolder = RemoveHtml($this->value_izin->caption());

			// izinperjam
			$this->izinperjam->EditAttrs["class"] = "form-control";
			$this->izinperjam->EditCustomAttributes = "";
			$this->izinperjam->EditValue = HtmlEncode($this->izinperjam->CurrentValue);
			$this->izinperjam->PlaceHolder = RemoveHtml($this->izinperjam->caption());

			// izinperjamvalue
			$this->izinperjamvalue->EditAttrs["class"] = "form-control";
			$this->izinperjamvalue->EditCustomAttributes = "";
			$this->izinperjamvalue->EditValue = HtmlEncode($this->izinperjamvalue->CurrentValue);
			$this->izinperjamvalue->PlaceHolder = RemoveHtml($this->izinperjamvalue->caption());

			// sakitperjam
			$this->sakitperjam->EditAttrs["class"] = "form-control";
			$this->sakitperjam->EditCustomAttributes = "";
			$this->sakitperjam->EditValue = HtmlEncode($this->sakitperjam->CurrentValue);
			$this->sakitperjam->PlaceHolder = RemoveHtml($this->sakitperjam->caption());

			// sakitperjamvalue
			$this->sakitperjamvalue->EditAttrs["class"] = "form-control";
			$this->sakitperjamvalue->EditCustomAttributes = "";
			$this->sakitperjamvalue->EditValue = HtmlEncode($this->sakitperjamvalue->CurrentValue);
			$this->sakitperjamvalue->PlaceHolder = RemoveHtml($this->sakitperjamvalue->caption());

			// pulcep
			$this->pulcep->EditAttrs["class"] = "form-control";
			$this->pulcep->EditCustomAttributes = "";
			$this->pulcep->EditValue = HtmlEncode($this->pulcep->CurrentValue);
			$this->pulcep->PlaceHolder = RemoveHtml($this->pulcep->caption());

			// value_pulcep
			$this->value_pulcep->EditAttrs["class"] = "form-control";
			$this->value_pulcep->EditCustomAttributes = "";
			$this->value_pulcep->EditValue = HtmlEncode($this->value_pulcep->CurrentValue);
			$this->value_pulcep->PlaceHolder = RemoveHtml($this->value_pulcep->caption());

			// tidakhadirjam
			$this->tidakhadirjam->EditAttrs["class"] = "form-control";
			$this->tidakhadirjam->EditCustomAttributes = "";
			$this->tidakhadirjam->EditValue = HtmlEncode($this->tidakhadirjam->CurrentValue);
			$this->tidakhadirjam->PlaceHolder = RemoveHtml($this->tidakhadirjam->caption());

			// tidakhadirjamvalue
			$this->tidakhadirjamvalue->EditAttrs["class"] = "form-control";
			$this->tidakhadirjamvalue->EditCustomAttributes = "";
			$this->tidakhadirjamvalue->EditValue = HtmlEncode($this->tidakhadirjamvalue->CurrentValue);
			$this->tidakhadirjamvalue->PlaceHolder = RemoveHtml($this->tidakhadirjamvalue->caption());

			// totalpotongan
			$this->totalpotongan->EditAttrs["class"] = "form-control";
			$this->totalpotongan->EditCustomAttributes = "";
			$this->totalpotongan->EditValue = HtmlEncode($this->totalpotongan->CurrentValue);
			$this->totalpotongan->PlaceHolder = RemoveHtml($this->totalpotongan->caption());

			// Add refer script
			// datetime

			$this->datetime->LinkCustomAttributes = "";
			$this->datetime->HrefValue = "";

			// u_by
			$this->u_by->LinkCustomAttributes = "";
			$this->u_by->HrefValue = "";

			// tahun
			$this->tahun->LinkCustomAttributes = "";
			$this->tahun->HrefValue = "";

			// bulan
			$this->bulan->LinkCustomAttributes = "";
			$this->bulan->HrefValue = "";

			// nama
			$this->nama->LinkCustomAttributes = "";
			$this->nama->HrefValue = "";

			// jenjang_id
			$this->jenjang_id->LinkCustomAttributes = "";
			$this->jenjang_id->HrefValue = "";

			// jabatan_id
			$this->jabatan_id->LinkCustomAttributes = "";
			$this->jabatan_id->HrefValue = "";

			// sertif
			$this->sertif->LinkCustomAttributes = "";
			$this->sertif->HrefValue = "";

			// terlambat
			$this->terlambat->LinkCustomAttributes = "";
			$this->terlambat->HrefValue = "";

			// value_terlambat
			$this->value_terlambat->LinkCustomAttributes = "";
			$this->value_terlambat->HrefValue = "";

			// izin
			$this->izin->LinkCustomAttributes = "";
			$this->izin->HrefValue = "";

			// value_izin
			$this->value_izin->LinkCustomAttributes = "";
			$this->value_izin->HrefValue = "";

			// izinperjam
			$this->izinperjam->LinkCustomAttributes = "";
			$this->izinperjam->HrefValue = "";

			// izinperjamvalue
			$this->izinperjamvalue->LinkCustomAttributes = "";
			$this->izinperjamvalue->HrefValue = "";

			// sakitperjam
			$this->sakitperjam->LinkCustomAttributes = "";
			$this->sakitperjam->HrefValue = "";

			// sakitperjamvalue
			$this->sakitperjamvalue->LinkCustomAttributes = "";
			$this->sakitperjamvalue->HrefValue = "";

			// pulcep
			$this->pulcep->LinkCustomAttributes = "";
			$this->pulcep->HrefValue = "";

			// value_pulcep
			$this->value_pulcep->LinkCustomAttributes = "";
			$this->value_pulcep->HrefValue = "";

			// tidakhadirjam
			$this->tidakhadirjam->LinkCustomAttributes = "";
			$this->tidakhadirjam->HrefValue = "";

			// tidakhadirjamvalue
			$this->tidakhadirjamvalue->LinkCustomAttributes = "";
			$this->tidakhadirjamvalue->HrefValue = "";

			// totalpotongan
			$this->totalpotongan->LinkCustomAttributes = "";
			$this->totalpotongan->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// datetime
			// u_by
			// tahun

			$this->tahun->EditAttrs["class"] = "form-control";
			$this->tahun->EditCustomAttributes = "";
			if ($this->tahun->getSessionValue() != "") {
				$this->tahun->CurrentValue = $this->tahun->getSessionValue();
				$this->tahun->OldValue = $this->tahun->CurrentValue;
				$this->tahun->ViewValue = $this->tahun->CurrentValue;
				$this->tahun->ViewCustomAttributes = "";
			} else {
				$this->tahun->EditValue = HtmlEncode($this->tahun->CurrentValue);
				$this->tahun->PlaceHolder = RemoveHtml($this->tahun->caption());
			}

			// bulan
			$this->bulan->EditAttrs["class"] = "form-control";
			$this->bulan->EditCustomAttributes = "";
			if ($this->bulan->getSessionValue() != "") {
				$this->bulan->CurrentValue = $this->bulan->getSessionValue();
				$this->bulan->OldValue = $this->bulan->CurrentValue;
				$this->bulan->ViewValue = $this->bulan->CurrentValue;
				$curVal = strval($this->bulan->CurrentValue);
				if ($curVal != "") {
					$this->bulan->ViewValue = $this->bulan->lookupCacheOption($curVal);
					if ($this->bulan->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
						$sqlWrk = $this->bulan->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->bulan->ViewValue = $this->bulan->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->bulan->ViewValue = $this->bulan->CurrentValue;
						}
					}
				} else {
					$this->bulan->ViewValue = NULL;
				}
				$this->bulan->ViewCustomAttributes = "";
			} else {
				$this->bulan->EditValue = HtmlEncode($this->bulan->CurrentValue);
				$curVal = strval($this->bulan->CurrentValue);
				if ($curVal != "") {
					$this->bulan->EditValue = $this->bulan->lookupCacheOption($curVal);
					if ($this->bulan->EditValue === NULL) { // Lookup from database
						$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
						$sqlWrk = $this->bulan->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = HtmlEncode($rswrk->fields('df'));
							$this->bulan->EditValue = $this->bulan->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->bulan->EditValue = HtmlEncode($this->bulan->CurrentValue);
						}
					}
				} else {
					$this->bulan->EditValue = NULL;
				}
				$this->bulan->PlaceHolder = RemoveHtml($this->bulan->caption());
			}

			// nama
			$this->nama->EditCustomAttributes = "";
			$curVal = trim(strval($this->nama->CurrentValue));
			if ($curVal != "")
				$this->nama->ViewValue = $this->nama->lookupCacheOption($curVal);
			else
				$this->nama->ViewValue = $this->nama->Lookup !== NULL && is_array($this->nama->Lookup->Options) ? $curVal : NULL;
			if ($this->nama->ViewValue !== NULL) { // Load from cache
				$this->nama->EditValue = array_values($this->nama->Lookup->Options);
				if ($this->nama->ViewValue == "")
					$this->nama->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`nip`" . SearchString("=", $this->nama->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->nama->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->nama->ViewValue = $this->nama->displayValue($arwrk);
				} else {
					$this->nama->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->nama->EditValue = $arwrk;
			}

			// jenjang_id
			$this->jenjang_id->EditAttrs["class"] = "form-control";
			$this->jenjang_id->EditCustomAttributes = "";
			$this->jenjang_id->EditValue = HtmlEncode($this->jenjang_id->CurrentValue);
			$curVal = strval($this->jenjang_id->CurrentValue);
			if ($curVal != "") {
				$this->jenjang_id->EditValue = $this->jenjang_id->lookupCacheOption($curVal);
				if ($this->jenjang_id->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->jenjang_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->jenjang_id->EditValue = $this->jenjang_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->jenjang_id->EditValue = HtmlEncode($this->jenjang_id->CurrentValue);
					}
				}
			} else {
				$this->jenjang_id->EditValue = NULL;
			}
			$this->jenjang_id->PlaceHolder = RemoveHtml($this->jenjang_id->caption());

			// jabatan_id
			$this->jabatan_id->EditAttrs["class"] = "form-control";
			$this->jabatan_id->EditCustomAttributes = "";
			$this->jabatan_id->EditValue = HtmlEncode($this->jabatan_id->CurrentValue);
			$this->jabatan_id->PlaceHolder = RemoveHtml($this->jabatan_id->caption());

			// sertif
			$this->sertif->EditAttrs["class"] = "form-control";
			$this->sertif->EditCustomAttributes = "";
			$this->sertif->EditValue = HtmlEncode($this->sertif->CurrentValue);
			$curVal = strval($this->sertif->CurrentValue);
			if ($curVal != "") {
				$this->sertif->EditValue = $this->sertif->lookupCacheOption($curVal);
				if ($this->sertif->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->sertif->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->sertif->EditValue = $this->sertif->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->sertif->EditValue = HtmlEncode($this->sertif->CurrentValue);
					}
				}
			} else {
				$this->sertif->EditValue = NULL;
			}
			$this->sertif->PlaceHolder = RemoveHtml($this->sertif->caption());

			// terlambat
			$this->terlambat->EditAttrs["class"] = "form-control";
			$this->terlambat->EditCustomAttributes = "";
			$this->terlambat->EditValue = HtmlEncode($this->terlambat->CurrentValue);
			$this->terlambat->PlaceHolder = RemoveHtml($this->terlambat->caption());

			// value_terlambat
			$this->value_terlambat->EditAttrs["class"] = "form-control";
			$this->value_terlambat->EditCustomAttributes = "";
			$this->value_terlambat->EditValue = HtmlEncode($this->value_terlambat->CurrentValue);
			$this->value_terlambat->PlaceHolder = RemoveHtml($this->value_terlambat->caption());

			// izin
			$this->izin->EditAttrs["class"] = "form-control";
			$this->izin->EditCustomAttributes = "";
			$this->izin->EditValue = HtmlEncode($this->izin->CurrentValue);
			$this->izin->PlaceHolder = RemoveHtml($this->izin->caption());

			// value_izin
			$this->value_izin->EditAttrs["class"] = "form-control";
			$this->value_izin->EditCustomAttributes = "";
			$this->value_izin->EditValue = HtmlEncode($this->value_izin->CurrentValue);
			$this->value_izin->PlaceHolder = RemoveHtml($this->value_izin->caption());

			// izinperjam
			$this->izinperjam->EditAttrs["class"] = "form-control";
			$this->izinperjam->EditCustomAttributes = "";
			$this->izinperjam->EditValue = HtmlEncode($this->izinperjam->CurrentValue);
			$this->izinperjam->PlaceHolder = RemoveHtml($this->izinperjam->caption());

			// izinperjamvalue
			$this->izinperjamvalue->EditAttrs["class"] = "form-control";
			$this->izinperjamvalue->EditCustomAttributes = "";
			$this->izinperjamvalue->EditValue = HtmlEncode($this->izinperjamvalue->CurrentValue);
			$this->izinperjamvalue->PlaceHolder = RemoveHtml($this->izinperjamvalue->caption());

			// sakitperjam
			$this->sakitperjam->EditAttrs["class"] = "form-control";
			$this->sakitperjam->EditCustomAttributes = "";
			$this->sakitperjam->EditValue = HtmlEncode($this->sakitperjam->CurrentValue);
			$this->sakitperjam->PlaceHolder = RemoveHtml($this->sakitperjam->caption());

			// sakitperjamvalue
			$this->sakitperjamvalue->EditAttrs["class"] = "form-control";
			$this->sakitperjamvalue->EditCustomAttributes = "";
			$this->sakitperjamvalue->EditValue = HtmlEncode($this->sakitperjamvalue->CurrentValue);
			$this->sakitperjamvalue->PlaceHolder = RemoveHtml($this->sakitperjamvalue->caption());

			// pulcep
			$this->pulcep->EditAttrs["class"] = "form-control";
			$this->pulcep->EditCustomAttributes = "";
			$this->pulcep->EditValue = HtmlEncode($this->pulcep->CurrentValue);
			$this->pulcep->PlaceHolder = RemoveHtml($this->pulcep->caption());

			// value_pulcep
			$this->value_pulcep->EditAttrs["class"] = "form-control";
			$this->value_pulcep->EditCustomAttributes = "";
			$this->value_pulcep->EditValue = HtmlEncode($this->value_pulcep->CurrentValue);
			$this->value_pulcep->PlaceHolder = RemoveHtml($this->value_pulcep->caption());

			// tidakhadirjam
			$this->tidakhadirjam->EditAttrs["class"] = "form-control";
			$this->tidakhadirjam->EditCustomAttributes = "";
			$this->tidakhadirjam->EditValue = HtmlEncode($this->tidakhadirjam->CurrentValue);
			$this->tidakhadirjam->PlaceHolder = RemoveHtml($this->tidakhadirjam->caption());

			// tidakhadirjamvalue
			$this->tidakhadirjamvalue->EditAttrs["class"] = "form-control";
			$this->tidakhadirjamvalue->EditCustomAttributes = "";
			$this->tidakhadirjamvalue->EditValue = HtmlEncode($this->tidakhadirjamvalue->CurrentValue);
			$this->tidakhadirjamvalue->PlaceHolder = RemoveHtml($this->tidakhadirjamvalue->caption());

			// totalpotongan
			$this->totalpotongan->EditAttrs["class"] = "form-control";
			$this->totalpotongan->EditCustomAttributes = "";
			$this->totalpotongan->EditValue = HtmlEncode($this->totalpotongan->CurrentValue);
			$this->totalpotongan->PlaceHolder = RemoveHtml($this->totalpotongan->caption());

			// Edit refer script
			// datetime

			$this->datetime->LinkCustomAttributes = "";
			$this->datetime->HrefValue = "";

			// u_by
			$this->u_by->LinkCustomAttributes = "";
			$this->u_by->HrefValue = "";

			// tahun
			$this->tahun->LinkCustomAttributes = "";
			$this->tahun->HrefValue = "";

			// bulan
			$this->bulan->LinkCustomAttributes = "";
			$this->bulan->HrefValue = "";

			// nama
			$this->nama->LinkCustomAttributes = "";
			$this->nama->HrefValue = "";

			// jenjang_id
			$this->jenjang_id->LinkCustomAttributes = "";
			$this->jenjang_id->HrefValue = "";

			// jabatan_id
			$this->jabatan_id->LinkCustomAttributes = "";
			$this->jabatan_id->HrefValue = "";

			// sertif
			$this->sertif->LinkCustomAttributes = "";
			$this->sertif->HrefValue = "";

			// terlambat
			$this->terlambat->LinkCustomAttributes = "";
			$this->terlambat->HrefValue = "";

			// value_terlambat
			$this->value_terlambat->LinkCustomAttributes = "";
			$this->value_terlambat->HrefValue = "";

			// izin
			$this->izin->LinkCustomAttributes = "";
			$this->izin->HrefValue = "";

			// value_izin
			$this->value_izin->LinkCustomAttributes = "";
			$this->value_izin->HrefValue = "";

			// izinperjam
			$this->izinperjam->LinkCustomAttributes = "";
			$this->izinperjam->HrefValue = "";

			// izinperjamvalue
			$this->izinperjamvalue->LinkCustomAttributes = "";
			$this->izinperjamvalue->HrefValue = "";

			// sakitperjam
			$this->sakitperjam->LinkCustomAttributes = "";
			$this->sakitperjam->HrefValue = "";

			// sakitperjamvalue
			$this->sakitperjamvalue->LinkCustomAttributes = "";
			$this->sakitperjamvalue->HrefValue = "";

			// pulcep
			$this->pulcep->LinkCustomAttributes = "";
			$this->pulcep->HrefValue = "";

			// value_pulcep
			$this->value_pulcep->LinkCustomAttributes = "";
			$this->value_pulcep->HrefValue = "";

			// tidakhadirjam
			$this->tidakhadirjam->LinkCustomAttributes = "";
			$this->tidakhadirjam->HrefValue = "";

			// tidakhadirjamvalue
			$this->tidakhadirjamvalue->LinkCustomAttributes = "";
			$this->tidakhadirjamvalue->HrefValue = "";

			// totalpotongan
			$this->totalpotongan->LinkCustomAttributes = "";
			$this->totalpotongan->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return ($FormError == "");
		if ($this->datetime->Required) {
			if (!$this->datetime->IsDetailKey && $this->datetime->FormValue != NULL && $this->datetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->datetime->caption(), $this->datetime->RequiredErrorMessage));
			}
		}
		if ($this->u_by->Required) {
			if (!$this->u_by->IsDetailKey && $this->u_by->FormValue != NULL && $this->u_by->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->u_by->caption(), $this->u_by->RequiredErrorMessage));
			}
		}
		if ($this->tahun->Required) {
			if (!$this->tahun->IsDetailKey && $this->tahun->FormValue != NULL && $this->tahun->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tahun->caption(), $this->tahun->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->tahun->FormValue)) {
			AddMessage($FormError, $this->tahun->errorMessage());
		}
		if ($this->bulan->Required) {
			if (!$this->bulan->IsDetailKey && $this->bulan->FormValue != NULL && $this->bulan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->bulan->caption(), $this->bulan->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->bulan->FormValue)) {
			AddMessage($FormError, $this->bulan->errorMessage());
		}
		if ($this->nama->Required) {
			if (!$this->nama->IsDetailKey && $this->nama->FormValue != NULL && $this->nama->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nama->caption(), $this->nama->RequiredErrorMessage));
			}
		}
		if ($this->jenjang_id->Required) {
			if (!$this->jenjang_id->IsDetailKey && $this->jenjang_id->FormValue != NULL && $this->jenjang_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->jenjang_id->caption(), $this->jenjang_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->jenjang_id->FormValue)) {
			AddMessage($FormError, $this->jenjang_id->errorMessage());
		}
		if ($this->jabatan_id->Required) {
			if (!$this->jabatan_id->IsDetailKey && $this->jabatan_id->FormValue != NULL && $this->jabatan_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->jabatan_id->caption(), $this->jabatan_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->jabatan_id->FormValue)) {
			AddMessage($FormError, $this->jabatan_id->errorMessage());
		}
		if ($this->sertif->Required) {
			if (!$this->sertif->IsDetailKey && $this->sertif->FormValue != NULL && $this->sertif->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sertif->caption(), $this->sertif->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->sertif->FormValue)) {
			AddMessage($FormError, $this->sertif->errorMessage());
		}
		if ($this->terlambat->Required) {
			if (!$this->terlambat->IsDetailKey && $this->terlambat->FormValue != NULL && $this->terlambat->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->terlambat->caption(), $this->terlambat->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->terlambat->FormValue)) {
			AddMessage($FormError, $this->terlambat->errorMessage());
		}
		if ($this->value_terlambat->Required) {
			if (!$this->value_terlambat->IsDetailKey && $this->value_terlambat->FormValue != NULL && $this->value_terlambat->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->value_terlambat->caption(), $this->value_terlambat->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->value_terlambat->FormValue)) {
			AddMessage($FormError, $this->value_terlambat->errorMessage());
		}
		if ($this->izin->Required) {
			if (!$this->izin->IsDetailKey && $this->izin->FormValue != NULL && $this->izin->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->izin->caption(), $this->izin->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->izin->FormValue)) {
			AddMessage($FormError, $this->izin->errorMessage());
		}
		if ($this->value_izin->Required) {
			if (!$this->value_izin->IsDetailKey && $this->value_izin->FormValue != NULL && $this->value_izin->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->value_izin->caption(), $this->value_izin->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->value_izin->FormValue)) {
			AddMessage($FormError, $this->value_izin->errorMessage());
		}
		if ($this->izinperjam->Required) {
			if (!$this->izinperjam->IsDetailKey && $this->izinperjam->FormValue != NULL && $this->izinperjam->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->izinperjam->caption(), $this->izinperjam->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->izinperjam->FormValue)) {
			AddMessage($FormError, $this->izinperjam->errorMessage());
		}
		if ($this->izinperjamvalue->Required) {
			if (!$this->izinperjamvalue->IsDetailKey && $this->izinperjamvalue->FormValue != NULL && $this->izinperjamvalue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->izinperjamvalue->caption(), $this->izinperjamvalue->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->izinperjamvalue->FormValue)) {
			AddMessage($FormError, $this->izinperjamvalue->errorMessage());
		}
		if ($this->sakitperjam->Required) {
			if (!$this->sakitperjam->IsDetailKey && $this->sakitperjam->FormValue != NULL && $this->sakitperjam->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sakitperjam->caption(), $this->sakitperjam->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->sakitperjam->FormValue)) {
			AddMessage($FormError, $this->sakitperjam->errorMessage());
		}
		if ($this->sakitperjamvalue->Required) {
			if (!$this->sakitperjamvalue->IsDetailKey && $this->sakitperjamvalue->FormValue != NULL && $this->sakitperjamvalue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sakitperjamvalue->caption(), $this->sakitperjamvalue->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->sakitperjamvalue->FormValue)) {
			AddMessage($FormError, $this->sakitperjamvalue->errorMessage());
		}
		if ($this->pulcep->Required) {
			if (!$this->pulcep->IsDetailKey && $this->pulcep->FormValue != NULL && $this->pulcep->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pulcep->caption(), $this->pulcep->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->pulcep->FormValue)) {
			AddMessage($FormError, $this->pulcep->errorMessage());
		}
		if ($this->value_pulcep->Required) {
			if (!$this->value_pulcep->IsDetailKey && $this->value_pulcep->FormValue != NULL && $this->value_pulcep->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->value_pulcep->caption(), $this->value_pulcep->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->value_pulcep->FormValue)) {
			AddMessage($FormError, $this->value_pulcep->errorMessage());
		}
		if ($this->tidakhadirjam->Required) {
			if (!$this->tidakhadirjam->IsDetailKey && $this->tidakhadirjam->FormValue != NULL && $this->tidakhadirjam->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tidakhadirjam->caption(), $this->tidakhadirjam->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->tidakhadirjam->FormValue)) {
			AddMessage($FormError, $this->tidakhadirjam->errorMessage());
		}
		if ($this->tidakhadirjamvalue->Required) {
			if (!$this->tidakhadirjamvalue->IsDetailKey && $this->tidakhadirjamvalue->FormValue != NULL && $this->tidakhadirjamvalue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tidakhadirjamvalue->caption(), $this->tidakhadirjamvalue->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->tidakhadirjamvalue->FormValue)) {
			AddMessage($FormError, $this->tidakhadirjamvalue->errorMessage());
		}
		if ($this->totalpotongan->Required) {
			if (!$this->totalpotongan->IsDetailKey && $this->totalpotongan->FormValue != NULL && $this->totalpotongan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->totalpotongan->caption(), $this->totalpotongan->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->totalpotongan->FormValue)) {
			AddMessage($FormError, $this->totalpotongan->errorMessage());
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError != "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Delete records based on current filter
	protected function deleteRows()
	{
		global $Language, $Security;
		if (!$Security->canDelete()) {
			$this->setFailureMessage($Language->phrase("NoDeletePermission")); // No delete permission
			return FALSE;
		}
		$deleteRows = TRUE;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = "";
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
			$rs->close();
			return FALSE;
		}
		$rows = ($rs) ? $rs->getRows() : [];

		// Clone old rows
		$rsold = $rows;
		if ($rs)
			$rs->close();

		// Call row deleting event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$deleteRows = $this->Row_Deleting($row);
				if (!$deleteRows)
					break;
			}
		}
		if ($deleteRows) {
			$key = "";
			foreach ($rsold as $row) {
				$thisKey = "";
				if ($thisKey != "")
					$thisKey .= Config("COMPOSITE_KEY_SEPARATOR");
				$thisKey .= $row['id'];
				if (Config("DELETE_UPLOADED_FILES")) // Delete old files
					$this->deleteUploadedFiles($row);
				$conn->raiseErrorFn = Config("ERROR_FUNC");
				$deleteRows = $this->delete($row); // Delete
				$conn->raiseErrorFn = "";
				if ($deleteRows === FALSE)
					break;
				if ($key != "")
					$key .= ", ";
				$key .= $thisKey;
			}
		}
		if (!$deleteRows) {

			// Set up error message
			if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage != "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("DeleteCancelled"));
			}
		}

		// Call Row Deleted event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$this->Row_Deleted($row);
			}
		}

		// Write JSON for API request (Support single row only)
		if (IsApi() && $deleteRows) {
			$row = $this->getRecordsFromRecordset($rsold, TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $deleteRows;
	}

	// Update record based on key values
	protected function editRow()
	{
		global $Security, $Language;
		$oldKeyFilter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($oldKeyFilter);
		$conn = $this->getConnection();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = "";
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
			$editRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// datetime
			$this->datetime->CurrentValue = CurrentDateTime();
			$this->datetime->setDbValueDef($rsnew, $this->datetime->CurrentValue, NULL);

			// u_by
			$this->u_by->CurrentValue = CurrentUserID();
			$this->u_by->setDbValueDef($rsnew, $this->u_by->CurrentValue, NULL);

			// tahun
			$this->tahun->setDbValueDef($rsnew, $this->tahun->CurrentValue, NULL, $this->tahun->ReadOnly);

			// bulan
			$this->bulan->setDbValueDef($rsnew, $this->bulan->CurrentValue, NULL, $this->bulan->ReadOnly);

			// nama
			$this->nama->setDbValueDef($rsnew, $this->nama->CurrentValue, NULL, $this->nama->ReadOnly);

			// jenjang_id
			$this->jenjang_id->setDbValueDef($rsnew, $this->jenjang_id->CurrentValue, NULL, $this->jenjang_id->ReadOnly);

			// jabatan_id
			$this->jabatan_id->setDbValueDef($rsnew, $this->jabatan_id->CurrentValue, NULL, $this->jabatan_id->ReadOnly);

			// sertif
			$this->sertif->setDbValueDef($rsnew, $this->sertif->CurrentValue, NULL, $this->sertif->ReadOnly);

			// terlambat
			$this->terlambat->setDbValueDef($rsnew, $this->terlambat->CurrentValue, NULL, $this->terlambat->ReadOnly);

			// value_terlambat
			$this->value_terlambat->setDbValueDef($rsnew, $this->value_terlambat->CurrentValue, NULL, $this->value_terlambat->ReadOnly);

			// izin
			$this->izin->setDbValueDef($rsnew, $this->izin->CurrentValue, NULL, $this->izin->ReadOnly);

			// value_izin
			$this->value_izin->setDbValueDef($rsnew, $this->value_izin->CurrentValue, NULL, $this->value_izin->ReadOnly);

			// izinperjam
			$this->izinperjam->setDbValueDef($rsnew, $this->izinperjam->CurrentValue, NULL, $this->izinperjam->ReadOnly);

			// izinperjamvalue
			$this->izinperjamvalue->setDbValueDef($rsnew, $this->izinperjamvalue->CurrentValue, NULL, $this->izinperjamvalue->ReadOnly);

			// sakitperjam
			$this->sakitperjam->setDbValueDef($rsnew, $this->sakitperjam->CurrentValue, NULL, $this->sakitperjam->ReadOnly);

			// sakitperjamvalue
			$this->sakitperjamvalue->setDbValueDef($rsnew, $this->sakitperjamvalue->CurrentValue, NULL, $this->sakitperjamvalue->ReadOnly);

			// pulcep
			$this->pulcep->setDbValueDef($rsnew, $this->pulcep->CurrentValue, NULL, $this->pulcep->ReadOnly);

			// value_pulcep
			$this->value_pulcep->setDbValueDef($rsnew, $this->value_pulcep->CurrentValue, NULL, $this->value_pulcep->ReadOnly);

			// tidakhadirjam
			$this->tidakhadirjam->setDbValueDef($rsnew, $this->tidakhadirjam->CurrentValue, NULL, $this->tidakhadirjam->ReadOnly);

			// tidakhadirjamvalue
			$this->tidakhadirjamvalue->setDbValueDef($rsnew, $this->tidakhadirjamvalue->CurrentValue, NULL, $this->tidakhadirjamvalue->ReadOnly);

			// totalpotongan
			$this->totalpotongan->setDbValueDef($rsnew, $this->totalpotongan->CurrentValue, NULL, $this->totalpotongan->ReadOnly);

			// Check referential integrity for master table 'm_potongan'
			$validMasterRecord = TRUE;
			$masterFilter = $this->sqlMasterFilter_m_potongan();
			$keyValue = isset($rsnew['pid']) ? $rsnew['pid'] : $rsold['pid'];
			if (strval($keyValue) != "") {
				$masterFilter = str_replace("@id@", AdjustSql($keyValue), $masterFilter);
			} else {
				$validMasterRecord = FALSE;
			}
			$keyValue = isset($rsnew['bulan']) ? $rsnew['bulan'] : $rsold['bulan'];
			if (strval($keyValue) != "") {
				$masterFilter = str_replace("@bulan@", AdjustSql($keyValue), $masterFilter);
			} else {
				$validMasterRecord = FALSE;
			}
			$keyValue = isset($rsnew['tahun']) ? $rsnew['tahun'] : $rsold['tahun'];
			if (strval($keyValue) != "") {
				$masterFilter = str_replace("@tahun@", AdjustSql($keyValue), $masterFilter);
			} else {
				$validMasterRecord = FALSE;
			}
			if ($validMasterRecord) {
				if (!isset($GLOBALS["m_potongan"]))
					$GLOBALS["m_potongan"] = new m_potongan();
				$rsmaster = $GLOBALS["m_potongan"]->loadRs($masterFilter);
				$validMasterRecord = ($rsmaster && !$rsmaster->EOF);
				$rsmaster->close();
			}
			if (!$validMasterRecord) {
				$relatedRecordMsg = str_replace("%t", "m_potongan", $Language->phrase("RelatedRecordRequired"));
				$this->setFailureMessage($relatedRecordMsg);
				$rs->close();
				return FALSE;
			}

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);

			// Check for duplicate key when key changed
			if ($updateRow) {
				$newKeyFilter = $this->getRecordFilter($rsnew);
				if ($newKeyFilter != $oldKeyFilter) {
					$rsChk = $this->loadRs($newKeyFilter);
					if ($rsChk && !$rsChk->EOF) {
						$keyErrMsg = str_replace("%f", $newKeyFilter, $Language->phrase("DupKey"));
						$this->setFailureMessage($keyErrMsg);
						$rsChk->close();
						$updateRow = FALSE;
					}
				}
			}
			if ($updateRow) {
				$conn->raiseErrorFn = Config("ERROR_FUNC");
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = "";
				if ($editRow) {
				}
			} else {
				if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage != "") {
					$this->setFailureMessage($this->CancelMessage);
					$this->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->phrase("UpdateCancelled"));
				}
				$editRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($editRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->close();

		// Clean upload path if any
		if ($editRow) {
		}

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
	}

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;

		// Set up foreign key field value from Session
			if ($this->getCurrentMasterTable() == "m_potongan") {
				$this->pid->CurrentValue = $this->pid->getSessionValue();
				$this->bulan->CurrentValue = $this->bulan->getSessionValue();
				$this->tahun->CurrentValue = $this->tahun->getSessionValue();
			}

		// Check referential integrity for master table 'potongan_tk'
		$validMasterRecord = TRUE;
		$masterFilter = $this->sqlMasterFilter_m_potongan();
		if ($this->pid->getSessionValue() != "") {
			$masterFilter = str_replace("@id@", AdjustSql($this->pid->getSessionValue(), "DB"), $masterFilter);
		} else {
			$validMasterRecord = FALSE;
		}
		if (strval($this->bulan->CurrentValue) != "") {
			$masterFilter = str_replace("@bulan@", AdjustSql($this->bulan->CurrentValue, "DB"), $masterFilter);
		} else {
			$validMasterRecord = FALSE;
		}
		if (strval($this->tahun->CurrentValue) != "") {
			$masterFilter = str_replace("@tahun@", AdjustSql($this->tahun->CurrentValue, "DB"), $masterFilter);
		} else {
			$validMasterRecord = FALSE;
		}
		if ($validMasterRecord) {
			if (!isset($GLOBALS["m_potongan"]))
				$GLOBALS["m_potongan"] = new m_potongan();
			$rsmaster = $GLOBALS["m_potongan"]->loadRs($masterFilter);
			$validMasterRecord = ($rsmaster && !$rsmaster->EOF);
			$rsmaster->close();
		}
		if (!$validMasterRecord) {
			$relatedRecordMsg = str_replace("%t", "m_potongan", $Language->phrase("RelatedRecordRequired"));
			$this->setFailureMessage($relatedRecordMsg);
			return FALSE;
		}
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// datetime
		$this->datetime->CurrentValue = CurrentDateTime();
		$this->datetime->setDbValueDef($rsnew, $this->datetime->CurrentValue, NULL);

		// u_by
		$this->u_by->CurrentValue = CurrentUserID();
		$this->u_by->setDbValueDef($rsnew, $this->u_by->CurrentValue, NULL);

		// tahun
		$this->tahun->setDbValueDef($rsnew, $this->tahun->CurrentValue, NULL, FALSE);

		// bulan
		$this->bulan->setDbValueDef($rsnew, $this->bulan->CurrentValue, NULL, FALSE);

		// nama
		$this->nama->setDbValueDef($rsnew, $this->nama->CurrentValue, NULL, FALSE);

		// jenjang_id
		$this->jenjang_id->setDbValueDef($rsnew, $this->jenjang_id->CurrentValue, NULL, FALSE);

		// jabatan_id
		$this->jabatan_id->setDbValueDef($rsnew, $this->jabatan_id->CurrentValue, NULL, FALSE);

		// sertif
		$this->sertif->setDbValueDef($rsnew, $this->sertif->CurrentValue, NULL, FALSE);

		// terlambat
		$this->terlambat->setDbValueDef($rsnew, $this->terlambat->CurrentValue, NULL, FALSE);

		// value_terlambat
		$this->value_terlambat->setDbValueDef($rsnew, $this->value_terlambat->CurrentValue, NULL, FALSE);

		// izin
		$this->izin->setDbValueDef($rsnew, $this->izin->CurrentValue, NULL, FALSE);

		// value_izin
		$this->value_izin->setDbValueDef($rsnew, $this->value_izin->CurrentValue, NULL, FALSE);

		// izinperjam
		$this->izinperjam->setDbValueDef($rsnew, $this->izinperjam->CurrentValue, NULL, FALSE);

		// izinperjamvalue
		$this->izinperjamvalue->setDbValueDef($rsnew, $this->izinperjamvalue->CurrentValue, NULL, FALSE);

		// sakitperjam
		$this->sakitperjam->setDbValueDef($rsnew, $this->sakitperjam->CurrentValue, NULL, FALSE);

		// sakitperjamvalue
		$this->sakitperjamvalue->setDbValueDef($rsnew, $this->sakitperjamvalue->CurrentValue, NULL, FALSE);

		// pulcep
		$this->pulcep->setDbValueDef($rsnew, $this->pulcep->CurrentValue, NULL, FALSE);

		// value_pulcep
		$this->value_pulcep->setDbValueDef($rsnew, $this->value_pulcep->CurrentValue, NULL, FALSE);

		// tidakhadirjam
		$this->tidakhadirjam->setDbValueDef($rsnew, $this->tidakhadirjam->CurrentValue, NULL, FALSE);

		// tidakhadirjamvalue
		$this->tidakhadirjamvalue->setDbValueDef($rsnew, $this->tidakhadirjamvalue->CurrentValue, NULL, FALSE);

		// totalpotongan
		$this->totalpotongan->setDbValueDef($rsnew, $this->totalpotongan->CurrentValue, NULL, FALSE);

		// pid
		if ($this->pid->getSessionValue() != "") {
			$rsnew['pid'] = $this->pid->getSessionValue();
		}

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = "";
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage != "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("InsertCancelled"));
			}
			$addRow = FALSE;
		}
		if ($addRow) {

			// Call Row Inserted event
			$rs = ($rsold) ? $rsold->fields : NULL;
			$this->Row_Inserted($rs, $rsnew);
		}

		// Clean upload path if any
		if ($addRow) {
		}

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{

		// Hide foreign keys
		$masterTblVar = $this->getCurrentMasterTable();
		if ($masterTblVar == "m_potongan") {
			$this->pid->Visible = FALSE;
			if ($GLOBALS["m_potongan"]->EventCancelled)
				$this->EventCancelled = TRUE;
			$this->bulan->Visible = FALSE;
			if ($GLOBALS["m_potongan"]->EventCancelled)
				$this->EventCancelled = TRUE;
			$this->tahun->Visible = FALSE;
			if ($GLOBALS["m_potongan"]->EventCancelled)
				$this->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
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
				case "x_u_by":
					break;
				case "x_bulan":
					break;
				case "x_nama":
					break;
				case "x_jenjang_id":
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
						case "x_u_by":
							break;
						case "x_bulan":
							break;
						case "x_nama":
							break;
						case "x_jenjang_id":
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
} // End class
?>