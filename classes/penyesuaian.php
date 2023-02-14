<?php namespace PHPMaker2020\sigap; ?>
<?php

/**
 * Table class for penyesuaian
 */
class penyesuaian extends DbTable
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
	public $m_id;
	public $datetime;
	public $nip;
	public $jenjang_id;
	public $absen;
	public $absen_jam;
	public $izin;
	public $izin_jam;
	public $sakit;
	public $sakit_jam;
	public $terlambat;
	public $pulang_cepat;
	public $piket;
	public $inval;
	public $lembur;
	public $voucher;
	public $total;
	public $total2;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'penyesuaian';
		$this->TableName = 'penyesuaian';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`penyesuaian`";
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
		$this->id = new DbField('penyesuaian', 'penyesuaian', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// m_id
		$this->m_id = new DbField('penyesuaian', 'penyesuaian', 'x_m_id', 'm_id', '`m_id`', '`m_id`', 3, 11, -1, FALSE, '`m_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->m_id->IsForeignKey = TRUE; // Foreign key field
		$this->m_id->Sortable = TRUE; // Allow sort
		$this->m_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['m_id'] = &$this->m_id;

		// datetime
		$this->datetime = new DbField('penyesuaian', 'penyesuaian', 'x_datetime', 'datetime', '`datetime`', CastDateFieldForLike("`datetime`", 0, "DB"), 135, 19, 0, FALSE, '`datetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->datetime->Sortable = TRUE; // Allow sort
		$this->datetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['datetime'] = &$this->datetime;

		// nip
		$this->nip = new DbField('penyesuaian', 'penyesuaian', 'x_nip', 'nip', '`nip`', '`nip`', 20, 100, -1, FALSE, '`nip`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->nip->Sortable = TRUE; // Allow sort
		$this->nip->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->nip->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->nip->Lookup = new Lookup('nip', 'pegawai', FALSE, 'nip', ["nama","","",""], [], [], [], [], [], [], '', '');
		$this->nip->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['nip'] = &$this->nip;

		// jenjang_id
		$this->jenjang_id = new DbField('penyesuaian', 'penyesuaian', 'x_jenjang_id', 'jenjang_id', '`jenjang_id`', '`jenjang_id`', 3, 20, -1, FALSE, '`jenjang_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->jenjang_id->Sortable = TRUE; // Allow sort
		$this->jenjang_id->Lookup = new Lookup('jenjang_id', 'tpendidikan', FALSE, 'nourut', ["name","","",""], [], [], [], [], [], [], '', '');
		$this->jenjang_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['jenjang_id'] = &$this->jenjang_id;

		// absen
		$this->absen = new DbField('penyesuaian', 'penyesuaian', 'x_absen', 'absen', '`absen`', '`absen`', 3, 20, -1, FALSE, '`absen`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->absen->Sortable = TRUE; // Allow sort
		$this->absen->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['absen'] = &$this->absen;

		// absen_jam
		$this->absen_jam = new DbField('penyesuaian', 'penyesuaian', 'x_absen_jam', 'absen_jam', '`absen_jam`', '`absen_jam`', 3, 20, -1, FALSE, '`absen_jam`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->absen_jam->Sortable = TRUE; // Allow sort
		$this->absen_jam->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['absen_jam'] = &$this->absen_jam;

		// izin
		$this->izin = new DbField('penyesuaian', 'penyesuaian', 'x_izin', 'izin', '`izin`', '`izin`', 3, 20, -1, FALSE, '`izin`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->izin->Sortable = TRUE; // Allow sort
		$this->izin->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['izin'] = &$this->izin;

		// izin_jam
		$this->izin_jam = new DbField('penyesuaian', 'penyesuaian', 'x_izin_jam', 'izin_jam', '`izin_jam`', '`izin_jam`', 3, 20, -1, FALSE, '`izin_jam`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->izin_jam->Sortable = TRUE; // Allow sort
		$this->izin_jam->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['izin_jam'] = &$this->izin_jam;

		// sakit
		$this->sakit = new DbField('penyesuaian', 'penyesuaian', 'x_sakit', 'sakit', '`sakit`', '`sakit`', 3, 20, -1, FALSE, '`sakit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sakit->Sortable = TRUE; // Allow sort
		$this->sakit->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sakit'] = &$this->sakit;

		// sakit_jam
		$this->sakit_jam = new DbField('penyesuaian', 'penyesuaian', 'x_sakit_jam', 'sakit_jam', '`sakit_jam`', '`sakit_jam`', 3, 20, -1, FALSE, '`sakit_jam`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sakit_jam->Sortable = TRUE; // Allow sort
		$this->sakit_jam->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sakit_jam'] = &$this->sakit_jam;

		// terlambat
		$this->terlambat = new DbField('penyesuaian', 'penyesuaian', 'x_terlambat', 'terlambat', '`terlambat`', '`terlambat`', 3, 20, -1, FALSE, '`terlambat`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->terlambat->Sortable = TRUE; // Allow sort
		$this->terlambat->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['terlambat'] = &$this->terlambat;

		// pulang_cepat
		$this->pulang_cepat = new DbField('penyesuaian', 'penyesuaian', 'x_pulang_cepat', 'pulang_cepat', '`pulang_cepat`', '`pulang_cepat`', 3, 20, -1, FALSE, '`pulang_cepat`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pulang_cepat->Sortable = TRUE; // Allow sort
		$this->pulang_cepat->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['pulang_cepat'] = &$this->pulang_cepat;

		// piket
		$this->piket = new DbField('penyesuaian', 'penyesuaian', 'x_piket', 'piket', '`piket`', '`piket`', 3, 20, -1, FALSE, '`piket`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->piket->Sortable = TRUE; // Allow sort
		$this->piket->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['piket'] = &$this->piket;

		// inval
		$this->inval = new DbField('penyesuaian', 'penyesuaian', 'x_inval', 'inval', '`inval`', '`inval`', 3, 20, -1, FALSE, '`inval`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->inval->Sortable = TRUE; // Allow sort
		$this->inval->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['inval'] = &$this->inval;

		// lembur
		$this->lembur = new DbField('penyesuaian', 'penyesuaian', 'x_lembur', 'lembur', '`lembur`', '`lembur`', 3, 20, -1, FALSE, '`lembur`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->lembur->Sortable = TRUE; // Allow sort
		$this->lembur->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['lembur'] = &$this->lembur;

		// voucher
		$this->voucher = new DbField('penyesuaian', 'penyesuaian', 'x_voucher', 'voucher', '`voucher`', '`voucher`', 20, 200, -1, FALSE, '`voucher`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->voucher->Sortable = TRUE; // Allow sort
		$this->voucher->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['voucher'] = &$this->voucher;

		// total
		$this->total = new DbField('penyesuaian', 'penyesuaian', 'x_total', 'total', '`total`', '`total`', 20, 200, -1, FALSE, '`total`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->total->Sortable = TRUE; // Allow sort
		$this->total->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['total'] = &$this->total;

		// total2
		$this->total2 = new DbField('penyesuaian', 'penyesuaian', 'x_total2', 'total2', '`total2`', '`total2`', 20, 200, -1, FALSE, '`total2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->total2->Sortable = TRUE; // Allow sort
		$this->total2->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['total2'] = &$this->total2;
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

	// Current master table name
	public function getCurrentMasterTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE")];
	}
	public function setCurrentMasterTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE")] = $v;
	}

	// Session master WHERE clause
	public function getMasterFilter()
	{

		// Master filter
		$masterFilter = "";
		if ($this->getCurrentMasterTable() == "m_penyesuaian") {
			if ($this->m_id->getSessionValue() != "")
				$masterFilter .= "`id`=" . QuotedValue($this->m_id->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $masterFilter;
	}

	// Session detail WHERE clause
	public function getDetailFilter()
	{

		// Detail filter
		$detailFilter = "";
		if ($this->getCurrentMasterTable() == "m_penyesuaian") {
			if ($this->m_id->getSessionValue() != "")
				$detailFilter .= "`m_id`=" . QuotedValue($this->m_id->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_m_penyesuaian()
	{
		return "`id`=@id@";
	}

	// Detail filter
	public function sqlDetailFilter_m_penyesuaian()
	{
		return "`m_id`=@m_id@";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`penyesuaian`";
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
		$this->m_id->DbValue = $row['m_id'];
		$this->datetime->DbValue = $row['datetime'];
		$this->nip->DbValue = $row['nip'];
		$this->jenjang_id->DbValue = $row['jenjang_id'];
		$this->absen->DbValue = $row['absen'];
		$this->absen_jam->DbValue = $row['absen_jam'];
		$this->izin->DbValue = $row['izin'];
		$this->izin_jam->DbValue = $row['izin_jam'];
		$this->sakit->DbValue = $row['sakit'];
		$this->sakit_jam->DbValue = $row['sakit_jam'];
		$this->terlambat->DbValue = $row['terlambat'];
		$this->pulang_cepat->DbValue = $row['pulang_cepat'];
		$this->piket->DbValue = $row['piket'];
		$this->inval->DbValue = $row['inval'];
		$this->lembur->DbValue = $row['lembur'];
		$this->voucher->DbValue = $row['voucher'];
		$this->total->DbValue = $row['total'];
		$this->total2->DbValue = $row['total2'];
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
			return "penyesuaianlist.php";
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
		if ($pageName == "penyesuaianview.php")
			return $Language->phrase("View");
		elseif ($pageName == "penyesuaianedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "penyesuaianadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "penyesuaianlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("penyesuaianview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("penyesuaianview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "penyesuaianadd.php?" . $this->getUrlParm($parm);
		else
			$url = "penyesuaianadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("penyesuaianedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("penyesuaianadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("penyesuaiandelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "m_penyesuaian" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_id=" . urlencode($this->m_id->CurrentValue);
		}
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
		$this->m_id->setDbValue($rs->fields('m_id'));
		$this->datetime->setDbValue($rs->fields('datetime'));
		$this->nip->setDbValue($rs->fields('nip'));
		$this->jenjang_id->setDbValue($rs->fields('jenjang_id'));
		$this->absen->setDbValue($rs->fields('absen'));
		$this->absen_jam->setDbValue($rs->fields('absen_jam'));
		$this->izin->setDbValue($rs->fields('izin'));
		$this->izin_jam->setDbValue($rs->fields('izin_jam'));
		$this->sakit->setDbValue($rs->fields('sakit'));
		$this->sakit_jam->setDbValue($rs->fields('sakit_jam'));
		$this->terlambat->setDbValue($rs->fields('terlambat'));
		$this->pulang_cepat->setDbValue($rs->fields('pulang_cepat'));
		$this->piket->setDbValue($rs->fields('piket'));
		$this->inval->setDbValue($rs->fields('inval'));
		$this->lembur->setDbValue($rs->fields('lembur'));
		$this->voucher->setDbValue($rs->fields('voucher'));
		$this->total->setDbValue($rs->fields('total'));
		$this->total2->setDbValue($rs->fields('total2'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// m_id
		// datetime
		// nip
		// jenjang_id
		// absen
		// absen_jam
		// izin
		// izin_jam
		// sakit
		// sakit_jam
		// terlambat
		// pulang_cepat
		// piket
		// inval
		// lembur
		// voucher
		// total
		// total2
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// m_id
		$this->m_id->ViewValue = $this->m_id->CurrentValue;
		$this->m_id->ViewValue = FormatNumber($this->m_id->ViewValue, 0, -2, -2, -2);
		$this->m_id->ViewCustomAttributes = "";

		// datetime
		$this->datetime->ViewValue = $this->datetime->CurrentValue;
		$this->datetime->ViewValue = FormatDateTime($this->datetime->ViewValue, 0);
		$this->datetime->ViewCustomAttributes = "";

		// nip
		$curVal = strval($this->nip->CurrentValue);
		if ($curVal != "") {
			$this->nip->ViewValue = $this->nip->lookupCacheOption($curVal);
			if ($this->nip->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`nip`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->nip->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->nip->ViewValue = $this->nip->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->nip->ViewValue = $this->nip->CurrentValue;
				}
			}
		} else {
			$this->nip->ViewValue = NULL;
		}
		$this->nip->ViewCustomAttributes = "";

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

		// absen
		$this->absen->ViewValue = $this->absen->CurrentValue;
		$this->absen->ViewValue = FormatNumber($this->absen->ViewValue, 0, -2, -2, -2);
		$this->absen->ViewCustomAttributes = "";

		// absen_jam
		$this->absen_jam->ViewValue = $this->absen_jam->CurrentValue;
		$this->absen_jam->ViewValue = FormatNumber($this->absen_jam->ViewValue, 0, -2, -2, -2);
		$this->absen_jam->ViewCustomAttributes = "";

		// izin
		$this->izin->ViewValue = $this->izin->CurrentValue;
		$this->izin->ViewValue = FormatNumber($this->izin->ViewValue, 0, -2, -2, -2);
		$this->izin->ViewCustomAttributes = "";

		// izin_jam
		$this->izin_jam->ViewValue = $this->izin_jam->CurrentValue;
		$this->izin_jam->ViewValue = FormatNumber($this->izin_jam->ViewValue, 0, -2, -2, -2);
		$this->izin_jam->ViewCustomAttributes = "";

		// sakit
		$this->sakit->ViewValue = $this->sakit->CurrentValue;
		$this->sakit->ViewValue = FormatNumber($this->sakit->ViewValue, 0, -2, -2, -2);
		$this->sakit->ViewCustomAttributes = "";

		// sakit_jam
		$this->sakit_jam->ViewValue = $this->sakit_jam->CurrentValue;
		$this->sakit_jam->ViewValue = FormatNumber($this->sakit_jam->ViewValue, 0, -2, -2, -2);
		$this->sakit_jam->ViewCustomAttributes = "";

		// terlambat
		$this->terlambat->ViewValue = $this->terlambat->CurrentValue;
		$this->terlambat->ViewValue = FormatNumber($this->terlambat->ViewValue, 0, -2, -2, -2);
		$this->terlambat->ViewCustomAttributes = "";

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

		// voucher
		$this->voucher->ViewValue = $this->voucher->CurrentValue;
		$this->voucher->ViewValue = FormatNumber($this->voucher->ViewValue, 0, -2, -2, -2);
		$this->voucher->ViewCustomAttributes = "";

		// total
		$this->total->ViewValue = $this->total->CurrentValue;
		$this->total->ViewValue = FormatNumber($this->total->ViewValue, 0, -2, -2, -2);
		$this->total->ViewCustomAttributes = "";

		// total2
		$this->total2->ViewValue = $this->total2->CurrentValue;
		$this->total2->ViewValue = FormatNumber($this->total2->ViewValue, 0, -2, -2, -2);
		$this->total2->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// m_id
		$this->m_id->LinkCustomAttributes = "";
		$this->m_id->HrefValue = "";
		$this->m_id->TooltipValue = "";

		// datetime
		$this->datetime->LinkCustomAttributes = "";
		$this->datetime->HrefValue = "";
		$this->datetime->TooltipValue = "";

		// nip
		$this->nip->LinkCustomAttributes = "";
		$this->nip->HrefValue = "";
		$this->nip->TooltipValue = "";

		// jenjang_id
		$this->jenjang_id->LinkCustomAttributes = "";
		$this->jenjang_id->HrefValue = "";
		$this->jenjang_id->TooltipValue = "";

		// absen
		$this->absen->LinkCustomAttributes = "";
		$this->absen->HrefValue = "";
		$this->absen->TooltipValue = "";

		// absen_jam
		$this->absen_jam->LinkCustomAttributes = "";
		$this->absen_jam->HrefValue = "";
		$this->absen_jam->TooltipValue = "";

		// izin
		$this->izin->LinkCustomAttributes = "";
		$this->izin->HrefValue = "";
		$this->izin->TooltipValue = "";

		// izin_jam
		$this->izin_jam->LinkCustomAttributes = "";
		$this->izin_jam->HrefValue = "";
		$this->izin_jam->TooltipValue = "";

		// sakit
		$this->sakit->LinkCustomAttributes = "";
		$this->sakit->HrefValue = "";
		$this->sakit->TooltipValue = "";

		// sakit_jam
		$this->sakit_jam->LinkCustomAttributes = "";
		$this->sakit_jam->HrefValue = "";
		$this->sakit_jam->TooltipValue = "";

		// terlambat
		$this->terlambat->LinkCustomAttributes = "";
		$this->terlambat->HrefValue = "";
		$this->terlambat->TooltipValue = "";

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

		// voucher
		$this->voucher->LinkCustomAttributes = "";
		$this->voucher->HrefValue = "";
		$this->voucher->TooltipValue = "";

		// total
		$this->total->LinkCustomAttributes = "";
		$this->total->HrefValue = "";
		$this->total->TooltipValue = "";

		// total2
		$this->total2->LinkCustomAttributes = "";
		$this->total2->HrefValue = "";
		$this->total2->TooltipValue = "";

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

		// m_id
		$this->m_id->EditAttrs["class"] = "form-control";
		$this->m_id->EditCustomAttributes = "";
		if ($this->m_id->getSessionValue() != "") {
			$this->m_id->CurrentValue = $this->m_id->getSessionValue();
			$this->m_id->ViewValue = $this->m_id->CurrentValue;
			$this->m_id->ViewValue = FormatNumber($this->m_id->ViewValue, 0, -2, -2, -2);
			$this->m_id->ViewCustomAttributes = "";
		} else {
			$this->m_id->EditValue = $this->m_id->CurrentValue;
			$this->m_id->PlaceHolder = RemoveHtml($this->m_id->caption());
		}

		// datetime
		// nip

		$this->nip->EditAttrs["class"] = "form-control";
		$this->nip->EditCustomAttributes = "";

		// jenjang_id
		$this->jenjang_id->EditAttrs["class"] = "form-control";
		$this->jenjang_id->EditCustomAttributes = "";
		$this->jenjang_id->EditValue = $this->jenjang_id->CurrentValue;
		$this->jenjang_id->PlaceHolder = RemoveHtml($this->jenjang_id->caption());

		// absen
		$this->absen->EditAttrs["class"] = "form-control";
		$this->absen->EditCustomAttributes = "";
		$this->absen->EditValue = $this->absen->CurrentValue;
		$this->absen->PlaceHolder = RemoveHtml($this->absen->caption());

		// absen_jam
		$this->absen_jam->EditAttrs["class"] = "form-control";
		$this->absen_jam->EditCustomAttributes = "";
		$this->absen_jam->EditValue = $this->absen_jam->CurrentValue;
		$this->absen_jam->PlaceHolder = RemoveHtml($this->absen_jam->caption());

		// izin
		$this->izin->EditAttrs["class"] = "form-control";
		$this->izin->EditCustomAttributes = "";
		$this->izin->EditValue = $this->izin->CurrentValue;
		$this->izin->PlaceHolder = RemoveHtml($this->izin->caption());

		// izin_jam
		$this->izin_jam->EditAttrs["class"] = "form-control";
		$this->izin_jam->EditCustomAttributes = "";
		$this->izin_jam->EditValue = $this->izin_jam->CurrentValue;
		$this->izin_jam->PlaceHolder = RemoveHtml($this->izin_jam->caption());

		// sakit
		$this->sakit->EditAttrs["class"] = "form-control";
		$this->sakit->EditCustomAttributes = "";
		$this->sakit->EditValue = $this->sakit->CurrentValue;
		$this->sakit->PlaceHolder = RemoveHtml($this->sakit->caption());

		// sakit_jam
		$this->sakit_jam->EditAttrs["class"] = "form-control";
		$this->sakit_jam->EditCustomAttributes = "";
		$this->sakit_jam->EditValue = $this->sakit_jam->CurrentValue;
		$this->sakit_jam->PlaceHolder = RemoveHtml($this->sakit_jam->caption());

		// terlambat
		$this->terlambat->EditAttrs["class"] = "form-control";
		$this->terlambat->EditCustomAttributes = "";
		$this->terlambat->EditValue = $this->terlambat->CurrentValue;
		$this->terlambat->PlaceHolder = RemoveHtml($this->terlambat->caption());

		// pulang_cepat
		$this->pulang_cepat->EditAttrs["class"] = "form-control";
		$this->pulang_cepat->EditCustomAttributes = "";
		$this->pulang_cepat->EditValue = $this->pulang_cepat->CurrentValue;
		$this->pulang_cepat->PlaceHolder = RemoveHtml($this->pulang_cepat->caption());

		// piket
		$this->piket->EditAttrs["class"] = "form-control";
		$this->piket->EditCustomAttributes = "";
		$this->piket->EditValue = $this->piket->CurrentValue;
		$this->piket->PlaceHolder = RemoveHtml($this->piket->caption());

		// inval
		$this->inval->EditAttrs["class"] = "form-control";
		$this->inval->EditCustomAttributes = "";
		$this->inval->EditValue = $this->inval->CurrentValue;
		$this->inval->PlaceHolder = RemoveHtml($this->inval->caption());

		// lembur
		$this->lembur->EditAttrs["class"] = "form-control";
		$this->lembur->EditCustomAttributes = "";
		$this->lembur->EditValue = $this->lembur->CurrentValue;
		$this->lembur->PlaceHolder = RemoveHtml($this->lembur->caption());

		// voucher
		$this->voucher->EditAttrs["class"] = "form-control";
		$this->voucher->EditCustomAttributes = "";
		$this->voucher->EditValue = $this->voucher->CurrentValue;
		$this->voucher->PlaceHolder = RemoveHtml($this->voucher->caption());

		// total
		$this->total->EditAttrs["class"] = "form-control";
		$this->total->EditCustomAttributes = "";
		$this->total->EditValue = $this->total->CurrentValue;
		$this->total->PlaceHolder = RemoveHtml($this->total->caption());

		// total2
		$this->total2->EditAttrs["class"] = "form-control";
		$this->total2->EditCustomAttributes = "";
		$this->total2->EditValue = $this->total2->CurrentValue;
		$this->total2->PlaceHolder = RemoveHtml($this->total2->caption());

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
					$doc->exportCaption($this->m_id);
					$doc->exportCaption($this->datetime);
					$doc->exportCaption($this->nip);
					$doc->exportCaption($this->jenjang_id);
					$doc->exportCaption($this->absen);
					$doc->exportCaption($this->absen_jam);
					$doc->exportCaption($this->izin);
					$doc->exportCaption($this->izin_jam);
					$doc->exportCaption($this->sakit);
					$doc->exportCaption($this->sakit_jam);
					$doc->exportCaption($this->terlambat);
					$doc->exportCaption($this->pulang_cepat);
					$doc->exportCaption($this->piket);
					$doc->exportCaption($this->inval);
					$doc->exportCaption($this->lembur);
					$doc->exportCaption($this->voucher);
					$doc->exportCaption($this->total);
					$doc->exportCaption($this->total2);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->m_id);
					$doc->exportCaption($this->datetime);
					$doc->exportCaption($this->nip);
					$doc->exportCaption($this->jenjang_id);
					$doc->exportCaption($this->absen);
					$doc->exportCaption($this->absen_jam);
					$doc->exportCaption($this->izin);
					$doc->exportCaption($this->izin_jam);
					$doc->exportCaption($this->sakit);
					$doc->exportCaption($this->sakit_jam);
					$doc->exportCaption($this->terlambat);
					$doc->exportCaption($this->pulang_cepat);
					$doc->exportCaption($this->piket);
					$doc->exportCaption($this->inval);
					$doc->exportCaption($this->lembur);
					$doc->exportCaption($this->voucher);
					$doc->exportCaption($this->total);
					$doc->exportCaption($this->total2);
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
						$doc->exportField($this->m_id);
						$doc->exportField($this->datetime);
						$doc->exportField($this->nip);
						$doc->exportField($this->jenjang_id);
						$doc->exportField($this->absen);
						$doc->exportField($this->absen_jam);
						$doc->exportField($this->izin);
						$doc->exportField($this->izin_jam);
						$doc->exportField($this->sakit);
						$doc->exportField($this->sakit_jam);
						$doc->exportField($this->terlambat);
						$doc->exportField($this->pulang_cepat);
						$doc->exportField($this->piket);
						$doc->exportField($this->inval);
						$doc->exportField($this->lembur);
						$doc->exportField($this->voucher);
						$doc->exportField($this->total);
						$doc->exportField($this->total2);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->m_id);
						$doc->exportField($this->datetime);
						$doc->exportField($this->nip);
						$doc->exportField($this->jenjang_id);
						$doc->exportField($this->absen);
						$doc->exportField($this->absen_jam);
						$doc->exportField($this->izin);
						$doc->exportField($this->izin_jam);
						$doc->exportField($this->sakit);
						$doc->exportField($this->sakit_jam);
						$doc->exportField($this->terlambat);
						$doc->exportField($this->pulang_cepat);
						$doc->exportField($this->piket);
						$doc->exportField($this->inval);
						$doc->exportField($this->lembur);
						$doc->exportField($this->voucher);
						$doc->exportField($this->total);
						$doc->exportField($this->total2);
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

				$pegawai = ExecuteRow("SELECT * FROM pegawai WHERE nip='".$rsold['nip']."'");
			$absen = ExecuteScalar("SELECT value FROM m_tidakhadir WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$izin = ExecuteScalar("SELECT value FROM jenis_ijin WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$sakit = ExecuteScalar("SELECT perhari FROM m_sakit WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$absen_jam = ExecuteScalar("SELECT perjam_value FROM m_tidakhadir WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$izin_jam = ExecuteScalar("SELECT valueperjam FROM jenis_ijin WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$sakit_jam = ExecuteScalar("SELECT perjam FROM m_sakit WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$telambat = ExecuteScalar("SELECT value FROM terlambat WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$pulang_cepat = ExecuteScalar("SELECT perhari FROM m_pulangcepat WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$piket = ExecuteScalar("SELECT value FROM m_piket WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$inval = ExecuteScalar("SELECT value FROM m_inval WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$lembur = ExecuteScalar("SELECT value_perjam FROM m_lembur WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$potongan = ($absen * $rsold['absen']) + ($izin * $rsold['izin']) + ($sakit * $rsold['sakit']) + ($absen_jam * $rsold['absen_jam']) + ($izin_jam * $rsold['izin_jam']) + ($sakit_jam * $rsold['sakit_jam']) + ($telambat * $rsold['terlambat']) + ($pulang_cepat * $rsold['pulang_cepat']);
			$penyesuaian = ($piket * $rsold['piket']) + ($inval * $rsold['inval']) + ($lembur * $rsold['lembur']);
			$rsnew['datetime'] = date('Y-m-d H:i:s');
			$rsnew['total'] = $potongan;
			$rsnew['total2'] = $penyesuaian;
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

				$pegawai = ExecuteRow("SELECT * FROM pegawai WHERE nip='".$rsold['nip']."'");
			$absen = ExecuteScalar("SELECT value FROM m_tidakhadir WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$izin = ExecuteScalar("SELECT value FROM jenis_ijin WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$sakit = ExecuteScalar("SELECT perhari FROM m_sakit WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$absen_jam = ExecuteScalar("SELECT perjam_value FROM m_tidakhadir WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$izin_jam = ExecuteScalar("SELECT valueperjam FROM jenis_ijin WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$sakit_jam = ExecuteScalar("SELECT perjam FROM m_sakit WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$telambat = ExecuteScalar("SELECT value FROM terlambat WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$pulang_cepat = ExecuteScalar("SELECT perhari FROM m_pulangcepat WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$piket = ExecuteScalar("SELECT value FROM m_piket WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$inval = ExecuteScalar("SELECT value FROM m_inval WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$lembur = ExecuteScalar("SELECT value_perjam FROM m_lembur WHERE jenjang_id='".$pegawai['jenjang_id']."'");
			$potongan = ($absen * $rsold['absen']) + ($izin * $rsold['izin']) + ($sakit * $rsold['sakit']) + ($absen_jam * $rsold['absen_jam']) + ($izin_jam * $rsold['izin_jam']) + ($sakit_jam * $rsold['sakit_jam']) + ($telambat * $rsold['terlambat']) + ($pulang_cepat * $rsold['pulang_cepat']);
			$penyesuaian = ($piket * $rsold['piket']) + ($inval * $rsold['inval']) + ($lembur * $rsold['lembur']);
			$rsnew['datetime'] = date('Y-m-d H:i:s');
			$rsnew['total'] = $potongan;
			$rsnew['total2'] = $penyesuaian;
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