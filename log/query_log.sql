2014-05-22 3:39:38am
SELECT p.timecreate as date, mt.mark as mark, mt.type as type, mt.name as position, COALESCE(a.name, me.name) as activityname FROM `participation` p INNER JOIN `merit_type` mt ON mt.id = p.merit_type_id LEFT JOIN `activity` a ON a.id = p.activity_id LEFT JOIN `merit_event` me ON me.id = p.Merit_event_id WHERE p.student_matric = 'IEU110008' AND p.status = 'valid' AND p.session = '13/14' ORDER BY mt.mark desc

2014-05-22 3:39:38am
SELECT * FROM `student` WHERE `matric` = 'IEU110008'

2014-05-22 3:39:35am
SELECT p.timecreate as date, mt.mark as mark, mt.type as type, mt.name as position, COALESCE(a.name, me.name) as activityname FROM `participation` p INNER JOIN `merit_type` mt ON mt.id = p.merit_type_id LEFT JOIN `activity` a ON a.id = p.activity_id LEFT JOIN `merit_event` me ON me.id = p.Merit_event_id WHERE p.student_matric = 'SEP100058' AND p.status = 'valid' AND p.session = '13/14' ORDER BY mt.mark desc

2014-05-22 3:39:35am
SELECT * FROM `student` WHERE `matric` = 'SEP100058'

2014-05-22 3:39:16am
SELECT p.timecreate as date, mt.mark as mark, mt.type as type, mt.name as position, COALESCE(a.name, me.name) as activityname FROM `participation` p INNER JOIN `merit_type` mt ON mt.id = p.merit_type_id LEFT JOIN `activity` a ON a.id = p.activity_id LEFT JOIN `merit_event` me ON me.id = p.Merit_event_id WHERE p.student_matric = 'IER130003' AND p.status = 'valid' AND p.session = '13/14' ORDER BY mt.mark desc

2014-05-22 3:39:16am
SELECT * FROM `student` WHERE `matric` = 'IER130003'

2014-05-22 3:36:16am
SELECT s.name, p.student_matric, sum(mt.mark) as total FROM `participation` p INNER JOIN merit_type mt ON mt.id = p.merit_type_id INNER JOIN student s on s.matric = p.student_matric WHERE p.status = 'valid' GROUP BY student_matric ORDER BY total desc

2014-05-22 3:35:43am
SELECT s.name, p.student_matric, sum(mt.mark) as total FROM `participation` p INNER JOIN merit_type mt ON mt.id = p.merit_type_id INNER JOIN student s on s.matric = p.student_matric WHERE p.status = 'valid' GROUP BY student_matric ORDER BY total desc

2014-05-22 3:35:39am
SELECT p.id as id, s.matric as matric, s.name as name, mt.name as type FROM `participation` p INNER JOIN `student` s on s.matric = p.student_matric INNER JOIN `merit_type` mt on mt.id = p.merit_type_id WHERE `activity_id` = 7 AND p.status = 'valid'

2014-05-22 3:35:39am
