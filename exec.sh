#!/bin/bash
START=$(date +"%s")
# do something
# start your script work hereqqq
timeout 5s ./mbox/src/mbox -n -i -- $1/prog<$1/in.txt 2>$1/status.txt | tail -n 50 > $1/out.txt
# your logic ends here
END=$(date +"%s")
DIFF=$(( $END - $START ))
if [ $DIFF -ge 5 ]; then
	echo "Your program took over $DIFF seconds..."
	echo "Your program is forced to be killed!!!"
else
	echo "Your program took $DIFF seconds..."
fi
