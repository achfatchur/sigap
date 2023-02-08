<?php
namespace PHPMaker2020\sigap;

/**
 * Page class
 */
class absen_detil_add extends absen_detil
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}";

	// Table name
	public $TableName = 'absen_detil';

	// Page object name
	public $PageObjName = "absen_detil_add";

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

		// Table object (absen_detil)
		if (!isset($GLOBALS["absen_detil"]) || get_class($GLOBALS["absen_detil"]) == PROJECT_NAMESPACE . "absen_detil") {
			$GLOBALS["absen_detil"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["absen_detil"];
		}

		// Table object (absen)
		if (!isset($GLOBALS['absen']))
			$GLOBALS['absen'] = new absen();

		// Table object (pegawai)
		if (!isset($GLOBALS['pegawai']))
			$GLOBALS['pegawai'] = new pegawai();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'absen_detil');

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
		global $absen_detil;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($absen_detil);
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

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = ["url" => $url, "modal" => "1"];
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "absen_detilview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson($row);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
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
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRecord;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
			if (!$Security->canAdd()) {
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
			if (!$Security->canAdd()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("absen_detillist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->pid->setVisibility();
		$this->date->Visible = FALSE;
		$this->pegawai->setVisibility();
		$this->jenjang->setVisibility();
		$this->masuk->setVisibility();
		$this->absen->setVisibility();
		$this->ijin->setVisibility();
		$this->terlambat->setVisibility();
		$this->sakit->setVisibility();
		$this->pulang_cepat->setVisibility();
		$this->piket->setVisibility();
		$this->inval->setVisibility();
		$this->lembur->setVisibility();
		$this->penyesuaian->setVisibility();
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

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

		// Set up lookup cache
		$this->setupLookupOptions($this->pegawai);
		$this->setupLookupOptions($this->jenjang);

		// Check permission
		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("absen_detillist.php");
			return;
		}

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-add-form ew-horizontal";
		$postBack = FALSE;

		// Set up current action
		if (IsApi()) {
			$this->CurrentAction = "insert"; // Add record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get form action
			$postBack = TRUE;
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$this->setKey("id", $this->id->CurrentValue); // Set up key
			} else {
				$this->setKey("id", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "copy"; // Copy record
			} else {
				$this->CurrentAction = "show"; // Display blank record
			}
		}

		// Load old record / default values
		$loaded = $this->loadOldRecord();

		// Set up master/detail parameters
		// NOTE: must be after loadOldRecord to prevent master key values overwritten

		$this->setupMasterParms();

		// Load form values
		if ($postBack) {
			$this->loadFormValues(); // Load form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues(); // Restore form values
				$this->setFailureMessage($FormError);
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = "show"; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "copy": // Copy an existing record
				if (!$loaded) { // Record not loaded
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("absen_detillist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "absen_detillist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "absen_detilview.php")
						$returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
					if (IsApi()) { // Return to caller
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl);
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Add failed, restore form values
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render row based on row type
		$this->RowType = ROWTYPE_ADD; // Render add type

		// Render row
		$this->resetAttributes();
		$this->renderRow();
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
		$this->pid->CurrentValue = NULL;
		$this->pid->OldValue = $this->pid->CurrentValue;
		$this->date->CurrentValue = NULL;
		$this->date->OldValue = $this->date->CurrentValue;
		$this->pegawai->CurrentValue = NULL;
		$this->pegawai->OldValue = $this->pegawai->CurrentValue;
		$this->jenjang->CurrentValue = NULL;
		$this->jenjang->OldValue = $this->jenjang->CurrentValue;
		$this->masuk->CurrentValue = NULL;
		$this->masuk->OldValue = $this->masuk->CurrentValue;
		$this->absen->CurrentValue = NULL;
		$this->absen->OldValue = $this->absen->CurrentValue;
		$this->ijin->CurrentValue = NULL;
		$this->ijin->OldValue = $this->ijin->CurrentValue;
		$this->terlambat->CurrentValue = NULL;
		$this->terlambat->OldValue = $this->terlambat->CurrentValue;
		$this->sakit->CurrentValue = NULL;
		$this->sakit->OldValue = $this->sakit->CurrentValue;
		$this->pulang_cepat->CurrentValue = NULL;
		$this->pulang_cepat->OldValue = $this->pulang_cepat->CurrentValue;
		$this->piket->CurrentValue = NULL;
		$this->piket->OldValue = $this->piket->CurrentValue;
		$this->inval->CurrentValue = NULL;
		$this->inval->OldValue = $this->inval->CurrentValue;
		$this->lembur->CurrentValue = NULL;
		$this->lembur->OldValue = $this->lembur->CurrentValue;
		$this->penyesuaian->CurrentValue = NULL;
		$this->penyesuaian->OldValue = $this->penyesuaian->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'pid' first before field var 'x_pid'
		$val = $CurrentForm->hasValue("pid") ? $CurrentForm->getValue("pid") : $CurrentForm->getValue("x_pid");
		if (!$this->pid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->pid->Visible = FALSE; // Disable update for API request
			else
				$this->pid->setFormValue($val);
		}

		// Check field name 'pegawai' first before field var 'x_pegawai'
		$val = $CurrentForm->hasValue("pegawai") ? $CurrentForm->getValue("pegawai") : $CurrentForm->getValue("x_pegawai");
		if (!$this->pegawai->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->pegawai->Visible = FALSE; // Disable update for API request
			else
				$this->pegawai->setFormValue($val);
		}

		// Check field name 'jenjang' first before field var 'x_jenjang'
		$val = $CurrentForm->hasValue("jenjang") ? $CurrentForm->getValue("jenjang") : $CurrentForm->getValue("x_jenjang");
		if (!$this->jenjang->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->jenjang->Visible = FALSE; // Disable update for API request
			else
				$this->jenjang->setFormValue($val);
		}

		// Check field name 'masuk' first before field var 'x_masuk'
		$val = $CurrentForm->hasValue("masuk") ? $CurrentForm->getValue("masuk") : $CurrentForm->getValue("x_masuk");
		if (!$this->masuk->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->masuk->Visible = FALSE; // Disable update for API request
			else
				$this->masuk->setFormValue($val);
		}

		// Check field name 'absen' first before field var 'x_absen'
		$val = $CurrentForm->hasValue("absen") ? $CurrentForm->getValue("absen") : $CurrentForm->getValue("x_absen");
		if (!$this->absen->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->absen->Visible = FALSE; // Disable update for API request
			else
				$this->absen->setFormValue($val);
		}

		// Check field name 'ijin' first before field var 'x_ijin'
		$val = $CurrentForm->hasValue("ijin") ? $CurrentForm->getValue("ijin") : $CurrentForm->getValue("x_ijin");
		if (!$this->ijin->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ijin->Visible = FALSE; // Disable update for API request
			else
				$this->ijin->setFormValue($val);
		}

		// Check field name 'terlambat' first before field var 'x_terlambat'
		$val = $CurrentForm->hasValue("terlambat") ? $CurrentForm->getValue("terlambat") : $CurrentForm->getValue("x_terlambat");
		if (!$this->terlambat->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->terlambat->Visible = FALSE; // Disable update for API request
			else
				$this->terlambat->setFormValue($val);
		}

		// Check field name 'sakit' first before field var 'x_sakit'
		$val = $CurrentForm->hasValue("sakit") ? $CurrentForm->getValue("sakit") : $CurrentForm->getValue("x_sakit");
		if (!$this->sakit->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sakit->Visible = FALSE; // Disable update for API request
			else
				$this->sakit->setFormValue($val);
		}

		// Check field name 'pulang_cepat' first before field var 'x_pulang_cepat'
		$val = $CurrentForm->hasValue("pulang_cepat") ? $CurrentForm->getValue("pulang_cepat") : $CurrentForm->getValue("x_pulang_cepat");
		if (!$this->pulang_cepat->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->pulang_cepat->Visible = FALSE; // Disable update for API request
			else
				$this->pulang_cepat->setFormValue($val);
		}

		// Check field name 'piket' first before field var 'x_piket'
		$val = $CurrentForm->hasValue("piket") ? $CurrentForm->getValue("piket") : $CurrentForm->getValue("x_piket");
		if (!$this->piket->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->piket->Visible = FALSE; // Disable update for API request
			else
				$this->piket->setFormValue($val);
		}

		// Check field name 'inval' first before field var 'x_inval'
		$val = $CurrentForm->hasValue("inval") ? $CurrentForm->getValue("inval") : $CurrentForm->getValue("x_inval");
		if (!$this->inval->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->inval->Visible = FALSE; // Disable update for API request
			else
				$this->inval->setFormValue($val);
		}

		// Check field name 'lembur' first before field var 'x_lembur'
		$val = $CurrentForm->hasValue("lembur") ? $CurrentForm->getValue("lembur") : $CurrentForm->getValue("x_lembur");
		if (!$this->lembur->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->lembur->Visible = FALSE; // Disable update for API request
			else
				$this->lembur->setFormValue($val);
		}

		// Check field name 'penyesuaian' first before field var 'x_penyesuaian'
		$val = $CurrentForm->hasValue("penyesuaian") ? $CurrentForm->getValue("penyesuaian") : $CurrentForm->getValue("x_penyesuaian");
		if (!$this->penyesuaian->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->penyesuaian->Visible = FALSE; // Disable update for API request
			else
				$this->penyesuaian->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->pid->CurrentValue = $this->pid->FormValue;
		$this->pegawai->CurrentValue = $this->pegawai->FormValue;
		$this->jenjang->CurrentValue = $this->jenjang->FormValue;
		$this->masuk->CurrentValue = $this->masuk->FormValue;
		$this->absen->CurrentValue = $this->absen->FormValue;
		$this->ijin->CurrentValue = $this->ijin->FormValue;
		$this->terlambat->CurrentValue = $this->terlambat->FormValue;
		$this->sakit->CurrentValue = $this->sakit->FormValue;
		$this->pulang_cepat->CurrentValue = $this->pulang_cepat->FormValue;
		$this->piket->CurrentValue = $this->piket->FormValue;
		$this->inval->CurrentValue = $this->inval->FormValue;
		$this->lembur->CurrentValue = $this->lembur->FormValue;
		$this->penyesuaian->CurrentValue = $this->penyesuaian->FormValue;
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
		$this->date->setDbValue($row['date']);
		$this->pegawai->setDbValue($row['pegawai']);
		$this->jenjang->setDbValue($row['jenjang']);
		$this->masuk->setDbValue($row['masuk']);
		$this->absen->setDbValue($row['absen']);
		$this->ijin->setDbValue($row['ijin']);
		$this->terlambat->setDbValue($row['terlambat']);
		$this->sakit->setDbValue($row['sakit']);
		$this->pulang_cepat->setDbValue($row['pulang_cepat']);
		$this->piket->setDbValue($row['piket']);
		$this->inval->setDbValue($row['inval']);
		$this->lembur->setDbValue($row['lembur']);
		$this->penyesuaian->setDbValue($row['penyesuaian']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['pid'] = $this->pid->CurrentValue;
		$row['date'] = $this->date->CurrentValue;
		$row['pegawai'] = $this->pegawai->CurrentValue;
		$row['jenjang'] = $this->jenjang->CurrentValue;
		$row['masuk'] = $this->masuk->CurrentValue;
		$row['absen'] = $this->absen->CurrentValue;
		$row['ijin'] = $this->ijin->CurrentValue;
		$row['terlambat'] = $this->terlambat->CurrentValue;
		$row['sakit'] = $this->sakit->CurrentValue;
		$row['pulang_cepat'] = $this->pulang_cepat->CurrentValue;
		$row['piket'] = $this->piket->CurrentValue;
		$row['inval'] = $this->inval->CurrentValue;
		$row['lembur'] = $this->lembur->CurrentValue;
		$row['penyesuaian'] = $this->penyesuaian->CurrentValue;
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
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// pid
		// date
		// pegawai
		// jenjang
		// masuk
		// absen
		// ijin
		// terlambat
		// sakit
		// pulang_cepat
		// piket
		// inval
		// lembur
		// penyesuaian

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// pid
			$this->pid->ViewValue = $this->pid->CurrentValue;
			$this->pid->ViewValue = FormatNumber($this->pid->ViewValue, 0, -2, -2, -2);
			$this->pid->ViewCustomAttributes = "";

			// pegawai
			$this->pegawai->ViewValue = $this->pegawai->CurrentValue;
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

			// jenjang
			$this->jenjang->ViewValue = $this->jenjang->CurrentValue;
			$curVal = strval($this->jenjang->CurrentValue);
			if ($curVal != "") {
				$this->jenjang->ViewValue = $this->jenjang->lookupCacheOption($curVal);
				if ($this->jenjang->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`nourut`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->jenjang->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->jenjang->ViewValue = $this->jenjang->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->jenjang->ViewValue = $this->jenjang->CurrentValue;
					}
				}
			} else {
				$this->jenjang->ViewValue = NULL;
			}
			$this->jenjang->ViewCustomAttributes = "";

			// masuk
			$this->masuk->ViewValue = $this->masuk->CurrentValue;
			$this->masuk->ViewValue = FormatNumber($this->masuk->ViewValue, 0, -2, -2, -2);
			$this->masuk->ViewCustomAttributes = "";

			// absen
			$this->absen->ViewValue = $this->absen->CurrentValue;
			$this->absen->ViewValue = FormatNumber($this->absen->ViewValue, 0, -2, -2, -2);
			$this->absen->ViewCustomAttributes = "";

			// ijin
			$this->ijin->ViewValue = $this->ijin->CurrentValue;
			$this->ijin->ViewValue = FormatNumber($this->ijin->ViewValue, 0, -2, -2, -2);
			$this->ijin->ViewCustomAttributes = "";

			// terlambat
			$this->terlambat->ViewValue = $this->terlambat->CurrentValue;
			$this->terlambat->ViewValue = FormatNumber($this->terlambat->ViewValue, 0, -2, -2, -2);
			$this->terlambat->ViewCustomAttributes = "";

			// sakit
			$this->sakit->ViewValue = $this->sakit->CurrentValue;
			$this->sakit->ViewValue = FormatNumber($this->sakit->ViewValue, 0, -2, -2, -2);
			$this->sakit->ViewCustomAttributes = "";

			// pulang_cepat
			$this->pulang_cepat->ViewValue = $this->pulang_cepat->CurrentValue;
			$this->pulang_cepat->ViewValue = FormatNumber($this->pulang_cepat->ViewValue, 0, -2, -2, -2);
			$this->pulang_cepat->ViewCustomAttributes = "";

			// piket
			$this->piket->ViewValue = $this->piket->CurrentValue;
			$this->piket->ViewValue = FormatNumber($this->piket->ViewValue, 0, -2, -2, -2);
			$this->piket->ViewCustomAttributes = "";

			// inval
			$this->inval->ViewValue = $this->inval->CurrentValue;
			$this->inval->ViewValue = FormatNumber($this->inval->ViewValue, 0, -2, -2, -2);
			$this->inval->ViewCustomAttributes = "";

			// lembur
			$this->lembur->ViewValue = $this->lembur->CurrentValue;
			$this->lembur->ViewValue = FormatNumber($this->lembur->ViewValue, 0, -2, -2, -2);
			$this->lembur->ViewCustomAttributes = "";

			// penyesuaian
			$this->penyesuaian->ViewValue = $this->penyesuaian->CurrentValue;
			$this->penyesuaian->ViewValue = FormatNumber($this->penyesuaian->ViewValue, 0, -2, -2, -2);
			$this->penyesuaian->ViewCustomAttributes = "";

			// pid
			$this->pid->LinkCustomAttributes = "";
			$this->pid->HrefValue = "";
			$this->pid->TooltipValue = "";

			// pegawai
			$this->pegawai->LinkCustomAttributes = "";
			$this->pegawai->HrefValue = "";
			$this->pegawai->TooltipValue = "";

			// jenjang
			$this->jenjang->LinkCustomAttributes = "";
			$this->jenjang->HrefValue = "";
			$this->jenjang->TooltipValue = "";

			// masuk
			$this->masuk->LinkCustomAttributes = "";
			$this->masuk->HrefValue = "";
			$this->masuk->TooltipValue = "";

			// absen
			$this->absen->LinkCustomAttributes = "";
			$this->absen->HrefValue = "";
			$this->absen->TooltipValue = "";

			// ijin
			$this->ijin->LinkCustomAttributes = "";
			$this->ijin->HrefValue = "";
			$this->ijin->TooltipValue = "";

			// terlambat
			$this->terlambat->LinkCustomAttributes = "";
			$this->terlambat->HrefValue = "";
			$this->terlambat->TooltipValue = "";

			// sakit
			$this->sakit->LinkCustomAttributes = "";
			$this->sakit->HrefValue = "";
			$this->sakit->TooltipValue = "";

			// pulang_cepat
			$this->pulang_cepat->LinkCustomAttributes = "";
			$this->pulang_cepat->HrefValue = "";
			$this->pulang_cepat->TooltipValue = "";

			// piket
			$this->piket->LinkCustomAttributes = "";
			$this->piket->HrefValue = "";
			$this->piket->TooltipValue = "";

			// inval
			$this->inval->LinkCustomAttributes = "";
			$this->inval->HrefValue = "";
			$this->inval->TooltipValue = "";

			// lembur
			$this->lembur->LinkCustomAttributes = "";
			$this->lembur->HrefValue = "";
			$this->lembur->TooltipValue = "";

			// penyesuaian
			$this->penyesuaian->LinkCustomAttributes = "";
			$this->penyesuaian->HrefValue = "";
			$this->penyesuaian->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// pid
			$this->pid->EditAttrs["class"] = "form-control";
			$this->pid->EditCustomAttributes = "";
			if ($this->pid->getSessionValue() != "") {
				$this->pid->CurrentValue = $this->pid->getSessionValue();
				$this->pid->ViewValue = $this->pid->CurrentValue;
				$this->pid->ViewValue = FormatNumber($this->pid->ViewValue, 0, -2, -2, -2);
				$this->pid->ViewCustomAttributes = "";
			} else {
				$this->pid->EditValue = HtmlEncode($this->pid->CurrentValue);
				$this->pid->PlaceHolder = RemoveHtml($this->pid->caption());
			}

			// pegawai
			$this->pegawai->EditAttrs["class"] = "form-control";
			$this->pegawai->EditCustomAttributes = "";
			if (!$this->pegawai->Raw)
				$this->pegawai->CurrentValue = HtmlDecode($this->pegawai->CurrentValue);
			$this->pegawai->EditValue = HtmlEncode($this->pegawai->CurrentValue);
			$curVal = strval($this->pegawai->CurrentValue);
			if ($curVal != "") {
				$this->pegawai->EditValue = $this->pegawai->lookupCacheOption($curVal);
				if ($this->pegawai->EditValue === NULL) { // Lookup from database
					$filterWrk = "`nip`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->pegawai->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->pegawai->EditValue = $this->pegawai->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->pegawai->EditValue = HtmlEncode($this->pegawai->CurrentValue);
					}
				}
			} else {
				$this->pegawai->EditValue = NULL;
			}
			$this->pegawai->PlaceHolder = RemoveHtml($this->pegawai->caption());

			// jenjang
			$this->jenjang->EditAttrs["class"] = "form-control";
			$this->jenjang->EditCustomAttributes = "";
			$this->jenjang->EditValue = HtmlEncode($this->jenjang->CurrentValue);
			$curVal = strval($this->jenjang->CurrentValue);
			if ($curVal != "") {
				$this->jenjang->EditValue = $this->jenjang->lookupCacheOption($curVal);
				if ($this->jenjang->EditValue === NULL) { // Lookup from database
					$filterWrk = "`nourut`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->jenjang->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->jenjang->EditValue = $this->jenjang->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->jenjang->EditValue = HtmlEncode($this->jenjang->CurrentValue);
					}
				}
			} else {
				$this->jenjang->EditValue = NULL;
			}
			$this->jenjang->PlaceHolder = RemoveHtml($this->jenjang->caption());

			// masuk
			$this->masuk->EditAttrs["class"] = "form-control";
			$this->masuk->EditCustomAttributes = "";
			$this->masuk->EditValue = HtmlEncode($this->masuk->CurrentValue);
			$this->masuk->PlaceHolder = RemoveHtml($this->masuk->caption());

			// absen
			$this->absen->EditAttrs["class"] = "form-control";
			$this->absen->EditCustomAttributes = "";
			$this->absen->EditValue = HtmlEncode($this->absen->CurrentValue);
			$this->absen->PlaceHolder = RemoveHtml($this->absen->caption());

			// ijin
			$this->ijin->EditAttrs["class"] = "form-control";
			$this->ijin->EditCustomAttributes = "";
			$this->ijin->EditValue = HtmlEncode($this->ijin->CurrentValue);
			$this->ijin->PlaceHolder = RemoveHtml($this->ijin->caption());

			// terlambat
			$this->terlambat->EditAttrs["class"] = "form-control";
			$this->terlambat->EditCustomAttributes = "";
			$this->terlambat->EditValue = HtmlEncode($this->terlambat->CurrentValue);
			$this->terlambat->PlaceHolder = RemoveHtml($this->terlambat->caption());

			// sakit
			$this->sakit->EditAttrs["class"] = "form-control";
			$this->sakit->EditCustomAttributes = "";
			$this->sakit->EditValue = HtmlEncode($this->sakit->CurrentValue);
			$this->sakit->PlaceHolder = RemoveHtml($this->sakit->caption());

			// pulang_cepat
			$this->pulang_cepat->EditAttrs["class"] = "form-control";
			$this->pulang_cepat->EditCustomAttributes = "";
			$this->pulang_cepat->EditValue = HtmlEncode($this->pulang_cepat->CurrentValue);
			$this->pulang_cepat->PlaceHolder = RemoveHtml($this->pulang_cepat->caption());

			// piket
			$this->piket->EditAttrs["class"] = "form-control";
			$this->piket->EditCustomAttributes = "";
			$this->piket->EditValue = HtmlEncode($this->piket->CurrentValue);
			$this->piket->PlaceHolder = RemoveHtml($this->piket->caption());

			// inval
			$this->inval->EditAttrs["class"] = "form-control";
			$this->inval->EditCustomAttributes = "";
			$this->inval->EditValue = HtmlEncode($this->inval->CurrentValue);
			$this->inval->PlaceHolder = RemoveHtml($this->inval->caption());

			// lembur
			$this->lembur->EditAttrs["class"] = "form-control";
			$this->lembur->EditCustomAttributes = "";
			$this->lembur->EditValue = HtmlEncode($this->lembur->CurrentValue);
			$this->lembur->PlaceHolder = RemoveHtml($this->lembur->caption());

			// penyesuaian
			$this->penyesuaian->EditAttrs["class"] = "form-control";
			$this->penyesuaian->EditCustomAttributes = "";
			$this->penyesuaian->EditValue = HtmlEncode($this->penyesuaian->CurrentValue);
			$this->penyesuaian->PlaceHolder = RemoveHtml($this->penyesuaian->caption());

			// Add refer script
			// pid

			$this->pid->LinkCustomAttributes = "";
			$this->pid->HrefValue = "";

			// pegawai
			$this->pegawai->LinkCustomAttributes = "";
			$this->pegawai->HrefValue = "";

			// jenjang
			$this->jenjang->LinkCustomAttributes = "";
			$this->jenjang->HrefValue = "";

			// masuk
			$this->masuk->LinkCustomAttributes = "";
			$this->masuk->HrefValue = "";

			// absen
			$this->absen->LinkCustomAttributes = "";
			$this->absen->HrefValue = "";

			// ijin
			$this->ijin->LinkCustomAttributes = "";
			$this->ijin->HrefValue = "";

			// terlambat
			$this->terlambat->LinkCustomAttributes = "";
			$this->terlambat->HrefValue = "";

			// sakit
			$this->sakit->LinkCustomAttributes = "";
			$this->sakit->HrefValue = "";

			// pulang_cepat
			$this->pulang_cepat->LinkCustomAttributes = "";
			$this->pulang_cepat->HrefValue = "";

			// piket
			$this->piket->LinkCustomAttributes = "";
			$this->piket->HrefValue = "";

			// inval
			$this->inval->LinkCustomAttributes = "";
			$this->inval->HrefValue = "";

			// lembur
			$this->lembur->LinkCustomAttributes = "";
			$this->lembur->HrefValue = "";

			// penyesuaian
			$this->penyesuaian->LinkCustomAttributes = "";
			$this->penyesuaian->HrefValue = "";
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

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return ($FormError == "");
		if ($this->pid->Required) {
			if (!$this->pid->IsDetailKey && $this->pid->FormValue != NULL && $this->pid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pid->caption(), $this->pid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->pid->FormValue)) {
			AddMessage($FormError, $this->pid->errorMessage());
		}
		if ($this->pegawai->Required) {
			if (!$this->pegawai->IsDetailKey && $this->pegawai->FormValue != NULL && $this->pegawai->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pegawai->caption(), $this->pegawai->RequiredErrorMessage));
			}
		}
		if ($this->jenjang->Required) {
			if (!$this->jenjang->IsDetailKey && $this->jenjang->FormValue != NULL && $this->jenjang->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->jenjang->caption(), $this->jenjang->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->jenjang->FormValue)) {
			AddMessage($FormError, $this->jenjang->errorMessage());
		}
		if ($this->masuk->Required) {
			if (!$this->masuk->IsDetailKey && $this->masuk->FormValue != NULL && $this->masuk->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->masuk->caption(), $this->masuk->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->masuk->FormValue)) {
			AddMessage($FormError, $this->masuk->errorMessage());
		}
		if ($this->absen->Required) {
			if (!$this->absen->IsDetailKey && $this->absen->FormValue != NULL && $this->absen->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->absen->caption(), $this->absen->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->absen->FormValue)) {
			AddMessage($FormError, $this->absen->errorMessage());
		}
		if ($this->ijin->Required) {
			if (!$this->ijin->IsDetailKey && $this->ijin->FormValue != NULL && $this->ijin->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ijin->caption(), $this->ijin->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->ijin->FormValue)) {
			AddMessage($FormError, $this->ijin->errorMessage());
		}
		if ($this->terlambat->Required) {
			if (!$this->terlambat->IsDetailKey && $this->terlambat->FormValue != NULL && $this->terlambat->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->terlambat->caption(), $this->terlambat->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->terlambat->FormValue)) {
			AddMessage($FormError, $this->terlambat->errorMessage());
		}
		if ($this->sakit->Required) {
			if (!$this->sakit->IsDetailKey && $this->sakit->FormValue != NULL && $this->sakit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sakit->caption(), $this->sakit->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->sakit->FormValue)) {
			AddMessage($FormError, $this->sakit->errorMessage());
		}
		if ($this->pulang_cepat->Required) {
			if (!$this->pulang_cepat->IsDetailKey && $this->pulang_cepat->FormValue != NULL && $this->pulang_cepat->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pulang_cepat->caption(), $this->pulang_cepat->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->pulang_cepat->FormValue)) {
			AddMessage($FormError, $this->pulang_cepat->errorMessage());
		}
		if ($this->piket->Required) {
			if (!$this->piket->IsDetailKey && $this->piket->FormValue != NULL && $this->piket->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->piket->caption(), $this->piket->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->piket->FormValue)) {
			AddMessage($FormError, $this->piket->errorMessage());
		}
		if ($this->inval->Required) {
			if (!$this->inval->IsDetailKey && $this->inval->FormValue != NULL && $this->inval->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->inval->caption(), $this->inval->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->inval->FormValue)) {
			AddMessage($FormError, $this->inval->errorMessage());
		}
		if ($this->lembur->Required) {
			if (!$this->lembur->IsDetailKey && $this->lembur->FormValue != NULL && $this->lembur->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->lembur->caption(), $this->lembur->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->lembur->FormValue)) {
			AddMessage($FormError, $this->lembur->errorMessage());
		}
		if ($this->penyesuaian->Required) {
			if (!$this->penyesuaian->IsDetailKey && $this->penyesuaian->FormValue != NULL && $this->penyesuaian->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->penyesuaian->caption(), $this->penyesuaian->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->penyesuaian->FormValue)) {
			AddMessage($FormError, $this->penyesuaian->errorMessage());
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

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;

		// Check referential integrity for master table 'absen_detil'
		$validMasterRecord = TRUE;
		$masterFilter = $this->sqlMasterFilter_absen();
		if (strval($this->pid->CurrentValue) != "") {
			$masterFilter = str_replace("@id@", AdjustSql($this->pid->CurrentValue, "DB"), $masterFilter);
		} else {
			$validMasterRecord = FALSE;
		}
		if ($validMasterRecord) {
			if (!isset($GLOBALS["absen"]))
				$GLOBALS["absen"] = new absen();
			$rsmaster = $GLOBALS["absen"]->loadRs($masterFilter);
			$validMasterRecord = ($rsmaster && !$rsmaster->EOF);
			$rsmaster->close();
		}
		if (!$validMasterRecord) {
			$relatedRecordMsg = str_replace("%t", "absen", $Language->phrase("RelatedRecordRequired"));
			$this->setFailureMessage($relatedRecordMsg);
			return FALSE;
		}
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// pid
		$this->pid->setDbValueDef($rsnew, $this->pid->CurrentValue, NULL, FALSE);

		// pegawai
		$this->pegawai->setDbValueDef($rsnew, $this->pegawai->CurrentValue, NULL, FALSE);

		// jenjang
		$this->jenjang->setDbValueDef($rsnew, $this->jenjang->CurrentValue, NULL, FALSE);

		// masuk
		$this->masuk->setDbValueDef($rsnew, $this->masuk->CurrentValue, NULL, FALSE);

		// absen
		$this->absen->setDbValueDef($rsnew, $this->absen->CurrentValue, NULL, FALSE);

		// ijin
		$this->ijin->setDbValueDef($rsnew, $this->ijin->CurrentValue, NULL, FALSE);

		// terlambat
		$this->terlambat->setDbValueDef($rsnew, $this->terlambat->CurrentValue, NULL, FALSE);

		// sakit
		$this->sakit->setDbValueDef($rsnew, $this->sakit->CurrentValue, NULL, FALSE);

		// pulang_cepat
		$this->pulang_cepat->setDbValueDef($rsnew, $this->pulang_cepat->CurrentValue, NULL, FALSE);

		// piket
		$this->piket->setDbValueDef($rsnew, $this->piket->CurrentValue, NULL, FALSE);

		// inval
		$this->inval->setDbValueDef($rsnew, $this->inval->CurrentValue, NULL, FALSE);

		// lembur
		$this->lembur->setDbValueDef($rsnew, $this->lembur->CurrentValue, NULL, FALSE);

		// penyesuaian
		$this->penyesuaian->setDbValueDef($rsnew, $this->penyesuaian->CurrentValue, NULL, FALSE);

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
		$validMaster = FALSE;

		// Get the keys for master table
		if (($master = Get(Config("TABLE_SHOW_MASTER"), Get(Config("TABLE_MASTER")))) !== NULL) {
			$masterTblVar = $master;
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "absen") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id", Get("pid"))) !== NULL) {
					$GLOBALS["absen"]->id->setQueryStringValue($parm);
					$this->pid->setQueryStringValue($GLOBALS["absen"]->id->QueryStringValue);
					$this->pid->setSessionValue($this->pid->QueryStringValue);
					if (!is_numeric($GLOBALS["absen"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		} elseif (($master = Post(Config("TABLE_SHOW_MASTER"), Post(Config("TABLE_MASTER")))) !== NULL) {
			$masterTblVar = $master;
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "absen") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id", Post("pid"))) !== NULL) {
					$GLOBALS["absen"]->id->setFormValue($parm);
					$this->pid->setFormValue($GLOBALS["absen"]->id->FormValue);
					$this->pid->setSessionValue($this->pid->FormValue);
					if (!is_numeric($GLOBALS["absen"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRecord = 1;
				$this->setStartRecordNumber($this->StartRecord);
			}

			// Clear previous master key from Session
			if ($masterTblVar != "absen") {
				if ($this->pid->CurrentValue == "")
					$this->pid->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("absen_detillist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
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
				case "x_pegawai":
					break;
				case "x_jenjang":
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
						case "x_pegawai":
							break;
						case "x_jenjang":
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
} // End class
?>