<?php
/**
 *
 * PHP version 7.2+
 *
 * LICENSE: This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program (LICENSE); if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @version   $Id: date.php3 4270 2020-08-19 16:06:27Z honzam $
 * @author    Jiri Hejsek
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Copyright (C) 1999, 2000 Association for Progressive Communications
 * @link      https://www.apc.org/ APC
 *
*/

/** monthnames function
 *  @return array month names
 */
function monthNames() {
    return [1 => _m('January'), _m('February'), _m('March'), _m('April'), _m('May'), _m('June'), _m('July'), _m('August'), _m('September'), _m('October'), _m('November'), _m('December')];
}


//
//	Date form element
//
//	Dropdown lists for Date, Month, Year
//

class datectrl {
    var $name;
    var $time;
    var $day;
    var $month;
    var $year;
    var $y_range_plus;    // how many years + display in year select list
    var $y_range_minus;   // how many years + display in year select list
    var $from_now;        // year range is in relation to today's date/selected date
    var $display_time;    // display time too
    var $required;

    /** datectrl function
     *  constructor
     *  name identifies control on a form
     * @param $name
     * @param $y_range_minus = 5
     * @param $y_range_plus = 5
     * @param $from_now = false
     * @param $display_time = false
     */
    function __construct($name, $y_range_minus=5, $y_range_plus=5, $from_now=false, $display_time=false, $required=true) {
        $this->name          = $name;
        $this->y_range_plus  = $y_range_plus;
        $this->y_range_minus = $y_range_minus;
        $this->from_now      = $from_now;
        $this->display_time  = $display_time;
        $this->required      = $required;
        $this->update();
    }

    /** update function
     * process form data
     */
    function update() {
        $timevar  = trim($_REQUEST["tdctr_" . $this->name . "_time"]);
        $dayvar   = trim($_REQUEST["tdctr_" . $this->name . "_day"]);
        $monthvar = trim($_REQUEST["tdctr_" . $this->name . "_month"]);
        $yearvar  = trim($_REQUEST["tdctr_" . $this->name . "_year"]);

        // no date
        if ( strlen($yearvar) AND !(int)$yearvar) {
            $this->time  = 0;
            $this->day   = 0;
            $this->month = 0;
            $this->year  = 0;
            return;
        }

        if ( $timevar ) {
            $this->time = $timevar;
        }
        if ( $dayvar) {
            $this->day = $dayvar;
        }
        if ( $monthvar ) {
            $this->month = $monthvar;
        }
        if ( $yearvar ) {
            $this->year = $yearvar;
        }
    }

    /** if the form sent contain this widget
     * @return bool
     */
    function isUpdatable() {
        $n = $this->name;
        return (isset($_REQUEST["tdctr_{$n}_time"]) OR isset($_REQUEST["tdctr_{$n}_day"]) OR isset($_REQUEST["tdctr_{$n}_month"]) OR isset($_REQUEST["tdctr_{$n}_year"]));
    }

    /** setdate_int function
     *  set date, format form integer
     * @param $date
     */
    function setdate_int($date) {
        if (!$date) {
            $d = ['year' => 0, 'mon' => 1, 'mday' => 1, 'hours' => 0, 'minutes' => 0, 'seconds' => 0];
        } else {
            $d = datectrl::isTimestamp($date) ? getdate($date) : getdate();
        }
        $this->year  = $d["year"];
        $this->month = $d["mon"];
        $this->day   = $d["mday"];
        $this->time  = $d["hours"].":".$d["minutes"].":".$d["seconds"] ;
    }

    /** we check, if the value is not so big (becauce we solved problem, when
     *  the date was entered as 230584301025887115 - which is too big and it
     *  takes ages for PHP to evaluate the date() function then. (php 5.2.6))
     *  it is perfectly possible to increase the max value, however
     */
    function isTimestamp($timestamp) {
        // return ctype_digit((string)$timestamp) AND ($timestamp > -2147483647) AND ($timestamp < 2147483648);  // wrong - ctype_digit is not work with negative values
        return IsSigInt($timestamp) AND ($timestamp > -2147483647) AND ($timestamp < 100000000000);
    }

    /** get_date function
     *  get stored date as integer
     */
    function get_date() {
        // time is not set ?
        if (!$this->year) {
            // we have to return 0, beacause mktime(0,0,0,0,0,0) == 943916400
            // (at least from php 5.1.2)
            return 0;
        }
        $t = explode( ':', $this->time ?  $this->time : "0:0:0");
        return mktime($t[0],$t[1],$t[2],(int)$this->month,(int)$this->day,(int)$this->year);

    }

    /** get_datestring function
     *  get stored date as integer
     */
    function get_datestring() {
        return  $this->day. " - ". $this->month." - ".$this->year." ". $this->time;
    }

