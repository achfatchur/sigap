<?php
namespace PHPMaker2020\sigap;

/**
 * Page class
 */
class potongan_edit extends potongan
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}";

	// Table name
	public $TableName = 'potongan';

	// Page object name
	public $PageObjName = "potongan_edit";

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

		// Table object (potongan)
		if (!isset($GLOBALS["potongan"]) || get_class($GLOBALS["potongan"]) == PROJECT_NAMESPACE . "potongan") {
			$GLOBALS["potongan"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["potongan"];
		}

		// Table object (pegawai)
		if (!isset($GLOBALS['pegawai']))
			$GLOBALS['pegawai'] = new pegawai();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'potongan');

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
		global $potongan;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($potongan);
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
					if ($pageName == "potonganview.php")
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
	public $FormClassName = "ew-horizontal ew-form ew-edit-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter;
	public $DbDetailFilter;

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
			if (!$Security->canEdit()) {
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
			if (!$Security->canEdit()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("potonganlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->datetime->setVisibility();
		$this->u_by->setVisibility();
		$this->month->setVisibility();
		$this->nama->setVisibility();
		$this->jenjang_id->setVisibility();
		$this->jabatan_id->setVisibility();
		$this->terlambat->setVisibility();
		$this->value_terlambat->setVisibility();
		$this->izin->setVisibility();
		$this->value_izin->setVisibility();
		$this->sakit->setVisibility();
		$this->value_sakit->Visible = FALSE;
		$this->tidakhadir->setVisibility();
		$this->value_tidakhadir->Visible = FALSE;
		$this->pulcep->setVisibility();
		$this->value_pulcep->setVisibility();
		$this->tidakhadirjam->setVisibility();
		$this->tidakhadirjamvalue->setVisibility();
		$this->sakitperjam->setVisibility();
		$this->sakitperjamvalue->setVisibility();
		$this->izinperjam->setVisibility();
		$this->izinperjamvalue->setVisibility();
		$this->totalpotongan->setVisibility();
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
		$this->setupLookupOptions($this->u_by);
		$this->setupLookupOptions($this->nama);
		$this->setupLookupOptions($this->jenjang_id);
		$this->setupLookupOptions($this->jabatan_id);

		// Check permission
		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("potonganlist.php");
			return;
		}

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-edit-form ew-horizontal";
		$loaded = FALSE;
		$postBack = FALSE;

		// Set up current action and primary key
		if (IsApi()) {

			// Load key values
			$loaded = TRUE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$this->id->setOldValue($this->id->QueryStringValue);
			} elseif (Key(0) !== NULL) {
				$this->id->setQueryStringValue(Key(0));
				$this->id->setOldValue($this->id->QueryStringValue);
			} elseif (Post("id") !== NULL) {
				$this->id->setFormValue(Post("id"));
				$this->id->setOldValue($this->id->FormValue);
			} elseif (Route(2) !== NULL) {
				$this->id->setQueryStringValue(Route(2));
				$this->id->setOldValue($this->id->QueryStringValue);
			} else {
				$loaded = FALSE; // Unable to load key
			}

			// Load record
			if ($loaded)
				$loaded = $this->loadRow();
			if (!$loaded) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
				$this->terminate();
				return;
			}
			$this->CurrentAction = "update"; // Update record directly
			$postBack = TRUE;
		} else {
			if (Post("action") !== NULL) {
				$this->CurrentAction = Post("action"); // Get action code
				if (!$this->isShow()) // Not reload record, handle as postback
					$postBack = TRUE;

				// Load key from Form
				if ($CurrentForm->hasValue("x_id")) {
					$this->id->setFormValue($CurrentForm->getValue("x_id"));
				}
			} else {
				$this->CurrentAction = "show"; // Default action is display

				// Load key from QueryString / Route
				$loadByQuery = FALSE;
				if (Get("id") !== NULL) {
					$this->id->setQueryStringValue(Get("id"));
					$loadByQuery = TRUE;
				} elseif (Route(2) !== NULL) {
					$this->id->setQueryStringValue(Route(2));
					$loadByQuery = TRUE;
				} else {
					$this->id->CurrentValue = NULL;
				}
			}

			// Load current record
			$loaded = $this->loadRow();
		}

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->setFailureMessage($FormError);
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues();
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = ""; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "show": // Get a record to display
				if (!$loaded) { // Load record based on key
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("potonganlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "potonganlist.php")
					$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
				$this->SendEmail = TRUE; // Send email on update success
				if ($this->editRow()) { // Update record based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
					if (IsApi()) {
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl); // Return to caller
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
					$this->terminate($returnUrl); // Return to caller
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Restore form values if update failed
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render the record
		$this->RowType = ROWTYPE_EDIT; // Render as Edit
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'datetime' first before field var 'x_datetime'
		$val = $CurrentForm->hasValue("datetime") ? $CurrentForm->getValue("datetime") : $CurrentForm->getValue("x_datetime");
		if (!$this->datetime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->datetime->Visible = FALSE; // Disable update for API request
			else
				$this->datetime->setFormValue($val);
			$this->datetime->CurrentValue = UnFormatDateTime($this->datetime->CurrentValue, 0);
		}

		// Check field name 'u_by' first before field var 'x_u_by'
		$val = $CurrentForm->hasValue("u_by") ? $CurrentForm->getValue("u_by") : $CurrentForm->getValue("x_u_by");
		if (!$this->u_by->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->u_by->Visible = FALSE; // Disable update for API request
			else
				$this->u_by->setFormValue($val);
		}

		// Check field name 'month' first before field var 'x_month'
		$val = $CurrentForm->hasValue("month") ? $CurrentForm->getValue("month") : $CurrentForm->getValue("x_month");
		if (!$this->month->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->month->Visible = FALSE; // Disable update for API request
			else
				$this->month->setFormValue($val);
			$this->month->CurrentValue = UnFormatDateTime($this->month->CurrentValue, 0);
		}

		// Check field name 'nama' first before field var 'x_nama'
		$val = $CurrentForm->hasValue("nama") ? $CurrentForm->getValue("nama") : $CurrentForm->getValue("x_nama");
		if (!$this->nama->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->nama->Visible = FALSE; // Disable update for API request
			else
				$this->nama->setFormValue($val);
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

		// Check field name 'terlambat' first before field var 'x_terlambat'
		$val = $CurrentForm->hasValue("terlambat") ? $CurrentForm->getValue("terlambat") : $CurrentForm->getValue("x_terlambat");
		if (!$this->terlambat->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->terlambat->Visible = FALSE; // Disable update for API request
			else
				$this->terlambat->setFormValue($val);
		}

		// Check field name 'value_terlambat' first before field var 'x_value_terlambat'
		$val = $CurrentForm->hasValue("value_terlambat") ? $CurrentForm->getValue("value_terlambat") : $CurrentForm->getValue("x_value_terlambat");
		if (!$this->value_terlambat->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->value_terlambat->Visible = FALSE; // Disable update for API request
			else
				$this->value_terlambat->setFormValue($val);
		}

		// Check field name 'izin' first before field var 'x_izin'
		$val = $CurrentForm->hasValue("izin") ? $CurrentForm->getValue("izin") : $CurrentForm->getValue("x_izin");
		if (!$this->izin->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->izin->Visible = FALSE; // Disable update for API request
			else
				$this->izin->setFormValue($val);
		}

		// Check field name 'value_izin' first before field var 'x_value_izin'
		$val = $CurrentForm->hasValue("value_izin") ? $CurrentForm->getValue("value_izin") : $CurrentForm->getValue("x_value_izin");
		if (!$this->value_izin->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->value_izin->Visible = FALSE; // Disable update for API request
			else
				$this->value_izin->setFormValue($val);
		}

		// Check field name 'sakit' first before field var 'x_sakit'
		$val = $CurrentForm->hasValue("sakit") ? $CurrentForm->getValue("sakit") : $CurrentForm->getValue("x_sakit");
		if (!$this->sakit->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sakit->Visible = FALSE; // Disable update for API request
			else
				$this->sakit->setFormValue($val);
		}

		// Check field name 'tidakhadir' first before field var 'x_tidakhadir'
		$val = $CurrentForm->hasValue("tidakhadir") ? $CurrentForm->getValue("tidakhadir") : $CurrentForm->getValue("x_tidakhadir");
		if (!$this->tidakhadir->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tidakhadir->Visible = FALSE; // Disable update for API request
			else
				$this->tidakhadir->setFormValue($val);
		}

		// Check field name 'pulcep' first before field var 'x_pulcep'
		$val = $CurrentForm->hasValue("pulcep") ? $CurrentForm->getValue("pulcep") : $CurrentForm->getValue("x_pulcep");
		if (!$this->pulcep->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->pulcep->Visible = FALSE; // Disable update for API request
			else
				$this->pulcep->setFormValue($val);
		}

		// Check field name 'value_pulcep' first before field var 'x_value_pulcep'
		$val = $CurrentForm->hasValue("value_pulcep") ? $CurrentForm->getValue("value_pulcep") : $CurrentForm->getValue("x_value_pulcep");
		if (!$this->value_pulcep->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->value_pulcep->Visible = FALSE; // Disable update for API request
			else
				$this->value_pulcep->setFormValue($val);
		}

		// Check field name 'tidakhadirjam' first before field var 'x_tidakhadirjam'
		$val = $CurrentForm->hasValue("tidakhadirjam") ? $CurrentForm->getValue("tidakhadirjam") : $CurrentForm->getValue("x_tidakhadirjam");
		if (!$this->tidakhadirjam->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tidakhadirjam->Visible = FALSE; // Disable update for API request
			else
				$this->tidakhadirjam->setFormValue($val);
		}

		// Check field name 'tidakhadirjamvalue' first before field var 'x_tidakhadirjamvalue'
		$val = $CurrentForm->hasValue("tidakhadirjamvalue") ? $CurrentForm->getValue("tidakhadirjamvalue") : $CurrentForm->getValue("x_tidakhadirjamvalue");
		if (!$this->tidakhadirjamvalue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tidakhadirjamvalue->Visible = FALSE; // Disable update for API request
			else
				$this->tidakhadirjamvalue->setFormValue($val);
		}

		// Check field name 'sakitperjam' first before field var 'x_sakitperjam'
		$val = $CurrentForm->hasValue("sakitperjam") ? $CurrentForm->getValue("sakitperjam") : $CurrentForm->getValue("x_sakitperjam");
		if (!$this->sakitperjam->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sakitperjam->Visible = FALSE; // Disable update for API request
			else
				$this->sakitperjam->setFormValue($val);
		}

		// Check field name 'sakitperjamvalue' first before field var 'x_sakitperjamvalue'
		$val = $CurrentForm->hasValue("sakitperjamvalue") ? $CurrentForm->getValue("sakitperjamvalue") : $CurrentForm->getValue("x_sakitperjamvalue");
		if (!$this->sakitperjamvalue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sakitperjamvalue->Visible = FALSE; // Disable update for API request
			else
				$this->sakitperjamvalue->setFormValue($val);
		}

		// Check field name 'izinperjam' first before field var 'x_izinperjam'
		$val = $CurrentForm->hasValue("izinperjam") ? $CurrentForm->getValue("izinperjam") : $CurrentForm->getValue("x_izinperjam");
		if (!$this->izinperjam->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->izinperjam->Visible = FALSE; // Disable update for API request
			else
				$this->izinperjam->setFormValue($val);
		}

		// Check field name 'izinperjamvalue' first before field var 'x_izinperjamvalue'
		$val = $CurrentForm->hasValue("izinperjamvalue") ? $CurrentForm->getValue("izinperjamvalue") : $CurrentForm->getValue("x_izinperjamvalue");
		if (!$this->izinperjamvalue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->izinperjamvalue->Visible = FALSE; // Disable update for API request
			else
				$this->izinperjamvalue->setFormValue($val);
		}

		// Check field name 'totalpotongan' first before field var 'x_totalpotongan'
		$val = $CurrentForm->hasValue("totalpotongan") ? $CurrentForm->getValue("totalpotongan") : $CurrentForm->getValue("x_totalpotongan");
		if (!$this->totalpotongan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->totalpotongan->Visible = FALSE; // Disable update for API request
			else
				$this->totalpotongan->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->datetime->CurrentValue = $this->datetime->FormValue;
		$this->datetime->CurrentValue = UnFormatDateTime($this->datetime->CurrentValue, 0);
		$this->u_by->CurrentValue = $this->u_by->FormValue;
		$this->month->CurrentValue = $this->month->FormValue;
		$this->month->CurrentValue = UnFormatDateTime($this->month->CurrentValue, 0);
		$this->nama->CurrentValue = $this->nama->FormValue;
		$this->jenjang_id->CurrentValue = $this->jenjang_id->FormValue;
		$this->jabatan_id->CurrentValue = $this->jabatan_id->FormValue;
		$this->terlambat->CurrentValue = $this->terlambat->FormValue;
		$this->value_terlambat->CurrentValue = $this->value_terlambat->FormValue;
		$this->izin->CurrentValue = $this->izin->FormValue;
		$this->value_izin->CurrentValue = $this->value_izin->FormValue;
		$this->sakit->CurrentValue = $this->sakit->FormValue;
		$this->tidakhadir->CurrentValue = $this->tidakhadir->FormValue;
		$this->pulcep->CurrentValue = $this->pulcep->FormValue;
		$this->value_pulcep->CurrentValue = $this->value_pulcep->FormValue;
		$this->tidakhadirjam->CurrentValue = $this->tidakhadirjam->FormValue;
		$this->tidakhadirjamvalue->CurrentValue = $this->tidakhadirjamvalue->FormValue;
		$this->sakitperjam->CurrentValue = $this->sakitperjam->FormValue;
		$this->sakitperjamvalue->CurrentValue = $this->sakitperjamvalue->FormValue;
		$this->izinperjam->CurrentValue = $this->izinperjam->FormValue;
		$this->izinperjamvalue->CurrentValue = $this->izinperjamvalue->FormValue;
		$this->totalpotongan->CurrentValue = $this->totalpotongan->FormValue;
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
		$this->nama->setDbValue($row['nama']);
		$this->jenjang_id->setDbValue($row['jenjang_id']);
		$this->jabatan_id->setDbValue($row['jabatan_id']);
		$this->terlambat->setDbValue($row['terlambat']);
		$this->value_terlambat->setDbValue($row['value_terlambat']);
		$this->izin->setDbValue($row['izin']);
		$this->value_izin->setDbValue($row['value_izin']);
		$this->sakit->setDbValue($row['sakit']);
		$this->value_sakit->setDbValue($row['value_sakit']);
		$this->tidakhadir->setDbValue($row['tidakhadir']);
		$this->value_tidakhadir->setDbValue($row['value_tidakhadir']);
		$this->pulcep->setDbValue($row['pulcep']);
		$this->value_pulcep->setDbValue($row['value_pulcep']);
		$this->tidakhadirjam->setDbValue($row['tidakhadirjam']);
		$this->tidakhadirjamvalue->setDbValue($row['tidakhadirjamvalue']);
		$this->sakitperjam->setDbValue($row['sakitperjam']);
		$this->sakitperjamvalue->setDbValue($row['sakitperjamvalue']);
		$this->izinperjam->setDbValue($row['izinperjam']);
		$this->izinperjamvalue->setDbValue($row['izinperjamvalue']);
		$this->totalpotongan->setDbValue($row['totalpotongan']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['datetime'] = NULL;
		$row['u_by'] = NULL;
		$row['month'] = NULL;
		$row['nama'] = NULL;
		$row['jenjang_id'] = NULL;
		$row['jabatan_id'] = NULL;
		$row['terlambat'] = NULL;
		$row['value_terlambat'] = NULL;
		$row['izin'] = NULL;
		$row['value_izin'] = NULL;
		$row['sakit'] = NULL;
		$row['value_sakit'] = NULL;
		$row['tidakhadir'] = NULL;
		$row['value_tidakhadir'] = NULL;
		$row['pulcep'] = NULL;
		$row['value_pulcep'] = NULL;
		$row['tidakhadirjam'] = NULL;
		$row['tidakhadirjamvalue'] = NULL;
		$row['sakitperjam'] = NULL;
		$row['sakitperjamvalue'] = NULL;
		$row['izinperjam'] = NULL;
		$row['izinperjamvalue'] = NULL;
		$row['totalpotongan'] = NULL;
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
		// u_by
		// month
		// nama
		// jenjang_id
		// jabatan_id
		// terlambat
		// value_terlambat
		// izin
		// value_izin
		// sakit
		// value_sakit
		// tidakhadir
		// value_tidakhadir
		// pulcep
		// value_pulcep
		// tidakhadirjam
		// tidakhadirjamvalue
		// sakitperjam
		// sakitperjamvalue
		// izinperjam
		// izinperjamvalue
		// totalpotongan

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

			// month
			$this->month->ViewValue = $this->month->CurrentValue;
			$this->month->ViewValue = FormatDateTime($this->month->ViewValue, 0);
			$this->month->ViewCustomAttributes = "";

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

			// sakit
			$this->sakit->ViewValue = $this->sakit->CurrentValue;
			$this->sakit->ViewValue = FormatNumber($this->sakit->ViewValue, 0, -2, -2, -2);
			$this->sakit->ViewCustomAttributes = "";

			// value_sakit
			$this->value_sakit->ViewValue = $this->value_sakit->CurrentValue;
			$this->value_sakit->ViewValue = FormatNumber($this->value_sakit->ViewValue, 0, -2, -2, -2);
			$this->value_sakit->ViewCustomAttributes = "";

			// tidakhadir
			$this->tidakhadir->ViewValue = $this->tidakhadir->CurrentValue;
			$this->tidakhadir->ViewValue = FormatNumber($this->tidakhadir->ViewValue, 0, -2, -2, -2);
			$this->tidakhadir->ViewCustomAttributes = "";

			// value_tidakhadir
			$this->value_tidakhadir->ViewValue = $this->value_tidakhadir->CurrentValue;
			$this->value_tidakhadir->ViewValue = FormatNumber($this->value_tidakhadir->ViewValue, 0, -2, -2, -2);
			$this->value_tidakhadir->ViewCustomAttributes = "";

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

			// sakitperjam
			$this->sakitperjam->ViewValue = $this->sakitperjam->CurrentValue;
			$this->sakitperjam->ViewValue = FormatNumber($this->sakitperjam->ViewValue, 0, -2, -2, -2);
			$this->sakitperjam->ViewCustomAttributes = "";

			// sakitperjamvalue
			$this->sakitperjamvalue->ViewValue = $this->sakitperjamvalue->CurrentValue;
			$this->sakitperjamvalue->ViewValue = FormatNumber($this->sakitperjamvalue->ViewValue, 0, -2, -2, -2);
			$this->sakitperjamvalue->ViewCustomAttributes = "";

			// izinperjam
			$this->izinperjam->ViewValue = $this->izinperjam->CurrentValue;
			$this->izinperjam->ViewValue = FormatNumber($this->izinperjam->ViewValue, 0, -2, -2, -2);
			$this->izinperjam->ViewCustomAttributes = "";

			// izinperjamvalue
			$this->izinperjamvalue->ViewValue = $this->izinperjamvalue->CurrentValue;
			$this->izinperjamvalue->ViewValue = FormatNumber($this->izinperjamvalue->ViewValue, 0, -2, -2, -2);
			$this->izinperjamvalue->ViewCustomAttributes = "";

			// totalpotongan
			$this->totalpotongan->ViewValue = $this->totalpotongan->CurrentValue;
			$this->totalpotongan->ViewValue = FormatNumber($this->totalpotongan->ViewValue, 0, -2, -2, -2);
			$this->totalpotongan->ViewCustomAttributes = "";

			// datetime
			$this->datetime->LinkCustomAttributes = "";
			$this->datetime->HrefValue = "";
			$this->datetime->TooltipValue = "";

			// u_by
			$this->u_by->LinkCustomAttributes = "";
			$this->u_by->HrefValue = "";
			$this->u_by->TooltipValue = "";

			// month
			$this->month->LinkCustomAttributes = "";
			$this->month->HrefValue = "";
			$this->month->TooltipValue = "";

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

			// sakit
			$this->sakit->LinkCustomAttributes = "";
			$this->sakit->HrefValue = "";
			$this->sakit->TooltipValue = "";

			// tidakhadir
			$this->tidakhadir->LinkCustomAttributes = "";
			$this->tidakhadir->HrefValue = "";
			$this->tidakhadir->TooltipValue = "";

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

			// sakitperjam
			$this->sakitperjam->LinkCustomAttributes = "";
			$this->sakitperjam->HrefValue = "";
			$this->sakitperjam->TooltipValue = "";

			// sakitperjamvalue
			$this->sakitperjamvalue->LinkCustomAttributes = "";
			$this->sakitperjamvalue->HrefValue = "";
			$this->sakitperjamvalue->TooltipValue = "";

			// izinperjam
			$this->izinperjam->LinkCustomAttributes = "";
			$this->izinperjam->HrefValue = "";
			$this->izinperjam->TooltipValue = "";

			// izinperjamvalue
			$this->izinperjamvalue->LinkCustomAttributes = "";
			$this->izinperjamvalue->HrefValue = "";
			$this->izinperjamvalue->TooltipValue = "";

			// totalpotongan
			$this->totalpotongan->LinkCustomAttributes = "";
			$this->totalpotongan->HrefValue = "";
			$this->totalpotongan->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// datetime
			// u_by
			// month

			$this->month->EditAttrs["class"] = "form-control";
			$this->month->EditCustomAttributes = "";
			$this->month->EditValue = HtmlEncode(FormatDateTime($this->month->CurrentValue, 8));
			$this->month->PlaceHolder = RemoveHtml($this->month->caption());

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
			$this->jenjang_id->EditValue = $this->jenjang_id->CurrentValue;
			$curVal = strval($this->jenjang_id->CurrentValue);
			if ($curVal != "") {
				$this->jenjang_id->EditValue = $this->jenjang_id->lookupCacheOption($curVal);
				if ($this->jenjang_id->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->jenjang_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->jenjang_id->EditValue = $this->jenjang_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->jenjang_id->EditValue = $this->jenjang_id->CurrentValue;
					}
				}
			} else {
				$this->jenjang_id->EditValue = NULL;
			}
			$this->jenjang_id->ViewCustomAttributes = "";

			// jabatan_id
			$this->jabatan_id->EditAttrs["class"] = "form-control";
			$this->jabatan_id->EditCustomAttributes = "";
			$this->jabatan_id->EditValue = $this->jabatan_id->CurrentValue;
			$curVal = strval($this->jabatan_id->CurrentValue);
			if ($curVal != "") {
				$this->jabatan_id->EditValue = $this->jabatan_id->lookupCacheOption($curVal);
				if ($this->jabatan_id->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->jabatan_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->jabatan_id->EditValue = $this->jabatan_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->jabatan_id->EditValue = $this->jabatan_id->CurrentValue;
					}
				}
			} else {
				$this->jabatan_id->EditValue = NULL;
			}
			$this->jabatan_id->ViewCustomAttributes = "";

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

			// sakit
			$this->sakit->EditAttrs["class"] = "form-control";
			$this->sakit->EditCustomAttributes = "";
			$this->sakit->EditValue = HtmlEncode($this->sakit->CurrentValue);
			$this->sakit->PlaceHolder = RemoveHtml($this->sakit->caption());

			// tidakhadir
			$this->tidakhadir->EditAttrs["class"] = "form-control";
			$this->tidakhadir->EditCustomAttributes = "";
			$this->tidakhadir->EditValue = HtmlEncode($this->tidakhadir->CurrentValue);
			$this->tidakhadir->PlaceHolder = RemoveHtml($this->tidakhadir->caption());

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

			// month
			$this->month->LinkCustomAttributes = "";
			$this->month->HrefValue = "";

			// nama
			$this->nama->LinkCustomAttributes = "";
			$this->nama->HrefValue = "";

			// jenjang_id
			$this->jenjang_id->LinkCustomAttributes = "";
			$this->jenjang_id->HrefValue = "";
			$this->jenjang_id->TooltipValue = "";

			// jabatan_id
			$this->jabatan_id->LinkCustomAttributes = "";
			$this->jabatan_id->HrefValue = "";
			$this->jabatan_id->TooltipValue = "";

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

			// sakit
			$this->sakit->LinkCustomAttributes = "";
			$this->sakit->HrefValue = "";

			// tidakhadir
			$this->tidakhadir->LinkCustomAttributes = "";
			$this->tidakhadir->HrefValue = "";

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

			// sakitperjam
			$this->sakitperjam->LinkCustomAttributes = "";
			$this->sakitperjam->HrefValue = "";

			// sakitperjamvalue
			$this->sakitperjamvalue->LinkCustomAttributes = "";
			$this->sakitperjamvalue->HrefValue = "";

			// izinperjam
			$this->izinperjam->LinkCustomAttributes = "";
			$this->izinperjam->HrefValue = "";

			// izinperjamvalue
			$this->izinperjamvalue->LinkCustomAttributes = "";
			$this->izinperjamvalue->HrefValue = "";

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

		// Initialize form error message
		$FormError = "";

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
		if ($this->month->Required) {
			if (!$this->month->IsDetailKey && $this->month->FormValue != NULL && $this->month->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->month->caption(), $this->month->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->month->FormValue)) {
			AddMessage($FormError, $this->month->errorMessage());
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
		if ($this->jabatan_id->Required) {
			if (!$this->jabatan_id->IsDetailKey && $this->jabatan_id->FormValue != NULL && $this->jabatan_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->jabatan_id->caption(), $this->jabatan_id->RequiredErrorMessage));
			}
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
		if ($this->sakit->Required) {
			if (!$this->sakit->IsDetailKey && $this->sakit->FormValue != NULL && $this->sakit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sakit->caption(), $this->sakit->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->sakit->FormValue)) {
			AddMessage($FormError, $this->sakit->errorMessage());
		}
		if ($this->tidakhadir->Required) {
			if (!$this->tidakhadir->IsDetailKey && $this->tidakhadir->FormValue != NULL && $this->tidakhadir->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tidakhadir->caption(), $this->tidakhadir->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->tidakhadir->FormValue)) {
			AddMessage($FormError, $this->tidakhadir->errorMessage());
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

			// month
			$this->month->setDbValueDef($rsnew, UnFormatDateTime($this->month->CurrentValue, 0), NULL, $this->month->ReadOnly);

			// nama
			$this->nama->setDbValueDef($rsnew, $this->nama->CurrentValue, NULL, $this->nama->ReadOnly);

			// terlambat
			$this->terlambat->setDbValueDef($rsnew, $this->terlambat->CurrentValue, NULL, $this->terlambat->ReadOnly);

			// value_terlambat
			$this->value_terlambat->setDbValueDef($rsnew, $this->value_terlambat->CurrentValue, NULL, $this->value_terlambat->ReadOnly);

			// izin
			$this->izin->setDbValueDef($rsnew, $this->izin->CurrentValue, NULL, $this->izin->ReadOnly);

			// value_izin
			$this->value_izin->setDbValueDef($rsnew, $this->value_izin->CurrentValue, NULL, $this->value_izin->ReadOnly);

			// sakit
			$this->sakit->setDbValueDef($rsnew, $this->sakit->CurrentValue, NULL, $this->sakit->ReadOnly);

			// tidakhadir
			$this->tidakhadir->setDbValueDef($rsnew, $this->tidakhadir->CurrentValue, NULL, $this->tidakhadir->ReadOnly);

			// pulcep
			$this->pulcep->setDbValueDef($rsnew, $this->pulcep->CurrentValue, NULL, $this->pulcep->ReadOnly);

			// value_pulcep
			$this->value_pulcep->setDbValueDef($rsnew, $this->value_pulcep->CurrentValue, NULL, $this->value_pulcep->ReadOnly);

			// tidakhadirjam
			$this->tidakhadirjam->setDbValueDef($rsnew, $this->tidakhadirjam->CurrentValue, NULL, $this->tidakhadirjam->ReadOnly);

			// tidakhadirjamvalue
			$this->tidakhadirjamvalue->setDbValueDef($rsnew, $this->tidakhadirjamvalue->CurrentValue, NULL, $this->tidakhadirjamvalue->ReadOnly);

			// sakitperjam
			$this->sakitperjam->setDbValueDef($rsnew, $this->sakitperjam->CurrentValue, NULL, $this->sakitperjam->ReadOnly);

			// sakitperjamvalue
			$this->sakitperjamvalue->setDbValueDef($rsnew, $this->sakitperjamvalue->CurrentValue, NULL, $this->sakitperjamvalue->ReadOnly);

			// izinperjam
			$this->izinperjam->setDbValueDef($rsnew, $this->izinperjam->CurrentValue, NULL, $this->izinperjam->ReadOnly);

			// izinperjamvalue
			$this->izinperjamvalue->setDbValueDef($rsnew, $this->izinperjamvalue->CurrentValue, NULL, $this->izinperjamvalue->ReadOnly);

			// totalpotongan
			$this->totalpotongan->setDbValueDef($rsnew, $this->totalpotongan->CurrentValue, NULL, $this->totalpotongan->ReadOnly);

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

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("potonganlist.php"), "", $this->TableVar, TRUE);
		$pageId = "edit";
		$Breadcrumb->add("edit", $pageId, $url);
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
				case "x_nama":
					break;
				case "x_jenjang_id":
					break;
				case "x_jabatan_id":
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
						case "x_nama":
							break;
						case "x_jenjang_id":
							break;
						case "x_jabatan_id":
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
} // End class
?>