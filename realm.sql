\! echo "Initializing Research Realm tables...\n"
\! echo "Creating Researcher table:"
CREATE TABLE IF NOT EXISTS researcher (
    id      INT UNIQUE   NOT NULL AUTO_INCREMENT,
    name    VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

\! echo "Creating Reviewer table:"
CREATE TABLE IF NOT EXISTS reviewer (
    id      INT UNIQUE   NOT NULL AUTO_INCREMENT,
    name    VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

\! echo "Creating Department tables:"
CREATE TABLE IF NOT EXISTS department (
    id          INT UNIQUE      NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS department_localization (
    id          INT             NOT NULL,
    language    VARCHAR(2)      NOT NULL,
    name        VARCHAR(255)    NOT NULL,
    FOREIGN KEY (id) REFERENCES department(id)
);

\! echo "Creating Project table:"
CREATE TABLE IF NOT EXISTS project (
    id              INT UNIQUE  NOT NULL AUTO_INCREMENT,
    title           TEXT        NOT NULL,
    researcher_id   INT UNIQUE  NOT NULL,
    reviewer_id     INT UNIQUE  NOT NULL,
    department_id   INT UNIQUE  NOT NULL,
    call_to_action  MEDIUMTEXT  NOT NULL,
    abstract        LONGTEXT    NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (researcher_id) REFERENCES researcher(id),
    FOREIGN KEY (reviewer_id)   REFERENCES reviewer(id),
    FOREIGN KEY (department_id) REFERENCES department(id)
);