<?php namespace PHPMaker2020\sigap; ?>
<?php

/**
 * Table class for gaji_karyawan_smp
 */
class gaji_karyawan_smp extends DbTable
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
	public $tahun;
	public $bulan;
	public $pegawai;
	public $jenjang_id;
	public $jabatan_id;
	public $kehadiran;
	public $gapok;
	public $value_kehadiran;
	public $value_reward;
	public $value_inval;
	public $sub_total;
	public $potongan;
	public $penyesuaian;
	public $potongan_bendahara;
	public $total;
	public $pid;
	public $voucher;
	public $status;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'gaji_karyawan_smp';
		$this->TableName = 'gaji_karyawan_smp';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`gaji_karyawan_smp`";
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
		$this->DetailEdit = TRUE; // Allow detail edit
		$this->DetailView = TRUE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('gaji_karyawan_smp', 'gaji_karyawan_smp', 'x_id', 'id', '`id`', '`id`', 3, 10, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// tahun
		$this->tahun = new DbField('gaji_karyawan_smp', 'gaji_karyawan_smp', 'x_tahun', 'tahun', '`tahun`', '`tahun`', 3, 11, -1, FALSE, '`tahun`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tahun->IsForeignKey = TRUE; // Foreign key field
		$this->tahun->Sortable = TRUE; // Allow sort
		$this->tahun->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['tahun'] = &$this->tahun;

		// bulan
		$this->bulan = new DbField('gaji_karyawan_smp', 'gaji_karyawan_smp', 'x_bulan', 'bulan', '`bulan`', '`bulan`', 3, 11, -1, FALSE, '`bulan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->bulan->IsForeignKey = TRUE; // Foreign key field
		$this->bulan->Sortable = TRUE; // Allow sort
		$this->bulan->Lookup = new Lookup('bulan', 'bulan', FALSE, 'id', ["bulan","","",""], [], [], [], [], [], [], '', '');
		$this->bulan->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['bulan'] = &$this->bulan;

		// pegawai
		$this->pegawai = new DbField('gaji_karyawan_smp', 'gaji_karyawan_smp', 'x_pegawai', 'pegawai', '`pegawai`', '`pegawai`', 200, 50, -1, FALSE, '`pegawai`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->pegawai->Sortable = TRUE; // Allow sort
		$this->pegawai->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->pegawai->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->pegawai->Lookup = new Lookup('pegawai', 'pegawai', FALSE, 'nip', ["nama","","",""], [], [], [], [], ["jabatan","jenjang_id"], ["x_jabatan_id","x_jenjang_id"], '', '');
		$this->fields['pegawai'] = &$this->pegawai;

		// jenjang_id
		$this->jenjang_id = new DbField('gaji_karyawan_smp', 'gaji_karyawan_smp', 'x_jenjang_id', 'jenjang_id', '`jenjang_id`', '`jenjang_id`', 3, 10, -1, FALSE, '`jenjang_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->jenjang_id->Sortable = TRUE; // Allow sort
		$this->jenjang_id->Lookup = new Lookup('jenjang_id', 'tpendidikan', FALSE, 'nourut', ["name","","",""], [], [], [], [], [], [], '', '');
		$this->jenjang_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['jenjang_id'] = &$this->jenjang_id;

		// jabatan_id
		$this->jabatan_id = new DbField('gaji_karyawan_smp', 'gaji_karyawan_smp', 'x_jabatan_id', 'jabatan_id', '`jabatan_id`', '`jabatan_id`', 3, 10, -1, FALSE, '`jabatan_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->jabatan_id->Sortable = TRUE; // Allow sort
		$this->jabatan_id->Lookup = new Lookup('jabatan_id', 'jabatan', FALSE, 'id', ["nama_jabatan","","",""], [], [], [], [], [], [], '', '');
		$this->jabatan_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['jabatan_id'] = &$this->jabatan_id;

		// kehadiran
		$this->kehadiran = new DbField('gaji_karyawan_smp', 'gaji_karyawan_smp', 'x_kehadiran', 'kehadiran', '`kehadiran`', '`kehadiran`', 3, 10, -1, FALSE, '`kehadiran`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->kehadiran->Sortable = TRUE; // Allow sort
		$this->kehadiran->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['kehadiran'] = &$this->kehadiran;

		// gapok
		$this->gapok = new DbField('gaji_karyawan_smp', 'gaji_karyawan_smp', 'x_gapok', 'gapok', '`gapok`', '`gapok`', 20, 19, -1, FALSE, '`gapok`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->gapok->Sortable = TRUE; // Allow sort
		$this->gapok->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['gapok'] = &$this->gapok;

		// value_kehadiran
		$this->value_kehadiran = new DbField('gaji_karyawan_smp', 'gaji_karyawan_smp', 'x_value_kehadiran', 'value_kehadiran', '`value_kehadiran`', '`value_kehadiran`', 20, 20, -1, FALSE, '`value_kehadiran`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->value_kehadiran->Sortable = TRUE; // Allow sort
		$this->value_kehadiran->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['value_kehadiran'] = &$this->value_kehadiran;

		// value_reward
		$this->value_reward = new DbField('gaji_karyawan_smp', 'gaji_karyawan_smp', 'x_value_reward', 'value_reward', '`value_reward`', '`value_reward`', 20, 19, -1, FALSE, '`value_reward`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->value_reward->Sortable = TRUE; // Allow sort
		$this->value_reward->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['value_reward'] = &$this->value_reward;

		// value_inval
		$this->value_inval = new DbField('gaji_karyawan_smp', 'gaji_karyawan_smp', 'x_value_inval', 'value_inval', '`value_inval`', '`value_inval`', 20, 19, -1, FALSE, '`value_inval`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->value_inval->Sortable = TRUE; // Allow sort
		$this->value_inval->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['value_inval'] = &$this->value_inval;

		// sub_total
		$this->sub_total = new DbField('gaji_karyawan_smp', 'gaji_karyawan_smp', 'x_sub_total', 'sub_total', '`sub_total`', '`sub_total`', 20, 19, -1, FALSE, '`sub_total`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sub_total->Sortable = TRUE; // Allow sort
		$this->sub_total->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sub_total'] = &$this->sub_total;

		// potongan
		$this->potongan = new DbField('gaji_karyawan_smp', 'gaji_karyawan_smp', 'x_potongan', 'potongan', '`potongan`', '`potongan`', 20, 19, -1, FALSE, '`potongan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->potongan->Sortable = TRUE; // Allow sort
		$this->potongan->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['potongan'] = &$this->potongan;

		// penyesuaian
		$this->penyesuaian = new DbField('gaji_karyawan_smp', 'gaji_karyawan_smp', 'x_penyesuaian', 'penyesuaian', '`penyesuaian`', '`penyesuaian`', 20, 19, -1, FALSE, '`penyesuaian`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->penyesuaian->Sortable = TRUE; // Allow sort
		$this->penyesuaian->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['penyesuaian'] = &$this->penyesuaian;

		// potongan_bendahara
		$this->potongan_bendahara = new DbField('gaji_karyawan_smp', 'gaji_karyawan_smp', 'x_potongan_bendahara', 'potongan_bendahara', '`potongan_bendahara`', '`potongan_bendahara`', 20, 100, -1, FALSE, '`potongan_bendahara`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->potongan_bendahara->Sortable = TRUE; // Allow sort
		$this->potongan_bendahara->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['potongan_bendahara'] = &$this->potongan_bendahara;

		// total
		$this->total = new DbField('gaji_karyawan_smp', 'gaji_karyawan_smp', 'x_total', 'total', '`total`', '`total`', 20, 19, -1, FALSE, '`total`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->total->Sortable = TRUE; // Allow sort
		$this->total->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['total'] = &$this->total;

		// pid
		$this->pid = new DbField('gaji_karyawan_smp', 'gaji_karyawan_smp', 'x_pid', 'pid', '`pid`', '`pid`', 3, 11, -1, FALSE, '`pid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pid->IsForeignKey = TRUE; // Foreign key field
		$this->pid->Sortable = TRUE; // Allow sort
		$this->pid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['pid'] = &$this->pid;

		// voucher
		$this->voucher = new DbField('gaji_karyawan_smp', 'gaji_karyawan_smp', 'x_voucher', 'voucher', '`voucher`', '`voucher`', 3, 11, -1, FALSE, '`voucher`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->voucher->Sortable = TRUE; // Allow sort
		$this->voucher->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['voucher'] = &$this->voucher;

		// status
		$this->status = new DbField('gaji_karyawan_smp', 'gaji_karyawan_smp', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;
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
		if ($this->getCurrentMasterTable() == "m_karyawan_smp") {
			if ($this->pid->getSessionValue() != "")
				$masterFilter .= "`id`=" . QuotedValue($this->pid->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->tahun->getSessionValue() != "")
				$masterFilter .= " AND `tahun`=" . QuotedValue($this->tahun->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->bulan->getSessionValue() != "")
				$masterFilter .= " AND `bulan`=" . QuotedValue($this->bulan->getSessionValue(), DATATYPE_NUMBER, "DB");
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
		if ($this->getCurrentMasterTable() == "m_karyawan_smp") {
			if ($this->pid->getSessionValue() != "")
				$detailFilter .= "`pid`=" . QuotedValue($this->pid->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->tahun->getSessionValue() != "")
				$detailFilter .= " AND `tahun`=" . QuotedValue($this->tahun->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->bulan->getSessionValue() != "")
				$detailFilter .= " AND `bulan`=" . QuotedValue($this->bulan->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_m_karyawan_smp()
	{
		return "`id`=@id@ AND `tahun`=@tahun@ AND `bulan`=@bulan@";
	}

	// Detail filter
	public function sqlDetailFilter_m_karyawan_smp()
	{
		return "`pid`=@pid@ AND `tahun`=@tahun@ AND `bulan`=@bulan@";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`gaji_karyawan_smp`";
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
		$this->tahun->DbValue = $row['tahun'];
		$this->bulan->DbValue = $row['bulan'];
		$this->pegawai->DbValue = $row['pegawai'];
		$this->jenjang_id->DbValue = $row['jenjang_id'];
		$this->jabatan_id->DbValue = $row['jabatan_id'];
		$this->kehadiran->DbValue = $row['kehadiran'];
		$this->gapok->DbValue = $row['gapok'];
		$this->value_kehadiran->DbValue = $row['value_kehadiran'];
		$this->value_reward->DbValue = $row['value_reward'];
		$this->value_inval->DbValue = $row['value_inval'];
		$this->sub_total->DbValue = $row['sub_total'];
		$this->potongan->DbValue = $row['potongan'];
		$this->penyesuaian->DbValue = $row['penyesuaian'];
		$this->potongan_bendahara->DbValue = $row['potongan_bendahara'];
		$this->total->DbValue = $row['total'];
		$this->pid->DbValue = $row['pid'];
		$this->voucher->DbValue = $row['voucher'];
		$this->status->DbValue = $row['status'];
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
			return "gaji_karyawan_smplist.php";
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
		if ($pageName == "gaji_karyawan_smpview.php")
			return $Language->phrase("View");
		elseif ($pageName == "gaji_karyawan_smpedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "gaji_karyawan_smpadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "gaji_karyawan_smplist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("gaji_karyawan_smpview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("gaji_karyawan_smpview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "gaji_karyawan_smpadd.php?" . $this->getUrlParm($parm);
		else
			$url = "gaji_karyawan_smpadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("gaji_karyawan_smpedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("gaji_karyawan_smpadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("gaji_karyawan_smpdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "m_karyawan_smp" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_id=" . urlencode($this->pid->CurrentValue);
			$url .= "&fk_tahun=" . urlencode($this->tahun->CurrentValue);
			$url .= "&fk_bulan=" . urlencode($this->bulan->CurrentValue);
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
		$this->tahun->setDbValue($rs->fields('tahun'));
		$this->bulan->setDbValue($rs->fields('bulan'));
		$this->pegawai->setDbValue($rs->fields('pegawai'));
		$this->jenjang_id->setDbValue($rs->fields('jenjang_id'));
		$this->jabatan_id->setDbValue($rs->fields('jabatan_id'));
		$this->kehadiran->setDbValue($rs->fields('kehadiran'));
		$this->gapok->setDbValue($rs->fields('gapok'));
		$this->value_kehadiran->setDbValue($rs->fields('value_kehadiran'));
		$this->value_reward->setDbValue($rs->fields('value_reward'));
		$this->value_inval->setDbValue($rs->fields('value_inval'));
		$this->sub_total->setDbValue($rs->fields('sub_total'));
		$this->potongan->setDbValue($rs->fields('potongan'));
		$this->penyesuaian->setDbValue($rs->fields('penyesuaian'));
		$this->potongan_bendahara->setDbValue($rs->fields('potongan_bendahara'));
		$this->total->setDbValue($rs->fields('total'));
		$this->pid->setDbValue($rs->fields('pid'));
		$this->voucher->setDbValue($rs->fields('voucher'));
		$this->status->setDbValue($rs->fields('status'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// tahun
		// bulan
		// pegawai
		// jenjang_id
		// jabatan_id
		// kehadiran
		// gapok
		// value_kehadiran
		// value_reward
		// value_inval
		// sub_total
		// potongan
		// penyesuaian
		// potongan_bendahara
		// total
		// pid
		// voucher
		// status
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

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

		// kehadiran
		$this->kehadiran->ViewValue = $this->kehadiran->CurrentValue;
		$this->kehadiran->ViewValue = FormatNumber($this->kehadiran->ViewValue, 0, -2, -2, -2);
		$this->kehadiran->ViewCustomAttributes = "";

		// gapok
		$this->gapok->ViewValue = $this->gapok->CurrentValue;
		$this->gapok->ViewValue = FormatNumber($this->gapok->ViewValue, 0, -2, -2, -2);
		$this->gapok->ViewCustomAttributes = "";

		// value_kehadiran
		$this->value_kehadiran->ViewValue = $this->value_kehadiran->CurrentValue;
		$this->value_kehadiran->ViewValue = FormatNumber($this->value_kehadiran->ViewValue, 0, -2, -2, -2);
		$this->value_kehadiran->ViewCustomAttributes = "";

		// value_reward
		$this->value_reward->ViewValue = $this->value_reward->CurrentValue;
		$this->value_reward->ViewValue = FormatNumber($this->value_reward->ViewValue, 0, -2, -2, -2);
		$this->value_reward->ViewCustomAttributes = "";

		// value_inval
		$this->value_inval->ViewValue = $this->value_inval->CurrentValue;
		$this->value_inval->ViewValue = FormatNumber($this->value_inval->ViewValue, 0, -2, -2, -2);
		$this->value_inval->ViewCustomAttributes = "";

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

		// potongan_bendahara
		$this->potongan_bendahara->ViewValue = $this->potongan_bendahara->CurrentValue;
		$this->potongan_bendahara->ViewValue = FormatNumber($this->potongan_bendahara->ViewValue, 0, -2, -2, -2);
		$this->potongan_bendahara->ViewCustomAttributes = "";

		// total
		$this->total->ViewValue = $this->total->CurrentValue;
		$this->total->ViewValue = FormatNumber($this->total->ViewValue, 0, -2, -2, -2);
		$this->total->ViewCustomAttributes = "";

		// pid
		$this->pid->ViewValue = $this->pid->CurrentValue;
		$this->pid->ViewValue = FormatNumber($this->pid->ViewValue, 0, -2, -2, -2);
		$this->pid->ViewCustomAttributes = "";

		// voucher
		$this->voucher->ViewValue = $this->voucher->CurrentValue;
		$this->voucher->ViewValue = FormatNumber($this->voucher->ViewValue, 0, -2, -2, -2);
		$this->voucher->ViewCustomAttributes = "";

		// status
		$this->status->ViewValue = $this->status->CurrentValue;
		$this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
		$this->status->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

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

		// kehadiran
		$this->kehadiran->LinkCustomAttributes = "";
		$this->kehadiran->HrefValue = "";
		$this->kehadiran->TooltipValue = "";

		// gapok
		$this->gapok->LinkCustomAttributes = "";
		$this->gapok->HrefValue = "";
		$this->gapok->TooltipValue = "";

		// value_kehadiran
		$this->value_kehadiran->LinkCustomAttributes = "";
		$this->value_kehadiran->HrefValue = "";
		$this->value_kehadiran->TooltipValue = "";

		// value_reward
		$this->value_reward->LinkCustomAttributes = "";
		$this->value_reward->HrefValue = "";
		$this->value_reward->TooltipValue = "";

		// value_inval
		$this->value_inval->LinkCustomAttributes = "";
		$this->value_inval->HrefValue = "";
		$this->value_inval->TooltipValue = "";

		// sub_total
		$this->sub_total->LinkCustomAttributes = "";
		$this->sub_total->HrefValue = "";
		$this->sub_total->TooltipValue = "";

		// potongan
		$this->potongan->LinkCustomAttributes = "";
		$this->potongan->HrefValue = "";
		$this->potongan->TooltipValue = "";

		// penyesuaian
		$this->penyesuaian->LinkCustomAttributes = "";
		$this->penyesuaian->HrefValue = "";
		$this->penyesuaian->TooltipValue = "";

		// potongan_bendahara
		$this->potongan_bendahara->LinkCustomAttributes = "";
		$this->potongan_bendahara->HrefValue = "";
		$this->potongan_bendahara->TooltipValue = "";

		// total
		$this->total->LinkCustomAttributes = "";
		$this->total->HrefValue = "";
		$this->total->TooltipValue = "";

		// pid
		$this->pid->LinkCustomAttributes = "";
		$this->pid->HrefValue = "";
		$this->pid->TooltipValue = "";

		// voucher
		$this->voucher->LinkCustomAttributes = "";
		$this->voucher->HrefValue = "";
		$this->voucher->TooltipValue = "";

		// status
		$this->status->LinkCustomAttributes = "";
		$this->status->HrefValue = "";
		$this->status->TooltipValue = "";

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

		// tahun
		$this->tahun->EditAttrs["class"] = "form-control";
		$this->tahun->EditCustomAttributes = "";
		if ($this->tahun->getSessionValue() != "") {
			$this->tahun->CurrentValue = $this->tahun->getSessionValue();
			$this->tahun->ViewValue = $this->tahun->CurrentValue;
			$this->tahun->ViewCustomAttributes = "";
		} else {
			$this->tahun->EditValue = $this->tahun->CurrentValue;
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
			$this->bulan->EditValue = $this->bulan->CurrentValue;
			$this->bulan->PlaceHolder = RemoveHtml($this->bulan->caption());
		}

		// pegawai
		$this->pegawai->EditAttrs["class"] = "form-control";
		$this->pegawai->EditCustomAttributes = "";

		// jenjang_id
		$this->jenjang_id->EditAttrs["class"] = "form-control";
		$this->jenjang_id->EditCustomAttributes = "";
		$this->jenjang_id->EditValue = $this->jenjang_id->CurrentValue;
		$this->jenjang_id->PlaceHolder = RemoveHtml($this->jenjang_id->caption());

		// jabatan_id
		$this->jabatan_id->EditAttrs["class"] = "form-control";
		$this->jabatan_id->EditCustomAttributes = "";
		$this->jabatan_id->EditValue = $this->jabatan_id->CurrentValue;
		$this->jabatan_id->PlaceHolder = RemoveHtml($this->jabatan_id->caption());

		// kehadiran
		$this->kehadiran->EditAttrs["class"] = "form-control";
		$this->kehadiran->EditCustomAttributes = "";
		$this->kehadiran->EditValue = $this->kehadiran->CurrentValue;
		$this->kehadiran->PlaceHolder = RemoveHtml($this->kehadiran->caption());

		// gapok
		$this->gapok->EditAttrs["class"] = "form-control";
		$this->gapok->EditCustomAttributes = "";
		$this->gapok->EditValue = $this->gapok->CurrentValue;
		$this->gapok->PlaceHolder = RemoveHtml($this->gapok->caption());

		// value_kehadiran
		$this->value_kehadiran->EditAttrs["class"] = "form-control";
		$this->value_kehadiran->EditCustomAttributes = "";
		$this->value_kehadiran->EditValue = $this->value_kehadiran->CurrentValue;
		$this->value_kehadiran->PlaceHolder = RemoveHtml($this->value_kehadiran->caption());

		// value_reward
		$this->value_reward->EditAttrs["class"] = "form-control";
		$this->value_reward->EditCustomAttributes = "";
		$this->value_reward->EditValue = $this->value_reward->CurrentValue;
		$this->value_reward->PlaceHolder = RemoveHtml($this->value_reward->caption());

		// value_inval
		$this->value_inval->EditAttrs["class"] = "form-control";
		$this->value_inval->EditCustomAttributes = "";
		$this->value_inval->EditValue = $this->value_inval->CurrentValue;
		$this->value_inval->PlaceHolder = RemoveHtml($this->value_inval->caption());

		// sub_total
		$this->sub_total->EditAttrs["class"] = "form-control";
		$this->sub_total->EditCustomAttributes = "";
		$this->sub_total->EditValue = $this->sub_total->CurrentValue;
		$this->sub_total->PlaceHolder = RemoveHtml($this->sub_total->caption());

		// potongan
		$this->potongan->EditAttrs["class"] = "form-control";
		$this->potongan->EditCustomAttributes = "";
		$this->potongan->EditValue = $this->potongan->CurrentValue;
		$this->potongan->PlaceHolder = RemoveHtml($this->potongan->caption());

		// penyesuaian
		$this->penyesuaian->EditAttrs["class"] = "form-control";
		$this->penyesuaian->EditCustomAttributes = "";
		$this->penyesuaian->EditValue = $this->penyesuaian->CurrentValue;
		$this->penyesuaian->PlaceHolder = RemoveHtml($this->penyesuaian->caption());

		// potongan_bendahara
		$this->potongan_bendahara->EditAttrs["class"] = "form-control";
		$this->potongan_bendahara->EditCustomAttributes = "";
		$this->potongan_bendahara->EditValue = $this->potongan_bendahara->CurrentValue;
		$this->potongan_bendahara->PlaceHolder = RemoveHtml($this->potongan_bendahara->caption());

		// total
		$this->total->EditAttrs["class"] = "form-control";
		$this->total->EditCustomAttributes = "";
		$this->total->EditValue = $this->total->CurrentValue;
		$this->total->PlaceHolder = RemoveHtml($this->total->caption());

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

		// voucher
		$this->voucher->EditAttrs["class"] = "form-control";
		$this->voucher->EditCustomAttributes = "";
		$this->voucher->EditValue = $this->voucher->CurrentValue;
		$this->voucher->PlaceHolder = RemoveHtml($this->voucher->caption());

		// status
		$this->status->EditAttrs["class"] = "form-control";
		$this->status->EditCustomAttributes = "";
		$this->status->EditValue = $this->status->CurrentValue;
		$this->status->PlaceHolder = RemoveHtml($this->status->caption());

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
					$doc->exportCaption($this->tahun);
					$doc->exportCaption($this->bulan);
					$doc->exportCaption($this->pegawai);
					$doc->exportCaption($this->jenjang_id);
					$doc->exportCaption($this->jabatan_id);
					$doc->exportCaption($this->kehadiran);
					$doc->exportCaption($this->gapok);
					$doc->exportCaption($this->value_kehadiran);
					$doc->exportCaption($this->value_reward);
					$doc->exportCaption($this->value_inval);
					$doc->exportCaption($this->sub_total);
					$doc->exportCaption($this->potongan);
					$doc->exportCaption($this->penyesuaian);
					$doc->exportCaption($this->potongan_bendahara);
					$doc->exportCaption($this->total);
					$doc->exportCaption($this->pid);
					$doc->exportCaption($this->voucher);
					$doc->exportCaption($this->status);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->tahun);
					$doc->exportCaption($this->bulan);
					$doc->exportCaption($this->pegawai);
					$doc->exportCaption($this->jenjang_id);
					$doc->exportCaption($this->jabatan_id);
					$doc->exportCaption($this->kehadiran);
					$doc->exportCaption($this->gapok);
					$doc->exportCaption($this->value_kehadiran);
					$doc->exportCaption($this->value_reward);
					$doc->exportCaption($this->value_inval);
					$doc->exportCaption($this->sub_total);
					$doc->exportCaption($this->potongan);
					$doc->exportCaption($this->penyesuaian);
					$doc->exportCaption($this->potongan_bendahara);
					$doc->exportCaption($this->total);
					$doc->exportCaption($this->pid);
					$doc->exportCaption($this->voucher);
					$doc->exportCaption($this->status);
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
						$doc->exportField($this->tahun);
						$doc->exportField($this->bulan);
						$doc->exportField($this->pegawai);
						$doc->exportField($this->jenjang_id);
						$doc->exportField($this->jabatan_id);
						$doc->exportField($this->kehadiran);
						$doc->exportField($this->gapok);
						$doc->exportField($this->value_kehadiran);
						$doc->exportField($this->value_reward);
						$doc->exportField($this->value_inval);
						$doc->exportField($this->sub_total);
						$doc->exportField($this->potongan);
						$doc->exportField($this->penyesuaian);
						$doc->exportField($this->potongan_bendahara);
						$doc->exportField($this->total);
						$doc->exportField($this->pid);
						$doc->exportField($this->voucher);
						$doc->exportField($this->status);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->tahun);
						$doc->exportField($this->bulan);
						$doc->exportField($this->pegawai);
						$doc->exportField($this->jenjang_id);
						$doc->exportField($this->jabatan_id);
						$doc->exportField($this->kehadiran);
						$doc->exportField($this->gapok);
						$doc->exportField($this->value_kehadiran);
						$doc->exportField($this->value_reward);
						$doc->exportField($this->value_inval);
						$doc->exportField($this->sub_total);
						$doc->exportField($this->potongan);
						$doc->exportField($this->penyesuaian);
						$doc->exportField($this->potongan_bendahara);
						$doc->exportField($this->total);
						$doc->exportField($this->pid);
						$doc->exportField($this->voucher);
						$doc->exportField($this->status);
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
			$nip = CurrentUserInfo("jenjang_id");
			if($nip != '' OR $nip != FALSE) {
			AddFilter($filter, "jenjang_id = $nip");
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

		$tambahan_tj = $rsnew["tambahan"];
											$jenjang = $rsnew["jenjang_id"];
											$jabatan = $rsnew["jabatan_id"];

											//POTONGAN
											$querypotongan = ExecuteRow("SELECT * FROM potongan_sma WHERE nama='$nip' ORDER BY datetime DESC");
											$kehadiran= ExecuteRow("Select * from m_kehadiran where jenjang='$jenjang' AND jabatan='$jabatan'");	

											//GAJI POKOK
											$query2 = ExecuteRow("SELECT * FROM gaji_pokok_kayawan where jenjang_id='$jenjang' AND jabatan_id='$jabatan'");		

											// Gaji Pokok	
											$gaji_pokok=ExecuteRow("SELECT * FROM gaji_pokok WHERE jenjang_id='$jenjang' AND lama_kerja='$lama_kerja'");
											$rsnew["gapok"] = $query2["value"];													
											$rsnew["tunjangan_periode"] = $tunjangan_berkala["value"];
											$rsnew["value_kehadiran"] = $kehadiran["value"];
											$rsnew["sub_total"] = $rsnew["gapok"] + ($rsnew["kehadiran"] * $rsnew["value_kehadiran"])+ $rsnew["value_inval"]+$rsnew["value_reward"];
											$rsnew["potongan"] = $querypotongan["totalpotongan"];
											$rsnew["total"] = $rsnew["sub_total"] - $rsnew["potongan"] + $rsnew["penyesuaian"];
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
				$this->total->Visible = FALSE;
				$this->gapok->Visible = FALSE;
				$this->sub_total->Visible = FALSE;
				$this->potongan->Visible = FALSE;
				$this->jabatan_id->ReadOnly = true;
				$this->jenjang_id->ReadOnly = true;
				$this->value_kehadiran->Visible = false;
					$grid_count = $this->GridAddRowCount;
	if(isset($this->RowIndex)) {
		$grid_num = $this->RowIndex;

		//only when we are dawing actual rows
		if(($grid_count >= $grid_num) && is_int($grid_num) && ($grid_num >= 1)){
			$offseter = $grid_num - 1;
			$id_user = ExecuteRow("SELECT * FROM pegawai where jenjang_id ='3' AND `type`= '3' limit 1 OFFSET $offseter");

					//$this->pegawai->CurrentValue ='';
					$this->pegawai->CurrentValue = $id_user['nip'];
					$this->jabatan_id->CurrentValue = $id_user['jabatan'];
					$this->jenjang_id->CurrentValue = $id_user['jenjang_id'];
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