<?php namespace PHPMaker2020\sigap; ?>
<?php

/**
 * Table class for m_penyesuaian
 */
class m_penyesuaian extends DbTable
{
	protected $SqlFrom = "";
	protected $SqlSelect = "";
	protected $SqlSelectList = "";
	protected $SqlWhere = "";
	protected $SqlGroupBy = "";
	protected $SqlHaving = "";
	protected $SqlOrderBy = "";
	public $UseSessionForListSql = TRUE;

	// Column CSS classes
	public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
	public $RightColumnClass = "col-sm-10";
	public $OffsetColumnClass = "col-sm-10 offset-sm-2";
	public $TableLeftColumnClass = "w-col-2";

	// Export
	public $ExportDoc;

	// Fields
	public $id;
	public $bulan;
	public $tahun;
	public $c_by;
	public $datetime;
	public $import_file;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'm_penyesuaian';
		$this->TableName = 'm_penyesuaian';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`m_penyesuaian`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('m_penyesuaian', 'm_penyesuaian', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->IsForeignKey = TRUE; // Foreign key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// bulan
		$this->bulan = new DbField('m_penyesuaian', 'm_penyesuaian', 'x_bulan', 'bulan', '`bulan`', '`bulan`', 3, 11, -1, FALSE, '`bulan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->bulan->Sortable = TRUE; // Allow sort
		$this->bulan->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->bulan->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->bulan->Lookup = new Lookup('bulan', 'bulan', FALSE, 'id', ["bulan","","",""], [], [], [], [], [], [], '', '');
		$this->bulan->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['bulan'] = &$this->bulan;

		// tahun
		$this->tahun = new DbField('m_penyesuaian', 'm_penyesuaian', 'x_tahun', 'tahun', '`tahun`', '`tahun`', 3, 11, -1, FALSE, '`tahun`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tahun->Sortable = TRUE; // Allow sort
		$this->tahun->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['tahun'] = &$this->tahun;

		// c_by
		$this->c_by = new DbField('m_penyesuaian', 'm_penyesuaian', 'x_c_by', 'c_by', '`c_by`', '`c_by`', 3, 11, -1, FALSE, '`c_by`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->c_by->Sortable = TRUE; // Allow sort
		$this->c_by->Lookup = new Lookup('c_by', 'pegawai', FALSE, 'id', ["nama","","",""], [], [], [], [], [], [], '', '');
		$this->c_by->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['c_by'] = &$this->c_by;

		// datetime
		$this->datetime = new DbField('m_penyesuaian', 'm_penyesuaian', 'x_datetime', 'datetime', '`datetime`', CastDateFieldForLike("`datetime`", 0, "DB"), 135, 19, 0, FALSE, '`datetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->datetime->Sortable = TRUE; // Allow sort
		$this->datetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['datetime'] = &$this->datetime;

		// import_file
		$this->import_file = new DbField('m_penyesuaian', 'm_penyesuaian', 'x_import_file', 'import_file', '`import_file`', '`import_file`', 201, 65535, -1, TRUE, '`import_file`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'FILE');
		$this->import_file->Sortable = TRUE; // Allow sort
		$this->fields['import_file'] = &$this->import_file;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
	function setLeftColumnClass($class)
	{
		if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
			$this->LeftColumnClass = $class . " col-form-label ew-label";
			$this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
			$this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
			$this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
		}
	}

	// Single column sort
	public function updateSort(&$fld)
	{
		if ($this->CurrentOrder == $fld->Name) {
			$sortField = $fld->Expression;
			$lastSort = $fld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$thisSort = $this->CurrentOrderType;
			} else {
				$thisSort = ($lastSort == "ASC") ? "DESC" : "ASC";
			}
			$fld->setSort($thisSort);
			$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Current detail table name
	public function getCurrentDetailTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE")];
	}
	public function setCurrentDetailTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE")] = $v;
	}

	// Get detail url
	public function getDetailUrl()
	{

		// Detail url
		$detailUrl = "";
		if ($this->getCurrentDetailTable() == "penyesuaian") {
			$detailUrl = $GLOBALS["penyesuaian"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "m_penyesuaianlist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`m_penyesuaian`";
	}
	public function sqlFrom() // For backward compatibility
	{
		return $this->getSqlFrom();
	}
	public function setSqlFrom($v)
	{
		$this->SqlFrom = $v;
	}
	public function getSqlSelect() // Select
	{
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
	}
	public function getSqlWhere() // Where
	{
		$where = ($this->SqlWhere != "") ? $this->SqlWhere : "";
		$this->TableFilter = "";
		AddFilter($where, $this->TableFilter);
		return $where;
	}
	public function sqlWhere() // For backward compatibility
	{
		return $this->getSqlWhere();
	}
	public function setSqlWhere($v)
	{
		$this->SqlWhere = $v;
	}
	public function getSqlGroupBy() // Group By
	{
		return ($this->SqlGroupBy != "") ? $this->SqlGroupBy : "";
	}
	public function sqlGroupBy() // For backward compatibility
	{
		return $this->getSqlGroupBy();
	}
	public function setSqlGroupBy($v)
	{
		$this->SqlGroupBy = $v;
	}
	public function getSqlHaving() // Having
	{
		return ($this->SqlHaving != "") ? $this->SqlHaving : "";
	}
	public function sqlHaving() // For backward compatibility
	{
		return $this->getSqlHaving();
	}
	public function setSqlHaving($v)
	{
		$this->SqlHaving = $v;
	}
	public function getSqlOrderBy() // Order By
	{
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "";
	}
	public function sqlOrderBy() // For backward compatibility
	{
		return $this->getSqlOrderBy();
	}
	public function setSqlOrderBy($v)
	{
		$this->SqlOrderBy = $v;
	}

	// Apply User ID filters
	public function applyUserIDFilters($filter, $id = "")
	{
		return $filter;
	}

	// Check if User ID security allows view all
	public function userIDAllow($id = "")
	{
		$allow = $this->UserIDAllowSecurity;
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
			case "lookup":
				return (($allow & 256) == 256);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get recordset
	public function getRecordset($sql, $rowcnt = -1, $offset = -1)
	{
		$conn = $this->getConnection();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->selectLimit($sql, $rowcnt, $offset);
		$conn->raiseErrorFn = "";
		return $rs;
	}

	// Get record count
	public function getRecordCount($sql, $c = NULL)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) &&
			!preg_match('/^\s*select\s+distinct\s+/i', $sql) && !preg_match('/\s+order\s+by\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = $c ?: $this->getConnection();
		if ($rs = $conn->execute($sqlwrk)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->close();
			}
			return (int)$cnt;
		}

		// Unable to get count, get record count directly
		if ($rs = $conn->execute($sql)) {
			$cnt = $rs->RecordCount();
			$rs->close();
			return (int)$cnt;
		}
		return $cnt;
	}

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table SQL
	public function getCurrentSql()
	{
		$filter = $this->CurrentFilter;
		$filter = $this->applyUserIDFilters($filter);
		$sort = $this->getSessionOrderBy();
		return $this->getSql($filter, $sort);
	}

	// Table SQL with List page filter
	public function getListSql()
	{
		$filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->getSqlSelect();
		$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Get record count based on filter (for detail record count in master table pages)
	public function loadRecordCount($filter)
	{
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $filter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
		$cnt = $this->getRecordCount($sql);
		$this->CurrentFilter = $origFilter;
		return $cnt;
	}

	// Get record count (for current List page)
	public function listRecordCount()
	{
		$filter = $this->getSessionWhere();
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		$cnt = $this->getRecordCount($sql);
		return $cnt;
	}

	// INSERT statement
	protected function insertSql(&$rs)
	{
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom)
				continue;
			$names .= $this->fields[$name]->Expression . ",";
			$values .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$names = preg_replace('/,+$/', "", $names);
		$values = preg_replace('/,+$/', "", $values);
		return "INSERT INTO " . $this->UpdateTable . " (" . $names . ") VALUES (" . $values . ")";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = $this->getConnection();
		$success = $conn->execute($this->insertSql($rs));
		if ($success) {

			// Get insert id if necessary
			$this->id->setDbValue($conn->insert_ID());
			$rs['id'] = $this->id->DbValue;
		}
		return $success;
	}

	// UPDATE statement
	protected function updateSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsAutoIncrement)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter != "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = $this->getConnection();
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		return $success;
	}

	// DELETE statement
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
			if (array_key_exists('id', $rs))
				AddFilter($where, QuotedName('id', $this->Dbid) . '=' . QuotedValue($rs['id'], $this->id->DataType, $this->Dbid));
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		AddFilter($filter, $where);
		if ($filter != "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = $this->getConnection();
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->id->DbValue = $row['id'];
		$this->bulan->DbValue = $row['bulan'];
		$this->tahun->DbValue = $row['tahun'];
		$this->c_by->DbValue = $row['c_by'];
		$this->datetime->DbValue = $row['datetime'];
		$this->import_file->Upload->DbValue = $row['import_file'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
		$oldFiles = EmptyValue($row['import_file']) ? [] : [$row['import_file']];
		foreach ($oldFiles as $oldFile) {
			if (file_exists($this->import_file->oldPhysicalUploadPath() . $oldFile))
				@unlink($this->import_file->oldPhysicalUploadPath() . $oldFile);
		}
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`id` = @id@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('id', $row) ? $row['id'] : NULL;
		else
			$val = $this->id->OldValue !== NULL ? $this->id->OldValue : $this->id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		return $keyFilter;
	}

	// Return page URL
	public function getReturnUrl()
	{
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] != "") {
			return $_SESSION[$name];
		} else {
			return "m_penyesuaianlist.php";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL")] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "m_penyesuaianview.php")
			return $Language->phrase("View");
		elseif ($pageName == "m_penyesuaianedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "m_penyesuaianadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "m_penyesuaianlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("m_penyesuaianview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("m_penyesuaianview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "m_penyesuaianadd.php?" . $this->getUrlParm($parm);
		else
			$url = "m_penyesuaianadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("m_penyesuaianedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("m_penyesuaianedit.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Inline edit URL
	public function getInlineEditUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
		return $this->addMasterUrl($url);
	}

	// Copy URL
	public function getCopyUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("m_penyesuaianadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("m_penyesuaianadd.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Inline copy URL
	public function getInlineCopyUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
		return $this->addMasterUrl($url);
	}

	// Delete URL
	public function getDeleteUrl()
	{
		return $this->keyUrl("m_penyesuaiandelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id:" . JsonEncode($this->id->CurrentValue, "number");
		$json = "{" . $json . "}";
		if ($htmlEncode)
			$json = HtmlEncode($json);
		return $json;
	}

	// Add key value to URL
	public function keyUrl($url, $parm = "")
	{
		$url = $url . "?";
		if ($parm != "")
			$url .= $parm . "&";
		if ($this->id->CurrentValue != NULL) {
			$url .= "id=" . urlencode($this->id->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		if ($this->CurrentAction || $this->isExport() ||
			in_array($fld->Type, [128, 204, 205])) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort());
			return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
		} else {
			return "";
		}
	}

	// Get record keys from Post/Get/Session
	public function getRecordKeys()
	{
		$arKeys = [];
		$arKey = [];
		if (Param("key_m") !== NULL) {
			$arKeys = Param("key_m");
			$cnt = count($arKeys);
		} else {
			if (Param("id") !== NULL)
				$arKeys[] = Param("id");
			elseif (IsApi() && Key(0) !== NULL)
				$arKeys[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKeys[] = Route(2);
			else
				$arKeys = NULL; // Do not setup

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = [];
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_numeric($key))
					continue;
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get filter from record keys
	public function getFilterFromRecordKeys($setCurrent = TRUE)
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter != "") $keyFilter .= " OR ";
			if ($setCurrent)
				$this->id->CurrentValue = $key;
			else
				$this->id->OldValue = $key;
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = $this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->id->setDbValue($rs->fields('id'));
		$this->bulan->setDbValue($rs->fields('bulan'));
		$this->tahun->setDbValue($rs->fields('tahun'));
		$this->c_by->setDbValue($rs->fields('c_by'));
		$this->datetime->setDbValue($rs->fields('datetime'));
		$this->import_file->Upload->DbValue = $rs->fields('import_file');
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// bulan
		// tahun
		// c_by
		// datetime
		// import_file
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// bulan
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

		// tahun
		$this->tahun->ViewValue = $this->tahun->CurrentValue;
		$this->tahun->ViewCustomAttributes = "";

		// c_by
		$this->c_by->ViewValue = $this->c_by->CurrentValue;
		$curVal = strval($this->c_by->CurrentValue);
		if ($curVal != "") {
			$this->c_by->ViewValue = $this->c_by->lookupCacheOption($curVal);
			if ($this->c_by->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->c_by->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->c_by->ViewValue = $this->c_by->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->c_by->ViewValue = $this->c_by->CurrentValue;
				}
			}
		} else {
			$this->c_by->ViewValue = NULL;
		}
		$this->c_by->ViewCustomAttributes = "";

		// datetime
		$this->datetime->ViewValue = $this->datetime->CurrentValue;
		$this->datetime->ViewValue = FormatDateTime($this->datetime->ViewValue, 0);
		$this->datetime->ViewCustomAttributes = "";

		// import_file
		if (!EmptyValue($this->import_file->Upload->DbValue)) {
			$this->import_file->ViewValue = $this->import_file->Upload->DbValue;
		} else {
			$this->import_file->ViewValue = "";
		}
		$this->import_file->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// bulan
		$this->bulan->LinkCustomAttributes = "";
		$this->bulan->HrefValue = "";
		$this->bulan->TooltipValue = "";

		// tahun
		$this->tahun->LinkCustomAttributes = "";
		$this->tahun->HrefValue = "";
		$this->tahun->TooltipValue = "";

		// c_by
		$this->c_by->LinkCustomAttributes = "";
		$this->c_by->HrefValue = "";
		$this->c_by->TooltipValue = "";

		// datetime
		$this->datetime->LinkCustomAttributes = "";
		$this->datetime->HrefValue = "";
		$this->datetime->TooltipValue = "";

		// import_file
		$this->import_file->LinkCustomAttributes = "";
		$this->import_file->HrefValue = "";
		$this->import_file->ExportHrefValue = $this->import_file->UploadPath . $this->import_file->Upload->DbValue;
		$this->import_file->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();

		// Save data for Custom Template
		$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Render edit row values
	public function renderEditRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// id
		$this->id->EditAttrs["class"] = "form-control";
		$this->id->EditCustomAttributes = "";
		$this->id->EditValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// bulan
		$this->bulan->EditAttrs["class"] = "form-control";
		$this->bulan->EditCustomAttributes = "";

		// tahun
		$this->tahun->EditAttrs["class"] = "form-control";
		$this->tahun->EditCustomAttributes = "";
		$this->tahun->EditValue = $this->tahun->CurrentValue;
		$this->tahun->PlaceHolder = RemoveHtml($this->tahun->caption());

		// c_by
		// datetime
		// import_file

		$this->import_file->EditAttrs["class"] = "form-control";
		$this->import_file->EditCustomAttributes = "";
		if (!EmptyValue($this->import_file->Upload->DbValue)) {
			$this->import_file->EditValue = $this->import_file->Upload->DbValue;
		} else {
			$this->import_file->EditValue = "";
		}
		if (!EmptyValue($this->import_file->CurrentValue))
				$this->import_file->Upload->FileName = $this->import_file->CurrentValue;

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
	{
		if (!$recordset || !$doc)
			return;
		if (!$doc->ExportCustom) {

			// Write header
			$doc->exportTableHeader();
			if ($doc->Horizontal) { // Horizontal format, write header
				$doc->beginExportRow();
				if ($exportPageType == "view") {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->bulan);
					$doc->exportCaption($this->tahun);
					$doc->exportCaption($this->c_by);
					$doc->exportCaption($this->datetime);
					$doc->exportCaption($this->import_file);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->bulan);
					$doc->exportCaption($this->tahun);
					$doc->exportCaption($this->c_by);
					$doc->exportCaption($this->datetime);
				}
				$doc->endExportRow();
			}
		}

		// Move to first record
		$recCnt = $startRec - 1;
		if (!$recordset->EOF) {
			$recordset->moveFirst();
			if ($startRec > 1)
				$recordset->move($startRec - 1);
		}
		while (!$recordset->EOF && $recCnt < $stopRec) {
			$recCnt++;
			if ($recCnt >= $startRec) {
				$rowCnt = $recCnt - $startRec + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0)
						$doc->exportPageBreak();
				}
				$this->loadListRowValues($recordset);

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						$doc->exportField($this->id);
						$doc->exportField($this->bulan);
						$doc->exportField($this->tahun);
						$doc->exportField($this->c_by);
						$doc->exportField($this->datetime);
						$doc->exportField($this->import_file);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->bulan);
						$doc->exportField($this->tahun);
						$doc->exportField($this->c_by);
						$doc->exportField($this->datetime);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0)
	{
		$width = ($width > 0) ? $width : Config("THUMBNAIL_DEFAULT_WIDTH");
		$height = ($height > 0) ? $height : Config("THUMBNAIL_DEFAULT_HEIGHT");

		// Set up field name / file name field / file type field
		$fldName = "";
		$fileNameFld = "";
		$fileTypeFld = "";
		if ($fldparm == 'import_file') {
			$fldName = "import_file";
			$fileNameFld = "import_file";
		} else {
			return FALSE; // Incorrect field
		}

		// Set up key values
		$ar = explode(Config("COMPOSITE_KEY_SEPARATOR"), $key);
		if (count($ar) == 1) {
			$this->id->CurrentValue = $ar[0];
		} else {
			return FALSE; // Incorrect key
		}

		// Set up filter (WHERE Clause)
		$filter = $this->getRecordFilter();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$dbtype = GetConnectionType($this->Dbid);
		if (($rs = $conn->execute($sql)) && !$rs->EOF) {
			$val = $rs->fields($fldName);
			if (!EmptyValue($val)) {
				$fld = $this->fields[$fldName];

				// Binary data
				if ($fld->DataType == DATATYPE_BLOB) {
					if ($dbtype != "MYSQL") {
						if (is_array($val) || is_object($val)) // Byte array
							$val = BytesToString($val);
					}
					if ($resize)
						ResizeBinary($val, $width, $height);

					// Write file type
					if ($fileTypeFld != "" && !EmptyValue($rs->fields($fileTypeFld))) {
						AddHeader("Content-type", $rs->fields($fileTypeFld));
					} else {
						AddHeader("Content-type", ContentType($val));
					}

					// Write file name
					$downloadPdf = !Config("EMBED_PDF") && Config("DOWNLOAD_PDF_FILE");
					if ($fileNameFld != "" && !EmptyValue($rs->fields($fileNameFld))) {
						$fileName = $rs->fields($fileNameFld);
						$pathinfo = pathinfo($fileName);
						$ext = strtolower(@$pathinfo["extension"]);
						$isPdf = SameText($ext, "pdf");
						if ($downloadPdf || !$isPdf) // Skip header if not download PDF
							AddHeader("Content-Disposition", "attachment; filename=\"" . $fileName . "\"");
					} else {
						$ext = ContentExtension($val);
						$isPdf = SameText($ext, ".pdf");
						if ($isPdf && $downloadPdf) // Add header if download PDF
							AddHeader("Content-Disposition", "attachment; filename=\"" . $fileName . "\"");
					}

					// Write file data
					if (StartsString("PK", $val) && ContainsString($val, "[Content_Types].xml") &&
						ContainsString($val, "_rels") && ContainsString($val, "docProps")) { // Fix Office 2007 documents
						if (!EndsString("\0\0\0", $val)) // Not ends with 3 or 4 \0
							$val .= "\0\0\0\0";
					}

					// Clear any debug message
					if (ob_get_length())
						ob_end_clean();

					// Write binary data
					Write($val);

				// Upload to folder
				} else {
					if ($fld->UploadMultiple)
						$files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
					else
						$files = [$val];
					$data = [];
					$ar = [];
					foreach ($files as $file) {
						if (!EmptyValue($file))
							$ar[$file] = FullUrl($fld->hrefPath() . $file);
					}
					$data[$fld->Param] = $ar;
					WriteJson($data);
				}
			}
			$rs->close();
			return TRUE;
		}
		return FALSE;
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
	if(CurrentUserLevel() != '-1'){
	$nip = CurrentUserInfo("id");
	if($nip != '' OR $nip != FALSE) {
	AddFilter($filter, "c_by = $nip");
			}
		}
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

					$rsnew['datetime'] = date('Y-m-d H:i:s');
					$rsnew['c_by'] = CurrentUserInfo("id");
					$m_penyesuaian = ExecuteRow("SELECT * FROM m_penyesuaian WHERE bulan = '".$rsnew['bulan']."' AND tahun = '".$rsnew['tahun']."'");
					if(!empty($m_penyesuaian)){
						$delete_d = Execute("DELETE FROM penyesuaian WHERE m_id = '".$m_penyesuaian['id']."'");
						$delete_m = Execute("DELETE FROM m_penyesuaian WHERE id = '".$m_penyesuaian['id']."'");
					}
		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
$bulan = $rsnew['bulan'];
$tahun = $rsnew['tahun'];

//echo "Row Inserted"
if ($rsnew["import_file"]){
		$path2file = "files/".$rsnew["import_file"];
		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		if($reader) {
	$reader->setReadDataOnly(true);
	$spreadsheet = $reader->load($path2file);
	$worksheet = $spreadsheet->getActiveSheet();
	$highestRow = $worksheet->getHighestRow();
	$highestColumn = $worksheet->getHighestColumn();
	$startRowIdx = 2;
	$records = $worksheet->rangeToArray("B" . $startRowIdx . ":"  . $highestColumn. $highestRow);
	$XLSXdata = "";
	foreach($records as $row) {
	$jenjang = ExecuteScalar("SELECT nourut FROM tpendidikan WHERE name='".$row[1]."'");
	$data_pegawai = ExecuteRow("select * from pegawai where nip='".$row[0]."'");
	$pegawai = ExecuteRow("SELECT * FROM pegawai WHERE nip='".$row[0]."'");
	//terlambat untuk guru sama dengan absen guru
	$absen_guru = ExecuteScalar("SELECT perjam_value FROM m_tidakhadir WHERE jenjang_id='".$jenjang."' AND jabatan_id='".$data_pegawai["jabatan"]."' AND sertif='".$data_pegawai["sertif"]."'");
	$piket_guru =ExecuteScalar("SELECT value FROM m_piket WHERE jenjang='".$jenjang."' AND type_jabatan='".$data_pegawai["type"]."' AND jenis_sertif='".$data_pegawai["sertif"]."'");
	$izin_guru = ExecuteScalar("SELECT perjam_value FROM m_tidakhadir WHERE jenjang_id='".$jenjang."' AND jabatan_id='".$data_pegawai["jabatan"]."' AND sertif='".$data_pegawai["sertif"]."'");
	//$sakit_guru = ExecuteScalar("SELECT perhari FROM m_sakit WHERE jenjang_id='".$jenjang."' AND jabatan='".$data_pegawai["type"]."' AND sertif='".$data_pegawai["sertif"]."'");
	$sakit_jam_guru = ExecuteScalar("SELECT perjam FROM m_sakit WHERE jenjang_id='".$jenjang."' AND `type`='".$data_pegawai["type"]."' AND sertif='".$data_pegawai["sertif"]."'");

	$absen = ExecuteScalar("SELECT value FROM m_tidakhadir WHERE jenjang_id='".$jenjang."'");
	$izin = ExecuteScalar("SELECT value FROM m_tidakhadir WHERE jenjang_id='".$jenjang."' AND jabatan_id='".$data_pegawai["jabatan"]."'");
	$sakit = ExecuteScalar("SELECT perhari FROM m_sakit WHERE jenjang_id='".$jenjang."' AND jabatan='".$data_pegawai["jabatan"]."'");
	$absen_jam = ExecuteScalar("SELECT perjam_value FROM m_tidakhadir WHERE jenjang_id='".$jenjang."' AND jabatan_id='".$data_pegawai["jabatan"]."'");
	$izin_jam = ExecuteScalar("SELECT perjam_value FROM m_tidakhadir WHERE jenjang_id='".$jenjang."' AND jabatan_id='".$data_pegawai["jabatan"]."'");
	$sakit_jam = ExecuteScalar("SELECT perjam FROM m_sakit WHERE jenjang_id='".$jenjang."' AND jabatan='".$data_pegawai["jabatan"]."'");
	$telambat = ExecuteScalar("SELECT perjam_value FROM m_tidakhadir WHERE jenjang_id='".$jenjang."' AND jabatan_id='".$data_pegawai["jabatan"]."'");
	$pulang_cepat = ExecuteScalar("SELECT perhari FROM m_pulangcepat WHERE jenjang_id='".$jenjang."'");
	$piket = ExecuteScalar("SELECT value FROM m_piket WHERE jenjang='".$jenjang."' AND type_jabatan='".$data_pegawai["type"]."'");
	$inval = ExecuteScalar("SELECT value FROM m_inval WHERE jenjang_id='".$jenjang."' AND jabatan_id='".$data_pegawai["type"]."'");
	//print_r($inval);
	//die;
	$lembur = ExecuteScalar("SELECT value_perjam FROM m_lembur WHERE jenjang_id='".$jenjang."'");
	if($data_pegawai["type"] == '1'){
		$potongan_guru = ($absen_guru * $row[2]) + ($absen_guru * $row[4]) + ($sakit_jam_guru * $row[6]) + ($absen_guru * $row[3]) + ($izin_guru * $row[5]) + ($sakit_jam_guru * $row[7]) + ($absen_guru * $row[8]) + ($absen_guru * $row[9]);
		//print_r($test_absen);
		//die;
		$penyesuaian_guru = ($piket_guru * $row[10]) + ($inval * $row[11]) + ($lembur * $row[12]);
	}else{
		$potongan = ($absen * $row[2]) + ($izin * $row[4]) + ($sakit * $row[6]) + ($absen_jam * $row[3]) + ($izin_jam * $row[5]) + ($sakit_jam * $row[7]) + ($telambat * $row[8]) + ($pulang_cepat * $row[9]);
		$penyesuaian = ($piket * $row[10]) + ($inval * $row[11]) + ($lembur * $row[12]);
	}

	//$test_absen= $absen_guru * $row[2];
	//$test_sakit = $sakit_jam_guru * $row[6];



	//PENGECEKKAN DATA GAJI
	$gaji_sma = ExecuteRow("SELECT * FROM gaji_sma WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
	print_r($gaji_sma);
	die;
	$total_gaji_sma = $gaji_sma["total"]-$potongan_guru+$penyesuaian_guru;
			if(!empty($gaji_sma)){
				Execute("UPDATE gaji_sma SET total = '".$total_gaji_sma."',potongan = '".$potongan_guru."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian_guru."' WHERE id ='".$gaji_sma['id']."'");
				//Execute("UPDATE solved_all_unit SET total_gaji = '".$total_gaji_sma."' WHERE nip ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."' ");
				//print_r($total_gaji_sma);
				//die;
			}
	$gaji_tu_sma = ExecuteRow("SELECT * FROM gaji_tu_sma WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
	$total_gaji_tu_sma=$gaji_tu_sma["total"]-$potongan+$penyesuaian; 
			if(!empty($gaji_tu_sma)){
				Execute("UPDATE gaji_tu_sma SET total = '".$total_gaji_tu_sma."', potongan = '".$potongan."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian."' WHERE id ='".$gaji_tu_sma['id']."'");
				//Execute("UPDATE solved_all_unit SET total_gaji = '".$total_gaji_tu_sma."' WHERE nip ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."' ");
			}
	$gaji_karyawan_sma = ExecuteRow("SELECT * FROM gaji_karyawan_sma WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
	$total_gaji_karyawan_sma=$gaji_karyawan_sma["total"]-$potongan+$penyesuaian;
			if(!empty($gaji_karyawan_sma)){
				Execute("UPDATE gaji_karyawan_sma SET total='".$total_gaji_karyawan_sma."', potongan = '".$potongan."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian."' WHERE id ='".$gaji_karyawan_sma['id']."'");
				//Execute("UPDATE solved_all_unit SET total_gaji = '".$total_gaji_karyawan_sma."' WHERE nip ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."' ");
			}
	$gaji_smk = ExecuteRow("SELECT * FROM gaji_smk WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
	$total_gaji_smk = $gaji_smk["total"]-$potongan+$penyesuaian_guru;
			if(!empty($gaji_smk)){
				Execute("UPDATE gaji_smk SET total='".$total_gaji_smk."', potongan = '".$potongan."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian_guru."' WHERE id ='".$gaji_smk['id']."'");
				//Execute("UPDATE solved_all_unit SET total_gaji = '".$total_gaji_smk."' WHERE nip ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."' ");
			}
	$gaji_tu_smk = ExecuteRow("SELECT * FROM gaji_tu_smk WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
	$total_gaji_tu_smk = $gaji_tu_smk["total"]-$potongan+$penyesuaian;
			if(!empty($gaji_tu_smk)){
				Execute("UPDATE gaji_tu_smk SET total ='".$total_gaji_tu_smk."', potongan = '".$potongan."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian."' WHERE id ='".$gaji_tu_smk['id']."'");
				//Execute("UPDATE solved_all_unit SET total_gaji = '".$total_gaji_tu_smk."' WHERE nip ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."' ");
			}
	$gaji_karyawan_smk = ExecuteRow("SELECT * FROM gaji_karyawan_smk WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
	$total_gaji_karyawan_smk=$gaji_karyawan_smk["total"]-$potongan+$penyesuaian;
			if(!empty($gaji_karyawan_smk)){
				Execute("UPDATE gaji_karyawan_smk SET total='".$total_gaji_karyawan_smk."',potongan = '".$potongan."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian."' WHERE id ='".$gaji_karyawan_smk['id']."'");
				//Execute("UPDATE solved_all_unit SET total_gaji = '".$total_gaji_karyawan_smk."' WHERE nip ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."' ");
			}
	$gaji_smp = ExecuteRow("SELECT * FROM gaji_smp WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
	$total_gaji_smp = $gaji_smp["total"]-$potongan_guru+$penyesuaian_guru;
			if(!empty($gaji_smp)){
				Execute("UPDATE gaji_smp SET total='".$total_gaji_smp."',potongan = '".$potongan_guru."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian_guru."' WHERE id ='".$gaji_smp['id']."'");
				//Execute("UPDATE solved_all_unit SET total_gaji = '".$total_gaji_smp."' WHERE nip ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."' ");
			}
	$gaji_tu_smp = ExecuteRow("SELECT * FROM gaji_tu_smp WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
	$total_gaji_tu_smp = $gaji_tu_smp["total"]-$potongan+$penyesuaian;
			if(!empty($gaji_tu_smp)){
				Execute("UPDATE gaji_tu_smp SET total='".$total_gaji_tu_smp."',potongan = '".$potongan."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian."' WHERE id ='".$gaji_tu_smp['id']."'");
				//Execute("UPDATE solved_all_unit SET total_gaji = '".$total_gaji_tu_smp."' WHERE nip ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."' ");
			}
	$gaji_karyawan_smp = ExecuteRow("SELECT * FROM gaji_karyawan_smp WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
	$total_gaji_karyawan_smp=$gaji_karyawan_smp["total"]-$potongan+$penyesuaian;
			if(!empty($gaji_karyawan_smp)){
				Execute("UPDATE gaji_karyawan_smp SET total='".$total_gaji_karyawan_smp."', potongan = '".$potongan."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian."' WHERE id ='".$gaji_karyawan_smp['id']."'");
				//Execute("UPDATE solved_all_unit SET total_gaji = '".$total_gaji_karyawan_smp."' WHERE nip ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."' ");
			}
	$gaji = ExecuteRow("SELECT * FROM gaji WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
	$total_gaji_sd=$gaji["total"]-$potongan_guru+$penyesuaian_guru;
			if(!empty($gaji)){
				Execute("UPDATE gaji SET total='".$total_gaji_sd."',potongan = '".$potongan_guru."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian_guru."' WHERE id ='".$gaji['id']."'");
				//Execute("UPDATE solved_all_unit SET total_gaji = '".$total_gaji_sd."' WHERE nip ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."' ");
			}
	$gaji_tu_sd = ExecuteRow("SELECT * FROM gaji_tu_sd WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
	$total_gaji_tu_sd=$gaji_tu_sd["total"]-$potongan_guru+$penyesuaian;
			if(!empty($gaji_tu_sd)){
				Execute("UPDATE gaji_tu_sd SET total='".$total_gaji_tu_sd."' , potongan = '".$potongan_guru."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian."' WHERE id ='".$gaji_tu_sd['id']."'");
				//Execute("UPDATE solved_all_unit SET total_gaji = '".$total_gaji_tu_sd."' WHERE nip ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."' ");
			}
	$gaji_karyawan_sd = ExecuteRow("SELECT * FROM gaji_karyawan_sd WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
	$total_gaji_karyawan_sd=$gaji_karyawan_sd["total"]-$potongan+$penyesuaian;
			if(!empty($gaji_karyawan_sd)){
				Execute("UPDATE gaji_karyawan_sd SET total='".$total_gaji_karyawan_sd."',potongan = '".$potongan."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian."' WHERE id ='".$gaji_karyawan_sd['id']."'");
				//Execute("UPDATE solved_all_unit SET total_gaji = '".$total_gaji_karyawan_sd."' WHERE nip ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."' ");	
			}
	$gaji_tk = ExecuteRow("SELECT * FROM gaji_tk WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
	$total_gaji_tk=$gaji_tk["total"]-$potongan_guru+$penyesuaian_guru;
			if(!empty($gaji_tk)){
				Execute("UPDATE gaji_tk SET total='".$total_gaji_tk."' ,potongan = '".$potongan_guru."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian_guru."' WHERE id ='".$gaji_tk['id']."'");
				//Execute("UPDATE solved_all_unit SET total_gaji = '".$total_gaji_tk."' WHERE nip ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."' ");
			}
	$gaji_tu_tk = ExecuteRow("SELECT * FROM gaji_tu_tk WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
	$total_gaji_tu_tk=$gaji_tu_tk["total"]-$potongan+$penyesuaian;
			if(!empty($gaji_tu_tk)){
				Execute("UPDATE gaji_tu_tk SET total='".$total_gaji_tu_tk."' ,potongan = '".$potongan."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian."' WHERE id ='".$gaji_tu_tk['id']."'");
				//Execute("UPDATE solved_all_unit SET total_gaji = '".$total_gaji_tu_tk."' WHERE nip ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."' ");
			}
	$gaji_karyawan_tk = ExecuteRow("SELECT * FROM gaji_karyawan_tk WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
	$total_gaji_karyawan_tk=$gaji_karyawan_tk["total"]-$potongan+$penyesuaian;
			if(!empty($gaji_karyawan_tk)){
				Execute("UPDATE gaji_karyawan_tk SET total='".$total_gaji_karyawan_tk."',potongan = '".$potongan."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian."' WHERE id ='".$gaji_karyawan_tk['id']."'");
				//Execute("UPDATE solved_all_unit SET total_gaji = '".$total_gaji_karyawan_tk."' WHERE nip ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."' ");
			}
			$XLSXdata .= "("
			.("NULL").","
			."'".$rsnew["id"]."',"
			.("'".date('Y-m-d H:i:s')."'").","
			.(isset($row[0]) ? "'".$row[0]."'" : "NULL").","
			."'".$jenjang."',"
			.(isset($row[2]) ? "'".$row[2]."'" : "NULL").","
			.(isset($row[4]) ? "'".$row[4]."'" : "NULL").","
			.(isset($row[6]) ? "'".$row[6]."'" : "NULL").","
			.(isset($row[8]) ? "'".$row[8]."'" : "NULL").","
			.(isset($row[9]) ? "'".$row[9]."'" : "NULL").","
			.(isset($row[10]) ? "'".$row[10]."'" : "NULL").","
			.(isset($row[11]) ? "'".$row[11]."'" : "NULL").","
			.(isset($row[12]) ? "'".$row[12]."'" : "NULL").","
			."'".$potongan."',"
			."'".$penyesuaian."',"
			.(isset($row[13]) ? "'".$row[13]."'" : "NULL").","
			.(isset($row[3]) ? "'".$row[3]."'" : "NULL").","
			.(isset($row[5]) ? "'".$row[5]."'" : "NULL").","
			.(isset($row[7]) ? "'".$row[7]."'" : "NULL")."),";
		}
			if ($XLSXdata != "") {
				$myquery = "INSERT INTO `penyesuaian` VALUES ".rtrim($XLSXdata, ',') . ';';
				$myResult = Execute($myquery);
			}
	}
}
$this->terminate("penyesuaianlist.php?showmaster=m_penyesuaian&fk_id=".$rsnew["id"]."");
return TRUE;
}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		$bulan = $rsnew['bulan'];
		$tahun = $rsnew['tahun'];
		
		//echo "Row Inserted"
		if ($rsnew["import_file"]){
				$path2file = "files/".$rsnew["import_file"];
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
				if($reader) {
			$reader->setReadDataOnly(true);
			$spreadsheet = $reader->load($path2file);
			$worksheet = $spreadsheet->getActiveSheet();
			$highestRow = $worksheet->getHighestRow();
			$highestColumn = $worksheet->getHighestColumn();
			$startRowIdx = 2;
			$records = $worksheet->rangeToArray("B" . $startRowIdx . ":"  . $highestColumn. $highestRow);
			$XLSXdata = "";
			foreach($records as $row) {
			$jenjang = ExecuteScalar("SELECT nourut FROM tpendidikan WHERE name='".$row[1]."'");
			$data_pegawai = ExecuteRow("select * from pegawai where nip='".$row[0]."'");
			$pegawai = ExecuteRow("SELECT * FROM pegawai WHERE nip='".$row[0]."'");
			//terlambat untuk guru sama dengan absen guru
			$absen_guru = ExecuteScalar("SELECT perjam_value FROM m_tidakhadir WHERE jenjang_id='".$jenjang."' AND jabatan_id='".$data_pegawai["jabatan"]."' AND sertif='".$data_pegawai["sertif"]."'");
			$piket_guru =ExecuteScalar("SELECT value FROM m_piket WHERE jenjang='".$jenjang."' AND type_jabatan='".$data_pegawai["type"]."' AND jenis_sertif='".$data_pegawai["sertif"]."'");
			$izin_guru = ExecuteScalar("SELECT perjam_value FROM m_tidakhadir WHERE jenjang_id='".$jenjang."' AND jabatan_id='".$data_pegawai["jabatan"]."' AND sertif='".$data_pegawai["sertif"]."'");
			//$sakit_guru = ExecuteScalar("SELECT perhari FROM m_sakit WHERE jenjang_id='".$jenjang."' AND jabatan='".$data_pegawai["type"]."' AND sertif='".$data_pegawai["sertif"]."'");
			$sakit_jam_guru = ExecuteScalar("SELECT perjam FROM m_sakit WHERE jenjang_id='".$jenjang."' AND `type`='".$data_pegawai["type"]."' AND sertif='".$data_pegawai["sertif"]."'");
		
			$absen = ExecuteScalar("SELECT value FROM m_tidakhadir WHERE jenjang_id='".$jenjang."'");
			$izin = ExecuteScalar("SELECT value FROM m_tidakhadir WHERE jenjang_id='".$jenjang."' AND jabatan_id='".$data_pegawai["jabatan"]."'");
			$sakit = ExecuteScalar("SELECT perhari FROM m_sakit WHERE jenjang_id='".$jenjang."' AND jabatan='".$data_pegawai["jabatan"]."'");
			$absen_jam = ExecuteScalar("SELECT perjam_value FROM m_tidakhadir WHERE jenjang_id='".$jenjang."' AND jabatan_id='".$data_pegawai["jabatan"]."'");
			$izin_jam = ExecuteScalar("SELECT perjam_value FROM m_tidakhadir WHERE jenjang_id='".$jenjang."' AND jabatan_id='".$data_pegawai["jabatan"]."'");
			$sakit_jam = ExecuteScalar("SELECT perjam FROM m_sakit WHERE jenjang_id='".$jenjang."' AND jabatan='".$data_pegawai["jabatan"]."'");
			$telambat = ExecuteScalar("SELECT perjam_value FROM m_tidakhadir WHERE jenjang_id='".$jenjang."' AND jabatan_id='".$data_pegawai["jabatan"]."'");
			$pulang_cepat = ExecuteScalar("SELECT perhari FROM m_pulangcepat WHERE jenjang_id='".$jenjang."'");
			$piket = ExecuteScalar("SELECT value FROM m_piket WHERE jenjang='".$jenjang."' AND type_jabatan='".$data_pegawai["type"]."'");
			$inval = ExecuteScalar("SELECT value FROM m_inval WHERE jenjang_id='".$jenjang."' AND jabatan_id='".$data_pegawai["type"]."'");
			//print_r($inval);
			//die;
			$lembur = ExecuteScalar("SELECT value_perjam FROM m_lembur WHERE jenjang_id='".$jenjang."'");
			if($data_pegawai["type"] == '1'){
				$potongan = ($absen_guru * $row[2]) + ($absen_guru * $row[4]) + ($sakit_jam_guru * $row[6]) + ($absen_guru * $row[3]) + ($izin_guru * $row[5]) + ($sakit_jam_guru * $row[7]) + ($absen_guru * $row[8]) + ($absen_guru * $row[9]);
				//print_r($test_absen);
				//die;
				$penyesuaian = ($piket_guru * $row[10]) + ($inval * $row[11]) + ($lembur * $row[12]);
			}else{
				$potongan = ($absen * $row[2]) + ($izin * $row[4]) + ($sakit * $row[6]) + ($absen_jam * $row[3]) + ($izin_jam * $row[5]) + ($sakit_jam * $row[7]) + ($telambat * $row[8]) + ($pulang_cepat * $row[9]);
				$penyesuaian = ($piket * $row[10]) + ($inval * $row[11]) + ($lembur * $row[12]);
			}
		
			//$test_absen= $absen_guru * $row[2];
			//$test_sakit = $sakit_jam_guru * $row[6];
			//PENGECEKKAN DATA GAJI
			$gaji_sma = ExecuteRow("SELECT * FROM gaji_sma WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
			$total_gaji_sma = $gaji_sma["total"]-$potongan_guru+$penyesuaian_guru;
		
					if(!empty($gaji_sma)){
						Execute("UPDATE gaji_sma SET total = '".$total_gaji_sma."',potongan = '".$potongan_guru."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian_guru."' WHERE id ='".$gaji_sma['id']."'");
					}
					$gaji_tu_sma = ExecuteRow("SELECT * FROM gaji_tu_sma WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
					$total_gaji_tu_sma=$gaji_tu_sma["total"]-$potongan+$penyesuaian; 
					if(!empty($gaji_tu_sma)){
						Execute("UPDATE gaji_tu_sma SET total = '".$total_gaji_tu_sma."', potongan = '".$potongan."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian."' WHERE id ='".$gaji_tu_sma['id']."'");
					}
					$gaji_karyawan_sma = ExecuteRow("SELECT * FROM gaji_karyawan_sma WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
					$total_gaji_karyawan_sma=$gaji_karyawan_sma["total"]-$potongan+$penyesuaian;
					if(!empty($gaji_karyawan_sma)){
						Execute("UPDATE gaji_karyawan_sma SET total='".$total_gaji_karyawan_sma."', potongan = '".$potongan."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian."' WHERE id ='".$gaji_karyawan_sma['id']."'");
					}
					$gaji_smk = ExecuteRow("SELECT * FROM gaji_smk WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
					$total_gaji_smk = $gaji_smk["total"]-$potongan+$penyesuaian_guru;
					if(!empty($gaji_smk)){
						Execute("UPDATE gaji_smk SET total='".$total_gaji_smk."', potongan = '".$potongan."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian_guru."' WHERE id ='".$gaji_smk['id']."'");
					}
					$gaji_tu_smk = ExecuteRow("SELECT * FROM gaji_tu_smk WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
					$total_gaji_tu_smk = $gaji_tu_smk["total"]-$potongan+$penyesuaian;
					if(!empty($gaji_tu_smk)){
						Execute("UPDATE gaji_tu_smk SET total ='".$total_gaji_tu_smk."', potongan = '".$potongan."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian."' WHERE id ='".$gaji_tu_smk['id']."'");
					}
					$gaji_karyawan_smk = ExecuteRow("SELECT * FROM gaji_karyawan_smk WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
					$total_gaji_karyawan_smk=$gaji_karyawan_smk["total"]-$potongan+$penyesuaian;
					if(!empty($gaji_karyawan_smk)){
						Execute("UPDATE gaji_karyawan_smk SET total='".$total_gaji_karyawan_smk."',potongan = '".$potongan."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian."' WHERE id ='".$gaji_karyawan_smk['id']."'");
					}
					$gaji_smp = ExecuteRow("SELECT * FROM gaji_smp WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
					$total_gaji_smp = $gaji_smp["total"]-$potongan_guru+$penyesuaian_guru;
					if(!empty($gaji_smp)){
						Execute("UPDATE gaji_smp SET total='".$total_gaji_smp."',potongan = '".$potongan_guru."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian_guru."' WHERE id ='".$gaji_smp['id']."'");
					}
					$gaji_tu_smp = ExecuteRow("SELECT * FROM gaji_tu_smp WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
					$total_gaji_tu_smp = $gaji_tu_smp["total"]-$potongan+$penyesuaian;
					if(!empty($gaji_tu_smp)){
						Execute("UPDATE gaji_tu_smp SET total='".$total_gaji_tu_smp."',potongan = '".$potongan."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian."' WHERE id ='".$gaji_tu_smp['id']."'");
					}
					$gaji_karyawan_smp = ExecuteRow("SELECT * FROM gaji_karyawan_smp WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
					$total_gaji_karyawan_smp=$gaji_karyawan_smp["total"]-$potongan+$penyesuaian;
					if(!empty($gaji_karyawan_smp)){
						Execute("UPDATE gaji_karyawan_smp SET total='".$total_gaji_karyawan_smp."', potongan = '".$potongan."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian."' WHERE id ='".$gaji_karyawan_smp['id']."'");
					}
					$gaji = ExecuteRow("SELECT * FROM gaji WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
					$total_gaji_sd=$gaji["total"]-$potongan_guru+$penyesuaian_guru;
					if(!empty($gaji)){
						Execute("UPDATE gaji SET total='".$total_gaji_sd."',potongan = '".$potongan_guru."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian_guru."' WHERE id ='".$gaji['id']."'");
					}
					$gaji_tu_sd = ExecuteRow("SELECT * FROM gaji_tu_sd WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
					$total_gaji_tu_sd=$gaji_tu_sd["total"]-$potongan_guru+$penyesuaian;
					if(!empty($gaji_tu_sd)){
						Execute("UPDATE gaji_tu_sd SET total='".$total_gaji_tu_sd."' , potongan = '".$potongan_guru."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian."' WHERE id ='".$gaji_tu_sd['id']."'");
					}
					$gaji_karyawan_sd = ExecuteRow("SELECT * FROM gaji_karyawan_sd WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
					$total_gaji_karyawan_sd=$gaji_karyawan_sd["total"]-$potongan+$penyesuaian;
					if(!empty($gaji_karyawan_sd)){
						Execute("UPDATE gaji_karyawan_sd SET total='".$total_gaji_karyawan_sd."',potongan = '".$potongan."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian."' WHERE id ='".$gaji_karyawan_sd['id']."'");
					}
					$gaji_tk = ExecuteRow("SELECT * FROM gaji_tk WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
					$total_gaji_tk=$gaji_tk["total"]-$potongan_guru+$penyesuaian_guru;
					if(!empty($gaji_tk)){
						Execute("UPDATE gaji_tk SET total='".$total_gaji_tk."' ,potongan = '".$potongan_guru."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian_guru."' WHERE id ='".$gaji_tk['id']."'");
					}
					$gaji_tu_tk = ExecuteRow("SELECT * FROM gaji_tu_tk WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
					$total_gaji_tu_tk=$gaji_tu_tk["total"]-$potongan+$penyesuaian;
					if(!empty($gaji_tu_tk)){
						Execute("UPDATE gaji_tu_tk SET total='".$total_gaji_tu_tk."' ,potongan = '".$potongan."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian."' WHERE id ='".$gaji_tu_tk['id']."'");
					}
					$gaji_karyawan_tk = ExecuteRow("SELECT * FROM gaji_karyawan_tk WHERE pegawai ='".$pegawai['nip']."' AND bulan ='".$bulan."' AND tahun ='".$tahun."'");
					$total_gaji_karyawan_tk=$gaji_karyawan_tk["total"]-$potongan+$penyesuaian;
					if(!empty($gaji_karyawan_tk)){
						Execute("UPDATE gaji_karyawan_tk SET total='".$total_gaji_karyawan_tk."',potongan = '".$potongan."', voucher = '".$row[13]."', penyesuaian = '".$penyesuaian."' WHERE id ='".$gaji_karyawan_tk['id']."'");
					}
					$XLSXdata .= "("
					.("NULL").","
					."'".$rsnew["id"]."',"
					.("'".date('Y-m-d H:i:s')."'").","
					.(isset($row[0]) ? "'".$row[0]."'" : "NULL").","
					."'".$jenjang."',"
					.(isset($row[2]) ? "'".$row[2]."'" : "NULL").","
					.(isset($row[4]) ? "'".$row[4]."'" : "NULL").","
					.(isset($row[6]) ? "'".$row[6]."'" : "NULL").","
					.(isset($row[8]) ? "'".$row[8]."'" : "NULL").","
					.(isset($row[9]) ? "'".$row[9]."'" : "NULL").","
					.(isset($row[10]) ? "'".$row[10]."'" : "NULL").","
					.(isset($row[11]) ? "'".$row[11]."'" : "NULL").","
					.(isset($row[12]) ? "'".$row[12]."'" : "NULL").","
					."'".$potongan."',"
					."'".$penyesuaian."',"
					.(isset($row[13]) ? "'".$row[13]."'" : "NULL").","
					.(isset($row[3]) ? "'".$row[3]."'" : "NULL").","
					.(isset($row[5]) ? "'".$row[5]."'" : "NULL").","
					.(isset($row[7]) ? "'".$row[7]."'" : "NULL")."),";
				}
					if ($XLSXdata != "") {
						$myquery = "INSERT INTO `penyesuaian` VALUES ".rtrim($XLSXdata, ',') . ';';
						$myResult = Execute($myquery);
					}
			}
		}
		$this->terminate("penyesuaianlist.php?showmaster=m_penyesuaian&fk_id=".$rsnew["id"]."");
		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Grid Inserting event
	function Grid_Inserting() {

		// Enter your code here
		// To reject grid insert, set return value to FALSE

		return TRUE;
	}

	// Grid Inserted event
	function Grid_Inserted($rsnew) {

		//echo "Grid Inserted";
	}

	// Grid Updating event
	function Grid_Updating($rsold) {

		// Enter your code here
		// To reject grid update, set return value to FALSE

		return TRUE;
	}

	// Grid Updated event
	function Grid_Updated($rsold, $rsnew) {

		//echo "Grid Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
		// Enter your code here

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