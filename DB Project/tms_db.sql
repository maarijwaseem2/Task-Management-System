-- Admin Table
create table admins(
    id int(11) primary key unique,
    name varchar(100) not null unique,
    email varchar(100) not null unique,
    password varchar(100) not null,
    mobile bigint(11) not null
);

-- User Table 
create table users(
    uid int(11) primary key,
    name varchar(100) not null unique,
    email varchar(100) not null unique,
    password varchar(100) not null,
    mobile bigint(20) not null
);

-- Task Table 
create table tasks(
    tid int(11) primary key,
    uid int(11), -- Foreign key referencing users table
    description varchar(250) not null,
    start_date date not null,
    end_date date not null,
    status varchar(100) not null,
    Foreign key (uid) references users(uid)
);

-- Leave Table
create table leaves(
    lid int(11) primary key,
    uid int(11),-- Foreign key referencing users table
    subject varchar(100) not null,
    message varchar(255) not null,
    status varchar(20) not null,
    FOREIGN KEY (uid) references users(uid)
);

-- Comment Table
create table comments(
    cid int(11) primary key,
    tid int(11),-- Foreign key referencing tasks table
    commentTxt varchar,
    CommentDate datetime,
    FOREIGN KEY (tid) REFERENCES tasks(tid)
);


-- Task Table (modified)
-- Adding a foreign key reference to comment table
ALTER TABLE tasks
ADD COLUMN cid INT,
ADD FOREIGN KEY (cid) REFERENCES comments(cid);


-- JOINS
SELECT task.task_id, task.task_description, user.username AS assigned_to, admin.username AS assigned_by
FROM task
JOIN user ON task.user_id = user.user_id
JOIN admin ON user.admin_id = admin.admin_id;

-- TRIGGERS
CREATE TRIGGER update_task_timestamp
BEFORE UPDATE ON task
FOR EACH ROW
SET NEW.modified_at = NOW();

-- TRANSACTION
START TRANSACTION;

-- Insert task
INSERT INTO task (user_id, task_description) VALUES (user_id, 'Complete project by end of the week');

-- Insert leave request
INSERT INTO leave (user_id, leave_reason) VALUES (user_id, 'Family emergency, need leave for three days');

COMMIT;

-- STORE PROCEDURE
DELIMITER //

CREATE PROCEDURE get_tasks_by_admin(IN admin_id INT)
BEGIN
    SELECT task.task_id, task.task_description, user.username AS assigned_to
    FROM task
    JOIN user ON task.user_id = user.user_id
    WHERE user.admin_id = admin_id;
END //

DELIMITER ;

-- VIEW
CREATE VIEW leave_view AS
SELECT leave.leave_id, leave.leave_reason, user.username AS user_name
FROM leave
JOIN user ON leave.user_id = user.user_id;


