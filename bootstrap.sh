#!/usr/bin/env bash

echo Setting up database..
mysql -u root -p"root" -e "DROP DATABASE IF EXISTS contactDB ; CREATE DATABASE contactDB;"
# mysql -u root -p"root" contactDB < contactDB.sql;
mysql -u root -p"root" -e "CREATE TABLE contactDB.Contacts( firstName VARCHAR(50) NOT NULL ); INSERT INTO contactDB.Contacts (firstName) VALUES ('Maria'),('Michelle'),('Darby');"

