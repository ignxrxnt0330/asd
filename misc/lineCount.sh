#!/bin/bash

lineCount=0

for folder in $(ls ../)
do
	if [ $folder != ".git" ] && [ $folder != "imgs" ] && [ $folder != "fonts" ]
	then
		for file in $(find  ../$folder -name "*" -type f)
		do

			let lineCount+=$(cat $file | wc -l )
			echo $file
			echo $lineCount
		done
	fi
done
echo "$lineCount lines of code"


