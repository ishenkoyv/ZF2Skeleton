#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
APP_DIR=`cd "${DIR}/.."; pwd`
LIQUIBASE_JAR=${APP_DIR}/bin/liquibase.jar
LIQUIBASE_CONFIG=${APP_DIR}/build/liquibase.properties
JAVA_EXEC=`which java`

cd $APP_DIR
$JAVA_EXEC -jar $LIQUIBASE_JAR --defaultsFile=$LIQUIBASE_CONFIG update
