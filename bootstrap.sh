#!/usr/bin/env bash

echo Setting up database..
mysql -u root -p"root" -e "DROP DATABASE IF EXISTS contactdb ; CREATE DATABASE contactdb;"
mysql -u root -p"root" -h localhost contactdb < ../../var/www/contactdb.sql;
