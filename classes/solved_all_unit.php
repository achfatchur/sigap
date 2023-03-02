<?php namespace PHPMaker2020\sigap; ?>
<?php

/**
 * Table class for solved_all_unit
 */
class solved_all_unit extends DbTable
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
	public $nip;
	public $total_gaji;
	public $j_pensiun;
	public $hari_tua;
	public $pph21;
	public $golongan_bpjs;
	public $iuran_bpjs;
	public $bulan;
	public $tahun;
	public $type_peg;
	public $unit;
	public $tanggal;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'solved_all_unit';
		$this->TableName = 'solved_all_unit';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`solved_all_unit`";
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
		$this->id = new DbField('solved_all_unit', 'solved_all_unit', 'x_id', 'id', '`id`', '`id`', 3, 10, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// nip
		$this->nip = new DbField('solved_all_unit', 'solved_all_unit', 'x_nip', 'nip', '`nip`', '`nip`', 200, 50, -1, FALSE, '`nip`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nip->Sortable = TRUE; // Allow sort
		$this->fields['nip'] = &$this->nip;

		// total_gaji
		$this->total_gaji = new DbField('solved_all_unit', 'solved_all_unit', 'x_total_gaji', 'total_gaji', '`total_gaji`', '`total_gaji`', 20, 19, -1, FALSE, '`total_gaji`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->total_gaji->Sortable = TRUE; // Allow sort
		$this->total_gaji->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['total_gaji'] = &$this->total_gaji;

		// j_pensiun
		$this->j_pensiun = new DbField('solved_all_unit', 'solved_all_unit', 'x_j_pensiun', 'j_pensiun', '`j_pensiun`', '`j_pensiun`', 20, 19, -1, FALSE, '`j_pensiun`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->j_pensiun->Sortable = TRUE; // Allow sort
		$this->j_pensiun->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['j_pensiun'] = &$this->j_pensiun;

		// hari_tua
		$this->hari_tua = new DbField('solved_all_unit', 'solved_all_unit', 'x_hari_tua', 'hari_tua', '`hari_tua`', '`hari_tua`', 20, 19, -1, FALSE, '`hari_tua`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hari_tua->Sortable = TRUE; // Allow sort
		$this->hari_tua->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['hari_tua'] = &$this->hari_tua;

		// pph21
		$this->pph21 = new DbField('solved_all_unit', 'solved_all_unit', 'x_pph21', 'pph21', '`pph21`', '`pph21`', 20, 19, -1, FALSE, '`pph21`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pph21->Sortable = TRUE; // Allow sort
		$this->pph21->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['pph21'] = &$this->pph21;

		// golongan_bpjs
		$this->golongan_bpjs = new DbField('solved_all_unit', 'solved_all_unit', 'x_golongan_bpjs', 'golongan_bpjs', '`golongan_bpjs`', '`golongan_bpjs`', 3, 10, -1, FALSE, '`golongan_bpjs`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->golongan_bpjs->Sortable = TRUE; // Allow sort
		$this->golongan_bpjs->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['golongan_bpjs'] = &$this->golongan_bpjs;

		// iuran_bpjs
		$this->iuran_bpjs = new DbField('solved_all_unit', 'solved_all_unit', 'x_iuran_bpjs', 'iuran_bpjs', '`iuran_bpjs`', '`iuran_bpjs`', 20, 19, -1, FALSE, '`iuran_bpjs`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->iuran_bpjs->Sortable = TRUE; // Allow sort
		$this->iuran_bpjs->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['iuran_bpjs'] = &$this->iuran_bpjs;

		// bulan
		$this->bulan = new DbField('solved_all_unit', 'solved_all_unit', 'x_bulan', 'bulan', '`bulan`', '`bulan`', 3, 10, -1, FALSE, '`bulan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->bulan->Sortable = TRUE; // Allow sort
		$this->bulan->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['bulan'] = &$this->bulan;

		// tahun
		$this->tahun = new DbField('solved_all_unit', 'solved_all_unit', 'x_tahun', 'tahun', '`tahun`', '`tahun`', 3, 10, -1, FALSE, '`tahun`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tahun->Sortable = TRUE; // Allow sort
		$this->tahun->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['tahun'] = &$this->tahun;

		// type_peg
		$this->type_peg = new DbField('solved_all_unit', 'solved_all_unit', 'x_type_peg', 'type_peg', '`type_peg`', '`type_peg`', 3, 10, -1, FALSE, '`type_peg`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->type_peg->Sortable = TRUE; // Allow sort
		$this->type_peg->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['type_peg'] = &$this->type_peg;

		// unit
		$this->unit = new DbField('solved_all_unit', 'solved_all_unit', 'x_unit', 'unit', '`unit`', '`unit`', 3, 10, -1, FALSE, '`unit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->unit->Sortable = TRUE; // Allow sort
		$this->unit->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['unit'] = &$this->unit;

		// tanggal
		$this->tanggal = new DbField('solved_all_unit', 'solved_all_unit', 'x_tanggal', 'tanggal', '`tanggal`', CastDateFieldForLike("`tanggal`", 0, "DB"), 133, 10, 0, FALSE, '`tanggal`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tanggal->Sortable = TRUE; // Allow sort
		$this->tanggal->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['tanggal'] = &$this->tanggal;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`solved_all_unit`";
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
		$this->nip->DbValue = $row['nip'];
		$this->total_gaji->DbValue = $row['total_gaji'];
		$this->j_pensiun->DbValue = $row['j_pensiun'];
		$this->hari_tua->DbValue = $row['hari_tua'];
		$this->pph21->DbValue = $row['pph21'];
		$this->golongan_bpjs->DbValue = $row['golongan_bpjs'];
		$this->iuran_bpjs->DbValue = $row['iuran_bpjs'];
		$this->bulan->DbValue = $row['bulan'];
		$this->tahun->DbValue = $row['tahun'];
		$this->type_peg->DbValue = $row['type_peg'];
		$this->unit->DbValue = $row['unit'];
		$this->tanggal->DbValue = $row['tanggal'];
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
			return "solved_all_unitlist.php";
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
		if ($pageName == "solved_all_unitview.php")
			return $Language->phrase("View");
		elseif ($pageName == "solved_all_unitedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "solved_all_unitadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "solved_all_unitlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("solved_all_unitview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("solved_all_unitview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "solved_all_unitadd.php?" . $this->getUrlParm($parm);
		else
			$url = "solved_all_unitadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("solved_all_unitedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("solved_all_unitadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("solved_all_unitdelete.php", $this->getUrlParm());
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
		$this->nip->setDbValue($rs->fields('nip'));
		$this->total_gaji->setDbValue($rs->fields('total_gaji'));
		$this->j_pensiun->setDbValue($rs->fields('j_pensiun'));
		$this->hari_tua->setDbValue($rs->fields('hari_tua'));
		$this->pph21->setDbValue($rs->fields('pph21'));
		$this->golongan_bpjs->setDbValue($rs->fields('golongan_bpjs'));
		$this->iuran_bpjs->setDbValue($rs->fields('iuran_bpjs'));
		$this->bulan->setDbValue($rs->fields('bulan'));
		$this->tahun->setDbValue($rs->fields('tahun'));
		$this->type_peg->setDbValue($rs->fields('type_peg'));
		$this->unit->setDbValue($rs->fields('unit'));
		$this->tanggal->setDbValue($rs->fields('tanggal'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
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

		// nip
		$this->nip->EditAttrs["class"] = "form-control";
		$this->nip->EditCustomAttributes = "";
		if (!$this->nip->Raw)
			$this->nip->CurrentValue = HtmlDecode($this->nip->CurrentValue);
		$this->nip->EditValue = $this->nip->CurrentValue;
		$this->nip->PlaceHolder = RemoveHtml($this->nip->caption());

		// total_gaji
		$this->total_gaji->EditAttrs["class"] = "form-control";
		$this->total_gaji->EditCustomAttributes = "";
		$this->total_gaji->EditValue = $this->total_gaji->CurrentValue;
		$this->total_gaji->PlaceHolder = RemoveHtml($this->total_gaji->caption());

		// j_pensiun
		$this->j_pensiun->EditAttrs["class"] = "form-control";
		$this->j_pensiun->EditCustomAttributes = "";
		$this->j_pensiun->EditValue = $this->j_pensiun->CurrentValue;
		$this->j_pensiun->PlaceHolder = RemoveHtml($this->j_pensiun->caption());

		// hari_tua
		$this->hari_tua->EditAttrs["class"] = "form-control";
		$this->hari_tua->EditCustomAttributes = "";
		$this->hari_tua->EditValue = $this->hari_tua->CurrentValue;
		$this->hari_tua->PlaceHolder = RemoveHtml($this->hari_tua->caption());

		// pph21
		$this->pph21->EditAttrs["class"] = "form-control";
		$this->pph21->EditCustomAttributes = "";
		$this->pph21->EditValue = $this->pph21->CurrentValue;
		$this->pph21->PlaceHolder = RemoveHtml($this->pph21->caption());

		// golongan_bpjs
		$this->golongan_bpjs->EditAttrs["class"] = "form-control";
		$this->golongan_bpjs->EditCustomAttributes = "";
		$this->golongan_bpjs->EditValue = $this->golongan_bpjs->CurrentValue;
		$this->golongan_bpjs->PlaceHolder = RemoveHtml($this->golongan_bpjs->caption());

		// iuran_bpjs
		$this->iuran_bpjs->EditAttrs["class"] = "form-control";
		$this->iuran_bpjs->EditCustomAttributes = "";
		$this->iuran_bpjs->EditValue = $this->iuran_bpjs->CurrentValue;
		$this->iuran_bpjs->PlaceHolder = RemoveHtml($this->iuran_bpjs->caption());

		// bulan
		$this->bulan->EditAttrs["class"] = "form-control";
		$this->bulan->EditCustomAttributes = "";
		$this->bulan->EditValue = $this->bulan->CurrentValue;
		$this->bulan->PlaceHolder = RemoveHtml($this->bulan->caption());

		// tahun
		$this->tahun->EditAttrs["class"] = "form-control";
		$this->tahun->EditCustomAttributes = "";
		$this->tahun->EditValue = $this->tahun->CurrentValue;
		$this->tahun->PlaceHolder = RemoveHtml($this->tahun->caption());

		// type_peg
		$this->type_peg->EditAttrs["class"] = "form-control";
		$this->type_peg->EditCustomAttributes = "";
		$this->type_peg->EditValue = $this->type_peg->CurrentValue;
		$this->type_peg->PlaceHolder = RemoveHtml($this->type_peg->caption());

		// unit
		$this->unit->EditAttrs["class"] = "form-control";
		$this->unit->EditCustomAttributes = "";
		$this->unit->EditValue = $this->unit->CurrentValue;
		$this->unit->PlaceHolder = RemoveHtml($this->unit->caption());

		// tanggal
		$this->tanggal->EditAttrs["class"] = "form-control";
		$this->tanggal->EditCustomAttributes = "";
		$this->tanggal->EditValue = FormatDateTime($this->tanggal->CurrentValue, 8);
		$this->tanggal->PlaceHolder = RemoveHtml($this->tanggal->caption());

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
					$doc->exportCaption($this->nip);
					$doc->exportCaption($this->total_gaji);
					$doc->exportCaption($this->j_pensiun);
					$doc->exportCaption($this->hari_tua);
					$doc->exportCaption($this->pph21);
					$doc->exportCaption($this->golongan_bpjs);
					$doc->exportCaption($this->iuran_bpjs);
					$doc->exportCaption($this->bulan);
					$doc->exportCaption($this->tahun);
					$doc->exportCaption($this->type_peg);
					$doc->exportCaption($this->unit);
					$doc->exportCaption($this->tanggal);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->nip);
					$doc->exportCaption($this->total_gaji);
					$doc->exportCaption($this->j_pensiun);
					$doc->exportCaption($this->hari_tua);
					$doc->exportCaption($this->pph21);
					$doc->exportCaption($this->golongan_bpjs);
					$doc->exportCaption($this->iuran_bpjs);
					$doc->exportCaption($this->bulan);
					$doc->exportCaption($this->tahun);
					$doc->exportCaption($this->type_peg);
					$doc->exportCaption($this->unit);
					$doc->exportCaption($this->tanggal);
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
						$doc->exportField($this->nip);
						$doc->exportField($this->total_gaji);
						$doc->exportField($this->j_pensiun);
						$doc->exportField($this->hari_tua);
						$doc->exportField($this->pph21);
						$doc->exportField($this->golongan_bpjs);
						$doc->exportField($this->iuran_bpjs);
						$doc->exportField($this->bulan);
						$doc->exportField($this->tahun);
						$doc->exportField($this->type_peg);
						$doc->exportField($this->unit);
						$doc->exportField($this->tanggal);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->nip);
						$doc->exportField($this->total_gaji);
						$doc->exportField($this->j_pensiun);
						$doc->exportField($this->hari_tua);
						$doc->exportField($this->pph21);
						$doc->exportField($this->golongan_bpjs);
						$doc->exportField($this->iuran_bpjs);
						$doc->exportField($this->bulan);
						$doc->exportField($this->tahun);
						$doc->exportField($this->type_peg);
						$doc->exportField($this->unit);
						$doc->exportField($this->tanggal);
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

		//echo "Row Inserted"
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