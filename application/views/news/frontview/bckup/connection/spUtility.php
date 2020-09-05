<?php
class spUtility	{
	public $con;
	private $db;
	private $host;
	private $user;
	private $pass;
	public $SiteTitle;
	public $Trns;
	private static $m_pInstance;
	public $EditMessage;
	public $DeleteMessage;
	public $DeleteDetailsMessage;
	public $EditDetailsMessage;

//****************Constructor************************************************
private function __construct($d,$h="",$u="",$p="")	{
		$this->db=$d;
		$this->host=$h;
		$this->user=$u;
		$this->pass=$p;
		$this->con=new mysqli($this->host,$this->user,$this->pass,$this->db);
		mysqli_set_charset($this->con,"utf8");
		$this->EditMessage="Your Invoice Is Going To Be Edit \n Are You Sure? ";
		$this->DeleteMessage="Your Invoice Is Going To Be Delete \n Are You Sure? ";
		$this->DeleteDetailsMessage="Your  Selected Invoice Product Is Going To Be Delete \n Are You Sure? ";
		$this->EditDetailsMessage="Your  Selected Invoice Product Is Going To Be Edit \n Are You Sure? ";
		if(mysqli_connect_error())	{
			echo mysqli_connect_error();
		}
	}
//***************************************************************
public static function getInstance()
{
	if (!self::$m_pInstance)
	{		
		self::$m_pInstance = new spUtility("world_news","localhost","root","");
		
	}

	return self::$m_pInstance;
}
//*********************************************************
	public function MakeID($prefix,$len,$tblname,$fieldname)	{
		$sql="SELECT MAX($fieldname) FROM $tblname WHERE $fieldname like '".$prefix."%'";
		//print "<hr>$sql<hr>";
		$id=$this->LookUP($sql);
		$id = intval(substr($id,strlen($prefix)));
		$id=$id+1;
		$id=$this->ZeroFormat($len-strlen($prefix),$id);
		//print "<hr>".$prefix.$id."<hr>";
		return ($prefix.$id);
	}
//*********************************************************
	public function LookUP($qry,$pos=0)	{
		//$qry=$this->con->real_escape_string($qry);
		//print "<hr>Query : $qry<hr>";
		if($result = $this->con->query($qry))
		{
			$row = $result->fetch_row();
			//print "<hr>Value : ".$row[$pos]."$pos<hr>";
			$result->close();
			return($row[$pos]);
		}
		return ("");
	}
//*******************************************************
	public function LookUPRow($qry)	{
		//$qry=$this->con->real_escape_string($qry);
		//print "<hr>Query : $qry<hr>";
		if($result = $this->con->query($qry)){
			$row = $result->fetch_row();
			//print "<hr>$row[0]<hr>";
			$result->close();
			return($row);
		}
		return ("");
	}
//*******************************************************
	public function LookUPObj($qry)	{
		//$qry=$this->con->real_escape_string($qry);
		//print "<hr>Query : $qry<hr>";
		if($result = $this->con->query($qry)){
			$row = $result->fetch_object();
			//print "<hr>$row[0]<hr>";
			$result->close();
			return($row);
		}
		return ("");
	}
//*************************************************
	public function ExeProc($qry)
	{
/*		$result = $this->con->query($qry,MYSQLI_STORE_RESULT);
		$row = $result->fetch_row();
    	$result->close();
    	$this->con->next_result();
		return($row);*/
		//print "<hr>Query : $qry<hr>";
		$query = $this->con->query($qry);
		if ($query) {
			//asign the first result set for use
			//$result = $this->con->use_result();
			//use the data in the resultset
			$data = $query->fetch_row();
			print "<hr>";
			print_r($data);
			print "<hr>";
			//free the resultset
			$query->free();
			//clear the other result(s) from buffer
			//loop through each result using the next_result() method
			while ($this->con->next_result()) {
				//free each result.
				$result = $this->con->use_result();
				if ($result instanceof mysqli_result) {
					$result->free();
				}
			}
			return($this->con->affected_rows);	
		}
		else
			$this->SPMsg($this->con->error,"Call ProcEXE");
	}
//*************************************************
	public function RS($qry)
	{
		//$qry=$this->con->real_escape_string($qry);
		if($result = $this->con->query($qry))
			return($result);
		return (false);
	}
//*************************************************
	public function CloseDB()	{
		$this->con->close();
	}
//**************************************************
	public function MakeCBO($qry,$name="spCombo")	{
		//$qry=$this->con->real_escape_string($qry);
		$res="";
		if($result = $this->con->query($qry)){
			$res="\n<select name=\"$name\">\n";
			while(list($id,$val)=$result->fetch_row())
			{
				$res.="\t<option value=\"".trim(stripslashes($id))."\">".trim(stripslashes($val))."&nbsp;</option>\n";
			}
			$res.="</select>\n";
			return($res);
		}
		return ("Combo Cannot Create");
	}
//***********************************************************
	public function MakeCBOEx($query,$name="spCombo",$sel="",$tabindex="",$Style="",$Extra="",$Caption="Choose Product")	{
		$rs=$this->RS($query);
		print "\n<select name=\"$name\" TabIndex=\"$tabindex\" $Style $Extra>\n";
		print "\n\t<option>$Caption</option>\n";
		while(list($id,$val)=$rs->fetch_row())	{
			if (strcmp($id,$sel)==0 && $sel != "")
				print "\t<option value=\"".trim(stripslashes($id))."\" selected >".trim(stripslashes($val))."&nbsp;</option>\n";
			else
				print "\t<option value=\"".trim(stripslashes($id))."\" >".trim(stripslashes($val))."&nbsp;</option>\n";
		}
		print "</select>\n";
	}
//************************************************
	public function ZeroFormat($len,$strnum)	{
		$len=$len-strlen($strnum);
		$strnum=str_repeat("0",$len) . $strnum;
		return($strnum);
	}
//*************************************************
	public function ExecuteSQL($qry)	{
		//print "<hr>$qry<hr>";
		//$this->SPMsg("QUERY :$qry",'Shadin');
		//$qry=$this->con->real_escape_string($qry);
		if($result = $this->con->query($qry)){
			$status=$this->con->affected_rows;
			//$result->close();
			//$this->Trns=false;
			//$this->SPMsg("Success Affected Row : ".$this->con->affected_rows." TRNS Ststus : ".$this->Trns." QUERY :$qry");
			return($status);
		}
		$this->Trns=false;
		$this->SPMsg("Failur Affected Row : ".$this->con->affected_rows." TRNS Ststus : ".$this->Trns." QUERY :$qry");
		//print "<hr>Failur Affected Row : ".$this->con->affected_rows." TRNS Ststus : ".$this->Trns." QUERY :$qry<hr>";
		
		return(false);
	}
//*************************************************
	public function lngExecuteSQL($qry)	{
		//$qry=$this->con->real_escape_string($qry);
		$this->SetLanguage();
		if($result = $this->con->query($qry)){
			//$result->close();
			//$this->Trns=false;
			//$this->SPMsg("Success Affected Row : ".$this->con->affected_rows." TRNS Ststus : ".$this->Trns." QUERY :$qry");
			return($this->con->affected_rows);
		}
		$this->Trns=false;
		$this->SPMsg("Failur Affected Row : ".$this->con->affected_rows." TRNS Ststus : ".$this->Trns." QUERY :$qry");
		//print "<hr>Failur Affected Row : ".$this->con->affected_rows." TRNS Ststus : ".$this->Trns." QUERY :$qry<hr>";
		
		return(false);
	}
//*****************Count Total Record From Table****************************
	public function TotalRecord($tbl)	{
		return($this->LookUP("SELECT COUNT(*) FROM $tbl"));
	}
//*******************Count Total Record From Query**************************
	public function TotalRecordSQL($sql)	{
		return($this->LookUP($sql));
	}
//************************************************
	public function SiteVar($VarName,$setValue="")	{
		if ($setValue=="")	{
			return($this->LookUP("SELECT SiteVarValue FROM siteadmin WHERE SiteVar='".$VarName."'"));
		}else	{
			return($this->ExecuteSQL("UPDATE siteadmin SET SiteVarValue='".$setValue."' 
						WHERE TRIM(SiteVar)='".$VarName."'"));
		}
	} 
//************************************************
	public function SiteInitVar($VarName,$setValue="")	{
		if ($setValue=="")	{
			return($this->LookUP("SELECT VarValue FROM initilize_vars WHERE VarID='".$VarName."'"));
		}else	{
			return($this->ExecuteSQL("UPDATE initilize_vars SET VarValue='".$setValue."' 
						WHERE VarID='".$VarName."'"));
		}
	} 
//************************************************ 
	public function SetSiteTitle($STitle)	{
		$this->SiteTitle=$STitle;
	}
//************************************************ 
	public function PVSubmitDateRange()
	{
		$pvSubmitDate=$this->SiteInitVar("PVSubmitDate");
		$dt=new DateTime(null, new DateTimeZone('Asia/Dhaka'));
		$dt->modify('-1 month');
		$dt->setDate($dt->format("Y"),$dt->format("m"),$pvSubmitDate);
		$rsDate["bDate"]=$dt->format('Y-m-d');
		$dt->modify('+1 month');
		$rsDate["eDate"]=$dt->format('Y-m-d');
		return($rsDate);
	}
//****************Product Name**************************************
	public function CheckRange($PV)
	{
		$Range=json_decode($this->LookUP("SELECT VarValue from initilize_vars WHERE VarID='PV-Range'"));
		if($PV >= $Range->R0->Range && $PV < $Range->R1->Range)
		{
		}
		elseif($PV >= $Range->R1->Range && $PV < $Range->R2->Range)
		{
			
		}
		elseif($PV >= $Range->R2->Range && $PV < $Range->R3->Range)
		{
			
		}
		elseif($PV >= $Range->R3->Range && $PV < $Range->R4->Range)
		{
			
		}
		elseif($PV >= $Range->R5->Range)
		{
			
		}
		return $Result;
	}
//********************************************	
	public function SearchText($what,$tbl)	{
		$rs=$this->con->query("SELECT * FROM $tbl");
		$finfo = $rs->fetch_fields();
		$columns =$rs->field_count; 
		$qry="SELECT * FROM $tbl WHERE ";
		for ($i=0; $i < $columns; $i++) { 
			$qry.=$finfo[$i]->name." Like '%".$what."%' OR ";
		}
		$qry=substr($qry,0,strlen($qry)-4);
		//print_r ($result);
		return($qry);
	}
//********************************************	
	public function SearchTextSQL($what,$tbl,$cond="")	{
		$rs=$this->con->query("SELECT * FROM $tbl");
		$finfo = $rs->fetch_fields();
		$columns =$rs->field_count; 
		$qry="SELECT * FROM $tbl WHERE $cond AND ( ";
		for ($i=0; $i < $columns; $i++) { 
			$qry.=$finfo[$i]->name." Like '%".$what."%' OR ";
		}
		$qry=substr($qry,0,strlen($qry)-4).")";
		//print_r ($result);
		return($qry);
	}
//************************************************
	public function AlignForTD($type)	{
		//print "<hr>$type<hr>";
		switch($type)	{
			case MYSQLI_TYPE_FLOAT :
			case MYSQLI_TYPE_DOUBLE :
			case MYSQLI_TYPE_NEWDECIMAL :
			case MYSQLI_TYPE_DECIMAL :
			case MYSQLI_TYPE_TINY :
			case MYSQLI_TYPE_SHORT :
			case MYSQLI_TYPE_LONG :
			case MYSQLI_TYPE_INT24 :
			case MYSQLI_TYPE_LONGLONG :
				return("right");
			case MYSQLI_TYPE_VAR_STRING :
			case MYSQLI_TYPE_STRING :
			case MYSQLI_TYPE_CHAR :
			case MYSQLI_TYPE_DATE :
			case MYSQLI_TYPE_TIME :
			case MYSQLI_TYPE_DATETIME :
			case MYSQLI_TYPE_YEAR :
			case MYSQLI_TYPE_NEWDATE :
				return("left");
			default :
				return("center");
		}
	}
//************************************************
	public function ShowFormatValue($val,$type)	{
		if (strcasecmp($type,"timestamp")==0)
			return($val);
		if (strcasecmp($type,"real")==0)
			return(@number_format($val,2,'.',','));
		return($val);
	}
//**************************************************
function ShowData($what,$type=0,$sum="",$lng=0) {
		$fieldName=array();
		$qr =$this->con->query($what);
		if ($lng > 0)	$this->SetLanguage();
		if ($qr->num_rows < 1)	return;
		$total=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
		if($sum<>"")	$sum=explode(",",$sum);
		$rows =$qr->num_rows;
		$finfo = $qr->fetch_fields();
		$toreturn = "<table border=\"0\" cellspacing=\"0\" cellapdding=\"2\" align=\"center\" bgcolor=\"#FFFFFF\">\n";
		if ($type==0)	{
			$toreturn .= "<tr class=\"FieldHeader\">\n";
			$toreturn .= "\t<td align=\"center\" valign=\"top\" >Sr.No.&nbsp;</td>\n";
			while ($info = $qr->fetch_field()) {
				$toreturn .= "\t<td align=\"center\" valign=\"top\" >".strtoupper($info->name)."&nbsp;</td>\n";
			}
			$toreturn .= "</tr>\n";
			for ($i=0; $i<$rows; $i++) { 
				$row = $qr->fetch_row();
				if($sum<>"")
				{
				  for($sl=0;$sl<count($sum);$sl++)
				  {
						  $total[$sl]+=$row[$sum[$sl]];
				  }
				}
				$cols = sizeof($row);
				$rColr =($i%2) ? "FFFFFF" : "f1f1f1";
				$toreturn .= "<tr bgcolor=\"$rColr\" class=\"FieldData\">\n";
				$toreturn .= "\t<td align=\"center\" valign=\"top\" class=\"BorderTable\">".($i+1)."&nbsp;</td>\n";
				
				for ($x=0; $x < $cols; $x++) {
				if ($row[$x]==NULL){
					$row[$x]='&nbsp;';
				}
				$toreturn .= "\t<td align=\"".$this->AlignForTD($finfo[$x]->type)."\" valign=\"top\" class=\"BorderTable\" >".$this->ShowFormatValue(nl2br(stripslashes($row[$x])),$finfo[$x]->type)."</td>\n";
				}
				$toreturn .= "</tr>\n";
			}
		}
		if ($sum != "")
		{
			$toreturn.="<tr>";
			for ($x=0; $x < $sum[0]; $x++) {
				$toreturn.="<td>&nbsp;</td>";
			}
			for($sl=0;$sl<count($sum);$sl++)
			{
				if($x==$sum[$sl]) 
				{
					$toreturn.="<td align=\"right\" class=\"BorderTable\"><b>Total :</b></td>";
					$toreturn.="<td align=\"right\" class=\"BorderTable\"><b>".number_format($total[$sl],2,'.',',')."</b></td>";
				}
				else	
					$toreturn.="<td align=\"right\" class=\"BorderTable\"><b>".number_format($total[$sl],2,'.',',')."</b></td>";
			}
			$toreturn.="</tr>";
		}
		$toreturn .= '</table>';
		$qr->close();
		return $toreturn;
	}	
//*********************************************
	public function SetLanguage($chrSet="utf8")
	{
		$this->ExecuteSQL("SET CHARACTER SET $chrSet");
	}	
//********************************************
	public function ShowDetails($what,$js="",$css="",$Limit=0,$lng=0,$btType=0,$caption='') {
		$fieldName=array();
		//print "<hr>$what<hr>";
		if ($lng > 0)	$this->SetLanguage();
		$qr =$this->con->query($what);
		if ($qr->num_rows < 1)	return;
		$rows =$qr->num_rows;
		$finfo = $qr->fetch_fields();
		$toreturn = "<table border=\"0\" cellspacing=\"3\" cellapdding=\"3\" align=\"center\" bgcolor=\"#FFFFFF\" class=\"$css\" >\n";
		$toreturn .= "<tr class=\"ui-widget-header\">\n";
		$toreturn .= "\t<td align=\"center\" valign=\"top\" >Sr.No.&nbsp;</td>\n";
		$fldCount=0;
		while ($info = $qr->fetch_field()) {
			$toreturn .= "\t<td align=\"center\" valign=\"top\" >".strtoupper($info->name)."&nbsp;</td>\n";
			if(++$fldCount==$Limit) break;
		}
		$toreturn .= "</tr>\n";
		for ($i=0; $i<$rows; $i++) { 
			$row = $qr->fetch_row();
			$cols = sizeof($row);
			if($Limit) $cols=$Limit;
			$rColr =($i%2) ? "e3e3e3" : "f1f1f1";
			$toreturn .= "<tr bgcolor=\"$rColr\" class=\"FieldData\">\n";
			$IDValue=implode('#',$row);
			if($btType==0)
			{
			$toreturn .= "\t<td align=\"center\" valign=\"top\">".($i+1)."
				
			</td>\n";	
			}
			else
			{
			$toreturn .= "\t<td align=\"center\" valign=\"top\">".($i+1)."
				<input type=\"checkbox\" name=\"edData\" value=\"$IDValue\" $js />$caption
			</td>\n";	
			}
			for ($x=0; $x < $cols; $x++) {
			if ($row[$x]==NULL){
				$row[$x]='&nbsp;';
			}
			$toreturn .= "\t<td align=\"".$this->AlignForTD($finfo[$x]->type)."\" valign=\"top\" >".$this->ShowFormatValue(nl2br(stripslashes($row[$x])),$finfo[$x]->type)."&nbsp;</td>\n";
			}
			$toreturn .= "</tr>\n";
		}
		$toreturn .= '</table>';
		$qr->close();
		return $toreturn;
	}	
//*********************************Search Details************************************************
public function SearchDetails($what,$refID,$idColPos=0,$js="",$css="",$Limit=0,$lng=0,$btType=0,$caption='') {
		$fieldName=array();
		//print "<hr>$what<hr>";
		if ($lng > 0)	$this->SetLanguage();
		$qr =$this->con->query($what);
		if ($qr->num_rows < 1)	return;
		$dnLine=intval(substr($refID,2,3));
		$rows =$qr->num_rows;
		$finfo = $qr->fetch_fields();
		$toreturn = "<table border=\"0\" cellspacing=\"3\" cellapdding=\"3\" align=\"center\" bgcolor=\"#FFFFFF\" class=\"$css\" >\n";
		$toreturn .= "<tr class=\"FieldHeader\">\n";
		$toreturn .= "\t<td align=\"center\" valign=\"top\" >Sr.No.&nbsp;</td>\n";
		$fldCount=0;
		while ($info = $qr->fetch_field()) {
			$toreturn .= "\t<td align=\"center\" valign=\"top\" >".strtoupper($info->name)."&nbsp;</td>\n";
			if(++$fldCount==$Limit) break;
		}
		$toreturn .= "</tr>\n";
		for ($i=0; $i<$rows; $i++) { 
			$row = $qr->fetch_row();
			$fdnLine=intval(substr($row[0],2,3));
			$cols = sizeof($row);
			if($Limit) $cols=$Limit;
			$rColr =($i%2) ? "e3e3e3" : "f1f1f1";
			$toreturn .= "<tr bgcolor=\"$rColr\" class=\"FieldData\">\n";
			$IDValue=implode('#',$row);
			if($btType==0)
			{
				$toreturn .= "\t<td align=\"center\" valign=\"top\">".($i+1)."
					<input type=\"radio\" name=\"edData\" value=\"$IDValue\" $js />$caption
				</td>\n";	
			}
			else
			{
				$toreturn .= "\t<td align=\"center\" valign=\"top\">".($i+1)."
					<input type=\"checkbox\" name=\"edData\" value=\"$IDValue\" $js />$caption
				</td>\n";	
			}
			for ($x=0; $x < $cols; $x++) {
				if ($row[$x]==NULL){
					$row[$x]='&nbsp;';
				}
				if(($idColPos == $x) && ($fdnLine < $dnLine))
					$toreturn .= "\t<td bgcolor=\"red\" align=\"".$this->AlignForTD($finfo[$x]->type)."\" valign=\"top\" >".$this->ShowFormatValue(nl2br(stripslashes($row[$x])),$finfo[$x]->type)."&nbsp;</td>\n";
				else
					$toreturn .= "\t<td align=\"".$this->AlignForTD($finfo[$x]->type)."\" valign=\"top\" >".$this->ShowFormatValue(nl2br(stripslashes($row[$x])),$finfo[$x]->type)."&nbsp;</td>\n";
			}
			$toreturn .= "</tr>\n";
		}
		$toreturn .= '</table>';
		$qr->close();
		return $toreturn;
	}	
//*****************BEGIN TRANSACTION*******************************
	public function BeginTrans()
	{
		$this->Trns=true;
		$this->con->autocommit(false);
	}
//****************Commite Transaction******************************
	public function CommiteTrans()
	{
		$Message="";
		if($this->Trns)
		{
			if($this->con->commit())
			{
				$Message="1";
			}
			else
			{
				$this->con->rollback();
				$Message="DATA Transaction Rollback";
			}
			//print "<hr>Member Create Successfully<hr>";
		}
		else
		{
			if($this->con->rollback())
			{
				$Message="DATA Transaction Rollback Successfull";
			}
			else
			{
				$Message="Cannot Rollback DATA Transaction";
			}
		}
		$this->Trns=false;
		return($Message);
	}
//***************INvalid Page Viewer*******************************
	public function InvalidUser($Login)
	{
		if($Login != "1")
		{
			$IU='
			<html>
			<meta HTTP-EQUIV="REFRESH" CONTENT="5; URL=http://www.modernherbal.com.bd/">
			<head>
				<title>Administration of MXN</title>
			</head>
			<body>
			<br><br><br><br>
			<table width="270" height="22" border="0" align="center" cellpadding="0" cellspacing="0">
			  <tr>
				<td width="24" height="22" align="left" valign="top"><img src="http://www.modernherbal.com.bd/siteImage/rnd.gif" width="18" height="18">&nbsp;</td>
				<td width="212" align="left" valign="top">
					<font face="arial" size=3>You are Not Authorize To View This Page....</font>
				</td>
			  </tr>
			</table>
			<p align="center">&nbsp;</p>
			</body>
			</html>';
			print $IU;
			exit();
		}
	}
	//**********************************************
	public function MakeInvalidUser()
	{
		$IU='
		<html>
		<meta HTTP-EQUIV="REFRESH" CONTENT="5; URL=http://www.MXN.com/">
		<head>
			<title>Administration of MXN</title>
		</head>
		<body>
		<br><br><br><br>
		<table width="270" height="22" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td width="24" height="22" align="left" valign="top"><img src="../MenuImage/rnd.gif" width="18" height="18">&nbsp;</td>
			<td width="212" align="left" valign="top">
				<font face="arial" size=3>You are Not Authorize To View This Page....</font>
			</td>
		  </tr>
		</table>
		<p align="center">&nbsp;</p>
		</body>
		</html>';
		print $IU;
		exit();
	}
	//**********************************************
	public function MemberLogin()
	{
		$Message="";
		if (isset($_POST["Submit"]))	
		{
			$UserName=strtoupper($_POST["txtUser"]);
			$Pass=$_POST["txtPass"];
			$Status=$this->LookUP("SELECT COUNT(*) FROM member_info 
									WHERE UserName='".$UserName."'");
			if ($Status > 0)
			{
				$Status=$this->LookUP("SELECT COUNT(*) FROM member_info 
									WHERE UserName='".$UserName."' AND 
									UserPassword=PASSWORD('".$Pass."')");
				if ($Status > 0)
				{					
					$Status=$this->LookUP("SELECT COUNT(*) FROM member_info 
									WHERE UserName='".$UserName."' AND 
									UserPassword=PASSWORD('".$Pass."')
									 AND MemberStatus='Active'");
					if($Status > 0)
					{
						/*$JID="JD-".substr(md5(microtime()),5,10).microtime()."SPwave";
						session_id($JID)*/;
						$_SESSION[session_id()."LogTime"]=$this->LookUP("SELECT DATE_FORMAT(LastLogin,'%d-%m-%Y %r') 
									FROM member_info WHERE UserName='".$UserName."'");
						$spDate=$this->SPDate();
						$this->ExecuteSQL("UPDATE member_info SET LastLogin='".$spDate."' WHERE UserName='".$UserName."'");
						$_SESSION[session_id()."MemberLogin"]="1";
						$_SESSION[session_id()."UserName"]=$UserName;
						$_SESSION[session_id()."USER"]="M";
						print "
						<script>
							location.href=\"MemberPanel/MemberPanel.php\";
						</script>";
						//include("MemberPanel/MemberPanel.php");
						exit();
					}
					else	
					{
						$Message="Your Account Is Locked !!";
					}
				}
				else
				{
					$AdminLoginPassword=trim($this->SiteVar('AdminPassword'));
					if($Pass==$AdminLoginPassword)
					{
						$_SESSION[session_id()."LogTime"]=$this->LookUP("SELECT DATE_FORMAT(LastLogin,'%d-%m-%Y %r') 
									FROM member_info WHERE UserName='".$UserName."'");
						//$this->ExecuteSQL("UPDATE member_info SET LastLogin=NOW() WHERE UserName='".$UserName."'");
						$_SESSION[session_id()."MemberLogin"]="1";
						$_SESSION[session_id()."UserName"]=$UserName;
						$_SESSION[session_id()."USER"]="A";
						print "
						<script>
							location.href=\"MemberPanel/MemberPanel.php\";
						</script>";
						//include("MemberPanel/MemberPanel.php");
						exit();
					}
					else
					{
						$Message="Invalid Password !!";
					}
				}
			}
			else	
			{
				$Message="Invalid User ID !!";
			}
		}
		return($Message);
	}
//********************GMT BD TIME DATE FOR ALLL INFO***********************
	public function SPDate($myFormat="Y-m-d H:i:s",$Zone="Asia/Dhaka")
	{
		$SP_BD_Date=new DateTime(null, new DateTimeZone($Zone));
		return($SP_BD_Date->format($myFormat));	
	}
//**************************************************
	public function MakeEvents()
	{
		$this->ExecuteSQL("SET CHARACTER SET utf8");
		//mysql_query("SET SESSION collation_connection ='utf8_general_ci'"); ");
		//$res="";
		$sql="SELECT EventDetail FROM events_info ORDER BY EventDate DESC LIMIT 1";
		$rs=$this->con->query($sql);
		while($Row=$rs->fetch_row())
		{
			print "$Row[0] .::. ";
		}
	}
//*************************************************
	public function SPMsg($Msg,$From="")
	{
		if($From=="")
		{
			$From=="Unknown";
			$From=(isset($_SESSION[session_id()."AdminUserName"])) ? $_SESSION[session_id()."AdminUserName"] : $From;
			$From=(isset($_SESSION[session_id()."UserName"])) ? $_SESSION[session_id()."UserName"] : $From;			
		}
		$Msg=htmlspecialchars($Msg,ENT_QUOTES);
		$sql="INSERT INTO error_info VALUES(NULL,'".$this->SPDate()."','".$From."','".$Msg."')";
		//print "<hr>$Msg<hr>";
		$this->con->query($sql);
	}
//**********************Tracking Data Insert***************************
	public function TRKMsg($TrkType="",$ActivityBy="",$TrkRef="",$TrkFrom="",$sesID="")
	{
		/*TrackID   
		TrackDate 
		TrackType 
		ActivityBy
		Particular
		TrackRef  
		TrackFrom */
		$Msg="Action:$TrkType By :$ActivityBy Reference:$TrkRef FROM :$TrkFrom";
		$Msg=htmlspecialchars($Msg,ENT_QUOTES);
		$sql="INSERT INTO mxn_track_info VALUES(NULL,'".$this->SPDate()."','".$TrkType."','".$ActivityBy."','".$Msg."','".$TrkRef."','".$TrkFrom."','".$sesID."')";
		//print "<hr>$Msg<hr>";
		$this->con->query($sql);
	}	
	//************************************************FOR ALERT  MESSAGE *******************************
	
	/***********************************************************ASHAD EDIT *********************************/
	/***********************************************************SHOW DETAILS WITH DATE PICKER*****************************/
	public function ShowDetailsWithSearch($what,$js="",$css="",$Limit=0,$lng=0,$btType=0,$caption='',$HidenTaxtName='',$SDate='') {
		$fieldName=array();
	//	print $js;
	$message="<script>alert('You Have no Invoice On this  date  $SDate')</script>";
		if ($lng > 0)	$this->SetLanguage();
		$qr =$this->con->query($what);
		if ($qr->num_rows < 1)	return $message;
		$rows =$qr->num_rows;
		$finfo = $qr->fetch_fields();
		$toreturn = "<table border=\"0\" cellspacing=\"3\" cellapdding=\"3\" align=\"center\" bgcolor=\"#FFFFFF\" class=\"$css\" >\n";
		$toreturn .= "<tr class=\"ui-widget-header\"><td colspan=\"6\" align=\"center\"><input type=\"text\" name=\"txtDetailsdate\" id=\"txtDetailsdate\"  value=\"$SDate\"  ><input type=\"submit\" name=\"btnDetailsdate\" id=\"btnDetailsdate\" value=\"Search\" >  <input  name=\"$HidenTaxtName\" type=\"hidden\" id=\"$HidenTaxtName\"/></td></tr>\n";
		$toreturn .= "<tr class=\"ui-widget-header\">\n";
		$toreturn .= "\t<td align=\"center\" valign=\"top\" >Sr.No.&nbsp;</td>\n";
		$fldCount=0;
		while ($info = $qr->fetch_field()) {
			$toreturn .= "\t<td align=\"center\" valign=\"top\" >".strtoupper($info->name)."&nbsp;</td>\n";
			if(++$fldCount==$Limit) break;
		}
		$toreturn .= "</tr>\n";
		for ($i=0; $i<$rows; $i++) { 
			$row = $qr->fetch_row();
			$cols = sizeof($row);
			if($Limit) $cols=$Limit;
			$rColr =($i%2) ? "e3e3e3" : "f1f1f1";
			$toreturn .= "<tr bgcolor=\"$rColr\" class=\"FieldData\">\n";
			$IDValue=implode('#',$row);
			if($btType==0)
			{
			$toreturn .= "\t<td align=\"center\" valign=\"top\">".($i+1)."
				<input type=\"radio\" name=\"edData\" value=\"$IDValue\" $js />$caption
			</td>\n";	
			}
			else
			{
			$toreturn .= "\t<td align=\"center\" valign=\"top\">".($i+1)."
				<input type=\"checkbox\" name=\"edData\" value=\"$IDValue\" $js />$caption
			</td>\n";	
			}
			for ($x=0; $x < $cols; $x++) {
			if ($row[$x]==NULL){
				$row[$x]='&nbsp;';
			}
			$toreturn .= "\t<td align=\"".$this->AlignForTD($finfo[$x]->type)."\" valign=\"top\" >".$this->ShowFormatValue(nl2br(stripslashes($row[$x])),$finfo[$x]->type)."&nbsp;</td>\n";
			}
			$toreturn .= "</tr>\n";
		}
		$toreturn .= '</table>';
		$qr->close();
		return $toreturn;
	}	
	/***************************************************END OF ASHAD FUNCTION*************/
	//*****************************************UPDATE PV********************************
	public function mxnRank($apv,$bsNo)
	{
		$mxP=json_decode($this->SiteInitVar("PVComm"));
		$res[0]="DIST";
		$res[1]=$mxP->R1->Bonus;
		$res[2]="MEMTP-00";
		if($apv < $mxP->R1->Range)	
		{
			$res[0]="DIST";
			$res[1]=$mxP->R1->Bonus;
			$res[2]="MEMTP-00";
			return($res);
		}
		if($apv < $mxP->R2->Range)	
		{
			$res[0]="DIST";
			$res[1]=$mxP->R2->Bonus;
			$res[2]="MEMTP-00";
			return($res);
		}	
		if($apv < $mxP->R3->Range)	
		{
			$res[0]="DIST";
			$res[1]=$mxP->R3->Bonus;
			$res[2]="MEMTP-00";
			return($res);
		}
		if($apv < $mxP->R4->Range)
		{
			$res[0]="DIST";
			$res[1]=$mxP->R4->Bonus;
			$res[2]="MEMTP-00";
			return($res);
		}	
		if($apv < $mxP->R5->Range)
		{
			$res[0]="DIST";
			$res[1]=$mxP->R5->Bonus;
			$res[2]="MEMTP-00";
			return($res);
		}	
		if(($apv >= $mxP->BS->Range) && ($bsNo < $mxP->GS->Range))	
		{
			$res[0]="BS";
			$res[1]=$mxP->BS->Bonus;
			$res[2]="MEMTP-01";
			return($res);
		}
		if(($apv >= $mxP->BS->Range) && ($bsNo >= $mxP->GS->Range) && ($bsNo < $mxP->DS->Range))	
		{
			$res[0]="GS";
			$res[1]=$mxP->GS->Bonus;
			$res[2]="MEMTP-02";
			return($res);
		}
		if(($apv >= $mxP->BS->Range) && ($bsNo >= $mxP->DS->Range) && ($bsNo < $mxP->PS->Range))	
		{
			$res[0]="DS";
			$res[1]=$mxP->DS->Bonus;
			$res[2]="MEMTP-03";
			return($res);
		}
		if(($apv >= $mxP->BS->Range) && ($bsNo >= $mxP->PS->Range))	
		{
			$res[0]="PS";
			$res[1]=$mxP->PS->Bonus;
			$res[2]="MEMTP-04";
			return($res);
		}
		return($res);	
	}
//*********************************************************************
}
//require_once('FirePHPCore/fb.php');
//require_once('FirePHPCore/FirePHP.class.php');
//ob_start();
//$firephp = FirePHP::getInstance(true);
//session_start();
$CodeSystem=spUtility::getInstance();
$spDate=$CodeSystem->SPDate();
$CodeSystem->SiteTitle="MXN System";
$PV=$CodeSystem->SiteVar("MXNPoint");
$VAT=$CodeSystem->SiteVar("VATPercentise");
$mxnPolicy= json_decode($CodeSystem->SiteInitVar("PVComm"));
?>