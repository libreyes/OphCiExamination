<?php
/**
 * OpenEyes
 *
 * (C) OpenEyes Foundation, 2014
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2014, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

return array(
	'ex_clinical_status1' => array(
		'id' => 1,
		'name' => 'Follow-up',
		'display_order' => 1,
		'followup' => 1,
		'episode_status_id' => 4,
		'active'=>1,
		'patientticket' => 0
	),
	'ex_clinical_status2' => array(
		'id' => 2,
		'name' => 'Discharge',
		'display_order' => 2,
		'followup' => 0,
		'episode_status_id' => 3,
		'active'=>1,
		'patientticket' => 0
	),
	'ex_clinical_status3' => array(
		'id' => 3,
		'name' => 'Refer to VC',
		'display_order' => 3,
		'followup' => 0,
		'episode_status_id' => 1,
		'active'=>1,
		'patientticket' => 0
	),
	'ex_clinical_status4' => array(
		'id' => 4,
		'name' => 'Not active option',
		'display_order' => 4,
		'followup' => 0,
		'episode_status_id' => 1,
		'active'=>0,
		'patientticket' => 0
	),
);