<?php
/**
 * Element of input student
 *   - $grade: school grade
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

switch ($grade) {
	case 1:
		$gradeLabel = __d('edumap', '1 grader');
		break;
	case 2:
		$gradeLabel = __d('edumap', '2 grader');
		break;
	case 3:
		$gradeLabel = __d('edumap', '3 grader');
		break;
	case 4:
		$gradeLabel = __d('edumap', '4 grader');
		break;
	case 5:
		$gradeLabel = __d('edumap', '5 grader');
		break;
	case 6:
		$gradeLabel = __d('edumap', '6 grader');
		break;
}

echo $gradeLabel;