# Shanty-Dope-Proj.
ITELEC 4100

Notes:
--------------------------------------------------------------------------
Font Style: Ubuntu
Pallete:
    #1B3C53
    #456882
    #D2C1B6
    #F9F3EF


SQL

CREATE TABLE `charity_request` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `datetime` datetime NOT NULL,
  `fund_limit` int(6) NOT NULL,
  `duration` int(2) NOT NULL,
  `id_type_used` enum('Passport','Driver''s Licence','National ID') NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `id_att_link` varchar(255) NOT NULL,
  `front_face_link` varchar(255) NOT NULL,
  `side_face_link` varchar(255) NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

Naka foreign key yung id sa users table
ALTER TABLE `charity_request`
  ADD CONSTRAINT `fk_user`
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) 
  ON DELETE CASCADE ON UPDATE CASCADE;
