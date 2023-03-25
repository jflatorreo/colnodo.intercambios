<?php
/*
 * Session Management for PHP3
 *
 * (C) Copyright 1998 Cameron Taggart (cameront@wolfenet.com)
 *        Modified by Guarneri carmelo (carmelo@melting-soft.com)
 *	  Modified by Cameron Just     (C.Just@its.uq.edu.au)	 
 *
 * $Id: DB_MSSQL.php 4308 2020-11-08 21:44:12Z honzam $
 */

namespace AA\IO\DB;

class DB_MSSQL extends AbstractDB {}

//  Commented out - unmaintained code - uses mssql db functions incompatible with php >= 7.0
//  (Honza 2020-08-18)
//
//class DB_MSSQL {
//  var $Host     = "";
//  var $Database = "";
//  var $User     = "";
//  var $Password = "";
//
//  var $Link_ID  = 0;
//  var $Query_ID = 0;
//  var $Row      = 0;
//
//
//  var $PConnect  = 0;     ## Set to 1 to persistent database connections
//
//  /**
//   * DB_MSSQL constructor.
//   * @param array $connection
//   */
//  function __construct(array $connection) {
//      $this->Database = $connection['database'] ?? '';
//      $this->Host     = $connection['host'] ?? '';
//      $this->User     = $connection['user'] ?? '';
//      $this->Password = $connection['password'] ?? '';
//  }
//
//  function connect() {
//    if ( 0 == $this->Link_ID ) {
//      if(!$this->PConnect) {
//        $this->Link_ID = mssql_connect($this->Host, $this->User, $this->Password);
//      } else {
//        $this->Link_ID = mssql_pconnect($this->Host, $this->User, $this->Password);
//      }
//      if (!$this->Link_ID)
//        $this->connect_failed("connect ($this->Host, $this->User, \$Password) failed");
//      else
//        if (!mssql_select_db($this->Database, $this->Link_ID)) {
//          $this->connect_failed("cannot use database ".$this->Database);
//        }
//    }
//  }
//  function connect_failed($message='') {
//    $this->Halt_On_Error = "yes";
//    $this->halt($message);
//  }
//
//  function free_result(){
//	  mssql_free_result($this->Query_ID);
//  	$this->Query_ID = 0;
//  }
//
//  function query($Query_String)
//  {
//
//    /* No empty queries, please, since PHP4 chokes on them. */
//    if ($Query_String == "")
//      /* The empty query string is passed on from the constructor,
//       * when calling the class without a query, e.g. in situations
//       * like these: '$db = new DB_Sql_Subclass;'
//       */
//      return 0;
//
//  	if (!$this->Link_ID)
//    	$this->connect();
//
//#   printf("<br>Debug: query = %s<br>\n", $Query_String);
//
//    $this->Query_ID = mssql_query($Query_String, $this->Link_ID);
//    $this->Row = 0;
//    if (!$this->Query_ID) {
//      $this->Errno = 1;
//      $this->Error = "General Error (The MSSQL interface cannot return detailed error messages).";
//      $this->halt("Invalid SQL: ".$Query_String);
//    }
//    return $this->Query_ID;
//  }
//
//  function next_record() {
//
//    if ($this->Record = mssql_fetch_row($this->Query_ID)) {
//      // add to Record[<key>]
//      $count = mssql_num_fields($this->Query_ID);
//      for ($i=0; $i<$count; $i++){
//      	$fieldinfo = mssql_fetch_field($this->Query_ID,$i);
//        $this->Record[strtolower($fieldinfo->name)] = $this->Record[$i];
//      }
//      $this->Row += 1;
//      $stat = 1;
//    } else {
//  	$this->free_result();
//      $stat = 0;
//    }
//    return $stat;
//  }
//
//  function seek($pos) {
//		mssql_data_seek($this->Query_ID,$pos);
//  	$this->Row = $pos;
//  }
//
//  function metadata($table = "", $full = false) {
//    $count = 0;
//    $id    = 0;
//    $res   = array();
//
//    $this->connect();
//    $id = mssql_query("select * from $table", $this->Link_ID);
//    if (!$id) {
//      $this->Errno = 1;
//      $this->Error = "General Error (The MSSQL interface cannot return detailed error messages).";
//      $this->halt("Metadata query failed.");
//    }
//    $count = mssql_num_fields($id);
//
//    for ($i=0; $i<$count; $i++) {
//    	$info = mssql_fetch_field($id, $i);
//      $res[$i]["table"] = $table;
//      $res[$i]["name"]  = $info->name;
//      $res[$i]["len"]   = $info->max_length;
//      $res[$i]["flags"] = $info->numeric;
//    }
//    $this->free_result();
//    return $res;
//  }
//
//  function affected_rows() {
//// Not a supported function in PHP3/4.  Chris Johnson, 16May2001.
////    return mssql_affected_rows($this->Query_ID);
//    $rsRows = mssql_query("Select @@rowcount as rows", $this->Link_ID);
//    if ($rsRows) {
//       return mssql_result($rsRows, 0, "rows");
//    }
//  }
//
//  function num_rows() {
//    return mssql_num_rows($this->Query_ID);
//  }
//
//  function num_fields() {
//    return mssql_num_fields($this->Query_ID);
//  }
//
//  function f($Field_Name) {
//    return $this->Record[strtolower($Field_Name)];
//  }
//
//  function halt($msg) {
//    if ("no" == $this->Halt_On_Error)
//      return;
//
//    $this->haltmsg($msg);
//
//    if ("report" != $this->Halt_On_Error)
//      die("Session halted.");
//  }
//
//  function haltmsg($msg) {
//    printf("<p><b>Database error:</b> %s<br>\n", $msg);
//    printf("<b>MSSQL Error</b>: %s (%s)</p>\n",
//      $this->Errno,
//      $this->Error);
//  }
//}
//if(!class_exists("DB_Sql"))	{
//	class DB_Sql extends DB_MSSQL {
//		function __construct($query = "") {
//			DB_MSSQL::__construct($query);
//		}
//	}
//}
