<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2002 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the PHP license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/2_02.txt.                                 |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Authors: Dave Mertens <dmertens@zyprexia.com>                        |
// +----------------------------------------------------------------------+
//
// $Id$

/**
* Creates a handy ID of a Number
* This is not a real encryption class, but it can be useful.
*
* Especialy for eshops it's handy that the user gets another order nr than
* the normal used order ID. A regular customer can see if the store is successfull
* just by looking at the orderid's.
*
* This class created an order number that can be used as a referal for the customer. Intern
* you can still use the order ID.
*
* Ofcourse it's possible to make an number of any id.
*
* The numbers are unique as long ID is below 1000000.
*
* @access public
* @package Crypt
* @author Dave Mertens <dmertens@zyprexia.com>
* @version $Revision$
*/
class Crypt_NumberID
{

	/**
	* translate an ID into a number
	*
	* @param long $ID	- Identifier
	* @return string containing the number
	* @access public	
	*/
	function toNumber($ID)
	{
	    mt_srand(time());
		$str = sprintf("%02d", date("m") * 9);
		$str .= sprintf("%02d", date("s"));
		$str .= substr(sprintf("%04d", date("z") * mt_rand(0, 16)), -4);
		$str .= substr(sprintf("%06d", $ID), -6);
	
		$newstr = $str[12] . $str[6] . $str[8] . $str[1] . $str[4] . $str[11] . $str[2];
		$newstr .= $str[7] . $str[9] . $str[3] . $str[5] . $str[10] . $str[0] . $str[13];
	
		return $newstr;
	}
	
	/**
	* translate an number into an ID    
	*
	* @param string nr - number create by toNumber function
	* @return long ID - your original ID
	* @access public
	*/
	function toId($nr)
	{
		return $nr[2] . $nr[8] . $nr[11] . $nr[5] . $nr[0] . $nr[13];
	}
	
} // end of NumberID class                                 

?>