    /** ValidateDate function
     *  check if date is valid and possibly set date to "default" value if it is
     *  not required and default value is specified
     * @param $inputName
     * @param $err
     * @param $required = true
     * @param $default = '0'
     * @return bool
     */
    function ValidateDate($inputName, &$err, $required=true, $default='0')  {
        $date = $this->get_date();
        if ( $this->isTimestamp($date) AND ($date != 0)) {
            return true;
        }
        if ($required) {
            $err[$this->name] = MsgErr(_m("Error in")." $inputName");
            return false;
        }
        if ($default) {
            $this->setdate_int($default);
        }
        return (( $this->get_date() > 0  ) OR ($this->get_date()==-3600));
    }


    function getDayOptions() {
        $ret = '';
        $at  = getdate(time());
        $sel = ($this->day != 0 ? $this->day : $at["mday"]);
        for ($i = 1; $i <= 31; $i++) {
            $ret .= "<option value=\"$i\"". (($i == $sel) ? ' selected class="sel_on"' : "") . ">$i</option>";
        }
        return $ret;
    }

    /** getdayselect function
     * print select box for day
     * @return string
     */
    function getdayselect() {
        return "<select name=\"tdctr_" . $this->name . "_day\"". AA_Jstriggers::get("select", $this->name, "") .">".$this->getDayOptions()."</select>";
    }


    function getMonthOptions() {
        $months  = monthNames();
        $at      = getdate(time());
        $sel     = ($this->month != 0 ? $this->month : $at["mon"]);
        $ret     = '';
        for ($i = 1; $i <= 12; $i++) {
            $ret .= "<option value=\"$i\"". (($i == $sel) ? ' selected class="sel_on"' : "") . ">". $months[$i] ."</option>";
        }
        return $ret;
    }

    /** getmonthselect function
     * print select box for month
     * @return string
     */
    function getmonthselect() {
        return "<select name=\"tdctr_" . $this->name . "_month\"". AA_Jstriggers::get("select", $this->name, "") .">".$this->getMonthOptions()."</select>";
    }

    function isEmpty() {
        return (!$this->year OR ($this->year==1970 AND $this->month==1 AND $this->day==1));
    }

    function getYearOptions() {
        $at           = getdate(time());
        $from         = ( $this->from_now ? $at["year"] - $this->y_range_minus : $this->y_range_minus );
        $to           = ( $this->from_now ? $at["year"] + $this->y_range_plus  : $this->y_range_plus );
        $selectedused = false;
        $ret          = '';

        if ($this->isEmpty()) {
            $selectedused = true;
            $ret .= '<option value="" selected class="sel_on">----</option>';
        } elseif (!$this->required) {
            $ret .= '<option value="">----</option>';
        }

        for ($i = $from; $i <= $to; $i++) {
            $ret .= "<option value=\"$i\"";
            if ($i == $this->year) {
                $ret .= ' selected class="sel_on"';
                $selectedused = true;
            }
            $ret .= ">$i</option>";
        }

        // now add all values, which is not in the array, but field has this value
        if ($this->year AND !$selectedused) {
            $ret .= "<option value=\"". myspecialchars($this->year) ."\" selected class=\"sel_missing\">".myspecialchars($this->year)."</option>";
        }
        return $ret;
    }

    /** getyearselect function
     * print select box for year
     * @return string
     */
    function getyearselect() {
        return "<select name=\"tdctr_" . $this->name . "_year\"". AA_Jstriggers::get("select", $this->name, "") . ($this->required ? 'required' : '' ) .">".$this->getYearOptions()."</select>";
    }

    function isTimeDisplayed() {
        return $this->display_time;
    }

    function getTimeString() {
        $t = explode( ":", $this->time );
        $time_string = '';

        switch( $this->display_time ) {
            case 1: $time_string = sprintf("%d:%02d",$t[0], $t[1]);
                    if ($time_string == "0:00") {
                        $time_string = '';
                    }
                    break;
            case 2: $time_string = sprintf("%d:%02d:%02d",$t[0], $t[1], $t[2]);
                    break;
            case 3: $time_string = sprintf("%d:%02d",$t[0], $t[1]);
                    break;
        }
        return $time_string;
    }

    /** gettimeselect function
     * print select box for time
     * @return string
     */
    function gettimeselect() {
        if (!$this->isTimeDisplayed()) {
            return "";
        }
        return "<input type=\"text\" name=\"tdctr_". $this->name ."_time\"  value=\"". safe($this->getTimeString()). "\" size=\"8\" maxlength=\"8\"". AA_Jstriggers::get("input", $this->name, "") .">";
    }
}

