-- add institution column to users table
ALTER TABLE users ADD COLUMN institution VARCHAR(255) AFTER status;
-- add is_activity column to attendance table
ALTER TABLE attendance ADD COLUMN is_activity VARCHAR(1) NOT NULL DEFAULT 'F' AFTER activity;
-- modify column nullable
ALTER TABLE attendance MODIFY COLUMN activity MEDIUMTEXT;
ALTER TABLE attendance MODIFY COLUMN nim VARCHAR(15);
ALTER TABLE attendance MODIFY COLUMN location VARCHAR(255);
ALTER TABLE attendance MODIFY COLUMN coordinate VARCHAR(255);
