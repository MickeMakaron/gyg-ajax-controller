<?php
/****************************************************************
****************************************************************
*
* gyg-ajax-controller - Ajax request handling with gyg-framework
* Copyright (C) 2014-2015 Mikael Hernvall (mikael.hernvall@gmail.com)
*
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program. If not, see <http://www.gnu.org/licenses/>.
*
****************************************************************
****************************************************************/

/**
 * \brief Simple function wrapper for sending json data
 */
class GygAjax
{
	
	/**
	 * \brief Send json data
	 *
	 * Create a json object consisting of "success" and "output"
	 * properties and output it under appropiate HTTP header.
	 *
	 * Note that this function invokes exit(). Calling this function
	 * will thus exit the PHP script.
	 *
	 * \param success bool Indicate success on an ajax call.
	 * \param message any Arbitrary data.
	 */
	static public function send($success, $message = null)
	{
		header('Content-type: application/json');
		echo json_encode(['success' => $success, 'output' => $message]);
		exit();
	}
}