<?php
namespace PHPMaker2020\sigap;

/**
 * Page class
 */
class gaji_tu_sma_add extends gaji_tu_sma
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}";

	// Table name
	public $TableName = 'gaji_tu_sma';

	// Page object name
	public $PageObjName = "gaji_tu_sma_add";

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

		// Table object (gaji_tu_sma)
		if (!isset($GLOBALS["gaji_tu_sma"]) || get_class($GLOBALS["gaji_tu_sma"]) == PROJECT_NAMESPACE . "gaji_tu_sma") {
			$GLOBALS["gaji_tu_sma"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["gaji_tu_sma"];
		}

		// Table object (m_tu_sma)
		if (!isset($GLOBALS['m_tu_sma']))
			$GLOBALS['m_tu_sma'] = new m_tu_sma();

		// Table object (pegawai)
		if (!isset($GLOBALS['pegawai']))
			$GLOBALS['pegawai'] = new pegawai();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'gaji_tu_sma');

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
		global $gaji_tu_sma;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($gaji_tu_sma);
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
					if ($pageName == "gaji_tu_smaview.php")
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
					$this->terminate(GetUrl("gaji_tu_smalist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->datetime->Visible = FALSE;
		$this->month->Visible = FALSE;
		$this->pid->Visible = FALSE;
		$this->tahun->setVisibility();
		$this->bulan->setVisibility();
		$this->pegawai->setVisibility();
		$this->jenjang_id->setVisibility();
		$this->jabatan_id->setVisibility();
		$this->type_jabatan->setVisibility();
		$this->tambahan->setVisibility();
		$this->ijasah->setVisibility();
		$this->sertif->setVisibility();
		$this->lama_kerja->setVisibility();
		$this->gapok->setVisibility();
		$this->kehadiran->setVisibility();
		$this->value_kehadiran->setVisibility();
		$this->lembur->setVisibility();
		$this->value_lembur->setVisibility();
		$this->value_reward->setVisibility();
		$this->value_inval->Visible = FALSE;
		$this->piket_count->setVisibility();
		$this->value_piket->setVisibility();
		$this->tugastambahan->setVisibility();
		$this->tj_jabatan->Visible = FALSE;
		$this->tunjangan2->Visible = FALSE;
		$this->potongan->setVisibility();
		$this->sub_total->setVisibility();
		$this->penyesuaian->setVisibility();
		$this->total->setVisibility();
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
		$this->setupLookupOptions($this->bulan);
		$this->setupLookupOptions($this->pegawai);
		$this->setupLookupOptions($this->jenjang_id);
		$this->setupLookupOptions($this->jabatan_id);
		$this->setupLookupOptions($this->type_jabatan);
		$this->setupLookupOptions($this->tambahan);
		$this->setupLookupOptions($this->ijasah);
		$this->setupLookupOptions($this->sertif);

		// Check permission
		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("gaji_tu_smalist.php");
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
					$this->terminate("gaji_tu_smalist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "gaji_tu_smalist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "gaji_tu_smaview.php")
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
		$this->datetime->CurrentValue = NULL;
		$this->datetime->OldValue = $this->datetime->CurrentValue;
		$this->month->CurrentValue = NULL;
		$this->month->OldValue = $this->month->CurrentValue;
		$this->pid->CurrentValue = NULL;
		$this->pid->OldValue = $this->pid->CurrentValue;
		$this->tahun->CurrentValue = NULL;
		$this->tahun->OldValue = $this->tahun->CurrentValue;
		$this->bulan->CurrentValue = NULL;
		$this->bulan->OldValue = $this->bulan->CurrentValue;
		$this->pegawai->CurrentValue = NULL;
		$this->pegawai->OldValue = $this->pegawai->CurrentValue;
		$this->jenjang_id->CurrentValue = NULL;
		$this->jenjang_id->OldValue = $this->jenjang_id->CurrentValue;
		$this->jabatan_id->CurrentValue = NULL;
		$this->jabatan_id->OldValue = $this->jabatan_id->CurrentValue;
		$this->type_jabatan->CurrentValue = NULL;
		$this->type_jabatan->OldValue = $this->type_jabatan->CurrentValue;
		$this->tambahan->CurrentValue = NULL;
		$this->tambahan->OldValue = $this->tambahan->CurrentValue;
		$this->ijasah->CurrentValue = NULL;
		$this->ijasah->OldValue = $this->ijasah->CurrentValue;
		$this->sertif->CurrentValue = NULL;
		$this->sertif->OldValue = $this->sertif->CurrentValue;
		$this->lama_kerja->CurrentValue = NULL;
		$this->lama_kerja->OldValue = $this->lama_kerja->CurrentValue;
		$this->gapok->CurrentValue = NULL;
		$this->gapok->OldValue = $this->gapok->CurrentValue;
		$this->kehadiran->CurrentValue = NULL;
		$this->kehadiran->OldValue = $this->kehadiran->CurrentValue;
		$this->value_kehadiran->CurrentValue = NULL;
		$this->value_kehadiran->OldValue = $this->value_kehadiran->CurrentValue;
		$this->lembur->CurrentValue = NULL;
		$this->lembur->OldValue = $this->lembur->CurrentValue;
		$this->value_lembur->CurrentValue = NULL;
		$this->value_lembur->OldValue = $this->value_lembur->CurrentValue;
		$this->value_reward->CurrentValue = NULL;
		$this->value_reward->OldValue = $this->value_reward->CurrentValue;
		$this->value_inval->CurrentValue = NULL;
		$this->value_inval->OldValue = $this->value_inval->CurrentValue;
		$this->piket_count->CurrentValue = NULL;
		$this->piket_count->OldValue = $this->piket_count->CurrentValue;
		$this->value_piket->CurrentValue = NULL;
		$this->value_piket->OldValue = $this->value_piket->CurrentValue;
		$this->tugastambahan->CurrentValue = NULL;
		$this->tugastambahan->OldValue = $this->tugastambahan->CurrentValue;
		$this->tj_jabatan->CurrentValue = NULL;
		$this->tj_jabatan->OldValue = $this->tj_jabatan->CurrentValue;
		$this->tunjangan2->CurrentValue = NULL;
		$this->tunjangan2->OldValue = $this->tunjangan2->CurrentValue;
		$this->potongan->CurrentValue = NULL;
		$this->potongan->OldValue = $this->potongan->CurrentValue;
		$this->sub_total->CurrentValue = NULL;
		$this->sub_total->OldValue = $this->sub_total->CurrentValue;
		$this->penyesuaian->CurrentValue = NULL;
		$this->penyesuaian->OldValue = $this->penyesuaian->CurrentValue;
		$this->total->CurrentValue = NULL;
		$this->total->OldValue = $this->total->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'tahun' first before field var 'x_tahun'
		$val = $CurrentForm->hasValue("tahun") ? $CurrentForm->getValue("tahun") : $CurrentForm->getValue("x_tahun");
		if (!$this->tahun->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tahun->Visible = FALSE; // Disable update for API request
			else
				$this->tahun->setFormValue($val);
		}

		// Check field name 'bulan' first before field var 'x_bulan'
		$val = $CurrentForm->hasValue("bulan") ? $CurrentForm->getValue("bulan") : $CurrentForm->getValue("x_bulan");
		if (!$this->bulan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->bulan->Visible = FALSE; // Disable update for API request
			else
				$this->bulan->setFormValue($val);
		}

		// Check field name 'pegawai' first before field var 'x_pegawai'
		$val = $CurrentForm->hasValue("pegawai") ? $CurrentForm->getValue("pegawai") : $CurrentForm->getValue("x_pegawai");
		if (!$this->pegawai->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->pegawai->Visible = FALSE; // Disable update for API request
			else
				$this->pegawai->setFormValue($val);
		}

		// Check field name 'jenjang_id' first before field var 'x_jenjang_id'
		$val = $CurrentForm->hasValue("jenjang_id") ? $CurrentForm->getValue("jenjang_id") : $CurrentForm->getValue("x_jenjang_id");
		if (!$this->jenjang_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->jenjang_id->Visible = FALSE; // Disable update for API request
			else
				$this->jenjang_id->setFormValue($val);
		}

		// Check field name 'jabatan_id' first before field var 'x_jabatan_id'
		$val = $CurrentForm->hasValue("jabatan_id") ? $CurrentForm->getValue("jabatan_id") : $CurrentForm->getValue("x_jabatan_id");
		if (!$this->jabatan_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->jabatan_id->Visible = FALSE; // Disable update for API request
			else
				$this->jabatan_id->setFormValue($val);
		}

		// Check field name 'type_jabatan' first before field var 'x_type_jabatan'
		$val = $CurrentForm->hasValue("type_jabatan") ? $CurrentForm->getValue("type_jabatan") : $CurrentForm->getValue("x_type_jabatan");
		if (!$this->type_jabatan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->type_jabatan->Visible = FALSE; // Disable update for API request
			else
				$this->type_jabatan->setFormValue($val);
		}

		// Check field name 'tambahan' first before field var 'x_tambahan'
		$val = $CurrentForm->hasValue("tambahan") ? $CurrentForm->getValue("tambahan") : $CurrentForm->getValue("x_tambahan");
		if (!$this->tambahan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tambahan->Visible = FALSE; // Disable update for API request
			else
				$this->tambahan->setFormValue($val);
		}

		// Check field name 'ijasah' first before field var 'x_ijasah'
		$val = $CurrentForm->hasValue("ijasah") ? $CurrentForm->getValue("ijasah") : $CurrentForm->getValue("x_ijasah");
		if (!$this->ijasah->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ijasah->Visible = FALSE; // Disable update for API request
			else
				$this->ijasah->setFormValue($val);
		}

		// Check field name 'sertif' first before field var 'x_sertif'
		$val = $CurrentForm->hasValue("sertif") ? $CurrentForm->getValue("sertif") : $CurrentForm->getValue("x_sertif");
		if (!$this->sertif->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sertif->Visible = FALSE; // Disable update for API request
			else
				$this->sertif->setFormValue($val);
		}

		// Check field name 'lama_kerja' first before field var 'x_lama_kerja'
		$val = $CurrentForm->hasValue("lama_kerja") ? $CurrentForm->getValue("lama_kerja") : $CurrentForm->getValue("x_lama_kerja");
		if (!$this->lama_kerja->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->lama_kerja->Visible = FALSE; // Disable update for API request
			else
				$this->lama_kerja->setFormValue($val);
		}

		// Check field name 'gapok' first before field var 'x_gapok'
		$val = $CurrentForm->hasValue("gapok") ? $CurrentForm->getValue("gapok") : $CurrentForm->getValue("x_gapok");
		if (!$this->gapok->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->gapok->Visible = FALSE; // Disable update for API request
			else
				$this->gapok->setFormValue($val);
		}

		// Check field name 'kehadiran' first before field var 'x_kehadiran'
		$val = $CurrentForm->hasValue("kehadiran") ? $CurrentForm->getValue("kehadiran") : $CurrentForm->getValue("x_kehadiran");
		if (!$this->kehadiran->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->kehadiran->Visible = FALSE; // Disable update for API request
			else
				$this->kehadiran->setFormValue($val);
		}

		// Check field name 'value_kehadiran' first before field var 'x_value_kehadiran'
		$val = $CurrentForm->hasValue("value_kehadiran") ? $CurrentForm->getValue("value_kehadiran") : $CurrentForm->getValue("x_value_kehadiran");
		if (!$this->value_kehadiran->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->value_kehadiran->Visible = FALSE; // Disable update for API request
			else
				$this->value_kehadiran->setFormValue($val);
		}

		// Check field name 'lembur' first before field var 'x_lembur'
		$val = $CurrentForm->hasValue("lembur") ? $CurrentForm->getValue("lembur") : $CurrentForm->getValue("x_lembur");
		if (!$this->lembur->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->lembur->Visible = FALSE; // Disable update for API request
			else
				$this->lembur->setFormValue($val);
		}

		// Check field name 'value_lembur' first before field var 'x_value_lembur'
		$val = $CurrentForm->hasValue("value_lembur") ? $CurrentForm->getValue("value_lembur") : $CurrentForm->getValue("x_value_lembur");
		if (!$this->value_lembur->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->value_lembur->Visible = FALSE; // Disable update for API request
			else
				$this->value_lembur->setFormValue($val);
		}

		// Check field name 'value_reward' first before field var 'x_value_reward'
		$val = $CurrentForm->hasValue("value_reward") ? $CurrentForm->getValue("value_reward") : $CurrentForm->getValue("x_value_reward");
		if (!$this->value_reward->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->value_reward->Visible = FALSE; // Disable update for API request
			else
				$this->value_reward->setFormValue($val);
		}

		// Check field name 'piket_count' first before field var 'x_piket_count'
		$val = $CurrentForm->hasValue("piket_count") ? $CurrentForm->getValue("piket_count") : $CurrentForm->getValue("x_piket_count");
		if (!$this->piket_count->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->piket_count->Visible = FALSE; // Disable update for API request
			else
				$this->piket_count->setFormValue($val);
		}

		// Check field name 'value_piket' first before field var 'x_value_piket'
		$val = $CurrentForm->hasValue("value_piket") ? $CurrentForm->getValue("value_piket") : $CurrentForm->getValue("x_value_piket");
		if (!$this->value_piket->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->value_piket->Visible = FALSE; // Disable update for API request
			else
				$this->value_piket->setFormValue($val);
		}

		// Check field name 'tugastambahan' first before field var 'x_tugastambahan'
		$val = $CurrentForm->hasValue("tugastambahan") ? $CurrentForm->getValue("tugastambahan") : $CurrentForm->getValue("x_tugastambahan");
		if (!$this->tugastambahan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tugastambahan->Visible = FALSE; // Disable update for API request
			else
				$this->tugastambahan->setFormValue($val);
		}

		// Check field name 'potongan' first before field var 'x_potongan'
		$val = $CurrentForm->hasValue("potongan") ? $CurrentForm->getValue("potongan") : $CurrentForm->getValue("x_potongan");
		if (!$this->potongan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->potongan->Visible = FALSE; // Disable update for API request
			else
				$this->potongan->setFormValue($val);
		}

		// Check field name 'sub_total' first before field var 'x_sub_total'
		$val = $CurrentForm->hasValue("sub_total") ? $CurrentForm->getValue("sub_total") : $CurrentForm->getValue("x_sub_total");
		if (!$this->sub_total->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sub_total->Visible = FALSE; // Disable update for API request
			else
				$this->sub_total->setFormValue($val);
		}

		// Check field name 'penyesuaian' first before field var 'x_penyesuaian'
		$val = $CurrentForm->hasValue("penyesuaian") ? $CurrentForm->getValue("penyesuaian") : $CurrentForm->getValue("x_penyesuaian");
		if (!$this->penyesuaian->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->penyesuaian->Visible = FALSE; // Disable update for API request
			else
				$this->penyesuaian->setFormValue($val);
		}

		// Check field name 'total' first before field var 'x_total'
		$val = $CurrentForm->hasValue("total") ? $CurrentForm->getValue("total") : $CurrentForm->getValue("x_total");
		if (!$this->total->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->total->Visible = FALSE; // Disable update for API request
			else
				$this->total->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->tahun->CurrentValue = $this->tahun->FormValue;
		$this->bulan->CurrentValue = $this->bulan->FormValue;
		$this->pegawai->CurrentValue = $this->pegawai->FormValue;
		$this->jenjang_id->CurrentValue = $this->jenjang_id->FormValue;
		$this->jabatan_id->CurrentValue = $this->jabatan_id->FormValue;
		$this->type_jabatan->CurrentValue = $this->type_jabatan->FormValue;
		$this->tambahan->CurrentValue = $this->tambahan->FormValue;
		$this->ijasah->CurrentValue = $this->ijasah->FormValue;
		$this->sertif->CurrentValue = $this->sertif->FormValue;
		$this->lama_kerja->CurrentValue = $this->lama_kerja->FormValue;
		$this->gapok->CurrentValue = $this->gapok->FormValue;
		$this->kehadiran->CurrentValue = $this->kehadiran->FormValue;
		$this->value_kehadiran->CurrentValue = $this->value_kehadiran->FormValue;
		$this->lembur->CurrentValue = $this->lembur->FormValue;
		$this->value_lembur->CurrentValue = $this->value_lembur->FormValue;
		$this->value_reward->CurrentValue = $this->value_reward->FormValue;
		$this->piket_count->CurrentValue = $this->piket_count->FormValue;
		$this->value_piket->CurrentValue = $this->value_piket->FormValue;
		$this->tugastambahan->CurrentValue = $this->tugastambahan->FormValue;
		$this->potongan->CurrentValue = $this->potongan->FormValue;
		$this->sub_total->CurrentValue = $this->sub_total->FormValue;
		$this->penyesuaian->CurrentValue = $this->penyesuaian->FormValue;
		$this->total->CurrentValue = $this->total->FormValue;
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
		$this->month->setDbValue($row['month']);
		$this->pid->setDbValue($row['pid']);
		$this->tahun->setDbValue($row['tahun']);
		$this->bulan->setDbValue($row['bulan']);
		$this->pegawai->setDbValue($row['pegawai']);
		$this->jenjang_id->setDbValue($row['jenjang_id']);
		$this->jabatan_id->setDbValue($row['jabatan_id']);
		$this->type_jabatan->setDbValue($row['type_jabatan']);
		$this->tambahan->setDbValue($row['tambahan']);
		$this->ijasah->setDbValue($row['ijasah']);
		$this->sertif->setDbValue($row['sertif']);
		$this->lama_kerja->setDbValue($row['lama_kerja']);
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
		$this->potongan->setDbValue($row['potongan']);
		$this->sub_total->setDbValue($row['sub_total']);
		$this->penyesuaian->setDbValue($row['penyesuaian']);
		$this->total->setDbValue($row['total']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['datetime'] = $this->datetime->CurrentValue;
		$row['month'] = $this->month->CurrentValue;
		$row['pid'] = $this->pid->CurrentValue;
		$row['tahun'] = $this->tahun->CurrentValue;
		$row['bulan'] = $this->bulan->CurrentValue;
		$row['pegawai'] = $this->pegawai->CurrentValue;
		$row['jenjang_id'] = $this->jenjang_id->CurrentValue;
		$row['jabatan_id'] = $this->jabatan_id->CurrentValue;
		$row['type_jabatan'] = $this->type_jabatan->CurrentValue;
		$row['tambahan'] = $this->tambahan->CurrentValue;
		$row['ijasah'] = $this->ijasah->CurrentValue;
		$row['sertif'] = $this->sertif->CurrentValue;
		$row['lama_kerja'] = $this->lama_kerja->CurrentValue;
		$row['gapok'] = $this->gapok->CurrentValue;
		$row['kehadiran'] = $this->kehadiran->CurrentValue;
		$row['value_kehadiran'] = $this->value_kehadiran->CurrentValue;
		$row['lembur'] = $this->lembur->CurrentValue;
		$row['value_lembur'] = $this->value_lembur->CurrentValue;
		$row['value_reward'] = $this->value_reward->CurrentValue;
		$row['value_inval'] = $this->value_inval->CurrentValue;
		$row['piket_count'] = $this->piket_count->CurrentValue;
		$row['value_piket'] = $this->value_piket->CurrentValue;
		$row['tugastambahan'] = $this->tugastambahan->CurrentValue;
		$row['tj_jabatan'] = $this->tj_jabatan->CurrentValue;
		$row['tunjangan2'] = $this->tunjangan2->CurrentValue;
		$row['potongan'] = $this->potongan->CurrentValue;
		$row['sub_total'] = $this->sub_total->CurrentValue;
		$row['penyesuaian'] = $this->penyesuaian->CurrentValue;
		$row['total'] = $this->total->CurrentValue;
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
		// datetime
		// month
		// pid
		// tahun
		// bulan
		// pegawai
		// jenjang_id
		// jabatan_id
		// type_jabatan
		// tambahan
		// ijasah
		// sertif
		// lama_kerja
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
		// potongan
		// sub_total
		// penyesuaian
		// total

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// datetime
			$this->datetime->ViewValue = $this->datetime->CurrentValue;
			$this->datetime->ViewValue = FormatDateTime($this->datetime->ViewValue, 0);
			$this->datetime->ViewCustomAttributes = "";

			// month
			$this->month->ViewValue = $this->month->CurrentValue;
			$this->month->ViewValue = FormatDateTime($this->month->ViewValue, 0);
			$this->month->ViewCustomAttributes = "";

			// pid
			$this->pid->ViewValue = $this->pid->CurrentValue;
			$this->pid->ViewValue = FormatNumber($this->pid->ViewValue, 0, -2, -2, -2);
			$this->pid->ViewCustomAttributes = "";

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

			// ijasah
			$this->ijasah->ViewValue = $this->ijasah->CurrentValue;
			$curVal = strval($this->ijasah->CurrentValue);
			if ($curVal != "") {
				$this->ijasah->ViewValue = $this->ijasah->lookupCacheOption($curVal);
				if ($this->ijasah->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->ijasah->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->ijasah->ViewValue = $this->ijasah->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ijasah->ViewValue = $this->ijasah->CurrentValue;
					}
				}
			} else {
				$this->ijasah->ViewValue = NULL;
			}
			$this->ijasah->ViewCustomAttributes = "";

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

			// lama_kerja
			$this->lama_kerja->ViewValue = $this->lama_kerja->CurrentValue;
			$this->lama_kerja->ViewValue = FormatNumber($this->lama_kerja->ViewValue, 0, -2, -2, -2);
			$this->lama_kerja->ViewCustomAttributes = "";

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

			// potongan
			$this->potongan->ViewValue = $this->potongan->CurrentValue;
			$this->potongan->ViewValue = FormatNumber($this->potongan->ViewValue, 0, -2, -2, -2);
			$this->potongan->ViewCustomAttributes = "";

			// sub_total
			$this->sub_total->ViewValue = $this->sub_total->CurrentValue;
			$this->sub_total->ViewValue = FormatNumber($this->sub_total->ViewValue, 0, -2, -2, -2);
			$this->sub_total->ViewCustomAttributes = "";

			// penyesuaian
			$this->penyesuaian->ViewValue = $this->penyesuaian->CurrentValue;
			$this->penyesuaian->ViewValue = FormatNumber($this->penyesuaian->ViewValue, 0, -2, -2, -2);
			$this->penyesuaian->ViewCustomAttributes = "";

			// total
			$this->total->ViewValue = $this->total->CurrentValue;
			$this->total->ViewValue = FormatNumber($this->total->ViewValue, 0, -2, -2, -2);
			$this->total->ViewCustomAttributes = "";

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

			// type_jabatan
			$this->type_jabatan->LinkCustomAttributes = "";
			$this->type_jabatan->HrefValue = "";
			$this->type_jabatan->TooltipValue = "";

			// tambahan
			$this->tambahan->LinkCustomAttributes = "";
			$this->tambahan->HrefValue = "";
			$this->tambahan->TooltipValue = "";

			// ijasah
			$this->ijasah->LinkCustomAttributes = "";
			$this->ijasah->HrefValue = "";
			$this->ijasah->TooltipValue = "";

			// sertif
			$this->sertif->LinkCustomAttributes = "";
			$this->sertif->HrefValue = "";
			$this->sertif->TooltipValue = "";

			// lama_kerja
			$this->lama_kerja->LinkCustomAttributes = "";
			$this->lama_kerja->HrefValue = "";
			$this->lama_kerja->TooltipValue = "";

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

			// potongan
			$this->potongan->LinkCustomAttributes = "";
			$this->potongan->HrefValue = "";
			$this->potongan->TooltipValue = "";

			// sub_total
			$this->sub_total->LinkCustomAttributes = "";
			$this->sub_total->HrefValue = "";
			$this->sub_total->TooltipValue = "";

			// penyesuaian
			$this->penyesuaian->LinkCustomAttributes = "";
			$this->penyesuaian->HrefValue = "";
			$this->penyesuaian->TooltipValue = "";

			// total
			$this->total->LinkCustomAttributes = "";
			$this->total->HrefValue = "";
			$this->total->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// tahun
			$this->tahun->EditAttrs["class"] = "form-control";
			$this->tahun->EditCustomAttributes = "";
			if ($this->tahun->getSessionValue() != "") {
				$this->tahun->CurrentValue = $this->tahun->getSessionValue();
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

			// jenjang_id
			$this->jenjang_id->EditAttrs["class"] = "form-control";
			$this->jenjang_id->EditCustomAttributes = "";
			$this->jenjang_id->EditValue = HtmlEncode($this->jenjang_id->CurrentValue);
			$curVal = strval($this->jenjang_id->CurrentValue);
			if ($curVal != "") {
				$this->jenjang_id->EditValue = $this->jenjang_id->lookupCacheOption($curVal);
				if ($this->jenjang_id->EditValue === NULL) { // Lookup from database
					$filterWrk = "`nourut`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
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
			$curVal = strval($this->jabatan_id->CurrentValue);
			if ($curVal != "") {
				$this->jabatan_id->EditValue = $this->jabatan_id->lookupCacheOption($curVal);
				if ($this->jabatan_id->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->jabatan_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->jabatan_id->EditValue = $this->jabatan_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->jabatan_id->EditValue = HtmlEncode($this->jabatan_id->CurrentValue);
					}
				}
			} else {
				$this->jabatan_id->EditValue = NULL;
			}
			$this->jabatan_id->PlaceHolder = RemoveHtml($this->jabatan_id->caption());

			// type_jabatan
			$this->type_jabatan->EditAttrs["class"] = "form-control";
			$this->type_jabatan->EditCustomAttributes = "";
			$this->type_jabatan->EditValue = HtmlEncode($this->type_jabatan->CurrentValue);
			$curVal = strval($this->type_jabatan->CurrentValue);
			if ($curVal != "") {
				$this->type_jabatan->EditValue = $this->type_jabatan->lookupCacheOption($curVal);
				if ($this->type_jabatan->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->type_jabatan->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->type_jabatan->EditValue = $this->type_jabatan->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->type_jabatan->EditValue = HtmlEncode($this->type_jabatan->CurrentValue);
					}
				}
			} else {
				$this->type_jabatan->EditValue = NULL;
			}
			$this->type_jabatan->PlaceHolder = RemoveHtml($this->type_jabatan->caption());

			// tambahan
			$this->tambahan->EditAttrs["class"] = "form-control";
			$this->tambahan->EditCustomAttributes = "";
			$this->tambahan->EditValue = HtmlEncode($this->tambahan->CurrentValue);
			$curVal = strval($this->tambahan->CurrentValue);
			if ($curVal != "") {
				$this->tambahan->EditValue = $this->tambahan->lookupCacheOption($curVal);
				if ($this->tambahan->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->tambahan->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->tambahan->EditValue = $this->tambahan->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->tambahan->EditValue = HtmlEncode($this->tambahan->CurrentValue);
					}
				}
			} else {
				$this->tambahan->EditValue = NULL;
			}
			$this->tambahan->PlaceHolder = RemoveHtml($this->tambahan->caption());

			// ijasah
			$this->ijasah->EditAttrs["class"] = "form-control";
			$this->ijasah->EditCustomAttributes = "";
			$this->ijasah->EditValue = HtmlEncode($this->ijasah->CurrentValue);
			$curVal = strval($this->ijasah->CurrentValue);
			if ($curVal != "") {
				$this->ijasah->EditValue = $this->ijasah->lookupCacheOption($curVal);
				if ($this->ijasah->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->ijasah->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->ijasah->EditValue = $this->ijasah->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ijasah->EditValue = HtmlEncode($this->ijasah->CurrentValue);
					}
				}
			} else {
				$this->ijasah->EditValue = NULL;
			}
			$this->ijasah->PlaceHolder = RemoveHtml($this->ijasah->caption());

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

			// lama_kerja
			$this->lama_kerja->EditAttrs["class"] = "form-control";
			$this->lama_kerja->EditCustomAttributes = "";
			$this->lama_kerja->EditValue = HtmlEncode($this->lama_kerja->CurrentValue);
			$this->lama_kerja->PlaceHolder = RemoveHtml($this->lama_kerja->caption());

			// gapok
			$this->gapok->EditAttrs["class"] = "form-control";
			$this->gapok->EditCustomAttributes = "";
			$this->gapok->EditValue = HtmlEncode($this->gapok->CurrentValue);
			$this->gapok->PlaceHolder = RemoveHtml($this->gapok->caption());

			// kehadiran
			$this->kehadiran->EditAttrs["class"] = "form-control";
			$this->kehadiran->EditCustomAttributes = "";
			$this->kehadiran->EditValue = HtmlEncode($this->kehadiran->CurrentValue);
			$this->kehadiran->PlaceHolder = RemoveHtml($this->kehadiran->caption());

			// value_kehadiran
			$this->value_kehadiran->EditAttrs["class"] = "form-control";
			$this->value_kehadiran->EditCustomAttributes = "";
			$this->value_kehadiran->EditValue = HtmlEncode($this->value_kehadiran->CurrentValue);
			$this->value_kehadiran->PlaceHolder = RemoveHtml($this->value_kehadiran->caption());

			// lembur
			$this->lembur->EditAttrs["class"] = "form-control";
			$this->lembur->EditCustomAttributes = "";
			$this->lembur->EditValue = HtmlEncode($this->lembur->CurrentValue);
			$this->lembur->PlaceHolder = RemoveHtml($this->lembur->caption());

			// value_lembur
			$this->value_lembur->EditAttrs["class"] = "form-control";
			$this->value_lembur->EditCustomAttributes = "";
			$this->value_lembur->EditValue = HtmlEncode($this->value_lembur->CurrentValue);
			$this->value_lembur->PlaceHolder = RemoveHtml($this->value_lembur->caption());

			// value_reward
			$this->value_reward->EditAttrs["class"] = "form-control";
			$this->value_reward->EditCustomAttributes = "";
			$this->value_reward->EditValue = HtmlEncode($this->value_reward->CurrentValue);
			$this->value_reward->PlaceHolder = RemoveHtml($this->value_reward->caption());

			// piket_count
			$this->piket_count->EditAttrs["class"] = "form-control";
			$this->piket_count->EditCustomAttributes = "";
			$this->piket_count->EditValue = HtmlEncode($this->piket_count->CurrentValue);
			$this->piket_count->PlaceHolder = RemoveHtml($this->piket_count->caption());

			// value_piket
			$this->value_piket->EditAttrs["class"] = "form-control";
			$this->value_piket->EditCustomAttributes = "";
			$this->value_piket->EditValue = HtmlEncode($this->value_piket->CurrentValue);
			$this->value_piket->PlaceHolder = RemoveHtml($this->value_piket->caption());

			// tugastambahan
			$this->tugastambahan->EditAttrs["class"] = "form-control";
			$this->tugastambahan->EditCustomAttributes = "";
			$this->tugastambahan->EditValue = HtmlEncode($this->tugastambahan->CurrentValue);
			$this->tugastambahan->PlaceHolder = RemoveHtml($this->tugastambahan->caption());

			// potongan
			$this->potongan->EditAttrs["class"] = "form-control";
			$this->potongan->EditCustomAttributes = "";
			$this->potongan->EditValue = HtmlEncode($this->potongan->CurrentValue);
			$this->potongan->PlaceHolder = RemoveHtml($this->potongan->caption());

			// sub_total
			$this->sub_total->EditAttrs["class"] = "form-control";
			$this->sub_total->EditCustomAttributes = "";
			$this->sub_total->EditValue = HtmlEncode($this->sub_total->CurrentValue);
			$this->sub_total->PlaceHolder = RemoveHtml($this->sub_total->caption());

			// penyesuaian
			$this->penyesuaian->EditAttrs["class"] = "form-control";
			$this->penyesuaian->EditCustomAttributes = "";
			$this->penyesuaian->EditValue = HtmlEncode($this->penyesuaian->CurrentValue);
			$this->penyesuaian->PlaceHolder = RemoveHtml($this->penyesuaian->caption());

			// total
			$this->total->EditAttrs["class"] = "form-control";
			$this->total->EditCustomAttributes = "";
			$this->total->EditValue = HtmlEncode($this->total->CurrentValue);
			$this->total->PlaceHolder = RemoveHtml($this->total->caption());

			// Add refer script
			// tahun

			$this->tahun->LinkCustomAttributes = "";
			$this->tahun->HrefValue = "";

			// bulan
			$this->bulan->LinkCustomAttributes = "";
			$this->bulan->HrefValue = "";

			// pegawai
			$this->pegawai->LinkCustomAttributes = "";
			$this->pegawai->HrefValue = "";

			// jenjang_id
			$this->jenjang_id->LinkCustomAttributes = "";
			$this->jenjang_id->HrefValue = "";

			// jabatan_id
			$this->jabatan_id->LinkCustomAttributes = "";
			$this->jabatan_id->HrefValue = "";

			// type_jabatan
			$this->type_jabatan->LinkCustomAttributes = "";
			$this->type_jabatan->HrefValue = "";

			// tambahan
			$this->tambahan->LinkCustomAttributes = "";
			$this->tambahan->HrefValue = "";

			// ijasah
			$this->ijasah->LinkCustomAttributes = "";
			$this->ijasah->HrefValue = "";

			// sertif
			$this->sertif->LinkCustomAttributes = "";
			$this->sertif->HrefValue = "";

			// lama_kerja
			$this->lama_kerja->LinkCustomAttributes = "";
			$this->lama_kerja->HrefValue = "";

			// gapok
			$this->gapok->LinkCustomAttributes = "";
			$this->gapok->HrefValue = "";

			// kehadiran
			$this->kehadiran->LinkCustomAttributes = "";
			$this->kehadiran->HrefValue = "";

			// value_kehadiran
			$this->value_kehadiran->LinkCustomAttributes = "";
			$this->value_kehadiran->HrefValue = "";

			// lembur
			$this->lembur->LinkCustomAttributes = "";
			$this->lembur->HrefValue = "";

			// value_lembur
			$this->value_lembur->LinkCustomAttributes = "";
			$this->value_lembur->HrefValue = "";

			// value_reward
			$this->value_reward->LinkCustomAttributes = "";
			$this->value_reward->HrefValue = "";

			// piket_count
			$this->piket_count->LinkCustomAttributes = "";
			$this->piket_count->HrefValue = "";

			// value_piket
			$this->value_piket->LinkCustomAttributes = "";
			$this->value_piket->HrefValue = "";

			// tugastambahan
			$this->tugastambahan->LinkCustomAttributes = "";
			$this->tugastambahan->HrefValue = "";

			// potongan
			$this->potongan->LinkCustomAttributes = "";
			$this->potongan->HrefValue = "";

			// sub_total
			$this->sub_total->LinkCustomAttributes = "";
			$this->sub_total->HrefValue = "";

			// penyesuaian
			$this->penyesuaian->LinkCustomAttributes = "";
			$this->penyesuaian->HrefValue = "";

			// total
			$this->total->LinkCustomAttributes = "";
			$this->total->HrefValue = "";
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
		if ($this->pegawai->Required) {
			if (!$this->pegawai->IsDetailKey && $this->pegawai->FormValue != NULL && $this->pegawai->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pegawai->caption(), $this->pegawai->RequiredErrorMessage));
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
		if ($this->type_jabatan->Required) {
			if (!$this->type_jabatan->IsDetailKey && $this->type_jabatan->FormValue != NULL && $this->type_jabatan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->type_jabatan->caption(), $this->type_jabatan->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->type_jabatan->FormValue)) {
			AddMessage($FormError, $this->type_jabatan->errorMessage());
		}
		if ($this->tambahan->Required) {
			if (!$this->tambahan->IsDetailKey && $this->tambahan->FormValue != NULL && $this->tambahan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tambahan->caption(), $this->tambahan->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->tambahan->FormValue)) {
			AddMessage($FormError, $this->tambahan->errorMessage());
		}
		if ($this->ijasah->Required) {
			if (!$this->ijasah->IsDetailKey && $this->ijasah->FormValue != NULL && $this->ijasah->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ijasah->caption(), $this->ijasah->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->ijasah->FormValue)) {
			AddMessage($FormError, $this->ijasah->errorMessage());
		}
		if ($this->sertif->Required) {
			if (!$this->sertif->IsDetailKey && $this->sertif->FormValue != NULL && $this->sertif->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sertif->caption(), $this->sertif->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->sertif->FormValue)) {
			AddMessage($FormError, $this->sertif->errorMessage());
		}
		if ($this->lama_kerja->Required) {
			if (!$this->lama_kerja->IsDetailKey && $this->lama_kerja->FormValue != NULL && $this->lama_kerja->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->lama_kerja->caption(), $this->lama_kerja->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->lama_kerja->FormValue)) {
			AddMessage($FormError, $this->lama_kerja->errorMessage());
		}
		if ($this->gapok->Required) {
			if (!$this->gapok->IsDetailKey && $this->gapok->FormValue != NULL && $this->gapok->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->gapok->caption(), $this->gapok->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->gapok->FormValue)) {
			AddMessage($FormError, $this->gapok->errorMessage());
		}
		if ($this->kehadiran->Required) {
			if (!$this->kehadiran->IsDetailKey && $this->kehadiran->FormValue != NULL && $this->kehadiran->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->kehadiran->caption(), $this->kehadiran->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->kehadiran->FormValue)) {
			AddMessage($FormError, $this->kehadiran->errorMessage());
		}
		if ($this->value_kehadiran->Required) {
			if (!$this->value_kehadiran->IsDetailKey && $this->value_kehadiran->FormValue != NULL && $this->value_kehadiran->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->value_kehadiran->caption(), $this->value_kehadiran->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->value_kehadiran->FormValue)) {
			AddMessage($FormError, $this->value_kehadiran->errorMessage());
		}
		if ($this->lembur->Required) {
			if (!$this->lembur->IsDetailKey && $this->lembur->FormValue != NULL && $this->lembur->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->lembur->caption(), $this->lembur->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->lembur->FormValue)) {
			AddMessage($FormError, $this->lembur->errorMessage());
		}
		if ($this->value_lembur->Required) {
			if (!$this->value_lembur->IsDetailKey && $this->value_lembur->FormValue != NULL && $this->value_lembur->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->value_lembur->caption(), $this->value_lembur->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->value_lembur->FormValue)) {
			AddMessage($FormError, $this->value_lembur->errorMessage());
		}
		if ($this->value_reward->Required) {
			if (!$this->value_reward->IsDetailKey && $this->value_reward->FormValue != NULL && $this->value_reward->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->value_reward->caption(), $this->value_reward->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->value_reward->FormValue)) {
			AddMessage($FormError, $this->value_reward->errorMessage());
		}
		if ($this->piket_count->Required) {
			if (!$this->piket_count->IsDetailKey && $this->piket_count->FormValue != NULL && $this->piket_count->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->piket_count->caption(), $this->piket_count->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->piket_count->FormValue)) {
			AddMessage($FormError, $this->piket_count->errorMessage());
		}
		if ($this->value_piket->Required) {
			if (!$this->value_piket->IsDetailKey && $this->value_piket->FormValue != NULL && $this->value_piket->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->value_piket->caption(), $this->value_piket->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->value_piket->FormValue)) {
			AddMessage($FormError, $this->value_piket->errorMessage());
		}
		if ($this->tugastambahan->Required) {
			if (!$this->tugastambahan->IsDetailKey && $this->tugastambahan->FormValue != NULL && $this->tugastambahan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tugastambahan->caption(), $this->tugastambahan->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->tugastambahan->FormValue)) {
			AddMessage($FormError, $this->tugastambahan->errorMessage());
		}
		if ($this->potongan->Required) {
			if (!$this->potongan->IsDetailKey && $this->potongan->FormValue != NULL && $this->potongan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->potongan->caption(), $this->potongan->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->potongan->FormValue)) {
			AddMessage($FormError, $this->potongan->errorMessage());
		}
		if ($this->sub_total->Required) {
			if (!$this->sub_total->IsDetailKey && $this->sub_total->FormValue != NULL && $this->sub_total->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sub_total->caption(), $this->sub_total->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->sub_total->FormValue)) {
			AddMessage($FormError, $this->sub_total->errorMessage());
		}
		if ($this->penyesuaian->Required) {
			if (!$this->penyesuaian->IsDetailKey && $this->penyesuaian->FormValue != NULL && $this->penyesuaian->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->penyesuaian->caption(), $this->penyesuaian->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->penyesuaian->FormValue)) {
			AddMessage($FormError, $this->penyesuaian->errorMessage());
		}
		if ($this->total->Required) {
			if (!$this->total->IsDetailKey && $this->total->FormValue != NULL && $this->total->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->total->caption(), $this->total->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->total->FormValue)) {
			AddMessage($FormError, $this->total->errorMessage());
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

		// Check referential integrity for master table 'gaji_tu_sma'
		$validMasterRecord = TRUE;
		$masterFilter = $this->sqlMasterFilter_m_tu_sma();
		if ($this->pid->getSessionValue() != "") {
			$masterFilter = str_replace("@id@", AdjustSql($this->pid->getSessionValue(), "DB"), $masterFilter);
		} else {
			$validMasterRecord = FALSE;
		}
		if (strval($this->tahun->CurrentValue) != "") {
			$masterFilter = str_replace("@tahun@", AdjustSql($this->tahun->CurrentValue, "DB"), $masterFilter);
		} else {
			$validMasterRecord = FALSE;
		}
		if (strval($this->bulan->CurrentValue) != "") {
			$masterFilter = str_replace("@bulan@", AdjustSql($this->bulan->CurrentValue, "DB"), $masterFilter);
		} else {
			$validMasterRecord = FALSE;
		}
		if ($validMasterRecord) {
			if (!isset($GLOBALS["m_tu_sma"]))
				$GLOBALS["m_tu_sma"] = new m_tu_sma();
			$rsmaster = $GLOBALS["m_tu_sma"]->loadRs($masterFilter);
			$validMasterRecord = ($rsmaster && !$rsmaster->EOF);
			$rsmaster->close();
		}
		if (!$validMasterRecord) {
			$relatedRecordMsg = str_replace("%t", "m_tu_sma", $Language->phrase("RelatedRecordRequired"));
			$this->setFailureMessage($relatedRecordMsg);
			return FALSE;
		}
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// tahun
		$this->tahun->setDbValueDef($rsnew, $this->tahun->CurrentValue, NULL, FALSE);

		// bulan
		$this->bulan->setDbValueDef($rsnew, $this->bulan->CurrentValue, NULL, FALSE);

		// pegawai
		$this->pegawai->setDbValueDef($rsnew, $this->pegawai->CurrentValue, NULL, FALSE);

		// jenjang_id
		$this->jenjang_id->setDbValueDef($rsnew, $this->jenjang_id->CurrentValue, NULL, FALSE);

		// jabatan_id
		$this->jabatan_id->setDbValueDef($rsnew, $this->jabatan_id->CurrentValue, NULL, FALSE);

		// type_jabatan
		$this->type_jabatan->setDbValueDef($rsnew, $this->type_jabatan->CurrentValue, NULL, FALSE);

		// tambahan
		$this->tambahan->setDbValueDef($rsnew, $this->tambahan->CurrentValue, NULL, FALSE);

		// ijasah
		$this->ijasah->setDbValueDef($rsnew, $this->ijasah->CurrentValue, NULL, FALSE);

		// sertif
		$this->sertif->setDbValueDef($rsnew, $this->sertif->CurrentValue, NULL, FALSE);

		// lama_kerja
		$this->lama_kerja->setDbValueDef($rsnew, $this->lama_kerja->CurrentValue, NULL, FALSE);

		// gapok
		$this->gapok->setDbValueDef($rsnew, $this->gapok->CurrentValue, NULL, FALSE);

		// kehadiran
		$this->kehadiran->setDbValueDef($rsnew, $this->kehadiran->CurrentValue, NULL, FALSE);

		// value_kehadiran
		$this->value_kehadiran->setDbValueDef($rsnew, $this->value_kehadiran->CurrentValue, NULL, FALSE);

		// lembur
		$this->lembur->setDbValueDef($rsnew, $this->lembur->CurrentValue, NULL, FALSE);

		// value_lembur
		$this->value_lembur->setDbValueDef($rsnew, $this->value_lembur->CurrentValue, NULL, FALSE);

		// value_reward
		$this->value_reward->setDbValueDef($rsnew, $this->value_reward->CurrentValue, NULL, FALSE);

		// piket_count
		$this->piket_count->setDbValueDef($rsnew, $this->piket_count->CurrentValue, NULL, FALSE);

		// value_piket
		$this->value_piket->setDbValueDef($rsnew, $this->value_piket->CurrentValue, NULL, FALSE);

		// tugastambahan
		$this->tugastambahan->setDbValueDef($rsnew, $this->tugastambahan->CurrentValue, NULL, FALSE);

		// potongan
		$this->potongan->setDbValueDef($rsnew, $this->potongan->CurrentValue, NULL, FALSE);

		// sub_total
		$this->sub_total->setDbValueDef($rsnew, $this->sub_total->CurrentValue, NULL, FALSE);

		// penyesuaian
		$this->penyesuaian->setDbValueDef($rsnew, $this->penyesuaian->CurrentValue, NULL, FALSE);

		// total
		$this->total->setDbValueDef($rsnew, $this->total->CurrentValue, NULL, FALSE);

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
		$validMaster = FALSE;

		// Get the keys for master table
		if (($master = Get(Config("TABLE_SHOW_MASTER"), Get(Config("TABLE_MASTER")))) !== NULL) {
			$masterTblVar = $master;
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "m_tu_sma") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id", Get("pid"))) !== NULL) {
					$GLOBALS["m_tu_sma"]->id->setQueryStringValue($parm);
					$this->pid->setQueryStringValue($GLOBALS["m_tu_sma"]->id->QueryStringValue);
					$this->pid->setSessionValue($this->pid->QueryStringValue);
					if (!is_numeric($GLOBALS["m_tu_sma"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_tahun", Get("tahun"))) !== NULL) {
					$GLOBALS["m_tu_sma"]->tahun->setQueryStringValue($parm);
					$this->tahun->setQueryStringValue($GLOBALS["m_tu_sma"]->tahun->QueryStringValue);
					$this->tahun->setSessionValue($this->tahun->QueryStringValue);
					if (!is_numeric($GLOBALS["m_tu_sma"]->tahun->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_bulan", Get("bulan"))) !== NULL) {
					$GLOBALS["m_tu_sma"]->bulan->setQueryStringValue($parm);
					$this->bulan->setQueryStringValue($GLOBALS["m_tu_sma"]->bulan->QueryStringValue);
					$this->bulan->setSessionValue($this->bulan->QueryStringValue);
					if (!is_numeric($GLOBALS["m_tu_sma"]->bulan->QueryStringValue))
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
			if ($masterTblVar == "m_tu_sma") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id", Post("pid"))) !== NULL) {
					$GLOBALS["m_tu_sma"]->id->setFormValue($parm);
					$this->pid->setFormValue($GLOBALS["m_tu_sma"]->id->FormValue);
					$this->pid->setSessionValue($this->pid->FormValue);
					if (!is_numeric($GLOBALS["m_tu_sma"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_tahun", Post("tahun"))) !== NULL) {
					$GLOBALS["m_tu_sma"]->tahun->setFormValue($parm);
					$this->tahun->setFormValue($GLOBALS["m_tu_sma"]->tahun->FormValue);
					$this->tahun->setSessionValue($this->tahun->FormValue);
					if (!is_numeric($GLOBALS["m_tu_sma"]->tahun->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_bulan", Post("bulan"))) !== NULL) {
					$GLOBALS["m_tu_sma"]->bulan->setFormValue($parm);
					$this->bulan->setFormValue($GLOBALS["m_tu_sma"]->bulan->FormValue);
					$this->bulan->setSessionValue($this->bulan->FormValue);
					if (!is_numeric($GLOBALS["m_tu_sma"]->bulan->FormValue))
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
			if ($masterTblVar != "m_tu_sma") {
				if ($this->pid->CurrentValue == "")
					$this->pid->setSessionValue("");
				if ($this->tahun->CurrentValue == "")
					$this->tahun->setSessionValue("");
				if ($this->bulan->CurrentValue == "")
					$this->bulan->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("gaji_tu_smalist.php"), "", $this->TableVar, TRUE);
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
				case "x_ijasah":
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
						case "x_ijasah":
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
} // End class
?>