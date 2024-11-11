TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`%` TRIGGER `before_update_credits` BEFORE UPDATE ON `user_info` FOR EACH ROW BEGIN\n    IF NEW.credits < 0 THEN\n    	SIGNAL SQLSTATE \'45000\' \n        SET MESSAGE_TEXT = \'Thanh toan that bai\';\n    END IF;\n\nINSERT INTO ltw_history.payment (user_id, amount)\n    VALUES (NEW.user_id, NEW.credits - OLD.credits);\nEND'
sql_modes=1436549152
definers='root@%'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_unicode_ci'
db_cl_names='latin1_swedish_ci'
created=173113484198
