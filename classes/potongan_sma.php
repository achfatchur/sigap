<?php namespace PHPMaker2020\sigap; ?>
<?php

/**
 * Table class for potongan_sma
 */
class potongan_sma extends DbTable
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
	public $datetime;
	public $u_by;
	public $month;
	public $tahun;
	public $bulan;
	public $nama;
	public $jenjang_id;
	public $jabatan_id;
	public $sertif;
	public $terlambat;
	public $value_terlambat;
	public $izin;
	public $value_izin;
	public $sakit;
	public $value_sakit;
	public $tidakhadir;
	public $value_tidakhadir;
	public $pulcep;
	public $value_pulcep;
	public $tidakhadirjam;
	public $tidakhadirjamvalue;
	public $sakitperjam;
	public $sakitperjamvalue;
	public $izinperjam;
	public $izinperjamvalue;
	public $totalpotongan;
	public $pid;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'potongan_sma';
		$this->TableName = 'potongan_sma';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`potongan_sma`";
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
		$this->id = new DbField('potongan_sma', 'potongan_sma', 'x_id', 'id', '`id`', '`id`', 3, 10, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// datetime
		$this->datetime = new DbField('potongan_sma', 'potongan_sma', 'x_datetime', 'datetime', '`datetime`', CastDateFieldForLike("`datetime`", 0, "DB"), 135, 19, 0, FALSE, '`datetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->datetime->Sortable = TRUE; // Allow sort
		$this->datetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['datetime'] = &$this->datetime;

		// u_by
		$this->u_by = new DbField('potongan_sma', 'potongan_sma', 'x_u_by', 'u_by', '`u_by`', '`u_by`', 3, 10, -1, FALSE, '`u_by`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->u_by->Sortable = FALSE; // Allow sort
		$this->u_by->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['u_by'] = &$this->u_by;

		// month
		$this->month = new DbField('potongan_sma', 'potongan_sma', 'x_month', 'month', '`month`', CastDateFieldForLike("`month`", 0, "DB"), 133, 10, 0, FALSE, '`month`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->month->Sortable = FALSE; // Allow sort
		$this->month->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['month'] = &$this->month;

		// tahun
		$this->tahun = new DbField('potongan_sma', 'potongan_sma', 'x_tahun', 'tahun', '`tahun`', '`tahun`', 3, 11, -1, FALSE, '`tahun`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tahun->IsForeignKey = TRUE; // Foreign key field
		$this->tahun->Sortable = TRUE; // Allow sort
		$this->tahun->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['tahun'] = &$this->tahun;

		// bulan
		$this->bulan = new DbField('potongan_sma', 'potongan_sma', 'x_bulan', 'bulan', '`bulan`', '`bulan`', 3, 11, -1, FALSE, '`bulan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->bulan->IsForeignKey = TRUE; // Foreign key field
		$this->bulan->Sortable = TRUE; // Allow sort
		$this->bulan->Lookup = new Lookup('bulan', 'bulan', FALSE, 'id', ["bulan","","",""], [], [], [], [], [], [], '', '');
		$this->bulan->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['bulan'] = &$this->bulan;

		// nama
		$this->nama = new DbField('potongan_sma', 'potongan_sma', 'x_nama', 'nama', '`nama`', '`nama`', 200, 50, -1, FALSE, '`nama`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->nama->Sortable = TRUE; // Allow sort
		$this->nama->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->nama->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->nama->Lookup = new Lookup('nama', 'pegawai', FALSE, 'nip', ["nama","","",""], [], [], [], [], ["jenjang_id","jabatan","sertif"], ["x_jenjang_id","x_jabatan_id","x_sertif"], '', '');
		$this->fields['nama'] = &$this->nama;

		// jenjang_id
		$this->jenjang_id = new DbField('potongan_sma', 'potongan_sma', 'x_jenjang_id', 'jenjang_id', '`jenjang_id`', '`jenjang_id`', 3, 10, -1, FALSE, '`jenjang_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->jenjang_id->Sortable = TRUE; // Allow sort
		$this->jenjang_id->Lookup = new Lookup('jenjang_id', 'tpendidikan', FALSE, 'nourut', ["name","","",""], [], [], [], [], [], [], '', '');
		$this->jenjang_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['jenjang_id'] = &$this->jenjang_id;

		// jabatan_id
		$this->jabatan_id = new DbField('potongan_sma', 'potongan_sma', 'x_jabatan_id', 'jabatan_id', '`jabatan_id`', '`jabatan_id`', 3, 10, -1, FALSE, '`jabatan_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->jabatan_id->Sortable = TRUE; // Allow sort
		$this->jabatan_id->Lookup = new Lookup('jabatan_id', 'jabatan', FALSE, 'id', ["nama_jabatan","","",""], [], [], [], [], [], [], '', '');
		$this->jabatan_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['jabatan_id'] = &$this->jabatan_id;

		// sertif
		$this->sertif = new DbField('potongan_sma', 'potongan_sma', 'x_sertif', 'sertif', '`sertif`', '`sertif`', 3, 11, -1, FALSE, '`sertif`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sertif->Sortable = TRUE; // Allow sort
		$this->sertif->Lookup = new Lookup('sertif', 'sertif', FALSE, 'id', ["name","","",""], [], [], [], [], [], [], '', '');
		$this->sertif->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sertif'] = &$this->sertif;

		// terlambat
		$this->terlambat = new DbField('potongan_sma', 'potongan_sma', 'x_terlambat', 'terlambat', '`terlambat`', '`terlambat`', 3, 10, -1, FALSE, '`terlambat`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->terlambat->Sortable = TRUE; // Allow sort
		$this->terlambat->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['terlambat'] = &$this->terlambat;

		// value_terlambat
		$this->value_terlambat = new DbField('potongan_sma', 'potongan_sma', 'x_value_terlambat', 'value_terlambat', '`value_terlambat`', '`value_terlambat`', 20, 19, -1, FALSE, '`value_terlambat`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->value_terlambat->Sortable = TRUE; // Allow sort
		$this->value_terlambat->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['value_terlambat'] = &$this->value_terlambat;

		// izin
		$this->izin = new DbField('potongan_sma', 'potongan_sma', 'x_izin', 'izin', '`izin`', '`izin`', 3, 10, -1, FALSE, '`izin`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->izin->Sortable = TRUE; // Allow sort
		$this->izin->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['izin'] = &$this->izin;

		// value_izin
		$this->value_izin = new DbField('potongan_sma', 'potongan_sma', 'x_value_izin', 'value_izin', '`value_izin`', '`value_izin`', 20, 19, -1, FALSE, '`value_izin`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->value_izin->Sortable = TRUE; // Allow sort
		$this->value_izin->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['value_izin'] = &$this->value_izin;

		// sakit
		$this->sakit = new DbField('potongan_sma', 'potongan_sma', 'x_sakit', 'sakit', '`sakit`', '`sakit`', 3, 10, -1, FALSE, '`sakit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sakit->Sortable = TRUE; // Allow sort
		$this->sakit->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sakit'] = &$this->sakit;

		// value_sakit
		$this->value_sakit = new DbField('potongan_sma', 'potongan_sma', 'x_value_sakit', 'value_sakit', '`value_sakit`', '`value_sakit`', 20, 19, -1, FALSE, '`value_sakit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->value_sakit->Sortable = TRUE; // Allow sort
		$this->value_sakit->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['value_sakit'] = &$this->value_sakit;

		// tidakhadir
		$this->tidakhadir = new DbField('potongan_sma', 'potongan_sma', 'x_tidakhadir', 'tidakhadir', '`tidakhadir`', '`tidakhadir`', 3, 10, -1, FALSE, '`tidakhadir`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tidakhadir->Sortable = TRUE; // Allow sort
		$this->tidakhadir->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['tidakhadir'] = &$this->tidakhadir;

		// value_tidakhadir
		$this->value_tidakhadir = new DbField('potongan_sma', 'potongan_sma', 'x_value_tidakhadir', 'value_tidakhadir', '`value_tidakhadir`', '`value_tidakhadir`', 20, 19, -1, FALSE, '`value_tidakhadir`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->value_tidakhadir->Sortable = TRUE; // Allow sort
		$this->value_tidakhadir->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['value_tidakhadir'] = &$this->value_tidakhadir;

		// pulcep
		$this->pulcep = new DbField('potongan_sma', 'potongan_sma', 'x_pulcep', 'pulcep', '`pulcep`', '`pulcep`', 3, 10, -1, FALSE, '`pulcep`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pulcep->Sortable = TRUE; // Allow sort
		$this->pulcep->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['pulcep'] = &$this->pulcep;

		// value_pulcep
		$this->value_pulcep = new DbField('potongan_sma', 'potongan_sma', 'x_value_pulcep', 'value_pulcep', '`value_pulcep`', '`value_pulcep`', 20, 19, -1, FALSE, '`value_pulcep`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->value_pulcep->Sortable = TRUE; // Allow sort
		$this->value_pulcep->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['value_pulcep'] = &$this->value_pulcep;

		// tidakhadirjam
		$this->tidakhadirjam = new DbField('potongan_sma', 'potongan_sma', 'x_tidakhadirjam', 'tidakhadirjam', '`tidakhadirjam`', '`tidakhadirjam`', 3, 10, -1, FALSE, '`tidakhadirjam`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tidakhadirjam->Sortable = TRUE; // Allow sort
		$this->tidakhadirjam->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['tidakhadirjam'] = &$this->tidakhadirjam;

		// tidakhadirjamvalue
		$this->tidakhadirjamvalue = new DbField('potongan_sma', 'potongan_sma', 'x_tidakhadirjamvalue', 'tidakhadirjamvalue', '`tidakhadirjamvalue`', '`tidakhadirjamvalue`', 20, 19, -1, FALSE, '`tidakhadirjamvalue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tidakhadirjamvalue->Sortable = TRUE; // Allow sort
		$this->tidakhadirjamvalue->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['tidakhadirjamvalue'] = &$this->tidakhadirjamvalue;

		// sakitperjam
		$this->sakitperjam = new DbField('potongan_sma', 'potongan_sma', 'x_sakitperjam', 'sakitperjam', '`sakitperjam`', '`sakitperjam`', 3, 10, -1, FALSE, '`sakitperjam`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sakitperjam->Sortable = TRUE; // Allow sort
		$this->sakitperjam->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sakitperjam'] = &$this->sakitperjam;

		// sakitperjamvalue
		$this->sakitperjamvalue = new DbField('potongan_sma', 'potongan_sma', 'x_sakitperjamvalue', 'sakitperjamvalue', '`sakitperjamvalue`', '`sakitperjamvalue`', 20, 19, -1, FALSE, '`sakitperjamvalue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sakitperjamvalue->Sortable = TRUE; // Allow sort
		$this->sakitperjamvalue->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sakitperjamvalue'] = &$this->sakitperjamvalue;

		// izinperjam
		$this->izinperjam = new DbField('potongan_sma', 'potongan_sma', 'x_izinperjam', 'izinperjam', '`izinperjam`', '`izinperjam`', 3, 10, -1, FALSE, '`izinperjam`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->izinperjam->Sortable = TRUE; // Allow sort
		$this->izinperjam->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['izinperjam'] = &$this->izinperjam;

		// izinperjamvalue
		$this->izinperjamvalue = new DbField('potongan_sma', 'potongan_sma', 'x_izinperjamvalue', 'izinperjamvalue', '`izinperjamvalue`', '`izinperjamvalue`', 20, 19, -1, FALSE, '`izinperjamvalue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->izinperjamvalue->Sortable = TRUE; // Allow sort
		$this->izinperjamvalue->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['izinperjamvalue'] = &$this->izinperjamvalue;

		// totalpotongan
		$this->totalpotongan = new DbField('potongan_sma', 'potongan_sma', 'x_totalpotongan', 'totalpotongan', '`totalpotongan`', '`totalpotongan`', 20, 19, -1, FALSE, '`totalpotongan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->totalpotongan->Sortable = TRUE; // Allow sort
		$this->totalpotongan->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['totalpotongan'] = &$this->totalpotongan;

		// pid
		$this->pid = new DbField('potongan_sma', 'potongan_sma', 'x_pid', 'pid', '`pid`', '`pid`', 3, 11, -1, FALSE, '`pid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pid->IsForeignKey = TRUE; // Foreign key field
		$this->pid->Sortable = TRUE; // Allow sort
		$this->pid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['pid'] = &$this->pid;
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
		if ($this->getCurrentMasterTable() == "m_potongan_sma") {
			if ($this->pid->getSessionValue() != "")
				$masterFilter .= "`id`=" . QuotedValue($this->pid->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->bulan->getSessionValue() != "")
				$masterFilter .= " AND `bulan`=" . QuotedValue($this->bulan->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->tahun->getSessionValue() != "")
				$masterFilter .= " AND `tahun`=" . QuotedValue($this->tahun->getSessionValue(), DATATYPE_NUMBER, "DB");
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
		if ($this->getCurrentMasterTable() == "m_potongan_sma") {
			if ($this->pid->getSessionValue() != "")
				$detailFilter .= "`pid`=" . QuotedValue($this->pid->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->bulan->getSessionValue() != "")
				$detailFilter .= " AND `bulan`=" . QuotedValue($this->bulan->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->tahun->getSessionValue() != "")
				$detailFilter .= " AND `tahun`=" . QuotedValue($this->tahun->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_m_potongan_sma()
	{
		return "`id`=@id@ AND `bulan`=@bulan@ AND `tahun`=@tahun@";
	}

	// Detail filter
	public function sqlDetailFilter_m_potongan_sma()
	{
		return "`pid`=@pid@ AND `bulan`=@bulan@ AND `tahun`=@tahun@";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`potongan_sma`";
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
		$this->datetime->DbValue = $row['datetime'];
		$this->u_by->DbValue = $row['u_by'];
		$this->month->DbValue = $row['month'];
		$this->tahun->DbValue = $row['tahun'];
		$this->bulan->DbValue = $row['bulan'];
		$this->nama->DbValue = $row['nama'];
		$this->jenjang_id->DbValue = $row['jenjang_id'];
		$this->jabatan_id->DbValue = $row['jabatan_id'];
		$this->sertif->DbValue = $row['sertif'];
		$this->terlambat->DbValue = $row['terlambat'];
		$this->value_terlambat->DbValue = $row['value_terlambat'];
		$this->izin->DbValue = $row['izin'];
		$this->value_izin->DbValue = $row['value_izin'];
		$this->sakit->DbValue = $row['sakit'];
		$this->value_sakit->DbValue = $row['value_sakit'];
		$this->tidakhadir->DbValue = $row['tidakhadir'];
		$this->value_tidakhadir->DbValue = $row['value_tidakhadir'];
		$this->pulcep->DbValue = $row['pulcep'];
		$this->value_pulcep->DbValue = $row['value_pulcep'];
		$this->tidakhadirjam->DbValue = $row['tidakhadirjam'];
		$this->tidakhadirjamvalue->DbValue = $row['tidakhadirjamvalue'];
		$this->sakitperjam->DbValue = $row['sakitperjam'];
		$this->sakitperjamvalue->DbValue = $row['sakitperjamvalue'];
		$this->izinperjam->DbValue = $row['izinperjam'];
		$this->izinperjamvalue->DbValue = $row['izinperjamvalue'];
		$this->totalpotongan->DbValue = $row['totalpotongan'];
		$this->pid->DbValue = $row['pid'];
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
			return "potongan_smalist.php";
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
		if ($pageName == "potongan_smaview.php")
			return $Language->phrase("View");
		elseif ($pageName == "potongan_smaedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "potongan_smaadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "potongan_smalist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("potongan_smaview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("potongan_smaview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "potongan_smaadd.php?" . $this->getUrlParm($parm);
		else
			$url = "potongan_smaadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("potongan_smaedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("potongan_smaadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("potongan_smadelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "m_potongan_sma" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_id=" . urlencode($this->pid->CurrentValue);
			$url .= "&fk_bulan=" . urlencode($this->bulan->CurrentValue);
			$url .= "&fk_tahun=" . urlencode($this->tahun->CurrentValue);
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
		$this->datetime->setDbValue($rs->fields('datetime'));
		$this->u_by->setDbValue($rs->fields('u_by'));
		$this->month->setDbValue($rs->fields('month'));
		$this->tahun->setDbValue($rs->fields('tahun'));
		$this->bulan->setDbValue($rs->fields('bulan'));
		$this->nama->setDbValue($rs->fields('nama'));
		$this->jenjang_id->setDbValue($rs->fields('jenjang_id'));
		$this->jabatan_id->setDbValue($rs->fields('jabatan_id'));
		$this->sertif->setDbValue($rs->fields('sertif'));
		$this->terlambat->setDbValue($rs->fields('terlambat'));
		$this->value_terlambat->setDbValue($rs->fields('value_terlambat'));
		$this->izin->setDbValue($rs->fields('izin'));
		$this->value_izin->setDbValue($rs->fields('value_izin'));
		$this->sakit->setDbValue($rs->fields('sakit'));
		$this->value_sakit->setDbValue($rs->fields('value_sakit'));
		$this->tidakhadir->setDbValue($rs->fields('tidakhadir'));
		$this->value_tidakhadir->setDbValue($rs->fields('value_tidakhadir'));
		$this->pulcep->setDbValue($rs->fields('pulcep'));
		$this->value_pulcep->setDbValue($rs->fields('value_pulcep'));
		$this->tidakhadirjam->setDbValue($rs->fields('tidakhadirjam'));
		$this->tidakhadirjamvalue->setDbValue($rs->fields('tidakhadirjamvalue'));
		$this->sakitperjam->setDbValue($rs->fields('sakitperjam'));
		$this->sakitperjamvalue->setDbValue($rs->fields('sakitperjamvalue'));
		$this->izinperjam->setDbValue($rs->fields('izinperjam'));
		$this->izinperjamvalue->setDbValue($rs->fields('izinperjamvalue'));
		$this->totalpotongan->setDbValue($rs->fields('totalpotongan'));
		$this->pid->setDbValue($rs->fields('pid'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// datetime
		// u_by

		$this->u_by->CellCssStyle = "white-space: nowrap;";

		// month
		$this->month->CellCssStyle = "white-space: nowrap;";

		// tahun
		// bulan
		// nama
		// jenjang_id
		// jabatan_id
		// sertif
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
		// pid
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// datetime
		$this->datetime->ViewValue = $this->datetime->CurrentValue;
		$this->datetime->ViewValue = FormatDateTime($this->datetime->ViewValue, 0);
		$this->datetime->ViewCustomAttributes = "";

		// u_by
		$this->u_by->ViewValue = $this->u_by->CurrentValue;
		$this->u_by->ViewValue = FormatNumber($this->u_by->ViewValue, 0, -2, -2, -2);
		$this->u_by->ViewCustomAttributes = "";

		// month
		$this->month->ViewValue = $this->month->CurrentValue;
		$this->month->ViewValue = FormatDateTime($this->month->ViewValue, 0);
		$this->month->ViewCustomAttributes = "";

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

		// pid
		$this->pid->ViewValue = $this->pid->CurrentValue;
		$this->pid->ViewValue = FormatNumber($this->pid->ViewValue, 0, -2, -2, -2);
		$this->pid->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

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

		// tahun
		$this->tahun->LinkCustomAttributes = "";
		$this->tahun->HrefValue = "";
		$this->tahun->TooltipValue = "";

		// bulan
		$this->bulan->LinkCustomAttributes = "";
		$this->bulan->HrefValue = "";
		$this->bulan->TooltipValue = "";

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

		// sertif
		$this->sertif->LinkCustomAttributes = "";
		$this->sertif->HrefValue = "";
		$this->sertif->TooltipValue = "";

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

		// value_sakit
		$this->value_sakit->LinkCustomAttributes = "";
		$this->value_sakit->HrefValue = "";
		$this->value_sakit->TooltipValue = "";

		// tidakhadir
		$this->tidakhadir->LinkCustomAttributes = "";
		$this->tidakhadir->HrefValue = "";
		$this->tidakhadir->TooltipValue = "";

		// value_tidakhadir
		$this->value_tidakhadir->LinkCustomAttributes = "";
		$this->value_tidakhadir->HrefValue = "";
		$this->value_tidakhadir->TooltipValue = "";

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

		// pid
		$this->pid->LinkCustomAttributes = "";
		$this->pid->HrefValue = "";
		$this->pid->TooltipValue = "";

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

		// datetime
		// u_by

		$this->u_by->EditAttrs["class"] = "form-control";
		$this->u_by->EditCustomAttributes = "";
		$this->u_by->EditValue = $this->u_by->CurrentValue;
		$this->u_by->PlaceHolder = RemoveHtml($this->u_by->caption());

		// month
		$this->month->EditAttrs["class"] = "form-control";
		$this->month->EditCustomAttributes = "";
		$this->month->EditValue = FormatDateTime($this->month->CurrentValue, 8);
		$this->month->PlaceHolder = RemoveHtml($this->month->caption());

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

		// nama
		$this->nama->EditAttrs["class"] = "form-control";
		$this->nama->EditCustomAttributes = "";

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

		// sertif
		$this->sertif->EditAttrs["class"] = "form-control";
		$this->sertif->EditCustomAttributes = "";
		$this->sertif->EditValue = $this->sertif->CurrentValue;
		$this->sertif->PlaceHolder = RemoveHtml($this->sertif->caption());

		// terlambat
		$this->terlambat->EditAttrs["class"] = "form-control";
		$this->terlambat->EditCustomAttributes = "";
		$this->terlambat->EditValue = $this->terlambat->CurrentValue;
		$this->terlambat->PlaceHolder = RemoveHtml($this->terlambat->caption());

		// value_terlambat
		$this->value_terlambat->EditAttrs["class"] = "form-control";
		$this->value_terlambat->EditCustomAttributes = "";
		$this->value_terlambat->EditValue = $this->value_terlambat->CurrentValue;
		$this->value_terlambat->PlaceHolder = RemoveHtml($this->value_terlambat->caption());

		// izin
		$this->izin->EditAttrs["class"] = "form-control";
		$this->izin->EditCustomAttributes = "";
		$this->izin->EditValue = $this->izin->CurrentValue;
		$this->izin->PlaceHolder = RemoveHtml($this->izin->caption());

		// value_izin
		$this->value_izin->EditAttrs["class"] = "form-control";
		$this->value_izin->EditCustomAttributes = "";
		$this->value_izin->EditValue = $this->value_izin->CurrentValue;
		$this->value_izin->PlaceHolder = RemoveHtml($this->value_izin->caption());

		// sakit
		$this->sakit->EditAttrs["class"] = "form-control";
		$this->sakit->EditCustomAttributes = "";
		$this->sakit->EditValue = $this->sakit->CurrentValue;
		$this->sakit->PlaceHolder = RemoveHtml($this->sakit->caption());

		// value_sakit
		$this->value_sakit->EditAttrs["class"] = "form-control";
		$this->value_sakit->EditCustomAttributes = "";
		$this->value_sakit->EditValue = $this->value_sakit->CurrentValue;
		$this->value_sakit->PlaceHolder = RemoveHtml($this->value_sakit->caption());

		// tidakhadir
		$this->tidakhadir->EditAttrs["class"] = "form-control";
		$this->tidakhadir->EditCustomAttributes = "";
		$this->tidakhadir->EditValue = $this->tidakhadir->CurrentValue;
		$this->tidakhadir->PlaceHolder = RemoveHtml($this->tidakhadir->caption());

		// value_tidakhadir
		$this->value_tidakhadir->EditAttrs["class"] = "form-control";
		$this->value_tidakhadir->EditCustomAttributes = "";
		$this->value_tidakhadir->EditValue = $this->value_tidakhadir->CurrentValue;
		$this->value_tidakhadir->PlaceHolder = RemoveHtml($this->value_tidakhadir->caption());

		// pulcep
		$this->pulcep->EditAttrs["class"] = "form-control";
		$this->pulcep->EditCustomAttributes = "";
		$this->pulcep->EditValue = $this->pulcep->CurrentValue;
		$this->pulcep->PlaceHolder = RemoveHtml($this->pulcep->caption());

		// value_pulcep
		$this->value_pulcep->EditAttrs["class"] = "form-control";
		$this->value_pulcep->EditCustomAttributes = "";
		$this->value_pulcep->EditValue = $this->value_pulcep->CurrentValue;
		$this->value_pulcep->PlaceHolder = RemoveHtml($this->value_pulcep->caption());

		// tidakhadirjam
		$this->tidakhadirjam->EditAttrs["class"] = "form-control";
		$this->tidakhadirjam->EditCustomAttributes = "";
		$this->tidakhadirjam->EditValue = $this->tidakhadirjam->CurrentValue;
		$this->tidakhadirjam->PlaceHolder = RemoveHtml($this->tidakhadirjam->caption());

		// tidakhadirjamvalue
		$this->tidakhadirjamvalue->EditAttrs["class"] = "form-control";
		$this->tidakhadirjamvalue->EditCustomAttributes = "";
		$this->tidakhadirjamvalue->EditValue = $this->tidakhadirjamvalue->CurrentValue;
		$this->tidakhadirjamvalue->PlaceHolder = RemoveHtml($this->tidakhadirjamvalue->caption());

		// sakitperjam
		$this->sakitperjam->EditAttrs["class"] = "form-control";
		$this->sakitperjam->EditCustomAttributes = "";
		$this->sakitperjam->EditValue = $this->sakitperjam->CurrentValue;
		$this->sakitperjam->PlaceHolder = RemoveHtml($this->sakitperjam->caption());

		// sakitperjamvalue
		$this->sakitperjamvalue->EditAttrs["class"] = "form-control";
		$this->sakitperjamvalue->EditCustomAttributes = "";
		$this->sakitperjamvalue->EditValue = $this->sakitperjamvalue->CurrentValue;
		$this->sakitperjamvalue->PlaceHolder = RemoveHtml($this->sakitperjamvalue->caption());

		// izinperjam
		$this->izinperjam->EditAttrs["class"] = "form-control";
		$this->izinperjam->EditCustomAttributes = "";
		$this->izinperjam->EditValue = $this->izinperjam->CurrentValue;
		$this->izinperjam->PlaceHolder = RemoveHtml($this->izinperjam->caption());

		// izinperjamvalue
		$this->izinperjamvalue->EditAttrs["class"] = "form-control";
		$this->izinperjamvalue->EditCustomAttributes = "";
		$this->izinperjamvalue->EditValue = $this->izinperjamvalue->CurrentValue;
		$this->izinperjamvalue->PlaceHolder = RemoveHtml($this->izinperjamvalue->caption());

		// totalpotongan
		$this->totalpotongan->EditAttrs["class"] = "form-control";
		$this->totalpotongan->EditCustomAttributes = "";
		$this->totalpotongan->EditValue = $this->totalpotongan->CurrentValue;
		$this->totalpotongan->PlaceHolder = RemoveHtml($this->totalpotongan->caption());

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
					$doc->exportCaption($this->datetime);
					$doc->exportCaption($this->u_by);
					$doc->exportCaption($this->month);
					$doc->exportCaption($this->tahun);
					$doc->exportCaption($this->bulan);
					$doc->exportCaption($this->nama);
					$doc->exportCaption($this->jenjang_id);
					$doc->exportCaption($this->jabatan_id);
					$doc->exportCaption($this->sertif);
					$doc->exportCaption($this->terlambat);
					$doc->exportCaption($this->value_terlambat);
					$doc->exportCaption($this->izin);
					$doc->exportCaption($this->value_izin);
					$doc->exportCaption($this->sakit);
					$doc->exportCaption($this->value_sakit);
					$doc->exportCaption($this->tidakhadir);
					$doc->exportCaption($this->value_tidakhadir);
					$doc->exportCaption($this->pulcep);
					$doc->exportCaption($this->value_pulcep);
					$doc->exportCaption($this->tidakhadirjam);
					$doc->exportCaption($this->tidakhadirjamvalue);
					$doc->exportCaption($this->sakitperjam);
					$doc->exportCaption($this->sakitperjamvalue);
					$doc->exportCaption($this->izinperjam);
					$doc->exportCaption($this->izinperjamvalue);
					$doc->exportCaption($this->totalpotongan);
					$doc->exportCaption($this->pid);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->datetime);
					$doc->exportCaption($this->tahun);
					$doc->exportCaption($this->bulan);
					$doc->exportCaption($this->nama);
					$doc->exportCaption($this->jenjang_id);
					$doc->exportCaption($this->jabatan_id);
					$doc->exportCaption($this->sertif);
					$doc->exportCaption($this->terlambat);
					$doc->exportCaption($this->value_terlambat);
					$doc->exportCaption($this->izin);
					$doc->exportCaption($this->value_izin);
					$doc->exportCaption($this->sakit);
					$doc->exportCaption($this->value_sakit);
					$doc->exportCaption($this->tidakhadir);
					$doc->exportCaption($this->value_tidakhadir);
					$doc->exportCaption($this->pulcep);
					$doc->exportCaption($this->value_pulcep);
					$doc->exportCaption($this->tidakhadirjam);
					$doc->exportCaption($this->tidakhadirjamvalue);
					$doc->exportCaption($this->sakitperjam);
					$doc->exportCaption($this->sakitperjamvalue);
					$doc->exportCaption($this->izinperjam);
					$doc->exportCaption($this->izinperjamvalue);
					$doc->exportCaption($this->totalpotongan);
					$doc->exportCaption($this->pid);
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
						$doc->exportField($this->datetime);
						$doc->exportField($this->u_by);
						$doc->exportField($this->month);
						$doc->exportField($this->tahun);
						$doc->exportField($this->bulan);
						$doc->exportField($this->nama);
						$doc->exportField($this->jenjang_id);
						$doc->exportField($this->jabatan_id);
						$doc->exportField($this->sertif);
						$doc->exportField($this->terlambat);
						$doc->exportField($this->value_terlambat);
						$doc->exportField($this->izin);
						$doc->exportField($this->value_izin);
						$doc->exportField($this->sakit);
						$doc->exportField($this->value_sakit);
						$doc->exportField($this->tidakhadir);
						$doc->exportField($this->value_tidakhadir);
						$doc->exportField($this->pulcep);
						$doc->exportField($this->value_pulcep);
						$doc->exportField($this->tidakhadirjam);
						$doc->exportField($this->tidakhadirjamvalue);
						$doc->exportField($this->sakitperjam);
						$doc->exportField($this->sakitperjamvalue);
						$doc->exportField($this->izinperjam);
						$doc->exportField($this->izinperjamvalue);
						$doc->exportField($this->totalpotongan);
						$doc->exportField($this->pid);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->datetime);
						$doc->exportField($this->tahun);
						$doc->exportField($this->bulan);
						$doc->exportField($this->nama);
						$doc->exportField($this->jenjang_id);
						$doc->exportField($this->jabatan_id);
						$doc->exportField($this->sertif);
						$doc->exportField($this->terlambat);
						$doc->exportField($this->value_terlambat);
						$doc->exportField($this->izin);
						$doc->exportField($this->value_izin);
						$doc->exportField($this->sakit);
						$doc->exportField($this->value_sakit);
						$doc->exportField($this->tidakhadir);
						$doc->exportField($this->value_tidakhadir);
						$doc->exportField($this->pulcep);
						$doc->exportField($this->value_pulcep);
						$doc->exportField($this->tidakhadirjam);
						$doc->exportField($this->tidakhadirjamvalue);
						$doc->exportField($this->sakitperjam);
						$doc->exportField($this->sakitperjamvalue);
						$doc->exportField($this->izinperjam);
						$doc->exportField($this->izinperjamvalue);
						$doc->exportField($this->totalpotongan);
						$doc->exportField($this->pid);
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

				$nip = $rsnew["nama"];
				$jenjang = $rsnew["jenjang_id"];
				$jabatan = $rsnew["jabatan_id"];
				$sertif = $rsnew["sertif"];
				$tahun = $rsnew["tahun"];
				$bulan = $rsnew["bulan"];
												$absen =ExecuteRow("SELECT * FROM absen INNER JOIN absen_detil ON absen.id = absen_detil.pid WHERE absen_detil.pegawai='$nip' order by absen.datetime DESC");  

												//tidak hadir,pulang cepat,terlambat(diambil perjam)
												if($this->jabatan_id->CurrentValue == '9'){
												$tidakhadir = ExecuteRow("SELECT * from m_tidakhadir where jenjang_id='$jenjang' AND jabatan_id='$jabatan' AND sertif='$sertif'");
												$sakit = ExecuteRow("SELECT * from m_sakit where jenjang_id ='$jenjang' AND jabatan ='$jabatan' AND sertif='$sertif'");
												}else{
												$tidakhadir = ExecuteRow("SELECT * from m_tidakhadir where jenjang_id='$jenjang' AND jabatan_id='$jabatan'");
												$sakit = ExecuteRow("SELECT * from m_sakit where jenjang_id ='$jenjang' AND jabatan ='$jabatan'");
												}
													$rsnew["izin"] = $absen["ijin"];
													$rsnew["tidakhadir"] = $absen["asbsen"];
													$rsnew["sakit"] = $absen["cuti"];
													$rsnew["terlambat"] = $absen["terlambat"];

													//$rsnew["value_izin"] = $tidakhadir["perjam_value"];
													$rsnew["value_sakit"] = $sakit["perhari"];
													$rsnew["sakitperjamvalue"] = $sakit["perjam"];
													$rsnew["tidakhadirjamvalue"] = $tidakhadir["perjam_value"];
													$rsnew["value_izin"] = $tidakhadir["value"];
													$rsnew["value_tidakhadir"] = $tidakhadir["value"];
													$rsnew["value_izin"] = $tidakhadir["value"];										

													//$rsnew["value_tidakhadir"] = $tidakhadir["perjam_value"];
													$rsnew["value_pulcep"] = $tidakhadir["perjam_value"];
													$rsnew["izinperjamvalue"] = $tidakhadir["perjam_value"];
													$rsnew["value_terlambat"] = $tidakhadir["perjam_value"];
													$rsnew["totalpotongan"] = ($rsnew["sakit"] * $rsnew["value_sakit"]) + ($rsnew["terlambat"] * $rsnew["value_terlambat"]) + ($this->sakitperjam->CurrentValue * $rsnew["sakitperjamvalue"]) + ($this->pulcep->CurrentValue * $rsnew["value_pulcep"]) + ($rsnew["izin"]* $rsnew["value_izin"]) +($rsnew["izin"] * $rsnew["value_tidakhadir"]) + ($this->pulcep->CurrentValue * $rsnew["value_pulcep"]) + ($this->izinperjam->CurrentValue * $rsnew["izinperjamvalue"]);
		return TRUE;
	}	

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
				$nip = $rsnew["nama"];
				$jenjang = $rsnew["jenjang_id"];
				$jabatan = $rsnew["jabatan_id"];
				$sertif = $rsnew["sertif"];
				$tahun = $rsnew["tahun"];
				$bulan = $rsnew["bulan"];
												$absen =ExecuteRow("SELECT * FROM absen INNER JOIN absen_detil ON absen.id = absen_detil.pid WHERE absen_detil.pegawai='$nip' order by absen.datetime DESC");  

												//tidak hadir,pulang cepat,terlambat(diambil perjam)
												if($this->jabatan_id->CurrentValue == '9'){
												$tidakhadir = ExecuteRow("SELECT * from m_tidakhadir where jenjang_id='$jenjang' AND jabatan_id='$jabatan' AND sertif='$sertif'");
												$sakit = ExecuteRow("SELECT * from m_sakit where jenjang_id ='$jenjang' AND jabatan ='$jabatan' AND sertif='$sertif'");
												}else{
												$tidakhadir = ExecuteRow("SELECT * from m_tidakhadir where jenjang_id='$jenjang' AND jabatan_id='$jabatan'");
												$sakit = ExecuteRow("SELECT * from m_sakit where jenjang_id ='$jenjang' AND jabatan ='$jabatan'");
												}
													$rsnew["izin"] = $absen["ijin"];
													$rsnew["tidakhadir"] = $absen["asbsen"];
													$rsnew["sakit"] = $absen["cuti"];
													$rsnew["terlambat"] = $absen["terlambat"];

													//$rsnew["value_izin"] = $tidakhadir["perjam_value"];
													$rsnew["value_sakit"] = $sakit["perhari"];
													$rsnew["sakitperjamvalue"] = $sakit["perjam"];
													$rsnew["tidakhadirjamvalue"] = $tidakhadir["perjam_value"];
													$rsnew["value_izin"] = $tidakhadir["value"];
													$rsnew["value_tidakhadir"] = $tidakhadir["value"];
													$rsnew["value_izin"] = $tidakhadir["value"];										

													//$rsnew["value_tidakhadir"] = $tidakhadir["perjam_value"];
													$rsnew["value_pulcep"] = $tidakhadir["perjam_value"];
													$rsnew["izinperjamvalue"] = $tidakhadir["perjam_value"];
													$rsnew["value_terlambat"] = $tidakhadir["perjam_value"];
													$rsnew["totalpotongan"] = ($rsnew["sakit"] * $rsnew["value_sakit"]) + ($rsnew["terlambat"] * $rsnew["value_terlambat"]) + ($this->sakitperjam->CurrentValue * $rsnew["sakitperjamvalue"]) + ($this->pulcep->CurrentValue * $rsnew["value_pulcep"]) + ($rsnew["izin"]* $rsnew["value_izin"]) +($rsnew["izin"] * $rsnew["value_tidakhadir"]) + ($this->pulcep->CurrentValue * $rsnew["value_pulcep"]) + ($this->izinperjam->CurrentValue * $rsnew["izinperjamvalue"]);
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
								$row = ExecuteRow("SELECT * FROM pegawai where jenjang_id ='2' limit 1 OFFSET $offseter");

										//$this->pegawai->CurrentValue ='';
										$this->nama->CurrentValue = $row['nip'];
										$this->jabatan_id->CurrentValue = $row['jabatan'];
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