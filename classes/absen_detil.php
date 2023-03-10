<?php namespace PHPMaker2020\sigap; ?>
<?php

/**
 * Table class for absen_detil
 */
class absen_detil extends DbTable
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
	public $pid;
	public $date;
	public $pegawai;
	public $jenjang;
	public $masuk;
	public $absen;
	public $ijin;
	public $terlambat;
	public $sakit;
	public $pulang_cepat;
	public $piket;
	public $inval;
	public $lembur;
	public $penyesuaian;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'absen_detil';
		$this->TableName = 'absen_detil';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`absen_detil`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = TRUE; // Allow detail add
		$this->DetailEdit = TRUE; // Allow detail edit
		$this->DetailView = TRUE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('absen_detil', 'absen_detil', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// pid
		$this->pid = new DbField('absen_detil', 'absen_detil', 'x_pid', 'pid', '`pid`', '`pid`', 3, 11, -1, FALSE, '`pid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pid->IsForeignKey = TRUE; // Foreign key field
		$this->pid->Sortable = TRUE; // Allow sort
		$this->pid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['pid'] = &$this->pid;

		// date
		$this->date = new DbField('absen_detil', 'absen_detil', 'x_date', 'date', '`date`', CastDateFieldForLike("`date`", 0, "DB"), 133, 10, 0, FALSE, '`date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->date->Sortable = FALSE; // Allow sort
		$this->date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['date'] = &$this->date;

		// pegawai
		$this->pegawai = new DbField('absen_detil', 'absen_detil', 'x_pegawai', 'pegawai', '`pegawai`', '`pegawai`', 200, 50, -1, FALSE, '`pegawai`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pegawai->Sortable = TRUE; // Allow sort
		$this->pegawai->Lookup = new Lookup('pegawai', 'pegawai', FALSE, 'nip', ["nama","","",""], [], [], [], [], [], [], '', '');
		$this->fields['pegawai'] = &$this->pegawai;

		// jenjang
		$this->jenjang = new DbField('absen_detil', 'absen_detil', 'x_jenjang', 'jenjang', '`jenjang`', '`jenjang`', 3, 11, -1, FALSE, '`jenjang`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->jenjang->Sortable = TRUE; // Allow sort
		$this->jenjang->Lookup = new Lookup('jenjang', 'tpendidikan', FALSE, 'nourut', ["name","","",""], [], [], [], [], [], [], '', '');
		$this->jenjang->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['jenjang'] = &$this->jenjang;

		// masuk
		$this->masuk = new DbField('absen_detil', 'absen_detil', 'x_masuk', 'masuk', '`masuk`', '`masuk`', 2, 255, -1, FALSE, '`masuk`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->masuk->Sortable = TRUE; // Allow sort
		$this->masuk->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['masuk'] = &$this->masuk;

		// absen
		$this->absen = new DbField('absen_detil', 'absen_detil', 'x_absen', 'absen', '`absen`', '`absen`', 2, 255, -1, FALSE, '`absen`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->absen->Sortable = TRUE; // Allow sort
		$this->absen->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['absen'] = &$this->absen;

		// ijin
		$this->ijin = new DbField('absen_detil', 'absen_detil', 'x_ijin', 'ijin', '`ijin`', '`ijin`', 2, 255, -1, FALSE, '`ijin`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ijin->Sortable = TRUE; // Allow sort
		$this->ijin->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['ijin'] = &$this->ijin;

		// terlambat
		$this->terlambat = new DbField('absen_detil', 'absen_detil', 'x_terlambat', 'terlambat', '`terlambat`', '`terlambat`', 2, 255, -1, FALSE, '`terlambat`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->terlambat->Sortable = TRUE; // Allow sort
		$this->terlambat->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['terlambat'] = &$this->terlambat;

		// sakit
		$this->sakit = new DbField('absen_detil', 'absen_detil', 'x_sakit', 'sakit', '`sakit`', '`sakit`', 2, 5, -1, FALSE, '`sakit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sakit->Sortable = TRUE; // Allow sort
		$this->sakit->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sakit'] = &$this->sakit;

		// pulang_cepat
		$this->pulang_cepat = new DbField('absen_detil', 'absen_detil', 'x_pulang_cepat', 'pulang_cepat', '`pulang_cepat`', '`pulang_cepat`', 2, 5, -1, FALSE, '`pulang_cepat`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pulang_cepat->Sortable = TRUE; // Allow sort
		$this->pulang_cepat->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['pulang_cepat'] = &$this->pulang_cepat;

		// piket
		$this->piket = new DbField('absen_detil', 'absen_detil', 'x_piket', 'piket', '`piket`', '`piket`', 2, 5, -1, FALSE, '`piket`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->piket->Sortable = TRUE; // Allow sort
		$this->piket->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['piket'] = &$this->piket;

		// inval
		$this->inval = new DbField('absen_detil', 'absen_detil', 'x_inval', 'inval', '`inval`', '`inval`', 2, 5, -1, FALSE, '`inval`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->inval->Sortable = TRUE; // Allow sort
		$this->inval->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['inval'] = &$this->inval;

		// lembur
		$this->lembur = new DbField('absen_detil', 'absen_detil', 'x_lembur', 'lembur', '`lembur`', '`lembur`', 2, 5, -1, FALSE, '`lembur`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->lembur->Sortable = TRUE; // Allow sort
		$this->lembur->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['lembur'] = &$this->lembur;

		// penyesuaian
		$this->penyesuaian = new DbField('absen_detil', 'absen_detil', 'x_penyesuaian', 'penyesuaian', '`penyesuaian`', '`penyesuaian`', 3, 11, -1, FALSE, '`penyesuaian`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->penyesuaian->Sortable = TRUE; // Allow sort
		$this->penyesuaian->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['penyesuaian'] = &$this->penyesuaian;
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
		if ($this->getCurrentMasterTable() == "absen") {
			if ($this->pid->getSessionValue() != "")
				$masterFilter .= "`id`=" . QuotedValue($this->pid->getSessionValue(), DATATYPE_NUMBER, "DB");
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
		if ($this->getCurrentMasterTable() == "absen") {
			if ($this->pid->getSessionValue() != "")
				$detailFilter .= "`pid`=" . QuotedValue($this->pid->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_absen()
	{
		return "`id`=@id@";
	}

	// Detail filter
	public function sqlDetailFilter_absen()
	{
		return "`pid`=@pid@";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`absen_detil`";
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
		$this->pid->DbValue = $row['pid'];
		$this->date->DbValue = $row['date'];
		$this->pegawai->DbValue = $row['pegawai'];
		$this->jenjang->DbValue = $row['jenjang'];
		$this->masuk->DbValue = $row['masuk'];
		$this->absen->DbValue = $row['absen'];
		$this->ijin->DbValue = $row['ijin'];
		$this->terlambat->DbValue = $row['terlambat'];
		$this->sakit->DbValue = $row['sakit'];
		$this->pulang_cepat->DbValue = $row['pulang_cepat'];
		$this->piket->DbValue = $row['piket'];
		$this->inval->DbValue = $row['inval'];
		$this->lembur->DbValue = $row['lembur'];
		$this->penyesuaian->DbValue = $row['penyesuaian'];
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
			return "absen_detillist.php";
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
		if ($pageName == "absen_detilview.php")
			return $Language->phrase("View");
		elseif ($pageName == "absen_detiledit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "absen_detiladd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "absen_detillist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("absen_detilview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("absen_detilview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "absen_detiladd.php?" . $this->getUrlParm($parm);
		else
			$url = "absen_detiladd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("absen_detiledit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("absen_detiladd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("absen_detildelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "absen" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_id=" . urlencode($this->pid->CurrentValue);
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
		$this->pid->setDbValue($rs->fields('pid'));
		$this->date->setDbValue($rs->fields('date'));
		$this->pegawai->setDbValue($rs->fields('pegawai'));
		$this->jenjang->setDbValue($rs->fields('jenjang'));
		$this->masuk->setDbValue($rs->fields('masuk'));
		$this->absen->setDbValue($rs->fields('absen'));
		$this->ijin->setDbValue($rs->fields('ijin'));
		$this->terlambat->setDbValue($rs->fields('terlambat'));
		$this->sakit->setDbValue($rs->fields('sakit'));
		$this->pulang_cepat->setDbValue($rs->fields('pulang_cepat'));
		$this->piket->setDbValue($rs->fields('piket'));
		$this->inval->setDbValue($rs->fields('inval'));
		$this->lembur->setDbValue($rs->fields('lembur'));
		$this->penyesuaian->setDbValue($rs->fields('penyesuaian'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// pid
		// date

		$this->date->CellCssStyle = "white-space: nowrap;";

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
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// pid
		$this->pid->ViewValue = $this->pid->CurrentValue;
		$this->pid->ViewValue = FormatNumber($this->pid->ViewValue, 0, -2, -2, -2);
		$this->pid->ViewCustomAttributes = "";

		// date
		$this->date->ViewValue = $this->date->CurrentValue;
		$this->date->ViewValue = FormatDateTime($this->date->ViewValue, 0);
		$this->date->ViewCustomAttributes = "";

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

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// pid
		$this->pid->LinkCustomAttributes = "";
		$this->pid->HrefValue = "";
		$this->pid->TooltipValue = "";

		// date
		$this->date->LinkCustomAttributes = "";
		$this->date->HrefValue = "";
		$this->date->TooltipValue = "";

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

		// pid
		$this->pid->EditAttrs["class"] = "form-control";
		$this->pid->EditCustomAttributes = "";
		if ($this->pid->getSessionValue() != "") {
			$this->pid->CurrentValue = $this->pid->getSessionValue();
			$this->pid->ViewValue = $this->pid->CurrentValue;
			$this->pid->ViewValue = FormatNumber($this->pid->ViewValue, 0, -2, -2, -2);
			$this->pid->ViewCustomAttributes = "";
		} else {
			$this->pid->EditValue = $this->pid->CurrentValue;
			$this->pid->PlaceHolder = RemoveHtml($this->pid->caption());
		}

		// date
		$this->date->EditAttrs["class"] = "form-control";
		$this->date->EditCustomAttributes = "";
		$this->date->EditValue = FormatDateTime($this->date->CurrentValue, 8);
		$this->date->PlaceHolder = RemoveHtml($this->date->caption());

		// pegawai
		$this->pegawai->EditAttrs["class"] = "form-control";
		$this->pegawai->EditCustomAttributes = "";
		if (!$this->pegawai->Raw)
			$this->pegawai->CurrentValue = HtmlDecode($this->pegawai->CurrentValue);
		$this->pegawai->EditValue = $this->pegawai->CurrentValue;
		$this->pegawai->PlaceHolder = RemoveHtml($this->pegawai->caption());

		// jenjang
		$this->jenjang->EditAttrs["class"] = "form-control";
		$this->jenjang->EditCustomAttributes = "";
		$this->jenjang->EditValue = $this->jenjang->CurrentValue;
		$this->jenjang->PlaceHolder = RemoveHtml($this->jenjang->caption());

		// masuk
		$this->masuk->EditAttrs["class"] = "form-control";
		$this->masuk->EditCustomAttributes = "";
		$this->masuk->EditValue = $this->masuk->CurrentValue;
		$this->masuk->PlaceHolder = RemoveHtml($this->masuk->caption());

		// absen
		$this->absen->EditAttrs["class"] = "form-control";
		$this->absen->EditCustomAttributes = "";
		$this->absen->EditValue = $this->absen->CurrentValue;
		$this->absen->PlaceHolder = RemoveHtml($this->absen->caption());

		// ijin
		$this->ijin->EditAttrs["class"] = "form-control";
		$this->ijin->EditCustomAttributes = "";
		$this->ijin->EditValue = $this->ijin->CurrentValue;
		$this->ijin->PlaceHolder = RemoveHtml($this->ijin->caption());

		// terlambat
		$this->terlambat->EditAttrs["class"] = "form-control";
		$this->terlambat->EditCustomAttributes = "";
		$this->terlambat->EditValue = $this->terlambat->CurrentValue;
		$this->terlambat->PlaceHolder = RemoveHtml($this->terlambat->caption());

		// sakit
		$this->sakit->EditAttrs["class"] = "form-control";
		$this->sakit->EditCustomAttributes = "";
		$this->sakit->EditValue = $this->sakit->CurrentValue;
		$this->sakit->PlaceHolder = RemoveHtml($this->sakit->caption());

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

		// penyesuaian
		$this->penyesuaian->EditAttrs["class"] = "form-control";
		$this->penyesuaian->EditCustomAttributes = "";
		$this->penyesuaian->EditValue = $this->penyesuaian->CurrentValue;
		$this->penyesuaian->PlaceHolder = RemoveHtml($this->penyesuaian->caption());

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
					$doc->exportCaption($this->pid);
					$doc->exportCaption($this->pegawai);
					$doc->exportCaption($this->jenjang);
					$doc->exportCaption($this->masuk);
					$doc->exportCaption($this->absen);
					$doc->exportCaption($this->ijin);
					$doc->exportCaption($this->terlambat);
					$doc->exportCaption($this->sakit);
					$doc->exportCaption($this->pulang_cepat);
					$doc->exportCaption($this->piket);
					$doc->exportCaption($this->inval);
					$doc->exportCaption($this->lembur);
					$doc->exportCaption($this->penyesuaian);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->pid);
					$doc->exportCaption($this->pegawai);
					$doc->exportCaption($this->jenjang);
					$doc->exportCaption($this->masuk);
					$doc->exportCaption($this->absen);
					$doc->exportCaption($this->ijin);
					$doc->exportCaption($this->terlambat);
					$doc->exportCaption($this->sakit);
					$doc->exportCaption($this->pulang_cepat);
					$doc->exportCaption($this->piket);
					$doc->exportCaption($this->inval);
					$doc->exportCaption($this->lembur);
					$doc->exportCaption($this->penyesuaian);
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
						$doc->exportField($this->pid);
						$doc->exportField($this->pegawai);
						$doc->exportField($this->jenjang);
						$doc->exportField($this->masuk);
						$doc->exportField($this->absen);
						$doc->exportField($this->ijin);
						$doc->exportField($this->terlambat);
						$doc->exportField($this->sakit);
						$doc->exportField($this->pulang_cepat);
						$doc->exportField($this->piket);
						$doc->exportField($this->inval);
						$doc->exportField($this->lembur);
						$doc->exportField($this->penyesuaian);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->pid);
						$doc->exportField($this->pegawai);
						$doc->exportField($this->jenjang);
						$doc->exportField($this->masuk);
						$doc->exportField($this->absen);
						$doc->exportField($this->ijin);
						$doc->exportField($this->terlambat);
						$doc->exportField($this->sakit);
						$doc->exportField($this->pulang_cepat);
						$doc->exportField($this->piket);
						$doc->exportField($this->inval);
						$doc->exportField($this->lembur);
						$doc->exportField($this->penyesuaian);
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
				if(CurrentUserLevel() != '-1'){
				$nip = CurrentUserInfo("id");
				if($nip != '' OR $nip != FALSE) {
					AddFilter($filter, "pegawai = $nip");
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
			if (CurrentPageID() == "add") {
						$grid_count = $this->GridAddRowCount;
						if(isset($this->RowIndex)) {
							$grid_num = $this->RowIndex;

							//only when we are dawing actual rows
							if(($grid_count >= $grid_num) && is_int($grid_num) && ($grid_num >= 1)){
								$offseter = $grid_num - 1;
								$row = ExecuteRow("SELECT * FROM pegawai where jenjang_id ='4' AND `type`= '1' limit 1 OFFSET $offseter");

										//$this->pegawai->CurrentValue ='';
										$this->pegawai->CurrentValue = $row['nip'];
										$this->jenjang_id->CurrentValue = $row['jenjang_id'];
					}
								}
								}
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