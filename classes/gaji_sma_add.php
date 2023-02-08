<?php
namespace PHPMaker2020\sigap;

/**
 * Page class
 */
class gaji_sma_add extends gaji_sma
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}";

	// Table name
	public $TableName = 'gaji_sma';

	// Page object name
	public $PageObjName = "gaji_sma_add";

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

		// Table object (gaji_sma)
		if (!isset($GLOBALS["gaji_sma"]) || get_class($GLOBALS["gaji_sma"]) == PROJECT_NAMESPACE . "gaji_sma") {
			$GLOBALS["gaji_sma"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["gaji_sma"];
		}

		// Table object (m_sma)
		if (!isset($GLOBALS['m_sma']))
			$GLOBALS['m_sma'] = new m_sma();

		// Table object (pegawai)
		if (!isset($GLOBALS['pegawai']))
			$GLOBALS['pegawai'] = new pegawai();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'gaji_sma');

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
		global $gaji_sma;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($gaji_sma);
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
					if ($pageName == "gaji_smaview.php")
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
					$this->terminate(GetUrl("gaji_smalist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->pid->Visible = FALSE;
		$this->datetime->Visible = FALSE;
		$this->month->Visible = FALSE;
		$this->tahun->setVisibility();
		$this->bulan->setVisibility();
		$this->pegawai->setVisibility();
		$this->jenjang_id->setVisibility();
		$this->jabatan_id->setVisibility();
		$this->lama_kerja->Visible = FALSE;
		$this->type->Visible = FALSE;
		$this->jenis_guru->Visible = FALSE;
		$this->tambahan->Visible = FALSE;
		$this->periode->Visible = FALSE;
		$this->tunjangan_periode->Visible = FALSE;
		$this->kehadiran->Visible = FALSE;
		$this->value_kehadiran->Visible = FALSE;
		$this->lembur->Visible = FALSE;
		$this->value_lembur->Visible = FALSE;
		$this->jp->Visible = FALSE;
		$this->gapok->Visible = FALSE;
		$this->total_gapok->Visible = FALSE;
		$this->value_reward->Visible = FALSE;
		$this->value_inval->Visible = FALSE;
		$this->piket_count->Visible = FALSE;
		$this->value_piket->Visible = FALSE;
		$this->tugastambahan->Visible = FALSE;
		$this->tj_jabatan->Visible = FALSE;
		$this->sub_total->Visible = FALSE;
		$this->potongan->Visible = FALSE;
		$this->penyesuaian->setVisibility();
		$this->total->Visible = FALSE;
		$this->status->setVisibility();
		$this->potongan_bendahara->setVisibility();
		$this->voucher->setVisibility();
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
		$this->setupLookupOptions($this->type);
		$this->setupLookupOptions($this->jenis_guru);
		$this->setupLookupOptions($this->tambahan);

		// Check permission
		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("gaji_smalist.php");
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
					$this->terminate("gaji_smalist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "gaji_smalist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "gaji_smaview.php")
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
		$this->datetime->CurrentValue = NULL;
		$this->datetime->OldValue = $this->datetime->CurrentValue;
		$this->month->CurrentValue = NULL;
		$this->month->OldValue = $this->month->CurrentValue;
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
		$this->lama_kerja->CurrentValue = NULL;
		$this->lama_kerja->OldValue = $this->lama_kerja->CurrentValue;
		$this->type->CurrentValue = NULL;
		$this->type->OldValue = $this->type->CurrentValue;
		$this->jenis_guru->CurrentValue = NULL;
		$this->jenis_guru->OldValue = $this->jenis_guru->CurrentValue;
		$this->tambahan->CurrentValue = NULL;
		$this->tambahan->OldValue = $this->tambahan->CurrentValue;
		$this->periode->CurrentValue = NULL;
		$this->periode->OldValue = $this->periode->CurrentValue;
		$this->tunjangan_periode->CurrentValue = NULL;
		$this->tunjangan_periode->OldValue = $this->tunjangan_periode->CurrentValue;
		$this->kehadiran->CurrentValue = NULL;
		$this->kehadiran->OldValue = $this->kehadiran->CurrentValue;
		$this->value_kehadiran->CurrentValue = NULL;
		$this->value_kehadiran->OldValue = $this->value_kehadiran->CurrentValue;
		$this->lembur->CurrentValue = NULL;
		$this->lembur->OldValue = $this->lembur->CurrentValue;
		$this->value_lembur->CurrentValue = NULL;
		$this->value_lembur->OldValue = $this->value_lembur->CurrentValue;
		$this->jp->CurrentValue = NULL;
		$this->jp->OldValue = $this->jp->CurrentValue;
		$this->gapok->CurrentValue = NULL;
		$this->gapok->OldValue = $this->gapok->CurrentValue;
		$this->total_gapok->CurrentValue = NULL;
		$this->total_gapok->OldValue = $this->total_gapok->CurrentValue;
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
		$this->sub_total->CurrentValue = NULL;
		$this->sub_total->OldValue = $this->sub_total->CurrentValue;
		$this->potongan->CurrentValue = NULL;
		$this->potongan->OldValue = $this->potongan->CurrentValue;
		$this->penyesuaian->CurrentValue = NULL;
		$this->penyesuaian->OldValue = $this->penyesuaian->CurrentValue;
		$this->total->CurrentValue = NULL;
		$this->total->OldValue = $this->total->CurrentValue;
		$this->status->CurrentValue = NULL;
		$this->status->OldValue = $this->status->CurrentValue;
		$this->potongan_bendahara->CurrentValue = NULL;
		$this->potongan_bendahara->OldValue = $this->potongan_bendahara->CurrentValue;
		$this->voucher->CurrentValue = NULL;
		$this->voucher->OldValue = $this->voucher->CurrentValue;
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

		// Check field name 'penyesuaian' first before field var 'x_penyesuaian'
		$val = $CurrentForm->hasValue("penyesuaian") ? $CurrentForm->getValue("penyesuaian") : $CurrentForm->getValue("x_penyesuaian");
		if (!$this->penyesuaian->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->penyesuaian->Visible = FALSE; // Disable update for API request
			else
				$this->penyesuaian->setFormValue($val);
		}

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
		}

		// Check field name 'potongan_bendahara' first before field var 'x_potongan_bendahara'
		$val = $CurrentForm->hasValue("potongan_bendahara") ? $CurrentForm->getValue("potongan_bendahara") : $CurrentForm->getValue("x_potongan_bendahara");
		if (!$this->potongan_bendahara->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->potongan_bendahara->Visible = FALSE; // Disable update for API request
			else
				$this->potongan_bendahara->setFormValue($val);
		}

		// Check field name 'voucher' first before field var 'x_voucher'
		$val = $CurrentForm->hasValue("voucher") ? $CurrentForm->getValue("voucher") : $CurrentForm->getValue("x_voucher");
		if (!$this->voucher->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->voucher->Visible = FALSE; // Disable update for API request
			else
				$this->voucher->setFormValue($val);
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
		$this->penyesuaian->CurrentValue = $this->penyesuaian->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->potongan_bendahara->CurrentValue = $this->potongan_bendahara->FormValue;
		$this->voucher->CurrentValue = $this->voucher->FormValue;
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
		$this->datetime->setDbValue($row['datetime']);
		$this->month->setDbValue($row['month']);
		$this->tahun->setDbValue($row['tahun']);
		$this->bulan->setDbValue($row['bulan']);
		$this->pegawai->setDbValue($row['pegawai']);
		$this->jenjang_id->setDbValue($row['jenjang_id']);
		$this->jabatan_id->setDbValue($row['jabatan_id']);
		$this->lama_kerja->setDbValue($row['lama_kerja']);
		$this->type->setDbValue($row['type']);
		$this->jenis_guru->setDbValue($row['jenis_guru']);
		$this->tambahan->setDbValue($row['tambahan']);
		$this->periode->setDbValue($row['periode']);
		$this->tunjangan_periode->setDbValue($row['tunjangan_periode']);
		$this->kehadiran->setDbValue($row['kehadiran']);
		$this->value_kehadiran->setDbValue($row['value_kehadiran']);
		$this->lembur->setDbValue($row['lembur']);
		$this->value_lembur->setDbValue($row['value_lembur']);
		$this->jp->setDbValue($row['jp']);
		$this->gapok->setDbValue($row['gapok']);
		$this->total_gapok->setDbValue($row['total_gapok']);
		$this->value_reward->setDbValue($row['value_reward']);
		$this->value_inval->setDbValue($row['value_inval']);
		$this->piket_count->setDbValue($row['piket_count']);
		$this->value_piket->setDbValue($row['value_piket']);
		$this->tugastambahan->setDbValue($row['tugastambahan']);
		$this->tj_jabatan->setDbValue($row['tj_jabatan']);
		$this->sub_total->setDbValue($row['sub_total']);
		$this->potongan->setDbValue($row['potongan']);
		$this->penyesuaian->setDbValue($row['penyesuaian']);
		$this->total->setDbValue($row['total']);
		$this->status->setDbValue($row['status']);
		$this->potongan_bendahara->setDbValue($row['potongan_bendahara']);
		$this->voucher->setDbValue($row['voucher']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['pid'] = $this->pid->CurrentValue;
		$row['datetime'] = $this->datetime->CurrentValue;
		$row['month'] = $this->month->CurrentValue;
		$row['tahun'] = $this->tahun->CurrentValue;
		$row['bulan'] = $this->bulan->CurrentValue;
		$row['pegawai'] = $this->pegawai->CurrentValue;
		$row['jenjang_id'] = $this->jenjang_id->CurrentValue;
		$row['jabatan_id'] = $this->jabatan_id->CurrentValue;
		$row['lama_kerja'] = $this->lama_kerja->CurrentValue;
		$row['type'] = $this->type->CurrentValue;
		$row['jenis_guru'] = $this->jenis_guru->CurrentValue;
		$row['tambahan'] = $this->tambahan->CurrentValue;
		$row['periode'] = $this->periode->CurrentValue;
		$row['tunjangan_periode'] = $this->tunjangan_periode->CurrentValue;
		$row['kehadiran'] = $this->kehadiran->CurrentValue;
		$row['value_kehadiran'] = $this->value_kehadiran->CurrentValue;
		$row['lembur'] = $this->lembur->CurrentValue;
		$row['value_lembur'] = $this->value_lembur->CurrentValue;
		$row['jp'] = $this->jp->CurrentValue;
		$row['gapok'] = $this->gapok->CurrentValue;
		$row['total_gapok'] = $this->total_gapok->CurrentValue;
		$row['value_reward'] = $this->value_reward->CurrentValue;
		$row['value_inval'] = $this->value_inval->CurrentValue;
		$row['piket_count'] = $this->piket_count->CurrentValue;
		$row['value_piket'] = $this->value_piket->CurrentValue;
		$row['tugastambahan'] = $this->tugastambahan->CurrentValue;
		$row['tj_jabatan'] = $this->tj_jabatan->CurrentValue;
		$row['sub_total'] = $this->sub_total->CurrentValue;
		$row['potongan'] = $this->potongan->CurrentValue;
		$row['penyesuaian'] = $this->penyesuaian->CurrentValue;
		$row['total'] = $this->total->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['potongan_bendahara'] = $this->potongan_bendahara->CurrentValue;
		$row['voucher'] = $this->voucher->CurrentValue;
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
		// datetime
		// month
		// tahun
		// bulan
		// pegawai
		// jenjang_id
		// jabatan_id
		// lama_kerja
		// type
		// jenis_guru
		// tambahan
		// periode
		// tunjangan_periode
		// kehadiran
		// value_kehadiran
		// lembur
		// value_lembur
		// jp
		// gapok
		// total_gapok
		// value_reward
		// value_inval
		// piket_count
		// value_piket
		// tugastambahan
		// tj_jabatan
		// sub_total
		// potongan
		// penyesuaian
		// total
		// status
		// potongan_bendahara
		// voucher

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// pid
			$this->pid->ViewValue = $this->pid->CurrentValue;
			$this->pid->ViewValue = FormatNumber($this->pid->ViewValue, 0, -2, -2, -2);
			$this->pid->ViewCustomAttributes = "";

			// datetime
			$this->datetime->ViewValue = $this->datetime->CurrentValue;
			$this->datetime->ViewValue = FormatDateTime($this->datetime->ViewValue, 0);
			$this->datetime->ViewCustomAttributes = "";

			// month
			$this->month->ViewValue = $this->month->CurrentValue;
			$this->month->ViewValue = FormatDateTime($this->month->ViewValue, 0);
			$this->month->ViewCustomAttributes = "";

			// tahun
			$this->tahun->ViewValue = $this->tahun->CurrentValue;
			$this->tahun->ViewValue = FormatNumber($this->tahun->ViewValue, 0, -2, -2, -2);
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

			// jenis_guru
			$this->jenis_guru->ViewValue = $this->jenis_guru->CurrentValue;
			$curVal = strval($this->jenis_guru->CurrentValue);
			if ($curVal != "") {
				$this->jenis_guru->ViewValue = $this->jenis_guru->lookupCacheOption($curVal);
				if ($this->jenis_guru->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->jenis_guru->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->jenis_guru->ViewValue = $this->jenis_guru->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->jenis_guru->ViewValue = $this->jenis_guru->CurrentValue;
					}
				}
			} else {
				$this->jenis_guru->ViewValue = NULL;
			}
			$this->jenis_guru->ViewCustomAttributes = "";

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

			// periode
			$this->periode->ViewValue = $this->periode->CurrentValue;
			$this->periode->ViewValue = FormatNumber($this->periode->ViewValue, 0, -2, -2, -2);
			$this->periode->ViewCustomAttributes = "";

			// tunjangan_periode
			$this->tunjangan_periode->ViewValue = $this->tunjangan_periode->CurrentValue;
			$this->tunjangan_periode->ViewValue = FormatNumber($this->tunjangan_periode->ViewValue, 0, -2, -2, -2);
			$this->tunjangan_periode->ViewCustomAttributes = "";

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

			// jp
			$this->jp->ViewValue = $this->jp->CurrentValue;
			$this->jp->ViewValue = FormatNumber($this->jp->ViewValue, 0, -2, -2, -2);
			$this->jp->ViewCustomAttributes = "";

			// gapok
			$this->gapok->ViewValue = $this->gapok->CurrentValue;
			$this->gapok->ViewValue = FormatNumber($this->gapok->ViewValue, 0, -2, -2, -2);
			$this->gapok->ViewCustomAttributes = "";

			// total_gapok
			$this->total_gapok->ViewValue = $this->total_gapok->CurrentValue;
			$this->total_gapok->ViewValue = FormatNumber($this->total_gapok->ViewValue, 0, -2, -2, -2);
			$this->total_gapok->ViewCustomAttributes = "";

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

			// status
			$this->status->ViewCustomAttributes = "";

			// potongan_bendahara
			$this->potongan_bendahara->ViewValue = $this->potongan_bendahara->CurrentValue;
			$this->potongan_bendahara->ViewCustomAttributes = "";

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

			// penyesuaian
			$this->penyesuaian->LinkCustomAttributes = "";
			$this->penyesuaian->HrefValue = "";
			$this->penyesuaian->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// potongan_bendahara
			$this->potongan_bendahara->LinkCustomAttributes = "";
			$this->potongan_bendahara->HrefValue = "";
			$this->potongan_bendahara->TooltipValue = "";

			// voucher
			$this->voucher->LinkCustomAttributes = "";
			$this->voucher->HrefValue = "";
			$this->voucher->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// tahun
			$this->tahun->EditAttrs["class"] = "form-control";
			$this->tahun->EditCustomAttributes = "";
			if ($this->tahun->getSessionValue() != "") {
				$this->tahun->CurrentValue = $this->tahun->getSessionValue();
				$this->tahun->ViewValue = $this->tahun->CurrentValue;
				$this->tahun->ViewValue = FormatNumber($this->tahun->ViewValue, 0, -2, -2, -2);
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
			$this->pegawai->EditCustomAttributes = "";
			$curVal = trim(strval($this->pegawai->CurrentValue));
			if ($curVal != "")
				$this->pegawai->ViewValue = $this->pegawai->lookupCacheOption($curVal);
			else
				$this->pegawai->ViewValue = $this->pegawai->Lookup !== NULL && is_array($this->pegawai->Lookup->Options) ? $curVal : NULL;
			if ($this->pegawai->ViewValue !== NULL) { // Load from cache
				$this->pegawai->EditValue = array_values($this->pegawai->Lookup->Options);
				if ($this->pegawai->ViewValue == "")
					$this->pegawai->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`nip`" . SearchString("=", $this->pegawai->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->pegawai->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->pegawai->ViewValue = $this->pegawai->displayValue($arwrk);
				} else {
					$this->pegawai->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->pegawai->EditValue = $arwrk;
			}

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

			// penyesuaian
			$this->penyesuaian->EditAttrs["class"] = "form-control";
			$this->penyesuaian->EditCustomAttributes = "";
			$this->penyesuaian->EditValue = HtmlEncode($this->penyesuaian->CurrentValue);
			$this->penyesuaian->PlaceHolder = RemoveHtml($this->penyesuaian->caption());

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";

			// potongan_bendahara
			$this->potongan_bendahara->EditAttrs["class"] = "form-control";
			$this->potongan_bendahara->EditCustomAttributes = "";
			$this->potongan_bendahara->EditValue = HtmlEncode($this->potongan_bendahara->CurrentValue);
			$this->potongan_bendahara->PlaceHolder = RemoveHtml($this->potongan_bendahara->caption());

			// voucher
			$this->voucher->EditAttrs["class"] = "form-control";
			$this->voucher->EditCustomAttributes = "";
			$this->voucher->EditValue = HtmlEncode($this->voucher->CurrentValue);
			$this->voucher->PlaceHolder = RemoveHtml($this->voucher->caption());

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

			// penyesuaian
			$this->penyesuaian->LinkCustomAttributes = "";
			$this->penyesuaian->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// potongan_bendahara
			$this->potongan_bendahara->LinkCustomAttributes = "";
			$this->potongan_bendahara->HrefValue = "";

			// voucher
			$this->voucher->LinkCustomAttributes = "";
			$this->voucher->HrefValue = "";
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
		if ($this->penyesuaian->Required) {
			if (!$this->penyesuaian->IsDetailKey && $this->penyesuaian->FormValue != NULL && $this->penyesuaian->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->penyesuaian->caption(), $this->penyesuaian->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->penyesuaian->FormValue)) {
			AddMessage($FormError, $this->penyesuaian->errorMessage());
		}
		if ($this->status->Required) {
			if (!$this->status->IsDetailKey && $this->status->FormValue != NULL && $this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if ($this->potongan_bendahara->Required) {
			if (!$this->potongan_bendahara->IsDetailKey && $this->potongan_bendahara->FormValue != NULL && $this->potongan_bendahara->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->potongan_bendahara->caption(), $this->potongan_bendahara->RequiredErrorMessage));
			}
		}
		if ($this->voucher->Required) {
			if (!$this->voucher->IsDetailKey && $this->voucher->FormValue != NULL && $this->voucher->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->voucher->caption(), $this->voucher->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->voucher->FormValue)) {
			AddMessage($FormError, $this->voucher->errorMessage());
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

		// Check referential integrity for master table 'gaji_sma'
		$validMasterRecord = TRUE;
		$masterFilter = $this->sqlMasterFilter_m_sma();
		if (strval($this->bulan->CurrentValue) != "") {
			$masterFilter = str_replace("@bulan@", AdjustSql($this->bulan->CurrentValue, "DB"), $masterFilter);
		} else {
			$validMasterRecord = FALSE;
		}
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
		if ($validMasterRecord) {
			if (!isset($GLOBALS["m_sma"]))
				$GLOBALS["m_sma"] = new m_sma();
			$rsmaster = $GLOBALS["m_sma"]->loadRs($masterFilter);
			$validMasterRecord = ($rsmaster && !$rsmaster->EOF);
			$rsmaster->close();
		}
		if (!$validMasterRecord) {
			$relatedRecordMsg = str_replace("%t", "m_sma", $Language->phrase("RelatedRecordRequired"));
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

		// penyesuaian
		$this->penyesuaian->setDbValueDef($rsnew, $this->penyesuaian->CurrentValue, NULL, FALSE);

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, FALSE);

		// potongan_bendahara
		$this->potongan_bendahara->setDbValueDef($rsnew, $this->potongan_bendahara->CurrentValue, NULL, FALSE);

		// voucher
		$this->voucher->setDbValueDef($rsnew, $this->voucher->CurrentValue, NULL, FALSE);

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
			if ($masterTblVar == "m_sma") {
				$validMaster = TRUE;
				if (($parm = Get("fk_bulan", Get("bulan"))) !== NULL) {
					$GLOBALS["m_sma"]->bulan->setQueryStringValue($parm);
					$this->bulan->setQueryStringValue($GLOBALS["m_sma"]->bulan->QueryStringValue);
					$this->bulan->setSessionValue($this->bulan->QueryStringValue);
					if (!is_numeric($GLOBALS["m_sma"]->bulan->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_id", Get("pid"))) !== NULL) {
					$GLOBALS["m_sma"]->id->setQueryStringValue($parm);
					$this->pid->setQueryStringValue($GLOBALS["m_sma"]->id->QueryStringValue);
					$this->pid->setSessionValue($this->pid->QueryStringValue);
					if (!is_numeric($GLOBALS["m_sma"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_tahun", Get("tahun"))) !== NULL) {
					$GLOBALS["m_sma"]->tahun->setQueryStringValue($parm);
					$this->tahun->setQueryStringValue($GLOBALS["m_sma"]->tahun->QueryStringValue);
					$this->tahun->setSessionValue($this->tahun->QueryStringValue);
					if (!is_numeric($GLOBALS["m_sma"]->tahun->QueryStringValue))
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
			if ($masterTblVar == "m_sma") {
				$validMaster = TRUE;
				if (($parm = Post("fk_bulan", Post("bulan"))) !== NULL) {
					$GLOBALS["m_sma"]->bulan->setFormValue($parm);
					$this->bulan->setFormValue($GLOBALS["m_sma"]->bulan->FormValue);
					$this->bulan->setSessionValue($this->bulan->FormValue);
					if (!is_numeric($GLOBALS["m_sma"]->bulan->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_id", Post("pid"))) !== NULL) {
					$GLOBALS["m_sma"]->id->setFormValue($parm);
					$this->pid->setFormValue($GLOBALS["m_sma"]->id->FormValue);
					$this->pid->setSessionValue($this->pid->FormValue);
					if (!is_numeric($GLOBALS["m_sma"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_tahun", Post("tahun"))) !== NULL) {
					$GLOBALS["m_sma"]->tahun->setFormValue($parm);
					$this->tahun->setFormValue($GLOBALS["m_sma"]->tahun->FormValue);
					$this->tahun->setSessionValue($this->tahun->FormValue);
					if (!is_numeric($GLOBALS["m_sma"]->tahun->FormValue))
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
			if ($masterTblVar != "m_sma") {
				if ($this->bulan->CurrentValue == "")
					$this->bulan->setSessionValue("");
				if ($this->pid->CurrentValue == "")
					$this->pid->setSessionValue("");
				if ($this->tahun->CurrentValue == "")
					$this->tahun->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("gaji_smalist.php"), "", $this->TableVar, TRUE);
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
				case "x_type":
					break;
				case "x_jenis_guru":
					break;
				case "x_tambahan":
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
						case "x_type":
							break;
						case "x_jenis_guru":
							break;
						case "x_tambahan":
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
		$this->jabatan_id->ReadOnly = true;
		$this->jenjang_id->ReadOnly = true;
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