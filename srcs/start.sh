#!/bin/bash
# Start the 3rd process
service mysql start 
status=$?
if [ $status -ne 0 ]; then
  echo "Failed to start my_third_process: $status"
  exit $status
fi
mariadb < /usr/share/phpmyadmin/sql/create_tables.sql
echo "GRANT ALL PRIVILEGES ON *.* TO 'mouhcine'@'localhost' IDENTIFIED BY '123456'" | mysql -u root
echo "CREATE DATABASE wordpressmc" | mysql -u mouhcine -p123456

# Start the first process
service nginx start 
status=$?
if [ $status -ne 0 ]; then
  echo "Failed to start my_first_process: $status"
  exit $status
fi

# Start the second process
service php7.3-fpm start 
status=$?
if [ $status -ne 0 ]; then
  echo "Failed to start my_second_process: $status"
  exit $status
fi


while sleep 1; do
  ps aux |grep nginx |grep -q -v grep
  PROCESS_1_STATUS=$?
  ps aux |grep php-fpm |grep -q -v grep
  PROCESS_2_STATUS=$?
  ps aux |grep mysql |grep -q -v grep
  PROCESS_3_STATUS=$?
  # If the greps above find anything, they exit with 0 status
  # If they are not both 0, then something is wrong
  if [ $PROCESS_1_STATUS -ne 0 -o $PROCESS_2_STATUS -ne 0 -o $PROCESS_3_STATUS -ne 0 ]; then
    echo "One of the processes has already exited."
    exit 1
  fi
done