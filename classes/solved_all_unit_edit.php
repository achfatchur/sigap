<?php
namespace PHPMaker2020\sigap;

/**
 * Page class
 */
class solved_all_unit_edit extends solved_all_unit
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}";

	// Table name
	public $TableName = 'solved_all_unit';

	// Page object name
	public $PageObjName = "solved_all_unit_edit";

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

		// Table object (solved_all_unit)
		if (!isset($GLOBALS["solved_all_unit"]) || get_class($GLOBALS["solved_all_unit"]) == PROJECT_NAMESPACE . "solved_all_unit") {
			$GLOBALS["solved_all_unit"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["solved_all_unit"];
		}

		// Table object (pegawai)
		if (!isset($GLOBALS['pegawai']))
			$GLOBALS['pegawai'] = new pegawai();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'solved_all_unit');

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
		global $solved_all_unit;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($solved_all_unit);
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
					if ($pageName == "solved_all_unitview.php")
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
					$this->terminate(GetUrl("solved_all_unitlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->nip->setVisibility();
		$this->total_gaji->setVisibility();
		$this->j_pensiun->setVisibility();
		$this->hari_tua->setVisibility();
		$this->pph21->setVisibility();
		$this->golongan_bpjs->setVisibility();
		$this->iuran_bpjs->setVisibility();
		$this->bulan->setVisibility();
		$this->tahun->setVisibility();
		$this->type_peg->setVisibility();
		$this->unit->setVisibility();
		$this->tanggal->setVisibility();
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
		// Check permission

		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("solved_all_unitlist.php");
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
					$this->terminate("solved_all_unitlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "solved_all_unitlist.php")
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

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);

		// Check field name 'nip' first before field var 'x_nip'
		$val = $CurrentForm->hasValue("nip") ? $CurrentForm->getValue("nip") : $CurrentForm->getValue("x_nip");
		if (!$this->nip->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->nip->Visible = FALSE; // Disable update for API request
			else
				$this->nip->setFormValue($val);
		}

		// Check field name 'total_gaji' first before field var 'x_total_gaji'
		$val = $CurrentForm->hasValue("total_gaji") ? $CurrentForm->getValue("total_gaji") : $CurrentForm->getValue("x_total_gaji");
		if (!$this->total_gaji->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->total_gaji->Visible = FALSE; // Disable update for API request
			else
				$this->total_gaji->setFormValue($val);
		}

		// Check field name 'j_pensiun' first before field var 'x_j_pensiun'
		$val = $CurrentForm->hasValue("j_pensiun") ? $CurrentForm->getValue("j_pensiun") : $CurrentForm->getValue("x_j_pensiun");
		if (!$this->j_pensiun->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->j_pensiun->Visible = FALSE; // Disable update for API request
			else
				$this->j_pensiun->setFormValue($val);
		}

		// Check field name 'hari_tua' first before field var 'x_hari_tua'
		$val = $CurrentForm->hasValue("hari_tua") ? $CurrentForm->getValue("hari_tua") : $CurrentForm->getValue("x_hari_tua");
		if (!$this->hari_tua->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->hari_tua->Visible = FALSE; // Disable update for API request
			else
				$this->hari_tua->setFormValue($val);
		}

		// Check field name 'pph21' first before field var 'x_pph21'
		$val = $CurrentForm->hasValue("pph21") ? $CurrentForm->getValue("pph21") : $CurrentForm->getValue("x_pph21");
		if (!$this->pph21->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->pph21->Visible = FALSE; // Disable update for API request
			else
				$this->pph21->setFormValue($val);
		}

		// Check field name 'golongan_bpjs' first before field var 'x_golongan_bpjs'
		$val = $CurrentForm->hasValue("golongan_bpjs") ? $CurrentForm->getValue("golongan_bpjs") : $CurrentForm->getValue("x_golongan_bpjs");
		if (!$this->golongan_bpjs->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->golongan_bpjs->Visible = FALSE; // Disable update for API request
			else
				$this->golongan_bpjs->setFormValue($val);
		}

		// Check field name 'iuran_bpjs' first before field var 'x_iuran_bpjs'
		$val = $CurrentForm->hasValue("iuran_bpjs") ? $CurrentForm->getValue("iuran_bpjs") : $CurrentForm->getValue("x_iuran_bpjs");
		if (!$this->iuran_bpjs->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->iuran_bpjs->Visible = FALSE; // Disable update for API request
			else
				$this->iuran_bpjs->setFormValue($val);
		}

		// Check field name 'bulan' first before field var 'x_bulan'
		$val = $CurrentForm->hasValue("bulan") ? $CurrentForm->getValue("bulan") : $CurrentForm->getValue("x_bulan");
		if (!$this->bulan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->bulan->Visible = FALSE; // Disable update for API request
			else
				$this->bulan->setFormValue($val);
		}

		// Check field name 'tahun' first before field var 'x_tahun'
		$val = $CurrentForm->hasValue("tahun") ? $CurrentForm->getValue("tahun") : $CurrentForm->getValue("x_tahun");
		if (!$this->tahun->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tahun->Visible = FALSE; // Disable update for API request
			else
				$this->tahun->setFormValue($val);
		}

		// Check field name 'type_peg' first before field var 'x_type_peg'
		$val = $CurrentForm->hasValue("type_peg") ? $CurrentForm->getValue("type_peg") : $CurrentForm->getValue("x_type_peg");
		if (!$this->type_peg->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->type_peg->Visible = FALSE; // Disable update for API request
			else
				$this->type_peg->setFormValue($val);
		}

		// Check field name 'unit' first before field var 'x_unit'
		$val = $CurrentForm->hasValue("unit") ? $CurrentForm->getValue("unit") : $CurrentForm->getValue("x_unit");
		if (!$this->unit->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->unit->Visible = FALSE; // Disable update for API request
			else
				$this->unit->setFormValue($val);
		}

		// Check field name 'tanggal' first before field var 'x_tanggal'
		$val = $CurrentForm->hasValue("tanggal") ? $CurrentForm->getValue("tanggal") : $CurrentForm->getValue("x_tanggal");
		if (!$this->tanggal->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tanggal->Visible = FALSE; // Disable update for API request
			else
				$this->tanggal->setFormValue($val);
			$this->tanggal->CurrentValue = UnFormatDateTime($this->tanggal->CurrentValue, 0);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->nip->CurrentValue = $this->nip->FormValue;
		$this->total_gaji->CurrentValue = $this->total_gaji->FormValue;
		$this->j_pensiun->CurrentValue = $this->j_pensiun->FormValue;
		$this->hari_tua->CurrentValue = $this->hari_tua->FormValue;
		$this->pph21->CurrentValue = $this->pph21->FormValue;
		$this->golongan_bpjs->CurrentValue = $this->golongan_bpjs->FormValue;
		$this->iuran_bpjs->CurrentValue = $this->iuran_bpjs->FormValue;
		$this->bulan->CurrentValue = $this->bulan->FormValue;
		$this->tahun->CurrentValue = $this->tahun->FormValue;
		$this->type_peg->CurrentValue = $this->type_peg->FormValue;
		$this->unit->CurrentValue = $this->unit->FormValue;
		$this->tanggal->CurrentValue = $this->tanggal->FormValue;
		$this->tanggal->CurrentValue = UnFormatDateTime($this->tanggal->CurrentValue, 0);
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
		$this->nip->setDbValue($row['nip']);
		$this->total_gaji->setDbValue($row['total_gaji']);
		$this->j_pensiun->setDbValue($row['j_pensiun']);
		$this->hari_tua->setDbValue($row['hari_tua']);
		$this->pph21->setDbValue($row['pph21']);
		$this->golongan_bpjs->setDbValue($row['golongan_bpjs']);
		$this->iuran_bpjs->setDbValue($row['iuran_bpjs']);
		$this->bulan->setDbValue($row['bulan']);
		$this->tahun->setDbValue($row['tahun']);
		$this->type_peg->setDbValue($row['type_peg']);
		$this->unit->setDbValue($row['unit']);
		$this->tanggal->setDbValue($row['tanggal']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['nip'] = NULL;
		$row['total_gaji'] = NULL;
		$row['j_pensiun'] = NULL;
		$row['hari_tua'] = NULL;
		$row['pph21'] = NULL;
		$row['golongan_bpjs'] = NULL;
		$row['iuran_bpjs'] = NULL;
		$row['bulan'] = NULL;
		$row['tahun'] = NULL;
		$row['type_peg'] = NULL;
		$row['unit'] = NULL;
		$row['tanggal'] = NULL;
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
		// nip
		// total_gaji
		// j_pensiun
		// hari_tua
		// pph21
		// golongan_bpjs
		// iuran_bpjs
		// bulan
		// tahun
		// type_peg
		// unit
		// tanggal

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// nip
			$this->nip->ViewValue = $this->nip->CurrentValue;
			$this->nip->ViewCustomAttributes = "";

			// total_gaji
			$this->total_gaji->ViewValue = $this->total_gaji->CurrentValue;
			$this->total_gaji->ViewValue = FormatNumber($this->total_gaji->ViewValue, 0, -2, -2, -2);
			$this->total_gaji->ViewCustomAttributes = "";

			// j_pensiun
			$this->j_pensiun->ViewValue = $this->j_pensiun->CurrentValue;
			$this->j_pensiun->ViewValue = FormatNumber($this->j_pensiun->ViewValue, 0, -2, -2, -2);
			$this->j_pensiun->ViewCustomAttributes = "";

			// hari_tua
			$this->hari_tua->ViewValue = $this->hari_tua->CurrentValue;
			$this->hari_tua->ViewValue = FormatNumber($this->hari_tua->ViewValue, 0, -2, -2, -2);
			$this->hari_tua->ViewCustomAttributes = "";

			// pph21
			$this->pph21->ViewValue = $this->pph21->CurrentValue;
			$this->pph21->ViewValue = FormatNumber($this->pph21->ViewValue, 0, -2, -2, -2);
			$this->pph21->ViewCustomAttributes = "";

			// golongan_bpjs
			$this->golongan_bpjs->ViewValue = $this->golongan_bpjs->CurrentValue;
			$this->golongan_bpjs->ViewValue = FormatNumber($this->golongan_bpjs->ViewValue, 0, -2, -2, -2);
			$this->golongan_bpjs->ViewCustomAttributes = "";

			// iuran_bpjs
			$this->iuran_bpjs->ViewValue = $this->iuran_bpjs->CurrentValue;
			$this->iuran_bpjs->ViewValue = FormatNumber($this->iuran_bpjs->ViewValue, 0, -2, -2, -2);
			$this->iuran_bpjs->ViewCustomAttributes = "";

			// bulan
			$this->bulan->ViewValue = $this->bulan->CurrentValue;
			$this->bulan->ViewValue = FormatNumber($this->bulan->ViewValue, 0, -2, -2, -2);
			$this->bulan->ViewCustomAttributes = "";

			// tahun
			$this->tahun->ViewValue = $this->tahun->CurrentValue;
			$this->tahun->ViewValue = FormatNumber($this->tahun->ViewValue, 0, -2, -2, -2);
			$this->tahun->ViewCustomAttributes = "";

			// type_peg
			$this->type_peg->ViewValue = $this->type_peg->CurrentValue;
			$this->type_peg->ViewValue = FormatNumber($this->type_peg->ViewValue, 0, -2, -2, -2);
			$this->type_peg->ViewCustomAttributes = "";

			// unit
			$this->unit->ViewValue = $this->unit->CurrentValue;
			$this->unit->ViewValue = FormatNumber($this->unit->ViewValue, 0, -2, -2, -2);
			$this->unit->ViewCustomAttributes = "";

			// tanggal
			$this->tanggal->ViewValue = $this->tanggal->CurrentValue;
			$this->tanggal->ViewValue = FormatDateTime($this->tanggal->ViewValue, 0);
			$this->tanggal->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// nip
			$this->nip->LinkCustomAttributes = "";
			$this->nip->HrefValue = "";
			$this->nip->TooltipValue = "";

			// total_gaji
			$this->total_gaji->LinkCustomAttributes = "";
			$this->total_gaji->HrefValue = "";
			$this->total_gaji->TooltipValue = "";

			// j_pensiun
			$this->j_pensiun->LinkCustomAttributes = "";
			$this->j_pensiun->HrefValue = "";
			$this->j_pensiun->TooltipValue = "";

			// hari_tua
			$this->hari_tua->LinkCustomAttributes = "";
			$this->hari_tua->HrefValue = "";
			$this->hari_tua->TooltipValue = "";

			// pph21
			$this->pph21->LinkCustomAttributes = "";
			$this->pph21->HrefValue = "";
			$this->pph21->TooltipValue = "";

			// golongan_bpjs
			$this->golongan_bpjs->LinkCustomAttributes = "";
			$this->golongan_bpjs->HrefValue = "";
			$this->golongan_bpjs->TooltipValue = "";

			// iuran_bpjs
			$this->iuran_bpjs->LinkCustomAttributes = "";
			$this->iuran_bpjs->HrefValue = "";
			$this->iuran_bpjs->TooltipValue = "";

			// bulan
			$this->bulan->LinkCustomAttributes = "";
			$this->bulan->HrefValue = "";
			$this->bulan->TooltipValue = "";

			// tahun
			$this->tahun->LinkCustomAttributes = "";
			$this->tahun->HrefValue = "";
			$this->tahun->TooltipValue = "";

			// type_peg
			$this->type_peg->LinkCustomAttributes = "";
			$this->type_peg->HrefValue = "";
			$this->type_peg->TooltipValue = "";

			// unit
			$this->unit->LinkCustomAttributes = "";
			$this->unit->HrefValue = "";
			$this->unit->TooltipValue = "";

			// tanggal
			$this->tanggal->LinkCustomAttributes = "";
			$this->tanggal->HrefValue = "";
			$this->tanggal->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// nip
			$this->nip->EditAttrs["class"] = "form-control";
			$this->nip->EditCustomAttributes = "";
			if (!$this->nip->Raw)
				$this->nip->CurrentValue = HtmlDecode($this->nip->CurrentValue);
			$this->nip->EditValue = HtmlEncode($this->nip->CurrentValue);
			$this->nip->PlaceHolder = RemoveHtml($this->nip->caption());

			// total_gaji
			$this->total_gaji->EditAttrs["class"] = "form-control";
			$this->total_gaji->EditCustomAttributes = "";
			$this->total_gaji->EditValue = HtmlEncode($this->total_gaji->CurrentValue);
			$this->total_gaji->PlaceHolder = RemoveHtml($this->total_gaji->caption());

			// j_pensiun
			$this->j_pensiun->EditAttrs["class"] = "form-control";
			$this->j_pensiun->EditCustomAttributes = "";
			$this->j_pensiun->EditValue = HtmlEncode($this->j_pensiun->CurrentValue);
			$this->j_pensiun->PlaceHolder = RemoveHtml($this->j_pensiun->caption());

			// hari_tua
			$this->hari_tua->EditAttrs["class"] = "form-control";
			$this->hari_tua->EditCustomAttributes = "";
			$this->hari_tua->EditValue = HtmlEncode($this->hari_tua->CurrentValue);
			$this->hari_tua->PlaceHolder = RemoveHtml($this->hari_tua->caption());

			// pph21
			$this->pph21->EditAttrs["class"] = "form-control";
			$this->pph21->EditCustomAttributes = "";
			$this->pph21->EditValue = HtmlEncode($this->pph21->CurrentValue);
			$this->pph21->PlaceHolder = RemoveHtml($this->pph21->caption());

			// golongan_bpjs
			$this->golongan_bpjs->EditAttrs["class"] = "form-control";
			$this->golongan_bpjs->EditCustomAttributes = "";
			$this->golongan_bpjs->EditValue = HtmlEncode($this->golongan_bpjs->CurrentValue);
			$this->golongan_bpjs->PlaceHolder = RemoveHtml($this->golongan_bpjs->caption());

			// iuran_bpjs
			$this->iuran_bpjs->EditAttrs["class"] = "form-control";
			$this->iuran_bpjs->EditCustomAttributes = "";
			$this->iuran_bpjs->EditValue = HtmlEncode($this->iuran_bpjs->CurrentValue);
			$this->iuran_bpjs->PlaceHolder = RemoveHtml($this->iuran_bpjs->caption());

			// bulan
			$this->bulan->EditAttrs["class"] = "form-control";
			$this->bulan->EditCustomAttributes = "";
			$this->bulan->EditValue = HtmlEncode($this->bulan->CurrentValue);
			$this->bulan->PlaceHolder = RemoveHtml($this->bulan->caption());

			// tahun
			$this->tahun->EditAttrs["class"] = "form-control";
			$this->tahun->EditCustomAttributes = "";
			$this->tahun->EditValue = HtmlEncode($this->tahun->CurrentValue);
			$this->tahun->PlaceHolder = RemoveHtml($this->tahun->caption());

			// type_peg
			$this->type_peg->EditAttrs["class"] = "form-control";
			$this->type_peg->EditCustomAttributes = "";
			$this->type_peg->EditValue = HtmlEncode($this->type_peg->CurrentValue);
			$this->type_peg->PlaceHolder = RemoveHtml($this->type_peg->caption());

			// unit
			$this->unit->EditAttrs["class"] = "form-control";
			$this->unit->EditCustomAttributes = "";
			$this->unit->EditValue = HtmlEncode($this->unit->CurrentValue);
			$this->unit->PlaceHolder = RemoveHtml($this->unit->caption());

			// tanggal
			$this->tanggal->EditAttrs["class"] = "form-control";
			$this->tanggal->EditCustomAttributes = "";
			$this->tanggal->EditValue = HtmlEncode(FormatDateTime($this->tanggal->CurrentValue, 8));
			$this->tanggal->PlaceHolder = RemoveHtml($this->tanggal->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// nip
			$this->nip->LinkCustomAttributes = "";
			$this->nip->HrefValue = "";

			// total_gaji
			$this->total_gaji->LinkCustomAttributes = "";
			$this->total_gaji->HrefValue = "";

			// j_pensiun
			$this->j_pensiun->LinkCustomAttributes = "";
			$this->j_pensiun->HrefValue = "";

			// hari_tua
			$this->hari_tua->LinkCustomAttributes = "";
			$this->hari_tua->HrefValue = "";

			// pph21
			$this->pph21->LinkCustomAttributes = "";
			$this->pph21->HrefValue = "";

			// golongan_bpjs
			$this->golongan_bpjs->LinkCustomAttributes = "";
			$this->golongan_bpjs->HrefValue = "";

			// iuran_bpjs
			$this->iuran_bpjs->LinkCustomAttributes = "";
			$this->iuran_bpjs->HrefValue = "";

			// bulan
			$this->bulan->LinkCustomAttributes = "";
			$this->bulan->HrefValue = "";

			// tahun
			$this->tahun->LinkCustomAttributes = "";
			$this->tahun->HrefValue = "";

			// type_peg
			$this->type_peg->LinkCustomAttributes = "";
			$this->type_peg->HrefValue = "";

			// unit
			$this->unit->LinkCustomAttributes = "";
			$this->unit->HrefValue = "";

			// tanggal
			$this->tanggal->LinkCustomAttributes = "";
			$this->tanggal->HrefValue = "";
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
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->nip->Required) {
			if (!$this->nip->IsDetailKey && $this->nip->FormValue != NULL && $this->nip->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nip->caption(), $this->nip->RequiredErrorMessage));
			}
		}
		if ($this->total_gaji->Required) {
			if (!$this->total_gaji->IsDetailKey && $this->total_gaji->FormValue != NULL && $this->total_gaji->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->total_gaji->caption(), $this->total_gaji->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->total_gaji->FormValue)) {
			AddMessage($FormError, $this->total_gaji->errorMessage());
		}
		if ($this->j_pensiun->Required) {
			if (!$this->j_pensiun->IsDetailKey && $this->j_pensiun->FormValue != NULL && $this->j_pensiun->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->j_pensiun->caption(), $this->j_pensiun->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->j_pensiun->FormValue)) {
			AddMessage($FormError, $this->j_pensiun->errorMessage());
		}
		if ($this->hari_tua->Required) {
			if (!$this->hari_tua->IsDetailKey && $this->hari_tua->FormValue != NULL && $this->hari_tua->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hari_tua->caption(), $this->hari_tua->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->hari_tua->FormValue)) {
			AddMessage($FormError, $this->hari_tua->errorMessage());
		}
		if ($this->pph21->Required) {
			if (!$this->pph21->IsDetailKey && $this->pph21->FormValue != NULL && $this->pph21->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pph21->caption(), $this->pph21->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->pph21->FormValue)) {
			AddMessage($FormError, $this->pph21->errorMessage());
		}
		if ($this->golongan_bpjs->Required) {
			if (!$this->golongan_bpjs->IsDetailKey && $this->golongan_bpjs->FormValue != NULL && $this->golongan_bpjs->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->golongan_bpjs->caption(), $this->golongan_bpjs->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->golongan_bpjs->FormValue)) {
			AddMessage($FormError, $this->golongan_bpjs->errorMessage());
		}
		if ($this->iuran_bpjs->Required) {
			if (!$this->iuran_bpjs->IsDetailKey && $this->iuran_bpjs->FormValue != NULL && $this->iuran_bpjs->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->iuran_bpjs->caption(), $this->iuran_bpjs->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->iuran_bpjs->FormValue)) {
			AddMessage($FormError, $this->iuran_bpjs->errorMessage());
		}
		if ($this->bulan->Required) {
			if (!$this->bulan->IsDetailKey && $this->bulan->FormValue != NULL && $this->bulan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->bulan->caption(), $this->bulan->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->bulan->FormValue)) {
			AddMessage($FormError, $this->bulan->errorMessage());
		}
		if ($this->tahun->Required) {
			if (!$this->tahun->IsDetailKey && $this->tahun->FormValue != NULL && $this->tahun->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tahun->caption(), $this->tahun->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->tahun->FormValue)) {
			AddMessage($FormError, $this->tahun->errorMessage());
		}
		if ($this->type_peg->Required) {
			if (!$this->type_peg->IsDetailKey && $this->type_peg->FormValue != NULL && $this->type_peg->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->type_peg->caption(), $this->type_peg->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->type_peg->FormValue)) {
			AddMessage($FormError, $this->type_peg->errorMessage());
		}
		if ($this->unit->Required) {
			if (!$this->unit->IsDetailKey && $this->unit->FormValue != NULL && $this->unit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->unit->caption(), $this->unit->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->unit->FormValue)) {
			AddMessage($FormError, $this->unit->errorMessage());
		}
		if ($this->tanggal->Required) {
			if (!$this->tanggal->IsDetailKey && $this->tanggal->FormValue != NULL && $this->tanggal->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tanggal->caption(), $this->tanggal->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->tanggal->FormValue)) {
			AddMessage($FormError, $this->tanggal->errorMessage());
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

			// nip
			$this->nip->setDbValueDef($rsnew, $this->nip->CurrentValue, NULL, $this->nip->ReadOnly);

			// total_gaji
			$this->total_gaji->setDbValueDef($rsnew, $this->total_gaji->CurrentValue, NULL, $this->total_gaji->ReadOnly);

			// j_pensiun
			$this->j_pensiun->setDbValueDef($rsnew, $this->j_pensiun->CurrentValue, NULL, $this->j_pensiun->ReadOnly);

			// hari_tua
			$this->hari_tua->setDbValueDef($rsnew, $this->hari_tua->CurrentValue, NULL, $this->hari_tua->ReadOnly);

			// pph21
			$this->pph21->setDbValueDef($rsnew, $this->pph21->CurrentValue, NULL, $this->pph21->ReadOnly);

			// golongan_bpjs
			$this->golongan_bpjs->setDbValueDef($rsnew, $this->golongan_bpjs->CurrentValue, NULL, $this->golongan_bpjs->ReadOnly);

			// iuran_bpjs
			$this->iuran_bpjs->setDbValueDef($rsnew, $this->iuran_bpjs->CurrentValue, NULL, $this->iuran_bpjs->ReadOnly);

			// bulan
			$this->bulan->setDbValueDef($rsnew, $this->bulan->CurrentValue, NULL, $this->bulan->ReadOnly);

			// tahun
			$this->tahun->setDbValueDef($rsnew, $this->tahun->CurrentValue, NULL, $this->tahun->ReadOnly);

			// type_peg
			$this->type_peg->setDbValueDef($rsnew, $this->type_peg->CurrentValue, NULL, $this->type_peg->ReadOnly);

			// unit
			$this->unit->setDbValueDef($rsnew, $this->unit->CurrentValue, NULL, $this->unit->ReadOnly);

			// tanggal
			$this->tanggal->setDbValueDef($rsnew, UnFormatDateTime($this->tanggal->CurrentValue, 0), NULL, $this->tanggal->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("solved_all_unitlist.php"), "", $this->TableVar, TRUE);
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