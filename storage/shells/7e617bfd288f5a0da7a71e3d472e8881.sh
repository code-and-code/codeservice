#!/bin/bash
echo "Arquivo Back-up Pasta SHELL Admin"
PWD=$(dirname $0)
DATE=`date +%Y-%m-%d:%H_%M_%S`
cd $PWD
mkdir $DATE
cp *.sh $DATE/



