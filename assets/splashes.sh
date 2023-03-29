#!/bin/bash
for splash in $(cat splashes.txt | sort -t"!" -k1) 
do
	echo $splash >> asd.txt
done
