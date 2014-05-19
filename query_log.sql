2014-05-19 5:54:53pm
SELECT * FROM `student` WHERE `matric` = ''

2014-05-19 5:40:44pm
SELECT s.name, p.student_matric, sum(mt.mark) as total FROM `participation` p INNER JOIN merit_type mt ON mt.id = p.merit_type_id INNER JOIN student s on s.matric = p.student_matric WHERE p.status = 'valid' GROUP BY student_matric ORDER BY total desc

2014-05-19 5:39:23pm
SELECT * FROM `maintenance` WHERE `student_matric` = 'IER130003' AND `session` = '13/14' ORDER BY id desc

2014-05-19 5:25:22pm
SELECT mt.mark as mark, mt.type as type, mt.name as position, COALESCE(a.name, me.name) as activityname FROM `participation` p INNER JOIN `merit_type` mt ON mt.id = p.merit_type_id LEFT JOIN `activity` a ON a.id = p.activity_id LEFT JOIN `merit_event` me ON me.id = p.Merit_event_id WHERE p.student_matric = 'IER130003' AND p.status = 'valid' AND p.session = '13/14'

2014-05-19 5:25:22pm
SELECT * FROM `student` WHERE `matric` = 'IER130003'

2014-05-19 5:25:19pm
SELECT * FROM `merit_event` WHERE `session` = '13/14'

2014-05-19 5:25:18pm
SELECT p.id as id, s.matric as matric, s.name as name, mt.name as type FROM `participation` p INNER JOIN `student` s on s.matric = p.student_matric INNER JOIN `merit_type` mt on mt.id = p.merit_type_id WHERE `activity_id` = 7

2014-05-19 5:25:18pm
SELECT * FROM `activity` WHERE `type` LIKE '%sukmum' AND `session` < '13/14' ORDER BY `timeupdate` desc

2014-05-19 5:25:18pm
SELECT p.id as id, s.matric as matric, s.name as name, mt.name as type FROM `participation` p INNER JOIN `student` s on s.matric = p.student_matric INNER JOIN `merit_type` mt on mt.id = p.merit_type_id WHERE `activity_id` = 40

2014-05-19 5:25:18pm
