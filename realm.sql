\! echo "Initializing Research Realm tables...\n"

CREATE DATABASE IF NOT EXISTS realm;
USE realm;

\! echo "Creating Department tables:"

CREATE TABLE IF NOT EXISTS Language (
    id          INT             UNIQUE NOT NULL AUTO_INCREMENT,
    shortcode   VARCHAR(2)      NOT NULL,
    name        TINYTEXT        NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS Department (
    id          INT     NOT NULL AUTO_INCREMENT,
    language_id INT     NOT NULL,
    name        TEXT    NOT NULL,
    PRIMARY KEY (id, language_id),
    FOREIGN KEY (language_id) REFERENCES Language(id)
);

\! echo "Creating Project table:"
CREATE TABLE IF NOT EXISTS project (
    id              INT         UNIQUE NOT NULL AUTO_INCREMENT,
    language_id     INT         NOT NULL,
    title           TEXT        NOT NULL,
    researcher      TEXT        NOT NULL,
    department_id   INT         NOT NULL,
    call_to_action  MEDIUMTEXT  NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (language_id) REFERENCES Language(id),
    FOREIGN KEY (language_id, department_id) REFERENCES Department(id, language_id)
);