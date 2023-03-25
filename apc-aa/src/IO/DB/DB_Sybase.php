<?php

namespace AA\IO\DB;

class DB_Sybase extends AbstractDB {}

/*
 * Session Management for PHP3
 *
 * Copyright (c) 1998-2000 NetUSE AG
 *                    Boris Erdmann, Kristian Koehntopp
 *
 * Adapted from DB_MySQL.php by Sascha Schumann <sascha@schumann.cx>
 *
 * metadata() contributed by Adelino Monteiro <adelino@infologia.pt>
 *
 * $Id: DB_Sybase.php 4308 2020-11-08 21:44:12Z honzam $
 *
 */

//  Commented out - unmaintained code - uses sybase db functions incompatible with php >= 7.0
//  (Honza 2020-08-18)

//class DB_Sybase {
//  var $Host     = "";
//  var $Database = "";
//  var $User     = "";
//  var $Password = "";
//
//  var $Link_ID  = 0;
//  var $Query_ID = 0;
//  var $Row;
//
//  var $PConnect  = 0;     ## Set to 1 to use persistent database connections
//
//  /**
//   * //class DB_Sybase { constructor.
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
//        $this->Link_ID = sybase_connect($this->Host, $this->User, $this->Password);
//      } else {
//        $this->Link_ID = sybase_pconnect($this->Host, $this->User, $this->Password);
//      }
//      if (!$this->Link_ID) {
//        $this->connect_failed("connect ($this->Host, $this->User, \$Password) failed");
//      }
//      if(!sybase_select_db($this->Database, $this->Link_ID)) {
//        $this->connect_failed("cannot use database ".$this->Database);
//      }
//    }
//  }
//
//  function connect_failed($message='') {
//    $this->Halt_On_Error = "yes";
//    $this->halt($message);
//  }
//
//  function query($Query_String) {
//
//
//    /* No empty queries, please, since PHP4 chokes on them. */
//    if ($Query_String == "")
//      /* The empty query string is passed on from the constructor,
//       * when calling the class without a query, e.g. in situations
//       * like these: '$db = new DB_Sql_Subclass;'
//       */
//      return 0;
//
//    $this->connect();
//
//#   printf("Debug: query = %s<br>\n", $Query_String);
//
//    $this->Query_ID = sybase_query($Query_String,$this->Link_ID);
//    $this->Row   = 0;
//    if (!$this->Query_ID) {
//      $this->halt("Invalid SQL: ".$Query_String);
//    }
//
//    return $this->Query_ID;
//  }
//
//  function next_record() {
//    $this->Record = sybase_fetch_array($this->Query_ID);
//    $this->Row   += 1;
//
//    if (is_array($this->Record)) {
//        return true;
//    }
//    sybase_free_result($this->Query_ID);
//    $this->Query_ID = 0;
//    return false;
//  }
//
//  function seek($pos) {
//    $status = sybase_data_seek($this->Query_ID, $pos);
//    if ($status)
//      $this->Row = $pos;
//    return;
//  }
//
//  function metadata($table = "", $full = false) {
//	  $count = 0;
//	  $id    = 0;
//	  $res   = array();
//
//	  $this->connect();
//	  $result = $this->query("exec sp_columns $table");
//	  if ($result < 0) {
//		  $this->Errno = 1;
//		  $this->Error = "Metadata query failed";
//		  $this->halt("Metadata query failed.");
//	  }
//	  $count = sybase_num_rows($result);
//
//	  for ($i=0; $i<$count; $i++) {
//		  $res[$i]["table"] = $table ;
//		  $res[$i]["name"]  = sybase_result ($result, $i, "COLUMN_NAME");
//		  $res[$i]["type"]  = sybase_result ($result, $i, "TYPE_NAME");
//		  $res[$i]["len"]   = sybase_result ($result, $i, "LENGTH");
//		  $res[$i]["position"] = sybase_result ($result, $i, "ORDINAL_POSITION");
//		  $res[$i]["flags"] = sybase_result ($result, $i, "REMARKS");
//
//	  }
//  }
//
//  function affected_rows() {
//	return sybase_affected_rows($this->Query_ID);
//  }
//
//  function num_rows() {
//    return sybase_num_rows($this->Query_ID);
//  }
//
//  function num_fields() {
//    return sybase_num_fields($this->Query_ID);
//  }
//
//  function f($Name) {
//    return $this->Record[$Name];
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
//    printf("<b>Sybase Error</b> %s<br></p>\n", $this->Error);
//  }
//}
//if(!class_exists("DB_Sql"))	{
//	class DB_Sql extends DB_Sybase {
//		function __construct($query = "") {
//			DB_Sybase::__construct($query);
//		}
//	}
//}
//
