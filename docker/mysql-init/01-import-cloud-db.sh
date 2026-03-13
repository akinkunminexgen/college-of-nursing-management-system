#!/bin/bash
set -e

#!path to the sql file on the oysconme server and will be deleted
DUMP_URL="https://example.com/xxxxxxx.sql"
TEMP_SQL="/tmp/cloud_backup.sql"

echo "Downloading cloud database from $DUMP_URL ..."
curl -L -o "$TEMP_SQL" "$DUMP_URL"

echo "Importing cloud database into MySQL..."
mysql -u root -p"$MYSQL_ROOT_PASSWORD" "$MYSQL_DATABASE" < "$TEMP_SQL"

echo "✅ Cloud database import complete."
