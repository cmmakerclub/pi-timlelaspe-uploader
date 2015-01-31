#!/bin/bash
raspistill -o /home/pi/captured-images/myimage_%04d.jpg -tl 30000 -t 504000000  -vf -hf -w 800 -h 600 --verbose
