<?php namespace PHPMaker2020\sigap; ?>
<?php

/**
 * Table class for generate_pertahun
 */
class generate_pertahun extends DbTable
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
	public $profesi;
	public $tahun;
	public $bulan;
	public $bulan2;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'generate_pertahun';
		$this->TableName = 'generate_pertahun';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`generate_pertahun`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_DEFAULT; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4; // Page size (PhpSpreadsheet only)
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
		$this->id = new DbField('generate_pertahun', 'generate_pertahun', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// profesi
		$this->profesi = new DbField('generate_pertahun', 'generate_pertahun', 'x_profesi', 'profesi', '`profesi`', '`profesi`', 3, 11, -1, FALSE, '`profesi`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->profesi->Sortable = TRUE; // Allow sort
		$this->profesi->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->profesi->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->profesi->Lookup = new Lookup('profesi', 'jenis_jabatan', FALSE, 'id', ["name","","",""], [], [], [], [], [], [], '', '');
		$this->profesi->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['profesi'] = &$this->profesi;

		// tahun
		$this->tahun = new DbField('generate_pertahun', 'generate_pertahun', 'x_tahun', 'tahun', '`tahun`', '`tahun`', 3, 11, -1, FALSE, '`tahun`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tahun->Sortable = TRUE; // Allow sort
		$this->tahun->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['tahun'] = &$this->tahun;

		// bulan
		$this->bulan = new DbField('generate_pertahun', 'generate_pertahun', 'x_bulan', 'bulan', '`bulan`', '`bulan`', 200, 50, -1, FALSE, '`bulan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->bulan->Sortable = TRUE; // Allow sort
		$this->bulan->Lookup = new Lookup('bulan', 'bulan', FALSE, 'id', ["bulan","","",""], [], [], [], [], [], [], '', '');
		$this->fields['bulan'] = &$this->bulan;

		// bulan2
		$this->bulan2 = new DbField('generate_pertahun', 'generate_pertahun', 'x_bulan2', 'bulan2', '`bulan2`', '`bulan2`', 3, 11, -1, FALSE, '`bulan2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->bulan2->Sortable = TRUE; // Allow sort
		$this->bulan2->Lookup = new Lookup('bulan2', 'bulan', FALSE, 'id', ["bulan","","",""], [], [], [], [], [], [], '', '');
		$this->bulan2->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['bulan2'] = &$this->bulan2;
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

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`generate_pertahun`";
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
		$this->profesi->DbValue = $row['profesi'];
		$this->tahun->DbValue = $row['tahun'];
		$this->bulan->DbValue = $row['bulan'];
		$this->bulan2->DbValue = $row['bulan2'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
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
			return "generate_pertahunlist.php";
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
		if ($pageName == "generate_pertahunview.php")
			return $Language->phrase("View");
		elseif ($pageName == "generate_pertahunedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "generate_pertahunadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "generate_pertahunlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("generate_pertahunview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("generate_pertahunview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "generate_pertahunadd.php?" . $this->getUrlParm($parm);
		else
			$url = "generate_pertahunadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("generate_pertahunedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("generate_pertahunadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("generate_pertahundelete.php", $this->getUrlParm());
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
		$this->profesi->setDbValue($rs->fields('profesi'));
		$this->tahun->setDbValue($rs->fields('tahun'));
		$this->bulan->setDbValue($rs->fields('bulan'));
		$this->bulan2->setDbValue($rs->fields('bulan2'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// profesi
		// tahun
		// bulan
		// bulan2
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// profesi
		$curVal = strval($this->profesi->CurrentValue);
		if ($curVal != "") {
			$this->profesi->ViewValue = $this->profesi->lookupCacheOption($curVal);
			if ($this->profesi->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->profesi->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->profesi->ViewValue = $this->profesi->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->profesi->ViewValue = $this->profesi->CurrentValue;
				}
			}
		} else {
			$this->profesi->ViewValue = NULL;
		}
		$this->profesi->ViewCustomAttributes = "";

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

		// bulan2
		$this->bulan2->ViewValue = $this->bulan2->CurrentValue;
		$curVal = strval($this->bulan2->CurrentValue);
		if ($curVal != "") {
			$this->bulan2->ViewValue = $this->bulan2->lookupCacheOption($curVal);
			if ($this->bulan2->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->bulan2->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->bulan2->ViewValue = $this->bulan2->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->bulan2->ViewValue = $this->bulan2->CurrentValue;
				}
			}
		} else {
			$this->bulan2->ViewValue = NULL;
		}
		$this->bulan2->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// profesi
		$this->profesi->LinkCustomAttributes = "";
		$this->profesi->HrefValue = "";
		$this->profesi->TooltipValue = "";

		// tahun
		$this->tahun->LinkCustomAttributes = "";
		$this->tahun->HrefValue = "";
		$this->tahun->TooltipValue = "";

		// bulan
		$this->bulan->LinkCustomAttributes = "";
		$this->bulan->HrefValue = "";
		$this->bulan->TooltipValue = "";

		// bulan2
		$this->bulan2->LinkCustomAttributes = "";
		$this->bulan2->HrefValue = "";
		$this->bulan2->TooltipValue = "";

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

		// profesi
		$this->profesi->EditAttrs["class"] = "form-control";
		$this->profesi->EditCustomAttributes = "";

		// tahun
		$this->tahun->EditAttrs["class"] = "form-control";
		$this->tahun->EditCustomAttributes = "";
		$this->tahun->EditValue = $this->tahun->CurrentValue;
		$this->tahun->PlaceHolder = RemoveHtml($this->tahun->caption());

		// bulan
		$this->bulan->EditCustomAttributes = "";

		// bulan2
		$this->bulan2->EditAttrs["class"] = "form-control";
		$this->bulan2->EditCustomAttributes = "";
		$this->bulan2->EditValue = $this->bulan2->CurrentValue;
		$this->bulan2->PlaceHolder = RemoveHtml($this->bulan2->caption());

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
					$doc->exportCaption($this->profesi);
					$doc->exportCaption($this->tahun);
					$doc->exportCaption($this->bulan);
					$doc->exportCaption($this->bulan2);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->profesi);
					$doc->exportCaption($this->tahun);
					$doc->exportCaption($this->bulan);
					$doc->exportCaption($this->bulan2);
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
						$doc->exportField($this->profesi);
						$doc->exportField($this->tahun);
						$doc->exportField($this->bulan);
						$doc->exportField($this->bulan2);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->profesi);
						$doc->exportField($this->tahun);
						$doc->exportField($this->bulan);
						$doc->exportField($this->bulan2);
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

		// No binary fields
		return FALSE;
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
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

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

			//	$tahun = $rsnew["tahun"];	
			//	$bulan = $rsnew["bulan"];
			//  $bulan_query = ExecuteRows("SELECT * FROM bulan where id= '$bulan'");
			//  $bulan_query = ExecuteRows("SELECT * FROM m_semeter where detil_smtr ='$bulan'");
			//  print_r($bulan_query);
			//  die;
			//	foreach ($bulan_query as $row) {

				$data_bulan = explode(",", $rsnew['bulan']);
				$tahun = $rsnew['tahun'];
				$id=$rsnew['id'];
			foreach ($data_bulan as $bulan) {

			//insert field bulan 2	
			$querymy2 = "INSERT INTO generate_pertahun VALUES(NULL,'".$tahun."',NULL,NULL,'".$bulan."')";
			$Result2 = Execute($querymy2);

			//delete field bulan ketika generate bulan2
			$delete ="DELETE FROM generate_pertahun WHERE bulan2 is null";
			$delete2 = Execute($delete);
			$delete_clone ="DELETE FROM generate_pertahun WHERE id < '".$id."' AND tahun ='".$tahun."' AND bulan2='".$bulan."'";	

					//print_r($delete_clone);
					//die;

			$clone_delete = execute($delete_clone);

			//if($this->profesi->CurrentValue == '1'){
		$delete_detil_karyawan ="DELETE FROM gaji_sma WHERE tahun ='".$tahun."' AND bulan='".$bulan."'";	
		$detil_delete = execute($delete_detil_karyawan);			
		$delete_m_sd ="DELETE FROM m_sma WHERE tahun ='".$tahun."' AND bulan='".$bulan."' ORDER BY id asc";	
		$clone_delete = execute($delete_m_sd);

				//$querymy2 = "INSERT INTO m_sma VALUES (NULL,'".$tahun."',NULL,'".$bulan."')";
				//$Result2 = Execute($querymy2);	

				$querymy = "INSERT INTO m_sma VALUES (NULL,'".$tahun."','".$bulan."',NULL,NULL)";
				$Result = Execute($querymy);

				// print_r($querymy);
				// die;

				$pid = ExecuteScalar("select id from m_sma order by id DESC limit 1");
				$row2 = ExecuteRows("SELECT * FROM pegawai where jenjang_id ='4' AND `type`= '1'");

				//print_r($pid);
				//die;

			foreach($row2 as $query){

				//value piket
				$reward = ExecuteScalar("select value from m_reward where jenjang ='".$query["jenjang_id"]."'");
				$piket= ExecuteRow("select * from m_piket where jenjang='4' AND jenis_sertif ='".$query['sertif']."' AND type_jabatan='1'");

				//value kehadiran
				$kehadiran=ExecuteRow("Select * from m_kehadiran where jenjang='4' AND jenis_jabatan='1' AND sertif='".$query['sertif']."'");	

				//print_r($kehadiran);
				//die;																		

				$tunjanagan_tambahan=ExecuteRow("select * from tunjangan_tambahan where jenjang='4' AND kualifikasi='".$query['tambahan']."'");
				$absen =ExecuteRow("SELECT * FROM penyesuaian INNER JOIN m_penyesuaian ON m_penyesuaian.id = penyesuaian.m_id WHERE penyesuaian.nip='".$query['nip']."' AND  m_penyesuaian.tahun='".$tahun."' AND m_penyesuaian.bulan='".$bulan."' ORDER BY m_penyesuaian.id DESC");	
				$absen_tidak = ExecuteScalar("SELECT value FROM m_tidakhadir WHERE jenjang_id='".$query["jenjang_id"]."'");								
				$sakit = ExecuteScalar("SELECT perhari FROM m_sakit WHERE jenjang_id='".$query["jenjang_id"]."'");				
				$telambat = ExecuteScalar("SELECT value FROM terlambat WHERE jenjang_id='".$query["jenjang_id"]."'");
				$pulang_cepat = ExecuteScalar("SELECT perhari FROM m_pulangcepat WHERE jenjang_id='".$query["jenjang_id"]."'");
				$query2 = ExecuteRow("SELECT * FROM jabatan JOIN gajitunjangan ON jabatan.id = gajitunjangan.pidjabatan where gajitunjangan.pidjabatan='9'");

				//$piket = ExecuteScalar("SELECT value FROM m_piket WHERE jenjang_id='".$query["jenjang_id"]."'");
				$inval = ExecuteScalar("SELECT value FROM m_inval WHERE jenjang_id='".$query["jenjang_id"]."' AND jabatan_id='".$query["type"]."'");

				//print_r($tunjanagan_tambahan);
				//die;	

				$lembur = ExecuteScalar("SELECT value_perjam FROM m_lembur WHERE jenjang_id='".$query["jenjang_id"]."'");
			

				//print_r($inval);
				//die;

				if($query['jabatan'] == '5'){
					$tunjangan_berkala=ExecuteRow("SELECT * FROM tunjangan_berkala WHERE jenjang='".$query['jenjang_id']."' AND kualifikasi ='5' AND lama='".$query['periode_jabatan']."'");
				}else if ($query['jabatan']  == '15'){
					$tunjangan_berkala=ExecuteRow("SELECT * FROM tunjangan_berkala WHERE jenjang='$jenjang' AND kualifikasi ='15' AND lama='".$query['periode_jabatan']."'");
				}else{
					$tunjangan_berkala =0;
				}

				//print_r($tunjangan_berkala);
				//die;

				$gaji_pokok=ExecuteRow("SELECT * FROM gaji_pokok WHERE jenjang_id='4' AND lama_kerja='".$query['lama_kerja']."'");
				$tunjangan_jabatan=ExecuteRow("SELECT * FROM tunjangan_jabatan WHERE unit='4' AND jabatan='".$query['jabatan']."'");

				//perhitungan 

				//$test = $reward;
				//print_r($test);
				//die;

				//$komponen_gapok= ($gaji_pokok["value"] * $query["jjm"]);
				$jaminan_tua = ExecuteScalar("select value from m_iuran_hari_tua where unit='".$query['jenjang_id']."'");
				$jaminan_pensiun = ExecuteScalar("select value from m_jaminan_pensiun where unit='".$query['jenjang_id']."'");
				$komponen_pph21 = ExecuteRow("select * from m_pph21 where unit ='".$query['jenjang_id']."'");
				$komponen_gapok= ($gaji_pokok["value"] * $query["jjm"]);
				$value_hari_tua = $komponen_gapok * $jaminan_tua;
				$value_pensiun = $komponen_gapok * $jaminan_pensiun;
				if($query["status_npwp"] == "1"){
					//5% x 50% x Gaji Pokok
					$fase1 = $komponen_pph21["value2"] * $komponen_gapok;
					$pph21 = $fase1 * $komponen_pph21["value3"];
				}else{
					//125% x 5% x 50% x Gaji Pokok
					$fase1 = ($komponen_pph21["value1"] * $komponen_gapok) * $komponen_pph21["value2"];
					//$fase2 = $fase1 ;
					$pph21 = $fase1 * $komponen_pph21["value3"];
				}
				//print_r($fase1);
				//die;
				$bpjs = ExecuteScalar("select value from m_bpjs where id='".$query["bpjs_kesehatan"]."'");
				//print_r($bpjs);
				//die;
				$solve_bpjs = 1 * $bpjs;
				$penyesuaian = $solve_bpjs + $value_pensiun + $value_hari_tua + $pph21 +($absen_tidak * $absen["absen"]) + ($absen_tidak * $absen["izin"]) + ($sakit * $absen["sakit"]) + ($telambat * $absen["terlambat"]) + ($pulang_cepat * $absen['pulang_cepat']);
				$tambahan = ($piket["value"] * $absen["piket"]) +  ($lembur * $absen["lembur"]);
				$inval2 = ($inval * $absen["inval"]) ;
				$sub_total = $tunjangan_jabatan['value'] + ($gaji_pokok["value"] * $query["jjm"]) + ($kehadiran["value"]* $query["jjm"]) + $tunjangan_berkala["value"] + $tunjanagan_tambahan["value"] + ($absen["lembur"] * $lembur) + ($absen["piket"] * $piket["value"]) + $inval2 + $reward;

					$value_kehadiran = ($kehadiran["value"]* $query["jjm"]);
					$total = ($sub_total + $tambahan) - $penyesuaian;
					$solved = 1 * $tunjanagan_tambahan["value"];
					$tj_jbtn = 1 * $tunjangan_jabatan["value"];
					$lm_kerja = 1 * $query["lama_kerja"];
					$sertif = 1 * $query["sertif"];
					$tgs_tmbhn = 1 * $query["tambahan"];
					$solve_periode = 1 * $query["periode_jabatan"];
					$solve_value_per = 1 * $tunjangan_berkala["value"];
					

				//	print_r($tunjangan_berkala);
				//	die;

					$piket_new = 1 * $absen["piket"];
					$v_piket = 1 * $piket["value"];
					$v_lembur = 1 * $lembur;
					$c_lembur = 1 * $absen["lembur"];
					$v_jjm = 1 * $query["jjm"];
					$v_voucher = 1 * $absen["voucher"];
					$v_kehadiran = 1 * $kehadiran["value"];
					$solved_npwp = 1* $query["status_npwp"];


					//print_r($solved);
					//die;

				$myquery = "INSERT INTO gaji_sma VALUES (NULL,'".$query["nip"]."','".date('Y-m-d H:i:s')."','".date('Y-m-d')."','".$c_lembur."','".$v_lembur."','".$query["jabatan"]."','".$gaji_pokok["value"]."','".$total."','".$reward."','".$inval2."','".$piket_new."','".$v_piket."','".$solved."','".$tj_jbtn."','".$v_jjm."','".$sub_total."','".$penyesuaian."','".$query["jenjang_id"]."','".$tambahan."','".$pid."','".$v_jjm."','".$query["type"]."','".$sertif."','".$tgs_tmbhn."','".$v_kehadiran."','".$solve_periode."','".$solve_value_per."','".$komponen_gapok."','".$lm_kerja."', NULL, '".$tahun."','".$bulan."', NULL,'".$v_voucher."','".$value_pensiun."','".$value_hari_tua."','".$pph21."','".$solved_npwp."','".$solve_bpjs."')";

				//print_r($myquery);
				//die;
				//$myquery = "INSERT INTO gaji_smk VALUES (NULL,'".$query["nip"]."','".date('Y-m-d H:i:s')."','".date('Y-m-d')."',NULL,NULL,'".$query["jabatan"]."',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,$id,NULL,'".$query['type']."',NULL,NULL,NULL,NULL,NULL, NULL, NULL, NULL, '".$tahun."', '".$bulan."', NULL)";
				//print_r($myquery);
				//die;

				$myResult = Execute($myquery);
				}

			//}elseif($this->profesi->CurrentValue == '2'){
				$delete_detil_karyawan ="DELETE FROM gaji_tu_sma WHERE tahun ='".$tahun."' AND bulan='".$bulan."'";	
				$detil_delete = execute($delete_detil_karyawan);			
				$delete_m_sd ="DELETE FROM m_tu_sma WHERE tahun ='".$tahun."' AND bulan='".$bulan."' ORDER BY id asc";	
				$clone_delete = execute($delete_m_sd);
					$querymy = "INSERT INTO m_tu_sma VALUES (NULL,'".$tahun."','".$bulan."',NULL,NULL)";
					$Result = Execute($querymy);
					$pid = ExecuteScalar("select id from m_tu_sma order by id DESC limit 1");
					$row2 = ExecuteRows("SELECT * FROM pegawai where jenjang_id ='4' AND `type`= '2'");

										//print_r($row);
										//die;

			foreach($row2 as $query){
				$reward = ExecuteScalar("select value from m_reward where jenjang ='".$query["jenjang_id"]."'");

				//$kehadiran=ExecuteRow("Select * from m_kehadiran where jenjang='4' AND jenis_jabatan='1'");	
				$piket= ExecuteRow("select * from m_piket where jenjang='4' AND type_jabatan='2'");	
				$kehadiran=ExecuteRow("Select * from m_kehadiran where jenjang='4' AND jenis_jabatan='2'");																		
				$tunjanagan_tambahan=ExecuteRow("select * from tunjangan_tambahan where jenjang='4' AND kualifikasi='".$query['tambahan']."'");
				$absen =ExecuteRow("SELECT * FROM penyesuaian INNER JOIN m_penyesuaian ON m_penyesuaian.id = penyesuaian.m_id WHERE penyesuaian.nip='".$query['nip']."' AND  m_penyesuaian.tahun='".$tahun."' AND m_penyesuaian.bulan='".$bulan."' ORDER BY m_penyesuaian.id DESC");	
				$absen_tidak = ExecuteScalar("SELECT value FROM m_tidakhadir WHERE jenjang_id='".$query["jenjang_id"]."' AND type='".$query["type"]."'");								
				$sakit = ExecuteScalar("SELECT perhari FROM m_sakit WHERE jenjang_id='".$query["jenjang_id"]."' AND jabatan='".$query["jabatan"]."'");				
				$terlambat = ExecuteScalar("SELECT perjam_value FROM m_tidakhadir WHERE jenjang_id='".$query["jenjang_id"]."' AND type='".$query["type"]."'");
				$pulang_cepat = ExecuteScalar("SELECT perjam_value FROM m_tidakhadir WHERE jenjang_id='".$query["jenjang_id"]."' AND type='".$query["type"]."'");
				$query2 = ExecuteRow("SELECT * FROM jabatan JOIN gajitunjangan ON jabatan.id = gajitunjangan.pidjabatan where gajitunjangan.pidjabatan='9'");

					//$piket = ExecuteScalar("SELECT value FROM m_piket WHERE jenjang_id='".$query["jenjang_id"]."'");
				$inval = ExecuteScalar("SELECT value FROM m_inval WHERE jenjang_id='".$query["jenjang_id"]."'");
				$lembur = ExecuteScalar("SELECT value_perjam FROM m_lembur WHERE jenjang_id='".$query["jenjang_id"]."'");
					$gaji_pokok=ExecuteRow("SELECT * FROM gaji_pokok_tu WHERE jenjang_id='4' AND lama_kerja='".$query['lama_kerja']."' AND ijazah= '".$query['pendidikan']."'");

					//print_r($gaji_pokok);
					//die;

				$tunjangan_jabatan=ExecuteRow("SELECT * FROM tunjangan_jabatan WHERE unit='4' AND jabatan='".$query['jabatan']."'");		
				$tunjanagan_khusus=ExecuteScalar("select value from tunjangan_khusus where unit='4' AND jabatan ='".$query["type"]."' ");

				//perhitungan
				
				//inval2 = ($inval * $absen["inval"]) ;
				//$tambahan = ($piket["value"] * $absen["piket"]) +  ($lembur * $absen["lembur"]);

				$inval2 = ($inval * $absen["inval"]) ;
					//print_r($hadir);
					//die;
				$jaminan_tua = ExecuteScalar("select value from m_iuran_hari_tua where unit='".$query['jenjang_id']."'");
				$jaminan_pensiun = ExecuteScalar("select value from m_jaminan_pensiun where unit='".$query['jenjang_id']."'");
				$komponen_pph21 = ExecuteRow("select * from m_pph21 where unit ='".$query['jenjang_id']."'");
				$komponen_gapok=1 * $gaji_pokok["value"];
				$value_hari_tua = $komponen_gapok * $jaminan_tua;
				$value_pensiun = $komponen_gapok * $jaminan_pensiun;
				if($query["status_npwp"] == "1"){
					//5% x 50% x Gaji Pokok
					$fase1 = $komponen_pph21["value2"] * $komponen_gapok;
					$pph21 = $fase1 * $komponen_pph21["value3"];
				}else{
					//125% x 5% x 50% x Gaji Pokok
					$fase1 = ($komponen_pph21["value1"] * $komponen_gapok) * $komponen_pph21["value2"];
					//$fase2 = $fase1 ;
					$pph21 = $fase1 * $komponen_pph21["value3"];
				}
				$bpjs = ExecuteScalar("select value from m_bpjs where id='".$query["bpjs_kesehatan"]."'");
				$solve_bpjs = 1 * $bpjs;


				$penyesuaian = $solve_bpjs + $value_hari_tua + $value_pensiun + $pph21 + ($absen_tidak * $absen["absen"]) + ($absen_tidak * $absen["izin"]) + ($sakit * $absen["sakit"]) + ($terlambat * $absen["terlambat"]) + ($pulang_cepat * $absen['pulang_cepat']);
				$tambahan_value = ($piket["value"] * $absen["piket"]) +  ($lembur * $absen["lembur"]);

				$hadir =1*$query["kehadiran"];
				$khusus = 1 * $tunjanagan_khusus;
				$tambahan = 1 * $query["tambahan"];
				$solved = 1 * $tunjanagan_tambahan["value"];
				$tj_jbtn = 1 * $tunjangan_jabatan["value"];
				$lm_kerja = 1 * $query["lama_kerja"];
				$sertif = 1 * $query["sertif"];
				$pendidikan =1* $query["pendidikan"];
				$c_lembur = 1 * $absen["lembur"];
				$c_piket = 1 * $absen["piket"];
				$v_voucher = 1 * $absen["voucher"];
				$value_kehadiran = ($kehadiran["value"] * $query["kehadiran"]);
				$sub_total = $khusus +$komponen_gapok + $value_kehadiran + $tunjangan_jabatan['value'] + $tunjanagan_tambahan["value"] + ($absen["lembur"] * $lembur) + ($absen["piket"] * $piket["value"]) + $inval2 + $reward; 
				$total = ($sub_total + $tambahan_value) - $penyesuaian;

				//$test = $inval;
				//note salah diinval harusnya tidak nampil
				//print_r($tunjanagan_khusus);
				//die;	

				
				$myquery2 = "INSERT INTO gaji_tu_sma VALUES (NULL,NULL,'".$query["nip"]."','".$query["jenjang_id"]."','".$query["jabatan"]."',NULL,'".$komponen_gapok."','".$hadir	."','".$c_lembur."','".$lembur."','".$reward."','".$inval2."','".$c_piket."','".$piket["value"]."','".$solved."','".$tj_jbtn."','".$penyesuaian."','".$sub_total."','".$tambahan_value."','".$total."','".$pid."','".$khusus."','".$tambahan."','2','".$pendidikan."','".$lm_kerja."','".$sertif."','".$kehadiran["value"]."','".$tahun."','".$bulan."','".$v_voucher."',NULL,NULL,'".$value_pensiun."','".$value_hari_tua."','".$pph21."','".$solve_bpjs."')";

					//print_r($myquery2);
					//die;

				$Result = Execute($myquery2);
					}

			//}else{
				$delete_detil_karyawan ="DELETE FROM gaji_karyawan_sma WHERE tahun ='".$tahun."' AND bulan='".$bulan."'";	
				$detil_delete = execute($delete_detil_karyawan);
				$delete_m_sd ="DELETE FROM m_karyawan_sma WHERE tahun ='".$tahun."' AND bulan='".$bulan."' ORDER BY id asc";	
				$clone_delete = execute($delete_m_sd);
				$querymy = "INSERT INTO m_karyawan_sma VALUES (NULL,'".$tahun."','".$bulan."',NULL,NULL)";
				$Result = Execute($querymy);
				$pid = ExecuteScalar("select id from m_karyawan_sma order by id DESC limit 1");
				$row2 = ExecuteRows("SELECT * FROM pegawai where jenjang_id ='4' AND `type`= '3'");	
			foreach($row2 as $query){
				$reward = ExecuteScalar("select value from m_reward where jenjang ='".$query["jenjang_id"]."' AND jabatan ='".$query["jabatan"]."'");

				//$querypotongan = ExecuteRow("SELECT * FROM potongan_sma WHERE nama= '".$query["nip"]."' ORDER BY datetime DESC");
				$kehadiran= ExecuteRow("Select * from m_kehadiran where jenjang='4' AND jabatan= '".$query["jabatan"]."'");	

					//GAJI POKOK
				$query2 = ExecuteRow("SELECT * FROM jabatan JOIN gajitunjangan ON jabatan.id = gajitunjangan.pidjabatan where gajitunjangan.pidjabatan='9'");
				$querypokok = ExecuteRow("SELECT * FROM gaji_pokok_kayawan where jenjang_id='4' AND jabatan_id= '".$query["jabatan"]."'");		
				$inval = ExecuteScalar("SELECT value FROM m_inval WHERE jenjang_id='".$query["jenjang_id"]."'");
				$lembur = ExecuteScalar("SELECT value_perjam FROM m_lembur WHERE jenjang_id='".$query["jenjang_id"]."'");							
				$piket= ExecuteRow("select * from m_piket where jenjang='4' AND type_jabatan='3'");							//Gaji Pokok	
				$kehadiran = ExecuteRow("select * from m_kehadiran where jenjang ='4' AND jenis_jabatan='3' AND jabatan='".$query["jabatan"]."'");
				$gaji_pokok=ExecuteRow("SELECT * FROM gaji_pokok_kayawan WHERE jenjang_id='4' AND jabatan_id= '".$query["jabatan"]."'");	
				$absen =ExecuteRow("SELECT * FROM penyesuaian INNER JOIN m_penyesuaian ON m_penyesuaian.id = penyesuaian.m_id WHERE penyesuaian.nip='".$query['nip']."' AND  m_penyesuaian.tahun='".$tahun."' AND m_penyesuaian.bulan='".$bulan."' ORDER BY m_penyesuaian.id DESC");	
				$absen_tidak = ExecuteScalar("SELECT value FROM m_tidakhadir WHERE jenjang_id='".$query["jenjang_id"]."' AND jabatan_id='".$query["jabatan"]."'");								
				$sakit = ExecuteScalar("SELECT perhari FROM m_sakit WHERE jenjang_id='".$query["jenjang_id"]."' AND jabatan='".$query["jabatan"]."'");				
				$terlambat = ExecuteScalar("SELECT perjam_value FROM m_tidakhadir WHERE jenjang_id='".$query["jenjang_id"]."' AND type='".$query["type"]."'");
				$pulang_cepat = ExecuteScalar("SELECT perjam_value FROM m_tidakhadir WHERE jenjang_id='".$query["jenjang_id"]."' AND type='".$query["type"]."'");$lembur = ExecuteScalar("SELECT value_perjam FROM m_lembur WHERE jenjang_id='".$query["jenjang_id"]."'");
				$inval2 = $inval * $absen["inval"];
												
				$value_inval = 1 * $inval; 
				
				$jaminan_tua = ExecuteScalar("select value from m_iuran_hari_tua where unit='".$query['jenjang_id']."'");
				$jaminan_pensiun = ExecuteScalar("select value from m_jaminan_pensiun where unit='".$query['jenjang_id']."'");
				$komponen_pph21 = ExecuteRow("select * from m_pph21 where unit ='".$query['jenjang_id']."'");
				$komponen_gapok = 1 * $gaji_pokok["value"];
				$value_hari_tua = $komponen_gapok * $jaminan_tua;
				$value_pensiun = $komponen_gapok * $jaminan_pensiun;
				if($query["status_npwp"] == "1"){
					//5% x 50% x Gaji Pokok
					$fase1 = $komponen_pph21["value2"] * $komponen_gapok;
					$pph21 = $fase1 * $komponen_pph21["value3"];
				}else{
					//125% x 5% x 50% x Gaji Pokok
					$fase1 = ($komponen_pph21["value1"] * $komponen_gapok) * $komponen_pph21["value2"];
					//$fase2 = $fase1 ;
					$pph21 = $fase1 * $komponen_pph21["value3"];
				}
				//komponen bpjs
				$bpjs = ExecuteScalar("select value from m_bpjs where id='".$query["bpjs_kesehatan"]."'");
				//print_r($bpjs);
				//die;
				$solve_bpjs = 1 * $bpjs;
				$penyesuaian = $solve_bpjs + $pph21 + $value_hari_tua + $value_pensiun + ($absen_tidak * $absen["absen"]) + ($absen_tidak * $absen["izin"]) + ($sakit * $absen["sakit"]) + ($terlambat * $absen["terlambat"]) + ($pulang_cepat * $absen['pulang_cepat']);
				$tambahan	= ($piket["value"] * $absen["piket"]) + ($lembur * $absen["lembur"]);

				$v_gapok = 1 * $gaji_pokok["value"];
				$v_voucher = 1 * $absen["voucher"];
				$c_jjm = 1 * $query["kehadiran"];
				$t_kehadiran = $query["kehadiran"] * $kehadiran["value"];
				$v_kehadiran = 1 * $kehadiran["value"];

				//INSERT INTO `gaji_karyawan_sma` (`id`, `pegawai`, `jabatan_id`, `jenjang_id`, `gapok`, `value_reward`, `value_inval`, `kehadiran`, `sub_total`, `potongan`, `penyesuaian`, `total`, `pid`, `value_kehadiran`, `status`, `tahun`, `bulan`) 
				$sub_total = $komponen_gapok + $t_kehadiran + $inval2;
				$total = ($sub_total + $tambahan) - $penyesuaian;

				//print_r($v_kehadiran);
				//die;

				$myquery2 = "INSERT INTO gaji_karyawan_sma VALUES (NULL, '".$query["nip"]."','".$query["jabatan"]."','4','".$komponen_gapok."',NULL,'".$inval2."','".$c_jjm."','".$sub_total."','".$penyesuaian."','".$tambahan."','".$total."','".$pid."','".$v_kehadiran."',NULL,'".$tahun."', '".$bulan."','".$v_voucher."',NULL,'".$value_pensiun."','".$value_hari_tua."','".$pph21."','".$solve_bpjs."')";

				//print_r($myquery2);
				//die;
				//print_r($myquery2);
				//die;


				$Result = Execute($myquery2);

						}

				//	}
			}

			/*if ($this->profesi->CurrentValue =='1') {
				$this->terminate("m_smalist.php");
			}else if($this->profesi->CurrentValue =='2'){
				$this->terminate("m_tu_smalist.php");
			}else{
				$this->terminate("m_karyawan_smalist.php");
			}*/
	}
	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {
		// Enter your code here
		// To cancel, set return value to FALSE
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