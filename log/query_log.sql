2014-05-22 12:46:41am
SELECT p.id as id, s.matric as matric, s.name as name, mt.name as type FROM `participation` p INNER JOIN `student` s on s.matric = p.student_matric INNER JOIN `merit_type` mt on mt.id = p.merit_type_id WHERE `merit_event_id` = 2 AND p.status = 'valid'

2014-05-22 12:46:41am
SELECT p.id as id, s.matric as matric, s.name as name, mt.name as type FROM `participation` p INNER JOIN `student` s on s.matric = p.student_matric INNER JOIN `merit_type` mt on mt.id = p.merit_type_id WHERE `merit_event_id` = 1 AND p.status = 'valid'

2014-05-22 12:46:41am
SELECT * FROM `merit_event` WHERE `session` = '13/14'

2014-05-22 12:44:31am
SELECT p.id as id, s.matric as matric, s.name as name, mt.name as type FROM `participation` p INNER JOIN `student` s on s.matric = p.student_matric INNER JOIN `merit_type` mt on mt.id = p.merit_type_id WHERE `merit_event_id` = 2

2014-05-22 12:44:31am
SELECT p.id as id, s.matric as matric, s.name as name, mt.name as type FROM `participation` p INNER JOIN `student` s on s.matric = p.student_matric INNER JOIN `merit_type` mt on mt.id = p.merit_type_id WHERE `merit_event_id` = 1

2014-05-22 12:44:31am
SELECT * FROM `merit_event` WHERE `session` = '13/14'

2014-05-22 12:44:29am
SELECT * FROM `participation` WHERE `merit_event_id` = 2 AND `student_matric` = 'IER130003' AND (`status` = 'signedin' OR `status` = 'valid')

2014-05-22 12:44:29am
SELECT * FROM `merit_event` WHERE `startQR` = '2a8dbb07b1ac49b112db79a286e8538c'

2014-05-22 12:44:29am
SELECT * FROM `student` WHERE `matric` = 'IER130003'

2014-05-22 12:44:23am
