# Research Realm

## Setup

### Create the database
```
CREATE DATABASE realm;
USE realm;
source realm.sql
```

### Create a user for Research Realm
Replace the names with $ in front by the corresponding variable in the `[mysql` section of `realm.ini`
```
CREATE USER '$username'@'$hostname' IDENTIFIED BY '$password';
GRANT SELECT, INSERT, UPDATE, DELETE ON $database.* TO '$username'@'$hostname';
FLUSH PRIVILEGES;
```

### Configure Research Realm
Update the values in the `realm.ini` file. Please change these defaults to match your previous work:  
```
[mysql]
hostname = localhost
port     = 3306
database = realm
username = realm
password = research

[admin]
username = admin
password = pass
```