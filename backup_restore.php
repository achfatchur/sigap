<?php
namespace PHPMaker2020\sigap;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$backup_restore = new backup_restore();

// Run the page
$backup_restore->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<?php
require_once 'vendor/autoload.php';
$host       = "localhost";
$user       = "root";
$password   = "";
$database   = "sigap2";
$port   = "3306";
$connect    = mysqli_connect($host, $user, $password, $database);

	if(isset($_POST['restore'])){
		mysqli_query($connect, "DROP DATABASE ".$database."");
		mysqli_query($connect, "CREATE DATABASE ".$database."");
		$nama_file=$_FILES['datafile']['name'];
		$ukuran=$_FILES['datafile']['size'];
		$uploaddir='db_restore/';
		$alamatfile=$uploaddir.$nama_file;
		if (move_uploaded_file($_FILES['datafile']['tmp_name'],$alamatfile)){
			$filename = 'db_restore/'.$nama_file.'';     
		}
		else{
			echo "Restore Database Gagal, kode error = " . $_FILES['location']['error'];
		}

		\CodexShaper\Dumper\Drivers\MysqlDumper::create()
		->setHost($host)
		->setPort($port)
		->setDbName($database)
		->setPassword($password)
		->setUserName($user)
		->setRestorePath($filename)
		->restore();

		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Berhasil Proses Data');
		window.location.href='payrols.php';
		</script>");
	}

	if(isset($_POST['backup'])){
		\CodexShaper\Dumper\Drivers\MysqlDumper::create()
		->setHost($host)
		->setPort($port)
		->setDbName($database)
		->setUserName($user)
		->setPassword($password)
		->setDestinationPath('db_backup/Backup_SIGAP-'.date('d-F-Y').'.sql')
		->dump();

		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Berhasil Proses Data');
		window.location.href='payrols.php';
		</script>");
	}
?>
<div class="container">
  <div class="row">
	<div class="col-6">
		<div class="box-content">
			<h4>Backup Database SIGAP</h4><br>
			<form role="form" action="<?php echo CurrentPageName() ?>" method="post">
			<?php if ($Page->CheckToken) { ?>
			<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
			<?php } ?>
				<div class="form-group">
					<div class="col-sm-offset-3">
						<button type="submit" name="backup" class="btn btn-primary">Backup Database</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-6">
		<div class="box-content">
			<?php
				$dir    ="db_backup/";							
				$page    =10;
				$pg        =isset($_GET['page']) && $_GET['page'] ? $_GET['page'] : 1;
				if($pg<2){
					$start    =0;
				}
				else{
					$start    =($pg-1)*$page;
				}
				// membuka folder direktori
				$open    =opendir($dir) or die('Folder tidak ditemukan ...!');
				while ($file    =readdir($open)) {
					if($file !='.' && $file !='..'){   
						$files[]=$file;
					}
				}
				if (!empty($files)) {								
					// menghitung jumlah file
					$jumlah_file    =count($files);
					$jumlah_page    =ceil($jumlah_file / $page); 
					echo 'Jumlah file: '.$jumlah_file.' | Jumlah page: '.$jumlah_page.'<hr/><div> </div>';
					// membuka isi file dalam folder
					for($x=$start;$x<($start+$page);$x++){
						if($x<$jumlah_file){
							print '» <a href="'.$dir.$files[$x].'" target="_blank">'.ucwords($files[$x]).'</a><br/>';
						}
					}
					if($jumlah_file>$page){
						echo '<div> </div>';
						if($pg>1){
							echo '<a href="?page='.($pg-1).'">« Prev</a>';
						}
						if($pg<$jumlah_page){
							echo ' | <a href="?page='.($pg+1).'">Next »</a>';
						}
					}
				} else {
					echo 'Data Kosong';
				}
			?>
		</div>
	</div>
  </div>
  <br><br>
  <div class="row">
	<div class="col-6">
		<div class="box-content">
			<h4>Restore Database SIGAP</h4><br>
			<form enctype="multipart/form-data" role="form" action="<?php echo CurrentPageName() ?>" method="post">
			<?php if ($Page->CheckToken) { ?>
			<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
			<?php } ?>
				<div class="form-group">
					<label class="col-sm-3 control-label">File Database (*.sql)</label>
					<div class="col-sm-7">
						<input type="file" name="datafile" size="30" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3">
						<button type="submit" name="restore" class="btn btn-primary">Restore Database</button>
					</div>
				</div>
			</form>
		</div>
	</div>
  </div>
</div>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$backup_restore->terminate();
?>