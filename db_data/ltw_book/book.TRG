TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`%` TRIGGER before_insert_book\nBEFORE INSERT ON book\nFOR EACH ROW\nBEGIN\n    DECLARE user_role varchar(50);\n    \n    SELECT role INTO user_role\n    FROM ltw.user_data\n    WHERE id = NEW.publisher_id;\n    \n    IF user_role != \'publisher\' THEN\n    	SIGNAL SQLSTATE \'45000\'\n        SET MESSAGE_TEXT = \'phai la publisher moi cho dang truyen\';\n    END IF;\nEND'
sql_modes=1436549152
definers='root@%'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_unicode_ci'
db_cl_names='latin1_swedish_ci'
created=173133683578
