2014-05-14 2:09:45am
SELECT s.matric as matric, s.name as name, mt.name as type FROM `participation` p INNER JOIN `student` s on s.matric = p.student_matric INNER JOIN `merit_type` mt on mt.id = p.merit_type_id WHERE `activity_id` = 39

2014-05-14 2:09:45am
SELECT s.matric as matric, s.name as name, mt.name as type FROM `participation` p INNER JOIN `student` s on s.matric = p.student_matric INNER JOIN `merit_type` mt on mt.id = p.merit_type_id WHERE `activity_id` = 40

2014-05-14 2:09:45am
SELECT s.matric as matric, s.name as name, mt.name as type FROM `participation` p INNER JOIN `student` s on s.matric = p.student_matric INNER JOIN `merit_type` mt on mt.id = p.merit_type_id WHERE `activity_id` = 40

2014-05-14 2:09:45am
SELECT * FROM `activity` WHERE `type` LIKE '%sukmum' AND `session` < '13/14' ORDER BY `timeupdate` desc

2014-05-14 2:09:45am
SELECT * FROM `activity` WHERE `type` LIKE '%sukmum' AND `session` < '13/14' ORDER BY `timeupdate` desc

2014-05-14 2:09:45am
SELECT s.matric as matric, s.name as name, mt.name as type FROM `participation` p INNER JOIN `student` s on s.matric = p.student_matric INNER JOIN `merit_type` mt on mt.id = p.merit_type_id WHERE `activity_id` = 7

2014-05-14 2:09:45am
SELECT s.matric as matric, s.name as name, mt.name as type FROM `participation` p INNER JOIN `student` s on s.matric = p.student_matric INNER JOIN `merit_type` mt on mt.id = p.merit_type_id WHERE `activity_id` = 7

2014-05-14 2:15:30am
SELECT * FROM `student` WHERE `matric` = 'IER130003'

2014-05-14 2:15:30am
SELECT mt.mark as mark, mt.type as type, mt.name as position, COALESCE(a.name, me.name) as activityname FROM `participation` p INNER JOIN `merit_type` mt ON mt.id = p.merit_type_id LEFT JOIN `activity` a ON a.id = p.activity_id LEFT JOIN `merit_event` me ON me.id = p.Merit_event_id WHERE p.student_matric = 'IER130003' AND p.status = 'valid' AND p.session = '13/14'

2014-05-14 2:15:30am
SELECT mt.mark as mark, mt.type as type, mt.name as position, COALESCE(a.name, me.name) as activityname FROM `participation` p INNER JOIN `merit_type` mt ON mt.id = p.merit_type_id LEFT JOIN `activity` a ON a.id = p.activity_id LEFT JOIN `merit_event` me ON me.id = p.Merit_event_id WHERE p.student_matric = 'IER130003' AND p.status = 'valid' AND p.session = '13/14'

